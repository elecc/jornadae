<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Independientes extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$jornadae=1;
        
		$this->load->model('modelo_eleccion/modelo_independientes','obj');
        
        $rs_creae = $this->obj->consultar_catalogo('jornada','"id_jornada"='.$jornadae,'"id_jornada"');
		$data['num_je'] = $rs_creae->num_rows();
		$data['je'] = $rs_creae->result_array();
 
 		$rs_elecc = $this->obj->consultar_elecciones($jornadae,'"id_eleccion"');
		$data['num_elecc'] = $rs_elecc->num_rows();
		$data['elecc'] = $rs_elecc->result_array();
               		
		$title = "Independientes de Elección";
		$view = $this->load->view('eleccion/independientes',$data,TRUE);
		$content = $this->load->view('eleccion/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
    
	}
	
	public function pop_independientes(){
		$this->load->view('eleccion/pop_independientes');
	}	
	
	public function insertar_independiente(){
		/*
		print_r($_POST);
		exit();
		*/
        //nombreind, paternoind, maternoind, ncorto, chkind
		$nombreind = $_POST['nombreind'];
		$paternoind=$_POST['paternoind'];
		$maternoind = $_POST['maternoind'];
   		$eleccion = $_POST['veleccion'];
        
        if(isset($_POST['chkind']))
        {
            $crapido=1;
        }else
        {
            $crapido=0;
        }
                
		//$id_estado_je = $_POST['id_estado_je'];
		$this->load->model('modelo_eleccion/modelo_independientes','obj');        
		$insert_ind = $this->obj->insertar_independiente($nombreind,$paternoind,$maternoind, $eleccion,$crapido);
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
    

	public function refresca_independientes(){
		/*
        print_r($_POST);
		exit();
        */
		//$this->load->view('eleccion/refresca_pelecc',$data);
        $jornadae=1;
		$eleccion = $_POST['eleccion'];
		$this->load->model('modelo_eleccion/modelo_independientes','obj');
		//$rs_elecc = $this->obj->consultar_coalicion('id_eleccion='.$eleccion,'id_partido');
		$rs_ind = $this->obj->consultar_catalogo('independiente','"id_eleccion"='.$eleccion,'"id_independiente"');
		$data['num_ind'] = $rs_ind->num_rows();
		$data['ind'] = $rs_ind->result_array();
		//print_r($_POST);
		
		$this->load->view('eleccion/refresca_independientes',$data);
	}
  
}
