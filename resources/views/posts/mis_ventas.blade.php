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

  <div class=" container-fluid ">

    <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title">Listado de ventas realizadas</h3>
      </div>
      <div class="box-body">
          <table id="ventas-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="col-lg-1 col-1 col-md-1 col-sm-1">Tipo</th>
                <th class="col-lg-1 col-1 col-md-1 col-sm-1">Estado venta</th>
                <th class="col-lg-1 col-1 col-md-1 col-sm-1">Comprador</th>                
                <th class="col-lg-1 col-1 col-md-1 col-sm-1">Cantidad vendida</th>
                <th class="col-lg-1 col-1 col-md-1 col-sm-1">Criptomoneda</th>
                <th class="col-lg-1 col-1 col-md-1 col-sm-1">Valor vendido</th>
                <th class="col-lg-1 col-1 col-md-1 col-sm-1">Moneda local</th>
                <th class="col-lg-1 col-1 col-md-1 col-sm-1">Referecia de pago</th>
                <th class="col-lg-1 col-1 col-md-1 col-sm-1">Wallet</th>
                <th class="col-lg-2 col-2 col-md-2 col-sm-2">Hash/id</th>
                <td class="col-lg-1 col-1 col-md-1 col-sm-1">Acción</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($mis_ventas as $venta)
                  <tr id="row_{{$venta->id_pago}}">
                    <td>venta</td>
                    <td>
                      @if($venta->transactionState=="Pendiente")
                        <span class="text-danger">Pendiente por pago</span>
                      @else
                        <span class="text-success">{{$venta->transactionState}}</span>
                      @endif
                    </td>
                    <td>{{$venta->name}}</td>
                    <td>{{number_format($venta->transactionQuantity,2,',','.')}}</td>
                    <td><strong>{{$venta->nombre_cripto_moneda}}</strong></td>
                    <td style="width: 200px">$ {{number_format($venta->transation_value,2,',','.')}}</td>
                    <td>{{$venta->moneda_pago}}</td>                                    
                    <td><strong>{{$venta->transactionId}}</strong></td>
                    <td>{{$venta->code_wallet}}</td>
                    <td>{{$venta->hash_txid}}</td>
                    <td>
                      @if($venta->hash_txid=="" && $venta->transactionState != "Pendiente")
                         <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#code_wallet_{{$venta->id_pago}}">
                            Registrar Hash/txid
                         </button>
                      @endif



                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
          {{--ventanas--}}
          @foreach ($mis_ventas as $venta)
                 
                      @if($venta->hash_txid=="" && $venta->transactionState != "Pendiente")
                         
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
                      @endif

              @endforeach
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
                  'responsive': true,
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
              filtro_url('#mis-ventas-table');

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
          td.innerHTML="$"+ number_format(rs.datos[f].valor_bonificacion,0,',','.');
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
