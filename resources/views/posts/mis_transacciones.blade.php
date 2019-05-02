<div class="box-body" style=" overflow-y: scroll; height: 350px">
                  
      @foreach ($transacciones as $transaccion)

            <h3 class="box-title">{{$transaccion->name}}</h3>
            <h5>Télefono: {{$transaccion->phone}}</h5>
            <h5>Email: {{$transaccion->email}}</h5>
         @if ($transaccion->calificacion == null)
              
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong_{{$transaccion->id}}">
                  Calificar
            </button>
          
          <!-- Modal -->
            <div class="modal fade" id="exampleModalLong_{{$transaccion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Califica la transacción # {{$transaccion->transactionId}}</h5>
                   <h3 class="box-title">{{$transaccion->name}}</h3>
                   <h5>Télefono: {{$transaccion->phone}}</h5>
                   <h5>Email: {{$transaccion->email}}</h5>
                   @if($transaccion->tipo_anuncio="compra")
                    te vendió 
                   @else
                    te compró
                   @endif
                    {{$transaccion->transactionQuantity}} {{$transaccion->nombre_cripto_moneda}}

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 @include("partials.btn_calificar")
                </div>
              </div>
            </div>
            </div>
          
          @else
             @if($transaccion->tipo_anuncio="compra")
                   te vendió 
              @else
                    te compró
              @endif
              {{$transaccion->transactionQuantity}} {{$transaccion->nombre_cripto_moneda}}

          @endif
          
      @endforeach
      {{--ventanas--}}
      @foreach ($transacciones as $transaccion)

                        
                     @if ($transaccion->calificacion == null)
                          
                      
                      
                      <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong_{{$transaccion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Califica la transacción # {{$transaccion->transactionId}}</h5>
                               <h3 class="box-title">{{$transaccion->name}}</h3>
                               <h5>Télefono: {{$transaccion->phone}}</h5>
                               <h5>Email: {{$transaccion->email}}</h5>
                               @if($transaccion->tipo_anuncio="compra")
                                te vendió 
                               @else
                                te compró
                               @endif
                                {{$transaccion->transactionQuantity}} {{$transaccion->nombre_cripto_moneda}}

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                             @include("partials.btn_calificar")
                            </div>
                          </div>
                        </div>
                        </div>
                      
                      

                      @endif
                      
                  @endforeach
</div>