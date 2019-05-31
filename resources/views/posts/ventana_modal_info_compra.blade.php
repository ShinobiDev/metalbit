<div class="modal fade" id="{{'infocompra'.$ad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;" >
<div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header bg-primary text-center">
        <h3 style="text-align: center;" class="modal-title" id="exampleModalLabel"><b>Venta garantizada</b></h3>
        <h4 class="modal-title" id="exampleModalLabel">{{config('app.name','') }}, te sirve de intermediario para garantizar que la transacción se exitosa para ambas partes</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="salir_modal('{{'infocompra'.$ad->id}}')">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>

      <div class="modal-header">
        <h4 style="text-align: center;" class="modal-title" id="exampleModalLabel"><b>Calcula tu transacción</b></h4>
      </div>
      <div class="modal-body">
        <h5 class="modal-title" id="exampleModalLabel">Ingresa la cantidad de {{$ad->cripto_moneda}} que quieres vender</h5>
         <input type="hidden" id="num_val_crip_moneda_{{$ad->id}}" value="{{$ad->precio_moneda_cf}}"> 
        
         <input type="number" id="num_cantidad_moneda_{{$ad->id}}" class="textinput textInput form-control"  min="{{$ad->limite_min}}" max="{{$ad->limite_max}}" value="{{$ad->limite_min}}" 
         onchange="cambiar_valor_form_compra('{{ $ad->id}}','{{$ad->cod_anuncio}}','{{$ad->moneda}}')">
            
      </div>
      <div class="modal-body">
          <b>Horario de atención:  </b> <b>Desde {{explode("|",$ad->horario->horario)[0]}} hasta  {{explode("|",$ad->horario->horario)[1]}}</b>
          
      </div>
      <div class="modal-body">
        <h5 class="modal-title" id="exampleModalLabel">Precio de venta  {{$ad->cripto_moneda}} $ {{ number_format((int)number_format($ad->precio_moneda_sf,2,".","") * (int)$ad->limite_min,2,",",".")}} {{$ad->moneda}}</h5>
        
      </div>
      <div class="modal-body">
        <h5 class="modal-title" >Total:<span id="h5Total_{{$ad->id}}">  {{number_format($ad->limite_min / (float)number_format($ad->precio_moneda_sf,2,".",""),2,",",".")}} {{$ad->moneda}}</span></h5>  
       </div>

      <div class="modal-body">
        <h4>Calificación del anunciante: </h4>
          @for($i=1;$i<=$ad->calificacion;$i++)
              @if($i<=3)
                <img  class="star" src="{{asset('img/star.png')}}">
              @endif
          @endfor
      </div>
      <div class="modal-body">
        <h6>Visto por última vez {{$ad->visto}}</h6>
      </div>      
      <div class="modal-footer">
        <button  type="button" class="btn btn-primary" data-dismiss="modal" onclick="salir_modal('{{'infocompra'.$ad->id}}')">SEGUIR VIENDO ANUNCIOS</button>
      </div>
      
    </div>
</div>                                       
</div>