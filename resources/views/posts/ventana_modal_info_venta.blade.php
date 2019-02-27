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

                       @if($ad->transaccion_pendiente['value']!=0)
                       
                        <input type="number" id="num_cantidad_moneda_{{$ad->id}}" class="textinput textInput form-control" min="{{number_format($ad->limite_min,0,'','')}}" max="{{number_format($ad->limite_max,0,'','')}}"
                             value="{{$ad->transaccion_pendiente['value_transaccion']}}"
                             onchange="registro_compra('{{ $ad->id}}','{{$ad->cod_anuncio}}','{{$ad->moneda}}')" readonly>
                       @else
                        <input type="number" id="num_cantidad_moneda_{{$ad->id}}" class="textinput textInput form-control" min="{{number_format($ad->limite_min,0,'','')}}" max="{{number_format($ad->limite_max,0,'','')}}"
                             value="{{number_format($ad->limite_min,0,'','')}}"
                             onchange="registro_compra('{{ $ad->id}}','{{$ad->cod_anuncio}}','{{$ad->moneda}}')" required>
                       @endif
                       

                       {{--@if($ad->moneda != "BRL" && $ad->moneda != "CLP" && $ad->moneda != "COP" && $ad->moneda != "MXN" && $ad->moneda != "USD")

                            <input type="number" id="num_cantidad_moneda_{{$ad->id}}" class="textinput textInput form-control" min="{{$ad->limite_min}}" max="{{$ad->limite_max}}"
                           value="{{$ad->limite_min}}"
                           onchange="cambiar_valor_form_payu_moneda_valida('{{ $ad->id}}','{{$ad->cod_anuncio}}','{{$ad->moneda}}')" required>
                        @else
                            <input type="number" id="num_cantidad_moneda_{{$ad->id}}" class="textinput textInput form-control" min="{{$ad->limite_min}}" max="{{$ad->limite_max}}"
                             value="{{$ad->limite_min}}"
                             onchange="cambiar_valor_form_payu('{{ $ad->id}}','{{$ad->cod_anuncio}}','{{$ad->moneda}}')" required>
                        @endif--}}
                       <div class="modal-body">
                            <h5 class="modal-title" id="exampleModalLabel">Precio de venta  {{$ad->cripto_moneda}} $ {{ $ad->precio_moneda}} en {{$ad->moneda}}</h5>
                          </div>
                           <div class="modal-body">
                                <h5 id="msnEspera_compra_{{$ad->id}}" style="display: none"></h5>
                                
                                @if($ad->transaccion_pendiente['value']!=0)
                                  <h5 class="modal-title" >Total:<span id="h5Total_{{$ad->id}}"> 
                                    {{number_format($ad->transaccion_pendiente['quantity'],2,',','.')}}

                                 </span> {{$ad->cripto_moneda}}</h5>
                                @else
                                  <h5 class="modal-title" >Total:<span id="h5Total_{{$ad->id}}"> 
                                    {{number_format($ad->limite_min / (float)$ad->precio_moneda_sf,2,',','.')}}

                                 </span> {{$ad->cripto_moneda}}</h5>
                                @endif

                                


                                  {{-- number_format($ad->limite_min / (float)number_format($ad->precio_moneda_sf,2,".",""),2,",",".")--}}
                                  
                                  
                                <input type="hidden" id="hdTotal_{{$ad->id}}" value="{{ number_format($ad->limite_min / (float)number_format($ad->precio_moneda_sf,2,".",""),2,",","")}} " >

                        </div>

                       <input type="hidden" id="hd_moneda_original" value="{{$ad->moneda}}">
                        @if($ad->transaccion_pendiente['quantity']!=0)
                          <input type="hidden" id="hdh5_total_{{$ad->id}}" value="{{$ad->transaccion_pendiente['quantity']}}" >
                        @else
                          <input type="text" id="hdh5_total_{{$ad->id}}" value="{{number_format($ad->limite_min / (float)number_format($ad->precio_moneda_sf,2,'.','')  ,2,'.','')}}" >
                        @endif
                        {{--@if($ad->moneda != "BRL" && $ad->moneda != "CLP" && $ad->moneda != "COP" && $ad->moneda != "MXN" && $ad->moneda != "USD")
                            @include("posts.no_permitidos")
                            <input type="hidden" id="hdh5_total_{{$ad->id}}" value="{{ number_format(((float)number_format($ad->limite_min / (float)number_format($ad->precio_moneda_sf,2,'.',''),2,'.',''))*number_format($ad->precio_moneda_usd_sf,2,'.','') ,2,'.','')
                          }}" >
                        @else
                            <input type="hidden" id="hdh5_total_{{$ad->id}}" value="{{number_format($ad->limite_min / (float)number_format($ad->precio_moneda_sf,2,'.','')  ,2,'.','')}}" >
                        @endif--}}
                         <div class="modal-body">
                          <i class="fa fa-info-circle"></i>
                          <h5>Ingresa o sube el código QR de tu wallet dónde deseas recibir las monedas compradas</h5>

                          <input type="text" name="codigo_wallet" placeholder="Ingresa aquí tu código wallet" class="textinput textInput form-control" onchange="registrar_wallet(this,'{{$ad->id}}')" value="{{$ad->transaccion_pendiente['wallet']}}">
                          
                          
                          @if($ad->transaccion_pendiente['wallet_qr']!='SIN REGISTRAR' && $ad->transaccion_pendiente['wallet_qr']!='0')
                            <a target="_blank" href="{{config('app.url')}}/archivos/transacciones/{{auth()->user()->id}}/{{$ad->transaccion_pendiente['wallet_qr']}}"><span class="text-primary">Ver wallet QR</span></a>
                          @endif

                           <input type="file" id="flWallet_{{$ad->id}}" name="wallet" onchange="subir_archivo('{{$ad->id}}',this)">    
                         

                          <label id="msnEspera_{{$ad->id}}"></label>
                        </div>
                        @if($ad->transaccion_pendiente['state']=='Visto')
                          @include('partials.redimir_cupon_venta',['c'=>$ad->id])
                        @endif

                        <div class="modal-body">
                          @if(auth::user()->id!=$ad->id_anunciante)
                            @include('payu.botonpayu')
                            @include('partials.btn_comprar')
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

<script type="text/javascript">
  function subir_archivo(id,e){
        //e.preventDefault();
          mostrar_cargando("msnEspera_"+id,10,"Cargando ...");
          var Token =  '{{csrf_token()}}';
          var formData = new FormData();
          formData.append("file", $('#'+e.id).get(0).files[0]);
          formData.append("Token", Token);

          // Send the token every ajax request
          $.ajaxSetup({
              headers: { 'X-CSRF-Token' : Token }
          });

              $.ajax({        
                      url: "{{config('app.url')}}"+"/registrar_wallet_qr/"+id,
                      method: 'POST',
                      data: formData,
                      processData: false,
                      contentType: false,
                      cache: false,
                      success: function(data) {
                          document.getElementById("msnEspera_"+id).innerHTML=data.mensaje;
                      },
                      error:function(data){
                        console.log(data);
                        if(data.responseJSON.message=="The given data was invalid."){
                          document.getElementById("msnEspera_"+id).innerHTML="El formato del archivo debe ser .pdf";  
                        }else{
                          document.getElementById("msnEspera_"+id).innerHTML=data.responseJSON.message;
                        }
                        
                      }
              });
      }
</script>