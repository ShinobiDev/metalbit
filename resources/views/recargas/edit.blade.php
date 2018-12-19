
@extends('layouts.app')

@section('header')
@endsection
@section('content')

  <div class="container">
    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Recargas de Anuncios</h3>
              </div>

              <div class="box-body">

                  <form method="POST" action="{{route('recargas.update',$recargas)}}">
                    {{csrf_field()}}
                     {{method_field('PUT')}}

                        <div class="form-group">
                            <label for="valor">Valor de la recarga:</label>
                            <input type="text" name="valor" value="{{old('valor', $recargas->valor)}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="status">Cambiar estado :</label>
                            <select class="form-control" name="status">
                                <option value="Activo">Activo</option>
                                <option value="Pendiente">Pendiente</option>
                            </select>
                        </div>


                        <div class="form-group">
                             <input type="hidden" name="user_id" value="{{Auth::user()->id }}" class="form-control">
                             {{-- <input type="hidden" name="status" value="pendiente" class="form-control"> --}}
                        </div>

                          <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Activar</button>

                   </form>

              </div>
          </div>
        </div>
     </div>
  </div>


@endsection
@section('scripts')
      <script>
      function mayus(e) {
          e.value = e.value.toUpperCase();
          }
      </script>
@endsection
