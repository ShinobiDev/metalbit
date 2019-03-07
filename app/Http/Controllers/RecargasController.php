<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NotificacionAnuncio;
use App\DetalleClicAnuncio;
use App\Recargas;
use App\detalle_recargas;
use App\User;
use App\Anuncios;
use App\Payu;
use DB;
use Carbon\Carbon;

class RecargasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $recargas = Recargas::select('users.id',
                                    'users.name',
                                    'users.email',
                                    'recargas.status',
                                    'recargas.valor',
                                    'recargas.updated_at',
                                    'users.costo_clic')
            ->join("users","recargas.user_id","users.id")
            ->join('detalle_recargas','detalle_recargas.id_user','users.id')
            ->groupBy('users.id')
            ->orderBy('recargas.updated_at','users.id')           
            ->get();
             //dd($recargas[0]->id);
             //
        $i=0;
        foreach ($recargas as $key => $value) {
          $mi_lista[$i]=Recargas::select('users.id',
                                    'users.name',
                                    'detalle_recargas.id as id_recarga',
                                    'detalle_recargas.tipo_recarga',
                                    'detalle_recargas.estado_detalle_recarga',
                                    'detalle_recargas.valor_recarga',
                                    'detalle_recargas.valor_pagado',
                                    'detalle_recargas.metodo_pago',
                                    'detalle_recargas.certificado_pago',
                                    'detalle_recargas.referencia_pago',
                                    'detalle_recargas.referencia_pago_pay_u',
                                    'detalle_recargas.created_at')
                            ->join("users","recargas.user_id","users.id")
                            ->join('detalle_recargas','detalle_recargas.id_user','users.id')
                            ->orderBy('users.id')       
                            ->where("users.id",$value->id)    
                            ->get();       
              $i++;              
        }   
          
        return view('recargas.index')->with('recargas' , $recargas)->with("mi_lista_recarga",$mi_lista);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recargas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        User::where("id",">",0)->update([
                    'costo_clic' => $request["valor"]
                ]);


        return redirect()->route('recargas.index', auth()->user())->with('success', 'Se ha cambiado el costo del clic para todos los usuarios');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recargas  $recargas
     * @return \Illuminate\Http\Response
     */
    public function show(Recargas $recargas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recargas  $recargas
     * @return \Illuminate\Http\Response
     */
    public function edit(Recargas $recargas)
    {
        return view('recargas.edit',compact('recargas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recargas  $recargas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recargas $recargas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recargas  $recargas
     * @return \Illuminate\Http\Response
     */
    public function destroy($anuncio)
    {






    }

    /*
    aqui se registra el clic dado a un anuncio
     
    $anuncio = id anuncio
    $costo = valor de el clic
    $user_id = id quien da clic
    $tipo de clic info o compra
    */
    public function registro_consulta_ad($anuncio,$costo,$user_id,$tipo,$cantidad,$precio)
    {

        if($user_id != 0){
           
            if($tipo=="compra"){
                $id_a=$anuncio;
                $id_u=$user_id;
                $PG=DB::table('pagos')->where([
                                            ["id_anuncio",$id_a],                                            
                                            ["id_user_compra",$id_u],
                                            ["transactionState",'Visto']    
                                        ])
                                    ->orwhere([
                                            ["id_anuncio",$id_a],                                            
                                            ["id_user_compra",$id_u],
                                            ["transactionState",'Pendiente']    
                                        ])
                                    ->get();
                
                if(count($PG)==0){
                    
                    DB::table('pagos')->insert([
                        "transactionQuantity"=>$cantidad,
                        "transactionState"=>'Visto',
                        "transation_value"=>$precio,
                        "id_anuncio"=>$id_a,
                        "estado_pago"=>'Visto',
                        "id_user_compra"=>$id_u]);
                }
            }    

            $ad=Anuncios::where("id",$anuncio)->get();
             
            if($ad[0]->user_id!=$user_id){

                    $us_clic=DetalleClicAnuncio::where([
                                                ["id_usuario",$user_id],
                                                ["id_anuncio",$ad[0]->id]
                                            ])
                                        ->get();
                    $uu=User::where("id",$ad[0]->user_id)->get();
                    $uc=User::where("id",$user_id)->get();

                    if(count($us_clic)>0){
                        //dd($us_clic);
                        DetalleClicAnuncio::where([
                                                    ["id_usuario",$user_id],
                                                    ["id_anuncio",$ad[0]->id]
                                                  ])->increment("num_vistas",1);

                        DetalleClicAnuncio::where([["id_usuario",$user_id],["id_anuncio",$ad[0]->id]])
                                            ->update(["id_usuario"=>$user_id,
                                                        "tipo"=>$tipo,
                                                        "updated_at"=>Carbon::now('America/Bogota')

                                                    ]);
                        $rc=Recargas::select("valor")
                            ->where("user_id",$ad[0]->user_id)
                            ->get();                    
                        
                    }else{
                        DetalleClicAnuncio::create([
                                        "id_anuncio"=>$ad[0]->id,
                                        "id_usuario"=>$user_id,
                                        "costo"=>$costo,
                                        "tipo"=>$tipo,
                                        "created_at"=>Carbon::now('America/Bogota')
                                    ]);
                         DB::table("recargas")->where([
                        ["user_id","=",$ad[0]->user_id],
                        ["valor",">",0]
                        ])->decrement('valor',floatval($costo));
                        

                       /*Registro la consulta realizada*/
                        $rc=Recargas::select("valor")
                            ->where("user_id",$ad[0]->user_id)
                            ->get();
                    }

     
                NotificacionAnuncio::dispatch($uu[0], [$ad[0],$uc[0]],$rc[0]->valor,"AnuncioClickeado");
                NotificacionAnuncio::dispatch($uc[0], [$ad[0],$uu[0],['url'=>route('anuncios_vistos')]],$rc[0]->valor,"AnuncioClickeadoCliente");
            }
        //valido valor de recarga
            if($uu[0]->costo_clic>0){
                if(($rc[0]->valor/$uu[0]->costo_clic)<20){
                    //aqui envie el mail
                    NotificacionAnuncio::dispatch($uu[0], $ad,$rc[0]->valor,"RecargaCasiAgotada");
                }
            }


            $vi=true;
            if($costo > $rc[0]->valor){
                $vi=false;
                Recargas::where("user_id",$ad[0]->user_id)->update(["status"=>"AGOTADA"]);
                NotificacionAnuncio::dispatch($uu[0], $ad,$rc[0]->valor,"RecargaAgotada");
            }

            if(floatval($rc[0]->valor)>0){
                return response()->json(["respuesta"=>true,
                                        "ad_visible"=>$vi,
                                        "limite_clic"=>$rc[0]->valor]);
            }else{
                 return response()->json(["respuesta"=>false,
                                        "ad_visible"=>$vi,
                                        "limite_clic"=>$rc[0]->valor]);
            }  



        }else{
            return response()->json(["respuesta"=>true,
                                        "ad_visible"=>true,
                                        "limite_clic"=>0]);
        }


    }

    public function cambiar_valor_clic($id_u,$costo){
      
        User::where("id",$id_u)->update(["costo_clic"=>$costo]);
        return response()->json(["respuesta"=>true,
                                    "mensaje"=>"Se ha cambiado el costo de el clic"]);

    }

    public function ver_recargas_mis_recargas($id){
        $mi_lista=Recargas::select('users.id',
                                    'users.name',
                                    'detalle_recargas.tipo_recarga',
                                    'detalle_recargas.estado_detalle_recarga',
                                    'detalle_recargas.valor_recarga',
                                    'detalle_recargas.referencia_pago',
                                    'detalle_recargas.referencia_pago_pay_u',
                                    'detalle_recargas.created_at')
                            ->join("users","recargas.user_id","users.id")
                            ->join('detalle_recargas','detalle_recargas.id_user','users.id')
                            ->orderBy('users.id')       
                            ->where("users.id",$id)    
                            ->get();   
         //dd($mi_lista);                   
         return response()->json(["respuesta"=>true,
                                    "datos"=>$mi_lista,
                                    "mensaje"=>"Se ha consultado los datos"]);                    
    }
    /**
     * Funcion para registrar los pagos de las recarags previos al el envio a payu
     * @param  [type] $id              [description]
     * @param  [type] $valor_recarga   [description]
     * @param  [type] $referencia_pago [description]
     * @return [type]                  [description]
     */
    public function registrar_recarga($id,$valor_recarga,$referencia_pago,$valor_pagado){
        $u = new User();

        return $u->registrar_recarga($id,$valor_recarga,$referencia_pago,$valor_pagado);
        
    }

     /**
     * Funcion para confirmar el pago por parte de el cliente
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    function confirmar_pago_recarga(Request $request){
        //registrar cambio de estado del pago
                DB::table("detalle_recargas")
                          ->where("id",$request['id_pago'])
                          ->update([
                                    'estado_detalle_recarga'=> 'PENDIENTE APROBACION', 
                                    'updated_at'=>Carbon::now('America/Bogota'),
                                    'referencia_pago_pay_u'=>$request['numero_transaccion']
                                  ]);
                $recarga=DB::table('detalle_recargas')->where('id',$request['id_pago'])->get();

                
                $anunciante=User::where("id",$recarga[0]->id_user)->get();
                //dd($anunciante[0],$recarga[0]);
                $uadmin=User::role('admin')->get();
                
                foreach ($uadmin as $key => $admin) {

                       NotificacionAnuncio::dispatch($admin, [$anunciante[0],$recarga[0] ,['url'=>config('app.url').'/recargas']],0,"ConfirmarRecargaTransferenciaBancaria");  

                       
                }



                


        return response()->json(['mensaje'=>"Hemos confirmado tu recarga, uno de nuestros agentes confirmara tu pago gracias por confiar en ".config('app.name').'','respuesta'=>true]);
    }

     /**
     * Funcion para confirmar el pago hecho en la entidad bancaria
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    function confirmar_pago_recarga_entidad_bancaria(Request $request){
        //dd($request);
        DB::table("detalle_recargas")
                          ->where("id",$request['id_pago'])
                          ->update([
                            'estado_detalle_recarga'=>'APROBADA',
                            'updated_at'=>Carbon::now('America/Bogota')             
                                  ]);
                //enviar email notificacion del pago realizado al anunciante
                //enviar mensaje de confirmacion al comprador            
                $dtr=DB::table('detalle_recargas')
                          ->where("id",$request['id_pago'])
                          ->first();
                $cliente=User::where('id',$dtr->id_user)->first();
                Recargas::where("user_id",$dtr->id_user)->increment('valor',$dtr->valor_recarga);

                Recargas::registrar_bonificacion($cliente->id,$dtr->valor_recarga,$cliente->name);
                
                $recarga = Recargas::where("user_id",$dtr->id_user)->get();

                

                

                NotificacionAnuncio::dispatch($cliente, [],[$recarga[0],["valor"=>$dtr->valor_recarga,"fecha"=>date('Y-m-d')]],"RecargaExitosa");

            


        return back()->with('success',"Hemos confirmado la recarga del usuario ".$cliente->name." recuerdale al usuario que hemos enviado la información al correo electrónico, ".$cliente->email." gracias por confiar en ".config('app.name'));
    }
    /**
     * Funcion para confirmar el pago hecho en la entidad bancaria
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    function confirmar_pago_recarga_efectivo(Request $request){
        
                $dtr=DB::table("detalle_recargas")
                          ->where([
                                ["id_user",$request['id_pago']],
                                ['estado_detalle_recarga','PENDIENTE APROBACION'],
                                ['metodo_pago','Pago en efectivo']
                            ])->get();
                       
                if(count($dtr)>0){
                    DB::table("detalle_recargas")
                          ->where([
                                ["user_id",$request['id_pago']],
                                ['estado_detalle_recarga','PENDIENTE APROBACION']
                            ])
                          ->take(1)
                          ->update([
                            'estado_detalle_recarga'=>'APROBADA',
                            'updated_at'=>Carbon::now('America/Bogota'),
                            'valor_pagado'=>$request['valor_a_recargar']             
                                  ]);
                    $dtr=DB::table('detalle_recargas')
                          ->where("id",$request['id_pago'])
                          ->first();
                }else{
                      $id=DB::table("detalle_recargas")
                            ->insertGetId([
                             'id_user'=>$request['id_pago'],       
                            'tipo_recarga'=>'PAGO',    
                            'referencia_pago'=>'rec-'.time()."-".date("s"),    
                            'referencia_pago_pay_u'=>'rec-'.time()."-".date("s"),    
                            'estado_detalle_recarga'=>'APROBADA',
                            'created_at'=>Carbon::now('America/Bogota'),
                            'updated_at'=>Carbon::now('America/Bogota'),
                            'valor_pagado'=>$request['valor_a_recargar'],
                            'valor_recarga'=>$request['valor_a_recargar']             
                                  ]);  
                    $dtr=DB::table('detalle_recargas')
                          ->where("id",$id)
                          ->first();
                }


               
                 
                $cliente=User::where('id',$dtr->id_user)->first();
                Recargas::where("user_id",$dtr->id_user)->increment('valor',$dtr->valor_recarga);
                $r=Recargas::where("user_id",$dtr->id_user)->first();
                if($r->valor > 0){
                  Recargas::where("user_id",$dtr->id_user)->update(['status'=>'ACTIVA']);
                }
                
                
                Recargas::registrar_bonificacion($cliente->id,$dtr->valor_recarga,$cliente->name);
                $recarga = Recargas::where("user_id",$dtr->id_user)->get();

                NotificacionAnuncio::dispatch($cliente, [],[$recarga[0],["valor"=>$dtr->valor_recarga,"fecha"=>date('Y-m-d')]],"RecargaExitosa");

        return back()->with('success',"Hemos registrado la recarga del usuario ".$cliente->name." recuerdale al usuario que hemos enviado la información al correo electrónico, ".$cliente->email." gracias por confiar en ".config('app.name'));
    
    }
}
