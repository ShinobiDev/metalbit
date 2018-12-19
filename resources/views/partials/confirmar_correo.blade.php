@Auth()
  @if (Auth::user()->confirmado=="NO")
    <div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>

      <strong>Por favor confirma  tu correo, para poder publicar tus anuncios</strong>
    </div>


  @endif

@endauth

