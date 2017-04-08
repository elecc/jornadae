<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcion_seguridad extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		$this->load->helper('seguridad_cls/seguridad_cls');
		$s = new Seguridad_cls();
		$parameters = 'DELETE';
		
		$parameters = array('jansidaisdjio','ijasbidbauid',array('delete *from','drop table usuario',array('jasdsa','hasbd',array('jiasbdias'))));
		
		$s->InjectSQL($parameters,0,'sql');
		
		if($s->error){
			$result = "Funcion de seguridad activada ";
			
			foreach ($s->error_not_secure as $key => $value) {
				//echo "<br>";
				//print_r($value);
			}
			
		}else{
			$result = "Cadena Valida";
		}
		
		$view = $this->load->view('documentation_framework_views/funcion_seguridad','',TRUE);
		$content = $this->load->view('documentation_framework_views/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('sidebar_menu_framework');
		$this->set_content($content);
		$this->build();
	}

}
