<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		//CHECAMOS SU PERFIL QUE VIENE EN DATOS DE SESION DESDE QUE SE LOGUEO
		//$id_perfil = 1;
		$id_perfil = "";
		
		$this->load->model('modelo_jornadae/modelo_usuarios','obj');
		$rs_usuarios = $this->obj->consultar_usuarios($id_perfil);
		
		$data['num_usuarios'] = $rs_usuarios->num_rows();
		$data['usuarios'] = $rs_usuarios->result_array();			//echo "<pre>"; print_r($data);
		
		$title = "Administración de Usuarios";
		$view = $this->load->view('usuarios/usuarios',$data,TRUE);
		$content = $this->load->view('base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}	
	
	public function pop_perfil(){			//print_r($_POST); exit();
	
		$this->load->model('modelo_jornadae/modelo_usuarios','obj');
		$rs_perfil = $this->obj->consultar_catalogo('PERFIL','','ID_PERFIL');
		
		$data['num_perfiles'] = $rs_perfil->num_rows();
		$data['perfiles'] = $rs_perfil->result_array();
	
		$data['id_persona'] = $_POST['id_persona'];
		$data['id_usuario'] = $_POST['id_usuario'];
		$data['login'] = $_POST['login'];
		$data['perfil'] = $_POST['perfil'];
		$this->load->view('usuarios/pop_perfil',$data);	
	}
	
	public function pop_admon(){			//print_r($_POST); exit();
		
		$this->load->view('usuarios/pop_admon');	
	}
	
	public function insertar_usuario(){			//print_r($_POST);			exit();
		
		$nombre = $_POST['nombre'];
		$paterno = $_POST['paterno'];
		$materno = $_POST['materno'];
		$rfc = $_POST['rfc'];
		$correo = $_POST['correo'];
		
		$this->load->model('modelo_jornadae/modelo_usuarios','obj');
		$insert_admon = $this->obj->insertar_usuario($nombre,$paterno,$materno,$rfc,$correo);
		$respuesta = new stdClass();
		
		if($insert_admon == 1){
	        $respuesta->mensaje = "Quedo registrado correctamente el usuario.";
	        $respuesta->codigo = 1;
			echo json_encode($respuesta);
			exit();
	    }elseif($insert_admon == -1){
	        $respuesta->mensaje = "Ya existe usuario con ese RFC.";
	        $respuesta->codigo = -1;
			echo json_encode($respuesta);
			exit();
	    }else{
	    	$respuesta->mensaje = "Ocurrió un error.";
	        $respuesta->codigo = 0;
	        echo json_encode($respuesta);
			exit();
	    }
	}
	
	public function refresca_admon(){			//print_r($_POST);			exit();
		
		//CHECAMOS SU PERFIL QUE VIENE EN DATOS DE SESION DESDE QUE SE LOGUEO
		//$id_perfil = 1;
		$id_perfil = "";
		
		$this->load->model('modelo_jornadae/modelo_usuarios','obj');
		$rs_usuarios = $this->obj->consultar_usuarios($id_perfil);
		
		$data['num_usuarios'] = $rs_usuarios->num_rows();
		$data['usuarios'] = $rs_usuarios->result_array();
		
		$this->load->view('usuarios/refresca_usuarios',$data);
	}
	
	public function pop_elimina(){			//print_r($_POST); exit();
		
		$data['id_persona'] = $_POST['id_persona'];
		$data['id_usuario'] = $_POST['id_usuario'];
		$data['login'] = $_POST['login'];
		
		$this->load->view('usuarios/pop_elimina',$data);	
	}
	
	public function elimina_usuario(){			//print_r($_POST); exit();
	
		$id_persona = $_POST['id_persona'];
		$id_usuario = $_POST['id_usuario'];
		$login = $_POST['login'];
		
		$this->load->model('modelo_jornadae/modelo_usuarios','obj');
		$elimina = $this->obj->eliminar_usuario($id_usuario,$id_persona);
		
		$respuesta = new stdClass();
		
		if($elimina == 1){
	        $respuesta->mensaje = "Se elimino correctamente el usuario ".$login." ";
	        $respuesta->codigo = 1;
			echo json_encode($respuesta);
			exit();
	    }else{
	    	$respuesta->mensaje = "Ocurrió un error.";
	        $respuesta->codigo = 0;
	        echo json_encode($respuesta);
			exit();
	    }
	}

	public function actualiza_perfil(){			//print_r($_POST); exit();
	
		$id_perfil = $_POST['id_perfil'];
		$id_persona = $_POST['id_persona'];
		$id_usuario = $_POST['id_usuario'];
		$login = $_POST['login'];
		
		$this->load->model('modelo_jornadae/modelo_usuarios','obj');
		$actualiza = $this->obj->actualizar_perfil($id_usuario,$id_persona,$id_perfil);
		
		$respuesta = new stdClass();
		
		if($actualiza == 1){
	        $respuesta->mensaje = "Se actualizó el perfil del usuario ".$login." ";
	        $respuesta->codigo = 1;
			echo json_encode($respuesta);
			exit();
	    }else{
	    	$respuesta->mensaje = "Ocurrió un error.";
	        $respuesta->codigo = 0;
	        echo json_encode($respuesta);
			exit();
	    }
	}
}
