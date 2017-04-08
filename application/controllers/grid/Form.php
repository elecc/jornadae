<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FORM extends Template_controller {
	
	function __construct(){
		parent::__construct();
		$this->sPATH(dirname(__FILE__));
		$this->sClass(get_class($this));
	}
		
	public function index(){
		$title = 'Funci&oacute;n gForm (config array)';
		$grid = $this->control();
		$view = $this->load->view('documentation_grid_views/form',array('grid'=>$grid),TRUE);
		$content = $this->load->view('documentation_grid_views/base_view',array('title'=>$title,'view'=>$view,'grid'=>$grid),TRUE);
		$this->set_menu('sidebar_menu');
		$this->set_content($content);
		$this->build();
	}
	
	private function gConfig(){
		$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_GRID_CATALOG');
		$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_CATALOG','CATALOG'=>array());

		
		$config['sIdTable'] = 'tiposDato';
		$config['sPath'] = $this->gPath();
		$config['table'] = $table;
		$config['sTitle'] = 'Tipos de dato';
		$config['db']['username'] = 'desarrollo';
		$config['db']['password'] = '.desarrollo.';
		$config['db']['connection_string'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.1.130.24)(PORT=1521))(CONNECT_DATA=(SID=desorcl)))';
		$config['db']['dbdriver'] = 'oci8';
		$config['sRedirectForm'] = 'form/postForm';
		
		return $config;
	}
	
	public function postForm(){
		$this->save();	
		echo "Ejemplo Form";
		print_r($_POST);
	}
	
	public function control(){
		return $this->gForm($this->gConfig());
	}	
}
