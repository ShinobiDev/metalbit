<div>
	
	<label>Selecciona el tipo de pago de tu preferencia</label>
	

	@if($ad->transaccion_pendiente['state']=='Pendiente')
		
		

		@if($ad->transaccion_pendiente['type']=='Pago en efectivo')

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
						  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="2" checked>1. Pago en Efectivo Oficina Bogotá.</label>
						</div>
				      </th>
				      <td><span>-</span></td>
				  	  <td><span>0</span></td>
				    </tr>
				    <tr>
				      <th scope="row">
				      	<div class="radio">
						  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="3">2. Pago consignación ventanilla Bancolombia.
						</label>
						</div>
				      </th>
				      <td><span>13.000 + 4x1.000</span></td>
					  <td><span>$$</span></td>
				    </tr>
				    <tr>
				      <th scope="row">
				      	<div class="radio">
						  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="1">3. Pago transferencia o Corresponsal bancario.
						</label>
						</div>
				      </th>
				      <td><span>+ 4x1.000</span></td>
					  <td><span>$$</span></td>
				    </tr>
				    <tr>
				    	<th colspan="2">
				    		<label class="text-success">Total a pagar </label>
				    	</th>
				    	<td>
				    		<strong class="text-success">
				    			$<span id="span_total_a_pagar_{{$ad->id}}" class="text-success">{{number_format($ad->transaccion_pendiente['value'] ,2,',','.')}}</span>
				    		</strong>
				    	</td>
				    </tr>
				  </tbody>
				</table>
			</div>
			<div class="movil col-12 col-md-12 col-sm-12">
				<h3 class="float-left" onclick="mover_izq()"><strong class="text-info">>>></strong></h3>
			</div>	
			<input type="hidden" id="hd_tipo_pago{{$ad->id}}" value="2">
			


		@elseif($ad->transaccion_pendiente['type']=='Transferencia bancaria')
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
							  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="2" >1. Pago en Efectivo Oficina Bogotá.</label>
							</div>
					      </th>
					      <td><span>-</span></td>
				  		  <td><span>0</span></td>
					    </tr>
					    <tr>
					      <th scope="row">
					      	<div class="radio">
							  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="3">2. Pago consignación ventanilla Bancolombia.
							</label>
							</div>
					      </th>
					      <td><span>13.000 + 4x1.000</span></td>
					      <td><span>$$</span></td>
					    </tr>
					    <tr>
					      <th scope="row">
					      	<div class="radio">
							  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="1" checked>3. Pago transferencia o Corresponsal bancario.
							</label>
							</div>
					      </th>
					      <td><span>+ 4x1.000</span></td>
					      <td><span>$$</span></td>
					    </tr>
					    <tr>
					    	<th colspan="2">
					    		<label class="text-success">Total a pagar </label>
					    	</th>
					    	<td>
					    		<strong class="text-success">
					    			$<span id="span_total_a_pagar_{{$ad->id}}" class="text-success">{{number_format($ad->transaccion_pendiente['value'] ,2,',','.')}}</span>
					    		</strong>
					    	</td>
					    </tr>
					  </tbody>
				</table>						
			</div>
			<div class="movil col-12 col-md-12 col-sm-12">
				<h3 class="float-left" onclick="mover_izq()"><strong class="text-info">>>></strong></h3>
			</div>	
			<input type="hidden" id="hd_tipo_pago{{$ad->id}}" value="1">
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
						  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="2" >1. Pago en Efectivo Oficina Bogotá.</label>
						</div>
				      </th>
				      <td><span>-</span></td>
				  	  <td><span>0</span></td>
				    </tr>
				    <tr>
				      <th scope="row">
				      	<div class="radio">
						  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="3" checked>2. Pago consignación ventanilla Bancolombia.
						</label>
						</div>
				      </th>
				      <td><span>13.000 + 4x1.000</span></td>
					  <td><span>$$</span></td>
				    </tr>
				    <tr>
				      <th scope="row">
				      	<div class="radio">
						  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="1" checked>3. Pago transferencia o Corresponsal bancario.
						</label>
						</div>	
				      </th>
				      <td><span>+ 4x1.000</span></td>
					  <td><span>$$</span></td>
				    </tr>
				    <tr>
				    	<th colspan="2">
				    		<label class="text-success">Total a pagar </label>
				    	</th>
				    	<td>
				    		<strong class="text-success">
				    			$<span id="span_total_a_pagar_{{$ad->id}}" class="text-success">{{number_format($ad->transaccion_pendiente['value'] ,2,',','.')}}</span>
				    		</strong>
				    	</td>
				    </tr>
				  </tbody>
				</table>
			</div>
			<div class="movil col-12 col-md-12 col-sm-12">
			<h3 class="float-left" onclick="mover_izq()"><strong class="text-info">>>></strong></h3>	
			</div>		
			<input type="hidden" id="hd_tipo_pago{{$ad->id}}" value="3">
				
		@endif	
		
		
		<label id="msnMensajeCompra_{{$ad->id}}"></label>
		
		<input id="btn_comprar_{{$ad->id}}" type="button" name="submit" value="CAMBIAR METODO COMPRA" class="btn btn-success" onclick="enviar_registro_compra('{{$ad->id}}')" disabled>

	@elseif($ad->transaccion_pendiente['state']=='Visto' || $ad->transaccion_pendiente['state']==0)
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
					  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="2" >1. Pago en Efectivo Oficina Bogotá.</label>
					</div>				
			      </th>
			      <td><span>-</span></td>
				  <td><span>0</span></td>
			    </tr>
			    <tr>
			      <th scope="row">
			      	<div class="radio">
					  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="3">2. Pago consignación ventanilla Bancolombia.
						</label>
					</div>
			      </th>
			     <td><span>13.000 + 4x1.000</span></td>
			     <td><span>$$</span></td>
			    </tr>
			    <tr>
			      <th scope="row">
			      	<div class="radio">
					  <label><input type="radio" name="tipo_pago" onchange="validar_tipo_pago(this,'{{$ad->id}}')" value="1">3. Pago transferencia o Corresponsal bancario.
						</label>
					</div>	
			      </th>
			      <td><span>+ 4x1.000</span></td>
				  <td><span>$$</span></td>
			    </tr>
			    <tr>
			    	<th colspan="2">
			    		<label class="text-success">Total a pagar </label>
			    	</th>
			    	<td>
			    		<strong class="text-success">
			    			$<span id="span_total_a_pagar_{{$ad->id}}" class="text-success">{{number_format($ad->limite_min ,2,',','.')}}</span>	
			    		</strong>
			    		
			    	</td>
			    </tr>
			  </tbody>
			</table>
		</div>
		<div class="movil col-12 col-md-12 col-sm-12">
			<h3 class="float-left" onclick="mover_izq()"><strong class="text-info">>>></strong></h3>	
		</div>	
		
		<label id="msnMensajeCompra_{{$ad->id}}"></label>
		<input type="hidden" id="hd_tipo_pago{{$ad->id}}">
		<input id="btn_comprar_{{$ad->id}}" type="button" name="submit" value="COMPRAR" class="btn btn-success" onclick="enviar_registro_compra('{{$ad->id}}')" disabled>

	
	@endif
	
	
</div>