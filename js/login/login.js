//Funcion valida login
$(document).ready(function(){
	
	$("#usr").val('');			//reseteamos los valores iniciales
	$("#pass").val('');			//reseteamos los valores iniciales

	var $login = $('#botonLogin');
	
	$login.on('click',function(e){
		e.preventDefault();
		
	    var url = $("#baseUrl").val()+'login/logintemporal';
	    var datos = $('#login').serializeArray();

	    var petichon = $.ajax({
	    	url: url,
	    	type: 'POST',
	    	dataType: 'json',
	    	data: datos
	    });

	    petichon.done(function(res){
	    	if (res.code_error>0 && res.code_error<5) {
				mostrarMensaje('error', res.error);
	        }else if (res.code_error < 0) {
	          	mostrarMensaje('mensaje', res.error);
	        }else
	           $(location).attr('href',res.url);
	    });
	});
/*******************************************************************************************************************************/
	


		
});
