<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Campania;
use App\Anuncios;
use App\Recargas;
use Carbon\Carbon;

class CuponesCampania extends Model
{
    //
    //
   

    public static function crear_cupon($length){
          $chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
          $clen   = strlen( $chars )-1;
          $cod  = '';

          for ($i = 0; $i < $length; $i++) {
                  $cod .= $chars[mt_rand(0,$clen)];
          }
          $codigo=CuponesCampania::where('codigo_cupon',$cod)->get();
          if(count($codigo)>0){
          		CuponesCampania::crear_cupon($length);
          }
          return ($cod);
    }

    public function campania(){
        return $this->belongsTo('App\Campania','id_campania');
    }  
    public function usuario(){
        return $this->belongsTo('App\User','id_usuario_canje');
    }  

    public static function  redimir_cupon_recargas($cupon,$fecha_canje,$id_usuario_canje,$transaccion_canje,$tipo_de_campania,$monto_valor_a_redimir,$valor_pagado){
        
        $camp=CuponesCampania::where([
                                    ['estado','sin canjear'],
                                    ['codigo_cupon',$cupon],
                                    //['transaccion_donde_se_aplico',$transaccion_canje]
                                  ])
                              ->orwhere([
                                    ['estado','canjeado'],
                                    ['codigo_cupon',$cupon],
                                    //['transaccion_donde_se_aplico',$transaccion_canje]
                                    ])
                              ->get();

        if(count($camp)>0){
          //dd($camp[0]->campania);
          //valido estado de la campañas
          if($camp[0]->campania->estado_campania=='ABIERTA' ){
              
                /*
                  AQUI VALIDAR FECHA
                 */
                  //dd($camp[0]->campania->fecha_inicial_vigencia,$camp[0]->campania->fecha_final_vigencia);
                 if($camp[0]->campania->fecha_inicial_vigencia != '0000-00-00 00:00:00' and $camp[0]->campania->fecha_final_vigencia != '0000-00-00 00:00:00'){
                  
                   $hoy=Carbon::now('America/Bogota');
                  
                  if($hoy->between(Carbon::parse($camp[0]->campania->fecha_inicial_vigencia),Carbon::parse($camp[0]->campania->fecha_final_vigencia))==false){
                          return array(['respuesta'=>false,'mensaje'=>'Error de vigencía: Este cupón no es válido. Deja el espacio vacío o verifícalo con quien te lo suministro.','id_campania'=>$camp[0]->campania->id]);
                  }
                 }


                //dd($tipo_de_campania,$camp[0]->campania->tipo_canje);
                if($tipo_de_campania!=$camp[0]->campania->tipo_canje){
                        return array(['respuesta'=>false,'mensaje'=>'Error de autorización: Este cupón no es válido para este tipo de transacciones. Deja el espacio vacío o verifícalo con quien te lo suministro.','id_campania'=>$camp[0]->campania->id]);
                }
                //dd((float)$monto_valor_a_redimir,(float)$camp[0]->campania->costo_minimo);
                if((float)$monto_valor_a_redimir < (float)$camp[0]->campania->costo_minimo ){
                        return array(['respuesta'=>false,'mensaje'=>'Error de valor mínimo: Este cupón es válido solo para '.$camp[0]->campania->tipo_canje.'s, iguales o superiores a $'.number_format($camp[0]->campania->costo_minimo,0,',','.').'.','id_campania'=>$camp[0]->campania->id]);
                }
                $dt=DB::table('detalle_recargas')
                    ->where([
                          ["id_user",$id_usuario_canje],
                          ["tipo_recarga",'RECARGA'],
                          ['estado_detalle_recarga','SIN REGISTRAR']
                        ])->get();

                DB::table('detalle_recargas')
                    ->where([
                          ["id_user",$id_usuario_canje],
                          ["tipo_recarga",'RECARGA'],
                          ['estado_detalle_recarga','SIN REGISTRAR']
                        ])
                    ->take(1)
                    ->update([
                              'valor_recarga'=>$monto_valor_a_redimir,
                              'valor_pagado'=>$valor_pagado,
                              'referencia_pago'=>$transaccion_canje,
                              ]);     

                if(count($dt)>0){
                  $dt=DB::table('detalle_recargas')
                    ->where([
                          ["id_user",$id_usuario_canje],
                          ["tipo_recarga",'RECARGA'],
                          ['estado_detalle_recarga','SIN REGISTRAR']
                        ])->get();
                    //dd((float)$monto_valor_a_redimir , (float)$dt[0]->valor_pagado);
                  if((float)$monto_valor_a_redimir > (float)$dt[0]->valor_pagado ){
                          return array(['respuesta'=>false,'mensaje'=>'Error de valor mínimo: Este valor es mayor al valor del bono.','id_campania'=>$camp[0]->campania->id]);
                  }  
                }    
                
                  
              
                  
                if($camp[0]->campania->id_user!=null){

                    //valido que el usuario que va registrar el cupon sea el permitido
                    if($id_usuario_canje==$camp[0]->campania->id_user){

                        if($camp[0]->campania->tipo_de_descuento=='porcentaje'){
                            if($camp[0]->campania->valor_de_descuento==100){
                              $val_dto=$monto_valor_a_redimir;
                              $gratis=true;
                            }else{
                              $val_dto=$monto_valor_a_redimir-($monto_valor_a_redimir*($camp[0]->campania->valor_de_descuento)/100);
                            }  

                            $gratis=false;  
                            
                        }else{
                          // aqui hago el dto por un valor neto
                            if((float)$monto_valor_a_redimir == (float)$camp[0]->campania->valor_de_descuento){
                              $gratis=true;  
                            }else{
                              $gratis=false;  
                            }
                            $val_dto=$camp[0]->campania->valor_de_descuento;
                            $monto_valor_a_redimir=$camp[0]->campania->valor_de_descuento;  

                            
                        }
                        
                        
                        
                        $registro=CuponesCampania::registro_canje($camp[0]->campania->id,$cupon,$transaccion_canje,$id_usuario_canje,$monto_valor_a_redimir,$gratis);  
                        
                        if($registro[0]['respuesta']){
                          
                          return array(['respuesta'=>true,'mensaje'=>$registro[0]['mensaje'],'dto'=>$camp[0]->campania->valor_de_descuento,'valor_dto'=>$val_dto,'id_campania'=>$camp[0]->campania->id,'acumulable'=>$registro[0]['acumulable']]);
                        }else{
                          return array(['respuesta'=>false,'mensaje'=>$registro[0]['mensaje'],'dto'=>$camp[0]->campania->valor_de_descuento,'valor_dto'=>$val_dto,'id_campania'=>$camp[0]->campania->id]);
                        }

                        
                    }else{
                         
                          return array(['respuesta'=>false,'mensaje'=>'Error de canje: no estas autorizado para canjear este cupón. Deja el espacio vacío o verifícalo con quien te lo suministro.','id_campania'=>$camp[0]->campania->id]);
                         
                          
                    }
                }else{

                        //NO TIENE USUARIO ASIGNADO
                        if($camp[0]->campania->tipo_de_descuento=='porcentaje'){
                          if($camp[0]->campania->valor_de_descuento==100){
                            $val_dto=$monto_valor_a_redimir;
                            $gratis=true;
                          }else{
                            $val_dto=$monto_valor_a_redimir-($monto_valor_a_redimir*($camp[0]->campania->valor_de_descuento)/100);

                            $gratis=false;  
                          }
                        }else{
                          //dd((float)$monto_valor_a_redimir , (float)$camp[0]->campania->valor_de_descuento);
                            if((float)$monto_valor_a_redimir == (float)$camp[0]->campania->valor_de_descuento){
                              $gratis=true;  
                            }else{
                              $gratis=false;  
                            }
                            $val_dto=$camp[0]->campania->valor_de_descuento;
                            $monto_valor_a_redimir=$camp[0]->campania->valor_de_descuento; 
                            
                        }  
                        //dd($gratis);
                        $registro=CuponesCampania::registro_canje($camp[0]->campania->id,$cupon,$transaccion_canje,$id_usuario_canje,$monto_valor_a_redimir,$gratis);
                        //dd($registro[0]);
                        if($registro[0]['respuesta']){
                          if($camp[0]->campania->tipo_de_descuento=='porcentaje'){
                            $descuento=$monto_valor_a_redimir;

                          }else{
                            $descuento=$camp[0]->campania->valor_de_descuento; 
                          }


                          


                          return array(['respuesta'=>true,'mensaje'=>$registro[0]['mensaje'],'dto'=>$descuento,'valor_dto'=>$val_dto,'id_campania'=>$camp[0]->campania->id,'acumulable'=>$registro[0]['acumulable']]);
                        }else{
                          return array(['respuesta'=>false,'mensaje'=>$registro[0]['mensaje'],'dto'=>$camp[0]->campania->valor_de_descuento,'valor_dto'=>$val_dto,'id_campania'=>$camp[0]->campania->id]);
                        } 
                }    
     

          }else{
                  return array(['respuesta'=>false,'mensaje'=>'Error de canje: no hay más cupones disponibles para esta campaña, esta campaña ha finalizado.','id_campania'=>0]);
          }
        }else{
           return array(['respuesta'=>false,'mensaje'=>'Error de canje: este cupón no es valido. Deja el espacio vacío o verifícalo con quien te lo suministro. ','id_campania'=>0]);
        }
      
      
    }
    /**
     * [redimir_cupon_compra description]
     * @param  [type] $cupon                 [description]
     * @param  [type] $fecha_canje           [description]
     * @param  [type] $id_usuario_canje      [description]
     * @param  [type] $transaccion_canje     [description]
     * @param  [type] $tipo_de_campania      [description]
     * @param  [type] $monto_valor_a_redimir [description]
     * @param  [type] $id_anuncio            [description]
     * @param  [type] $saltar_validacion     [variable que permite saltar la validacion en caso de que el monto del tramite sea menor al del cupon]
     * @return [type]                        [description]
     */
    public static function  redimir_cupon_compra($cupon,$fecha_canje,$id_usuario_canje,$transaccion_canje,$tipo_de_campania,$monto_valor_a_redimir,$id_anuncio,$saltar_validacion,$moneda_pago){
      
        $camp=CuponesCampania::where([
                                    ['estado','sin canjear'],
                                    ['codigo_cupon',$cupon],
                                    //['transaccion_donde_se_aplico',$transaccion_canje]
                                  ])
                              ->orwhere([
                                    ['estado','canjeado'],
                                    ['codigo_cupon',$cupon],
                                    //['transaccion_donde_se_aplico',$transaccion_canje]
                                    ])
                              ->get();
        //dd(count($camp),$cupon,$camp);
        if(count($camp)>0){
          //dd($camp[0]->campania);
          //valido estado de la campañas
          if($camp[0]->campania->estado_campania=='ABIERTA' ){
                 //dd($saltar_validacion); 
                if($moneda_pago != $camp[0]->campania->moneda_descuento){
                        return array(['respuesta'=>false,'mensaje'=>'Error de autorización: Este cupón no es válido para este tipo de moneda. Deja el espacio vacío o verifícalo con quien te lo suministro.','id_campania'=>$camp[0]->campania->id]);
                }
                if((float)$camp[0]->campania->costo_minimo  > (float)$monto_valor_a_redimir  ){
                        return array(['respuesta'=>false,'mensaje'=>'Error de valor mínimo: Este cupón es válido solo para '.$camp[0]->campania->tipo_canje.'s, iguales o superiores a $'.number_format($camp[0]->campania->costo_minimo,0,',','.'),'id_campania'=>$camp[0]->campania->id]);
                
                  

                  $ad=Anuncios::where('id',$id_anuncio)->first();
                  //dd((float)$camp[0]->campania->valor_de_descuento, (float)$ad->valor_tramite);
                  //dd((float)$camp[0]->campania->valor_de_descuento,$ad);
                  if((float)$camp[0]->campania->valor_de_descuento > (float)$ad->limite_max){
                        return array(['respuesta'=>false,'mensaje'=>'Error de valor mínimo: El valor del bono que deseas redimir es mayor al valor del trámite, y no es posible realizar el canje del cupón, por favor ingresa otro cupon, o redimelo en otro trámite','id_campania'=>$camp[0]->campania->id]);
                  }  

                  
                } 
                if($camp[0]->campania->fecha_inicial_vigencia != '0000-00-00 00:00:00' and $camp[0]->campania->fecha_final_vigencia != '0000-00-00 00:00:00'){


                  $hoy=Carbon::now('America/Bogota');
                
                  if($hoy->between(Carbon::parse($camp[0]->campania->fecha_inicial_vigencia),Carbon::parse($camp[0]->campania->fecha_final_vigencia))==false){
                          return array(['respuesta'=>false,'mensaje'=>'Error de vigencía: Este cupón no es válido. Deja el espacio vacío o verifícalo con quien te lo suministro.','id_campania'=>$camp[0]->campania->id]);
                  }

                }
                

                //dd($tipo_de_campania,$camp[0]->campania->tipo_canje);
                if($tipo_de_campania!=$camp[0]->campania->tipo_canje){
                        return array(['respuesta'=>false,'mensaje'=>'Error de autorización: Este cupón no es válido para este tipo de transacciones. Deja el espacio vacío o verifícalo con quien te lo suministro.','id_campania'=>$camp[0]->campania->id]);
                }


               


                //dd((float)$monto_valor_a_redimir,(float)$camp[0]->campania->costo_minimo);
               
                $ad=Anuncios::where('id',$id_anuncio)->first();
                //dd((float)$camp[0]->campania->valor_de_descuento, (float)$monto_valor_a_redimir);
                if((float)$camp[0]->campania->valor_de_descuento > (float)$monto_valor_a_redimir){
                        return array(['respuesta'=>false,'mensaje'=>'Error de valor mínimo: El valor de descuento es menor al valor del bono, y no es posible realizar el canje del cupón, por favor ingresa otro cupon, o redimelo en otro trámite','id_campania'=>$camp[0]->campania->id]);
                }  

                
                  
              //********
              ///*9999
               //valido si la campaña tiene usuario asignado
                  
                  if($camp[0]->campania->id_user!=null){

                    //valido que el usuario que va registrar el cupon sea el permitido
                    if($id_usuario_canje==$camp[0]->campania->id_user){

                        if($camp[0]->campania->tipo_de_descuento=='porcentaje'){
                            if($camp[0]->campania->valor_de_descuento==100){
                              $val_dto=$monto_valor_a_redimir;
                              $gratis=true;
                            }else{
                              $val_dto=$monto_valor_a_redimir-($monto_valor_a_redimir*($camp[0]->campania->valor_de_descuento)/100);
                            }  

                            $gratis=false;  
                            
                        }else{
                          // aqui hago el dto por un valor neto
                            if($saltar_validacion){
                              $gratis=true;  
                              $ad=Anuncios::where('id',$id_anuncio)->first();
                              $val_dto=$ad->valor_tramite;
                              $monto_valor_a_redimir=$ad->valor_tramite;
                            }else{
                              if((float)$monto_valor_a_redimir == (float)$camp[0]->campania->valor_de_descuento){
                                $gratis=true;  
                              }else{
                                $gratis=false;  
                              }
                              $val_dto=$camp[0]->campania->valor_de_descuento;
                              $monto_valor_a_redimir=$camp[0]->campania->valor_de_descuento;
                            }
                              

                            
                        }
                        
                        
                        
                        $registro=CuponesCampania::registro_canje($camp[0]->campania->id,$cupon,$transaccion_canje,$id_usuario_canje,$monto_valor_a_redimir,$gratis);  
                        
                        if($registro[0]['respuesta']){
                          
                          return array(['respuesta'=>true,'mensaje'=>$registro[0]['mensaje'],'dto'=>$camp[0]->campania->valor_de_descuento,'valor_dto'=>$val_dto,'id_campania'=>$camp[0]->campania->id,'acumulable'=>$registro[0]['acumulable']]);
                        }else{
                          return array(['respuesta'=>false,'mensaje'=>$registro[0]['mensaje'],'dto'=>$camp[0]->campania->valor_de_descuento,'valor_dto'=>$val_dto,'id_campania'=>$camp[0]->campania->id]);
                        }

                        
                    }else{
                         
                          return array(['respuesta'=>false,'mensaje'=>'Error de canje: no estas autorizado para canjear este cupón. Deja el espacio vacío o verifícalo con quien te lo suministro.','id_campania'=>$camp[0]->campania->id]);
                         
                          
                    }
                    
                  }else{

                        //NO TIENE USUARIO ASIGNADO
                        if($camp[0]->campania->tipo_de_descuento=='porcentaje'){
                          if($camp[0]->campania->valor_de_descuento==100){
                            $val_dto=$monto_valor_a_redimir;
                            $gratis=true;
                          }else{
                            $val_dto=$monto_valor_a_redimir-($monto_valor_a_redimir*($camp[0]->campania->valor_de_descuento)/100);

                            $gratis=false;  
                          }
                        }else{
                          //dd((float)$monto_valor_a_redimir , (float)$camp[0]->campania->valor_de_descuento);
                          if($saltar_validacion){
                              $gratis=true;  
                              $ad=Anuncios::where('id',$id_anuncio)->first();
                              $val_dto=$ad->valor_tramite;
                              $monto_valor_a_redimir=$ad->valor_tramite;
                          }else{
                              if((float)$monto_valor_a_redimir == (float)$camp[0]->campania->valor_de_descuento){
                              $gratis=true;  
                            }else{
                              $gratis=false;  
                            }
                            $val_dto=$camp[0]->campania->valor_de_descuento;
                            $monto_valor_a_redimir=$camp[0]->campania->valor_de_descuento; 
                          }
                            
                            
                        }  
                        //dd($gratis);
                        $registro=CuponesCampania::registro_canje($camp[0]->campania->id,$cupon,$transaccion_canje,$id_usuario_canje,$monto_valor_a_redimir,$gratis);
                        //dd($registro[0]);
                        if($registro[0]['respuesta']){
                          if($camp[0]->campania->tipo_de_descuento=='porcentaje'){
                            $descuento=$camp[0]->campania->valor_de_descuento;

                          }else{
                            $descuento=$camp[0]->campania->valor_de_descuento; 
                          }


                          


                          return array(['respuesta'=>true,'mensaje'=>$registro[0]['mensaje'],'dto'=>$descuento,'valor_dto'=>$val_dto,'id_campania'=>$camp[0]->campania->id,'acumulable'=>$registro[0]['acumulable']]);
                        }else{
                          return array(['respuesta'=>false,'mensaje'=>$registro[0]['mensaje'],'dto'=>$camp[0]->campania->valor_de_descuento,'valor_dto'=>$val_dto,'id_campania'=>$camp[0]->campania->id]);
                        } 
                  } 
     

            }else{
                  return array(['respuesta'=>false,'mensaje'=>'Error de canje: no hay más cupones disponibles para esta campaña, esta campaña ha finalizado','id_campania'=>0]);
            }
        }else{
           return array(['respuesta'=>false,'mensaje'=>'Error de canje: este cupón no es valido. Deja el espacio vacío o verifícalo con quien te lo suministro. ','id_campania'=>0]);
        }
      
      
    }

    public static function  registro_canje($id_campania,$cupon,$transaccion_canje,$id_usuario_canje,$monto_valor_redimido,$free){
          
          $c=Campania::where('id',$id_campania)->first();
          $redimidos=CuponesCampania::join('campanias','campanias.id','cupones_campanias.id_campania')
                                    ->where([
                                      ['campanias.id',$id_campania],
                                      ['estado','canjeado_pagado'],
                                      ['id_usuario_canje',$id_usuario_canje]
                                    ])
                                    ->orwhere([
                                      ['campanias.id',$id_campania],
                                      ['estado','canjeado'],
                                      ['id_usuario_canje',$id_usuario_canje]
                                    ])
                                    ->select('campanias.id')
                                    ->get();
          //dd(count($redimidos),$c->limite_por_usuario);
          if (count($redimidos) < $c->limite_por_usuario  ){
                if($free){
                  $est='canjeado_pagado';
                }else{
                  $est='canjeado';  
                }
                
                CuponesCampania::where([
                                 ['id_campania',$id_campania] ,
                                 ['codigo_cupon',$cupon],
                                 ['estado','=','sin canjear'] 
                              ])
                              ->take(1)
                              ->update([
                                  'estado'=>$est, 
                                  'fecha_canje'=>Carbon::now('America/Bogota'),
                                  'transaccion_donde_se_aplico'=>$transaccion_canje,
                                  'monto_valor_redimido'=>$monto_valor_redimido,
                                  'id_usuario_canje'=>$id_usuario_canje,
                                  'updated_at'=>Carbon::now('America/Bogota')
                                ]);
              $transaccion_pendiente=CuponesCampania::join('campanias','campanias.id',
                                                            'cupones_campanias.id_campania')
                                                          ->where('transaccion_donde_se_aplico',$transaccion_canje)
                                                          ->select('campanias.id')
                                                          ->get();
              //dd($transaccion_pendiente);
              if(count($transaccion_pendiente)>0){
                
                  if($c->es_acumulable=='1'){
                    if($c->cupones_canjeados < $c->numero_de_cupones){
                        Campania::where('id',$id_campania)->decrement('cupones_disponibles',1);
                        Campania::where('id',$id_campania)->increment('cupones_canjeados',1);               
                        
                        return array(['respuesta'=>true,'mensaje'=>'Gracias, por redimir este cupón, este cupón es acumulable con otros, recuerda que para redimir otros cupones, estos no deben superar el monto del valor total de tu pago.','acumulable'=>$c->es_acumulable]);
                        
                      }else if($c->cupones_canjeados == $c->numero_de_cupones ){
                        
                        Campania::where("id",$id_campania)->update([
                                    'estado_campania'=>'CERRADA'
                                  ]);
                        return array(['respuesta'=>true,'mensaje'=>'Gracias, por redimir este cupón, este cupón es acumulable con otros, recuerda que para redimir otros cupones, estos no deben superar el monto del valor total de tu pago.','acumulable'=>$c->es_acumulable]);
                      }  


                    
                  }else{
                    if($c->cupones_canjeados < $c->numero_de_cupones){
                        Campania::where('id',$id_campania)->decrement('cupones_disponibles',1);
                        Campania::where('id',$id_campania)->increment('cupones_canjeados',1);               
                        
                        return array(['respuesta'=>true,'mensaje'=>'Gracias, por redimir este cupón, este cupón no es acumulable con otros cupones.','acumulable'=>$c->es_acumulable]);
                        
                      }else if($c->cupones_canjeados == $c->numero_de_cupones ){
                        Campania::where("id",$id_campania)->update([
                                    'estado_campania'=>'CERRADA'
                                  ]);
                        return array(['respuesta'=>true,'mensaje'=>'Gracias, por redimir este cupón, este cupón no es acumulable con otros cupones.','acumulable'=>$c->es_acumulable]);
                      } 
                  }
              }else{
                if($c->es_acumulable=='1'){
                  if($c->cupones_canjeados < $c->numero_de_cupones){
                    Campania::where('id',$id_campania)->decrement('cupones_disponibles',1);
                    Campania::where('id',$id_campania)->increment('cupones_canjeados',1);               
                    
                    return array(['respuesta'=>true,'mensaje'=>'Gracias, por redimir este cupón, este cupón es acumulable con otros, recuerda que para redimir otros cupones, estos no deben superar el monto del valor total de tu pago.','acumulable'=>$c->es_acumulable]);
                    
                  }else if($c->cupones_canjeados == $c->numero_de_cupones ){
                    Campania::where("id",$id_campania)->update([
                                'estado_campania'=>'CERRADA'
                              ]);
                    return array(['respuesta'=>true,'mensaje'=>'Gracias, por redimir este cupón, este cupón es acumulable con otros, recuerda que para redimir otros cupones, estos no deben superar el monto del valor total de tu pago.','acumulable'=>$c->es_acumulable]);
                  }  
                }else{

                  if($c->cupones_canjeados < $c->numero_de_cupones){
                    Campania::where('id',$id_campania)->decrement('cupones_disponibles',1);
                    Campania::where('id',$id_campania)->increment('cupones_canjeados',1);               
                    return array(['respuesta'=>true,'mensaje'=>'Gracias, por redimir este cupón, este cupón no es acumulable con otros cupones.','acumulable'=>$c->es_acumulable]);
                    
                  }else if($c->cupones_canjeados == $c->numero_de_cupones ){
                    Campania::where("id",$id_campania)->update([
                                'estado_campania'=>'CERRADA'
                              ]);
                    return array(['respuesta'=>true,'mensaje'=>'Gracias, por redimir este cupón, este cupón no es acumulable con otros cupones.','acumulable'=>$c->es_acumulable]);
                  }  
                }

                


              }                                            
              
              
              
          }else{
            return array(['respuesta'=>false,'mensaje'=>'Has supera el límite de tus cupones para redimir. Deja el espacio vacío o verifícalo con quien te lo suministro.']);
            
          }
          
          



    }
}
