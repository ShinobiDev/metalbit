@extends('layouts.app')
@section('head')

@endsection


@section('content')

  <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
    <div class="box box-success">
      <div class="box-header">
          <h3 class="box-title text-red">Anunciantes registrados en {{config('app.name')}}</h3>
      </div>
      <div class="box-body">
          <table id="usuarios-table" class="table table-bordered table-striped">
            <thead>
              <tr class="bg-primary">
                <th>Calificación</th>
                <th>Nombres</th>
                <th>Teléfono</th>
                <th>Email</th>                
              </tr>
            </thead>
            <tbody>
              @foreach($usuarios as $u)
                <td>
                    <div >
                        @for($i=1;$i<=$u->calificacion;$i++)
                          @if($i<=3)
                            <img  class="star" src="{{asset('img/star.png')}}">
                          @endif
                        @endfor  
                    </div>
                </td>

                <td><b class="text-info">{{$u->name}}</b></td>
                <td><b class="text-red">{{$u->phone}}</b></td>
                <td><b class="text-success">{{$u->email}}</b></td>
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
                $('#usuarios-table').DataTable( {
                    responsive: true,
                    stateSave: true,
                    
                   
                    language:
                      {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ usuarios",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando usuarios del _START_ al _END_ de un total de _TOTAL_ usuarios",
                        "sInfoEmpty":      "Mostrando usuarios del 0 al 0 de un total de 0 usuarios",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ usuarios)",
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
                filtro_url('#usuarios-table');


            });
          </script>


@endsection
