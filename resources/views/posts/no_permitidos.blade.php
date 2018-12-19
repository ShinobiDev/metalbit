<div class="modal-body">
    <h5>Esta moneda no esta habilitada para realizar transacciones a través de PAYU, sin embargo puedes hacerlo a través de cualquiera de estas divisas, selecciona la opción que más se te adecue y realiza el pago  por medio de PAYU</h5>

    <h5><input name="mon_valida_{{$ad->id}}" value="USD" type="radio" onchange="cambiar_moneda_valida('{{ $ad->id}}','{{$ad->cod_anuncio}}','USD')" checked> USD DOLARES AMERICANOS</h5>
    <h5><input name="mon_valida_{{$ad->id}}" value="COP" type="radio" onchange="cambiar_moneda_valida('{{ $ad->id}}','{{$ad->cod_anuncio}}','COP')"> COP PESO COLOMBIANO</h5>
    <h5><input name="mon_valida_{{$ad->id}}" value="CLP" type="radio" onchange="cambiar_moneda_valida('{{ $ad->id}}','{{$ad->cod_anuncio}}','CLP')"> CLP PESO CHILENO</h5>
    <h5><input name="mon_valida_{{$ad->id}}" value="BRL" type="radio"onchange="cambiar_moneda_valida('{{ $ad->id}}','{{$ad->cod_anuncio}}','BRL')"> BRL REAL BRASILEÑO</h5>
    <h5><input name="mon_valida_{{$ad->id}}" value="MXN" type="radio" onchange="cambiar_moneda_valida('{{ $ad->id}}','{{$ad->cod_anuncio}}','MXN')"> MXN PESO MEXICANO</h5>
    <h5></h5>
    <input id="hd_pre_mon_valido{{$ad->id}}" type="hidden" value="{{$ad->precio_moneda_usd}}">
    <input id="hd_mon_valido_{{$ad->id}}" type="hidden" value="USD">
    
    <h5>Total: $ <strong id="stValorMonedaValida_{{$ad->id}}">{{

        number_format(((float)number_format($ad->limite_min / (float)number_format($ad->precio_moneda_sf,2,'.',''),2,'.',''))*number_format($ad->precio_moneda_usd_sf,2,'.',''),2,",",".")    

    }}   USD.</strong> </h5>
</div>

