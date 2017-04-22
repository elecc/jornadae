$(document).ready(function(){
	
	var $perfil = $('#tabla_usr .perfil a');
	var $elimina = $('#tabla_usr .elimina a');
	
	$perfil.on('click',function(){
		var idUsuario = $(this).data('id_usuario');
		var idPersona = $(this).data('id_persona');
		var login = $(this).data('login');
		var perfil = $(this).data('perfil');
		var urlPerfil = $('#baseUrl').val()+'usuarios/usuarios/pop_perfil';
		
		$.post(urlPerfil,{id_usuario:idUsuario,id_persona:idPersona,login:login,perfil:perfil},function(res){
			$('#zona_trabajo').html(res);
		});
	});
	
	$elimina.on('click',function(){
		var idUsuario = $(this).data('id_usuario');
		var idPersona = $(this).data('id_persona');
		var login = $(this).data('login');
		var urlElimina = $('#baseUrl').val()+'usuarios/usuarios/pop_elimina';
		
		$.post(urlElimina,{id_usuario:idUsuario,id_persona:idPersona,login:login},function(res){
			$('#zona_trabajo').html(res);
		});
	});
});