<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capturavotoscr extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$jornadae=1;
        
		$this->load->model('modelo_crapido/modelo_crapido','obj');	   
        $rs_creae = $this->obj->consultar_catalogo('jornada','"id_jornada"='.$jornadae,'"id_jornada"');
		$data['num_je'] = $rs_creae->num_rows();
		$data['je'] = $rs_creae->result_array();

 		$rs_elecc = $this->obj->consultar_elecciones($jornadae,'"id_eleccion"');
		$data['num_elecc'] = $rs_elecc->num_rows();
		$data['elecc'] = $rs_elecc->result_array();
                		
		
		$title = "Captura de votos Conteo Rápido";
		$view = $this->load->view('crapido/capturavotoscr',$data,TRUE);
		$content = $this->load->view('crapido/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
	
	public function pop_capturavotoscr(){
		$this->load->view('crapido/pop_capturavotoscr');
	}	
	
	public function insertar_capturacr(){
		/*
		print_r($_POST);
		exit();
		*/
		$seccion = $_POST['seccion'];
		$votos=$_POST['votos'];
   		$eleccion = $_POST['veleccion'];
        
		$this->load->model('modelo_eleccion/modelo_votosreq','obj');        
		$insert_ind = $this->obj->insertar_votosreq($seccion,$votos,$eleccion);
		$respuesta = new stdClass();
		
		if($insert_ind == 1){
	        $respuesta->mensaje = "Quedo registrado correctamente el candidato: ".$descrip_ind;
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
    
	public function refresca_crapido(){
		/*
        print_r($_POST);
		exit();
        */
		//$this->load->view('eleccion/refresca_pelecc',$data);
        $jornadae=1;
		$eleccion = $_POST['eleccion'];
		$this->load->model('modelo_eleccion/modelo_votosreq','obj');
		//$rs_elecc = $this->obj->consultar_coalicion('id_eleccion='.$eleccion,'id_partido');
		$rs_vr = $this->obj->consultar_catalogo('votorequerido','"ideleccion"='.$eleccion,'"idseccion"');
		$data['num_votosr'] = $rs_vr->num_rows();
		$data['votosr'] = $rs_vr->result_array();
		//print_r($_POST);
		
		$this->load->view('eleccion/refresca_votosreq',$data);
	}	
}