@extends('layouts.app')


@section('content')

<div class="row">
        <!--DIVISION USUARIO-->
        <div class="col-md-4">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{asset('admin-lte/dist/img/user4-128x128.jpg')}}" alt="{{$user->name}}">

            <h3 class="profile-username text-center">{{$user->name}}</h3>

            <h3 class="text-muted text-center">{{$user->getRoleNames()->implode(', ')}}</h3>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item" style="margin-left:  10px;">
                <b style="margin-left:  10px;">Email</b> <a class="pull-right" style="margin-right:  10px;">{{$user->email}}</a>
              </li>
              <li class="list-group-item" style="margin-left:  10px;">
                <b style="margin-left:  10px;">Teléfono</b> <a class="pull-right" style="margin-right: 10px;">{{$user->phone}}</a>
              </li>
              <li class="list-group-item" style="margin-left:  10px;">
                <b style="margin-left:  10px;">Código para referir</b> <a class="pull-right" style="margin-right:  10px;">{{$user->codigo_referido}}</a>
              </li>
              <li class="list-group-item" style="margin-left:  10px;">
                <b style="margin-left:  10px;">Cuenta bancaria</b> <a class="pull-right" style="margin-right:  10px;">{{$user->cuenta_bancaria or "SIN REGISTRAR"}}</a>
              </li>
              <li class="list-group-item" style="margin-left:  10px;">
                <b style="margin-left:  10px;">Certificación bancaria</b> <a class="pull-right" style="margin-right:  10px;" href="{{config('app.url').$user->certificacion_bancaria}}" target="{{$user->certificacion_bancaria ? '_blank' : '' }}">{{$user->certificacion_bancaria ? 'descargar' : 'Sin registrar' }}</a>
              </li>
              <li class="list-group-item" style="margin-left:  10px;text-align: center;">
                <b>Horario de atención</b>
              </li>  
              @foreach($horarios as $h)
                <li class="list-group-item" style="margin-left:  10px;"><b style="margin-left:  10px;">{{$h->dia}} </b> <a style=" margin-right: 10px;" class="pull-right">{{explode("|",$h->horario)[0] }} a {{explode("|",$h->horario)[1] }} {{$h->estado_dia}}</a>
                </li>
              @endforeach
            </ul>

            <a href="{{route('users.edit', $user)}}" class="btn btn-primary btn-block"><b>Editar</b></a>
          </div>
        </div>

        <div class="col-md-3">
          <!--DIVISION MIS BONIFICACIONES-->  
          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Mis bonificaciones</h3>
              </div>
              <div class="box-body"><h4 class="box-title"></h4>
                        <a class="btn btn-success" href="{{config('app.url').'/mis_bonificaciones'}}">VER</a>
              </div> 

          </div>
        
          <!--DIVISION MIS TRANSACIIONES-->

           <div class="box box-danger">
              <div class="box-header with-border">
                  <h3 class="box-title">Compartir en facebook</h3>
              </div>
              <div class="box-body">
                @include('partials.btn_facebook')
              </div> 

          </div>

           <!--DIVISION COMPARTIR EMAIL-->
           <div class="box box-warning">
              <div class="box-header with-border">
                  <h3 class="box-title">Compartir por correo electrónico</h3>
              </div>
              <div class="box-body">
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLongShareMail">
                      Compartir
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLongShareMail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Comparte tu código de referido</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="{{url('compartir_mail')}}">
                                  {{ csrf_field() }}
                                    <input id="txt_mis_correos" name="correos"  type="text" class="form-control" required>
                                    <h5>Escribe los correos separados por una coma ',' de tus amigos a los que quieres sugerir {{config('app.name')}}. </h5>
                                    <input type="submit" class="btn btn-primary" value="Enviar correo">
                                    
                             </form> 

                            
                        </div>
                      </div>
                      </div>
                    </div>
              </div> 

          </div>
        @role('Admin')
          <!--DIVISION PARA PORCENTAJE-->
          
              <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Editar porcentaje ganacia </h3>
                </div>
                <div class="box-body">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLongEditar">
                        Editar
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModalLongEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Editar variable de ganancia porcentaje</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="{{url('editar_variables')}}">
                                    {{ csrf_field() }}
                                      <input name="valor" value="{{$variables[0]->valor}}"  type="text" class="form-control" required>
                                      <input name="nombre" value="{{$variables[0]->nombre}}"  type="hidden" >
                                      <h5>Escriba aqui el valor que quieres asignar a tu porcentaje de ganancia por transacción</h5>
                                      <input type="submit" class="btn btn-primary" value="Editar  ">

                               </form>


                          </div>
                        </div>
                        </div>
                      </div>
                </div>

              </div>
          
        @endrole

        </div>
        
        
          
        <div class="col-md-3">
           <!--DIVISION RECARAGS-->
          <div class="box box-danger">
              <div class="box-header with-border">
                  <h3 class="box-title">Realizar Recarga</h3>
              </div>
              <div class="box-body">

                  @foreach ($recargas as $recarga)

                      @if ($recarga->valor <= '0')
                          <h4>Actualmente no tienes saldo</h4>
                      @else
                        <h4>Su saldo actual es: $ <span id="sp_valor_recarga">{{number_format($recarga->valor,2,',','.')}}</span> <small> {{$recarga->status}}</small></h4>
                      @endif

                  @endforeach


                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ventanarecarga">
                      Recargar
                    </button>
                    
                    @if($recarga_pendiente!=null)
                      @if($recarga_pendiente->estado_detalle_recarga=='PENDIENTE APROBACION' &&( $recarga_pendiente->metodo_pago=='Transferencia bancaria' || $recarga_pendiente->metodo_pago=='Consignacion bancaria' ) )
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ConfirmarRecarga">
                          Confirma tu recarga
                        </button>                      
                      @endif
                    @endif

                    <!-- Modal recargas -->
                   <div class="modal fade" id="ventanarecarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-primary text-center">
                            <h4 class="modal-title" id="exampleModalLongTitle">Realizar Recargas</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">                            
                            @include('partials.btn_recarga')
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--MODAL CONFIRMAR RECARGA-->
                    @if($recarga_pendiente!=null)
                      <div class="modal fade" id="ConfirmarRecarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Confirma tu recarga</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <h4>Valor a pagar: $ {{number_format($recarga_pendiente->valor_pagado,0,',','.')}}</h4>
                            </div>
                            <div class="modal-body">
                              <form id="formConfirmarPago">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">#Transacción</label>
                                              <input name="numero_transaccion" type="text" class="form-control" placeholder="Ingresa el número de transacción">
                                              @if($recarga_pendiente->estado_detalle_recarga=='PENDIENTE APROBACION' && ($recarga_pendiente->metodo_pago=='Transferencia bancaria' || $recarga_pendiente->metodo_pago=='Consignacion bancaria'))
                                                <input type="hidden" value="{{$recarga_pendiente->id}}" name="id_pago">

                                                <label >Sube aquí, cualquier archivo para certificar tu pago, puede ser una imagen o un archivo .pdf</label>
                                                <input name="archivo" id="flcerpago_{{$recarga_pendiente->id}}" type="file" onchange="subir_archivo_certificacion_pago_recarga('{{$recarga_pendiente->id}}',this)" >

                                              @endif
                                                         
                                            </div>                                          
                                           <span id="lblMsn"></span>
                                            <input type="button" value="Confirmar" onclick="confirmar_pago_recarga('{{auth()->user()->id}}')" type="submit" class="btn btn-primary" />
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endif


              </div>
          </div>
        </div>
        <!--DIVISION ANUCIOS VISTOS POR MI-->  
        <div class="col-md-3">
          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Anuncios vistos</h3>
              </div>
              <div class="box-body"><h4 class="box-title"></h4>
                        <a class="btn btn-primary" href="{{config('app.url').'/anuncios_vistos'}}">VER</a>
              </div> 

          </div>
        </div>

        
        
        
        
</div>


@endsection
