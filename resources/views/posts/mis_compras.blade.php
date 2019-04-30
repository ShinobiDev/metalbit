@extends('layouts.app')
@section('head')

@endsection
@section('header')
    <h1>
        Mis compras
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
          <h3 class="box-title text-primary">Listado de compras realizadas</h3>
      </div>
      <div class="box-body">
          <table id="mis-compras-table" class="table table-bordered table-striped">
            <thead>
              <tr class="bg-green">
                <th>Tipo</th>
                <th>Estado compra</th>
                <th>Vendedor</th>                
                <th>Cantidad comprada</th>
                <th>Criptomoneda</th>
                <th style="width: 300px">Valor comprado</th>
                <th style="width: 300px">Valor a pagar a {{config('app.name')}}</th>
                <th>Moneda local</th>
                <th>Método de pago + valor adicional</th>
                <th>Referecia de pago</th>
                <th>Código wallet</th>
                <th>Hash transacción</th>
                <th>Fecha pago</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              {{--dd($mis_compras)--}}            
              @foreach ($mis_compras as $compra)
                  <tr id="row_{{$compra->id_pago}}">      
                    <td class="bg-info text-red"><strong>compra</strong></td>          
                    <td>
                      @if($compra->transactionState=="Pendiente")
                        <span class="text-danger">Pendiente por pago</span>
                      @elseif($compra->transactionState == 'Pago confirmado por el anunciante' || $compra->transactionState == 'Pago hecho al anunciante')  
                        <span class="text-success">Transacción finalizada</span>
                      @elseif(($compra->transactionState == 'Pago Aceptado' && $compra->estado_pago =='PENDIENTE'))
                            <span class="text-danger">Pago aceptado, pendiente confirmación entidad bancaria</span>
                      @else
                        <span class="text-success">{{$compra->transactionState}}</span>
                      @endif
                    </td>       
                    <td class="bg-warning">{{$compra->name}}</td>          
                                                
                    <td class="text-center "><strong>{{number_format($compra->transactionQuantity,2,',','.')}}</strong></td>                                   
                    <td class="text-center text-red bg-success"><strong>{{$compra->nombre_cripto_moneda}}</strong></td>                                  
                    <td class="text-center text-primary" style="width: 300px"><span class="text-red">$</span> {{number_format($compra->transation_value,2,',','.')}}</td>
                    <td class="text-center text-primary bg-danger" style="width: 300px"><span class="text-red">$</span>{{number_format($compra->transaction_value_pagado+$compra->valor_sobre_costo,2,',','.')}}</td>
                    <td class="text-center text-success">{{$compra->moneda_pago}}</td> 
                    <td class="bg-info">
                      <strong>
                        {{$compra->metodo_pago}}
                      </strong>
                      <span class="text-red">$</span><span class="text-primary">{{number_format($compra->valor_sobre_costo,2,',','.')}}</span>
                    </td>                                    
                    <td><strong class="text-success">{{$compra->transactionId or 'Pendiente de compra'}}</strong></td>                                     
                    <td class="bg-warning">
                      @if($compra->code_wallet!='SIN REGISTRAR')
                        <span class="text-red">{{$compra->code_wallet}}</span>
                      @else
                        Sin registrar
                      @endif

                      @if($compra->image_wallet!='SIN REGISTRAR')
                        <a target="_blank" href="{{config('app.url')}}/archivos/{{$compra->image_wallet}}"><span class="text-primary">Ver wallet QR</span></a>
                      @endif

                        

                    </td>                                   
                    <td><span class="text-success">{{$compra->hash_txid}}</span></td>
                    <td class="bg-success"><strong>{{$compra->updated_at}}</strong></td>
                    <td>
                      

                      @if($compra->code_wallet=="SIN REGISTRAR" && $compra->image_wallet=="SIN REGISTRAR")
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#code_wallet_{{$compra->id_pago}}">
                            Registrar código wallet
                        </button>
                          
                      
                      @else

                        @if($compra->transactionState=="Moneda Envíada")
                          <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#confirmar_transaccion{{$compra->id_pago}}">
                              Confirmar transacción
                            </button>
                           
                        @endif


                        {{--<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#code_wallet_{{$compra->id_pago}}">
                            Ver info
                        </button>
                          <!--VENTANA MODAL-->
                         --}}
                      @endif  
                      
                      @if($compra->transactionState=="Pendiente")
                          <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#info_medio_pago_{{$compra->id_pago}}">
                            Información medio de pago
                        </button>
                       
                        @if($compra->metodo_pago=="Transferencia bancaria" ||  $compra->metodo_pago=='Consignacion bancaria' )

                          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#confirmar_pago_{{$compra->id_pago}}">
                            Confirmar pago de transacción
                        </button>
                        @endif
                      @endif


                    </td>                                   
                  </tr>
              @endforeach
            </tbody>
          </table>
          {{--ventanas--}}
          @foreach ($mis_compras as $compra)
                    
                      @if($compra->code_wallet=="SIN REGISTRAR" && $compra->image_wallet=="SIN REGISTRAR")
                       
                          <!--VENTANA MODAL-->
                          <div class="modal fade" id="code_wallet_{{$compra->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form id="ad_form_{{$compra->id_pago}}" >
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Registra el código wallet</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <i class="fa fa-info-circle"></i>
                                            <h5>Ingresa o sube el código QR de tu wallet dónde deseas recibir las monedas compradas</h5>
                                            
                                            @if($compra->code_wallet!='SIN REGISTRAR')
                                                <input type="text" name="codigo_wallet" placeholder="Ingresa aquí tu código wallet" class="textinput textInput form-control" {{--onchange="registrar_wallet_transaccion_realizada(this,'{{$compra->id_pago}}','{{$compra->id_anuncio}}')"--}}
                                                value="{{$compra->code_wallet}}" required >
                                            @else
                                                <input type="text" name="codigo_wallet" placeholder="Ingresa aquí tu código wallet" class="textinput textInput form-control" {{--onchange="registrar_wallet_transaccion_realizada(this,'{{$compra->id_pago}}','{{$compra->id_anuncio}}')"--}} required >
                                            @endif
                                            
                                            @if($compra->image_wallet != 'SIN REGISTRAR')  
                                              <a target="_blank" href="{{config('app.url')}}/archivos/transacciones/{{auth()->user()->id}}/{{$compra->id}}"><span class="text-primary">Ver wallet QR</span></a>
                                            @endif

                                              <input type="file" id="flWallet_{{$compra->id_anuncio}}" name="wallet" onchange="subir_archivo('{{$compra->id_anuncio}}',this)">    




                                            <label id="msnEspera_{{$compra->id_anuncio}}"></label>
                                            <span class="text-red"><strong >Nota importante:</strong> Verifica que el código de la Wallet y el código QR correspondan al destino y criptomoneda seleccionada (<strong>{{$compra->nombre_cripto_moneda}}</strong>). El envío de otra criptomoneda puede resultar en la pérdida de tu depósito. <strong>{{config('app.name')}}</strong> no se responsabiliza por la perdida de los fondos causado por un código wallet mal registrado o adjuntado.</span>
                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-secondary" data-dismiss="modal">Salir</a>
                                      <button type="button" id="btn_registro_wallet_{{$compra->id_pago}}" class="btn btn-primary" onclick="registrar_wallet_transaccion_realizada(this,'{{$compra->id_pago}}','{{$compra->id_anuncio}}')">Registrar código</button>
                                    </div>
                                  </div>
                                </div>
                            </form>    
                          </div>
                        <!--FIN VENTA MODAL-->
                      
                      @else

                        @if($compra->transactionState=="Moneda Envíada")
                         <!--VENTANA MODAL-->
                            @include('partials.btn_calificar_anunciante_transaccion_finalizada',['ad'=>$compra])
                            {{--<div class="modal fade" id="confirmar_transaccion{{$compra->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Información del anunciante</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <i class="fa fa-info-circle"></i>
                                            <h5>¿Estás seguro de que quieres confirmar esta transacción?</h5>
                                    </div>
                                    <div class="modal-footer">
                                      

                                      <form method="POST" action="{{route('confirmar_transaccion',[$compra->id_pago])}}">
                                        {{csrf_field()}}
                                        <a class="btn btn-secondary" data-dismiss="modal">Salir</a>  
                                        <button type="submit" class="btn btn-success" data-toggle="modal" >
                                          Confirmar transacción
                                        </button>                        
                                      </form>          
                                    </div>
                                  </div>
                                </div>
                            
                            
                          </div>--}}
                           <!--FIN VENTA MODAL-->
                        @endif

                        {{--
                          <!--VENTANA MODAL-->
                          <div class="modal fade" id="code_wallet_{{$compra->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Información del anunciante</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <i class="fa fa-info-circle"></i>
                                            <h5>{{$compra->name}}</h5>
                                            <h5>{{$compra->email}}</h5>
                                            <h5>{{$compra->phone}}</h5>
                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-secondary" data-dismiss="modal">Salir</a>                                      
                                    </div>
                                  </div>
                                </div>
                            
                          </div>--}}
                      @endif  

                      @if($compra->transactionState=="Pendiente" )
                        <div class="modal fade" id="info_medio_pago_{{$compra->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header bg-primary text-center">
                                      <h5 class="modal-title " id="exampleModalLabel">Información del medio de pago</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <i class="fa fa-info-circle"></i>

                                            @if($compra->metodo_pago=='Pago en efectivo')
                                              <h5><strong>METALBIT S.A.S.</strong></h5>
                                            {{--<h5>Calle 114 #53 - 96 Bogotá D.C. - Colombia </h5>--}}
                                            {{--<h5>Horario: Lunes a Viernes de 8:00 a.m. - 12:30m y de 1:30 p.m. a 5:00 p.m. </h5>--}}
                                            <h5 class="text-primary"><strong>{{$direccion_oficina->valor}}</strong></h5>
                                            <h5 class="text-success"><strong>{{$horario->valor}}</strong></h5>
                                            <a target="_blank" href="https://www.google.com/maps/place/Cl.+114+%2353-96,+Bogot%C3%A1/@4.6992389,-74.0641402,17z/data=!4m13!1m7!3m6!1s0x8e3f9ace4c6c14bd:0xb2d45afe3cfaa98a!2sCl.+114+%2353-96,+Bogot%C3%A1!3b1!8m2!3d4.699174!4d-74.0641315!3m4!1s0x8e3f9ace4c6c14bd:0xb2d45afe3cfaa98a!8m2!3d4.699174!4d-74.0641315?hl=es">Ver ubicación</a>

                                            @else
                                            <h5>Realiza la transferencia bancaria </h5>
                                              <h5>Entidad bancaria <strong>{{$nombre_banco->valor}}</strong></h5>
                                              <h5>Cuenta de ahorros <strong>{{$cuenta_banco->valor}}</strong></h5>
                                              @php
                                              $url=config('app.url') .$url_certificacion->valor;
                                              @endphp
                                              <a href="{{$url}}" target="_blank">
                                                
                                                <h5>Ver certificación bancaria
                                              </h5></a>
                                            @endif



                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-secondary" data-dismiss="modal">Salir</a>                                      
                                    </div>
                                  </div>
                                </div>
                            
                          </div>
                         
                      @endif
                      
                      @if($compra->transactionState=="Pendiente" && ($compra->metodo_pago == 'Transferencia bancaria' ||  $compra->metodo_pago=='Consignacion bancaria' ))
                         <div class="modal fade" id="confirmar_pago_{{$compra->id_pago}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Confirma tu pago</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            
                                      <form id="formConfirmarPago{{$compra->id_pago}}">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Número de la transacción </label>
                                            <input name="numero_transaccion" type="text" class="form-control" placeholder="Ingresa el número de transacción">
                                            <label >Sube aquí, cualquier archivo para certificar tu pago, puede ser una imagen o un archivo .pdf</label>
                                            <input name="archivo" id="flcerpago_{{$compra->id_anuncio}}" type="file" onchange="subir_archivo_certificacion_pago('{{$compra->id_pago}}',this)" >
                                            <input type="hidden" value="{{$compra->id_pago}}" name="id_pago" >


                                            <label id="msnEsperaPago_{{$compra->id_pago}}"></label>           
                                          </div>                                          
                                         <span id="lblMsn{{$compra->id_pago}}"></span>
                                          <input type="button" value="Confirmar" onclick="confirmar_pago_comprador('{{$compra->id_pago}}')" type="submit" class="btn btn-primary" />
                                      </form>





                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-secondary" data-dismiss="modal">Salir</a>                                      
                                    </div>
                                  </div>
                                </div>
                            
                          </div> 
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
              function subir_archivo_certificacion_pago(id,e){
                    //e.preventDefault();
                      mostrar_cargando("msnEsperaPago_"+id,10,"Cargando ...");
                      var Token =  '{{csrf_token()}}';
                      var formData = new FormData();
                      formData.append("file", $('#'+e.id).get(0).files[0]);
                      formData.append("Token", Token);

                      // Send the token every ajax request
                      $.ajaxSetup({
                          headers: { 'X-CSRF-Token' : Token }
                      });

                          $.ajax({        
                                  url: "{{config('app.url')}}"+"/subir_certificado_pago/"+id,
                                  method: 'POST',
                                  data: formData,
                                  processData: false,
                                  contentType: false,
                                  cache: false,
                                  success: function(data) {
                                      document.getElementById("msnEsperaPago_"+id).innerHTML=data.mensaje;
                                  },
                                  error:function(data){
                                    console.log(data);
                                    if(data.responseJSON.message=="The given data was invalid."){
                                      document.getElementById("msnEsperaPago_"+id).innerHTML="El formato del archivo debe ser .pdf";  
                                    }else{
                                      document.getElementById("msnEsperaPago_"+id).innerHTML=data.responseJSON.message;
                                    }
                                    
                                  }
                          });
                  }    
          </script>
          <script>
            $(document).ready(function() {
                console.log("5");
                $('#mis-compras-table').DataTable( {
                    dom: 'Bfrtip',
                    responsive: true,
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    language:
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
                } );
                filtro_url('#mis-compras-table');


            });
          </script>
       
            
@endsection




