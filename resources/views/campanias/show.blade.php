@extends('layouts.app')
@section('head')

@endsection
@section('header')
    <h1>
        Tramitadores vistos por mi
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('welcome')}}"><i class="fa fa-dashboard">Inicio</i></a></li>
      <li class="active"></li>
    </0l>

@endsection

@section('content')
  
  <div class="container-fluid">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="col-lg-12 col-12 col-md-12 box-header">
            <div class="col-lg-4 col-4 col-md-4" >
              <h3 class="box-title">Campañas</h3>
            </div>
            <div class="col-lg-4 col-4 col-md-4" >
              
            </div>
            <div class="col-lg-4 col- col-md-4" >
                
                  <a href="{{route('campanias.index')}}" class="btn btn-primary pull-right btn-lg  btn-block" >
                  <i class="fa fa-user-plus"> Crea una campaña</i>
                  </a>
                  
                
                
            </div>
          </div>
          <div class="col-12 col-md-12 box-body"> 
            
        
                      {{--@include('partials.alert')--}}
                      @include('campanias.tabla_campanias')
          </div>
            
     
        </div>
    </div>
  </div>


@endsection



@section('scripts')
    
          <script type="text/javascript">
           
                  $(function (){
                      $('#users-table').DataTable({
                        stateSave: true,
                        responsive: true,
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

                       $('#cupones-table').DataTable({

                        stateSave: false,
                        responsive: true,
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
                       
                      filtro_url('#users-table');
                  });
                  
  
             </script>
@endsection

@include('partials.scripts')

