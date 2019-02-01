<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\NotificacionAnuncio;
use App\Recargas;
use App\GuzzleModel;
use App\Payu;
use App\User;
use App\pagos;
use Carbon\Carbon;
use DB;

class Anuncios extends Model
{
    //
    protected $fillable = ['id','cod_anuncio','tipo_anuncio','ubicacion','cod_postal','localidad','departamento','ciudad', 'moneda','nombre_moneda','criptomoneda','nombre_cripto_moneda','banco','margen','precio_minimo_moneda','limite_min','limite_max','lugar','terminos','user_id','estado_anuncio'
  	];

  /**
   * funcion que me retorna un conjuto de anuncios listos para mostra en la tabla
   * @param  [type] $anuncios_consultados [description]
   * @return [type]                       [description]
   */
  public function ver_anuncios($anuncios_consultados){
                                           
  		   $tipo="PRODUCTION";
         
         
         if(config('app.debug')){
              $tipo='TEST';  
         }   
  		   
         $pu = Payu::where("type",$tipo)->get();
  		   $guzzle=new GuzzleModel();
         $coinmarketcap=$guzzle->get_response_listings();
         //dd($anuncios_consultados);
         $v=0;
         //genero respuesta para anuncios de ventas
         $arr_anuncios=array();
         
        
        foreach ($anuncios_consultados as $key => $value) {
             /**
               * [$mostrar_info description] variable para validar la visibilidad del boton información
               * @var boolean
               */
              $mostrar_info=true;
              /**
               * [$mostrar_payu description] variable para la validar la visibilidad del boton de compra o venta
               * @var boolean
               */
              $mostrar_payu=true;
              /**
               * [$mostrar_calificar description] variable para la validar la visibilidad del boton de calificacion
               * @var boolean
               */
              $mostrar_calificar=true;
              /**
               * [$id_detalle_clic description] variable que contiene el id del detalle del clic para el usuario que consulta determinado anuncio
               * @var integer
               */
              $id_detalle_clic=0;
              /**
               * [$visto description] Variable para incializar la fecha la viista de el cliente
               * @var [type]
               */
              $visto="";//=Carbon::now('America/Bogota')->format('M d, Y h:i A');
              /**
               * [Variable para identificar si el usuario tiene una transaccion pendiente]
               * @var boolean
               */
              $transaccion_pendiente=[];

              
            //dd($value);
            if($value->moneda!=null && $value->criptomoneda!=null){
                        //consulto la api para obteenr valores
                        $vv=$guzzle->get_specific_currency($value->criptomoneda,$value->moneda);
                       
                       
                        $jsvv=json_decode($vv);

                        

                        if(property_exists($jsvv,"respuesta")==false){

                               $arr=(array)$jsvv->quotes;

                                $precio_moneda_usd=$this->calc_precio_moneda($arr["USD"]->price,$value->margen,$value->precio_minimo_moneda);
                                //precio base en USD
                                //$precio_moneda_usd=(float)number_format(($arr["USD"]->price),2,".","")+(float)(number_format($arr["USD"]->price*$value->margen,2,'.','')/100);
                                $precio_moneda=$this->calc_precio_moneda($arr[$value->moneda]->price,$value->margen,$value->precio_minimo_moneda);
                                //precio base en moneda especificada en anucnio
                                //$precio_moneda=(float)number_format(($arr[$value->moneda]->price),2,".","")+(float)(number_format($arr[$value->moneda]->price*$value->margen,2,'.','')/100);

                                if($precio_moneda==0){
                                    $precio_moneda=number_format($arr[$value->moneda]->price,2,'.','');
                                }

                               

                                
                                if($value->tipo_anuncio=="venta"){
                                    $desc="Venta de ".$jsvv->name;
                                }else{
                                    $desc="Compra de ".$jsvv->name;
                                }


                                $cod=$value->cod_anuncio."-".$value->id."-".time()."-".$key;
                                    if($value->moneda != "BRL" && $value->moneda != "CLP" && $value->moneda != "COP" && $value->moneda != "MXN" && $value->moneda != "USD"){

                                        $vv=number_format(((float)number_format($value->limite_min / (float)number_format($precio_moneda,2,'.',''),2,'.',''))*number_format($precio_moneda_usd,2,'.',''),2,".","");

                                        $hs=$pu[0]->hashear($cod,$vv,"USD");

                                    }else{
                                        $hs=$pu[0]->hashear($cod,$value->limite_min,$value->moneda);
                                    }
                                    $u=new User();

                                    $horarios=$u->ver_horarios($value->user_id,date('w'));

                                    if(( (float)$value->valor < (float)$value->costo_clic) || (float)$value->valor == 0 ){
                                            //$mostrar_info=false;
                                    }
                                   
                                    //var_dump($mostrar_info);
                                    //dd($horarios);
                                    if($horarios['respuesta']==false){
                                      //$mostrar_info=false;                                      
                                    }

                                     if(Auth()->user()!=null){


                                       	  $dtc=DB::table('detalle_clic_anuncios')
                                       					->where([
  	                                     							['id_anuncio',$value->id],
  	                                     							['id_usuario',auth()->user()->id],
                                                      ['tipo','<>','compra']
                                       							])->get();
                                          //valido si no existe comentario del usuario  logueado        
                                          if(count($dtc)>0){
                                             
                                           		$f=new Carbon($dtc[0]->updated_at);
                                           		$visto=$f->format('M d, Y h:i A');
                                              $id_detalle_clic=$dtc[0]->id;
                                            if($dtc[0]->calificacion!=null){

                                                $mostrar_calificar=false;
                                            }
                                            
                                         	}		
                                     }                                 
                                     if(auth()->user()!=null){
                                      $transaccion_pendiente=$u->compra_pendiente($value->id,auth()->user()->id); 
                                     }   
                                     

                                     //obtener los comentarios
                                     //dd([$precio_moneda,number_format($value->limite_min,0,'','')]);
                                     $comentarios=$this->ver_comentarios($value->id,5);
 
                                        $arr_anuncios[$v++]=(object)[
                                                         "id_anunciante"=>$value->user_id,
                                                        "id_anuncio"=>$value->id,
                                                        "cod_anuncio"=>$cod,
                                                        "tipo_anuncio"=>$value->tipo_anuncio,
                                                        //"descripcion"=>$desc." cant # ".number_format($value->limite_min / (float)number_format($precio_moneda,2,".",""),2,",","."),
                                                        "descripcion"=>"Pagos y recargas Metalbit",
                                                        "banco"=>$value->banco,
                                                        "ubicacion"=>$value->ubicacion,
                                                        "precio_moneda"=>number_format($precio_moneda,2,',', '.'),
                                                        "precio_moneda_sf"=>$precio_moneda,
                                                        "precio_moneda_cf"=>number_format($precio_moneda,2,'.',''),
                                                        "precio_moneda_usd"=>number_format($precio_moneda_usd,2,',', '.'),
                                                        "precio_moneda_usd_sf"=>$precio_moneda_usd,
                                                        "precio_moneda_usd_cf"=>number_format($precio_moneda_usd,2,'.',''),
                                                        "cripto_moneda"=>$jsvv->name,
                                                        "id_cripto_moneda"=>$jsvv->id,
                                                        "moneda"=>$value->moneda,
                                                        "nombre_moneda"=>$value->nombre_moneda,
                                                        "margen_gananacia"=>$value->margen,
                                                        "limite_min"=>$value->limite_min,
                                                        "limite_max"=>$value->limite_max,
                                                        "terminos"=>$value->terminos,
                                                        "costo_clic"=>$value->costo_clic,
                                                        "lugar"=>$value->lugar,
                                                        "correo_ofertante"=>$value->email,
                                                        "name"=>$value->name,
                                                        "phone"=>$value->phone,
                                                        "id"=>$value->id,
                                                        "merchantId"=>$pu[0]->merchantId,
                                                        "accountId"=>$pu[0]->accountId,
                                                        "hash"=>$hs,
                                                        "resp"=>$pu[0]->urlResponse,
                                                        "conf"=>$pu[0]->urlConfirm,
                                                        "error"=>$pu[0]->urlError,
                                                        "url_api"=>$pu[0]->urlApi,
                                                        "limite_clic"=>$value->valor,
                                                        "btn_info"=>$mostrar_info,
                                                        "btn_payu"=>$mostrar_payu,
                                                        "btn_calificar"=>$mostrar_calificar,
                                                        "calificacion"=>$value->calificacion,
                                                        "visto"=>$visto,
                                                        "id_detalle_clic"=>$id_detalle_clic,
                                                        "comentarios"=>$comentarios,
                                                        "estado_anuncio"=>$value->estado_anuncio,
                                                        "horario"=>$horarios['horario'],
                                                        "transaccion_pendiente"=>$transaccion_pendiente
                                                    ];

                                }


                        }else{
                              //dd($value);
                              //AlertAnuncio::dispatch($email[0], $value,$limite_clic[0]->valor);
                              NotificacionAnuncio::dispatch($email[0], $value,$limite_clic[0]->valor,"CriptoMonedaInhabilitada");
                              Anuncios::where('id',$value->id)->update([
                                                    "estado_anuncio",'0'
                                                ]);
                        }


            //}//fin if


        }//fin foreach
        //dd($arr_anuncios);
        return $arr_anuncios;
  }

  /**
   * [permite consultar los comenatarios de cada anuncio] 
   * @param  [type] $id     [description]
   * @param  [type] $limite [description]
   * @return [type]         [description]
   */
  public function ver_comentarios($id,$limite){
    
      $comentarios=DB::table('detalle_clic_anuncios')
                            ->where([['id_anuncio',$id],['detalle_clic_anuncios.calificacion','<>',NULL]])
                            ->join('users','users.id','detalle_clic_anuncios.id_usuario')
                            ->limit($limite)
                            ->get();

     return $comentarios;
  }
  /**
   * Funcion para calcular el valor de la moneda que va a tener en el anuncio
   * @param  [type] $precio [precio de la moneda]
   * @param  [type] $margen [margen de ganancia de el anuncio]
   * @param  [type] $precio_minimo_moneda [limite minimo de precio de moneda]
   * @return [type]         [valor de la moneda]
   */
  public function calc_precio_moneda($precio,$margen,$precio_minimo_moneda){
    $cal_precio=(float)number_format(($precio),2,".","")+((float)(number_format($precio*$margen,2,'.',''))/100);
    
    if($cal_precio<$precio_minimo_moneda){
      return $precio_minimo_moneda;
    }
    return $cal_precio;
  }

  public function registro_venta_anuncio($req){
    //dd($req['transactionState']);
    switch ($req['transactionState']) {
    case 4:
      //aprobada

        $comprador=User::where("email",$req['buyerEmail'])->get();
        
        $p=DB::table("pagos")->where("transactionId",$req['reference_pol'])->get();
        $empresa=Payu::all();
        //dd([$p,$comprador[0]->id]);
        $id_ad=explode("-",$req['referenceCode'])[1];  
        if(count($p)>0){
            if($p[0]->transactionId==$req['reference_pol']){
              //el pago ya se habia registrado con otro estado
              if($p[0]->estado_pago=="APROBADA"){
                $msn="Ya habías registrado esta referencia de pago";

                return view('payu.error_payu')->with("mensaje",$msn); 
                
              }else{    
                $msn="Hemos registrado tu compra";

                DB::table("pagos")
                          ->where("id",$p[0]->id)
                          ->update(["estado_pago"=>"APROBADA",
                                    'transactionState'=>'Pago aceptado',
                                    'transactionStatePayu'=>$req['transactionState'],
                                    'moneda_pago'=>$req['currency']
                                  ]);

                $anuncio=Anuncios::where("id",$id_ad)->get();
                //dd($anuncio);
                $anunciante=User::where("id",$anuncio[0]->user_id)->get();
                $pg=pagos::where([
                      'transactionId' => $req['reference_pol']
                    ])->get();
                          //aqui debo enviar los datos de confirmación a la cuenta de correo
                NotificacionAnuncio::dispatch($comprador[0], [$anunciante[0],$anuncio[0],$pg[0],['url'=>config('app.url')]],[],"CompraExitosa");
                NotificacionAnuncio::dispatch($anunciante[0], [$comprador[0],$anuncio[0],$pg[0],['url'=>config('app.url')]],$p[0]->transation_value,"CompraExitosaAnunciante");
                return view('payu.confirmar_payu')->with("respuesta",$req)
                    ->with("empresa",$empresa)
                    ->with("cliente",$comprador)
                    ->with("estado","Aprobada")
                    ->with("entidad",$req['lapPaymentMethod']);  
              }

              
            }
        }else{

          if(count($comprador)==0){
            $msn="Los datos de este usuario no corresponde a ninguno que este registrado en MetalBit ";

            return view('payu.error_payu')->with("mensaje",$msn);
          }else{
             $pg=DB::table("pagos")
                  ->where([
                      ["id_anuncio",$id_ad],
                      ['id_user_compra',$comprador[0]->id],
                      ["estado_pago","PENDIENTE"]
                    ])->get();
            if(count($pg)>0){
                  $empresa=Payu::all();
                  //dd($empresa);
                  $id_ad=explode("-",$req['referenceCode'])[1];
                  //dd([$id_ad,$comprador[0]->id]);
                  //dd($comprador[0]->id);
                  DB::table("pagos")
                      ->where([
                          ["id_anuncio",$id_ad],
                          ['id_user_compra',$comprador[0]->id],
                          ["estado_pago","PENDIENTE"]
                        ])
                      ->update([
                     'transactionId' => $req['reference_pol'],
                     'transactionStatePayu'=>$req['transactionState'],
                     'transactionState'=>'Pago aceptado',
                     'moneda_pago'=>$req['currency'],
                     'transation_value' => $req['TX_VALUE'],
                      "metodo_pago"=>$req['lapPaymentMethod'],
                      "estado_pago"=>"APROBADA",
                      "updated_at"=>Carbon::now('America/Bogota')
                   ]);

                    $anuncio=Anuncios::where("id",$id_ad)->get();
                    //dd($anuncio);
                    $anunciante=User::where("id",$anuncio[0]->user_id)->get();
                    $pg=pagos::where([
                      'transactionId' => $req['reference_pol']
                    ])->get();
                          //aqui debo enviar los datos de confirmación a la cuenta de correo
                    NotificacionAnuncio::dispatch($comprador[0], [$anunciante[0],$anuncio[0],$pg[0]],[],"CompraExitosa");
                    NotificacionAnuncio::dispatch($anunciante[0], [$comprador[0],$anuncio[0],$pg[0]],$req['TX_VALUE'],"CompraExitosaAnunciante");   
            }else{

                $msn="Esta referencia de pago no corresponde a ningna registrada en nuestro sistema, por favor verifica con tu plataforma de pagos ";  
              
                
                return view('payu.error_payu')->with("mensaje",$msn);
            }
              

          }
          

          return view('payu.confirmar_payu')->with("respuesta",$req)
                    ->with("empresa",$empresa)
                    ->with("cliente",$comprador)
                    ->with("estado","Aprobada")
                    ->with("entidad",$req['lapPaymentMethod']);    
        }
      break;
    case 7:
        //dd($req);
        //pendiente de confirmacion efecty
        $comprador=User::where("email",$req['buyerEmail'])->get();
        $p=DB::table("pagos")->where("transactionId",$req['reference_pol'])->get();
        $id_ad=explode("-",$req['referenceCode'])[1];  
        
        if(count($p)>0){
            if($p[0]->transactionId==$req['reference_pol']){
              $msn="Ya habías registrado esta referencia de pago, su estado actual es: ".$p[0]->estado_pago;
              return view('payu.error_payu')->with("mensaje",$msn);
            }
              
        }else{
          if(count($comprador)==0){
            $msn="Los datos de este usuario no corresponde a ninguno que este registrado en ".config('app.name');

            return view('payu.error_payu')->with("mensaje",$msn);
          }else{
              $empresa=Payu::all();
              //dd($empresa);
              $id_ad=explode("-",$req['referenceCode'])[1];
              //dd([$comprador[0]->id,$id_ad]);  
              /*dd([DB::table("pago")
                  ->where([
                      ["id_anuncio",(int)$id_ad],
                      ['id_user_compra',$comprador[0]->id],
                      ["metodo_pago","PENDIENTE"]
                    ])->get(),$comprador[0]->id,(int)$id_ad]);*/
              DB::table("pagos")
                  ->where([
                      ["id_anuncio",$id_ad],
                      ['id_user_compra',$comprador[0]->id],
                      ["estado_pago","PENDIENTE"]
                    ])
                  ->update([
                 'transactionId' => $req['reference_pol'],
                 'transactionStatePayu'=>$req['transactionState'],
                 'transation_value' => $req['TX_VALUE'],
                  "metodo_pago"=>$req['lapPaymentMethod'],
                  "estado_pago"=>"PENDIENTE",
                  'moneda_pago'=>$req['currency'],
                  "updated_at"=>Carbon::now('America/Bogota')
               ]);

          }
          //dd($req['reference_pol']);
          $anuncio=Anuncios::where("id",$id_ad)->get();
          $anunciante=User::where(".id",$anuncio[0]->user_id)->get();
          $pg=pagos::where([
                      ["id_anuncio",$id_ad],
                      ['id_user_compra',$comprador[0]->id],
                      ['transactionId' , $req['reference_pol']]
                    ])->get();
          //dd( [$comprador[0],$anunciante[0],$anuncio[0],$pg]);
          //aqui debo enviar los datos de confirmación a la cuenta de correo
          NotificacionAnuncio::dispatch($comprador[0], [$anunciante[0],$anuncio[0],$pg[0]],[],"CompraPendiente");
          
          //dd($anunciante[0]);
          NotificacionAnuncio::dispatch($anunciante[0],[$comprador[0],$anuncio[0],$pg[0]],$req['TX_VALUE'],"CompraPendienteAnunciante");

          return view('payu.confirmar_payu')->with("respuesta",$req)
                    ->with("empresa",$empresa)
                    ->with("cliente",$comprador)
                    ->with("estado","Pendiente aprobación")
                    ->with("entidad",$req['lapPaymentMethod']);
        }
        //dd(count($cliente));
        break;
    case 6:
      //dd($req);
        $id_ad=explode("-",$req['referenceCode'])[1];
        $comprador=User::where("email",$req['buyerEmail'])->get();  
        $pg=DB::table("pagos")
                  ->where([
                      ["id_anuncio",$id_ad],
                      ['id_user_compra',$comprador[0]->id],
                      ["estado_pago","PENDIENTE"]
                    ])->get();

        if(count($pg)>0){
            //rechazada
            DB::table("pagos")
               ->where([
                        ["id_anuncio",$id_ad],
                        ["id_user_compra",$comprador[0]->id]
                      ])
               ->update([
                  'transactionId' => $req['reference_pol'],
                  'transactionStatePayu'=>$req['transactionState'],              
                  'transation_value' => $req['TX_VALUE'],
                  'metodo_pago'=>$req['lapPaymentMethod'],
                  'moneda_pago'=>$req['currency'],
                  'estado_pago'=>"RECHAZADA" ]);        
            NotificacionAnuncio::dispatch($comprador[0], [$pg[0]],[],"CompraRechazada");
              
            $msn="Tu pago ha sido rechazado, intentalo nuevamente o comunícate con tu banco o entidad de pagos para verificar, que esta sucediendo";  
        }else{
          $pg=DB::table("pagos")
                  ->where([
                      ["id_anuncio",$id_ad],
                      ['id_user_compra',$comprador[0]->id],
                      ["transactionId",$req['reference_pol']]
                    ])->get();
            if(count($pg)>0){
              $msn="Esta referencia de pago fue rechaza anteriormente, por favor intenta de nuevo para validar que se registre el pago";  
            }else{
              $msn="Esta referencia de pago no corresponde a ninguna registrada en nuestro sistema, por favor verifica con tu plataforma de pagos ";    
            }
            
        }
        
        return view('payu.error_payu')->with("mensaje",$msn);
        
      break;  
    default:
        $msn="No Se ha registrado exitosamente tu compra ";
        return view('payu.error_payu')->with("mensaje",$msn);
        break;
    }
  }

            
  	
}
