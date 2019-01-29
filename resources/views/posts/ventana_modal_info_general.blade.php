<div class="modal fade" id="{{'infogen'.$ad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        
        <div class="modal-header bg-primary text-center">
          <h4 style="text-align: center;" class="modal-title" id="exampleModalLabel"><b>Información del ofertante</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="salir_modal('{{'infogen'.$ad->id}}')">
            <span aria-hidden="true" >&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <b>Lugar:</b>
          {{$ad->lugar}}
          <br>
          <b>Términos:</b>
          <p class="text-justify">{{$ad->terminos}}</p>
        </div>
        <div class="modal-body">
          <b>Nombre del ofertante:</b> {{$ad->name}}
        </div>
         <div class="modal-body">
          <b>Teléfono del ofertante:</b> {{$ad->phone}}
        </div>
         <div class="modal-body">
          <b>Correo del ofertante:</b> {{$ad->correo_ofertante}}
        </div>
        <div class="modal-body">
          <b>Horario de atención:  </b> Desde {{explode("|",$ad->horario->horario)[0]}} hasta  {{explode("|",$ad->horario->horario)[1]}}
        
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
        <div class="modal-body" >
          <h4>Comentarios de otros usuarios: </h4>
          @include('partials.comentarios')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="salir_modal('{{'infogen'.$ad->id}}')">SEGUIR VIENDO ANUNCIOS</button>                                              
        </div>
      </div>
    </div>
</div>