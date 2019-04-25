<div class="modal fade" id="{{'infogen'.$ad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        
        <div class="modal-header bg-primary text-center">
          <h3 style="text-align: center;" class="modal-title" id="exampleModalLabel"><b>Información del ofertante</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="salir_modal('{{'infogen'.$ad->id}}')">
            <span aria-hidden="true" >&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <h4 ><b class="text-info">Lugar:</b> <b>{{$ad->lugar}}</b></h4>
          
          <br>
          <h4><b class="text-info">Términos:</b></h4>
          <b><p class="text-justify">{{$ad->terminos}}</p></b>
        </div>
        <div class="modal-body">
          <h4><b class="text-info">Nombre del ofertante:</b> <b>{{$ad->name}}</b></h4> 
        </div>
         <div class="modal-body">
          <h4><b class="text-info">Teléfono del ofertante:</b> <b>{{$ad->phone}}</b></h4>
        </div>
         <div class="modal-body">
          <h4><b class="text-info">Correo del ofertante:</b> <b>{{$ad->correo_ofertante}}</b></h4>
        </div>
        <div class="modal-body">
          <h4><b class="text-info">Horario de atención:  </b> <b>Desde {{explode("|",$ad->horario->horario)[0]}} hasta  {{explode("|",$ad->horario->horario)[1]}}</b></h4>        
        </div>
        <div class="modal-body">
            <h4 class="text-info"><b>Calificación del anunciante: </b></h4>
            @for($i=1;$i<=$ad->calificacion;$i++)
                @if($i<=3)
                  <img  class="star" src="{{asset('img/star.png')}}">
                @endif
            @endfor
         </div>
         <div class="modal-body">
          <h6 class="text-info">Visto por última vez {{$ad->visto}}</h6>
        </div>
        <div class="modal-body" >
          <h4 class="text-success">Comentarios de otros usuarios: </h4>
          @include('partials.comentarios')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="salir_modal('{{'infogen'.$ad->id}}')">SEGUIR VIENDO ANUNCIOS</button>                                              
        </div>
      </div>
    </div>
</div>