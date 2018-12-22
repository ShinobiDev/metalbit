<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NotificacionAnuncio;
use App\DetalleClicAnuncio;
use App\Recargas;
use App\detalle_recargas;
use App\User;
use App\Anuncios;
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
                            ->where("users.id",$recargas[0]->id)    
                            ->get();   
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

        /*if($tipo=="compra"){
            $id_a=$anuncio;
            $id_u=$user_id;
            $PG=DB::table('pagos')->where([
                                        ["id_anuncio",$id_a],
                                        ["metodo_pago","PENDIENTE"],
                                        ["id_user_compra",$id_u]
                                    ])->get();
            if(count($PG)>0){
                DB::table('pagos')
                             ->where("id",$PG[0]->id)  
                             ->update(["transactionId"=>"-",
                                "transactionQuantity"=>$cantidad,
                                "transactionState"=>0,
                                "transation_value"=>$precio,
                                "id_anuncio"=>$id_a,
                                "metodo_pago"=>'PENDIENTE',
                                "id_user_compra"=>$id_u]);
                
                
            }else{
                DB::table('pagos')->insert(["transactionId"=>"-",
                                "transactionQuantity"=>$cantidad,
                                "transactionState"=>0,
                                "transation_value"=>$precio,
                                "id_anuncio"=>$id_a,
                                "metodo_pago"=>'PENDIENTE',
                                "id_user_compra"=>$id_u]);
            }
        } */   


        $ad=Anuncios::where("id",$anuncio)->get();




        //descuento al cliente solo si no es el anunciante
        if($ad[0]->user_id!=$user_id){
            DB::table("recargas")->where([
                    ["user_id","=",$ad[0]->user_id],
                    ["valor",">",0]
                    ])->decrement('valor',floatval($costo));
            $uu=User::where("id",$ad[0]->user_id)->get();
            $uc=User::where("id",$user_id)->get();

           /*Registro la consulta realizada*/
            $rc=Recargas::select("valor")
                ->where("user_id",$ad[0]->user_id)
                ->get();


            $us_clic=DetalleClicAnuncio::where([
                                            ["id_usuario",$user_id],
                                            ["id_anuncio",$ad[0]->id]
                                        ])
                                    ->get();
            /*
            aqui valido si el registr ya existe y en ese caso le agrego el numero de visitas y le actualizo la fecha
             */
            //echo Carbon::now('America/Bogota');
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
                
            }else{
                DetalleClicAnuncio::create([
                                "id_anuncio"=>$ad[0]->id,
                                "id_usuario"=>$user_id,
                                "costo"=>$costo,
                                "tipo"=>$tipo,
                                "created_at"=>Carbon::now('America/Bogota')
                            ]);
            }

            
            //dd($ad);
            NotificacionAnuncio::dispatch($uu[0], [$ad[0],$uc[0]],$rc[0]->valor,"AnuncioClickeado");
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
    public function registrar_recarga($id,$valor_recarga,$referencia_pago){
        $dt=detalle_recargas::where([
                                      ["id_user",$id],
                                      ["estado_detalle_recarga","REGISTRADA"]
                                    ])
                                 ->get();
        if(count($dt)==0){
            detalle_recargas::insert([
                    'tipo_recarga' => "PAGO",
                    'valor_recarga'=>$valor_recarga,
                    'referencia_pago'=>$referencia_pago,
                    'id_user'=>$id
                ]);
    
        }else{
          detalle_recargas::where([
                                      ["id_user",$id],
                                      ["estado_detalle_recarga","REGISTRADA"]
                                    ])
                                  ->update(["referencia_pago"=>$referencia_pago]);
        }
        
        return response()->json(["respuesta"=>true]);
        
    }
}
