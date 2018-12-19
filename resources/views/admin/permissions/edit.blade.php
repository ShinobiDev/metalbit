@extends('layouts.app')

@section('content')


    <div class="row">

          <div class="col-md-6">


              <div class="box box-primary">

                  <div class="box-header with-border">
                      <h3><i class="fa fa-edit"></i>  Editar Permisos</h3>
                  </div>

                  <div class="box-body">

                      <form method="POST" action="{{route('permissions.update', $permissions)}}">

                            {{csrf_field()}} {{method_field('PUT')}}

                            <div class="form-group">
                                <label for="name">Identificador:</label>
                                <input  disabled value="{{$permissions->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="display_name">Nombre:</label>
                                <input type="text" name="display_name" value="{{old('display_name', $permissions->display_name)}}" class="form-control">
                            </div>

                            <button class="btn btn-primary btn-block"><i class="fa fa-refresh"></i> Actulizar Permisos</button>
                    </form>

                 </div>

              </div>

          </div>

     </div>

@endsection
