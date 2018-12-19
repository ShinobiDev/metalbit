@extends('layouts.app')
@section('head')
  <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection
@section('header')
    <h1>Permisos</h1>

    <ol class="breadcrumb">
      <li><a href="{{route('welcome')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Permisos</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados De Permisos</h3>
    </div>
    <div class="box-body">
        <table id="permission-table"class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Identificador</th>
              <th>Nombre</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($permissions as $permission)
                <tr>
                  <td>{{ $permission->id }}</td>
                  <td>{{ $permission->name }}</td>
                  <td>{{ $permission->display_name }}</td>
                  <td>
                    @can('update',$permission)
                        <a href="{{route('permissions.edit', $permission)}}" class="btn btn btn-primary"><i class="fa fa-edit"></i></a>
                    @endcan
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
              $('#permission-table').DataTable();
          });
     </script>
@endsection
