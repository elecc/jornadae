<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Creaeleccion extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		$title = "Crea Elección";
		$view = $this->load->view('eleccion/creaeleccion','',TRUE);
		$content = $this->load->view('eleccion/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
	
	public function pop_creaeleccion(){
		$this->load->view('eleccion/pop_eleccion');
	}	
	
	public function insertar_eleccion(){			print_r($_POST);			exit();
		
		
		
	}
}
