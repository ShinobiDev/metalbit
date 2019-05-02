<form method="POST" action="{{$py->urlApi}}">
                            {{csrf_field()}}

                                <div class="form-group">
                                    <label for="valor">Ingresa el valor de la recarga:</label>
                                    <input id="num_valor_recarga" onchange="cambiar_datos_recarga()" type="number"  value="20000" min="20000" class="form-control" required>
                                    <input id="hd_num_valor_recarga" value="20000" type="hidden">
                                </div>
                                <div>
                                
                                  <input   name="merchantId"    type="hidden"  value="{{trim($py->merchantId)}}"   >
                                  <input name="accountId"     type="hidden"  value="{{trim($py->accountId)}}" >
                                  <input name="description"   type="hidden"  value="Pagos y recargas de Metalbit"  >
                                  <input id="refRecarga" name="referenceCode" type="hidden"  value="{{$ref_code}}" >
                                  <input id="hd_val_recarga" type="hidden" name="amount" value="20000" >
                                  <input name="tax"           type="hidden"  value="0"  >
                                  <input name="taxReturnBase" type="hidden"  value="0" >
                                  <input  name="currency"     type="hidden"  value="COP" >
                                  <input id="hd_signature_recarga" name="signature"     type="hidden"  value="{{$hash}}">
                                  <input name="buyerEmail"    type="hidden"  value="{{trim(Auth::user()->email)}}" >
                                  <input name="responseUrl"    type="hidden"  value="{{config('app.url').trim($py->urlResponse)}}_recarga" >
                                  <input name="confirmationUrl"    type="hidden"  value="{{config('app.url').trim($py->urlConfirm)}}_recarga" >
                                  
                                </div>  
                                <div class="form-group">
                                     <input type="hidden" id="hd_id_user" name="user_id" value="{{Auth::user()->id }}" class="form-control">
                                     
                                </div>

                                <div class="form-group">
                                      @include('partials.redimir_cupon_recarga',['c'=>auth()->user()->id])
                                     <label for="valor">¿Estás, seguro de realizar la recarga?</label>
                                     <label id="msnEspera"></label>
                                </div>
                                <div>
                                   <button id="btn_acepta_recarga" onclick="aceptar_recarga()" type="button" class="btn btn-secondary" >SI</button>
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                </div>              
                                <div class="form-group" id="btn_payu" >
                                  <label  class="text-success">Total a pagar $ <span id="msnValorAPagar">20.000</span>
                                  </label>
                                  <button style="display: none" id="btn_recarga" type="submit" class="btn btn-success">Ir a Payu</button>
                                </div> 
                         
                        

                        <div class="modal-footer" >
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>


                        </div>
    </form>
    <script type="text/javascript">
      function aceptar_recarga(){

        
        mostrar_cargando("msnEspera",10,"Cargando ...");
        peticion_ajax("GET","registrar_recarga/"+document.getElementById("hd_id_user").value+"/"+document.getElementById("num_valor_recarga").value+"/"+document.getElementById("refRecarga").value+"/"+document.getElementById("hd_val_recarga").value,function(rs){
             if(rs.respuesta){
              document.getElementById("btn_recarga").style.display='block';
              document.getElementById("msnEspera").innerHTML="";
              document.getElementById("hd_signature_recarga").value=rs.hash;
              
            }else{
              document.getElementById("btn_recarga").style.display='none';
            }
        });
        ////AQUI SE DEBE REGISTRAR LA RECARGA 
      }
    </script>
