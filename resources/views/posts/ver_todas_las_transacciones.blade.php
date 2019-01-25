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

  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title">Listado de compras realizadas</h3>
      </div>
      <div class="box-body">
          <table id="compras-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Tipo</th>
                <th>Vendedor</th>
                <th>Estado compra</th>
                <th>Cantidad comprada</th>
                <th>Criptomoneda</th>
                <th>Valor comprado</th>
                <th>Referecia de pago</th>
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
                  <tr>
                    <td>{{$transaccion->tipo_anuncio}}</td>
                    <td>{{$transaccion->name}}</td>
                    <td>
                      @if($transaccion->transactionState=="Pendiente")
                        Pendiente por pago
                      @else
                        {{$transaccion->transactionState}}
                      @endif
                    </td>
                    <td>{{number_format($transaccion->transactionQuantity,0,',','.')}}</td>
                    <td>{{$transaccion->nombre_cripto_moneda}}</td>
                    <td>$ {{number_format($transaccion->transation_value,0,',','.')}}</td>
                    <td>{{$transaccion->transactionId}}</td>
                    <td>{{$transaccion->code_wallet}}</td>
                    <td>{{$transaccion->hash_txid}}</td>
                    <td>
                      @foreach ($variables as $var)
                        {{$var->valor}} %

                    </td>
                      <td>${{number_format($transaccion->transation_value-($transaccion->transation_value*($var->valor/100)),0,',','.')}}</td>
                    <td>
                      @if($transaccion->code_wallet=="")
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#code_wallet_{{$transaccion->id_pago}}">
                            confirmar pago al usario
                        </button>
                    </td>      <!--VENTANA MODAL-->
                          <div class="modal fade" id="code_wallet_{{$transaccion->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form id="ad_form_{{$transaccion->id_anuncio}}" method="POST" action="{{route('registrar_wallet_transaccion_realizada',[$transaccion->id_pago])}}">
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
                                        <input class="form-control" type="text" name="valor" value="{{$transaccion->email}}" disabled>
                                      </div>
                                        <div class="form-group">
                                          <label for="">Valor a Girar:</label>
                                          <input class="form-control" type="text" name="valor" value="${{number_format($transaccion->transation_value-($transaccion->transation_value*($var->valor/100)),0,',','.')}}" disabled>
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

                      @else

                        @if($transaccion->transactionState=="Moneda Envíada")
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#code_wallet_{{$transaccion->id_pago}}">
                              Confirmar transacción
                            </button>
                            <div class="modal fade" id="code_wallet_{{$transaccion->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Información del anunciante</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <i class="fa fa-info-circle"></i>
                                            <h5>¿Estás seguro de que quieres confirmar esta transacción?</h5>
                                    </div>
                                    <div class="modal-footer">


                                      <form method="POST" action="{{route('confirmar_transaccion',[$transaccion->id_pago])}}">
                                        {{csrf_field()}}
                                        <a class="btn btn-secondary" data-dismiss="modal">Salir</a>
                                        <button type="submit" class="btn btn-success" data-toggle="modal" >
                                          Confirmar transacción
                                        </button>
                                      </form>
                                    </div>
                                  </div>
                                </div>

                          </div>
                        @endif


                        {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#code_wallet_{{$transaccion->id_pago}}">
                            Ver info
                        </button>
                          <!--VENTANA MODAL-->
                          <div class="modal fade" id="code_wallet_{{$compra->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Información del anunciante</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <i class="fa fa-info-circle"></i>
                                            <h5>{{$compra->name}}</h5>
                                            <h5>{{$compra->email}}</h5>
                                            <h5>{{$compra->phone}}</h5>
                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-secondary" data-dismiss="modal">Salir</a>
                                    </div>
                                  </div>
                                </div>

                          </div>--}}
                      @endif
                    </td>
                  </tr>
                  @endforeach
              @endforeach
            </tbody>
          </table>

      </div>



    </div>
  </div>



@endsection

@section('scripts')

          <script>
            $(document).ready(function() {
                console.log("5");
                $('#compras-table').DataTable( {
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
