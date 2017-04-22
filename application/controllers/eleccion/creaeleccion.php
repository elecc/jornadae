<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Creaeleccion extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$jornadae=1;
		$this->load->model('modelo_eleccion/modelo_eleccion','obj');
		$rs_creae = $this->obj->consultar_catalogo('jornada','id_jornada='.$jornadae,'id_jornada');
		$data['num_je'] = $rs_creae->num_rows();
		$data['je'] = $rs_creae->result_array();

		$rs_celecc = $this->obj->consultar_catalogo('cateleccion','','id_cateleccion');
		$data['num_cate'] = $rs_celecc->num_rows();
		$data['celecc'] = $rs_celecc->result_array();
        
		$rs_jedos = $this->obj->consultar_inersimple('jornada_estados','estado','id_estado',
         '"id_jornada"='.$jornadae,'"id_estado"');
		$data['num_jedos'] = $rs_jedos->num_rows();
		$data['jedos'] = $rs_jedos->result_array();

		$rs_elecc = $this->obj->consultar_elecciones($jornadae,'id_eleccion');
		$data['num_elecc'] = $rs_elecc->num_rows();
		$data['elecc'] = $rs_elecc->result_array();

		$title = "Crea Elección";
		$view = $this->load->view('eleccion/creaeleccion',$data,TRUE);
		$content = $this->load->view('eleccion/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
	
	public function pop_creaeleccion(){
		$this->load->view('eleccion/pop_eleccion');
	}	
	
	public function insertar_elecc(){
		/*
		print_r($_POST);
		exit();
		*/
		$jornadae=1;
		$descripcion_elecc = $_POST['descripcioneleccion'];
		$fecha_elecc = $_POST['fecha_creaeleccion'];
		$puestoe=$_POST["id_puestoe"]; 
		$estadoe=$_POST["id_estado_eleccion"]; 

		$this->load->model('modelo_eleccion/modelo_eleccion','obj');
		$insert_elecc = $this->obj->insertar_elecc($descripcion_elecc,$fecha_elecc,$puestoe,$estadoe,$jornadae);
		$respuesta = new stdClass();
		
		if($insert_elecc == 1){
	        $respuesta->mensaje = "Quedo registrada correctamente la Elección ".$descripcion_elecc;
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

	public function refresca_Elecc(){			//print_r($_POST);			exit();
	       $jornadae=1;
		$this->load->model('modelo_eleccion/modelo_eleccion','obj');
		$rs_elecc = $this->obj->consultar_elecciones($jornadae,'id_eleccion');
		$data['num_elecc'] = $rs_elecc->num_rows();
		$data['elecc'] = $rs_elecc->result_array();
		
		$this->load->view('eleccion/refresca_elecc',$data);
	}
    
    
}
