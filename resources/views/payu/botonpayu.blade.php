<div>
  <input   name="merchantId"    type="text"   value="{{trim($ad->merchantId)}}"   >
  <input name="accountId"     type="text"   value="{{trim($ad->accountId)}}" >
  <input id="hd_description_{{$ad->id}}" name="description"   type="text"   value="{{trim($ad->descripcion)}}"  >
  <input id="referenceCode_{{$ad->id}}" name="referenceCode" type="text"   value="{{$ad->cod_anuncio}}" >

  @if($ad->moneda != "BRL" && $ad->moneda != "CLP" && $ad->moneda != "COP" && $ad->moneda != "MXN" && $ad->moneda != "USD")
    <input id="hd_valor_venta_{{$ad->id}}" name="amount"        type="text"   value="{{ 
      number_format(((float)number_format($ad->limite_min / (float)number_format($ad->precio_moneda_sf,2,'.',''),2,'.',''))*number_format($ad->precio_moneda_usd_sf,2,'.',''),2,'.','')    
      }}"   >
      <input id="currency_{{$ad->id}}" name="currency"     type="text"   value="USD" >
  @else
    <input id="hd_valor_venta_{{$ad->id}}" name="amount"        type="text"   value="{{number_format($ad->limite_min ,0,'.','')
    }}"   >
    <input id="currency_{{$ad->id}}" name="currency"     type="text"   value="{{trim($ad->moneda)}}" >
  
  @endif 
  
  <input name="tax"           type="text"   value="0"  >
  <input name="taxReturnBase" type="text"   value="0" >
  <input id="hd_signature_{{$ad->id}}" name="signature"     type="text"   value="{{trim($ad->hash)}}"  >
  <input name="buyerEmail"    type="text"   value="{{trim(Auth::user()->email)}}" >
  <input name="responseUrl"    type="text"   value="{{config('app.url').trim($ad->resp)}}" >
  <input name="confirmationUrl"    type="text"   value="{{config('app.url').trim($ad->conf)}}" >

  @if($ad->moneda != "BRL" && $ad->moneda != "CLP" && $ad->moneda != "COP" && $ad->moneda != "MXN" && $ad->moneda != "USD")
      <label>Total a pagar $ <span id="span_total_a_pagar_{{$ad->id}}" class="text-success">{{ 
      number_format(((float)number_format($ad->limite_min / (float)number_format($ad->precio_moneda_sf,2,'.',''),2,'.',''))*number_format($ad->precio_moneda_usd_sf,2,'.',''),2,',','.')    
      }}</span></label>

  @else
    
    <label class="text-success">Total a pagar $ <span id="span_total_a_pagar_{{$ad->id}}" class="text-success">{{number_format($ad->limite_min ,0,',','.')}}</span></label>
  
  @endif 
  </br>


  
  <input id="btn_comprar_{{$ad->id}}" type="submit" name="submit" value="COMPRAR" class="btn btn-success">
</div>
                                                                