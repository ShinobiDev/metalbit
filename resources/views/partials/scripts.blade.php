<script type="text/javascript">
  @if(auth()->user()!=null)
    var id_usuario= '{{auth()->user()->id}}';
  @else
    var id_usuario= '0'; 
  @endif  
    var _id_anuncio=0;
</script>
<script type="text/javascript">
      var url_global= "{{config('app.url')}}";

      
       /*peticion que hace cambio del campo signature*/
       function cambiar_datos_recarga(){
          document.getElementById("btn_recarga").style.display='none';
          var val=document.getElementById("num_valor_recarga").value;
          var ref=document.getElementById("refRecarga").value.split("-")[0];

          var add_ref=Date.now().toString().substr(-2,2);
          var hs=ref+"-"+add_ref+"/"+val+"/COP";
          
          document.getElementById("refRecarga").value=ref+"-"+add_ref;


          document.getElementById("hd_val_recarga").value=val;
          peticion_ajax("get","hash/"+hs,function(rs){
                   
             
             document.getElementById("hd_signature_recarga").value=rs.valor;
             //document.getElementById("btn_recarga").style.display='none';
             
          });  
        }
       /*funcion que hace la peticion ajax */ 
      function peticion_ajax(metodo,url,func,datos,funerro){
              //debe ir como core y no public la url en producccion
             $.ajaxSetup({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
             $.ajax({
                   type: metodo,
                   url: url_global+"/"+url,
                   dataType: "json",
                   data:datos,
                   success: function(result){
                         
                         func(result);
                   },
               error: function(err){
                  if(funerro!=undefined){
                     funerro(err);
                  }
                  
                  
                  }
               });
      }
          /*Funcion tomada del sitio 
         * http://www.antisacsor.com/articulo/10_98_dar-formato-a-numeros-en-javascript
         * Para dar formato a los numeros*/
        /**
         * Da formato a un número para su visualización
         *
         * @param {(Number|string)} numero Número que se mostrará
         * @param {Number} [decimales=null] Nº de decimales (por defecto, auto); admite valores negativos
         * @param {string} [separadorDecimal=","] Separador decimal
         * @param {string} [separadorMiles=""] Separador de miles
         * @returns {string} Número formateado o cadena vacía si no es un número
         *
         * @version 2014-07-18
         */
        function number_format(numero, decimales, separador_decimal, separador_miles){ // v2007-08-06
            numero=parseFloat(numero);
            if(isNaN(numero)){
                return "";
            }

            if(decimales!==undefined){
                // Redondeamos
                numero=numero.toFixed(decimales);
            }

            // Convertimos el punto en separador_decimal
            numero=numero.toString().replace(".", separador_decimal!==undefined ? separador_decimal : ",");

            if(separador_miles){
                // Añadimos los separadores de miles
                var miles=new RegExp("(-?[0-9]+)([0-9]{3})");
                while(miles.test(numero)) {
                    numero=numero.replace(miles, "$1" + separador_miles + "$2");
                }
            }
            
            return numero;
        }

        /*funcion para cambil campo signature de el campo signature*/
        function cambiar_valor_form_payu_moneda_valida(id,cod_anuncio){
            
           var val =document.getElementById("num_val_crip_moneda_"+id).value;
           var cant=document.getElementById("num_cantidad_moneda_"+id).value;
           var marg=document.getElementById("hd_margen_gananacia_"+id).value;
           var t=parseFloat(cant)/parseFloat(val);
           document.getElementById("h5Total_"+id).value=t;
           document.getElementById("hdh5_total_"+id).value=t;
           document.getElementById("h5Total_"+id).innerHTML=number_format(t,2,",",".");
           document.getElementById("hd_valor_venta_"+id).value=cant;
           document.getElementById("btn_comprar_"+id).style.display='none'; 


          //tengo que hacer una peticion a la api de coin market para consultar elnuevo valor 
          peticion_ajax("get","obtener_valor_moneda_valida/"+document.getElementById("id_crip_moneda_"+id).value+"/"+document.getElementById("hd_mon_valido_"+id).value,function(rs){
               
                //Calculo d eel valor por la moneda seleccionada pero no autorizada
                document.getElementById("span_total_a_pagar_"+id).innerHTML=number_format(cant,2,",",".");

                console.log(rs);                                
                console.log(parseFloat(rs.quotes[document.getElementById("hd_mon_valido_"+id).value].price));
                console.log(number_format(parseFloat(document.getElementById("hdh5_total_"+id).value),2,"."," "));
                //cambio el valor de la moneda permitida
                var tt=number_format(parseFloat(rs.quotes[document.getElementById("hd_mon_valido_"+id).value].price*number_format(parseFloat(document.getElementById("hdh5_total_"+id).value),2,"."," "),10,"."," "));
                document.getElementById("stValorMonedaValida_"+id).innerHTML=number_format(tt,2,".",",")+" "+document.getElementById("hd_mon_valido_"+id).value;
                
                document.getElementById("hd_pre_mon_valido"+id).value=number_format(tt,2,".","");




                var hs=cod_anuncio+"/"+number_format(tt,2,".","")+"/"+document.getElementById("hd_mon_valido_"+id).value+"/"+id_usuario+"/"+t;
                //peticion para el hash
                peticion_ajax("get","hash_anuncio/"+hs,function(rs){
                        document.getElementById('msnEspera_'+id).innerHTML="";
                       
                        document.getElementById("hd_signature_"+id).value=rs.valor;
                        document.getElementById("currency_"+id).value=document.getElementById("hd_mon_valido_"+id).value;
                        document.getElementById("hd_valor_venta_"+id).value=number_format(tt,2,".","");
                        //document.getElementById("hd_description_"+id).value=document.getElementById("hd_description_"+id).value.split(" cant # " )[0]+" cant # " +number_format(t,2,",",".");
                        document.getElementById("btn_comprar_"+id).style.display=''; 
 
                      });  

          });
          





        }
        /*funcion que se genera cuando se hace un cambio en el campo de moneda para los anuncios que nos son permitidos para comprar en la moneda ofertada por el anunciante*/
        function cambiar_moneda_valida(id,cod_anuncio,moneda){
          document.getElementById("hd_mon_valido_"+id).value=moneda;
          mostrar_cargando("msnEspera_"+id,10,"Cargando ...");
          cambiar_valor_form_payu_moneda_valida(id,cod_anuncio);
        }
        /**
         * Funcion para crear el hash necesario para enviar peticion payu
         * @param  {[type]} id          [description]
         * @param  {[type]} cod_anuncio [description]
         * @param  {[type]} moneda      [description]
         * @return {[type]}             [description]
         */
        function cambiar_valor_form_payu(id,cod_anuncio,moneda){
          var val =document.getElementById("num_val_crip_moneda_"+id).value;
          var cant=document.getElementById("num_cantidad_moneda_"+id).value;
          var t=parseFloat(cant)/parseFloat(val);
          
          var hs="hash_anuncio/"+cod_anuncio+"/"+cant+"/"+moneda+"/"+id_usuario+"/"+t;
          
          document.getElementById("hd_valor_venta_"+id).value=cant;
          document.getElementById("btn_comprar_"+id).style.display='none'; 
          mostrar_cargando("h5Total_"+id,10,"Calculando valor ...");
          peticion_ajax("get",hs,function(rs){
            document.getElementById("span_total_a_pagar_"+id).innerHTML=number_format(cant,2,",",".");

            document.getElementById("hd_signature_"+id).value=rs.valor;
            //document.getElementById("hd_description_"+id).value=document.getElementById("hd_description_"+id).value.split(" cant # " )[0]+" cant # " +number_format(t,2,",",".");
            document.getElementById("h5Total_"+id).value=t;
            document.getElementById("hdh5_total_"+id).value=t;
            document.getElementById("h5Total_"+id).innerHTML=number_format(t,2,",",".")+" ";
            document.getElementById("btn_comprar_"+id).style.display=''; 
          });
        }
        /**
         * Funcion para registrar la compra de monedas
         * @param  {[type]} id          [description]
         * @param  {[type]} cod_anuncio [description]
         * @param  {[type]} moneda      [description]
         * @return {[type]}             [description]
         */
        function registro_compra(id,cod_anuncio,moneda){
          document.getElementById("msnEspera_compra_"+id).classList.remove('text-red');
          document.getElementById("msnEspera_compra_"+id).style.display='none';
         
          
          if(Number(document.getElementById("num_cantidad_moneda_"+id).value) > Number(document.getElementById("num_cantidad_moneda_"+id).max) 
           ||
            Number(document.getElementById("num_cantidad_moneda_"+id).value) < Number(document.getElementById("num_cantidad_moneda_"+id).min)){

            document.getElementById("msnEspera_compra_"+id).classList.add('text-red');
            document.getElementById("msnEspera_compra_"+id).style.display='';
            document.getElementById("msnEspera_compra_"+id).innerHTML='Debes ingresar un valor entre $'+number_format(Number(document.getElementById("num_cantidad_moneda_"+id).min),2,',','.')+' y $'+number_format(Number(document.getElementById("num_cantidad_moneda_"+id).max),2,',','.');
            return false;
          }
          var val =document.getElementById("num_val_crip_moneda_"+id).value;
          var cant=document.getElementById("num_cantidad_moneda_"+id).value;
          var t=number_format(parseFloat(cant)/parseFloat(val),2,',','.')
          
          
          var hs="registrar_compra_anuncio/"+cod_anuncio+"/"+cant+"/"+moneda+"/"+id_usuario+"/"+number_format(parseFloat(cant)/parseFloat(val),2,'.',',');
          
          mostrar_cargando("msnEspera_compra_"+id,10,"Calculando valor ...");
          peticion_ajax("get",hs,function(rs){
            
    
            
            document.getElementById("hdh5_total_"+id).value=number_format(parseFloat(cant)/parseFloat(val),2,'.',',');
            document.getElementById("hd_valor_venta_"+id).value=document.getElementById('num_cantidad_moneda_'+id).value;
            document.getElementById("msnEspera_compra_"+id).innerHTML='';
            document.getElementById("span_total_a_pagar_"+id).innerHTML=number_format(document.getElementById('num_cantidad_moneda_'+id).value,2,',','.');
            
            document.getElementById("h5Total_"+id).innerHTML=number_format(parseFloat(cant)/parseFloat(val),2,'.',',');
            document.getElementById("msnEspera_compra_"+id).style.display='none';
            document.getElementById("hd_cupon"+id).value=document.getElementById("num_cantidad_moneda_"+id).value;
            calcular_valores_de_medios_de_pago_compra(Number(document.getElementById("hd_cupon"+id).value),id);
            

            
            
          });
        }
        /*funcion para cambiar el total de compra*/
        function cambiar_valor_form_compra(id,cod_anuncio,moneda){
          var val =document.getElementById("num_val_crip_moneda_"+id).value;
          var cant=document.getElementById("num_cantidad_moneda_"+id).value;
          var t=parseFloat(val)*parseFloat(cant);
          document.getElementById("h5Total_"+id).value=t;
          document.getElementById("h5Total_"+id).innerHTML=number_format(t,2,",",".")+" "+moneda;
          document.getElementById("hdh5_total_"+id).value=t;
        }
        /*funcion para cambiar el es estado de un anuncio*/
        function cambiar_estado(id,e){
          document.getElementById("h5_estado_"+id).innerHTML="";
          mostrar_cargando("h5_estado_"+id,5,"Cambiando...");
          peticion_ajax("get","cambiar_estado_anuncio/"+id+"/"+e.value,function(rs){
              
              document.getElementById("h5_estado_"+id).innerHTML=rs.respuesta;
          });
        }
        /**
         * [funcion para mostrar cargando luego de enviar la peticion a el servidor]
         * @param  {[type]} el [description]
         * @return {[type]}    [description]
         */
        function mostrar_cargando(el,width,msn){
          $('#'+el).html('<div class="loading text-green"><img src="https://k46.kn3.net/taringa/C/7/8/D/4/A/vagonettas/5C9.gif" width="'+width+'" alt="loading" /><br/>'+msn+'</div>');
        }
        /**
         * Funcion que registra el wallet del cliente desde el input text
         * @param  {[type]} e [description]
         * @return {[type]}   [description]
         */
        function registrar_wallet(e,id_ad){
          mostrar_cargando("msnEspera_"+id_ad,10,"Estamos registrando el wallet, una vez finalizado el proceso habilitaremos el botón de compra ...");
           
           var val =document.getElementById("num_val_crip_moneda_"+id_ad).value;
           var cant=document.getElementById("num_cantidad_moneda_"+id_ad).value;
           
           var t=parseFloat(cant)/parseFloat(val);
           document.getElementById("h5Total_"+id_ad).value=t;
           document.getElementById("hdh5_total_"+id_ad).value=t;
           document.getElementById("h5Total_"+id_ad).innerHTML=number_format(t,2,",",".");
           document.getElementById("hd_valor_venta_"+id_ad).value=cant;
           
          var wallet;
          if(document.getElementById("ad_form_"+id_ad).elements.codigo_wallet.value != ""){
            wallet=document.getElementById("ad_form_"+id_ad).elements.codigo_wallet.value;
          }
          document.getElementById("btn_comprar_"+id_ad).disabled=true;
          peticion_ajax("post","registrar_wallet/"+id_ad,function(rs){
            console.log(rs);
            document.getElementById("msnEspera_"+id_ad).innerHTML=rs.mensaje;
            if(rs.respuesta){
              document.getElementById("btn_comprar_"+id_ad).disabled=false;
            }
          },{"datos":wallet,"valor_moneda":document.getElementById("num_cantidad_moneda_"+id_ad).value,"cantidad_moneda_comprada":t});
          //"datos":document.getElementById("ad_form_"+id).elements.codigo_wallet
        }

        function registrar_wallet_transaccion_realizada(e,id_ad,id){ 
          //alert(id_ad);
           mostrar_cargando("msnEspera_"+id,10,"Estamos registrando el wallet.");
           wallet=document.getElementById("ad_form_"+id_ad).elements.codigo_wallet.value;
          peticion_ajax("post","registrar_wallet_transaccion_realizada/"+id_ad,function(rs){
            console.log(rs);
            document.getElementById("msnEspera_"+id).innerHTML=rs.mensaje;
            if(rs.respuesta){
              //document.getElementById("btn_registro_wallet_"+id_ad).disabled=true;
            }
          },{"codigo_wallet":wallet});

        }
        /**
         * Funcion para el obj data table desde url
         * @return {[type]} [description]
         */
        function filtro_url (obj) {
            $(obj).DataTable().search(
                window.location.search.split("=")[1],
                true,                    
            ).draw();
        }
        /*
        Funcion para realizar login
         */
        function login(id,event){
            //se ejecurta solo si es enter
            if(event != undefined && event.which == 13 || event.keyCode == 13){
              var data=$('#formLogin_'+id).serializarFormulario();  
              enviar_peticion_login(id,data);
            }else if(event==false){
              var data=$('#formLogin_'+id).serializarFormulario();
              enviar_peticion_login(id,data);
            }        
        }
        /**
         * FUNCION PARA ENVIAR PETICION DE LOGIN
         * @param  {[type]} id   [description]
         * @param  {[type]} data [description]
         * @return {[type]}      [description]
         */
        function enviar_peticion_login(id,data){
          mostrar_cargando("error_login_"+id,10,"Estamos validando un momento, por favor...");
          $.ajax({
              type: "POST",
              url: "{{route('login')}}",
              data: data,
              success: function(rs){
                
                location.reload();
              },
              error:function(rs){
                console.log(rs);
                console.log(rs.responseText);
                console.log(JSON.parse(rs.responseText).errors.email);
                //alert(JSON.parse(rs.responseText).errors.email);
                document.getElementById('error_login_'+id).innerHTML=JSON.parse(rs.responseText).errors.email;
              },
              dataType: 'html'
            });
        }
  //funcion que extiende Js y serializa un formulario
  $.fn.serializarFormulario = function()
      {
      var o = {};
      console.log(this);

      if(this[0]!=undefined){
        var elementos=this[0].elements;
        for(var e in elementos){
          console.log(elementos[e].required);
          if(elementos[e].required==true && elementos[e].value ==""){
            elementos[e].style.borderColor="blue";
            return false;
          }else if(elementos[e].required!=undefined){
            elementos[e].style.borderColor="";
          }
        }

        var a = this.serializeArray();

        $.each(a, function() {


           if (o[this.name]) {


               if (!o[this.name].push) {
                   o[this.name] = [o[this.name]];
               }
                console.log(this.name);

               o[this.name].push(this.value || '');
           } else {

                o[this.name] = this.value || '';

           }


        });
        return o;
      }else{
        return false;
      }
  };
    /**
   * [Funcion para canjear los cupones de compra]
   * @param  {[type]} e  [description]
   * @param  {[type]} id [description]
   * @return {[type]}    [description]
   */
  function canjear_cupon_compra(e,id){  
    
    if('{{auth()->user()}}'!=null){
      if(e.value!=""){
          mostrar_cargando("sp_espera_cupon"+id,5,"Verificando cupón ...");
          
          peticion_ajax('POST','canjear_cupon_compra',
                        function(e){
              //success
            if(e.respuesta){
              document.getElementById('div_cupon_menor_'+id).style.display='none';
              document.getElementById('sp_espera_cupon'+id).innerHTML=e.mensaje;
              document.getElementById('sp_espera_cupon'+id).classList.remove('text-red'); 
              document.getElementById('sp_espera_cupon'+id).classList.add('text-success');  
              
              
              document.getElementById('hd_cupon'+id).value=e.nuevo_valor;
              document.getElementById('hd_valor_venta_'+id).value=number_format(e.nuevo_valor,0,'','');
              
              document.getElementById('span_total_a_pagar_'+id).innerHTML=number_format(e.nuevo_valor,0,',','.');

              if(e.hash_payu!=false){
                //document.getElementById('hd_signature_'+id).value=e.hash_payu; 
                //document.getElementById('btn_comprar_'+id).disabled=false;
              }         
              
              if(e.recarga_gratis){
                //document.getElementById('btn_comprar_'+id).disabled=true;
                document.getElementById('spTotalPagoTramite_'+id).innerHTML=number_format(0,0,',','.');
              }

              if(e.acumulable=='0'){
                document.getElementById('txt_cupon_'+id).disabled=true;
                document.getElementById('sp_espera_cupon'+id).innerHTML+=" Este cupón no es acumulable  con otras promociones"
              }
            }else{
              if(e.mensaje=='valor_tramite_es_mayor'){
                document.getElementById('div_cupon_menor_'+id).style.display='';
                document.getElementById('sp_espera_cupon'+id).innerHTML="";
              }else{
                document.getElementById('sp_espera_cupon'+id).innerHTML=e.mensaje;
                document.getElementById('sp_espera_cupon'+id).classList.remove('text-success'); 
                document.getElementById('sp_espera_cupon'+id).classList.add('text-red');  
              }
              
              
            }
            

            },{"cupon":e.value,
               'usuario_que_redime':document.getElementById('user_id').value,
               'ref_pago':document.getElementById("referenceCode_"+id).value,
               'valor_pago':document.getElementById('hd_valor_venta_'+id).value,
               'valor_comprado':document.getElementById('num_cantidad_moneda_'+id).value,
               'moneda_pago':document.getElementById('currency_'+id).value,
               'id_anuncio':id,
               'codigo_anuncio':document.getElementById("referenceCode_"+id).value,
               'validar':document.getElementById("validar_"+id).value,
               'moneda_comprada':document.getElementById('hdh5_total_'+id).value
                       },
            function(e){
              //error
            document.getElementById('sp_espera_cupon'+id).innerHTML="Este cuṕón no es válido";
            document.getElementById('sp_espera_cupon'+id).classList.remove('text-success'); 
            document.getElementById('sp_espera_cupon'+id).classList.add('text-red');
            
            console.log(e)
          }); 
        }else{
          document.getElementById('sp_espera_cupon'+id).innerHTML="";
          
          
        }
    }
    
  }
  function descontar_recargar(id_ventana,id_anuncio,costo,tipo){
    
   
    
       $("#"+id_ventana).addClass( "in" );
     
       $("#"+id_ventana).css({"display": "block", "padding-right": "21px"});

         donde_estoy(id_anuncio); 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         
         if(tipo!=false){
              
              valor=document.getElementById("num_cantidad_moneda_"+id_anuncio)
              if(valor!=null){
                  valor=valor.value;    
              }else{
                  valor=0;
              }
              var tot=document.getElementById('hdh5_total_'+id_anuncio);
              if(tot!=null){
                  tot=tot.value;
              }else{
                  tor=0;
              }
            $.ajax({
               type: "GET",
               url: url_global+"/descontar_recargas/"+id_anuncio+"/"+costo+"/"+user_id.value+"/"+tipo+"/"+tot+"/"+valor,
               dataType: "json",
               success: function(result){           
                 _id_anuncio=id_anuncio;
                 if(result.ad_visible==false){
                  $("#btn_info_"+id_anuncio).css({"display":"none"}); 
                  $("#btn_compra_"+id_anuncio).css({"display":"none"}); 
                  
                 }else{
                  if(tipo=="info"){
                    
                    //document.getElementById("btn_info_"+id_anuncio).classList.remove('btn-success');
                    //document.getElementById("btn_info_"+id_anuncio).classList.add('btn-primary');
                    //document.getElementById("btn_info_"+id_anuncio).innerHTML="VISTO";
                    $("#btn_info_"+id_anuncio).css({"display":"none"}); 
                    $("#anc_"+id_anuncio).css({"display":"block"});
                    //
                    /*document.getElementById("anc_"+id_anuncio).style.display='block';
                    document.getElementById("btn_info_"+id_anuncio).style.display='none';*/
                    console.log(document.getElementById("anc_"+id_anuncio));
                    console.log(document.getElementById("btn_info_"+id_anuncio));    
                  }
                  
                 }               
               },
             error: function(err){
                 console.log(err);
             }
           });
         }
            
  }

  function mostrar_ventana_login(id_ventana,id_anuncio,costo){
    $("#"+id_ventana).css({"display": "block", "padding-right": "21px"});
  }

  function salir_modal(id){
    $("#"+id).removeClass( "in" );
      $("#"+id).css({"display": "none"}); 
  }
  $( "#btn_sin_recarga, #sp_salir_sin_recarga" ).click(function(){
    // Holds the product ID of the clicked element
    
    
  });
  /**
   * Funcion para enviar email con informacion de tipo de pago seleccionado
   * @param  {[type]} e  [description]
   * @param  {[type]} id [description]
   * @return {[type]}    [description]
   */
  function validar_tipo_pago(e,id){
    
    document.getElementById('btn_comprar_'+id).disabled=false;
    document.getElementById('hd_tipo_pago'+id).value=e.value;
    calcular_valores_de_medios_de_pago_compra(Number(document.getElementById('hd_cupon'+id).value),id);

  }
   /**
   * Funcion para enviar email con informacion de tipo de pago seleccionado
   * @param  {[type]} e  [description]
   * @param  {[type]} id [description]
   * @return {[type]}    [description]
   */
  function validar_tipo_pago_recargas(e,id){
    
    document.getElementById('btn_recarga').disabled=false;
    document.getElementById('hd_tipo_pago').value=e.value;
    calcular_valores_de_medios_de_pago_recarga(Number(document.getElementById('hd_val_recarga').value));


  }
  /**
   * Funcion para enviar la confirmación del tipo de pago seleccionado por el cliente
   * @param  {[type]} id [description]
   * @return {[type]}    [description]
   */
  function enviar_registro_compra(id){
     mostrar_cargando("msnMensajeCompra_"+id,5,"Registrando medio de pago ...");
     
     peticion_ajax('POST',
                  'registrar_medio_de_pago',
                  function(e){
                    //success
                    if(e.respuesta){
                      
                      document.getElementById('msnMensajeCompra_'+id).classList.remove('text-red');
                      document.getElementById('msnMensajeCompra_'+id).  classList.add('text-success');    
                      document.getElementById('msnMensajeCompra_'+id).innerHTML=e.mensaje;
                      if(document.getElementById('anc_pendiente_'+id)!=null){
                          document.getElementById('anc_pendiente_'+id).href="{{config('app.url')}}"+'/ver_mis_compras/'+id_usuario+'/?id='+e.refpago;
                          
                      }
                      
                    }else{
                      document.getElementById('msnMensajeCompra_'+id).classList.remove('text-success');  
                      document.getElementById('msnMensajeCompra_'+id).classList.add('text-red');  
                      document.getElementById('msnMensajeCompra_'+id).innerHTML=e.mensaje;
                    }
                    
                  }
                  ,{ 
                     //datos
                     'valor_real':document.getElementById('num_cantidad_moneda_'+id).value,
                     'ref_pago':document.getElementById('referenceCode_'+id).value,
                     'id_anuncio':id,
                     'usuario':id_usuario,
                     'total_a_pagar':document.getElementById('hd_valor_venta_'+id).value,
                     'tipo_pago':document.getElementById('hd_tipo_pago'+id).value,
                     'sobrecosto':document.getElementById("hd_val_sobrecosto_"+id).value
                   },
                  function(e){
                  //error
                  document.getElementById('msnMensajeCompra_'+id).innerHTML="";
                  document.getElementById('msnMensajeCompra_'+id).classList.remove('text-success');  
                  document.getElementById('msnMensajeCompra_'+id).classList.add('text-red');
                  
                  console.log(e)
                }); 
  }
   /**
    * Funcion para enviar la seleccion de medio de pago por parte del cliente
    * @param  {[type]} id [description]
    * @return {[type]}    [description]
    */
   function enviar_registro_recarga(id){
     mostrar_cargando("msnMensajeCompra_"+id,5,"Registrando medio de pago ...");
     
     peticion_ajax('POST',
                  'registrar_medio_de_pago_recarga',
                  function(e){
                    //success
                    if(e.respuesta){
                      
                      document.getElementById('msnMensajeCompra_'+id).classList.remove('text-red');
                      document.getElementById('msnMensajeCompra_'+id).  classList.add('text-success');    
                      document.getElementById('msnMensajeCompra_'+id).innerHTML=e.mensaje;
                    }else{
                      document.getElementById('msnMensajeCompra_'+id).classList.remove('text-success');  
                      document.getElementById('msnMensajeCompra_'+id).classList.add('text-red');  
                      document.getElementById('msnMensajeCompra_'+id).innerHTML=e.mensaje;
                    }
                    
                  }
                  ,{ 
                     //datos
                     'valor_real':document.getElementById('num_valor_recarga').value,
                     'ref_pago':document.getElementById('refRecarga').value,
                     'usuario':id_usuario,
                     'total_a_pagar':document.getElementById('hd_val_a_pagar').value,
                     'tipo_pago':document.getElementById('hd_tipo_pago').value
                   },
                  function(e){
                  //error
                  document.getElementById('msnMensajeCompra_'+id).innerHTML="";
                  document.getElementById('msnMensajeCompra_'+id).classList.remove('text-success');  
                  document.getElementById('msnMensajeCompra_'+id).classList.add('text-red');
                  
                  console.log(e)
                }); 
  }
  /**
   * Funcion para enviar peticion ajax para confirmar pago 
   * @return {[type]} [description]
   */
  function confirmar_pago_comprador(id){
      var datos=$('#formConfirmarPago'+id).serializarFormulario();

      mostrar_cargando("lblMsn"+id,5,"Procesando solicitud ...");
      
      if(datos.numero_transaccion==""){

        document.getElementById('lblMsn'+id).classList.add('text-red');
        console.log(document.getElementById('lblMsn'+id).classList);
        document.getElementById('lblMsn'+id).innerHTML="Por favor ingresa un numero de transacción";

        return false;
        
      }

      peticion_ajax('POST',
                  'confirmar_pago_comprador',
                  function(e){
                    //success
                   
                    if(e.respuesta){
                      document.getElementById('lblMsn'+id).classList.remove('text-red');
                      document.getElementById('lblMsn'+id).classList.add('text-success');
                      document.getElementById('lblMsn'+id).innerHTML=e.mensaje;

                    }else{
                      document.getElementById('lblMsn'+id).classList.remove('text-success');
                      document.getElementById('lblMsn'+id).classList.add('text-red');
                      document.getElementById('lblMsn'+id).innerHTML=e.mensaje;
                    }
                  }
                  ,datos,
                  function(e){
                  //error
                  
                }); 

  }
  /**
   * Funcion para confirmar el pago de una recarga por transaccion bancaria
   * @param  {[type]} id [description]
   * @return {[type]}    [description]
   */
  function confirmar_pago_recarga(id){
      var datos=$('#formConfirmarPago').serializarFormulario();

      mostrar_cargando("lblMsn",5,"Procesando solicitud ...");
      
      if(datos.numero_transaccion==""){

        document.getElementById('lblMsn').classList.add('text-red');
        console.log(document.getElementById('lblMsn').classList);
        document.getElementById('lblMsn').innerHTML="Por favor ingresa un numero de transacción";

        return false;
        
      }

      peticion_ajax('POST',
                  'confirmar_pago_recarga',
                  function(e){
                    //success
                   
                    if(e.respuesta){
                      document.getElementById('lblMsn').classList.remove('text-red');
                      document.getElementById('lblMsn').classList.add('text-success');
                      document.getElementById('lblMsn').innerHTML=e.mensaje;

                    }else{
                      document.getElementById('lblMsn').classList.remove('text-success');
                      document.getElementById('lblMsn').classList.add('text-red');
                      document.getElementById('lblMsn').innerHTML=e.mensaje;
                    }
                  }
                  ,datos,
                  function(e){
                  //error
                  
                }); 

  }
  /**
   * Funcion para cambiar el valor de la recarga en mensajes
   * @param  {[type]} e [description]
   * @return {[type]}   [description]
   */
  function cambiar_valor_recarga(e){
    //document.getElementById('msnValorAPagar').innerHTML=number_format(e.value,0,',','.');
    if(Number(e.value)>=20000){
      document.getElementById('hd_val_recarga').value=number_format(e.value,0,'','');
      calcular_valores_de_medios_de_pago_recarga(Number(e.value));  
    }else{
      document.getElementById("msnMensajeCompra_"+id_usuario).innerHTML="El valor mínimo de la recarga es $20.000";
      e.value=20000;
      //document.getElementById("btn_recarga").disabled=true;
    }
    


  }
  /**
   * Funcion para calcular el valor a pagar de acuerdo al valor a recargar 
   * @param  {[type]} valor [description]
   * @return {[type]}       [description]
   */
  function calcular_valores_de_medios_de_pago_recarga(valor){

    var ele=document.getElementsByName("tipo_pago");
    var tipo="";
    var total_a_pagar=0;
    for(var l in ele){
      if(ele[l].checked){
        tipo=Number(ele[l].value);
      }
    }
    switch(tipo){
      case 1:
        //transferencia
        total_a_pagar=valor+(valor*4/1000);
        
        break;
      case 2 : 
        //efectivo 
        total_a_pagar=valor;
        break;
      case 3:
        //consignacion  
        total_a_pagar=valor+(valor*4/1000)+13000;        
        break;
      default:
        total_a_pagar=valor;
        break;    
    }
    var total_a_pagar_consig=Number(valor)+(Number(valor)*4/1000)+13000;
    var total_a_pagar_trans=Number(valor)+(Number(valor)*4/1000);      
    document.getElementById('spPagoCons').innerHTML=number_format(total_a_pagar_consig,0,',','.');
    document.getElementById('spPagoTrans').innerHTML=number_format(total_a_pagar_trans,0,',','.');
    document.getElementById('msnValorAPagar').innerHTML=number_format(total_a_pagar,0,',','.');
    document.getElementById('hd_val_a_pagar').value=number_format(total_a_pagar,0,'','');
    document.getElementById('msnMensajeCompra_'+id_usuario).innerHTML="";
    
    
  }
    /**
   * Funcion para calcular el valor a pagar de acuerdo al valor a comprar 
   * @param  {[type]} valor [description]
   * @return {[type]}       [description]
   */
  function calcular_valores_de_medios_de_pago_compra(valor,id){

    var ele=document.getElementsByName("tipo_pago_"+id);
    var tipo="";
    var total_a_pagar=0;
    for(var l in ele){
      if(ele[l].checked){
        tipo=Number(ele[l].value);
      }
    }
    var sobrecosto=0;
    switch(tipo){
      case 1:
        //transferencia
        total_a_pagar=valor+(valor*4/1000);
        sobrecosto=(valor*4/1000);
        break;
      case 2 : 
        //efectivo 
        total_a_pagar=valor;
        break;
      case 3:
        //consignacion  
        total_a_pagar=valor+(valor*4/1000)+13000;        
        sobrecosto=(valor*4/1000)+13000;
        break;
      default:
        total_a_pagar=valor;
        break;    
    }
    var total_a_pagar_consig=(Number(valor)*4/1000)+13000;
    var total_a_pagar_trans=(Number(valor)*4/1000);      
    document.getElementById('spPagoCons_'+id).innerHTML=number_format(total_a_pagar_consig,0,',','.');
    document.getElementById('spPagoTrans_'+id).innerHTML=number_format(total_a_pagar_trans,0,',','.');
    document.getElementById('span_total_a_pagar_'+id).innerHTML=number_format(total_a_pagar,2,',','.');
    document.getElementById('hd_val_sobrecosto_'+id).value=number_format(sobrecosto,0,'','');
    //document.getElementById('msnMensajeCompra_'+id_usuario).innerHTML="";
    
    
  }

  function subir_archivo_certificacion_pago_recarga(id,e){
                    //e.preventDefault();
                      mostrar_cargando("lblMsn",10,"Cargando ...");
                      var Token =  '{{csrf_token()}}';
                      var formData = new FormData();
                      formData.append("file", $('#'+e.id).get(0).files[0]);
                      formData.append("Token", Token);

                      // Send the token every ajax request
                      $.ajaxSetup({
                          headers: { 'X-CSRF-Token' : Token }
                      });

                          $.ajax({        
                                  url: "{{config('app.url')}}"+"/subir_certificado_pago_recarga/"+id,
                                  method: 'POST',
                                  data: formData,
                                  processData: false,
                                  contentType: false,
                                  cache: false,
                                  success: function(data) {
                                      document.getElementById("lblMsn").innerHTML=data.mensaje;
                                  },
                                  error:function(data){
                                    console.log(data);
                                    if(data.responseJSON.message=="The given data was invalid."){
                                      document.getElementById("lblMsn").innerHTML="El formato del archivo debe ser .pdf o una imagen de tipo .png, jpg o jpeg";  
                                    }else{
                                      document.getElementById("lblMsn").innerHTML=data.responseJSON.message;
                                    }
                                    
                                  }
                          });
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
 
     /**
      * Funcion para desplazar hacia la izq la tabla de medios de pagos
      * @return {[type]} [description]
      */
    function mover_izq(){
      var elem=document.getElementsByClassName('table-responsive');
      for(var f in elem){
        elem[f].scrollLeft+=20;
      }
      
    }
  
</script>
