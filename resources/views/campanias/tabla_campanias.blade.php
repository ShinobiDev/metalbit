<table id="users-table" class="table table-striped table-codensed table-hover table-resposive">
  <thead>
    <tr class="bg-yellow">
      <th>Campaña</th>
      <th>Usuario</th>
      <th>Tipo de transacción</th>
      <th>Fecha de inicio</th>      
      <th>Fecha de cierre</th>      
      <th>Valor mínimo para el descuento</th>
      <th>Valor descuento</th>
      <th>Límite por usuario</th>
      <th>Acumulable con otras promociones</th>
      <th>Cantidad de cupones creados</th>
      <th>Cantidad de cupones canjeados</th>
      <th>Cantidad de cupones disponibles</th>
      <th>Código cupon</th>
      <th>Acciones</th>
    </tr>
  </thead>
   <tbody id="tbbody">
    {{--se crean las tablas de campañas--}}
         
        @foreach($campanias as $c)

        <tr>
          <td class="text-purple bg-danger">{{$c->nombre_campania}}</td>
          
          @if($c->id_user==NULL)
            <td><span class="text-danger">ABIERTA</span></td>
          @else
            <td><span class="text-success">{{$c->usuario->name}}</span></td>
          @endif

            <td class="bg-success"><span class="text-success">{{strtoupper($c->tipo_canje)}}</span></td>
          
          @if($c->fecha_inicial_vigencia=='0000-00-00 00:00:00')
            <td ><span class="text-danger">ABIERTA</span></td>
          @else
            <td ><span class="text-success">{{$c->fecha_inicial_vigencia}}</span></td>
          @endif

          @if($c->fecha_final_vigencia=='0000-00-00 00:00:00')
            <td class="bg-info" ><span class="text-danger">ABIERTA</span></td>
          @else
            <td class="bg-info"><span class="text-success">{{$c->fecha_final_vigencia}}</span></td>
          @endif
          <td class="text-center">$ {{number_format($c->costo_minimo,0,',','.')}}</td>
          @if($c->tipo_de_descuento=='valor_neto')
            <td class="bg-warning text-center">$ {{number_format($c->valor_de_descuento,0,',','.')}}</td>
          @else
            <td class="bg-warning text-center">{{$c->valor_de_descuento}}%</td>
          @endif
          <td class="text-center">{{$c->limite_por_usuario}}</td>
          
          @if($c->es_acumulable=='1')
             <td class="text-center text-success bg-danger">SI</td> 
          @else
            <td class="text-center text-danger bg-danger">NO</td>
          @endif

          <td class="text-center">{{$c->numero_de_cupones}}</td>
          <td class="text-center bg-success">{{$c->cupones_canjeados}}</td>
          <td class="text-center">{{$c->cupones_disponibles}}</td>
          
          <td class="text-center bg-info"><strong class="text-danger">{{$c->cupones[0]->codigo_cupon}}</strong></td>

          <td>
           <button  class="btn btn-primary" data-toggle="modal" href="#ver_cupones" onclick="ver_campania('{{$c->id}}','{{$c->nombre_campania}}')">Ver campaña</button>
          </td>
          
        </tr>  
        @endforeach
      
    {{--/se crean las tablas de campañas--}}
  </tbody>
</table>

<h3 class="text-danger">Listado de cupones</h3>
<div id="div_cupones">
  <table id="cupones-table" class="table table-striped table-codensed table-hover table-resposive">
  <thead>
    <tr class="bg-red">
      <th>Campaña</th>
      <th>Código cupon</th>
      <th>Fecha de canje</th>
      <th>Usuario que canjeo</th>
      <th>Transaccion donde se redimio</th>
      <th>Valor descuento</th>
      
      <th>Acciones</th>
    </tr>
  </thead>
   <tbody id="tbbody1">
    {{--se crean las tablas de campañas--}}
      
        @foreach($campanias as $c)
          @foreach($c->cupones as $cupon)

           @if($cupon->estado!='sin canjear')
           
               <tr>
                <td class="bg-warning text-red">{{$c->nombre_campania}}</td>
                <td>{{$cupon->codigo_cupon}}</td>
                <td class="bg-info">
                  @if($cupon->fecha_canje!="")
                    {{$cupon->fecha_canje}}</td>
                  @else
                    <span class="text-red">SIN CANJER</span>
                  @endif  
                <td>
                  @if($cupon->fecha_canje!="")
                    <span class="text-success">{{$cupon->usuario->name}}</span>
                  @else
                    <span class="text-red">SIN CANJER</span>
                  @endif
                </td>    
                <td class="bg-danger">{{$cupon->transaccion_donde_se_aplico}}</td>
                  @if($c->tipo_de_descuento=='valor_neto')
                    <td>$ {{number_format($c->valor_de_descuento,0,',','.')}}</td>
                  @else
                    <td>{{number_format($c->valor_de_descuento,0,',','.')}}%</td>
                  @endif  
                
                <td class="bg-success">

                  @if($cupon->fecha_canje!="")
                    <span class="text-success">CANJEADO</span>
                  @else

                    <button  class="btn btn-danger" data-toggle="modal"  onclick="eliminar_cupones('{{$cupon->id}}','{{$c->nombre_campania}}','{{$c->id}}')" >Eliminar cupon</button>
                    
                  @endif
                </td>
                
              </tr>  
           @endif


          @endforeach
        @endforeach
      
    {{--/se crean las tablas de campañas--}}
  </tbody>
</table>
  
</div>

 

  <script type="text/javascript">
  function ver_campania(id,buscar){
     
        $.ajax({
            type: 'GET', 
            url : "ver_cupones/"+id, 
            success : function (data) {
                location.href='#cupones-table_filter'
                
                $('#cupones-table').DataTable().search(
                    buscar,
                    false,
                    false,                    
                ).draw();
                
            }
        });
      
     
      
    }
     function eliminar_cupones(id,nombre,id_campana){
     
        $.ajax({
            type: 'GET', 
            url : "eliminar_cupon/"+id+"/"+id_campana, 
            success : function (data) {
              
                $('#cupones-table').DataTable().search(
                    nombre,
                    false,
                    false,                    
                ).draw();

                if(data.reload){
                  location.reload();
                }
                
            }
        });
    }

    /* peticion_ajax("get","admin/ver_cupones/"+id,{},function(rs){
        console.log(rs);
        var ls=document.getElementById("tbbody1");
        ls.innerHTML="";
        for(var f in rs.datos){
          console.log(rs.datos[f]);

          var tr=document.createElement("tr");

          var td=document.createElement("td");
          td.innerHTML=nombre;
          tr.appendChild(td);

          
          var td=document.createElement("td");
          td.innerHTML=rs.datos[f].codigo_cupon;
          tr.appendChild(td);

          fecha_canje=rs.datos[f].fecha_canje;
          if(rs.datos[f].fecha_canje==null){
              fecha_canje='Sin canjear';
          }

          var td=document.createElement("td");
          td.innerHTML=fecha_canje;
          tr.appendChild(td);
          

          
          var td=document.createElement("td");
          td.innerHTML=rs.datos[f].id_usuario_canje;
          tr.appendChild(td);

          var td=document.createElement("td");
          td.innerHTML=rs.datos[f].id_usuario_canje;
          tr.appendChild(td);

          var td=document.createElement("td");
          td.innerHTML="**";
          tr.appendChild(td);
          
         ls.appendChild(tr);
          
         
        }

     });
  }*/

</script>

    
