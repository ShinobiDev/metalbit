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
          <h3 class="box-title text-info">Listado de compras realizadas</h3>
      </div>
      <div class="box-body">
          <table id="compras-table" class="table table-bordered table-striped">
            <thead>
              <tr class="bg-primary">
                <th>Tipo</th>
                <th>Estado compra</th>
                <th>Vendedor</th>                
                <th>Cuenta bancaria</th>
                <th>Email</th>                
                <th>Teléfono</th>                
                <th>Cantidad vendido</th>
                <th>Criptomoneda</th>
                <th>Valor vendido</th>
                <th>Metodo de pago</th>
                <th>Valor sobre costo</th>
                <th>Valor real pagado</th>
                <th>Moneda local</th>
                <th>Referecia de pago</th>
                <th>Fecha transacción</th>
                <th># transacción</th>
                <th>Código wallet</th>
                <th>Hash transacción</th>
                <th>% Metalbit</th>
                <th>Valor a transferir al anunciante</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              {{--dd(ver_todas_las_transacciones)--}}
              @foreach ($pag as $transaccion)
                   
                  <tr id="row_{{$transaccion->id_pago}}">
                    <td class="bg-danger" ><h4><strong class="text-success">{{$transaccion->tipo_anuncio}}</strong></h4></td>
                     <td>
                      
                      @if($transaccion->transactionState=="Pendiente")
                        <span class="text-danger">Pendiente por pago</span>
                      @elseif($transaccion->transactionState == 'Pago confirmado por el anunciante')  
                        <span class="text-success">{{$transaccion->transactionState}}</span>
                      @elseif($transaccion->transactionState == 'Pago Aceptado' && $transaccion->estado_pago =='PENDIENTE')
                        <span class="text-danger">Pago aceptado, pendiente confirmación entidad bancaria</span>
                      @else
                        <span class="text-success">{{$transaccion->transactionState}}</span>                      
                      @endif
                    </td>
                    <td class="bg-success text-primary"><strong>{{$transaccion->name}}</strong></td>
                   <td>
                      @if($transaccion->cuenta_bancaria!="")
                       <span class="text-red"> {{$transaccion->cuenta_bancaria }}</span>
                      @else
                        Sin registrar
                      @endif
                    </br>
                      @if($transaccion->certificacion_bancaria!="")
                       <span class="text-red"> <a target="_blank" href="{{config('app.url')}}{{$transaccion->certificacion_bancaria}}">
                          Ver certificación bancaria
                        </a> </span>
                      @endif


                  </td>
                   <td class="bg-warning"><strong class="text-info">{{$transaccion->email}}</strong></td>
                   <td><strong>{{$transaccion->phone}}</strong></td>
                    <td class="bg-danger text-center text-primary"><strong>{{$transaccion->transactionQuantity}}</strong></td>
                    <td class="text-center"><strong class="text-red">{{$transaccion->nombre_cripto_moneda}}</strong></td>
                    <td class="bg-success"><span class="text-red">$</span><strong class="text-primary">{{number_format($transaccion->transation_value,0,',','.')}}</strong></td>
                    <td ><strong class="text-success">{{$transaccion->metodo_pago}}</strong></td>
                    <td class="bg-info" ><span class="text-red">$</span><strong class="text-primary">{{number_format($transaccion->valor_sobre_costo,0,',','.')}}</strong></td>
                    <td ><span class="text-red">$</span><strong class="text-primary">{{number_format($transaccion->transaction_value_pagado+$transaccion->valor_sobre_costo,0,',','.')}}</strong></td>
                    <td class="bg-warning">{{$transaccion->moneda_pago}}</td>
                    <td><strong class="text-red">{{$transaccion->transactionId}}</strong></td>
                    <td class="bg-danger"><strong>{{$transaccion->updated_at}}</strong></td>
                    
                    @if($transaccion->metodo_pago=='Transferencia bancaria' || $transaccion->metodo_pago=='Consignacion bancaria')
                      <td>
                        <strong class="text-success">{{$transaccion->numero_transaccion or 'Pendiente'}}</strong>
                        @if($transaccion->certificado_pago != null)
                          @php
                            $url= config('app.url').'/archivos/'.$transaccion->certificado_pago
                          @endphp
                          <a target="_blank" href="{{$url}}">Ver certificado</a>
                        @endif
                        
                      </td>
                    @else
                      <td >{{$transaccion->metodo_pago}}</td>
                    @endif


                    
                    <td class="bg-info"><span class="text-red">{{$transaccion->code_wallet}}</span></td>
                    <td ><span class="text-success">{{$transaccion->hash_txid}}</span></td>


                    <td class="bg-danger">

                      @foreach ($variables as $var)

                      @if($transaccion->transactionState=="Pago confirmado por el anunciante")
                          <strong class="text-primary">{{$transaccion->porcentaje_pago}}</strong> <b class="text-red">%</b>
                      @else
                          <strong class="text-primary">{{$var->valor}}</strong> <b class="text-red">%</b>
                      @endif
                      

                    </td>
                        @if($transaccion->transactionState=="Pago hecho al anunciante" || $transaccion->transactionState=="Pago confirmado por el anunciante")

                          <td ><strong class="text-success"><span class="text-red">$</span>{{number_format($transaccion->transation_value-($transaccion->transation_value*($transaccion->porcentaje_pago/100)),0,',','.')}}</strong></td>
                        @else
                          <td ><strong class="text-success"><span class="text-red">$</span>{{number_format($transaccion->transation_value-($transaccion->transation_value*($var->valor/100)),0,',','.')}}</strong></td>
                        @endif  
                    <td >

                      @if($transaccion->metodo_pago=="Pago en efectivo" && $transaccion->transactionState=="Pendiente")

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
                     <td >  <!--VENTANA MODAL-->
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
                                                      <input class="form-control" type="text" name="valor_a_pagar" value="${{number_format($transaccion->transaction_value_pagado+$transaccion->valor_sobre_costo,2,',','.')}}" readonly>
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
                        "sLengthMenu":     "Mostrar _MENU_ anuncios",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando anuncios del _START_ al _END_ de un total de _TOTAL_ anuncios",
                        "sInfoEmpty":      "Mostrando anuncios del 0 al 0 de un total de 0 anuncios",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ anuncios)",
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
