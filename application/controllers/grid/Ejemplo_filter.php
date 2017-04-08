<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ejemplo_filter extends Template_controller {
	
	function __construct(){
		parent::__construct();
		$this->sPATH(dirname(__FILE__));
		$this->sClass(get_class($this));
	}
	
	public function index(){
		$title = 'Filtro AND';
		$grid = $this->control();
		$view = $this->load->view('documentation_grid_views/ejemplo_filter',array('grid'=>$grid),TRUE);
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
		
		return $config;
	}
	
	private function control(){
		return $this->gGrid($this->gConfig());
	}
	
	public function serverProcessing(){
		$eS = $this->gModel_engine($this->gConfig());
		$array_query = array();
		$array_qtype = array();
   
        if(isset($_POST['query']) && strlen($_POST['query'])>=1){
            array_push($array_query,$_POST['query']);
            array_push($array_qtype, $_POST['qtype']);
        }
   
        array_push($array_query,1);
        array_push($array_qtype,'DESARROLLO.TIPOS_DATOS_GRID.TDG_NUMBER');
        
        $_POST['query'] = $array_query;
        $_POST['qtype'] = $array_qtype;
        
		$output = $eS->serverProcessing($_POST);
		echo json_encode($output);
	}	
	
}