 <div class="modal fade" id="{{'ventana_login'.$ad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


    <div class="modal-dialog" role="document">

      <div class="modal-content ">

        <div class="modal-header bg-primary text-center">
          <h4 class="modal-title" id="exampleModalLabel">Debes registrarte o inicar sesión para conocer mas información de este anuncio</h4>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="salir_modal('{{'ventana_login'.$ad->id}}')">
            <span aria-hidden="true" >&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail </label>

                    <div class="col-md-6">
                        <input id="email{{$ad->id}}" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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
                        <input id="password{{$ad->id}}" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Ingresar
                        </button>

                         <a class="btn btn-primary" href="{{ route('register') }}">
                            Registrarse
                        </a>
                      

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                            </label>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Olvide mi clave
                            </a>
                        </div>
                    </div>
                </div>

                
        </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="salir_modal('{{'ventana_login'.$ad->id}}')">SALIR</button>
        </div>
      </div>
    </div>
</div>