@extends('layouts.app')
@section('head')

@endsection
@section('header')
    <h1>
        Mis compras
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('welcome')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Ingresos</li>
    </0l>

@endsection

@section('content')

  <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
    <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title">Listado de compras realizadas</h3>
      </div>
      <div class="box-body">
          <table id="compras-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Tipo</th>
                <th>Estado compra</th>
                <th>Vendedor</th>                
                <th>Cuenta bancaria</th>
                <th>Email</th>                
                <th>Teléfono</th>                
                <th>Cantidad vendido</th>
                <th>Criptomoneda</th>
                <th>Valor vendido</th>
                <th>Valor real pagado</th>
                <th>Moneda local</th>
                <th>Referecia de pago</th>
                <th>Fecha transacción</th>
                <th># transacción</th>
                <th>Código wallet</th>
                <th>Hash transacción</th>
                <th>% Metalbit</th>
                <th>Valor a transferir</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              {{--dd(ver_todas_las_transacciones)--}}
              @foreach ($pag as $transaccion)
                   
                  <tr id="row_{{$transaccion->id_pago}}">
                    <td>{{$transaccion->tipo_anuncio}}</td>
                     <td>
                      
                      @if($transaccion->transactionState=="Pendiente")
                        <span class="text-danger">Pendiente por pago</span>
                      @elseif($transaccion->transactionState == 'Pago confirmado por el anunciante')  
                        <span class="text-success">{{$transaccion->transactionState}}</span>
                      @elseif($transaccion->transactionState == 'Pago Aceptado' && $transaccion->estado_pago =='PENDIENTE')
                        <span class="text-danger">Pago aceptado, pendiente confirmacion entidad bancaria</span>
                      @else
                        <span class="text-success">{{$transaccion->transactionState}}</span>                      
                      @endif
                    </td>
                    <td>{{$transaccion->name}}</td>
                   <td><span class="text-primary">
                      @if($transaccion->cuenta_bancaria!="")
                        {{$transaccion->cuenta_bancaria }}
                      @else
                        Sin registrar
                      @endif
                    </br>
                      @if($transaccion->certificacion_bancaria!="")
                        <a target="_blank" href="{{config('app.url')}}/{{$transaccion->cuenta_bancaria}}">
                          Ver certificación bancaria
                        </a>
                      @endif


                   </span></td>
                   <td>{{$transaccion->email}}</td>
                   <td>{{$transaccion->phone}}</td>
                    <td>{{$transaccion->transactionQuantity}}</td>
                    <td><strong>{{$transaccion->nombre_cripto_moneda}}</strong></td>
                    <td >${{number_format($transaccion->transation_value,0,',','.')}}</td>
                    <td >${{number_format($transaccion->transaction_value_pagado,0,',','.')}}</td>
                    <td>{{$transaccion->moneda_pago}}</td>
                    <td><strong>{{$transaccion->transactionId}}</strong></td>
                    <td><strong>{{$transaccion->updated_at}}</strong></td>
                    @if($transaccion->metodo_pago=='Transferencia bancaria')
                      <td><strong class="text-success">{{$transaccion->numero_transaccion}}</strong></td>
                    @else
                      <td>{{$transaccion->metodo_pago}}</td>
                    @endif
                    
                    <td><span class="text-red">{{$transaccion->code_wallet}}</span></td>
                    <td><span class="text-success">{{$transaccion->hash_txid}}</span></td>
                    <td>
                      @foreach ($variables as $var)
                        {{$var->valor}} %

                    </td>
                      <td>$ {{number_format($transaccion->transation_value-($transaccion->transation_value*($var->valor/100)),0,',','.')}}</td>
                    <td>

                      @if($transaccion->metodo_pago=="Pago en efectivo")
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#confirmar_pago_cliente{{$transaccion->id_pago}}">
                            confirmar pago del comprador
                        </button>
                      @endif
                      @if($transaccion->transactionState=="Pago confirmado por el anunciante")
                        Pago confirmado por el anunciante
                      @endif
                      @if($transaccion->transactionState=="Transacción Finalizada")
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#code_wallet_{{$transaccion->id_pago}}">
                            confirmar pago al usuario
                        </button>
                     </td>    
                     <td>  <!--VENTANA MODAL-->
                          <div class="modal fade" id="code_wallet_{{$transaccion->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <form id="ad_form_{{$transaccion->id_pago}}" method="POST" action="{{route('confirmar_pago_vendedor',[$transaccion->id_pago])}}">
                              {{csrf_field()}}
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header bg-primary text-center">
                                      <h4 class="modal-title" id="exampleModalLabel">Confirmar Pago</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label for="">Correo comprador: </label>
                                        <input class="form-control" type="text" name="email" value="{{$transaccion->email}}" readonly>
                                        <input class="form-control" type="hidden" name="id_usuario" value="{{$transaccion->id}}" >
                                      </div>
                                        <div class="form-group">
                                          <label for="">Valor a Girar:</label>
                                          <input class="form-control" type="text" name="valor_a_pagar" value="${{number_format($transaccion->transation_value-($transaccion->transation_value*($var->valor/100)),0,',','.')}}" readonly>
                                          
                                        </div>
                                        <div class="form-group">
                                          <label for="">Mensaje:</label>
                                          <textarea class="form-control" name="mensaje" rows="8" cols="80"></textarea>
                                        </div>

                                        <div class="form-group">

                                        <button type="submit" class="btn btn-primary btn-block">Enviar Mensaje</button>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-danger btn-block" data-dismiss="modal">Salir</a>

                                    </div>
                                  </div>
                                </div>
                            </form>
                          </div>
                        <!--FIN VENTA MODAL-->

                      @endif
                      
                      @if($transaccion->transactionState == 'Pago Aceptado' && $transaccion->estado_pago =='PENDIENTE')
                       <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#confirmar_pago_entidad_bancaria_{{$transaccion->id_pago}}">
                            confirmar pago en la entidad bancaria
                        </button>

                      @endif  
                        
                    </td>
                  </tr>
                  @endforeach
              @endforeach
            </tbody>
          </table>
        @foreach ($pag as $transaccion) 
           <div class="modal fade" id="confirmar_pago_cliente{{$transaccion->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <form id="ad_form_{{$transaccion->id_pago}}" method="POST" action="{{route('confirmar_pago_comprador_pago_efectivo')}}">
                              {{csrf_field()}}
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header bg-primary text-center">
                                      <h4 class="modal-title" id="exampleModalLabel">Confirmar Pago del comprador</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                          <label for="">Valor a pagar:</label>
                                          <input class="form-control" type="text" name="valor_a_pagar" value="${{number_format($transaccion->transaction_value_pagado,2,',','.')}}" readonly>
                                          <input type="hidden"value="{{$transaccion->id_pago}}" name="id_pago">
                                        </div>
                                      
                                        <div class="form-group">

                                        <button type="submit" class="btn btn-primary ">Registrar pago</button>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-danger" data-dismiss="modal">Salir</a>

                                    </div>
                                  </div>
                                </div>
                            </form>
                        </div>
                        <!--VENTANA MODAL CONFIRMAR PAGO ENTIAD BANCARIA-->
                       <div class="modal fade" id="confirmar_pago_entidad_bancaria_{{$transaccion->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <form id="ad_form_{{$transaccion->id_pago}}" method="POST" action="{{route('confirmar_pago_comprador_entidad_bancaria')}}">
                                          {{csrf_field()}}
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header bg-primary text-center">
                                                  <h4 class="modal-title" id="exampleModalLabel">Confirmar Pago del comprador en entidad bancaria</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                      <label for="">el valor pagado debe ser de:</label>
                                                      <input class="form-control" type="text" name="valor_a_pagar" value="${{number_format($transaccion->transation_value,2,',','.')}}" readonly>
                                                      <input type="hidden"value="{{$transaccion->id_pago}}" name="id_pago">
                                                    </div>
                                                  
                                                    <div class="form-group">

                                                    <button type="submit" class="btn btn-primary ">Registrar pago</button>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <a class="btn btn-danger" data-dismiss="modal">Salir</a>

                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                    </div>             

        @endforeach

      </div>



    </div>
  </div>



@endsection

@section('scripts')

          <script>
            $(document).ready(function() {
                console.log("5");
                $('#compras-table').DataTable( {
                    responsive: true,
                    stateSave: true,
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    language:
                      {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                } );
                filtro_url('#compras-table');


            });
          </script>


@endsection
