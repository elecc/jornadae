<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Simple_map extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$title = 'Ejemplo Simple Map';
		$this->load->library('map');
		$map = new Map();
		$map = $map->SimpleMap('ejemplo', '19.4233254', '-99.1508042','Mapa de Ejemplo');
		$view = $this->load->view('documentation_map_views/simple_map','',TRUE);
		$content = $this->load->view('documentation_map_views/base_view',array('title'=>$title,'view'=>$view,'map'=>$map),TRUE);
		$this->set_menu('sidebar_menu_map');
		$this->set_content($content);
		$this->build();
	}	
}
