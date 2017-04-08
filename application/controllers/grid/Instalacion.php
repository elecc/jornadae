<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instalacion extends Plantilla_controller {

	function __construct(){
		parent::__construct();
		
	}
	
	
	public function index(){
		$this->load->helper('url');
		
		$this->setSelectedMenu('framework');
		
		$division = array('area'=>'documentation_grid_views/instalacion','parameters'=>array());
		
		$this->build(array($division));
	}
	
	
}
 
