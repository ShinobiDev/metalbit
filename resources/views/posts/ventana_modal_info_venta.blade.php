 <div class="modal fade" id="{{'infoventa'.$ad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header bg-primary text-center">

               <h3 style="text-align: center;" class="modal-title" id="exampleModalLabel"><b>Compra garantizada</b></h3>
                <h4 class="modal-title" id="exampleModalLabel">{{config('app.name','') }}, te sirve de intermediario para garantizar que la transacción se exitosa para ambas partes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="salir_modal('{{'infoventa'.$ad->id}}')">
                  <span aria-hidden="true" >&times;</span>
                </button>
            </div>
            <div class="modal-header">
              <h4 style="text-align: center;" class="modal-title" id="exampleModalLabel"><b>Realiza tu compra</b></h4>
            </div>
            <div class="modal-body">
              <h5 class="modal-title" id="exampleModalLabel">Ingresa la cantidad de {{$ad->moneda}} que quieres adquirir en {{$ad->cripto_moneda}}</h5>
                <form method="POST" id="ad_form_{{$ad->id}}" action="{{$ad->url_api}}">
                       <input  type="hidden" id="num_val_crip_moneda_{{$ad->id}}" value="{{$ad->precio_moneda_cf}}">

                       <input  type="hidden" id="id_crip_moneda_{{$ad->id}}" value="{{$ad->id_cripto_moneda}}">
                       <input type="hidden" id="hd_margen_gananacia_{{$ad->id}}" value="{{$ad->margen_gananacia}}">

                       @if($ad->moneda != "BRL" && $ad->moneda != "CLP" && $ad->moneda != "COP" && $ad->moneda != "MXN" && $ad->moneda != "USD")

                            <input type="number" id="num_cantidad_moneda_{{$ad->id}}" class="textinput textInput form-control" min="{{$ad->limite_min}}" max="{{$ad->limite_max}}"
                           value="{{$ad->limite_min}}"
                           onchange="cambiar_valor_form_payu_moneda_valida('{{ $ad->id}}','{{$ad->cod_anuncio}}','{{$ad->moneda}}')" required>
                        @else
                            <input type="number" id="num_cantidad_moneda_{{$ad->id}}" class="textinput textInput form-control" min="{{$ad->limite_min}}" max="{{$ad->limite_max}}"
                             value="{{$ad->limite_min}}"
                             onchange="cambiar_valor_form_payu('{{ $ad->id}}','{{$ad->cod_anuncio}}','{{$ad->moneda}}')" required>
                        @endif
                       <div class="modal-body">
                            <h5 class="modal-title" id="exampleModalLabel">Precio de venta  {{$ad->cripto_moneda}} $ {{ $ad->precio_moneda}} en {{$ad->moneda}}</h5>
                          </div>
                           <div class="modal-body">
                                <h5 class="modal-title" >Total:<span id="h5Total_{{$ad->id}}"> {{ number_format($ad->limite_min / (float)number_format($ad->precio_moneda_sf,2,".",""),2,",",".")}} </span> {{$ad->cripto_moneda}}</h5>
                        </div>

                       <input type="hidden" id="hd_moneda_original" value="{{$ad->moneda}}">
                        @if($ad->moneda != "BRL" && $ad->moneda != "CLP" && $ad->moneda != "COP" && $ad->moneda != "MXN" && $ad->moneda != "USD")
                            @include("posts.no_permitidos")
                            <input type="hidden" id="hdh5_total_{{$ad->id}}" value="{{ number_format(((float)number_format($ad->limite_min / (float)number_format($ad->precio_moneda_sf,2,'.',''),2,'.',''))*number_format($ad->precio_moneda_usd_sf,2,'.','') ,2,'.','')
                          }}" >
                        @else
                            <input type="hidden" id="hdh5_total_{{$ad->id}}" value="{{number_format($ad->limite_min / (float)number_format($ad->precio_moneda_sf,2,'.','')  ,2,'.','')}}" >
                        @endif
                         <div class="modal-body">
                          <i class="fa fa-info-circle"></i>
                          <h5>Ingresa o sube el código QR de tu wallet dónde deseas recibir las monedas compradas</h5>

                          <input type="text" name="codigo_wallet" placeholder="Ingresa aquí tu código wallet" class="textinput textInput form-control" onchange="registrar_wallet(this,'{{$ad->id}}')" value="{{$ad->transaccion_pendiente['wallet']}}">
                          <div class="dropzone"></div>
                          <label id="msnEspera_{{$ad->id}}"></label>
                        </div>
                        <div class="modal-body">
                          @if(auth::user()->id!=$ad->id_anunciante)
                            @include('payu.botonpayu')
                          @endif
                        </div>
                </form>
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
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="salir_modal('{{'infoventa'.$ad->id}}')">SEGUIR VIENDO ANUNCIOS</button>
            </div>
          </div>
     </div>
</div>

     <!--
     * Aqui gestiono dropzone
     * @type {String}
     -->
<script type="text/javascript">
  new Dropzone('.dropzone',{
    //url:"/",
    url:"{{config('app.url')}}"+"/registrar_wallet_qr/{{auth()->user()->id}}",
    dictDefaultMessage:"Sube aquí tu código QR (solo se permiten imagenes con formato PNG,JPEG o JPG)",
    maxFiles:1,
    maxFilesize:10,//MB
    acceptedFiles: "image/*",
    dictMaxFilesExceeded:"Solo esta permitido subir un archivo",
    dictInvalidFileType:"Solo esta permitido subir imagenes",
    headers:{
      'X-CSRF-TOKEN':'{{csrf_token()}}'
    }
  });

  Dropzone.autoDiscover = false;

</script>