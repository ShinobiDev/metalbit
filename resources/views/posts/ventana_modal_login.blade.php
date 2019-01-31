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
          <form class="form-horizontal" id="formLogin_{{$ad->id}}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail </label>

                    <div class="col-md-6">
                        <input id="email{{$ad->id}}" type="email" class="form-control" name="email" value="{{ old('email') }}" onchange="agregar_correo(this,'{{$ad->id}}')" required autofocus>

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
                        <input id="password{{$ad->id}}" type="password" onkeypress="login('{{$ad->id}}',event)" class="form-control" name="password" required>

                       <span class="help-block">
                                <strong id="error_login_{{$ad->id}}" class="text-red"></strong>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                         <button type="button" onclick="login('{{$ad->id}}',false)"  class="btn btn-primary">
                                Ingresar
                        </button>
                        
                        <a id="an_email_enviar_{{$ad->id}}" href="{{ route('register').'/?'}}e={{old('email')}}" class="btn btn-primary">Registrarse</a>
                      

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                            </label>
                            <a id="anOlvide{{$ad->id}}" class="btn btn-link" href="{{ route('password.request').'/?'}}e={{old('email')}}">
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
<script type="text/javascript">
    function agregar_correo(e,id){
        document.getElementById('anOlvide'+id).href="{{route('password.request')}}?e="+document.getElementById(e.id).value;        
        document.getElementById('an_email_enviar_'+id).href="{{route('register')}}?e="+document.getElementById(e.id).value;
    }  
</script>