@extends('layouts.app')
@section('content')
      <section class="pages container">
          <div class="page page-about">
                <h1 class="text-red">Pagína no Autorizada!!</h1>

                  <span class="text-red">{{$exception->getMessage()}}</span>
                <h1><p class="text">Regresar <a class="btn btn-default " href="{{url()->previous()}}">Inicio</h1></a></p>
          </div>
      </section>
@endsection
