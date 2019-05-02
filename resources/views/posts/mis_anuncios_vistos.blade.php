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
    <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
    <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title">Listado de anuncios</h3>
            
            

      </div>
      <div class="box-body">
          <table id="vistos-table" class="table table-striped table-codensed table-hover table-resposive">
              <thead>
                <tr class="bg-orange">
                  <th>Tipo transacción</th>
                  <th>Nombre usuario</th>
                  <th>Forma de Pago</th>
                  <th>Ubicación</th>
                  <th style="width: 300px;">Precio/Moneda</th>
                  <th>Criptomoneda</th>
                  <th style="width: 300px;">Limites (min./max.)</th>
                  <th>Visto última vez</th>
                  <th>Acciones</th>

                </tr>
              </thead>

              <tbody>
                {{--se crear anuncio de compra--}}

                @foreach ($anuncios_vistos as $ad)

                    
                    <tr id="row_{{$ad->id_anuncio}}">      
                      <td class="text-green text-center bg-warning"><strong><h4>{{strtoupper($ad->tipo_anuncio)}}</h4></strong></td>
                      <td class="bg-danger">{{$ad->name}}</td>
                      <td class="bg-info">{{$ad->banco }}</td>
                      <td class="bg-warning">{{$ad->ubicacion}}</td>
                      <td class="bg-success" style="width: 300px;">
                         <span class="text-blue"><h4>$  {{$ad->precio_moneda}} <span class="text-red">{{$ad->moneda}}</span></h4></span> 

                     </td>
                      <td class="bg-danger"><strong>{{$ad->cripto_moneda}}</strong></td>
                      <td class="bg-info text-primary" style="width: 300px;"><span class="text-red">$</span> {{ number_format($ad->limite_min,2, ',', '.') }} /</br> <span class="text-red">$</span> {{ number_format($ad->limite_max,2, ',', '.')}} <span class="text-red">{{$ad->moneda}}</span></td>
                      <td class="bg-warning"><h6>{{$ad->visto}}</h6></td>
                      <td class="bg-success">
                        
                                      <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-success btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'infogen'.$ad->id}}','{{$ad->id}}','{{0}}','info')">
                                        Ver info
                                        </button>
                                    
                                      @if($ad->tipo_anuncio=="venta")
                                     





                                         @if($ad->transaccion_pendiente['respuesta']==true && $ad->transaccion_pendiente['state']!='Visto')
                                                <button id="{{'btn_compra_'.$ad->id}}" type="button" class="btn btn-default btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'infoventa'.$ad->id}}','{{$ad->id_anuncio}}','0','compra')" >
                                                  <i class="fa fa-money"> Compra pendiente</i>
                                                  
                                                </button>
                                                  
                                                
                                              @else
                                                <button id="{{'btn_compra_'.$ad->id}}" type="button" class="btn btn-default btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'infoventa'.$ad->id}}','{{$ad->id_anuncio}}','0','compra')" >
                                                 <i class="fa fa-money"> Comprar</i>
                                                </button>
                                              @endif



                                       
                                      @endif
                                      
                                      @if($ad->btn_calificar)
                                         <button id="{{'btn_'.$ad->cod_anuncio}}" type="button" class="btn btn-primary btn-block" data-toggle="modal" onclick="descontar_recargar('{{ 'infocalificar'.$ad->id}}','{{$ad->id_anuncio}}','0','compra')" >
                                          Calificar
                                        </button>
                                         
                                      @endif  
                                      
                      </td>
                    </tr>
                    
                @endforeach
                {{--se crear anuncio de compra--}}
              </tbody>
              
          </table>
          {{--ventanas--}}
          @foreach ($anuncios_vistos as $ad)
                   
              @include('posts.ventana_modal_info_general')

              @if($ad->tipo_anuncio=="venta")
                
                 @include('posts.ventana_modal_info_venta')
              @endif
              
              @if($ad->btn_calificar)
                 
                 @include('partials.btn_calificar_anunciante')
              @endif  
                 
          @endforeach

      </div>
      
        
 
    </div>
  </div>


@endsection



@section('scripts')
    
          <script type="text/javascript">
           
                  $(function (){
                      $('#vistos-table').DataTable({
                          responsive:true,
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
