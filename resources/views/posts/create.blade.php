@extends('layouts.app')

@section('head')
  {{-- content --}}
@endsection


@section('content')
        
      <body class="server-prod session-anonymous">
        <div class="container">
          <h1 class="text-primary">Crea un anuncio para vender o comprar criptomonedas</h1>


          <h3 class="text-success">Normas y requisitos de anuncios</h2>

           
        <ul>
              <li>Determinados métodos de pago requieren tener la identificación verificada antes de hacer visibles los anuncios.</li>
              <li>Cada operación completada cuesta a los anunciantes un <strong class="text-red">{{$porcentaje[0]->valor}} %</strong> del importe total de la operación.
              </li>
              <li>
                  Una vez abierta una operación, el precio no se puede cambiar, excepto los casos en los que hay un error evidente en el precio.
              </li>
              <li>
                    No se permite comprar ni vender criptomendas en nombre de otras personas (correduría).
              </li>
              <li>
                    Solo puede usar cuentas de pago registradas a su propio nombre (<b>¡no se aceptan pagos de terceros!</b>).</li> <li>Debe especificar sus datos de pago en el anuncio o en el chat de la operación.
               </li>
               <li>
                      Todas las comunicaciones se deben llevar a cabo en <a href="/">{{config('app.name')}}</a>.
               </li>
                <li>
                        Los métodos de pago marcados con la etiqueta <strong>Alto riesgo</strong> suponen un <strong>riesgo significante de fraude</strong>. Tenga cuidado y siempre verifique la identidad de sus socios en las operaciones al utilizar los métodos de pago de alto riesgo.
                </li>
        </ul>
           
             

              <noscript>
          <div class="row">
              <div class="col-md-12">
                  <div class="alert alert-danger">
                      Debe activar JavaScript para poder completar este formulario.
                  </div>
              </div>
          </div>
              </noscript>

            <div class="row">


               <h3 class="text-success">
                Para que tus anuncios sean visibles, debes tener saldo en la cuenta de recarga.
                Recuerda que cada click de tu anuncio tiene un valor de: <span class="text-primary">$</span> <b class="text-red">{{number_format(auth()->user()->costo_clic,2,",",".")}}</b> <span class="text-primary">COP</span>
              </h3>
              <h2 class="text-orange">BALANCE DE RECARGA: <span class="text-primary">$</span> <b class="text-red" >{{$r = ($recarga != null) ? number_format($recarga->valor,2,",",".") : 0 }}</b> <span class="text-primary">COP</span></h2>


              <div id="identification_hint" class="col-md-12 display-none">

                <div class="alert alert-info">

                    <h3>
                      <i class="fa fa-info-circle"></i>
                      <b class="text-red">¿Quieres aumentar la visibilidad de tus anuncios?</b>, los anuncios son ordenados orgánicamente situando primero a los usuarios que tengan un mayor valor de recarga total
                    </h3>
                </div>

              </div>
            </div>

            <legend class="text-success"><b>Crea tu anuncio</b></legend>
            <div class="row " id="">
                <div class="col-md-7 two-col-help-text">
                  <strong><b class="text-red">¿Qué tipo de anuncio deseas crear?</b></strong>
                </div>
                <br>
                <div id="" class="col-md-2 label-col form-group">
                  <label for="" class="control-label requiredField text-orange"><strong>¡Deseo! ...</strong></label>
                </div>
                
                <div class="col-md-3">
                  <div class="controls ">
                    <label class="radio text-primary"> <input type="radio" name="opera" id="venta" value="venta"  class="inicial add-adform-radio">Vender Criptomonedas</label>
                    <label class="radio text-success"> <input type="radio" name="opera" id="compra" value="compra"  class="inicial add-adform-radio">Comprar Criptomonedas</label>
                  </div>
                </div> <br>
                 
           </div>
            <br><br>
            <div id="div_anuncios" style="display: none">
                @include('posts.formanuncio')
            </div>

            <footer>
            </footer>
          </div>
      </body>
@endsection



@section('scripts')

<script>

$(document).ready(function() {

        $('#div_anuncios').css("display", "none");


          $("input[name=opera]").change(function () {
             $('#div_anuncios').css("display", "block");
              if($(this).val()=='venta'){
                $('#hd_tipo_anuncio').val("venta");
              }else{

                $('#hd_tipo_anuncio').val("compra");
              }
        });

});
</script>

<script>



$('#margen').on('change',function(e){

  var moneda =document.getElementById("sel_moneda").value;
  var crip=document.getElementById("sel_cripto").value;
  consultar_precio_moneda(crip,moneda);


});

//evento para moneda local
$('#sel_moneda').on('change', function(e) {
    
      mostrar_cargando('precio_mon',200,'Un momento, por favor...');

       var moneda =document.getElementById("sel_moneda").value;
       var crip=document.getElementById("sel_cripto").value;
       consultar_precio_moneda(crip,moneda);
      $('.modi').html(moneda);
      $('#hd_moneda').val(document.getElementById("sel_moneda").options[document.getElementById("sel_moneda").selectedIndex].innerHTML);
  });
//evento para cripto moneda
$('#sel_cripto').on('change', function(e) {
    
     mostrar_cargando('precio_mon',200,'Un momento, por favor...');

     var moneda =document.getElementById("sel_moneda").value;
     var crip=document.getElementById("sel_cripto").value;
     consultar_precio_moneda(crip,moneda);
     $('#hd_cripto').val(document.getElementById("sel_cripto").options[document.getElementById("sel_cripto").selectedIndex].innerHTML);
});





      /*funcion para calcular valores de moneda y ganancia*/
      function calcular_valores(precio){
               //el precio de la moneda
               console.log(precio);
               $('#precio_mon').html(number_format(precio,2,",","."));
               $('#hdPrecioMon').val(number_format(precio,2,".",""));
               // valor de ganancia
               var valor_ganacia=parseFloat($("#hdPrecioMon").val())*(parseFloat($("#margen").val())/100);
               $('#precio_ganancia').html(number_format(valor_ganacia,2,",","."));
               $('#por_gan_compra').val(number_format(valor_ganacia,2,".",""));
              console.log(valor_ganacia);
               // valor total preio + ganancia
               var valor_total=precio+valor_ganacia;
               console.log(valor_total);
               $('#st_valor_total_venta').html(number_format(valor_total,2,",","."));
               //$('#min_pre_mon').val(number_format(valor_total,2,",","."));
               document.getElementById('precio_minimo_moneda').value=number_format(valor_total,2,",",".");
               //document.getElementById('precio_minimo_moneda').value=number_format(valor_total,2,".","");
               formatear(document.getElementById('precio_minimo_moneda'),"precio_minimo_moneda_hd");
               $('#hd_valor_total_venta').val(number_format(valor_total,2,".",""));





}

        /*funcion consultar_precio_moneda
        @crip id moneda cript
        @moneda tipo de moneda fiduciaria

        */
       
        function consultar_precio_moneda(crip,moneda){

          peticion_ajax("get", "obtener_valor_moneda_valida/"+crip+"/"+moneda,function(rs){

              console.log(rs.quote[moneda].price);
              calcular_valores(rs.quote[moneda].price);
          });
        }

        function formatear(e,hd){
          console.log(e);
          console.log(e.value);
          var v=String(e.value).split(".");
          var vv="";
          //console.log(v);
          for(var i in v){
              vv+=v[i];
          }
          //console.log(vv);
          document.getElementById(e.id).value=number_format(vv,2,",",".");
          //document.getElementById(e.id).value=number_format(e.value,2,",",".");
          //document.getElementById(e.id).value=number_format(document.getElementById(hd).value,2,",",".");
          var num=e.value.split(",");
          var num_entero=num[0].split(".");
          var val="";
          for(var n in num_entero){
            val+=num_entero[n];
          }
          document.getElementById(hd).value=val+"."+num[1];
        }

        function publicar_anuncio(){
              var data=$('#ad-form').serializarFormulario();
              console.log(data);
              enviar_peticion_publicar_anuncio(data);
        }
        function enviar_peticion_publicar_anuncio(data){
          mostrar_cargando("msn_load",10,"Estamos registrando tu anuncio, danos un momento, por favor...");
          $.ajax({
              type: "POST",
              url: "{{route('anuncios.store')}}",
              data: data,
              success: function(rs){
                
                document.getElementById('msn_load').innerHTML=rs.mensaje;
                document.getElementById('msn_load').style.color = "#ff0000";
                document.getElementById("id_ad-place").value="";
                document.getElementById("id_ad-bank_name").value="";
                document.getElementById("margen").value="";
                document.getElementById("precio_minimo_moneda").value="";
                document.getElementById("id_ad-min_amount").value="";
                document.getElementById("id_ad-max_amount").value="";
                document.getElementById("id_ad-meeting_point").value="";
                document.getElementById("id_ad-other_info").value="";
                
                


              },
              error:function(rs){
                console.log(rs);
                console.log(rs.responseText);
                console.log(JSON.parse(rs.responseText).errors.email);
                //alert(JSON.parse(rs.responseText).errors.email);
                document.getElementById('msn_load').innerHTML=JSON.parse(rs.responseText).errors.email;
              }
              
            });
        }

</script>
@include('partials.googleplaces')
@endsection

