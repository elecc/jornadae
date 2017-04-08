<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Votosrequeridos extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		$title = "Votos requeridos de Elección";
		$view = $this->load->view('eleccion/votosrequeridos','',TRUE);
		$content = $this->load->view('eleccion/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
	
	public function pop_votosrequeridos(){
		$this->load->view('eleccion/pop_votosrequeridos');
	}	
	
	public function insertar_votosrequeridos(){			print_r($_POST);			exit();
		
		
		
	}
}
