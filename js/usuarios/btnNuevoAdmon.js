$(document).ready(function(){
	
	var $newAdmon = $('#new_admon');
	
	$newAdmon.on('click',function(){
		var urlAdmon = $('#baseUrl').val()+'usuarios/usuarios/pop_admon';
		
		$.post(urlAdmon,function(res){
			$('#zona_trabajo').html(res);
		});
	});
});