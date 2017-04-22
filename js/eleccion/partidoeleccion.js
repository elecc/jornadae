$(document).ready(function(){
    	
	var $newCreape = $('#add_pe');
	var $btnCreape = $('#btn_creape');
	var $selelec = $('#id_eleccion');
	//LIMPIAMOS FORMULARIO EN CUANTO ABRA EL MODAL
	$btnCreape.on('click',function(){
		if($selelec.val() ==0){
			$('#mensajes0').html('Debe elejir una elección').show();
			return false;
        }	   
		//LIMPIAMOS TODOS LOS CAMPOS
        var $paraelecc=$( "#id_eleccion option:selected" ).text();
        var $valorelec=$selelec.val();
		$('#id_partido,#chkpe, #mensajes').val('');
		$('#mensajes').hide();
		$('#mensajes0').hide();
        $('#xlaelecc').html( $paraelecc); 
        $('#veleccion').val( $valorelec); 
	});

	$selelec.on('change',function(){
		var datose = "eleccion="+$selelec.val();
		var url_refresca = $('#baseUrl').val()+'eleccion/partidoeleccion/refresca_pelecc';			//PARA REFRESCAR POR AJAX LA TABLA
	    $.post( url_refresca, datose)
		  .done(function( data ) {
		  	$('#datos_elecc').html( data );
		  });
    })
   
	$newCreape.on('click',function(){
        var xlelecc=$('#veleccion').val();
        //alert("Has escrito: " + $("#veleccion").val());
		var id_partido = $('#id_partido').val();
		//VALIDAMOS FORMULARIO
		if (id_partido ==0){
			$('#mensajes').html('Elija el Partido').show();
			return false;
		}else if(xlelecc ==0){
			$('#mensajes').html('Error en la elección').show();
		}else{
			$('#mensajes').html('').hide();
		}		
		
		//NOS LLEVAMOS LOS DATOS DEL FORMULARIO
		var datos = $("#form_partidoeleccion").serializeArray();
		
		//PREPARAMOS LA INSERCION A LA BD
	    var insert_PElecc = $("#baseUrl").val()+'eleccion/partidoeleccion/insertar_partelecc';
	    var petichon = $.ajax({
	        type: "POST",
	        dataType: 'json',
	        url: insert_PElecc,
	        data: datos
	    });

		var datose = "eleccion="+xlelecc;	    
	    petichon.done(function(res){
			if(res.codigo>0){
				var url_refresca = $('#baseUrl').val()+'eleccion/partidoeleccion/refresca_pelecc';			//PARA REFRESCAR POR AJAX LA TABLA JE
				$.post(url_refresca, datose, function(data){
 	  		  	  $('#datos_elecc').html( data );

				});
				mostrarMensaje('correcto',res.mensaje);
			}else{
				mostrarMensaje('error',res.mensaje);
			}
		});		
		
	});
});