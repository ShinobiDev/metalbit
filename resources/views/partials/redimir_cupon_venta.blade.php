	<div>
	<label for="valor">Tienes un cupón, puedes redimirlo aquí</label>
	<input type="text" class="form-control" name="cupon" id="txt_cupon_{{$c}}" onchange="canjear_cupon_compra(this,'{{$c}}')" placeholder="Ingresa aquí tu cupón">
	


		<input type="hidden" name="valor_descuento_cupon" id="hd_cupon{{$c}}" value="{{$ad->limite_min}}" >
		
	
	
	<input type="hidden"  id="validar_{{$c}}" value="false" >
	
	<span id="sp_espera_cupon{{$c}}"></span>
	<div id="div_cupon_menor_{{$c}}" style="display: none">
		<label for="valor" class="text-red">El valor de este cupón es mayor al valor de este trámite, ¿deseas continuar?</label></br>
		<button type="button" class="btn btn-secondary" onclick="cambiar_validacion('{{$c}}','true')">SI</button>
	    <button type="button" class="btn btn-secondary" onclick="cambiar_validacion('{{$c}}','false')" >NO</button>
	</div>
</div>
