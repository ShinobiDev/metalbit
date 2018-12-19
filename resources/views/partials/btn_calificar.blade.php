<form method="POST" action="{{url('calificar_venta')}}">
                            {{csrf_field()}}
	<input type="hidden" name="id_transaccion" value="{{$transaccion->id}}">
    <section class="clasificacion" style="text-align: center;" value="{{old('nota')}}"  required>
        <input id="rd1" class="" type="radio" name="nota" value="1">
        <label for="rd1">1</label>
        <input id="rd2" class="" type="radio" name="nota" value="2">
        <label for="rd2">2</label>
        <input id="rd3" class="" type="radio" name="nota" value="3">
        <label for="rd3">3</label>
        <!--<input id="rd4" class="" type="radio" name="nota" value="4">
        <label for="rd4">4</label>
        <input id="rd5" class="" type="radio" name="nota" value="5">
        <label for="rd5">5</label>-->
        
    </section>  
    <section style="text-align: center;" >
        <h3><b>Opinión</b></h3>
        <select id="sel_opt_calificacion" name="sel_opt_calificacion" class="select form-control" value="{{old('sel_opt_calificacion')}}" onchange="validar_opcion()">
            <option value="Recomendadísimo" name="opinion">Recomendadísimo</option>
            <option value="Excelente atención" name="opinion">Excelente atención</option>
            <option value="Transacción Efectiva y segura" name="opinion">Transacción Efectiva y segura</option>
            <option value="Usuario no fue puntual con transacción" name="opinion">Usuario no fue puntual con transacción</option>
            <option value="Nunca contestó" name="opinion"> Nunca contestó</option>
            <option value="Posible fraude" name="opinion">Posible fraude</option>
            <option value="La atención no fue tan buena" name="opinion">La atención no fue tan buena</option>
            <option value="Otros" name="opinion">Otros</option>
        </select>
        <!--<input type="text" id="opinion_otro" name="opinion_otro" class="textinput textInput form-control" placeholder="Dejanos conocer tu opinión" style="display: none;">-->
    </section>     
    <div class="modal-body">
    <textarea maxlength="110" id="txt_opinion" class="textarea form-control" name="opinion" value="{{old('opinion')}}" placeholder="Dejanos conocer tu opinión" onkeypress="validar_tam_txt(this)" style="display: none;">
    </textarea >
    <h6>Por favor trata de ser breve y claro con tu opinión para ayudar a otros usuarios a conocer y hacer mejor uso de {{config('app.name')}}</h6>
    <h6 ><span id="lb_limit_txt">0</span> de 110 caracteres permitidos</h6>                 
    
    </div>  
    <button id="btn_recarga" type="submit" class="btn btn-primary">Calificar</button>
</form>
<script type="text/javascript">
       function validar_tam_txt(e){
            console.log(e.value);
            console.log(e.value.length);
            if((e.value.length+1)<=110){
                document.getElementById('lb_limit_txt').innerHTML=e.value.length+1;
                
            }
        } 

       function validar_opcion(){
          var sel=document.getElementById("sel_opt_calificacion").value;
         
          if(sel=="Otros"){
            document.getElementById("txt_opinion").style.display='';

          }else{
            document.getElementById("txt_opinion").style.display='none';                        
          }
       }
</script>