<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadisticas extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		$view = $this->load->view('Inicio/estadisticas','',TRUE);
		$title = "Administrador de Jornada Electoral";
		$content = $this->load->view('documentation_framework_views/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
}
