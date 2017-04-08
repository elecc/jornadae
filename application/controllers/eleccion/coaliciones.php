<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coaliciones extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		$title = "Coaliciones de Elección";
		$view = $this->load->view('eleccion/coaliciones','',TRUE);
		$content = $this->load->view('eleccion/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
	
	public function pop_coaliciones(){
		$this->load->view('eleccion/pop_coaliciones');
	}	
	
	public function insertar_coaliciones(){			print_r($_POST);			exit();
		
		
		
	}
}
