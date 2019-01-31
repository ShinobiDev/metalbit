@extends('layouts.app')

@section('header')
@endsection
@section('content')

  <div class="container">
    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>Costo de clic por anuncio</h3>
              </div>

              <div class="box-body">

                  <form method="POST" action="{{route('recargas.store')}}">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label for="valor">Costo clic:</label>
                            <input type="number" name="valor" value="{{old('valor')}}" class="form-control">
                        </div>
                         <div class="form-group">
                            <label for="valor">Ingresa el costo del clic que tendran todos los clientes</label>
                            
                        </div>  
                        <div class="form-group">
                             <input type="hidden" name="user_id" value="{{Auth::user()->id }}" class="form-control">
                             {{-- <input type="hidden" name="status" value="pendiente" class="form-control"> --}}
                        </div>

                          <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Cambiar</button>

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
