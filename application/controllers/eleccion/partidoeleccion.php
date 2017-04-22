<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partidoeleccion extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$jornadae=1;
		$this->load->model('modelo_eleccion/modelo_partidoeleccion','obj');
		$rs_creae = $this->obj->consultar_catalogo('jornada','id_jornada='.$jornadae,'id_jornada');
		$data['num_je'] = $rs_creae->num_rows();
		$data['je'] = $rs_creae->result_array();

		$rs_elecc = $this->obj->consultar_elecciones($jornadae,'id_eleccion');
		$data['num_elecc'] = $rs_elecc->num_rows();
		$data['elecc'] = $rs_elecc->result_array();

		$rs_partido = $this->obj->consultar_catalogo('partido','','id_partido');
		$data['num_ptdo'] = $rs_partido->num_rows();
		$data['partido'] = $rs_partido->result_array();
                		
		$title = "Partidos de Elección";
		$view = $this->load->view('eleccion/partidoeleccion',$data,TRUE);
		$content = $this->load->view('eleccion/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
	
	public function pop_partidoeleccion(){
		$this->load->view('eleccion/pop_partidoeleccion');
	}	
	
	public function insertar_partelecc(){		/*
		print_r($_POST);
		exit();
		*/
		$jornadae=1;
		$partido_elecc = $_POST['id_partido'];
		$eleccion = $_POST['veleccion'];

        if(isset($_POST['chkpe']))
        {
            $crapido=1;
        }else
        {
            $crapido=0;
        }
        
		$this->load->model('modelo_eleccion/modelo_partidoeleccion','obj');

        $criterios='id_eleccion='.$eleccion.' and id_partido='.$partido_elecc.' and id_jornada='.$jornadae;
 		$rs_conpe = $this->obj->consultar_catalogo('eleccionpartido',$criterios,'id_eleccionpartido');
		$data['num_conpe'] = $rs_conpe->num_rows();
		$expe=$data['num_conpe'];
   		$respuesta = new stdClass();
        if($expe>=1){
	    	$respuesta->mensaje = "Registro repetido.";
	        $respuesta->codigo = 0;
	        echo json_encode($respuesta);
			exit();
        }else{
    		$insert_pelecc = $this->obj->insertar_Pelecc($partido_elecc,$eleccion,$crapido,$jornadae);
        		
    		if($insert_pelecc == 1){
    	        $respuesta->mensaje = "Quedo registrada correctamente el partido de la Elección ".$descripcion_elecc;
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

/*
	public function consulta_pelecc(){
		//print_r($_POST);
		//exit();
        $jornadae=1;
		$eleccion = $_POST['eleccion'];
		$this->load->model('modelo_eleccion/modelo_partidoeleccion','obj');
		$rs_elecc = $this->obj->consultar_inersimple('eleccionpartido','partido','id_partido', 'id_eleccion='.$eleccion,'id_partido');
		$respuesta = new stdClass();

        $respuesta->num_elecc = $rs_elecc->num_rows();
		$respuesta->elecc = $rs_elecc->result_array();
		
		echo json_encode($respuesta);
		exit();
	}
*/

	public function refresca_pelecc(){
		//print_r($_POST);
		//exit();
		//$this->load->view('eleccion/refresca_pelecc',$data);
        $jornadae=1;
		$eleccion = $_POST['eleccion'];
		$this->load->model('modelo_eleccion/modelo_partidoeleccion','obj');
		$rs_elecc = $this->obj->consultar_inersimple('eleccionpartido','partido','id_partido', 'id_eleccion='.$eleccion,'id_partido');

		$data['num_delecc'] = $rs_elecc->num_rows();
		$data['delecc'] = $rs_elecc->result_array();
		//print_r($_POST);
		
		$this->load->view('eleccion/refresca_partidoelecc',$data);
	}

}
