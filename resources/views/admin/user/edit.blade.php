@extends('layouts.app')
@section('content')

    <div class="row">

      <div class="col-md-6">

          <div class="box box-primary">

              <div class="box-header with-border">
                    <h3><i class="fa fa-users"></i>  Datos Personales</h3>
              </div>

              <div class="box-body">

                  <form method="POST" action="{{route('users.update', $user)}}">

                    {{csrf_field()}} {{method_field('PUT')}}

                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" value="{{old('name',$user->name)}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" value="{{old('email', $user->email)}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="phone">Teléfono:</label>
                                <input type="text" name="phone" value="{{old('phone', $user->phone)}}" class="form-control" minlength=6 maxlength=13>
                            </div>
                            <div class="form-group">
                                <label for="phone">Cuenta bancaria:</label>
                                <input type="text" name="cuenta_bancaria" value="{{old('cuenta_bancaria', $user->cuenta_bancaria)}}" class="form-control" minlength=6 maxlength=13>
                            </div>
                            <div class="form-group">
                                <label for="phone">Certificación bancaria:</label>
                                
                                {{--dd($user->certificacion_bancaria)--}}
                                @if($user->certificacion_bancaria != null)
                                  <a href="{{config('app.url').$user->certificacion_bancaria}}" target="_blank" >DESCARGAR</a>
                                @endif
                                <div class="dropzone"></div>

                                
                            </div>

                            <div class="form-group">
                              <span class="help-block">Dejar en blanco si no quiere cambiar la contraseña</span>
                                <label for="password">Contraseña</label>
                                <input type="password" name="password"  class="form-control" placeholder="Nueva Contraseña">

                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmar la contraseña</label>
                                <input type="password" name="password_confirmation"  class="form-control" placeholder="Confirmar contraseña">
                            </div>

                            <button class="btn btn-primary btn-block"> <i class="fa fa-refresh"></i> Actualizar usuario</button>

                  </form>
              </div>

          </div>
      </div>

      <div class="col-md-6">
          <!--HORARIOS-->
          <div class="box box-primary">
            <div class="box-header with-border">
                  <div class="box-title ">
                      <h3> <i class="fa fa-lock"></i> Horarios</h3>
                  </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                  
                </thead>
                <tbody>

                    @foreach($horarios as $h)
                        <tr>      
                            <td>{{$h->dia}}:</td> 
                            <td> Desde las   
                                <input id="inp_{{$h->id}}_am" type="time" value="{{explode('|',$h->horario)[0] }}" onchange="cambiar_horario('{{$h->id}}')" /> 
                            </td>
                            <td> hasta las 
                              <input id="inp_{{$h->id}}_pm" onchange="cambiar_horario('{{$h->id}}')" type="time" value="{{explode('|',$h->horario)[1] }}"  />
                            </td>
                            <td> 

                              @if($h->estado_dia=="ABIERTO")
                                <span id="dia_estado_{{$h->id}}">ABIERTO</span> <input  id="inp_estado_dia_{{$h->id}}" type="checkbox" value="abierto" onchange="cambiar_estado_dia('{{$h->id}}')" checked>
                              @else
                                <span id="dia_estado_{{$h->id}}">CERRADO</span> <input  id="inp_estado_dia_{{$h->id}}" type="checkbox" value="cerrado" onchange="cambiar_estado_dia('{{$h->id}}')" />
                              @endif
                            
                            </td>
                            
                         </tr>
                         <span id="mens"></span>     
                    @endforeach
                </tbody>
              </table>  
            </div>

          </div>
           <!--ROLES--> 
          <div class="box box-primary">
            <div class="box-header with-border">
                  <div class="box-title ">
                      <h3> <i class="fa fa-lock"></i> Roles</h3>
                  </div>
            </div>
            <div class="box-body">

              @role('Admin')
              <form method="POST" action="{{route('users.roles.update', $user)}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                @include('admin.roles.option')

                <button  class="btn btn-primary btn-block"name="button"> <i class="fa fa-refresh"></i>Actualizar Roles</button>
              </form>
            @else
              <ul class="list-group">
                  @forelse ($user->roles as $role)
                      <li class="list-group-item">{{$role->name}}</li>
                    @empty
                      <li class="list-group-item">No tiene Roles</li>
                  @endforelse
              </ul>
              @endrole
            </div>

          </div>
           <!--PERMISOS--> 
          <div class="box box-primary">
              <div class="box-header with-border">
                    <div class="box-title ">
                        <h3> <i class="fa fa-unlock-alt"></i> Permisos</h3>
                    </div>
              </div>
              <div class="box-body">

              @role('Admin')
                <form method="POST" action="{{route('users.permissions.update', $user)}}">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}

                @include('admin.permissions.option',['model' => $user])

                  <button  class="btn btn-primary btn-block"name="button"> <i class="fa fa-refresh"></i>Actualizar Permisos</button>
                </form>
              @else
                
                <ul class="list-group">
                    @forelse ($user->getPermissionsViaRoles() as $permission)
                      <li class="list-group-item">{{$permission->name}}</li>
                    @empty
                      <li class="list-group-item">No tiene permisos</li>
                    @endforelse
                </ul>
                @endrole
              </div>

            </div>
      </div>
    </div>
    <script type="text/javascript">
      function cambiar_horario(id){
        var horario=document.getElementById("inp_"+id+"_am").value+"|"+document.getElementById("inp_"+id+"_pm").value;
        mostrar_cargando("mens",100,"Cragando")
        peticion_ajax("get","cambiar_horario/"+id+"/"+horario,function(rs){
          console.log(rs);
          document.getElementById("mens").innerHTML="horario cambiado";
        });
      }
      function cambiar_estado_dia(id){
          mostrar_cargando("mens",100,"Cragando")
          peticion_ajax("get","cambiar_estado_dia/"+id+"/"+document.getElementById('inp_estado_dia_'+id).checked,function(rs){
            console.log(rs);
            document.getElementById("mens").innerHTML="estado del dia cambiado ha "+rs.estado;
            document.getElementById("dia_estado_"+id).innerHTML=rs.estado;
          });
      }
    </script>

    
@endsection
@section('scripts')
    <!--
     * Aqui gestiono dropzone 
     * @type {String}
     -->
    <script type="text/javascript">
      new Dropzone('.dropzone',{
        //url:"/",
        url:"{{config('app.url')}}"+"/actualizar_certificacion_bancaria/{{$user->id}}",
        dictDefaultMessage:"Sube aquí tu código QR (solo se permiten imagenes con formato PNG,JPEG o JPG)",
        maxFiles:1,
        maxFilesize:10,//MB
        acceptedFiles: "image/*",
        dictMaxFilesExceeded:"Solo esta permitido subir un archivo",
        dictInvalidFileType:"Solo esta permitido subir imagenes",
        headers:{
          'X-CSRF-TOKEN':'{{csrf_token()}}'
        }
      });
      Dropzone.autoDiscover=false;

    </script>
@endsection