<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ejemplo_multi_grid extends Template_controller {
	
	function __construct(){
		parent::__construct();
		$this->sPATH(dirname(__FILE__));
		$this->sClass(get_class($this));
	}
	
	public function index(){
		$title = 'Ejemplo Multi GRID';
		$grid = $this->control();
		$grid.= "<br>".$this->controlGrid2();	
		$view = $this->load->view('documentation_grid_views/ejemplo_multi_grid',array('grid'=>$grid),TRUE);
		$content = $this->load->view('documentation_grid_views/base_view',array('title'=>$title,'view'=>$view,'grid'=>$grid),TRUE);
		$this->set_menu('sidebar_menu');
		$this->set_content($content);
		$this->build();
	}
	
	/*Configuracion del Primer GRID*/
	
	private function gConfig(){
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
	
	/*Configuracion del Segundo GRID*/
	
	private function gConfigGrid2(){
		$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_GRID_CATALOG');
		
		$config['sIdTable'] = 'tiposDatoCatalog';
		$config['server_rute'] = 'serverProcessingGrid2';
		$config['sPath'] = $this->gPath();
		$config['table'] = $table;
		$config['sTitle'] = 'Tipos de dato Grid 2';
		$config['db']['username'] = 'desarrollo';
		$config['db']['password'] = '.desarrollo.';
		$config['db']['connection_string'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.1.130.24)(PORT=1521))(CONNECT_DATA=(SID=desorcl)))';
		$config['db']['dbdriver'] = 'oci8';
		
		return $config;
	}
	
	private function controlGrid2(){
		return $this->gGrid($this->gConfigGrid2());
	}
	
	public function serverProcessingGrid2(){
		$eS = $this->gModel_engine($this->gConfigGrid2());
		$output = $eS->serverProcessing($_POST);
		echo json_encode($output);
	}
	
}
