<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plantilla_controller_full_page extends Login{

	public function login(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('usr', 'Usuario', 'trim|min_length[2]|required');
		$this->form_validation->set_rules('pwd', 'Contrase&ntilde;a', 'trim|min_length[2]|required|md5');
		$this->form_validation->set_rules('correo', 'Correo', 'trim|min_length[2]|required|valid_email');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('inicio_full_page/inicio_full_page');
		}else{
			if(isset($_GET['security'])){
				$data = dcryptURL($_GET['security']);
				if(!is_bool($data)){
					$this->engine($data,$_POST);
				}
			}
		}
	}
	
	private function engine($array,$parameters=array()){
		if(isset($array['model']) && isset($array['function'])){
			$model = $array['model'];
			
			$function = $array['function'];
			
			$result = $this->$function($model,$parameters);
			
			//$result = true;
			
			if($result){
				
				$correo = $parameters['correo'];
				$today = date("Ymd");
				$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
				$unique = $today . $rand . strtoupper(md5($correo));
				
				$this->db->query("INSERT INTO REGISTRO_FRAMEWORK(IDREGISTRO,CORREO,FECHA_VISITA) VALUES ('$unique','$correo',SYSDATE)");
				
				$this->load->helper('url');
				
				redirect(ACCESO_PRINCIPAL_APLICACION);
				
			}else{
				$data['error'] = 1;
				$data['mensaje'] = 'Usuario y Contrase&ntilde;a invalido.';
			
				$this->load->view('inicio_full_page/inicio_full_page',$data);
			}
			
		}
	}	
}

?>