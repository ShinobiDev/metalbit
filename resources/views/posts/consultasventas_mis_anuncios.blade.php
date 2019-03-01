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
                <th class="col-6 col-lg-6">Tipo transacción</th>
                <th class="col-6 col-lg-6">Calificación</th>
                <th>Forma de Pago</th>
                <th>Ubicación</th>
                <th >Precio/Moneda</th>
                <th>Criptomoneda</th>
                <th >Limites (min./max.)</th>
                <th >Estado del anuncio</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              {{--se crean las tablas de ventas--}}
              @foreach ($anuncios as $ad)
                  @if($ad->tipo_anuncio =="venta")
                   <tr id="row_{{$ad->id}}">
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
                      @role('Admin')
                        
                        <div >
                          <h5 id="h5_estado_{{$ad->id}}" class="text-red">{{$ad->estado_anuncio}}</h5>
                          @if($ad->estado_anuncio=="sin publicar")

                            <div>                              
                              <input id="rng_{{$ad->id}}" type="range" min="1" max="4" value="1" onchange="cambiar_estado('{{$ad->id}}',this)">
                              <h6><strong>
                                  <span class="text-red" id="sp_1_{{$ad->id}}">1-Sin publicar</span>
                                  <span id="sp_2_{{$ad->id}}">2-Bloqueado</span>
                                  <span id="sp_3_{{$ad->id}}">3-Activo</span>
                                  <span id="sp_4_{{$ad->id}}">4-Inactivo</span></strong>
                                </h6>
                            </div>

                            
                          @elseif($ad->estado_anuncio=="activo")
                          <div>                              
                              <input id="rng_{{$ad->id}}" type="range" min="1" max="4" value="3" onchange="cambiar_estado('{{$ad->id}}',this)">
                                <h6><strong>
                                  <span id="sp_1_{{$ad->id}}">1-Sin publicar</span>
                                  <span id="sp_2_{{$ad->id}}">2-Bloqueado</span>
                                  <span class="text-red" id="sp_3_{{$ad->id}}">3-Activo</span>
                                  <span id="sp_4_{{$ad->id}}">4-Inactivo</span></strong>
                                </h6>
                          </div>
                          @elseif($ad->estado_anuncio=="bloqueado")
                            <div>                              
                                <input id="rng_{{$ad->id}}" type="range" min="1" max="4" value="2" onchange="cambiar_estado('{{$ad->id}}',this)">
                                <h6><strong>
                                  <span id="sp_1_{{$ad->id}}">1-Sin publicar</span>
                                  <span class="text-red" id="sp_2_{{$ad->id}}">2-Bloqueado</span>
                                  <span id="sp_3_{{$ad->id}}">3-Activo</span>
                                  <span id="sp_4_{{$ad->id}}">4-Inactivo</span></strong>
                                </h6>
                            </div>
                          @elseif($ad->estado_anuncio=="inactivo")
                              <div>                              
                                  <input id="rng_{{$ad->id}}" type="range" min="1" max="4" value="4" onchange="cambiar_estado('{{$ad->id}}',this)">  
                                  <h6><strong>
                                  <span id="sp_1_{{$ad->id}}">1-Sin publicar</span>
                                  <span id="sp_2_{{$ad->id}}">2-Bloqueado</span>
                                  <span  id="sp_3_{{$ad->id}}">3-Activo</span>
                                  <span class="text-red" id="sp_4_{{$ad->id}}">4-Inactivo</span></strong>
                                </h6>
                              </div>
                          @endif
                          

                        </div>
                      @endrole<span></span>


                      @role('Comerciante')

                        <h5 id="h5_estado_{{$ad->id}}" class="text-red">{{$ad->estado_anuncio}}</h5>
                        @if($ad->estado_anuncio=="activo")
                            <div>                              
                                <input id="rng_{{$ad->id}}" type="range" min="3" max="4" value="3" onchange="cambiar_estado('{{$ad->id}}',this)">
                                <h6><strong>
                                  <span id="sp_1_{{$ad->id}}" style="display:none">1-Sin publicar</span>
                                  <span id="sp_2_{{$ad->id}}" style="display:none">2-Bloqueado</span>
                                  <span class="text-red"  id="sp_3_{{$ad->id}}">3-Activo</span>
                                  <span id="sp_4_{{$ad->id}}">4-Inactivo</span></strong>
                                </h6>
                            </div>
                        
                        @elseif($ad->estado_anuncio=="inactivo")
                              <div>                              
                                   <input id="rng_{{$ad->id}}" type="range" min="3" max="4" value="4" onchange="cambiar_estado('{{$ad->id}}',this)">
                                <h6><strong>
                                  <span id="sp_1_{{$ad->id}}" style="display:none">1-Sin publicar</span>
                                  <span id="sp_2_{{$ad->id}}" style="display:none">2-Bloqueado</span>
                                  <span id="sp_3_{{$ad->id}}">3-Activo</span>
                                  <span class="text-red" id="sp_4_{{$ad->id}}">4-Inactivo</span></strong>
                                </h6>
                                </h6>
                              </div>
                          
                        @endif
                      
                      @endrole
                    </td>--}}
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

