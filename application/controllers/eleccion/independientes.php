<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Independientes extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		$title = "Independientes de Elección";
		$view = $this->load->view('eleccion/independientes','',TRUE);
		$content = $this->load->view('eleccion/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
	
	public function pop_independientes(){
		$this->load->view('eleccion/pop_independientes');
	}	
	
	public function insertar_independientes(){			print_r($_POST);			exit();
		
		
		
	}
}
