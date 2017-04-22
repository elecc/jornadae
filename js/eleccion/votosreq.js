$(document).ready(function(){
	var $newCreavr = $('#add_votosr');
	var $btnCreavr = $('#btn_votosr');
	var $selelec = $('#id_eleccion');
	//LIMPIAMOS FORMULARIO EN CUANTO ABRA EL MODAL
	$btnCreavr.on('click',function(){
		if($selelec.val() ==0){
			$('#mensajes0').html('Debe elejir una elección').show();
			return false;
        }	   
		//LIMPIAMOS TODOS LOS CAMPOS
        var $paraelecc=$( "#id_eleccion option:selected" ).text();
        var $valorelec=$selelec.val();
		$('#seccion,#votos, #mensajes').val('');
		$('#mensajes').hide();
		$('#mensajes0').hide();
        $('#xlaelecc').html( $paraelecc); 
        $('#veleccion').val( $valorelec); 
	});
    
    
	$selelec.on('change',function(){
		var datose = "eleccion="+$selelec.val();
		var url_refresca = $('#baseUrl').val()+'eleccion/votosrequeridos/refresca_votosreq';			//PARA REFRESCAR POR AJAX LA TABLA
	    $.post( url_refresca, datose)
		  .done(function( data ) {
		  	$('#datos_votosr').html( data );
		  });
    })
    
	$newCreavr.on('click',function(){
        var xlelecc=$('#veleccion').val();
        var seccion=$('#seccion').val();
	    var votos = $('#votos').val();

		//VALIDAMOS FORMULARIO
		if (seccion ==''){
			$('#mensajes').html('Ingrese la seccion').show();
			return false;
		}else if(votos ==''){
			$('#mensajes').html('Ingrese el número de votos').show();
			return false;
		}else if(xlelecc==0){
			$('#mensajes').html('Error en la eleción').show();
			return false;
		}else{
			$('#mensajes').html('').hide();
		}		
		
		//NOS LLEVAMOS LOS DATOS DEL FORMULARIO
		var datos = $("#form_votosreq").serializeArray();
		
		//PREPARAMOS LA INSERCION A LA BD
	    var insert_vr = $("#baseUrl").val()+'eleccion/votosrequeridos/insertar_votosreq';
	    var petichon = $.ajax({
	        type: "POST",
	        dataType: 'json',
	        url: insert_vr,
	        data: datos
	    });

		var datose = "eleccion="+xlelecc;	    
	    petichon.done(function(res){
			if(res.codigo>0){
				var url_refresca = $('#baseUrl').val()+'eleccion/votosrequeridos/refresca_votosreq';			//PARA REFRESCAR POR AJAX LA TABLA JE
				$.post(url_refresca, datose, function(data){
 	  		  	  $('#datos_votosr').html( data );
				});
				mostrarMensaje('correcto',res.mensaje);
			}else{
				mostrarMensaje('error',res.mensaje);
			}
		});		
		
	});
});