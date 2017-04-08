<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio_full_page extends Plantilla_controller_full_page {
	
	function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		//$this->load->helper('form');
		//$this->load->library('form_validation');
	}
	
	function index(){		
		$this->login();
	}
}