<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NotificacionAnuncio;
use DB;
use App\Payu;
use App\Anuncios;
use App\Campania;
use App\User;
use App\pagos;
use App\Recargas;
use App\CuponesCampania;
use Carbon\Carbon;

class CampaniasController extends Controller
{
    public function index(){

    	$users_tramitadores=User::role('Comerciante')->get();
      
    	//dd($users);
    	return view('campanias.index')
              ->with('users_tramitadores',$users_tramitadores);
              
    }
    public function show(){
    	$c=Campania::where('id','>',0)->get();
    	
    	return view('campanias.show')->with('campanias',$c);
    }
    public function store(Request $request){
    	//dd($request); 
    	$data = $request->validate([
          'nombre_campania' => 'required|string|max:255',
          'numero_cupones' => 'required',
          'tipo_canje' => 'required',
          'tipo_campania' => '',
          'fecha_final_vigencia'=> '',
          'fecha_inicial_vigencia'=> '',
          'usuario_tramitador'=>'',
          'usuario_cliente'=>'',
          'limite_por_usuario'=>'',
          'valor_descuento_por'=>'',
          'valor_descuento_val'=>'',
          'moneda_descuento'=>'required',
          'costo_minimo'=>'int',
          'codigo_cupon'=>'',
          'tipo_dto'=>'',
          'es_acumulable'=>''
        ]);
        $tipo='personal';
        //dd($data);

        if($data['tipo_campania']=='compra'){

          if($data['usuario_cliente']==0){
            $tipo='global';
            
            $usuario=null;
          }else{
            $usuario=$data['usuario_cliente'];
          }  

        }else{

          if($data['usuario_tramitador']==0){
            $tipo='global';
            $usuario=null;
          }else{
            $usuario=$data['usuario_tramitador'];
          }

        }
        //dd($data);
        if($data['tipo_dto']=='porcentaje'){
          if($data['valor_descuento_por']==''){
            return back()
            ->with('error','Debes ingresar el porcentaje de descuento');
          }
          $valor_descuento=$data['valor_descuento_por'];
        }else{
          if($data['valor_descuento_val']==''){
            return back()
            ->with('error','Debes ingresar el valor de descuento');
          }
          $valor_descuento=$data['valor_descuento_val'];
        }


        if (false==isset($data['es_acumulable'])) {         
         $es_acumulable='0';  
        }else{
          $es_acumulable='1';  
        }
        
        
        $id_camp=Campania::insertGetId([
        				'nombre_campania'=>$data['nombre_campania'],
        				'tipo_campania'=>$tipo,
                'tipo_canje'=>$data['tipo_canje'],
                'fecha_inicial_vigencia'=>$data['fecha_inicial_vigencia'].' 00:00:00',
                'fecha_final_vigencia'=>$data['fecha_final_vigencia'].' 23:59:59',
        				'numero_de_cupones'=>$data['numero_cupones'],
                'cupones_disponibles'=>$data['numero_cupones'],
        				'id_user'=>$usuario,
                'tipo_de_descuento'=>$data['tipo_dto'],
                'es_acumulable'=>$es_acumulable,
                'limite_por_usuario'=>$data['limite_por_usuario'],
        				'valor_de_descuento'=>$valor_descuento,
                'moneda_descuento'=>$data['moneda_descuento'],
                'costo_minimo'=>$data['costo_minimo'],
        				'created_at'=>Carbon::now('America/Bogota'),
        				'updated_at'=>Carbon::now('America/Bogota')
        				]);

        if($data['codigo_cupon']==""){
          $cod=strtoupper(CuponesCampania::crear_cupon(6));
        }else{
          $cod = strtoupper($data['codigo_cupon']);
          $cc=CuponesCampania::where('codigo_cupon',$cod)->get();
          if(count($cc)>0){
             return back()
            ->with('error','Este código de cupón ya esta registrado, por favor cambialo o dejalo en blanco para generar uno automáticamente');
          }
        }

        for ($i=0; $i < $data['numero_cupones']; $i++) { 

        	CuponesCampania::insert(['codigo_cupon'=>$cod,
               							'id_campania'=>$id_camp,
               							'created_at'=>Carbon::now('America/Bogota'),
               							'updated_at'=>Carbon::now('America/Bogota')
               						]);

        }
        
        if($data['numero_cupones']==1){
        	$msn="Se ha creado 1 cupon";
        }else{
        	$msn="Se han creado ".$data['numero_cupones']." cupones";
        }
        return back()
        		->with('success',$msn.', para la campaña '.$data['nombre_campania'] );


    }

    public function ver_cupones($id){
    	//dd($id);
    	$c=CuponesCampania::where([['id_campania',$id],['estado','<>','sin canjear']])->get();
    	return response()->json(['respuesta'=>true,'datos'=>$c]);
    	//$c=Campania::where('id',$id)->get();
    	//return view('campanias.tabla_campañas')->with('campanias',$c);
    	
    }

    public function eliminar_cupones($id,$id_campana){
   		CuponesCampania::where('id',$id)->delete();
   		DB::table('campanias')->where('id',$id_campana)->decrement('numero_de_cupones',1);
      DB::table('campanias')->where('id',$id_campana)->decrement('cupones_disponibles',1);
   		$cam=Campania::where('id',$id_campana)->get();
   		$reload=true;
   		if($cam[0]->numero_de_cupones==0){
   			Campania::where('id',$id_campana)->delete();
   			

   		}
   		return response()->json(['respuesta'=>true,'mensaje'=>'Cupon eliminado correctamente','reload'=>$reload]); 		
    }	
    /**
     * Funcion para canjear los cupones para recargas
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function canjear_cupones_recargas(Request $request){
      
      $resultado=CuponesCampania::redimir_cupon_recargas($request['cupon'],Carbon::now('America/Bogota'),$request['usuario_que_redime'],$request['ref_pago'],'recarga',$request['valor_pago'],$request['valor_recarga'])[0]; 
      //dd($resultado);
      if($resultado['respuesta']==true){
            
            $camp=Campania::where('id',$resultado['id_campania'])->first();

            if($camp->tipo_de_descuento=='porcentaje'){
                  if($resultado['dto']==100){
                    
                      DB::table("detalle_recargas")->insert([
                                                            'id_user' => $request['usuario_que_redime'],
                                                            'valor_recarga'=>$request['valor_pago'],
                                                            "referencia_pago"=>time().$request['usuario_que_redime'],
                                                             "referencia_pago_pay_u"=>time().$request['usuario_que_redime'],
                                                             "metodo_pago"=>"RECARGA GRATIS",
                                                             "tipo_recarga"=>"RECARGA" ,
                                                             'estado_detalle_recarga'=>'APROBADA',
                                                             'created_at'=>Carbon::now('America/Bogota'),
                                                             'updated_at'=>Carbon::now('America/Bogota')
                                                            ]);
                      

                      Recargas::where("user_id",$request['usuario_que_redime'])->increment("valor",$request['valor_pago']);
                      Recargas::where("user_id",$request['usuario_que_redime'])->update(['status'=>'ACTIVA']);
                      $recar=Recargas::where("user_id",$anunciante->id)->first();
                      $user=User::where('id',$request['usuario_que_redime'])->first();
                      
                      NotificacionAnuncio::dispatch($user, [],[$recar,["valor"=>$request['valor_pago'],"fecha"=>date('Y-m-d')]],"RecargaExitosa");

                       return response()->json(['respuesta'=>true,
                                                'mensaje'=>'Cupón canjeado, hemos registrado una recarga completamente gratis.',
                                                'nuevo_valor'=>$request['valor_pago'],
                                                'recarga_gratis'=>true,
                                                'valor_recarga'=>$recar->valor,
                                                'hash_payu'=>false,
                                                'acumulable'=>$resultado['acumulable']]);
                   

                  }else{
                    $dto=$resultado['valor_dto'];

                    
                    
                    $pp = new Payu;
                    $hash=$pp->hashear($request['ref_pago'],$request['valor_pago']-$resultado['dto'],"COP");
                      
                    $u=new User();
                    $u->registrar_recarga($request['usuario_que_redime'],$dto,$request['valor_pago'],$request['ref_pago']);

                    return response()->json(['respuesta'=>true,
                                              'mensaje'=>'Cupón canjeado, ahora paga $ '.number_format($dto,0,',','.').' y recibiras $ '.number_format($request['valor_recarga'],0,',','.')." en tu recarga." ,
                                              'nuevo_valor'=>$dto,
                                              'nuevo_valor_recarga'=>number_format($request['valor_pago'],0,'',''),
                                              'recarga_gratis'=>false,
                                              'hash_payu'=>$hash,
                                              'acumulable'=>$resultado['acumulable']]);    
                  }
            }else if ($camp->tipo_de_descuento=='valor_neto'){
                //pendiente implementacion para valores netos 
                    $dto=$resultado['valor_dto'];
                    if($camp->tipo_canje=='regalo_recarga'){
                        DB::table("detalle_recargas")->insert([
                                                                      'id_user' => $request['usuario_que_redime'],
                                                                      'valor_recarga'=>$dto,
                                                                      'valor_pagado'=>0,
                                                                      "referencia_pago"=>time().$request['usuario_que_redime'],
                                                                       "referencia_pago_pay_u"=>time().$request['usuario_que_redime'],
                                                                       "metodo_pago"=>"RECARGA GRATIS",
                                                                       "tipo_recarga"=>"RECARGA" ,
                                                                       'estado_detalle_recarga'=>'APROBADA',
                                                                       'created_at'=>Carbon::now('America/Bogota'),
                                                                       'updated_at'=>Carbon::now('America/Bogota')
                                                              ]);
                        

                        Recargas::where("user_id",$request['usuario_que_redime'])->increment("valor",$dto);
                        Recargas::where("user_id",$request['usuario_que_redime'])->update(['status'=>'ACTIVA']);
                        $user=User::where('id',$request['usuario_que_redime'])->first();
                        $recar=Recargas::where("user_id",$request['usuario_que_redime'])->first();

                        NotificacionAnuncio::dispatch($user, [],[$recar,["valor"=>$dto,"fecha"=>date('Y-m-d')]],"RecargaExitosa");

                         return response()->json(['respuesta'=>true,
                                                  'mensaje'=>'Cupón canjeado, hemos registrado una recarga completamente gratis por el valor de $'.number_format($dto,0,',','.').'.',
                                                  'nuevo_valor'=>$dto,
                                                  'recarga_gratis'=>true,
                                                  'valor_recarga'=>$recar->valor,
                                                  'nuevo_valor_recarga'=>$dto,
                                                  'hash_payu'=>false,
                                                  'acumulable'=>$resultado['acumulable']]);
                    }
                    if((float)$request['valor_pago']==(float)$camp->valor_de_descuento){
                      
                      DB::table("detalle_recargas")->insert([
                                                                    'id_user' => $request['usuario_que_redime'],
                                                                    'valor_recarga'=>$dto,
                                                                    'valor_pagado'=>0,
                                                                    "referencia_pago"=>time().$request['usuario_que_redime'],
                                                                     "referencia_pago_pay_u"=>time().$request['usuario_que_redime'],
                                                                     "metodo_pago"=>"RECARGA GRATIS",
                                                                     "tipo_recarga"=>"RECARGA" ,
                                                                     'estado_detalle_recarga'=>'APROBADA',
                                                                     'created_at'=>Carbon::now('America/Bogota'),
                                                                     'updated_at'=>Carbon::now('America/Bogota')
                                                            ]);
                      

                      Recargas::where("user_id",$request['usuario_que_redime'])->increment("valor",$request['valor_recarga']);
                      Recargas::where("user_id",$request['usuario_que_redime'])->update(['status'=>'ACTIVA']);
                      $user=User::where('id',$request['usuario_que_redime'])->first();
                      $recar=Recargas::where("user_id",$request['usuario_que_redime'])  ->first();

                      NotificacionAnuncio::dispatch($user, [],[$recar,["valor"=>$request['valor_recarga'],"fecha"=>date('Y-m-d')]],"RecargaExitosa");

                       return response()->json(['respuesta'=>true,
                                                'mensaje'=>'Cupón canjeado, hemos registrado una recarga completamente gratis.',
                                                'nuevo_valor'=>$dto,
                                                'recarga_gratis'=>true,
                                                'valor_recarga'=>$recar->valor,
                                                'nuevo_valor_recarga'=>$dto,
                                                'hash_payu'=>false,
                                                'acumulable'=>$resultado['acumulable']]);


                    }else{
                      $pp = new Payu;
                      $hash=$pp->hashear($request['ref_pago'],$request['valor_pago']-$dto,"COP");


                        

                       $u=new User();
                      $u->registrar_recarga($request['usuario_que_redime'],$dto,$request['valor_pago'],$dto,$request['ref_pago']);

                      return response()->json(['respuesta'=>true,
                                                'mensaje'=>'Cupón canjeado, ahora paga $ '.number_format($request['valor_pago']-$dto,0,',','.').' y recibiras $ '.number_format($request['valor_recarga'],0,',','.')." en tu recarga." ,
                                                'nuevo_valor'=>$request['valor_pago']-$dto,
                                                'nuevo_valor_recarga'=>$request['valor_pago'],
                                                'recarga_gratis'=>false,
                                                'hash_payu'=>$hash,
                                                'acumulable'=>$resultado['acumulable']]); 
                    }

                    
                           
            }
      }else{
        return response()->json($resultado);  
      }  
      
    }
    public function canjear_cupones_compras(Request $request){
 
      $resultado=CuponesCampania::redimir_cupon_compra($request['cupon'],Carbon::now('America/Bogota'),$request['usuario_que_redime'],$request['ref_pago'],'compra',$request['valor_pago'],$request['id_anuncio'],$request['validar'],$request['moneda_pago'])[0]; 
      //dd($resultado);
      if($resultado['respuesta']==true){
            
            $camp=Campania::where('id',$resultado['id_campania'])->first();


            $anuncio=Anuncios::where("anuncios.id",$request['id_anuncio'])
                            ->select('anuncios.ciudad','anuncios.tipo_anuncio','anuncios.nombre_moneda','anuncios.nombre_cripto_moneda','anuncios.user_id','anuncios.cod_anuncio','anuncios.id')
                            ->get();

            //dd($camp->tipo_de_descuento);                
            if($camp->tipo_de_descuento=='porcentaje'){
                  //dd($resultado['dto'],100);
                  if($resultado['dto']==100){
                      
                       $cupon="100% de descuento en el valor del trámite";
                       DB::table('pagos')
                                ->insert(['transactionId'=>$request['codigo_anuncio'],
                                          'transactionState'=>4,
                                          'transactionQuantity'=>$request['moneda_comprada'],
                                          'transation_value'=>$request['valor_pago'],
                                          'id_anuncio'=>$request['id_anuncio'],
                                          'id_user_compra'=>$request['usuario_que_redime'],
                                          'metodo_pago'=>'BONO REGALO',
                                          'pay_value'=>$request['valor_comprado'],
                                          'estado_pago'=>'APROBADA',
                                          'created_at'=>Carbon::now('America/Bogota'),
                                          'updated_at'=>Carbon::now('America/Bogota')
                                         ]); 
                       $comprador=User::where('id',$request['usuario_que_redime'])->first();        
                       
                       $anunciante=User::where('id',$anuncio[0]->user_id)->first(); 

                         $pg=pagos::join('anuncios','pagos.id_anuncio','anuncios.id')->where([
                          'transactionId' => $request['codigo_anuncio']
                        ])->get();
                
                       NotificacionAnuncio::dispatch($comprador, [$anunciante,$anuncio[0],$pg[0],['url'=>config('app.url').'/admin/ver_mis_compras/'.$comprador->id.'?id='.$request['codigo_anuncio']]],[],"CompraExitosa");
                        $recar=Recargas::where("user_id",$anunciante->id)->first();
                        NotificacionAnuncio::dispatch($anunciante, 
                                                       [
                                                         $comprador,
                                                         $anuncio[0],
                                                         $pg[0],
                                                         ['url'=>config('app.url').'/admin/ver_mis_ventas/'.$anunciante->id.'?id='.$request['codigo_anuncio'],
                                                          
                                                         ],
                                                         ['cupon'=>$cupon]
                                                       ],
                                                        $recar->valor,"CompraExitosaAnunciante");
                                              
                       return response()->json(['respuesta'=>true,'mensaje'=>'Cupón canjeado, hemos registrado una compra completamente gratis.','nuevo_valor'=>$request['valor_pago'],'compra_gratis'=>true,'valor_compra'=>$request['valor_pago'],'hash_payu'=>false,'acumulable'=>$resultado['acumulable']]);

                  }else{

                      if($request['validar']=='true'){

                       $cupon="";
                       DB::table('pagos')
                                ->insert(['transactionId'=>$request['codigo_anuncio'],
                                          'transactionState'=>4,
                                          'transation_value'=>$request['valor_pago'],
                                          'transactionQuantity'=>$request['moneda_comprada'],
                                          'id_anuncio'=>$request['id_anuncio'],
                                          'id_user_compra'=>$request['usuario_que_redime'],
                                          'metodo_pago'=>'BONO REGALO',
                                          'estado_pago'=>'APROBADA',
                                          'pay_value'=>$request['valor_comprado'],
                                          'created_at'=>Carbon::now('America/Bogota'),
                                          'updated_at'=>Carbon::now('America/Bogota')
                                         ]); 
                       $comprador=User::where('id',$request['usuario_que_redime'])->first();        
                       $anuncio=Anuncios::where("anuncios.id",$request['id_anuncio'])
                            ->select('anuncios.ciudad','anuncios.tipo_anuncio','anuncios.nombre_moneda','anuncios.nombre_cripto_moneda','anuncios.user_id','anuncios.cod_anuncio','anuncios.id')
                            ->get();
                       $anunciante=User::where('id',$anuncio[0]->user_id)->first(); 

                       $pg=pagos::join('anuncios','pagos.id_anuncio','anuncios.id')->where([
                          'transactionId' => $request['codigo_anuncio']
                        ])->get();
                       
                       NotificacionAnuncio::dispatch($comprador, [$anunciante,$anuncio[0],$pg[0],['url'=>config('app.url').'/admin/ver_mis_compras/'.$comprador->id.'?id='.$request['codigo_anuncio']]],[],"CompraExitosa");
                        $recar=Recargas::where("user_id",$anunciante->id)->first();

                        NotificacionAnuncio::dispatch($anunciante, 
                                                       [
                                                         $comprador,
                                                         $anuncio[0],
                                                         $pg[0],
                                                         ['url'=>config('app.url').'/admin/ver_mis_ventas/'.$anunciante->id.'?id='.$request['codigo_anuncio'],
                                                          
                                                         ],
                                                         ['cupon'=>$cupon]
                                                       ],
                                                        $recar->valor,"CompraExitosaAnunciante");


                        return response()->json(['respuesta'=>true,'mensaje'=>'Cupón canjeado, hemos registrado una compra completamente gratis.','nuevo_valor'=>$request['valor_pago'],'compra_gratis'=>true,'valor_compra'=>$request['valor_pago'],'hash_payu'=>false,'acumulable'=>$resultado['acumulable']]);

                      }




                    $dto=$resultado['valor_dto'];

                    
                    
                    $pp = new Payu;
                    //dd($request['ref_pago'],$resultado['valor_dto'],"COP");
                    $hash=$pp->hashear($request['ref_pago'],number_format($resultado['valor_dto'],0,'',''),"COP");
                      
                    $usuario=new User;
                    //dd($anuncio[0],$request['moneda_pago'],$request['usuario_que_redime'],$request['valor_dto'],$request['moneda_comprada']);
                    //dd($resultado['valor_dto']);
                    $usuario->registrar_venta($request['ref_pago'],number_format($resultado['valor_dto'],0,'',''),$request['moneda_pago'],$request['usuario_que_redime'],$request['moneda_comprada']);


                    return response()->json(['respuesta'=>true,'mensaje'=>'Cupón canjeado, ahora paga $ '.number_format($dto,0,',','.').' en lugar de $ '.number_format($request['valor_comprado'],0,',','.')." por tu trámite." ,'nuevo_valor'=>$dto,'compra_gratis'=>false,'hash_payu'=>$hash,'acumulable'=>$resultado['acumulable']]);    
                  }
            }else{
                //pendiente implementacion para valores netos 
                    $dto=$resultado['dto'];
                    
                    if((float)$request['valor_pago']==(float)$camp->valor_de_descuento){
                      
                     
                      $cupon="100% de descuento en el valor del trámite";
                       DB::table('pagos')
                                ->insert(['transactionId'=>$request['codigo_anuncio'],
                                          'transactionState'=>'Pago Aceptado',
                                          'transactionQuantity'=>$request['moneda_comprada'],
                                          'transation_value'=>$request['valor_pago'],
                                          'id_anuncio'=>$request['id_anuncio'],
                                          'id_user_compra'=>$request['usuario_que_redime'],
                                          'metodo_pago'=>'BONO REGALO',
                                          'estado_pago'=>'APROBADA',
                                          'pay_value'=>$request['valor_comprado'],
                                          'created_at'=>Carbon::now('America/Bogota'),
                                          'updated_at'=>Carbon::now('America/Bogota')
                                         ]); 
                       $comprador=User::where('id',$request['usuario_que_redime'])->first();
                       //dd($comprador);          
                       $anuncio=Anuncios::where("anuncios.id",$request['id_anuncio'])
                            ->select('anuncios.ciudad','anuncios.tipo_anuncio','anuncios.nombre_moneda','anuncios.nombre_cripto_moneda','anuncios.user_id')
                            ->get();
                       $anunciante=User::where('id',$anuncio[0]->user_id)->first(); 

                       
                       $pg=pagos::join('anuncios','pagos.id_anuncio','anuncios.id')->where([
                          'transactionId' => $request['codigo_anuncio']
                        ])->get();
                        
                       NotificacionAnuncio::dispatch($comprador, [$anunciante,$anuncio[0],$pg[0],['url'=>config('app.url').'/ver_mis_compras/'.$comprador->id.'?id='.$request['codigo_anuncio']]],[],"CompraExitosa");
                       $recar=Recargas::where("user_id",$anunciante->id)->first();
                     
                        NotificacionAnuncio::dispatch($anunciante, 
                                                       [
                                                         $comprador,
                                                         $anuncio[0],
                                                         $pg[0],
                                                         ['url'=>config('app.url').'/ver_mis_ventas/'.$anunciante->id.'?id='.$request['codigo_anuncio'],
                                                          
                                                         ],
                                                         ['cupon'=>$cupon]
                                                       ],
                                                        $recar->valor,"CompraExitosaAnunciante");


                        return response()->json(['respuesta'=>true,'mensaje'=>'Cupón canjeado, hemos registrado una compra completamente gratis.','nuevo_valor'=>$request['valor_pago'],'compra_gratis'=>true,'valor_compra'=>$request['valor_pago'],'hash_payu'=>false,'acumulable'=>$resultado['acumulable']]);


                    }else{


                      if($request['validar']=='true'){

                       $cupon="100% de descuento en el valor del trámite";
                       DB::table('pagos')
                                ->insert(['transactionId'=>$request['codigo_anuncio'],
                                          'transactionState'=>4,
                                          'transactionQuantity'=>$request['moneda_comprada'],
                                          'transation_value'=>$request['valor_pago'],
                                          'id_anuncio'=>$request['id_anuncio'],
                                          'id_user_compra'=>$request['usuario_que_redime'],
                                          'metodo_pago'=>'BONO REGALO',
                                          'estado_pago'=>'APROBADA',
                                          'pay_value'=>$request['valor_comprado'],
                                          'created_at'=>Carbon::now('America/Bogota'),
                                          'updated_at'=>Carbon::now('America/Bogota')
                                         ]); 
                       $comprador=User::where('id',$request['usuario_que_redime'])->first();        
                       $anuncio=Anuncios::where("anuncios.id",$request['id_anuncio'])
                            ->select('anuncios.ciudad','anuncios.tipo_anuncio','anuncios.nombre_moneda','anuncios.nombre_cripto_moneda','anuncios.user_id')
                            ->get();
                       $anunciante=User::where('id',$anuncio[0]->id_user)->first(); 

                        $pg=pagos::join('anuncios','pagos.id_anuncio','anuncios.id')->where([
                          'transactionId' => $request['codigo_anuncio']
                        ])->get();
            
                       NotificacionAnuncio::dispatch($comprador, [$anunciante,$anuncio[0],$pg[0],['url'=>config('app.url').'/admin/ver_mis_compras/'.$comprador->id.'?id='.$request['codigo_anuncio']]],[],"CompraExitosa");
                        $recar=Recargas::where("user_id",$anunciante->id)->first();
                        NotificacionAnuncio::dispatch($anunciante, 
                                                       [
                                                         $comprador,
                                                         $anuncio[0],
                                                         $pg[0],
                                                         ['url'=>config('app.url').'/admin/ver_mis_ventas/'.$anunciante->id.'?id='.$request['codigo_anuncio'],
                                                          
                                                         ],
                                                         ['cupon'=>$cupon]
                                                       ],
                                                        $recar->valor,"CompraExitosaAnunciante");


                        return response()->json(['respuesta'=>true,'mensaje'=>'Cupón canjeado, hemos registrado una compra completamente gratis.','nuevo_valor'=>$request['valor_pago'],'compra_gratis'=>true,'valor_compra'=>$request['valor_pago'],'hash_payu'=>false,'acumulable'=>$resultado['acumulable']]);
                      }


                      $pp = new Payu;
                      $hash=$pp->hashear($request['ref_pago'],$request['valor_pago']-$resultado['dto'],"COP");
                        

                      $usuario=new User;
                      $usuario->registrar_recarga($request['usuario_que_redime'],$dto,$request['valor_pago']+$dto,$request['ref_pago']);
                      
                      return response()->json(['respuesta'=>true,'mensaje'=>'Cupón canjeado, ahora paga $ '.number_format($request['valor_pago']-$dto,0,',','.').' en lugar de $ '.number_format($request['valor_comprado'],0,',','.')." por tu trámite." ,'nuevo_valor'=>$request['valor_pago']-$dto,'nuevo_valor_compra'=>$request['valor_pago'],'compra_gratis'=>false,'hash_payu'=>$hash,'acumulable'=>$resultado['acumulable']]); 
                    }

                    
                           
            }

        
        
        
      }else{
        return response()->json($resultado);  
      }  
      
    }
}
