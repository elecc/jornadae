$(document).ready(function(){
	var $newCreacoa = $('#add_coa');
	var $btnCreacoa = $('#btn_creacoa');
	var $selelec = $('#id_eleccion');
	//LIMPIAMOS FORMULARIO EN CUANTO ABRA EL MODAL
	$btnCreacoa.on('click',function(){
		if($selelec.val() ==0){
			$('#mensajes0').html('Debe elejir una elección').show();
			return false;
        }	   
		//LIMPIAMOS TODOS LOS CAMPOS
        var $paraelecc=$( "#id_eleccion option:selected" ).text();
        var $valorelec=$selelec.val();
		$('#id_partidos,#descripcion_coalicion, #mensajes').val('');
		$('#mensajes').hide();
		$('#mensajes0').hide();
        $('#xlaelecc').html( $paraelecc); 
        $('#veleccion').val( $valorelec); 
	});

	$selelec.on('change',function(){
		var datose = "eleccion="+$selelec.val();
		var url_refresca = $('#baseUrl').val()+'eleccion/coaliciones/refresca_coalicion';			//PARA REFRESCAR POR AJAX LA TABLA
	    $.post( url_refresca, datose)
		  .done(function( data ) {
		  	$('#datos_coa').html( data );
		  });
    })
   
	$newCreacoa.on('click',function(){
        var xlelecc=$('#veleccion').val();
	    var descripcion = $('#descripcion_coalicion').val();
        var lpartidos = $('select[id="id_partidos[]"] option:selected').length;
		//VALIDAMOS FORMULARIO
		if (descripcion ==''){
			$('#mensajes').html('Ingrese la descripción de la elección').show();
			return false;
		}else if(lpartidos<=1){
			$('#mensajes').html('Seleccione los partidos').show();
			return false;
		}else if(xlelecc==0){
			$('#mensajes').html('Error en la eleción').show();
			return false;
		}else{
			$('#mensajes').html('').hide();
		}		
		
		//NOS LLEVAMOS LOS DATOS DEL FORMULARIO
		var datos = $("#form_coaliciones").serializeArray();
		
		//PREPARAMOS LA INSERCION A LA BD
	    var insert_coali = $("#baseUrl").val()+'eleccion/coaliciones/insertar_coalicion';
	    var petichon = $.ajax({
	        type: "POST",
	        dataType: 'json',
	        url: insert_coali,
	        data: datos
	    });

		var datose = "eleccion="+xlelecc;	    
	    petichon.done(function(res){
			if(res.codigo>0){
				var url_refresca = $('#baseUrl').val()+'eleccion/coaliciones/refresca_coalicion';			//PARA REFRESCAR POR AJAX LA TABLA JE
				$.post(url_refresca, datose, function(data){
 	  		  	  $('#datos_coa').html( data );
				});
				mostrarMensaje('correcto',res.mensaje);
			}else{
				mostrarMensaje('error',res.mensaje);
			}
		});		
		
	});
});