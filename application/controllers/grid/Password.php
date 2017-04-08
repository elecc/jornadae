<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Password extends Template_controller {
	
	function __construct(){
		parent::__construct();
		$this->sPATH(dirname(__FILE__));
		$this->sClass(get_class($this));
	}
	
	public function index(){
		$title = 'Propiedad INPUT_TYPE_PASSWORD';
		$grid = $this->control();
		$view = $this->load->view('documentation_grid_views/password',array('grid'=>$grid),TRUE);
		$content = $this->load->view('documentation_grid_views/base_view',array('title'=>$title,'view'=>$view,'grid'=>$grid),TRUE);
		$this->set_menu('sidebar_menu');
		$this->set_content($content);
		$this->build();
	}
	
	private function gConfig(){
		$properties['TDG_VARCHAR2_SIZE20']['INPUT_TYPE_PASSWORD'] = true;
		
		$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_GRID');
		
		$config['sIdTable'] = 'tiposDato';
		$config['server_rute'] = 'serverProcessing';
		$config['sPath'] = $this->gPath();
		$config['table'] = $table;
		$config['sTitle'] = 'Tipos de dato';
		$config['db']['username'] = 'desarrollo';
		$config['db']['password'] = '.desarrollo.';
		$config['db']['connection_string'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.1.130.24)(PORT=1521))(CONNECT_DATA=(SID=desorcl)))';
		$config['db']['dbdriver'] = 'oci8';
		$config['properties'] = $properties;
		
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
