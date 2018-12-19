@extends('layouts.app')
@section('content')


    <div class="row">

          <div class="col-md-6">


              <div class="box box-primary">

                  <div class="box-header with-border">
                      <h3><i class="fa fa-edit"></i>  Editar Role</h3>
                  </div>

                  <div class="box-body">

                      <form method="POST" action="{{route('roles.update', $role)}}">

                            {{csrf_field()}} {{method_field('PUT')}}

                            @include('admin.roles.form')

                            <button class="btn btn-primary btn-block"><i class="fa fa-refresh"></i> Actulizar Role</button>
                    </form>

                 </div>

              </div>

          </div>

     </div>

@endsection
