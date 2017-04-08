<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Template_controller extends Controller_grid{

	var $CONFIG_TEMPLATE;
	var $MENU;
	var $BAR_FOOTER = "sidebar_footer";
	var $CONTENT;
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION)){
			session_start();
		}
	
		$var_session = 'app'.md5(base_url()).'_access';
		
		/*if(!isset($_SESSION[$var_session])){
			redirect(base_url());
		}*/
		
		$this->CONFIG_TEMPLATE['theme'] = 'base/template_modern';
	}

	public function init_doc(){
		$this->load->view($this->CONFIG_TEMPLATE['theme'].'/init_doc');
	}
		
	public function end_doc(){
		$this->load->view($this->CONFIG_TEMPLATE['theme'].'/end_doc');
	}
	
	public function container_body(){
		return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/container_body',array('sidebar_menu'=>$this->sidebar_menu(),'sidebar_footer'=>$this->sidebar_footer(),'top_nav'=>$this->top_nav(),'page_content'=>$this->page_content()),TRUE);
	}
	
	public function sidebar_menu(){
		return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/'.$this->MENU,'',TRUE);
	}
	
	public function sidebar_footer(){
		return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/'.$this->BAR_FOOTER,'',TRUE);
	}
	
	public function body(){
		$this->load->view($this->CONFIG_TEMPLATE['theme'].'/body',array('container_body'=>$this->container_body(),'scripts'=>$this->scripts()));
	}
	
	public function head(){
		$this->load->view($this->CONFIG_TEMPLATE['theme'].'/head');
	}
	
	public function set_menu($menu){
		$this->MENU = $menu;
	}
	
	//PARA PERSONALIZAR EL MENU SIDEBAR_FOOTER
	public function set_bar_footer($menu_footer){
		$this->BAR_FOOTER = $menu_footer;
	}
	
	public function top_nav(){
		return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/top_nav','',TRUE);
	}
	
	public function build(){
		$this->init_doc();
		$this->head();
		$this->body();
		$this->end_doc();
	}
	
	public function scripts(){
		return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/scripts','',TRUE);
	}
	
	public function page_content(){
		return $this->load->view($this->CONFIG_TEMPLATE['theme'].'/page_content',array('content'=>$this->CONTENT),TRUE);
	}

	public function set_content($content){
		$this->CONTENT = $content;
	}
	
	public function session_kill(){
		if(isset($_SESSION)){
			session_destroy();
			redirect(base_url(''));
		}
	}
	
}
	