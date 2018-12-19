<div >
	<div id="div_comentarios_{{$ad->id}}" class="comentarios" >
			@foreach($ad->comentarios as $c)
					<h5><b>{{$c->opinion}}</b></h5>
					<h6>{{$c->comentario}}</h6>
					<h6>Hecho por: {{$c->name}}</h6>
					<h6>El día: {{DateTime::createFromFormat('Y-m-d H:i:s', $c->updated_at)->format('M d, Y h:i A')}}</h6>
			@endforeach
	</div>
	<div id="espera_{{$ad->id}}"></div>
    <button type="button" class="btn btn-default"  onclick="ver_mas_comentarios('{{$ad->id}}')">VER MÁS COMENTARIOS</button>
</div>
<script type="text/javascript">
	var limit_min=0;
	var limit_maxs=5;
	function  ver_mas_comentarios(id){
		limit_min+=5;
		
		mostrar_cargando('espera_'+id,200,'Un momento, por favor...');

		peticion_ajax("GET","ver_mas_comentarios/"+id+"/"+limit_min+"/"+limit_maxs,function(rs){
			console.log(rs.respuesta);
			if(rs.respuesta){

				mostrar_mas_comentarios(rs.datos,id);
				$('#espera_'+id).html("");
			}else{
				$('#espera_'+id).html("No existen más comentarios");				
			}

			
		});
	}

	function mostrar_mas_comentarios(datos,id){
		var div=document.getElementById("div_comentarios_"+id);
		for(var d in datos){
			var h5_opinion=document.createElement("h5");
			var b_opinion=document.createElement("b");
			b_opinion.innerHTML=datos[d].opinion;
			h5_opinion.appendChild(b_opinion);
			div.appendChild(h5_opinion);
			var h6_comentario=document.createElement("h6");
			h6_comentario.innerHTML=datos[d].comentario;
			div.appendChild(h6_comentario);
			var h6_name=document.createElement("h6");
			h6_name.innerHTML="Hecho por: "+datos[d].name;
			div.appendChild(h6_name);
			var h6_dia=document.createElement("h6");
			h6_dia.innerHTML="El día: "+datos[d].updated_at;
			div.appendChild(h6_dia);





		}		

	}

</script>