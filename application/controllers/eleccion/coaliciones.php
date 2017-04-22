<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coaliciones extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$jornadae=1;
		$this->load->model('modelo_eleccion/modelo_coaliciones','obj');
		
		$rs_creae = $this->obj->consultar_catalogo('jornada','"id_jornada"='.$jornadae,'"id_jornada"');
		$data['num_je'] = $rs_creae->num_rows();
		$data['je'] = $rs_creae->result_array();
				
		$rs_elecc = $this->obj->consultar_elecciones($jornadae,'"id_eleccion"');
		$data['num_elecc'] = $rs_elecc->num_rows();
		$data['elecc'] = $rs_elecc->result_array();

		$rs_partido = $this->obj->consultar_catalogo('partido','','"id_partido"');
		$data['num_ptdo'] = $rs_partido->num_rows();
		$data['partido'] = $rs_partido->result_array();

		$title = "Coaliciones de Elección";
		$view = $this->load->view('eleccion/coaliciones',$data,TRUE);
		$content = $this->load->view('eleccion/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
	
	public function pop_coaliciones(){
		$this->load->view('eleccion/pop_coaliciones');
	}	
	
	public function insertar_coalicion(){
		/*
		print_r($_POST);
		exit();
		*/
        
		$descrip_coa = $_POST['descripcion_coalicion'];
		$ptdoscoa=$_POST["id_partidos"];
   		$eleccion = $_POST['veleccion'];
        
        if(isset($_POST['chkpcoa']))
        {
            $crapido=1;
        }else
        {
            $crapido=0;
        }
                
		for ($i=0;$i<count($ptdoscoa);$i++)    
		{     
		   $parcoains[$i]= $ptdoscoa[$i];    
		}
		//$id_estado_je = $_POST['id_estado_je'];
		$this->load->model('modelo_eleccion/modelo_coaliciones','obj');        
		$insert_coa = $this->obj->insertar_parcoa($descrip_coa,$parcoains,$eleccion,$crapido);
		$respuesta = new stdClass();
		
		if($insert_coa == 1){
	        $respuesta->mensaje = "Quedo registrada correctamente la Coalición: ".$descrip_coa;
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
    

	public function refresca_coalicion(){
		//print_r($_POST);
		//exit();
		//$this->load->view('eleccion/refresca_pelecc',$data);
        $jornadae=1;
		$eleccion = $_POST['eleccion'];
		$this->load->model('modelo_eleccion/modelo_coaliciones','obj');
		//$rs_elecc = $this->obj->consultar_coalicion('id_eleccion='.$eleccion,'id_partido');
		$rs_coal = $this->obj->consultar_catalogo('coalicion','"id_eleccion"='.$eleccion,'"id_coalicion"');
		$data['num_dcoa'] = $rs_coal->num_rows();
		$data['dcoa'] = $rs_coal->result_array();
		//print_r($_POST);
		
		$this->load->view('eleccion/refresca_coalicion',$data);
	}
    
    
}
