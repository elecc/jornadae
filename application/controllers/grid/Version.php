<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Version extends Plantilla_controller {

	function __construct(){
		parent::__construct();
		
	}
	
	
	public function index(){
		$this->load->helper('url');
		
		$this->setSelectedMenu('framework');
		
		$division = array('area'=>'documentation_grid_views/version','parameters'=>array());
		
		$this->build(array($division));
	}
	
	public function initDoc(){
		
		print_r($_GET);
		
		$file = $_GET['file'];
		
		$this->load->helper('url');
		
		$this->setSelectedMenu('grid');
		
		$division = array('area'=>'documentation_grid_views/version_changes','parameters'=>array('file'=>$file));
		
		$this->build(array($division));
	}
	
	
}
 
