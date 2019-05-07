<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\CriptoMonedas;
use App\Variable;
use App\CurlModel;


class ConsultarCriptoMonedas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ConsultarCriptoMonedas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron para consultar criptomonedas';

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
        
        $coinmarketcap = new CurlModel();           
        $listacriptos = $coinmarketcap->get_response_listings();
        if($listacriptos->status->error_code==0){
            CriptoMonedas::where('id',">", 0)->delete();
            foreach ($listacriptos->data as $key => $l) {
                $q=(array)$l->quote;
                CriptoMonedas::insert(["id_moneda"=>$l->id,
                                       "nombre_moneda"=>$l->name,
                                       'precio_moneda'=>$q[Variable::where('nombre','moneda_por_defecto')->select('valor')->first()->valor]->price
                                      ]);
            }
        }
        
        
        


    }
}
