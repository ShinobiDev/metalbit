@extends('layouts.app')
@section('head')
  <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection
@section('header')
    <h1>Roles</h1>

    <ol class="breadcrumb">
      <li><a href="{{route('welcome')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Usuaios</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados De Roles</h3>
        @can ('create', $roles)
          <a href="{{route('roles.create')}}" class="btn btn-primary pull-right" >
              <i class="fa fa-plus"> Crear Roles</i>
          </a>
        @endcan

    </div>
    <div class="box-body">
        <table id="roles-table"class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Identificador</th>
              <th>Nombre</th>
              <th>Permisos</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roles as $role)
                <tr>
                  <td>{{ $role->id }}</td>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->display_name}}</td>
                  <td>{{ $role->permissions->pluck('name')->implode(', ')}}</td>
                  <td>
                  @can ('update', $role)
                      <a href="{{route('roles.edit', $role)}}" class="btn btn btn-primary"><i class="fa fa-edit"></i></a>
                  @endcan

                   @if ($role->id !==1)
                     @can ('delete', $role)
                       <form method="POST" action="{{route('roles.destroy', $role)}}" style="display: inline">
                         {{csrf_field()}} {{method_field('DELETE')}}
                         <button class="btn btn-danger" name="button" onclick="return confirm('¿Esta seguro de querer Eliminar  este usuraio?')">
                             <i class="fa fa-trash"></i>
                         </button>
                       </form>
                     @endcan

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
  <script src="{{asset('admin-lte/plugins/datatables/jquery.dataTables.min.js')}}">  </script>
  <script src="{{asset('admin-lte/plugins/datatables/datatables.bootstrap4.js')}}">  </script>

     <script>
          $(function (){
              $('#roles-table').DataTable();
          });
     </script>
@endsection
