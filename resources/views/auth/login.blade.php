@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingresar</div>
                {{--dd($_GET)--}}    
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                @if(isset($_GET['id']))
                                    <input id="email_u" type="email" class="form-control" name="email" value="{{ $_GET['id'] }}" onchange="agregar_correo(this)" required autofocus>
                                @else
                                    <input id="email_u" type="email" class="form-control" name="email" value="{{ old('email') }}" onchange="agregar_correo(this)" required autofocus>
                                @endif

                                

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Clave</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>

                                
                                <a id="anOlvide" class="btn btn-link" href="{{ route('password.request').'/?'}}e={{old('email')}}">
                                  Olvide mi clave
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    window.onload=function(){
        if(sessionStorage.correo_usuario!=undefined){
            console.log(document.getElementById('email_u'));
            document.getElementById('email_u').value=sessionStorage.correo_usuario;
            console.log(document.getElementById('email_u').value);
        }    
    }
    function agregar_correo(e){
        document.getElementById('anOlvide').href="{{route('password.request')}}?e="+document.getElementById(e.id).value;        
        
    }  
</script>
