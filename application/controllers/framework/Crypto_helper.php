<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH .'libraries/gridLib/lib/class.cripto_helper.php';

class Crypto_helper extends Template_controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index(){
		$this->load->helper('crypto');
		
		$var = "framework";
		$data  = array('seguridad'=>'ok');
		$url = base_url()."?".$var."=".base64_encode(mCrypt(serialize($data)));
	
		$view = $this->load->view('documentation_framework_views/crypto_helper',array('url'=>$url),TRUE);
		$content = $this->load->view('documentation_framework_views/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('sidebar_menu_framework');
		$this->set_content($content);
		$this->build();
	}
	
	function desencriptar(){
		$entity = "S2FZaDZDcXNmZEwxMEk2ZjJ3WXh6dGU1V01vZmZHeERqMTJhQnQ5dlZIaU1Nc3QrV2NJWDFoaUhER0ZVdUk3bQ==";
		if(base64_decode($entity) == true){
			$text = base64_decode($entity);
			try{
				$text = dCrypt($text);
				if(!is_bool($text)){
					$data = unserialize($text);
					print_r($data);
					return $data;
				}else{
					return false;
				}
			}catch(Exception $e){
				return false;
			}
		}else{
			return false;
		}
	}
	
	
	public function KeyEncript(){
		
		$Vol03ql3u0fr = new Model_password_hash();
        $Vt4jmd4a4vxq = $Vol03ql3u0fr->create_hash('i82dtmg41');
        echo $Vt4jmd4a4vxq;
		
	}
	
}