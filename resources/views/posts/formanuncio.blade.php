<form method="POST" id="ad-form" class="form-horizontal add-adform" action="{{route('anuncios.store')}}">
{{csrf_field()}}
          
          <input id="hd_tipo_anuncio" type='hidden' name='tipo_anuncio' required/>
          <fieldset>

           <div class="row " id="row_id_ad-place">
              <div id="div_id_ad-place" class="col-md-2 label-col form-group">
                <label for="id_ad-place" class="control-label requiredField"> <b>Ubicación</b> </label>
             </div>
             <div class="col-md-3">
               <div class="controls">
                 <input class="textinput textInput form-control" id="id_ad-place" name="ubicacion" type="text" required/>
                 <input type="hidden" id="locality" name="localidad">
                 <input type="hidden" id="administrative_area_level_1" name="departamento">
                 <input type="hidden" id="country" name="ciudad">
                 <input type="hidden" id="postal_code" name="cod_postal" >
               </div>
             </div>
             <div class="col-md-7 two-col-help-text">
                    Para el comercio online debe especificar el país. Para el comercio local, por favor, especifique la ciudad, código postal o dirección.
             </div>
           </div>
           <div class="row " id="row_id_ad-online_provider">
              
                <div class="col-md-7 two-col-help-text">
                   <div id="online-payment-method-description" style="display: none">
                            <strong id="payment-method-name"></strong>
                              <p id="payment-method-description"></p>
                      <div id="online-sell-risk">
                        <p>
                            El riesgo asociado a la venta de criptomonedas online con esta forma de pago es <strong id="risk-level"></strong>.
                       </p>
                       <p>
                            Infórmese sobre los niveles de riesgo en
                            <a href="/guides/how-to-sell-bitcoins-online#risk-level"><i class="icon icon-info"></i> nuestra guía de venta online</a>.
                       </p>
                     </div>
                     <div id="online-buy-risk">
                       <p>
                         La compra de criptomonedas online está protegida por el depósito en garantía de <a href="/">{{config('app.name')}}</a>
                       </p>
                       <p>
                         Para más información, consulte <a target="_blank" href="/security/"><i class="icon icon-info"></i> nuestra guía de seguridad</a>.
                       </p>
                   </div>
                  </div>
                </div>
           </div>
          </fieldset>

          <fieldset>
            <legend class="text-red">Más información</legend>
            <div class="row " id="row_id_ad-currency">
              <div id="div_id_ad-currency" class="col-md-2 label-col form-group">
                <label for="id_ad-currency" class="control-label requiredField"> <b>Moneda Local</b></label>
              </div>
              <div class="col-md-3">
                <div class="controls">
                  <select class="moneda select form-control select2" id="sel_moneda" name="moneda">
                        @foreach ($listamonedas as $key => $listamoneda)

                          <option value="{{$listamoneda['Currency']}}">{{$listamoneda['Country']}}</option>                          
                        @endforeach
                  </select>
                  @php
                      $mr=(array)$listamonedas;
                  @endphp

                  <input id="hd_moneda" type="hidden" name="nombre_moneda" value="{{$mr[0]['Country']}}">
                </div>
              </div>
              <div class="col-md-7 two-col-help-text">
                </div>
              </div>
              <div class="row " id="row_id_ad-currency">
                <div id="div_id_ad-currency" class="col-md-2 label-col form-group">
                  <label for="id_ad-currency" class="control-label requiredField"><b>Cripto Moneda</b></label>
                </div>
                <div class="col-md-3">
                  <div class="controls">
                    <select class="select form-control select2" id="sel_cripto" name="criptomoneda">
                        @foreach ($listacriptos as $key => $listacripto)
                          <option value="{{$listacripto->id}}">{{$listacripto->name}}</option>
                        @endforeach

                    </select>
                        @php
                          $cr=(array)$listacriptos;
                        @endphp
                        
                    
                    <input id="hd_cripto" type="hidden" name="nombre_cripto_moneda" value="{{$cr[0]->name}}">
                  </div>
                </div>
                <div class="col-md-7 two-col-help-text">
                  </div>
                </div>
              <div class="row " id="row_id_ad-bank_name">
                <div id="div_id_ad-bank_name" class="col-md-2 label-col form-group">
                  <label for="id_ad-bank_name" class="control-label "><b>Servicio de pagos / entidad bancaria</b></label>
                </div>
                <div class="col-md-3">
                  <div class="controls">
                    <input class="textinput textInput form-control" id="id_ad-bank_name" name="banco" type="text" required/>
                  </div>
               </div>
               <div class="col-md-7 two-col-help-text">
                    <b>Opcional</b>. Nombre o código del banco o proveedor de pagos. Para transferencias internacionales, especifique el código SWIFT / BIC del banco
              </div>
             </div>

              <div class="row " id="row_id_ad-commission">
                  <div id="div_id_ad-commission" class="col-md-2 label-col form-group">
                     <label for="id_ad-commission" class="control-label "> Margen</label>
                   </div>
                   <div class="col-md-3">
                    <!--Valor de ganacia -->
                     <div class="input-group">
                       <input class="numberinput form-control" id="margen" name="margen" step="any" type="number" value="0" required/>
                       <span class="input-group-addon">%
                       </span>

                       
                      </div>
                      <!--CALCULO DEL VALOR DE VENTA-->
                      <div class="dynamic-info">

                        <span class='price-info-text text-info'>Precio del comercio con el valor actual de mercado $
                        <strong id="precio_mon" class='price-info alert-success'>{{number_format($coins, 2, ',', '.')}}</strong>
                        <input id="hdPrecioMon" type="hidden" value="{{number_format($coins, 2, '.', '')}}">
                      </span>  
                        


                      </div>
                    </div>
                    <div class="col-md-7 two-col-help-text">
                    Margen que desea sobre la tasa de mercado de la criptomoneda. Puede introducir un valor negativo para comprar o vender por debajo del precio de mercado y atraer así a más contactos. Para fijar el precio de manera más compleja, modifique la ecuación de precio directamente.
                  </div>
               </div>
               <div class="row " id="row_id_ad-price_equation">
                 <div id="div_id_ad-price_equation" class="col-md-2 label-col form-group">
                   <label for="id_ad-price_equation" class="control-label requiredField"></label>
                 </div>
                 <!--VALOR DE GANACIA DE VENTA-->
                 <div class="col-md-3">
                   <div class="controls">

                    <span class='price-info-text text-info'>Valor de ganancia por venta 
                            <strong id="precio_ganancia" class='price-info alert-success' > $ 0</strong>
                            <input type="hidden" id="por_gan_compra">
                    </span>
                      


                   </div>

                   <div class="dynamic-info">
                    <span class='price-info-text'>
                       
                    </span>
                  </div>
                  <!--VALOR DE VENTA SUGERIDO DE ACUERDO A LA GANANCIA-->
                   <div class="dynamic-info">
                    <span class='price-info-text text-info'>Valor total $ 
                        <strong id="st_valor_total_venta" class='price-info alert-success'>{{number_format($coins, 2, ',', '.')}}</strong>
                        <input id="hd_valor_total_venta" type="hidden" value="{{number_format($coins, 2, '.', '')}}">
                    </span>
                  </div>
                </div>
                <div class="col-md-7 two-col-help-text">
                    Cómo se determina el precio de cambio a partir del precio de mercado horario. Para obtener más información acerca de las ecuaciones para determinar su precio de cambio vea
                    <!--<a target='_blank' href='/guides/equation-howto/'><i class='icon icon-external-link'></i> Preguntas más frecuentes sobre precios</a>-->.
                    <b class="text-red">Por favor, tenga en cuenta que el anunciante es siempre responsable de todas las tarifas de procesamiento de pagos.</b>
                </div>
              </div>
              <!--LIMITE DE PRECIO DE MONEDA-->
              <div class="row " id="row_id_ad-min_amount">
                <div id="div_id_ad-min_amount" class="col-md-2 label-col form-group">
                  <label for="id_ad-min_amount" class="control-label"><b>Límite mín. de precio de moneda</b> </label>
                </div>
                <div class="col-md-3">
                   <div class="input-group">
                      <input class="numberinput form-control" id="precio_minimo_moneda"  type="text" min="0"  onchange="formatear(this,'precio_minimo_moneda_hd')" required/>
                      <span class=" modi input-group-addon">COP</span>
                      <input class="numberinput form-control" id="precio_minimo_moneda_hd" name="precio_minimo_moneda" type="hidden" />
                   </div>
                 </div>
                 <div class="col-md-7 two-col-help-text">
                    <b>Opcional</b>. Límite mínimo de precio de moneda.
                  </div>
              </div>
              <!--LIMITE MINIMO DE TRANSACCIONES-->
              <div class="row " id="row_id_ad-min_amount">
                <div id="div_id_ad-min_amount" class="col-md-2 label-col form-group">
                  <label for="id_ad-min_amount" class="control-label "><b>Límite mín. de transacciones</b> </label>
                </div>
                <div class="col-md-3">
                   <div class="input-group">
                      <input class="numberinput form-control" id="id_ad-min_amount"  type="text" min="0"  onchange="formatear(this,'limite_min_hd')" required/>
                        <span class=" modi input-group-addon">COP</span>
                        <input class="numberinput form-control" id="limite_min_hd" name="limite_min" type="hidden" />
                   </div>
                 </div>
                 <div class="col-md-7 two-col-help-text">
                    Opcional. Límite mínimo de transacción por intercambio.
                  </div>
              </div>
              <!--LIMITE MAXIMO DE TRANSACCIONES-->
              <div class="row " id="row_id_ad-max_amount">
                <div id="div_id_ad-max_amount" class="col-md-2 label-col form-group">
                  <label for="id_ad-max_amount"  class="control-label "><b>Límite máx. de transacciones</b></label>
                </div>
                <div class="col-md-3">
                  <div class="input-group">
                    <input class="numberinput form-control" id="id_ad-max_amount"  type="text" min="0"  onchange="formatear(this,'limite_max_hd')" required/>
                    <input class="numberinput form-control" id="limite_max_hd" name="limite_max" type="hidden" />
                    <span class="modi input-group-addon">COP</span>
                  </div>
                </div>
                <div class="col-md-7 two-col-help-text">
                    <b>Opcional</b>. Límite máximo de transacción por intercambio. Para ventas online, el saldo de su cartera de <a href="/">MetalBit</a> también puede limitar el límite máximo en un intercambio.
                </div>
              </div>
              <div class="row " id="row_id_ad-opening_hours">
                <div id="div_id_ad-opening_hours" class="col-md-2 label-col form-group">
                  <label for="id_ad-opening_hours_0" class="control-label ">
                </div>
              </div>
               <div class="row " id="row_id_ad-meeting_point">
                 <div id="div_id_ad-meeting_point" class="col-md-2 label-col form-group">
                   <label for="id_ad-meeting_point" class="control-label "><b>Lugares de encuentro</b></label>
                </div>
                 <div class="col-md-3">
                   <div class="controls">
                     <input class="textinput textInput form-control" id="id_ad-meeting_point" name="lugar" type="text" />
                   </div>
                 </div>
                 <div class="col-md-7 two-col-help-text">
                      Lugares donde prefiere realizar el intercambio en efectivo. <i>
                        Ej. un café Internet o restaurante local.
                      </i>
                  </div>
              </div>
              <div class="row " id="row_id_ad-other_info">
                  <div id="d  iv_id_ad-other_info" class="col-md-2 label-col form-group">
                    <label for="id_ad-other_info" class="control-label "><b>Términos del comercio</b> </label>
                  </div>
                  <div class="col-md-6">
                    <div class="controls">
                      <textarea class="textarea form-control" cols="40" id="id_ad-other_info" name="terminos" rows="10" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-4 two-col-help-text">
                     Otra información que usted desea decir acerca de su transacción. <b>Ejemplo 1:</b> <!--<b>Este anuncio es solo para las transacciones en efectivo. Si desea pagar en línea, póngase en contacto con MetalBit.com/ad/1234</b>.--><i>Este anuncio es solo para las transacciones en efectivo. Si desea pagar en línea, realiza el pago a través de Payu y pongase en contacto conmigo</i>. <b>Ejemplo 2</b>: <i>Por favor, haga la solicitud solo cuando puede completar el pago con dinero en efectivo en el plazo de 12 horas</i>.
                 </div>
              </div>                  
              </fieldset>
              <hr>
              <span id="msn_load"></span>
              <input type="hidden" name="user_id" value="{{auth::user()->id }}" class="form-control">
              <div class="form-group"> <div class="controls ">
                     <input type="button" name="submit" value="Publicar anuncio" class="btn btn-primary" id="submit-id-submit" onclick="publicar_anuncio()" /> </div>
              </div>

</form>