$( document ).ready(function() {
 	botones();
 	controlBotones();
});

 
function botones(){
	$.ajax({
		url: '../modulos/panel_control/panel_control.php',
		type: 'POST',
		dataType: 'json',
		data: {'botones': 'btn'},
	})
	.done(function(respuesta) {
		  $("#MostrarBotonesVerticales").html(respuesta); 
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}


function controlBotones(){
	 
	let botonUno="Empezar";
	let botonDos="Empezar";
	let botonTres="Empezar";
 
 	
	$('#faseUno').text(botonUno);
	$('#faseDos').text(botonDos);
	$('#faseTres').text(botonTres);

	$('#faseUno').attr('disabled', true); 
	$('#faseDos').attr('disabled', true);	
	$('#faseTres').attr('disabled', true);
 	
	if ($("#faseUno").text()=="Empezar" && $("#faseDos").text()=="Empezar" && $("#faseTres").text()=="Empezar") {
		 
		$('#faseUno').attr('disabled', false);
		$("#faseUno").click(function(){ 
			$('#faseUno').addClass("btn btn-warning");
	    		$('#faseUno').text("Finalizar");
			

	    		//Update base de datos tabla: InfConfiguracion-> Status::: Estado Finalizar

	     });
	 }
	if ($("#faseUno").text()=="Finalizado" && $("#faseDos").text()=="Empezar" && $("#faseTres").text()=="Empezar") {
		$('#faseUno').addClass("btn btn-danger");
		$('#faseUno').attr('disabled', true); 
	}

	//Fase dos
	if ($("#faseDos").text()=="Empezar" && $("#faseUno").text()=="Finalizado" && $("#faseTres").text()=="Empezar") {
		$('#faseDos').attr('disabled', false);		 
		 	 
		$("#faseDos").click(function(){ 
	    		$('#faseDos').text("Finalizar"); 
	    		$('#faseDos').addClass("btn btn-warning");	    		
	    		$('#faseDos').attr('disabled', false);
	    		//Update base de datos tabla: InfConfiguracion-> Status::: Estado Finalizar
	     });
	}
	if ($("#faseDos").text()=="Finalizar"  && $("#faseUno").text()=="Finalizado" && $("#faseTres").text()=="Empezar") { 
		$('#faseDos').attr('disabled', false);	
		$('#faseDos').addClass("btn btn-warning");
				$("#faseDos").click(function(){ 
			    		$('#faseDos').text("Finalizado");
			    		$('#faseDos').addClass("btn btn-danger");
			    		$('#faseDos').attr('disabled', true);
			    		//Update base de datos tabla: InfConfiguracion-> Status::: Estado Finalizado	    	 
			     });
	}
	if ( $("#faseDos").text()=="Finalizado" && $("#faseUno").text()=="Finalizado" && $("#faseTres").text()=="Empezar") {
			$('#faseDos').addClass("btn btn-danger");
	}
	//Fase Tres
	if ($("#faseTres").text()=="Empezar" && $("#faseUno").text()=="Finalizado" && $("#faseDos").text()=="Finalizado") {
		$('#faseTres').attr('disabled', false);
		
		$("#faseTres").click(function(){ 
	    		$('#faseTres').text("Finalizar");
	    		$('#faseTres').addClass("btn btn-warning");
	    		//Update base de datos tabla: InfConfiguracion-> Status::: Estado Finalizar
	     });
	}
	if($("#faseTres").text()=="Finalizar"&& $("#faseUno").text()=="Finalizado" && $("#faseDos").text()=="Finalizado") {
		
		$('#faseTres').addClass("btn btn-warning");
		$('#faseTres').attr('disabled', false);
		
		$("#faseTres").click(function(){ 
	    		$('#faseTres').text("Finalizado");
	    		$('#faseTres').addClass("btn btn-danger");
	    		//Update base de datos tabla: InfConfiguracion-> Status::: Estado Finalizado
	     });
	}
	if ( $("#faseTres").text()=="Finalizado" && $("#faseUno").text()=="Finalizado" && $("#faseDos").text()=="Finalizado") {
		$('#faseUno').addClass("btn btn-danger");
		$('#faseDos').addClass("btn btn-danger");
		$('#faseTres').addClass("btn btn-danger");
		$('#faseTres').attr('disabled', true); 
	}	


	
 
}
/*Alerty fy*/
	 
	function VerticalAlerta(vertical){  
		alertify.set('notifier','position', 'top-right');
 		alertify.success( 'Seleccionaste : '+vertical);

 		
 }