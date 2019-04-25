@extends('layouts.app')
@section('head')
  {{-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}"> --}}
@endsection
@section('header')
    <h1>
        Usuarios
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('welcome')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Usuarios</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados De Usuarios</h3>
        @can ('create', $users->first())
            <a href="{{route('users.create')}}" class="btn btn-primary pull-right" >
                <i class="fa fa-user-plus"> Crear Usuario</i>
            </a>
        @endcan

    </div>
    <div class="box-body">
        <table id="users-table" class="table table-bordered table-striped">
          <thead>
            <tr class="btn-danger">
              <th>ID</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>Rol</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
                <tr>
                  <td class="btn-info">{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td >{{ $user->email }}</td>
                  <td>{{ $user->getRoleNames()->implode(', ')}}</td>
                  <td class="text-red">{{ $user->estado == '1' ? 'Activo' : 'Deshabilitado'}}</td>
                  <td class="btn-info">
                    @can ('view', $user)
                        <a href="{{route('users.show', $user)}}" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i></a>
                    @endcan
                    @if($user->estado=='1')
                      @can ('update', $user)
                          <a href="{{route('users.edit', $user)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                      @endcan
                    
                      @can ('delete', $user)
                        <form method="POST" action="{{route('users.destroy', $user)}}" style="display: inline">
                          {{csrf_field()}} {{method_field('DELETE')}}
                          <button class="btn btn-xs btn-danger" name="button" onclick="return confirm('¿Está seguro de querer deshabilitar este usuario?')">
                              <i class="fa fa-times"></i>
                          </button>
                        </form>
                      @endcan
                    @else
                      <form method="POST" action="{{route('users.habilitar', $user->id)}}" style="display: inline">
                          {{csrf_field()}} 
                          <button class="btn btn-xs btn-success" name="button" onclick="return confirm('¿Está seguro de querer habilitar este usuario de nuevo recuerda que una vez habilitado este usuario podrá ingresar nuevamente al sistema?')">
                              
                              <i class="fas fa-check"></i>
                          </button>
                        </form>
                    @endif
                    
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        
    </div>
  </div>

@endsection

@section('scripts')
  {{-- <script src="{{asset('admin-lte/plugins/datatables/jquery.dataTables.min.js')}}">  </script>
  <script src="{{asset('admin-lte/plugins/datatables/datatables.bootstrap4.js')}}">  </script> --}}

     <script>
          $(function (){
              $('#users-table').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf','print'],
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
              });
          });
     </script>
@endsection
