<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormEstados extends Template_controller {
	
	function __construct(){
		parent::__construct();
		$this->sPATH(dirname(__FILE__));
		$this->sClass(get_class($this));
	}
		
	public function index(){
		$title = 'Formulario Estados';
		$grid = $this->control();
		//$view = $this->load->view('documentation_grid_views/form',array('grid'=>$grid),TRUE);
		$view = $this->load->view('catalogos/estados','',TRUE);
		$content = $this->load->view('documentation_grid_views/base_view',array('title'=>$title,'view'=>$view,'grid'=>$grid),TRUE);
		$this->set_menu('menu_default');
		$this->set_content($content);
		$this->build();
	}
	
	private function gConfig(){
		$table[] = array('TABLE_NAME'=>'ESTADO');
		
		$config['sIdTable'] = 'tiposDato';
		$config['sPath'] = $this->gPath();
		$config['table'] = $table;
		$config['sTitle'] = 'Tipos de dato';
		/*$config['db']['username'] = 'desarrollo';
		$config['db']['password'] = '.desarrollo.';
		$config['db']['connection_string'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.1.130.24)(PORT=1521))(CONNECT_DATA=(SID=desjornadae)))';
		$config['db']['dbdriver'] = 'oci8';
		$config['sRedirectForm'] = 'form/postForm';*/
		$config['db']['username'] = 'SYSTEM';
		$config['db']['password'] = 'finanzas';
		$config['db']['connection_string'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=localhost)(PORT=1521))(CONNECT_DATA=(SID=orcl)))';
		$config['db']['dbdriver'] = 'oci8';
		
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