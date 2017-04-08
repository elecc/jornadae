<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Simpatizantes extends Template_controller {
	
	function __construct(){
		parent::__construct();
		$this->sPATH(dirname(__FILE__));
		$this->sClass(get_class($this));
	}
	
	public function index(){
		$title = 'Simpatizantes';
		$grid = $this->control();	
		$view = $this->load->view('catalogos/estados','',TRUE);
		$content = $this->load->view('documentation_grid_views/base_view',array('title'=>$title,'view'=>$view,'grid'=>$grid),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}

	private function gConfig(){
		$table[] = array('TABLE_NAME'=>'SIMPATIZANTE');
		
		$config['sIdTable'] = 'tiposDato';
		$config['server_rute'] = 'serverProcessing';
		$config['sPath'] = $this->gPath();
		$config['table'] = $table;
		$config['sTitle'] = 'Tipos de dato';
		
		$config['db']['username'] = 'SYSTEM';
		$config['db']['password'] = 'finanzas';
		$config['db']['connection_string'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=localhost)(PORT=1521))(CONNECT_DATA=(SID=orcl)))';
		$config['db']['dbdriver'] = 'oci8';
		
		return $config;
	}
	
	private function control(){
		return $this->gGrid($this->gConfig());
	}
	
	public function serverProcessing(){
		$eS = $this->gModel_engine($this->gConfig());
		$output = $eS->serverProcessing($_POST);
		echo json_encode($output);
	}	
}
