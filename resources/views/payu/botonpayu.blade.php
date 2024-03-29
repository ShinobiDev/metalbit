<div>
  <input   name="merchantId"    type="hidden"   value="{{trim($ad->merchantId)}}"   >
  <input name="accountId"     type="hidden"   value="{{trim($ad->accountId)}}" >
  <input id="hd_description_{{$ad->id}}" name="description"   type="hidden"   value="{{trim($ad->descripcion)}}"  >
  
  @if($ad->transaccion_pendiente['value']!='0' && $ad->transaccion_pendiente['value']!= null) 
    @if($ad->transaccion_pendiente['pago']!=0 && $ad->transaccion_pendiente['pago'])
      <input id="referenceCode_{{$ad->id}}" name="referenceCode" type="hidden"   value="{{$ad->transaccion_pendiente['pago']}}" > 
    @else
      <input id="referenceCode_{{$ad->id}}" name="referenceCode" type="hidden"   value="{{$ad->cod_anuncio}}" >
    @endif
     
    <input id="hd_valor_venta_{{$ad->id}}" name="amount"        type="hidden"   value="{{number_format($ad->transaccion_pendiente['value'] ,0,'.','')
    }}"   >  
  @else
    <input id="referenceCode_{{$ad->id}}" name="referenceCode" type="hidden"   value="{{$ad->cod_anuncio}}" >
    <input id="hd_valor_venta_{{$ad->id}}" name="amount"        type="hidden"   value="{{number_format($ad->limite_min ,0,'.','')
    }}"   >
  @endif
  
  <input id="currency_{{$ad->id}}" name="currency"     type="hidden"   value="{{trim($ad->moneda)}}" >

  
  <input name="tax"           type="hidden"   value="0"  >
  <input name="taxReturnBase" type="hidden"   value="0" >
  <input id="hd_signature_{{$ad->id}}" name="signature"     type="hidden"   value="{{trim($ad->hash)}}"  >
  <input name="buyerEmail"    type="hidden"   value="{{trim(Auth::user()->email)}}" >
  <input name="responseUrl"    type="hidden"   value="{{config('app.url').trim($ad->resp)}}" >
  <input name="confirmationUrl"    type="hidden"   value="{{config('app.url').trim($ad->conf)}}" >

</div>
                                                                