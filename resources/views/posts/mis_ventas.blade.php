@extends('layouts.app')
@section('head')
@endsection
@section('header')
    <h1>
        Mis ventas
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('welcome')}}"><i class="fa fa-dashboard">Inicio</i></a></li>
      <li class="active">Ingresos</li>
    </ol>
@endsection

@section('content')

  <div class="container">
    <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title">Listado de ventas realizadas</h3>
      </div>
      <div class="box-body">
          <table id="ventas-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Tipo</th>      
                <th>Comprador</th>
                <th>Estado venta</th>
                <th>Cantidad vendida</th>
                <th>Criptomoneda</th>
                <th>Valor vendido</th>
                <th>Referecia de pago</th>
                <th>Código wallet</th>
                <th>Hash transacción</th>          
                <td>Acción</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($mis_ventas as $venta)
                  <tr>                   
                    <td>venta</td>   
                    <td>{{$venta->name}}</td>
                    <td>
                      @if($venta->transactionState=="Pendiente")
                        Pendiente por pago
                      @else
                        {{$venta->transactionState}}
                      @endif
                    </td>
                    <td>{{number_format($venta->transactionQuantity,2,',','.')}}</td>                                   
                    <td>{{$venta->nombre_cripto_moneda}}</td>                                  
                    <td>{{number_format($venta->transation_value,2,',','.')}}</td>                                    
                    <td>{{$venta->transactionId}}</td>                                   
                    <td>{{$venta->code_wallet}}</td>                                   
                    <td>{{$venta->hash_txid}}</td>   
                    <td>
                      @if($venta->hash_txid=="" && $venta->transactionState != "Pendiente")
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#code_wallet_{{$venta->id_pago}}">
                            Registrar Hash/txid 
                         </button>
                          <!--VENTANA MODAL-->
                          <div class="modal fade" id="code_wallet_{{$venta->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form id="ad_form_{{$venta->id_anuncio}}" method="POST" action="{{route('registrar_hash_transaccion_realizada',$venta->id_pago)}}">
                              {{csrf_field()}}
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Registra el Hash/txid</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <i class="fa fa-info-circle"></i>
                                             <h5>Ingresa el código HASH TXID de tu transacción </h5>
                                            <input type="text" name="hash_txid" class="textinput textInput form-control"+ required>
                                            
                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-secondary" data-dismiss="modal">Salir</a>
                                      <button type="submit" class="btn btn-primary">Registrar Hash/txid</button>
                                    </div>
                                  </div>
                                </div>
                            </form>    
                          </div>
                        <!--FIN VENTA MODAL-->
                      @else

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
              $('#ventas-table').DataTable( {
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

            });
          </script>
           
@endsection
@include('partials.scripts')
<script type="text/javascript">
  function cambiar_valor_clic(id){
     peticion_ajax("get","cambiar_valor_clic/"+id+"/"+document.getElementById("rec_"+id).value,function(rs){
        console.log(rs);
     });
  }
</script>

<script type="text/javascript">
  function ver_bonificaciones(id){
     peticion_ajax("get","ver_bonificaciones_mis_bonificaciones/"+id,function(rs){
        console.log(rs);
        var ls=document.getElementById("tbl_mis_lista");
        ls.innerHTML="";
        for(var f in rs.datos){
          var tr=document.createElement("tr");
          var td=document.createElement("td");
          td.innerHTML=rs.datos[f].id;
          tr.appendChild(td);

          
          var td=document.createElement("td");
          td.innerHTML=rs.datos[f].name;
          tr.appendChild(td);

          
          var td=document.createElement("td");
          td.innerHTML=rs.datos[f].valor_bonificacion;
          tr.appendChild(td);

          
          var td=document.createElement("td");
          td.innerHTML=rs.datos[f].estado_detalle_bonificacion;
          tr.appendChild(td);

          
          var td=document.createElement("td");
          td.innerHTML=rs.datos[f].referencia_pago;
          tr.appendChild(td);

          
          var td=document.createElement("td");
          td.innerHTML=rs.datos[f].created_at;
          tr.appendChild(td);
          ls.appendChild(tr);  
        }

     });
  }

</script>
