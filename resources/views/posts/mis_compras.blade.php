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

  <div class="container">
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
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              {{--dd($mis_compras)--}}            
              @foreach ($mis_compras as $compra)
                  <tr>      
                    <td>compra</td>          
                    <td>{{$compra->name}}</td>          
                    <td>
                      @if($compra->transactionState=="Pendiente")
                        Pendiente por pago
                      @else
                        {{$compra->transactionState}}
                      @endif
                    </td>                                   
                    <td>{{number_format($compra->transactionQuantity,2,',','.')}}</td>                                   
                    <td>{{$compra->nombre_cripto_moneda}}</td>                                  
                    <td>$ {{number_format($compra->transation_value,2,',','.')}}</td>                                    
                    <td>{{$compra->transactionId}}</td>                                   
                    <td>{{$compra->code_wallet}}</td>                                   
                    <td>{{$compra->hash_txid}}</td>
                    <td>
                      @if($compra->code_wallet=="")
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#code_wallet_{{$compra->id_pago}}">
                            Registrar código wallet
                        </button>
                          <!--VENTANA MODAL-->
                          <div class="modal fade" id="code_wallet_{{$compra->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form id="ad_form_{{$compra->id_anuncio}}" method="POST" action="{{route('registrar_wallet_transaccion_realizada',[$compra->id_pago])}}">
                              {{csrf_field()}}
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Registra el código wallet</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <i class="fa fa-info-circle"></i>
                                            <h5>Ingresa o sube el código QR de tu wallet dónde deseas recibir las monedas compradas</h5>
                                            <input type="text" name="codigo_wallet" placeholder="Ingresa aquí tu código wallet" class="textinput textInput form-control" onchange="registrar_wallet_transaccion_realizada(this,'{{$compra->id_anuncio}}')" required >
                                            <div class="dropzone"></div>            
                                            <label id="msnEspera_{{$compra->id_pago}}"></label>
                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-secondary" data-dismiss="modal">Salir</a>
                                      <button type="submit" class="btn btn-primary">Registrar código</button>
                                    </div>
                                  </div>
                                </div>
                            </form>    
                          </div>
                        <!--FIN VENTA MODAL-->
                      
                      @else

                        @if($compra->transactionState=="Moneda Envíada")
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#code_wallet_{{$compra->id_pago}}">
                              Confirmar transacción
                            </button>
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
                                            <h5>¿Estás seguro de que quieres confirmar esta transacción?</h5>
                                    </div>
                                    <div class="modal-footer">
                                      

                                      <form method="POST" action="{{route('confirmar_transaccion',[$compra->id_pago])}}">
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
                            
                        
                        {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#code_wallet_{{$compra->id_pago}}">
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




