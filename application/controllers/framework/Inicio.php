<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$view = $this->load->view('documentation_framework_views/inicio','',TRUE);
		$title = "Estadisticas Generales";
		$content = $this->load->view('documentation_framework_views/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('sidebar_menu_framework');
		$this->set_content($content);
		$this->build();
	}
}
