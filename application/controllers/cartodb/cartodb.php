<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cartodb extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		$title = "Mapas Electorales";
		$view = $this->load->view('cartodb/maps_mich','',TRUE);
		$content = $this->load->view('cartodb/base_carto',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_cartodb');
		$this->set_bar_footer('sidebar_footer_cartodb');
		$this->set_content($content);
		$this->build();
	}

	public function indicadores(){
		
		//$view = $this->load->view('Inicio/estadisticas','',TRUE);
		$title = "Mapas Electorales";
		$view = $this->load->view('cartodb/maps_indicadores','',TRUE);
		$content = $this->load->view('cartodb/base_carto_blank',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_cartodb');
		$this->set_bar_footer('sidebar_footer_cartodb');
		$this->set_content($content);
		$this->build();
	}

	public function simpatizantes(){
		
		//$view = $this->load->view('Inicio/estadisticas','',TRUE);
		$title = "Mapas Electorales";
		$view = $this->load->view('cartodb/maps_simpatizantes','',TRUE);
		$content = $this->load->view('cartodb/base_carto_blank',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('menu_cartodb');
		$this->set_bar_footer('sidebar_footer_cartodb');
		$this->set_content($content);
		$this->build();
	}





}