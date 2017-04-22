$(document).ready(function(){
	var $newCreaind = $('#add_ind');
	var $btnCreaind = $('#btn_creaind');
	var $selelec = $('#id_eleccion');
	//LIMPIAMOS FORMULARIO EN CUANTO ABRA EL MODAL
	$btnCreaind.on('click',function(){
		if($selelec.val() ==0){
			$('#mensajes0').html('Debe elejir una elección').show();
			return false;
        }	   
		//LIMPIAMOS TODOS LOS CAMPOS
        var $paraelecc=$( "#id_eleccion option:selected" ).text();
        var $valorelec=$selelec.val();
		$('#nombreind,#paternoind,#maternoind,#ncorto, #mensajes').val('');
		$('#mensajes').hide();
		$('#mensajes0').hide();
        $('#xlaelecc').html( $paraelecc); 
        $('#veleccion').val( $valorelec); 
	});
    
    
	$selelec.on('change',function(){
		var datose = "eleccion="+$selelec.val();
		var url_refresca = $('#baseUrl').val()+'eleccion/independientes/refresca_independientes';			//PARA REFRESCAR POR AJAX LA TABLA
	    $.post( url_refresca, datose)
		  .done(function( data ) {
		  	$('#datos_ind').html( data );
		  });
    })
    
	$newCreaind.on('click',function(){
        var xlelecc=$('#veleccion').val();
        var nombreind=$('#nombreind').val();
	    var paternoind = $('#paternoind').val();
	    var maternoind = $('#maternoind').val();
		//VALIDAMOS FORMULARIO
		if (nombreind ==''){
			$('#mensajes').html('Ingrese el nombre del Candidato').show();
			return false;
		}else if(paternoind ==''){
			$('#mensajes').html('Ingrese el apellido paterno del Candidato').show();
			return false;
		}else if(maternoind ==''){
			$('#mensajes').html('Ingresse el apellido materno del Candidato').show();
			return false;
		}else if(xlelecc==0){
			$('#mensajes').html('Error en la eleción').show();
			return false;
		}else{
			$('#mensajes').html('').hide();
		}		
		
		//NOS LLEVAMOS LOS DATOS DEL FORMULARIO
		var datos = $("#form_independientes").serializeArray();
		
		//PREPARAMOS LA INSERCION A LA BD
	    var insert_ind = $("#baseUrl").val()+'eleccion/independientes/insertar_independiente';
	    var petichon = $.ajax({
	        type: "POST",
	        dataType: 'json',
	        url: insert_ind,
	        data: datos
	    });

		var datose = "eleccion="+xlelecc;	    
	    petichon.done(function(res){
			if(res.codigo>0){
				var url_refresca = $('#baseUrl').val()+'eleccion/independientes/refresca_independientes';			//PARA REFRESCAR POR AJAX LA TABLA JE
				$.post(url_refresca, datose, function(data){
 	  		  	  $('#datos_ind').html( data );
				});
				mostrarMensaje('correcto',res.mensaje);
			}else{
				mostrarMensaje('error',res.mensaje);
			}
		});		
		
	});
});