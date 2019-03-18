<div>	
	@if($recarga_pendiente!=null)
			@if($recarga_pendiente->estado_detalle_recarga=='PENDIENTE APROBACION')
				<div>
					<label>¿Monto a recargar?</label>
					<input id="num_valor_recarga" type="number" min="20000" value="{{number_format($recarga_pendiente->valor_recarga,0,'','')}}" onchange="cambiar_valor_recarga(this)" >
					@include('partials.redimir_cupon_recarga',['c'=>auth()->user()->id])
					
				</div>
				<label>Selecciona el tipo de pago de tu preferencia</label>
				@if($recarga_pendiente->metodo_pago=='Pago en efectivo')
					<div class="table-responsive">
						<table class="table table-striped table-hover">
						  <thead>
						    <tr>
						      <th scope="col">Metodo de pago</th>
						      <th scope="col">Sobrecosto</th>
						      <th scope="col">Valor</th>					      
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row"><div class="radio">
								  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="2" checked>1. Pago en Efectivo Oficina Bogotá.</label>
								</div>
							  </th>
						      <td><span>-</span></td>
						      <td><span>0</span></td>
						      
						    </tr>
						    <tr>
						      <th scope="row">
						      	<div class="radio">
								  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="3">2. Pago consignación ventanilla Bancolombia.</label>
								</div>
						      </th>
						      <td><span>13.000 + 4x1.000</span></td>
						      <td><span id="spPagoCons">{{number_format((($recarga_pendiente->valor_recarga*$pesos_por_mil->valor)/1000)+$comision_consignacion->valor,0,',','.')}}</span></td>
						      
						    </tr>
						    <tr>
						      <th scope="row">
						      	<div class="radio">
								  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="1">3. Pago transferencia o Corresponsal bancario.
								</label>
								</div>
						      </th>
						      <td><span>+ 4x1.000</span></td>
						      <td><span id="spPagoTrans">{{number_format(($recarga_pendiente->valor_recarga*$pesos_por_mil->valor)/1000,0,',','.')}}</span></td>
						    </tr>
						    <tr>
						    	<th colspan="2">
						    		<div>
										<label  class="text-success">Total a pagar </label>
										<input type="hidden" id="hd_val_recarga" value="{{number_format($recarga_pendiente->valor_recarga,0,'','')}}">		
										<input type="hidden" id="hd_val_a_pagar" value="{{number_format($recarga_pendiente->valor_recarga,0,'','')}}">		
										
									</div>	
						    	</th>
						    	<td>
						    		<strong class="text-success">$<span id="msnValorAPagar" class="text-success">{{number_format($recarga_pendiente->valor_pagado,0,',','.')}}</span></strong>
						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>	
					<div class="movil col-12 col-md-12 col-sm-12">
						<h3 class="float-left" onclick="mover_izq()"><strong class="text-info">>>></strong></h3>
					</div>
				@elseif($recarga_pendiente->metodo_pago=='Transferencia bancaria')
					<div class="table-responsive">
						<table class="table table-striped table-hover">
						  <thead>
						    <tr>
						      <th scope="col">Metodo de pago</th>
						      <th scope="col">Sobrecosto</th>
						      <th scope="col">Valor</th>					      
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row">
						      	<div class="radio">
								  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="2" >1. Pago en Efectivo Oficina Bogotá.</label>
								</div>
						      </th>
						       <td><span>-</span></td>
						      <td><span>0</span></td>
						      
						    </tr>
						    <tr>
						      <th scope="row">
						      	<div class="radio">
								  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="3" >2. Pago consignación ventanilla Bancolombia.</label>
								</div>
						      </th>
						       <td><span>13.000 + 4x1.000</span></td>
						      <td><span id="spPagoCons">{{number_format((($recarga_pendiente->valor_pagado*$pesos_por_mil->valor)/1000)+$comision_consignacion->valor,0,',','.')}}</span></td>
						      
						    </tr>
						    <tr>
						      <th scope="row">
						      	<div class="radio">
								  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="1" checked>3. Pago transferencia o Corresponsal bancario.
								</label>
								</div>	
						      </th>
						       <td><span>+ 4x1.000</span></td>
						      <td><span id="spPagoTrans">{{number_format((($recarga_pendiente->valor_pagado*$pesos_por_mil->valor)/1000),0,',','.')}}</span></td>
						      
						    </tr>
						     <tr>
						    	<th colspan="2">
						    		<div>
										<label  class="text-success">Total a pagar </label>
										<input type="hidden" id="hd_val_recarga" value="{{number_format($recarga_pendiente->valor_recarga,0,'','')}}">	
										<input type="hidden" id="hd_val_a_pagar" value="{{number_format($recarga_pendiente->valor_pagado+(($recarga_pendiente->valor_pagado*$pesos_por_mil->valor)/1000),0,'','')}}">	
											
									</div>	
						    	</th>
						    	<td>
						    		<strong class="text-success">$<span id="msnValorAPagar" class="text-success">
						    			{{number_format($recarga_pendiente->valor_pagado,0,',','.')}}</span></strong>
						    		
						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<div class="movil col-12 col-md-12 col-sm-12">
						<h3 class="float-left" onclick="mover_izq()"><strong class="text-info">>>></strong></h3>
					</div>
				@else
					<div class="table-responsive">
						<table class="table table-striped table-hover">
						  <thead>
						    <tr>
						      <th scope="col">Metodo de pago</th>
						      <th scope="col">Sobrecosto</th>
						      <th scope="col">Valor</th>					      
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row">
						      	<div class="radio">
								  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="2" >1. Pago en Efectivo Oficina Bogotá.</label>
								</div>
						      </th>
						      <td><span>0</span></td>
						      <td><span>-</span></td>
						      
						    </tr>
						    <tr>
						      <th scope="row">
						      	<div class="radio">
								  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="3" checked>2. Pago consignación ventanilla Bancolombia.</label>
								</div>	
						      </th>
						      <td><span>13.000 + 4x1.000</span></td>
						      <td><span id="spPagoCons">{{number_format((($recarga_pendiente->valor_recarga*$pesos_por_mil->valor)/1000)+$comision_consignacion->valor,0,',','.')}}</span></td>
						      
						    </tr>
						    <tr>
						      <th scope="row">
						      	<div class="radio">
								  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="1">3. Pago transferencia o Corresponsal bancario.
								</label>
								</div>
						      </th>
						      <td><span>+ 4x1.000</span></td>
						      <td><span id="spPagoTrans">{{number_format((($recarga_pendiente->valor_recarga*$pesos_por_mil->valor)/1000),0,',','.')}}</span></td>
						      
						    </tr>
						     <tr>
						    	<th colspan="2">
						    		<div>
										<label  class="text-success">Total a pagar </label>
										<input type="hidden" id="hd_val_recarga" value="{{number_format($recarga_pendiente->valor_recarga,0,'','')}}">		
										<input type="hidden" id="hd_val_a_pagar" value="{{number_format($recarga_pendiente->valor_pagado+(($recarga_pendiente->valor_pagado*$pesos_por_mil->valor)/1000)+$comision_consignacion->valor,0,'','')}}">		
									</div>	
						    	</th>
						    	<td>
						    		<strong class="text-success">$<span id="msnValorAPagar" class="text-success">

						    			

						    			{{number_format($recarga_pendiente->valor_pagado,0,',','.')}}</span></strong>

						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>	
					<div class="movil col-12 col-md-12 col-sm-12">
						<h3 class="float-left" onclick="mover_izq()"><strong class="text-info">>>></strong></h3>
					</div>					
				@endif
				
				
				
				<label id="msnMensajeCompra_{{auth()->user()->id}}"></label>
				<input type="hidden" id="hd_tipo_pago">
				<input type="hidden" id="refRecarga" value="{{$ref_code}}">
				<input id="btn_recarga" type="button" name="button" value="Registrar medio de pago" class="btn btn-success" onclick="enviar_registro_recarga('{{auth()->user()->id}}')" disabled>
			@endif
	@else

			<div>
				<label>¿Monto a recargar?</label>
				<input id="num_valor_recarga" type="number" min="20000" value="20000" onchange="cambiar_valor_recarga(this)">
				@include('partials.redimir_cupon_recarga',['c'=>auth()->user()->id])
				
			</div>
			<label>Selecciona el tipo de pago de tu preferencia</label>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
				  <thead>
				    <tr>
				      <th scope="col">Metodo de pago</th>
				      <th scope="col">Sobrecosto</th>
				      <th scope="col">Valor</th>					      
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">
				      	<div class="radio">
						  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="2" >1. Pago en Efectivo Oficina Bogotá.</label>
						</div>					
				      </th>
				      <td><span>0</span></td>
					  <td><span>-</span></td>
				      
				    </tr>
				    <tr>
				      <th scope="row">
				      	<div class="radio">
						  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="3" >2. Pago consignación ventanilla Bancolombia.</label>
						</div>
				      </th>
				      <td><span>13.000 + 4x1.000</span></td>
					  <td><span id="spPagoCons">{{number_format((((20000*$pesos_por_mil->valor)/1000)+$comision_consignacion->valor),0,'.',',')}}</span></td>
				      
				    </tr>
				    <tr>
				      <th scope="row">
				      	<div class="radio">
						  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago_recargas(this,'{{auth()->user()->id}}')" value="1">3. Pago transferencia o Corresponsal bancario.
							</label>
						</div>
				      </th>
				      <td><span>+ 4x1.000</span></td>
					  <td><span id="spPagoTrans">{{number_format(((20000*$pesos_por_mil->valor)/1000),0,'.',',')}}</span></td>
				      
				    </tr>
				    <tr>
				    	<th colspan="2">
				    		<div>
								<label  class="text-success">Total a pagar </label>
								<input type="hidden" id="hd_val_recarga" value="20000">	
								<input type="hidden" id="hd_val_a_pagar" value="20000">		
							</div>
				    	</th>
				    	<td>
				    		<strong class="text-success">$<span id="msnValorAPagar" >20.000</span></strong>
				    	</td>
				    </tr>
				  </tbody>
				</table>
			</div>
			<div class="movil col-12 col-md-12 col-sm-12">
				<h3 class="float-left" onclick="mover_izq()"><strong class="text-info">>>></strong></h3>	
			</div>
			
			
			
			<label id="msnMensajeCompra_{{auth()->user()->id}}"></label>
			<input type="hidden" id="hd_tipo_pago">
			<input type="hidden" id="refRecarga" value="{{$ref_code}}">
			<input id="btn_recarga" type="button" name="button" value="RECARGAR" class="btn btn-success" onclick="enviar_registro_recarga('{{auth()->user()->id}}')" disabled>
	@endif
</div>

