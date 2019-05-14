      @extends('layouts.app')
        @section('head')

        @endsection

        @section('header')
            <h1>
                Anuncios
            </h1>
            <small>Listado</small>

            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard">  Inicio</i></a></li>
              <li class="active">Anuncios</li>
            </0l>

        @endsection
        <!--SECCION DE CONSULTA DE ANUNCIOS-->


        @if($mis_anuncios==true)
            @section('content')



               <!--se incluye seccion de tabla con anuncios de ventas-->
               @include('posts.consultasventas_mis_anuncios')
               <!--FIN se incluye seccion de tabla con anuncios de ventas-->


               


            @endsection
        @else
          @section('content')

             @include('partials.confirmar_correo')

             <!--se incluye seccion de tabla con anuncios de ventas-->
             @include('posts.consultasventas')
             <!--FIN se incluye seccion de tabla con anuncios de ventas-->


            


          @endsection
        @endif





          <!--FINSECCION DE CONSULTA DE ANUNCIOS-->



        @section('scripts')

             <script>
                  $(function (){
                      $('#users-table').DataTable({
                        'responsive': true,
                        stateSave: true,
                        'language':
                          {
                            "responsive":       true,
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ anuncios",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando anuncios del _START_ al _END_ de un total de _TOTAL_ anuncios",
                            "sInfoEmpty":      "Mostrando anuncios del 0 al 0 de un total de 0 anuncios",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ anuncios)",
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
                  //filtro_url('#users-table');
             </script>

             <script>
                  $(function (){
                      $('#comprar-table').DataTable({
                        'responsive': true,
                        stateSave: true,
                        'language':
                          {
                            "responsive":       true,
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ anuncios",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando anuncios del _START_ al _END_ de un total de _TOTAL_ anuncios",
                            "sInfoEmpty":      "Mostrando anuncios del 0 al 0 de un total de 0 anuncios",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ anuncios)",
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
                      //filtro_url('#comprar-table');
                  });
             </script>
             



        @endsection

<script type="text/javascript">
  window.onload=function(){
    var ss=sessionStorage.getItem('fila');
    if(ss!=null){
      document.getElementById("row_"+ss).style.backgroundColor='#d9e3f1'; 
      document.getElementById("row_"+ss).classList.add('fondo_fila');
    }
  }

 function donde_estoy(id){

   document.getElementById("row_"+id).classList.add('fondo_fila');
    
   sessionStorage.setItem('fila', id);
   console.log(document.getElementById("row_"+id));
   var ele=document.querySelectorAll(".fondo_fila");
   console.log(ele.length);
   if(ele.length>1){
    for(var i = 0;i <= ele.length-1;i++){
      ele[i].classList.remove('fondo_fila');
      document.getElementById(ele[i].id).style.backgroundColor='#f9f9f9';
      if(document.getElementById(ele[i].id) != null){          
          document.getElementById("row_"+id).classList.add('fondo_fila');
          document.getElementById("row_"+id).style.backgroundColor='#d9e3f1'; 
      }
    }
      
   
   }else{
    document.getElementById("row_"+id).style.backgroundColor='#d9e3f1'; 
   }
   


 }      
  
</script>