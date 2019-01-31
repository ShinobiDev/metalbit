var nuevo_valor_recarga=50;

function descontar_recargar(id_ventana,id_anuncio,costo,tipo){
	
 
	console.log(document.getElementById(id_ventana));
	   $("#"+id_ventana).addClass( "in" );
	 
	   $("#"+id_ventana).css({"display": "block", "padding-right": "21px"});
       donde_estoy(id_anuncio);	
       $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
       
       if(tipo!=false){
            
            valor=document.getElementById("num_cantidad_moneda_"+id_anuncio)
            if(valor!=null){
                valor=valor.value;    
            }else{
                valor=0;
            }
            var tot=document.getElementById('hdh5_total_'+id_anuncio);
            if(tot!=null){
                tot=tot.value;
            }else{
                tor=0;
            }
       		$.ajax({
		         type: "GET",
		         url: url_global+"/descontar_recargas/"+id_anuncio+"/"+costo+"/"+user_id.value+"/"+tipo+"/"+tot+"/"+valor,
		         dataType: "json",
		         success: function(result){		        
			         _id_anuncio=id_anuncio;
			         if(result.ad_visible==false){
			         	$("#btn_info_"+id_anuncio).css({"display":"none"});	
			         	$("#btn_compra_"+id_anuncio).css({"display":"none"});	
			         	
			         }else{
			         	if(tipo=="info"){
			         		$("#btn_info_"+id_anuncio).css({"display":"none"});	
			         		$("#anc_"+id_anuncio).css({"display":""});		
			         	}
			         	
			         }	             
		         },
			     error: function(err){
			         console.log(err);
			     }
		     });
       }
		 	  	
}

function mostrar_ventana_login(id_ventana,id_anuncio,costo){
	$("#"+id_ventana).css({"display": "block", "padding-right": "21px"});
}

function salir_modal(id){
	$("#"+id).removeClass( "in" );
  	$("#"+id).css({"display": "none"});	
}
$( "#btn_sin_recarga, #sp_salir_sin_recarga" ).click(function(){
  // Holds the product ID of the clicked element
  
  
});
