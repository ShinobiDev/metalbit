@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><strong><h1>SOLO FALTA UN PASO</h1></strong></div>


                <div class="panel-body">
                  <h4 class="text-center text-red"><strong>Hemos Enviado una Contraseña a tu correo  la cual debes ingresar para cambiarla <strong></h4><hr>

                    <form class="form-horizontal" method="POST" action="{{route('users.confirma', $user) }}">
                        {{csrf_field()}} {{method_field('PUT')}}

                        <div class="form-group">
                            <label for="confirma" class="col-md-4 control-label">Contraseña Actual</label>

                            <div class="col-md-6">
                                <input id='confirma' type="password" class="form-control" placeholder="Contraña Actual" name="confirma" value="{{ old('confirma') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-md-4 control-label" for="password">Contraseña</label>
                            <div class="col-md-6">
                              <input type="password" name="password"  class="form-control" placeholder="Contraseña Nueva">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password_confirmation">Confirmar la Contraseña</label>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation"  class="form-control" placeholder="Confirmar contraña">
                            </div>
                        </div>



                        <input type="hidden" name="name" value="{{$user->name }}">
                        <input type="hidden" name="email" value="{{ $user->email }}">


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Cambiar
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
