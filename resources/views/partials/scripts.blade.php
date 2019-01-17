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
      function peticion_ajax(metodo,url,func,datos){
              //debe ir como core y no public la url en producccion
             $.ajax({
                   type: metodo,
                   url: url_global+"/"+url,
                   dataType: "json",
                   data:datos,
                   success: function(result){
                         
                         func(result);
                   },
               error: function(err){
                   console.log(err);
               }
               });
          }
          /*Funcion tomada del sitio 
         * http://www.antisacsor.com/articulo/10_98_dar-formato-a-numeros-en-javascript
         * Para dar formato a los numeros*/
        /**
         * Da formato a un número para su visualización
         *
         * @param {(number|string)} numero Número que se mostrará
         * @param {number} [decimales=null] Nº de decimales (por defecto, auto); admite valores negativos
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
              
                               
                
                //cambio el valor de la moneda permitida
                var tt=number_format(parseFloat(rs.quotes[document.getElementById("hd_mon_valido_"+id).value].price),2,".","")*number_format(parseFloat(document.getElementById("hdh5_total_"+id).value),2,"."," ");
                document.getElementById("stValorMonedaValida_"+id).innerHTML=number_format(tt,2,".",",")+" "+
                document.getElementById("hd_mon_valido_"+id).value;

                document.getElementById("hd_pre_mon_valido"+id).value=number_format(tt,2,".","");




                var hs=cod_anuncio+"/"+document.getElementById("hd_pre_mon_valido"+id).value+"/"+document.getElementById("hd_mon_valido_"+id).value+"/"+id_usuario+"/"+t;
                //peticion para el hash
                peticion_ajax("get","hash_anuncio/"+hs,function(rs){

                       
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
            document.getElementById("hd_signature_"+id).value=rs.valor;
            //document.getElementById("hd_description_"+id).value=document.getElementById("hd_description_"+id).value.split(" cant # " )[0]+" cant # " +number_format(t,2,",",".");
            document.getElementById("h5Total_"+id).value=t;
            document.getElementById("h5Total_"+id).innerHTML=number_format(t,2,",",".")+" ";
            document.getElementById("btn_comprar_"+id).style.display=''; 
          });
        }
        /*funcion para cambiar el total de compra*/
        function cambiar_valor_form_compra(id,cod_anuncio,moneda){
          var val =document.getElementById("num_val_crip_moneda_"+id).value;
          var cant=document.getElementById("num_cantidad_moneda_"+id).value;
          var t=parseFloat(val)*parseFloat(cant);
          document.getElementById("h5Total_"+id).value=t;
          document.getElementById("h5Total_"+id).innerHTML=number_format(t,2,",",".")+" "+moneda;
         
        }
        /*funcion para cambiar el es estado de un anuncio*/
        function cambiar_estado(id){
          var rng=document.getElementById("rng_"+id).value;
          mostrar_cargando("h5_estado_"+id,10,"Un momento, por favor...");
           peticion_ajax("get","cambiar_estado_anuncio/"+id+"/"+rng,function(rs){
              console.log(rs);
              document.getElementById("h5_estado_"+id).innerHTML=rs.respuesta[0].estado_anuncio;
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

        function registrar_wallet_transaccion_realizada(e,id_ad){ 
           mostrar_cargando("msnEspera_"+id_ad,10,"Estamos registrando el wallet, una vez finalizado el proceso habilitaremos el botón de compra ...");
          peticion_ajax("post","registrar_wallet_transaccion_realizada/"+id_ad,function(rs){
            console.log(rs);
            document.getElementById("msnEspera_"+id_ad).innerHTML=rs.mensaje;
            if(rs.respuesta){
              document.getElementById("btn_comprar_"+id_ad).disabled=false;
            }
          },{"datos":wallet});

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
</script>