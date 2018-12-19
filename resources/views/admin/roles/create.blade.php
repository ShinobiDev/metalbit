@extends('layouts.app')

@section('content')


    <div class="row">

          <div class="col-md-6">


              <div class="box box-primary">

                  <div class="box-header with-border">
                      <h3><i class="fa fa-pencil"></i>  Crear Role</h3>
                  </div>

                  <div class="box-body">

                        <form method="POST" action="{{route('roles.store')}}">
                          {{csrf_field()}}

                                @include('admin.roles.form')

                                <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Crear Role</button>

                         </form>

                 </div>

              </div>

          </div>

     </div>

@endsection
