<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

	public function acceso($model,$parameters){
			
		$this->load->model($model,"acceso");
		
		$usr = $parameters['usr'];
		$pwd = $parameters['pwd'];
		
		$acceso = $this->acceso->acceso($usr,$pwd);
		
		if($acceso){
		
			if(!isset($_SESSION))
				session_start();
				
				$_SESSION['app'.md5(base_url()).'_access'] = 1;
				$_SESSION['usr'] = $usr;
				
				return TRUE;
					
		}else{
			return FALSE;
		}
	}	
	
	
}

?>