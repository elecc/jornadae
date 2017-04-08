<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plantilla_general extends Platilla_controller {
	
	function __construct(){
		parent::__construct();
		
	}
	
	//Pagina principal
	public function index(){
		//$this->setNameMenu('modulo');
		
		$this->load->helper('url');
		
		$formulario = '<form><input type="text" value="x"></form>';
		
		$division2 = array('area'=> 'divisionTrabajo',
		'parameters'=> array('hola'=>$formulario));
		
		/*$formulario = '<form><input type="text" value="x"></form>';
		$division1 = array( 'area' => 'menuLateral',
		'parameters'=> array());
		$division2 = array('area'=> 'divisionTrabajo',
		'parameters'=> array('hola'=>$formulario));
		$this->build(array($division1,$division2));
		 * 
		 */
		//$this->setNameMenu('modulo');
		
		
		$this->build(array($division2));
	}
	
	
}
 