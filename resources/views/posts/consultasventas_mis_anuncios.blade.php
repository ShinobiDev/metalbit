<!--ventas-->
 <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
    <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title">Listado anuncios de venta</h3>
            @guest
              <a href="{{route('login')}}" class="btn btn-primary pull-right btn-lg" >
                  <i class="fa fa-user-plus"> Crea un anuncio</i>
              </a>
              @else
               <a href="{{route('anuncios.create')}}" class="btn btn-primary pull-right btn-lg" >
                  <i class="fa fa-user-plus"> Crea un anuncio</i>
              </a>
              @endguest

      </div>
     <div class="box-body">
          <table id="users-table"class="table table-striped table-codensed table-hover table-resposive">
            <thead>
              <tr>
                {{--<th>Código anuncio</th> --}}
                <th>Tipo transacción</th>
                <th>Calificación</th>
                <th>Forma de Pago</th>
                <th>Ubicación</th>
                <th style=" width: 150px;">Precio/Moneda</th>
                <th>Criptomoneda</th>
                <th style=" width: 200px;">Limites (min./max.)</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              {{--se crean las tablas de ventas--}}
              @foreach ($anuncios as $ad)
                  @if($ad->tipo_anuncio =="venta")
                   <tr id="{{$ad->id}}">
                    {{--<td class="text-center"><strong><h3>{{$ad->cod_anuncio}}</h3></strong></td>--}}
                    <td class="text-green text-center"><strong><h4>Venta</h4></strong></td>
                    <td>
                      @for($i=1;$i<=$ad->calificacion;$i++)
                          @if($i<=3)
                            <img  class="star" src="{{asset('img/star.png')}}">
                          @endif
                      @endfor
                    </td>
                    <td>{{$ad->banco }}</td>
                    <td>{{$ad->ubicacion}}</td>
                    <td>
                       <span class="text-blue"><h5>$ {{$ad->precio_moneda}} <span class="text-red">{{$ad->moneda}}</span></h5></span> 


                   </td>
                    <td><strong>{{$ad->cripto_moneda}}</strong></td>
                    <td style="width: 200px;">$ {{ number_format($ad->limite_min,2, ',', '.') }} / </br>$ {{ number_format($ad->limite_max,2, ',', '.')}} <strong>{{$ad->moneda}}</strong></td>
                    <td>
                      @role('Admin')
                        <h5 id="h5_estado_{{$ad->id}}" class="text-red">{{$ad->estado_anuncio}}</h5>
                        @if($ad->estado_anuncio=="sin publicar")
                          <input id="rng_{{$ad->id}}" type="range" min="0" max="3" value="0" onchange="cambiar_estado('{{$ad->id}}')">
                        @elseif($ad->estado_anuncio=="bloqueado")
                          <input id="rng_{{$ad->id}}" type="range" min="0" max="" value="0" onchange="cambiar_estado('{{$ad->id}}')">
                        @endif
                      @endrole


                      @role('Comerciante')

                        <h5 id="h5_estado_{{$ad->id}}" class="text-red">{{$ad->estado_anuncio}}</h5>
                        @if($ad->estado_anuncio=="activo")
                          <input id="rng_{{$ad->id}}" type="range" min="0" max="1" value="1" onchange="cambiar_estado('{{$ad->id}}')">
                        
                        @elseif($ad->estado_anuncio=="inactivo")

                          <input id="rng_{{$ad->id}}" type="range" min="0" max="1" value="0" onchange="cambiar_estado('{{$ad->id}}')">
                        @endif
                      
                      @endrole
                    </td>
                    <td>
                      @guest
                              <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-success btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'ventana_login'.$ad->id}}','{{$ad->cod_anuncio}}','0','info')">
                                Ver info
                                </button>

                              <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-default btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'ventana_login'.$ad->id}}','{{$ad->cod_anuncio}}','0',false)">
                                Comprar
                              </button>



                      @else

                            <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-success btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'infogen'.$ad->id}}','{{$ad->id_anuncio}}','0',false)">
                            Ver info
                            </button>


                      @endguest


                    </td>
                   </tr>
                  @endif
              @endforeach
              {{--se crean las tablas de ventas--}}
            </tbody>
          </table>

          {{--ventanas--}}
           @foreach ($anuncios as $ad)
                  @if($ad->tipo_anuncio =="venta")
                  
                      @guest
                              


                           @include('posts.ventana_modal_login')
                      @else

                          

                          @include('posts.ventana_modal_info_general')

                      @endguest


                    </td>
                   </tr>
                  @endif
              @endforeach

     </div>



    </div>


 </div>
<!--ventas-->

