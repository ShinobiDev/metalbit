@extends('layouts.app_landing')

@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i> Crear Usuario</h3>
          </div>

              <div class="box-body">

                  <form method="POST" action="{{route('users.store')}}">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label for="name">Nombre completo:</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            <input type="hidden" name="costo_clic" value="0" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control">
                        </div>

                        <div class="form-group col-md-6" >
                          <label for=""><h4><i class="fa fa-lock"> Roles</i></h4></label>
                           
                        </div>

                        

                          <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Crear Usuario</button>

                   </form>

              </div>
              <br>
              <span class="text-muted text-red">La contraseña será generada y enviada al nuevo usuario vía Emial</span>
          </div>
        </div>
     </div>

@endsection
