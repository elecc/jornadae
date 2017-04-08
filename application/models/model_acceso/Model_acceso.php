<?php 

class Model_acceso extends CI_Model {

    
    function __construct() {
        parent::__construct();
    }
    
	
	public function acceso($usr,$pwd){
		
		$this->load->library("nusoap_lib");
		$client = new nusoap_client(WS_USUARIOS_ADDRESS);		
		$error = $client->getError();
		if ($error){
				return FALSE;
		}
		
		$param = array('usuario'=>$usr,'password'=>$pwd,'aplicacion'=>ID_APLICACION,'ip'=>'','sess'=>session_id());
		
		$result = $client->call('validaAccesoPrincipal', $param);
		
		if ($client->fault){
			return FALSE;
		}else{
			$error = $client->getError();
			if ($error){
				return false;
			}else{   
			
				$this->load->model('model_usuarios/model_usuarios');
				$mU = new Model_usuarios();
				
				if($result['acceso']==1){
					$this->load->model('model_usuarios/model_usuarios');
					$mU = new Model_usuarios();
					if(!isset($_SESSION))
						session_start();
					
					$_SESSION['data_user'.md5(base_url())] = json_decode($result['data']);
					
					$mU->registraSesion(session_id(),ID_APLICACION,$usr);
					return TRUE;
				}else{
					return FALSE;
				}
				
			}
		}		
		
		return FALSE;
	}
	
	
	    
}
?>