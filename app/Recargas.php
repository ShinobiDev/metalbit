<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\NotificacionAnuncio;
use App\User;
use App\Payu;
use App\DetalleReferido;
use App\detalle_recargas;
use App\CuponesCampania;
use Carbon\Carbon;
use DB;

class Recargas extends Model
{
  protected $fillable = [
      'status', 'valor', 'user_id',
  ];
  /**
   * [registro_recargas funcion para registrar las recargas hechas por un cliente]
   * @param  [type] $req [array de tipo $_REQUEST que contiene la información del apgo emitido por payu]
   * @return [type]      [description]
   */
  public function registro_recargas($req){
  	
	  	switch ($req['transactionState']) {
			case 4:
				//aprovada
				$rp=DB::table("detalle_recargas")->where([
															["referencia_pago",$req['referenceCode']],
															['tipo_recarga','PAGO']
														])->get();
				$cliente=User::where("email",$req['buyerEmail'])->get();
				//dd(count($rp));
				if(count($rp)==1){
						

					
						if(count($cliente)==0){
								$msn="Los datos de este usuario no corresponde a ninguno que este registrado en ".config('app.name');

								return view('payu.error_payu')->with("mensaje",$msn);
						}else{
										$empresa=Payu::all();
										//dd($empresa);

										if($rp[0]->estado_detalle_recarga=="APROBADA"){
											$msn="Esta referencia de pago ya esta registrada en nuestro sistema!";
											return view('payu.error_payu')->with("mensaje",$msn);
										}else{
											DB::table("detalle_recargas")
														->where("referencia_pago",$req['referenceCode'])
														->update([
													    "referencia_pago_pay_u"=>$req['reference_pol'],
													    "metodo_pago"=>$req['lapPaymentMethod'],
													    "estado_detalle_recarga"=>"APROBADA",
													    "updated_at"=>Carbon::now('America/Bogota')
												    ]);

										//dd($cliente[0]);
										/*
										  incremento la recarga al usuario que hace el pago
										 */
										Recargas::where("user_id",$cliente[0]->id)->increment("valor",$rp[0]->valor_recarga);

										Recargas::where("user_id",$cliente[0]->id)->update(["status"=>"ACTIVA"]);
										
										/*
											Aqui le doy el valor de premio al referido
										 */
										//buscar referido
										$id_ref=DetalleReferido::where("id_quien_refiere",$cliente[0]->id)->get();	
										/*
										REGISTRO LAS BONIFICACIONES
										 */
										if(count($id_ref)>0){
											$tot_recargas=detalle_recargas::where("id_user",$cliente[0]->id)->get();
											//dd($tot_recargas);
											if(count($tot_recargas)==0){
												//aunentoo el 10% de la recarga 
												$val_rec=(float)$rp[0]->valor_recarga*0.10;
												DB::table("detalle_recargas")->insert([
													    'id_user' => $id_ref[0]->id_referido,
													    'valor_recarga'=>$val_rec,
													    "referencia_pago"=>time().$cliente[0]->id,
													     "referencia_pago_pay_u"=>time().$cliente[0]->id,
													     "metodo_pago"=>"BONIFICACION RECARGA 10%  ".$cliente[0]->name,
													     "tipo_recarga"=>"BONIFICACION"	,
													     "created_at"=>Carbon::now('America/Bogota')
													   ]
													);
													
												DB::table("bonificaciones")->insert(
															["tipo_bonificacion"=>"RECARGA",
															"fk_id_detalle_referido"=>$id_ref[0]->id,
															"valor"=>$val_rec,
															"created_at"=>Carbon::now('America/Bogota')	]);

												Recargas::where("user_id",$id_ref[0]->id_referido)->increment("valor",$val_rec);

												
											}else{
												//var_dump($id_ref[0]->id_referido);
												//var_dump($req['TX_VALUE']*0.01);
												//
												$val_rec=(float)$rp[0]->valor_recarga*0.01;	
												//dd($val_rec);
												DB::table("detalle_recargas")->insert([
													    'id_user' => $id_ref[0]->id_referido,
													    'valor_recarga'=>$val_rec,
													    "referencia_pago"=>time().$cliente[0]->id,
													     "referencia_pago_pay_u"=>time().$cliente[0]->id,
													     "metodo_pago"=>"BONIFICACION RECARGA 1%  ".$cliente[0]->name,
													     "tipo_recarga"=>"BONIFICACION",
													     "created_at"=>Carbon::now('America/Bogota')
													     	]
													);
												DB::table("bonificaciones")->insert(
															["tipo_bonificacion"=>"RECARGA",
															"fk_id_detalle_referido"=>$id_ref[0]->id,
															"valor"=>$val_rec,
															"created_at"=>Carbon::now('America/Bogota')	]);

												Recargas::where("user_id",$id_ref[0]->id_referido)->increment("valor",$val_rec);
											}
										}
										


										$recarga = Recargas::where("user_id",$cliente[0]->id)->get();
									}
						}

				}else{


					if(count($rp)==0){
						$msn="Esta referencia de pago no esta registrada en nuestro sistema!";
						return view('payu.error_payu')->with("mensaje",$msn);
					}else{
						if($rp[0]->estado_detalle_recarga=="APROBADA"){
							$msn="Ya habias registrado esta referencia de pago";
							return view('payu.error_payu')->with("mensaje",$msn);	
						}else{
							$msn="Esta orden se encuentra en estado ".$rp[0]->estado_detalle_recarga ;
							return view('payu.error_payu')->with("mensaje",$msn);
						}
					}
					
						
				}

				NotificacionAnuncio::dispatch($cliente[0], [],[$recarga[0],["valor"=>$rp[0]->valor_recarga,"fecha"=>date('Y-m-d')]],"RecargaExitosa");


				return view('payu.confirmar_recarga_payu')->with("respuesta",$req)
										->with("campania",CuponesCampania::where('transaccion_donde_se_aplico',$req['referenceCode'])->first())
										->with("recarga",$rp[0]->valor_recarga)
										->with("empresa",$empresa)
										->with("cliente",$cliente)
										->with("estado","Aprobada")
										->with("entidad",$req['lapPaymentMethod']);
				break;
			case 7:			
					//pendiente de confirmacion efecty
					$rp=DB::table("detalle_recargas")->where("referencia_pago",$req['referenceCode'])->get();
					//dd($req['referenceCode']);
					if(count($rp)>0){
							$cliente=User::where("email",$req['buyerEmail'])->get();

							if($rp[0]->estado_detalle_recarga=="PENDIENTE" || $rp[0]->estado_detalle_recarga=="PENDIENTE"){
								$msn="Esta referencia de pago ya esta registrada en nuestro sistema con el estado ".$rp[0]->estado_detalle_recarga;

								return view('payu.error_payu')->with("mensaje",$msn);
							}
						
							if(count($cliente)==0){
									$msn="Los datos de este usuario no corresponde a ninguno que este registrado en ".config('app.name');

									return view('payu.error_payu')->with("mensaje",$msn);
							}else{
										$empresa=Payu::all();
										//dd($empresa);

										DB::table("detalle_recargas")
												->where("referencia_pago",$req['referenceCode'])
												->update([
									    "referencia_pago_pay_u"=>$req['reference_pol'],
									    "estado_detalle_recarga"=>"PENDIENTE",
									    "metodo_pago"=>$req['lapPaymentMethod'],
									    "updated_at"=>Carbon::now('America/Bogota')
									     	]
									);

									$recarga = Recargas::where("user_id",$cliente[0]->id)->get();
							}

					}else{


							$msn="Ya habias registrado esta referencia de pago, una vez realices el pago se registrará tu recarga";
							return view('payu.error_payu')->with("mensaje",$msn);
					}
					//dd($recarga[0]->valor);
					NotificacionAnuncio::dispatch($cliente[0], [],[$recarga[0],["valor"=>$req['TX_VALUE'],"fecha"=>date('Y-m-d')]],"RecargaPendiente");

					return view('payu.confirmar_recarga_payu')->with("respuesta",$req)
										->with("campania",CuponesCampania::where('transaccion_donde_se_aplico',$req['referenceCode'])->first())
										->with("recarga",$rp[0]->valor_recarga)
										->with("empresa",$empresa)
										->with("cliente",$cliente)
										->with("estado","Pendiente aprobación")
										->with("entidad",$req['lapPaymentMethod']);
				break;
			case 6:
					$rp=DB::table("detalle_recargas")->where("referencia_pago",$req['referenceCode'])->get();
					if(count($rp)==0){
						$cliente=User::where("email",$req['buyerEmail'])->get();
						$recarga = Recargas::where("user_id",$cliente[0]->id)->get();
						//rechazada
						DB::table("detalle_recargas")->update([
									    "referencia_pago_pay_u"=>$req['reference_pol'],
									    "estado_detalle_recarga"=>"RECHAZADA",
									    "metodo_pago"=>$req['lapPaymentMethod'],
									    "updated_at"=>Carbon::now('America/Bogota')
									     	]
									);
						
						NotificacionAnuncio::dispatch($cliente[0], [],[$recarga[0],["valor"=>$req['TX_VALUE'],"fecha"=>date('Y-m-d')]],"RecargaRechazada");

						$msn="Tu recarga ha sido rechazada, intentalo nuevamente o comunicate con tu banco o entidad de pagos para verificar, que esta sucediendo";
		
					}else{
						$msn="Ya habias registrado esta referencia de pago, su estado actual es: ".$rp[0]->estado_detalle_recarga;

					}
					
					return view('payu.error_payu')->with("mensaje",$msn);
					
				break;
			default:
					$msn="No Se ha registrado exitosamente tu recarga ";
					return view('payu.error_payu')->with("mensaje",$msn);
				break;
		}
  }

  /**
     * Funcion para registrar el pago pendiente para una venta
      * @param  [type] $quien_refiere [id de quien refiere]
     * @param  [type] $valor_recarga[valor de la venta]
     * @param  [type] $nombre [nombe de quien hizo la recarga]     
     * @return [type]       [description]
     */
  public static function  registrar_bonificacion($quien_refiere,$valor_recarga,$nombre){
  		$id_ref=DetalleReferido::where("id_quien_refiere",$quien_refiere)->get();	
								
		if(count($id_ref)>0){
										$tot_recargas=detalle_recargas::where("id_user",$quien_refiere)->get();
										//dd($tot_recargas);
										if(count($tot_recargas)==0){
											//aunentoo el 10% de la recarga 
											$val_rec=(float)$valor_recarga*0.10;
											DB::table("detalle_recargas")->insert([
												    'id_user' => $id_ref[0]->id_referido,
												    'valor_recarga'=>$val_rec,
												    "referencia_pago"=>time().$quien_refiere,
												     "referencia_pago_pay_u"=>time().$quien_refiere,
												     "metodo_pago"=>"BONIFICACION RECARGA 10%  ".$nombre,
												     "tipo_recarga"=>"BONIFICACION"	,
												     "created_at"=>Carbon::now('America/Bogota')
												   ]
												);
												
											DB::table("bonificaciones")->insert(
														["tipo_bonificacion"=>"RECARGA",
														"fk_id_detalle_referido"=>$id_ref[0]->id,
														"valor"=>$val_rec,
														"created_at"=>Carbon::now('America/Bogota')	]);

											Recargas::where("user_id",$id_ref[0]->id_referido)->increment("valor",$val_rec);
											return true;	
											
										}else{
											//var_dump($id_ref[0]->id_referido);
											//var_dump($req['TX_VALUE']*0.01);
											//
											$val_rec=(float)$valor_recarga*0.01;	
											//dd($val_rec);
											DB::table("detalle_recargas")->insert([
												    'id_user' => $id_ref[0]->id_referido,
												    'valor_recarga'=>$val_rec,
												    "referencia_pago"=>time().$quien_refiere,
												     "referencia_pago_pay_u"=>time().$quien_refiere,
												     "metodo_pago"=>"BONIFICACION RECARGA 1%  ".$nombre,
												     "tipo_recarga"=>"BONIFICACION",
												     "created_at"=>Carbon::now('America/Bogota')
												     	]
												);
											DB::table("bonificaciones")->insert(
														["tipo_bonificacion"=>"RECARGA",
														"fk_id_detalle_referido"=>$id_ref[0]->id,
														"valor"=>$val_rec,
														"created_at"=>Carbon::now('America/Bogota')	]);

											Recargas::where("user_id",$id_ref[0]->id_referido)->increment("valor",$val_rec);
											return true;
										}
		}else{
			return false;
		}

  }
}
