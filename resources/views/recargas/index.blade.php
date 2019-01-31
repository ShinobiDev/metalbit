@extends('layouts.app')
@section('head')

@endsection
@section('header')
    <h1>
        Vehiculos Recargas
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
          <h3 class="box-title">Listado de usuarios</h3>
            
              <a href="{{route('recargas.create')}}" class="btn btn-primary pull-right" >
                  <i class="fa fa-car"> Cambiar costo del clic</i>
              </a>

      </div>
      <div class="box-body">
          <table id="recargas-table"class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Saldo recarga</th>
                <th>Fecha última recarga</th>
                <th>Costo del cllc</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
                    

              @foreach ($recargas as $recarga)
                  <tr>
                    <td>{{ $recarga->id }}</td>
                    <td>{{ $recarga->name }}</td>
                    <td>{{ $recarga->status }}</td>
                    <td>$ {{ number_format($recarga->valor,0,',','.')}}</td>
                    <td>{{ $recarga->updated_at }}</td>
                    <td><input id="rec_{{$recarga->id}}" type="number" value="{{ $recarga->costo_clic }}" onchange='cambiar_valor_clic({{$recarga->id}})  ' /></td>
                    <td><input id="ver_{{$recarga->id}}" type="button" value="Ver recargas" onclick='ver_recargas({{$recarga->id}})' class="btn btn-primary pull-right" /></td>


                    
                  </tr>
              @endforeach
            </tbody>
          </table>
 
      </div>
      
        <div class="box-body">
          <h3 class="box-title">Recargas</h3>
          <table id="mis_recargas-table" class="table table-bordered table-striped">
               <thead>
                <tr>
                  <th>Items</th>
                  <th>Usuario</th>
                  <th>Tipo recarga</th>
                  <th>Valor recarga</th>
                  <th>Estado</th>
                  <th>Referecia recarga</th>                 
                  <th>Fecha recarga</th>                 
                </tr>
              </thead>
              <tbody id="tbl_mis_lista">
                 @foreach ($mi_lista_recarga as $mi_recarga)
                  
                   <tr>
                    <td>{{ $mi_recarga->id }}</td>
                    <td>{{ $mi_recarga->name }}</td>
                    <td>{{ $mi_recarga->tipo_recarga }}</td>
                    <td>$ {{ number_format($mi_recarga->valor_recarga,0,',','.') }}</td>
                    <td>{{ $mi_recarga->estado_detalle_recarga }}</td>
                    <td>{{ $mi_recarga->referencia_pago_pay_u }}</td>
                    <td>{{ $mi_recarga->created_at }}</td>
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
              $('#recargas-table').DataTable( {
                  dom: 'Bfrtip',
                  responsive:true,
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
            <script>
              $(document).ready(function() {
              $('#mis_recargas-table').DataTable( {
                  dom: 'Bfrtip',
                  responsive:true,  
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
  function ver_recargas(id){
     peticion_ajax("get","ver_recargas_mis_recargas/"+id,function(rs){
      location.href="#mis_recargas-table";
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
          td.innerHTML=rs.datos[f].tipo_recarga;
          tr.appendChild(td);

          
          var td=document.createElement("td");
          td.innerHTML="$ "+ number_format(rs.datos[f].valor_recarga,'0',',','.');
          tr.appendChild(td);

          
          var td=document.createElement("td");
          td.innerHTML=rs.datos[f].estado_detalle_recarga;
          tr.appendChild(td);

          
          var td=document.createElement("td");
          td.innerHTML=rs.datos[f].referencia_pago_pay_u;
          tr.appendChild(td);

          
          var td=document.createElement("td");
          td.innerHTML=rs.datos[f].created_at;
          tr.appendChild(td);
          ls.appendChild(tr);  
        }

     });
  }

</script>
