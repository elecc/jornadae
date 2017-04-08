<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Je extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		$title = "Jornada Electoral";
		$view = $this->load->view('je/je','',TRUE);
		$content = $this->load->view('je/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
	
	public function pop_je(){
		$this->load->view('je/pop_je');
	}	
	
	public function insertar_je(){			print_r($_POST);			exit();
		
		
		
	}
}
