@extends('layouts.app')
@section('head')

@endsection
@section('header')
    <h1>
        Mis ventas
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('welcome')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Ingresos</li>
    </0l>

@endsection

@section('content')

  <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
    <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title text-red">Listado de ventas realizadas</h3>
      </div>
      <div class="box-body">
          <table id="mis-ventas-table" class="table table-bordered table-striped">
            <thead>
              <tr class="bg-purple">
                <th>Tipo</th>
                <th>Estado venta</th>
                <th>Comprador</th>                
                <th>Cantidad vendida</th>
                <th>Criptomoneda</th>
                <th style="width: 300px">Valor vendido</th>
                <th style="width: 300px">Valor pagado por {{config('app.name')}}</th>
                <th>Moneda local</th>
                <th>Referecia de pago</th>
                <th>Código wallet</th>
                <th>Hash transacción</th>
                <th>Fecha pago</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              {{--dd($mis_ventas)--}}            
              @foreach ($mis_ventas as $venta)
                  <tr id="row_{{$venta->id_pago}}">      
                    <td class="bg-danger text-red"><strong>venta</strong></td>          
                    <td class="bg-info">
                      @if($venta->transactionState=="Pendiente")
                        <span class="text-danger">Pendiente por pago</span>
                      @elseif(($venta->transactionState == 'Pago Aceptado' && $venta->estado_pago =='PENDIENTE'))
                        <span class="text-danger">Pago aceptado, pendiente confirmación entidad bancaria</span>
                      @else
                        <span class="text-success">{{$venta->transactionState}}</span>
                      @endif
                    </td>       
                    <td class="text-center"><b>{{$venta->name}}</b></td>          
                                                
                    <td class="bg-success text-center"><strong class="text-primary">{{number_format($venta->transactionQuantity,2,',','.')}}</strong></td>                                   
                    <td class="bg-warning text-center"><strong class="text-red">{{$venta->nombre_cripto_moneda}}</strong></td>                                  
                    <td style="width: 300px" class="text-primary text-center"><span class="text-red">$</span>{{number_format($venta->transation_value,2,',','.')}}</td>

                    @if($venta->transactionState=="Pago hecho al anunciante" || $venta->transactionState=="Pago confirmado por el anunciante")

                      <td style="width: 300px" class=" bg-danger text-primary text-center"><span class="text-red">$</span>{{number_format($venta->transation_value-($venta->transation_value*($venta->porcentaje_pago/100)),0,',','.')}}</td>
                    @else
                       <td style="width: 300px" class=" bg-danger text-primary text-center"><span class="text-red">$</span>{{number_format($venta->transation_value-($venta->transation_value*($variable->valor/100)),0,',','.')}}</td>

                    @endif  


                    <td class="text-red bg-success text-center"><strong>{{$venta->moneda_pago}}</strong></td>                                    
                    <td><strong class="text-success text-center">{{$venta->transactionId or 'Pendiente de venta'}}</strong></td>                                     
                    <td>
                      @if($venta->code_wallet!='SIN REGISTRAR')
                        <span class="text-red">{{$venta->code_wallet}}</span>
                      @else
                        Sin registrar
                      @endif

                      @if($venta->image_wallet!='SIN REGISTRAR')
                        <a target="_blank" href="{{config('app.url')}}/archivos/{{$venta->image_wallet}}"><span class="text-primary">Ver wallet QR</span></a>
                      @endif

                        

                    </td>                                   
                    <td class="bg-info"><span class="text-success">{{$venta->hash_txid}}</span></td>
                    <td class="bg-danger"><span>{{$venta->updated_at}}</span></td>
                    <td>
                      

                      @if($venta->hash_txid=="SIN REGISTRAR" && $venta->transactionState != "Pendiente")
                         <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#code_wallet_{{$venta->id_pago}}">
                            Registrar Hash/txid
                         </button>
                      @endif
                       @if( $venta->transactionState == "Pago hecho al anunciante")
                         <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#confirmar_pago{{$venta->id_pago}}">
                           Confirmar pago hecho por {{config('app.name')}}
                         </button>
                      @endif



                    </td>                                   
                  </tr>
              @endforeach
            </tbody>
          </table>
          {{--ventanas--}}
         @foreach ($mis_ventas as $venta)
                 
                      @if($venta->hash_txid=="SIN REGISTRAR" && $venta->transactionState != "Pendiente")
                         
                          <!--VENTANA MODAL-->
                          <div class="modal fade" id="code_wallet_{{$venta->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form id="ad_form_{{$venta->id_anuncio}}" method="POST" action="{{route('registrar_hash_transaccion_realizada',$venta->id_pago)}}">
                              {{csrf_field()}}
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Registra el Hash/txid</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <i class="fa fa-info-circle"></i>
                                             <h5>Ingresa el código HASH TXID de tu transacción </h5>
                                            <input type="text" name="hash_txid" class="textinput textInput form-control"+ required>

                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-secondary" data-dismiss="modal">Salir</a>
                                      <button type="submit" class="btn btn-primary">Registrar Hash/txid</button>
                                    </div>
                                  </div>
                                </div>
                            </form>
                          </div>
                        <!--FIN VENTA MODAL-->
                      @endif

                      @if($venta->transactionState == "Pago hecho al anunciante")
                         
                          <!--VENTANA MODAL-->
                          <div class="modal fade" id="confirmar_pago{{$venta->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form id="ad_form_{{$venta->id_anuncio}}" method="POST" action="{{route('confirmar_pago_por_vendedor',$venta->id_pago)}}">
                              {{csrf_field()}}
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Confirma el pago recibido por las transacciones hechas a través de {{config('app.name')}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <i class="fa fa-info-circle"></i>
                                            <input type="hidden" name="id_usuario" value="{{auth()->user()->id}}">
                                             <h5>¿Quieres confirmar el pago hecho por {{config('app.name')}}?</h5>
                                            

                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-secondary" data-dismiss="modal">Salir</a>
                                      <button type="submit" class="btn btn-success">Confirmar pago</button>
                                    </div>
                                  </div>
                                </div>
                            </form>
                          </div>
                        <!--FIN VENTA MODAL-->
                      @endif

      @endforeach
      </div>
      
        
 
    </div>
  </div>



@endsection

@section('scripts')
          <script type="text/javascript">
              function subir_archivo(id,e){
                    //e.preventDefault();
                      mostrar_cargando("msnEspera_"+id,10,"Cargando ...");
                      var Token =  '{{csrf_token()}}';
                      var formData = new FormData();
                      formData.append("file", $('#'+e.id).get(0).files[0]);
                      formData.append("Token", Token);

                      // Send the token every ajax request
                      $.ajaxSetup({
                          headers: { 'X-CSRF-Token' : Token }
                      });

                          $.ajax({        
                                  url: "{{config('app.url')}}"+"/registrar_wallet_qr/"+id,
                                  method: 'POST',
                                  data: formData,
                                  processData: false,
                                  contentType: false,
                                  cache: false,
                                  success: function(data) {
                                      document.getElementById("msnEspera_"+id).innerHTML=data.mensaje;
                                  },
                                  error:function(data){
                                    console.log(data);
                                    if(data.responseJSON.message=="The given data was invalid."){
                                      document.getElementById("msnEspera_"+id).innerHTML="El formato del archivo debe ser .pdf";  
                                    }else{
                                      document.getElementById("msnEspera_"+id).innerHTML=data.responseJSON.message;
                                    }
                                    
                                  }
                          });
                  }
          </script>
          <script>
            $(document).ready(function() {
                console.log("5");
                $('#mis-ventas-table').DataTable( {
                    dom: 'Bfrtip',
                    responsive: true,
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    language:
                      {
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
                } );
                filtro_url('#mis-ventas-table');


            });
          </script>
       
            
@endsection




