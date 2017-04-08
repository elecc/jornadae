<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Debug extends Plantilla_controller {
	
	function __construct(){
		parent::__construct();
		$this->sPATH(dirname(__FILE__));
		$this->sClass(get_class($this));
	}
	
	public function index(){
		$this->load->helper('url');
		$html = $this->control();
		$this->setNameMenu('grid');
		$division = array('area'=>'documentation_grid_views/ejemplo1','parameters'=>array('html'=>$html));
		$this->build(array($division));
	}
	
	public function gConfig(){
		$eS = new Model_engine();
		$eS->sDB($this->db);
		$eS->sPATH($this->gPath());
		$eS->sIdTable('tiposDato');
		$eS->sSERVERRUTE('serverProcessing');
	
		$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_CATALOG');

		$eS->sTitle('Tipos de dato');
		$eS->table($table);
		return $eS;
	}
	
	public function control(){
		return $this->gGrid($this->gConfig());
	}
	
	public function serverProcessing(){
		$eS = $this->gConfig();
		$output = $eS->serverProcessing($_POST);
		echo json_encode($output);
	}
}
