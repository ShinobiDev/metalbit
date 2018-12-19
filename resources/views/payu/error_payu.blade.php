@extends('layouts.app')


@section('content')

<div class="container">
    <div class="marco">
        
       
       
        <div class="contenedor">
            <p>{{$mensaje}}</p>
            
            <a href="{{route('anuncios.index')}}" class="btn btn-default">Volver</a>
            
        </div>
    
    </div>
</div>
@endsection