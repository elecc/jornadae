<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partidoeleccion extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		$title = "Partidos de Elección";
		$view = $this->load->view('eleccion/partidoeleccion','',TRUE);
		$content = $this->load->view('eleccion/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
	
	public function pop_partidoeleccion(){
		$this->load->view('eleccion/pop_partidoeleccion');
	}	
	
	public function insertar_partidoeleccion(){			print_r($_POST);			exit();
		
		
		
	}
}
