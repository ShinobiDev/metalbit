@extends('layouts.app')

@section('head')
  {{-- content --}}
@endsection


@section('content')
        
      <body class="server-prod session-anonymous">
        <div class="container">
          <h1>Cree un anuncio para vender o comprar criptomonedas</h1>


          <h3>Normas y requisitos de anuncios</h2>

            <p>
        <ul>
              {{-- <li>
                Para que se muestren sus anuncios, debe tener ciptomonedas en su cartera MetalBit. Necesita al menos 0,04 BTC para publicar anuncios con métodos de pago online o al menos 0,04 BTC para anuncios locales (operaciones en efectivo).
              </li> --}}
              <li>Determinados métodos de pago requieren tener la identificación verificada antes de hacer visibles los anuncios.</li>
              <li>Cada operación completada cuesta a los anunciantes un {{$porcentaje[0]->valor}}% del importe total de la operación.
                <!--<a href="/fees">Vea la lista de todas las comisiones en la página Comisiones</a>.-->
              </li>
              <li>
                  Una vez abierta una operación, el precio no se puede cambiar, excepto los casos en los que hay un error evidente en el precio.
              </li>
              <li>
                    No se permite comprar ni vender criptomendas en nombre de otras personas (correduría).
              </li>
              <li>
                    Solo puede usar cuentas de pago registradas a su propio nombre (¡no se aceptan pagos de terceros!).</li> <li>Debe especificar sus datos de pago en el anuncio o en el chat de la operación.
               </li>
               <li>
                      Todas las comunicaciones se deben llevar a cabo en <a href="/">MetalBit</a>.
               </li>
                <li>
                        Los métodos de pago marcados con la etiqueta <strong>Alto riesgo</strong> suponen un <strong>riesgo significante de fraude</strong>. Tenga cuidado y siempre verifique la identidad de sus socios en las operaciones al utilizar los métodos de pago de alto riesgo.
                </li>
        </ul>
            </p>
              <br>

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


               <h3>
                Para que tus anuncios sean visibles, debes tener saldo en la cuenta de recarga.
                Recuerda que cada click de tu anuncio tiene un valor de: $ {{number_format(auth()->user()->costo_clic,2,",",".")}} COP
              </h3>
              <h2>BALANCE DE RECARGA: $ {{number_format($recarga->valor,2,",",".")}} COP</h2>


              <div id="identification_hint" class="col-md-12 display-none">

                <div class="alert alert-info">

                    <h3>
                      <i class="fa fa-info-circle"></i>
                      ¿Quiere aumentar su visibilidad?, los anuncios son ordenados orgánicamente situando primero a los usuarios que tengan un mayor valor de recarga total
                    </h3>
                </div>

              </div>
            </div>

            <legend>Tipo de intercambio</legend>
            <div class="row " id="">
                <div id="" class="col-md-2 label-col form-group">
                  <label for="" class="control-label requiredField">Deseo...</label>
                </div>

                <div class="col-md-3">
                  <div class="controls ">
                    <label class="radio"> <input type="radio" name="opera" id="venta" value="venta"  class="inicial add-adform-radio">Vender Criptomonedas</label>
                    <label class="radio"> <input type="radio" name="opera" id="compra" value="compra"  class="inicial add-adform-radio">Comprar Criptomonedas</label>
                  </div>
                </div> <br>
                 <div class="col-md-7 two-col-help-text">
                  ¿Qué tipo de anuncio desea crear?. Si desea vender o comprar asegúrese de tener criptomonedas en su cartera de MetalBit.
               </div>
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

@include('partials.scripts')

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
              calcular_valores(rs.quotes[moneda].price);
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

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjK1P7ObTN9d1kZ8LTVU-mvoY8Uc2it1w&libraries=places&callback=iniciarApp"
        async defer></script>
<script src="{{asset('js/placesapi.js')}}"></script>




@endsection
