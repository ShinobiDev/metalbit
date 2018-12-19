@extends('layouts.app')
@section('head')

@endsection
@section('header')
    <h1>
        Anuncios vistos por mi
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('welcome')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active"></li>
    </0l>

@endsection

@section('content')

  <!--<div class="container">-->
    <div class="col-md-10 col-lg-offset-1">
    <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title">Listado de anuncios</h3>
            
            

      </div>
      <div class="box-body">
          <table id="vistos-table" class="table table-striped table-codensed table-hover table-resposive">
              <thead>
                <tr>
                  <th>Tipo transacción</th>
                  <th>Nombre usuario</th>
                  <th>Forma de Pago</th>
                  <th>Ubicación</th>
                  <th>Precio/Moneda</th>
                  <th>Cripto</th>
                  <th>Limites</th>
                  <th>Visto última vez</th>
                  <th>Acciones</th>

                </tr>
              </thead>

              <tbody>
                {{--se crear anuncio de compra--}}
                @foreach ($anuncios_vistos as $ad)
                    <tr>
                      <td class="text-green text-center"><strong><h3>{{strtoupper($ad->tipo_anuncio)}}</h3></strong></td>
                      <td>{{$ad->name}}</td>
                      <td>{{$ad->banco }}</td>
                      <td>{{$ad->ubicacion}}</td>
                      <td>
                         <span class="text-blue"><h4> {{$ad->precio_moneda}} </h4></span> <span class="text-red">{{$ad->moneda}}</span>

                     </td>
                      <td>{{$ad->cripto_moneda}}</td>
                      <td>{{ number_format($ad->limite_min,2, ',', '.') }} / {{ number_format($ad->limite_max,2, ',', '.')}} {{$ad->moneda}}</td>
                      <td><h6>{{$ad->visto}}</h6></td>
                      <td>
                        
                                      <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-success" data-toggle="modal" onclick="descontar_recargar('{{ 'infogen'.$ad->id}}','{{$ad->id}}','{{0}}','info')">
                                        Ver info
                                        </button>
                                      <!--AQUI INCLUYO LA VENTANA MODAL DE INFORMACION GENERAL-->
                                      @include('posts.ventana_modal_info_general')

                                      @if($ad->tipo_anuncio=="venta")
                                        <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-default" data-toggle="modal" onclick="descontar_recargar('{{ 'infoventa'.$ad->id}}','{{$ad->id_anuncio}}','0','compra')" >
                                          Comprar
                                        </button>
                                         @include('posts.ventana_modal_info_venta')
                                      @endif
                                      
                                      @if($ad->btn_calificar)
                                         <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-primary" data-toggle="modal" onclick="descontar_recargar('{{ 'infocalificar'.$ad->id}}','{{$ad->id_anuncio}}','0','compra')" >
                                          Calificar
                                        </button>
                                         @include('partials.btn_calificar_anunciante')
                                      @endif  
                                      
                      </td>
                    </tr>
                    
                @endforeach
                {{--se crear anuncio de compra--}}
              </tbody>
              
          </table>
      </div>
      
        
 
    </div>
  </div>


@endsection



@section('scripts')
    
          <script type="text/javascript">
           
                  $(function (){
                      $('#vistos-table').DataTable({
                        'language':
                          {
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            }
                        }
                      });
                  });
            
  
             </script>
@endsection


@include('partials.scripts')
