<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Je extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->model('modelo_jornadae/modelo_jornadae','obj');
		$rs_je = $this->obj->consultar_catalogo('jornada','','id_jornada');
		$rs_edos = $this->obj->consultar_catalogo('estado','','id_estado');
		
		$data['num_je'] = $rs_je->num_rows();
		$data['je'] = $rs_je->result_array();
		$data['num_edos']=$rs_edos->num_rows();
		$data['edos']=$rs_edos->result_array();
		
		$title = "Jornada Electoral";
		$view = $this->load->view('je/je',$data,TRUE);
		$content = $this->load->view('je/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}	
	
	public function insertar_je(){
		/*
	    	$enviado=$respuesta->mensaje = $_POST;
	        $respuesta->codigo = 0;
	        echo json_encode($respuesta);
			exit();
		

	    
		print_r($_POST);
		exit();
		*/
	
		$descripcion_je = $_POST['descripcion_je'];
		$fecha_je = $_POST['fecha_je'];
		$estadosje=$_POST["id_estado_je"]; 
		for ($i=0;$i<count($estadosje);$i++)    
		{     
		   $estadoins[$i]= $estadosje[$i];    
		}
		//$id_estado_je = $_POST['id_estado_je'];
		$this->load->model('modelo_jornadae/modelo_jornadae','obj');
		$insert_je = $this->obj->insertar_je($descripcion_je,$fecha_je,$estadoins);
		$respuesta = new stdClass();
		
		if($insert_je == 1){
	        $respuesta->mensaje = "Quedo registrada correctamente la Jornada Electoral ".$descripcion_je;
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
	
	public function refresca_je(){			//print_r($_POST);			exit();
		
		$this->load->model('modelo_jornadae/modelo_jornadae','obj');
		$rs_je = $this->obj->consultar_catalogo('jornada','','id_estado');
		
		$data['num_je'] = $rs_je->num_rows();
		$data['je'] = $rs_je->result_array();
		
		$this->load->view('je/refresca_je',$data);
	}
}
