<!--compras-->
<div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Compra de criptomonedas</h3>

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
        <table id="comprar-table" class="table table-striped table-codensed table-hover table-resposive">
          <thead>
            <tr>
              <th>Tipo transacción</th>
              <th>Calificación</th>
              <th>Forma de Pago</th>
              <th>Ubicación</th>
              <th style=" width: 150px;">Precio/Moneda</th>
              <th>Criptomoneda</th>
              <th style=" width: 200px;">Limites (min./max.)</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            {{--se crear anuncio de compra--}}
            @foreach ($anuncios as $ad)

                @if($ad->tipo_anuncio=="compra" )
                <tr id="row_{{$ad->id}}">
                  <td class="text-green text-center"><strong><h4>Compra</h4></strong></td>
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
                  <td style="width: 200px;">${{ number_format($ad->limite_min,2, ',', '.') }} / ${{ number_format($ad->limite_max,2, ',', '.')}} <strong>{{$ad->moneda}}</strong></td>
                  <td>
                    @guest
                      <!--AQUI SE MUESTRA LOS BOTONES PARA LOGIN -->


                            <button id="{{'btn_info_'.$ad->id}}" type="button" class="btn btn-success btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'ventana_login'.$ad->id}}','{{$ad->id}}','0','info')">
                              Ver info
                              </button>

                            {{-- <button id="{{'btn_'.$ad->id}}" type="button" class="btn btn-default btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'ventana_login'.$ad->id}}','{{$ad->id}}','0','venta')">
                              Vender
                            </button> --}}


                        

                    @else

                        <!--AQUI VALIDO QUE EL ANUNCIO NO SEA DE EL MISMO USUARIO QUE INICIO SESION-->
                        
                            @if($ad->btn_info)

                                @if($ad->visto!="")
                                   <!--<a id="anc_{{$ad->id}}" href="anuncios_vistos" class="btn btn-primary">Ya lo Viste</a>-->
                                    <button id="{{'anc_'.$ad->id}}" type="button" class="btn btn-primary btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'infogen'.$ad->id}}','{{$ad->id}}','0','info')">
                                    Ya lo viste
                                    </button>
                                   
                                @else
                                  
                                    <!--<a id="anc_{{$ad->id}}" href="anuncios_vistos" class="btn btn-primary" style="display: none">Ya lo Viste</a>-->
                                    <button id="{{'anc_'.$ad->id}}" type="button" class="btn btn-primary btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'infogen'.$ad->id}}','{{$ad->id}}','0','info')">
                                    Ya lo viste
                                    </button>
                                  
                                @endif

                                  
                       
                             @endif 

                            
                      @endguest

                  </td>
                </tr>
                @endif
            @endforeach
            {{--se crear anuncio de compra--}}
          </tbody>
        </table>
        {{--ventanas--}}
        @foreach ($anuncios as $ad)

                @if($ad->tipo_anuncio=="compra" )
               
                    @guest
                      <!--AQUI SE MUESTRA LOS BOTONES PARA LOGIN -->

                        @include('posts.ventana_modal_login')

                    @else

                        <!--AQUI VALIDO QUE EL ANUNCIO NO SEA DE EL MISMO USUARIO QUE INICIO SESION-->
                        
                            @if($ad->btn_info)

                                @if($ad->visto!="")
                                  
                                    @include('posts.ventana_modal_info_general')
                                @else
                                
                                  <!--AQUI INCLUYO LA VENTANA MODAL DE INFORMACION GENERAL-->
                                  @include('posts.ventana_modal_info_general')
                                @endif
                       
                             @endif 

                            
                      @endguest

                  </td>
                </tr>
                @endif
            @endforeach
    </div>


  </div>


</div>
<!--compras-->
