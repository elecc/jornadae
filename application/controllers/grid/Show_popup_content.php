<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SHOW_POPUP_CONTENT extends Template_controller {
	
	function __construct(){
		parent::__construct();
		$this->sPATH(dirname(__FILE__));
		$this->sClass(get_class($this));
	}
	
	public function index(){
		$title = 'Config showPOPUPCONTENT (BOOLEAN,URL,TEXT_COLUMN)';
		$grid = $this->control();
		$view = $this->load->view('documentation_grid_views/show_popup_content',array('grid'=>$grid),TRUE);
		$content = $this->load->view('documentation_grid_views/base_view',array('title'=>$title,'view'=>$view,'grid'=>$grid),TRUE);
		$this->set_menu('sidebar_menu');
		$this->set_content($content);
		$this->build();
	}
	
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
		$config['showPOPUPCONTENT']['visible'] = true;
		$config['showPOPUPCONTENT']['url'] = 'grid/show_popup_content/ejemploPOPUPCONTENT';
		$config['showPOPUPCONTENT']['show_popup_content_text'] = 'Ver';
				
		return $config;
	}
	
	public function ejemploPOPUPCONTENT(){
		
		echo "Esto es un EJEMPLO";
		echo "<pre>";
		print_r($_POST);
		
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
