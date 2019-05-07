<!--compras-->
<div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados anuncios de compra</h3>

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
        <table id="comprar-table"class="table table-striped table-codensed table-hover table-resposive">
          <thead>
            <tr class="bg-yellow">
              {{--<th>Código anuncio</th>--}}
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
            {{--se crear anuncio de compra--}}
            @foreach ($anuncios as $ad)

                @if($ad->tipo_anuncio=="compra")
                <tr id="row_{{$ad->id}}">
                  {{--<td class="text-center"><strong><h6>C-{{$ad->id}}</h6></strong></td>--}}
                  <td class="text-green text-center bg-danger"><strong><h4>Compra</h4></strong></td>
                  <td>
                    <div style="margin-top: 15px">
                      @for($i=1;$i<=$ad->calificacion;$i++)
                        @if($i<=3)
                          <img  class="star" src="{{asset('img/star.png')}}">
                        @endif
                      @endfor  
                    </div>
                    
                  </td><td>{{$ad->banco }}</td>
                  <td class="bg-success">{{$ad->ubicacion}}</td>
                  <td>
                     <span class="text-blue"><h5> <span class="text-red">$</span> {{$ad->precio_moneda}} <span class="text-red">{{$ad->moneda}}</span></h5></span> 

                 </td>
                  <td class="text-center"><strong>{{$ad->cripto_moneda}}</strong></td>
                  <td class="bg-danger text-primary" style="width: 200px"><span class="text-red">$</span> {{ number_format($ad->limite_min,2, ',', '.') }} / </br><span class="text-red">$</span>{{ number_format($ad->limite_max,2, ',', '.')}} <strong class="text-red">{{$ad->moneda}}</strong></td>
                   <td style="width: 250px">
                      @role('Admin')
                        
                        <div >
                          <h5 id="h5_estado_{{$ad->id}}" class="text-red" style="width: 150px">{{$ad->estado_anuncio}}</h5>

                          @if($ad->estado_anuncio=="sin publicar")

                            <div>                              
                              <select class="form-control" onchange="cambiar_estado('{{$ad->id}}',this)">
                                <option value="1" selected>Sin publicar</option>
                                <option value="2">Bloqueado</option>
                                <option value="3">Activo</option>
                                <option value="4">Inactivo</option>
                              </select>
                            </div>

                            
                          @elseif($ad->estado_anuncio=="activo")
                          <div>                              
                              <select class="form-control" onchange="cambiar_estado('{{$ad->id}}',this)">
                                
                                <option value="2">Bloqueado</option>
                                <option value="3" selected>Activo</option>
                                <option value="4">Inactivo</option>
                              </select>
                          </div>
                          @elseif($ad->estado_anuncio=="bloqueado")
                            <div>                              
                               <select class="form-control" onchange="cambiar_estado('{{$ad->id}}',this)">
                                
                                <option value="2" selected>Bloqueado</option>
                                <option value="3">Activo</option>
                                <option value="4">Inactivo</option>
                              </select>
                            </div>
                          @elseif($ad->estado_anuncio=="inactivo")
                              <div>                              
                                  <select class="form-control" onchange="cambiar_estado('{{$ad->id}}',this)">
                                
                                <option value="2">Bloqueado</option>
                                <option value="3">Activo</option>
                                <option value="4" selected>Inactivo</option>
                              </select>
                              </div>
                          @endif
                          

                        </div>
                      @endrole<span></span>


                      @role('Comerciante')

                        <h5 id="h5_estado_{{$ad->id}}" class="text-red">{{$ad->estado_anuncio}}</h5>
                        @if($ad->estado_anuncio=="activo")
                            <div>                              
                               <select class="form-control" onchange="cambiar_estado('{{$ad->id}}',this)">
                                <option value="3" selected>Activo</option>
                                <option value="4">Inactivo</option>
                              </select>
                            </div>
                        
                        @elseif($ad->estado_anuncio=="inactivo")
                              <div>                              
                                 <select class="form-control" onchange="cambiar_estado('{{$ad->id}}',this)">
                                <option value="3">Activo</option>
                                <option value="4" selected>Inactivo</option>
                              </select>
                              </div>
                          
                        @endif
                      
                      @endrole
                    </td>
                    
                  {{--<td>
                    <h5 id="h5_estado_{{$ad->id}}" class="text-red">{{$ad->estado_anuncio}}</h5>
                    @if($ad->estado_anuncio=="activo")
                      <input id="rng_{{$ad->id}}" type="range" min="0" max="1" value="1" onchange="cambiar_estado('{{$ad->id}}')">
                    @else
                      <input id="rng_{{$ad->id}}" type="range" min="0" max="1" value="0" onchange="cambiar_estado('{{$ad->id}}')">
                    @endif

                  </td>--}}
                  <td>
                    @guest
                      <!--AQUI SE MUESTRA LOS BOTONES PARA LOGIN -->

                     <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-success btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'ventana_login'.$ad->id}}','{{$ad->id}}','0',false)">
                              Ver info
                      </button>

                    @else
                        <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-success btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'infogen'.$ad->id}}','{{$ad->id}}','0','info')">
                              Ver info
                        </button>

                        <!--AQUI INCLUYO LA VENTANA MODAL DE INFORMACION GENERAL-->
                   
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

                @if($ad->tipo_anuncio=="compra")
              

                  
                    @guest
                      <!--AQUI SE MUESTRA LOS BOTONES PARA LOGIN -->

                     

                        
                      @include('posts.ventana_modal_login')

                    @else
                       
                        @include('posts.ventana_modal_info_general')
                    @endguest

                 
                @endif
            @endforeach                        
    </div>


  </div>


</div>
<!--compras-->
