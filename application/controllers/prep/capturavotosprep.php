<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capturavotosprep extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		$title = "Captura de votos PREP";
		$view = $this->load->view('prep/capturavotosprep','',TRUE);
		$content = $this->load->view('prep/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
	
	public function pop_capturavotoscr(){
		$this->load->view('prep/pop_capturavotosprep');
	}	
	
	public function insertar_capturavotosprep(){			print_r($_POST);			exit();
		
		
		
	}
}
