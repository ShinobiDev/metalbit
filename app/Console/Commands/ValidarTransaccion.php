<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\NotificacionAnuncio;
use App\User;
use DB;
use Carbon\Carbon;

class ValidarTransaccion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ValidarTransaccion:ValidarTransaccion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para validar que las transacciones finalizadas y donde se ha realizado el pago al anunciante, luego de tres dias se deberan cerrar ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $pagos=DB::table('pagos')
                ->select('pagos.id',
                         'pagos.transactionId',
                         'pagos.transactionState',
                         'pagos.transactionQuantity',
                         'pagos.transation_value',
                         'pagos.transaction_value_pagado',
                         'pagos.id_user_compra',
                         'anuncios.nombre_moneda',
                         'anuncios.nombre_cripto_moneda',
                         'anuncios.user_id',
                         'anuncios.tipo_anuncio',
                         'users.name',
                         'users.phone',
                         'users.email')
                ->join('anuncios','anuncios.id','pagos.id_anuncio')    
                ->join('users','users.id','anuncios.user_id')    
                ->where('pagos.transactionState','Pago a anunciante')    
                ->whereDate('pagos.updated_at',Carbon::now()->subDays('3')->format('Y-m-d'))
                ->get();
        //dd($pagos);        
        foreach ($pagos as $key => $value) {
              //var_dump($value);      
              
              DB::table('pagos')
                ->where('id',$value->id)
                ->update([
                        "transactionState"=>'Pago confirmado por el anunciante'
                    ]);  


                $uadmin=User::role('admin')->get();

                $vendedor=User::where('id',$value->user_id)->get();
                $comprador=User::where('id',$value->id_user_compra)->get();
                foreach ($uadmin as $key => $admin) {

                       NotificacionAnuncio::dispatch($admin, [$vendedor[0],$comprador[0],$value,['url'=>config('app.url').'/ver_todas_las_transacciones?id='.$value->transactionId]],0,"TransaccionFinalizadaAutomaticamenteAdministrador");  

                       
                } 
                //notificacion al comerciante
                NotificacionAnuncio::dispatch($vendedor[0], [$comprador[0],$value,['url'=>config('app.url').'/ver_mis_ventas/'.$value->user_id.'/?id='.$value->transactionId]],0,"TransaccionFinalizadaAutomaticamenteComerciante");         
        }       
    }
}
