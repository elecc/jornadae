<?php
class Logintemporal extends Plantilla_controller_full_page {
	
	public function index(){			//print_r($_POST); exit();
		
		$usr0 = $_POST['usr'];
		$pass0 = $_POST['pass'];
		
        $usr = strtoupper($_POST['usr']);		
        $pass = strtoupper(md5($_POST['pass']));
		
		// info1 en caso de que no existe "usr" 
		$info1['error'] = 'Ingrese el nombre de usuario';
		$info1['code_error'] = 1;
		
		// info2 en caso de que no existe "pass"
		$info2['error'] = 'Ingrese la contraseña';
		$info2['code_error'] = 2;
		
		// info3 en caso de que no existe registro en BD
		$info3['error'] = 'Datos Incorrectos';
 		$info3['code_error'] = 3;
		
		// info4 en caso de que exista registro en BD, exista en tabla USUARIO, USUARIO PERSONA Y PERSONA
		$info4['error'] = 'Acceso Correcto';
		$info4['code_error'] = 0;
		$info4['url'] = ACCESO_PRINCIPAL_APLICACION;
		
		// info5 en caso de el sistema este desactivado
		$info5['error'] = 'Sistema Desactivado';
		$info5['code_error'] = 0;
		$info5['url'] = base_url('inicio/mantenimiento');
		
		// info6 en caso de que el usuario inyecte basura
		$info6['error'] = 'Ingrese Datos Correctos';
		$info6['code_error'] = -1;
		
		// info7 en caso de que el usuario este desactivado
		$info7['error'] = 'El usuario se encuentra DESACTIVADO';
		$info7['code_error'] = 4;
		
		// info8 en caso de que el usuario notenga asignado perfil
		$info8['error'] = 'El usuario no tiene asignado un PERFIL';
		$info8['code_error'] = 4;
		
		// info9 en caso de que sea el primer ingreso del usuario (admon cambio la contraseña)
		$info9['code_error'] = 0;
		$info9['url'] = base_url('inicio/buildPass');
		
		if($usr0==""){
			echo json_encode($info1);
			exit();}
		    
        if($pass0==""){        	
    		echo json_encode($info2);
    		exit();}
		
		$this->load->model('modelo_jornadae/modelo_usuarios','oINT');
		
		$rs_usuario = $this->oINT->consultar_usuario($usr,$pass); //print_r($rs_usuario); exit();
		
		if($rs_usuario->num_rows() !=NULL){
			$usuario = $rs_usuario->result_array(); 
			$id_usuario = $usuario[0]['id_usuario'];
			$login = $usuario[0]['login'];
			$contrasena = $usuario[0]['password'];		 
			//$estatus_usuario = $usuario[0]['ESTATUS'];
		}else{
			echo json_encode($info3);
    		exit();
		}
		
		/*if($estatus_usuario == 0){
			echo json_encode($info7);
    		exit();
		}*/
		
		$rs_uep = $this->oINT->consultar_upp($id_usuario);			//print_r($rs_uep); //exit();
		
		if($rs_uep->num_rows() !=NULL){
			$uep = $rs_uep->result_array(); 
			$id_persona = $uep[0]['id_persona'];
			//$cambio_contrasena = $uep[0]['CAMBIO_CONTRASENA'];
			$id_perfil = $uep[0]['id_perfil'];		 
			//$cargo = $uep[0]['CARGO'];
			//$estatus_uep = $uep[0]['ESTATUS'];
			//$id_area_adscripcion = $uep[0]['ID_AREA_ADSCRIPCION'];
			//$id_domicilio_laboral = $uep[0]['ID_DOMICILIO_LABORAL'];
			//$id_area_domicilio = $uep[0]['ID_AREADOMICILIO'];			//para saber el domicilio y llave para encontrar todos los datos del ente
		}else{								
			echo json_encode($info3);
    		exit();
		}
		
		/*if($id_perfil == -1){
			echo json_encode($info8);
    		exit();
		}*/
		
		/*if($cambio_contrasena == 1){
			
			$user['ss_id_usuario'] = $id_usuario;
			$user['ss_login'] = $login;
			$this->session->set_userdata($user);
			echo json_encode($info9);
			exit();
		}*/
		
		$rs_persona = $this->oINT->consultar_persona($id_persona); //print_r($rs_persona); //exit();
		
		if($rs_persona->num_rows() !=NULL){
			$persona = $rs_persona->result_array(); 
			$rfc = $persona[0]['rfc'];
			$paterno = $persona[0]['paterno'];
			$materno = $persona[0]['materno'];		 
			$nombre = $persona[0]['nombre'];
			$nombre_completo = $paterno." ".$materno." ".$nombre;
			//$estatus_persona = $persona[0]['ESTATUS'];
		}else{
			echo json_encode($info3);
    		exit();
		}
		
		$rs_perfil = $this->oINT->consultar_perfil($id_perfil); //print_r($rs_perfil); exit();
		
		$datos_perfil = $rs_perfil->result_array();
		$perfil = $datos_perfil[0]['nombre'];
		
		//Insertamos los valores de Session	
		$user['ss_registrado'] = date("Y-n-j H:i:s");
		$user['ss_id_usuario'] =  $id_usuario;
		$user['ss_login'] =  $login;
		$user['ss_id_persona'] =  $id_persona;
		$user['ss_rfc'] =  $rfc;
		$user['ss_id_perfil'] =  $id_perfil;
		$user['ss_perfil'] =  $perfil;
		$user['ss_nombre_completo'] =  $nombre_completo;
	    			
		$this->session->set_userdata($user);
	
		if ( $rs_usuario != null ) {
			echo json_encode($info4);	
			exit();
		}
	}
}