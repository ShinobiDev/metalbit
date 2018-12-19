 <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<!--<div class="fb-share-button" data-href="http://metalbit.co/core/register" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmetalbit.co%2Fcore%2Fregister&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>-->

@php
 $url=urlencode(config('app.url').'/register_landing/'.$user->codigo_referido)
@endphp
<div class="fb-share-button" data-href="{{config('app.url')}}/register_landing/{{$user->codigo_referido}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="btn btn-primary" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url}}   &amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>

<!--
<div class="fb-share-button" data-href="{{config('app.url')}}/register_landing/{{$user->codigo_referido}}" data-layout="button_count" data-size="small" data-mobile-iframe="true">Compartir</div>
-->