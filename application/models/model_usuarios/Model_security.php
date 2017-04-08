<?php 
class Model_security extends CI_Model{
		
		var $idUsuario;
		var $idPersona;
		
		function __construct() {
            parent::__construct();
        	
        }

		//Obtiene los datos necesarios del usuario
		public function getUser($usuario){
			$id_usuario = $this->db->query("SELECT ID_USUARIO,STATUS,ID_PERSONA FROM OWUSERS.CAT_USUARIO WHERE LOGIN=?",array($usuario))->result_array();
			return $id_usuario;
		}

		public function existUser($usuario,$password){

			$valid = $this->validUser($usuario,$password);
			
			if($valid){
				$error_number = 4;
				$message = "Usuario Enconctrado";
			}else{
				$message = "Usuario no Encontrado";
				$error_number = 1;
			}
			
	 		$json_result['RESULT'] = array();
	 		$json_result['MESSAGE'] = $message;
	 		$json_result['ERROR_NUMBER'] = $error_number;
	 		
	 		return json_encode($json_result);
	 		
	 	}
	 	
	 	public function validUser($sess,$app){
	 		$sql = "select a.ID_USUARIO,b.ID_PERSONA 
	 				from OWUSERS.SESION_USUARIO a, OWUSERS.CAT_USUARIO b
	 				where
	 					a.ID_USUARIO = b.ID_USUARIO and
	 					a.SESSION_ID = ? and
	 					a.ID_APLICACION = ? and
	 					a.FECHA_FIN is NULL and
	 					b.STATUS = 'A'";
	 		$query = $this->db->query($sql, array($sess,$app) );
	 		if($query->num_rows() > 0){
	 			$datos = $query->result_array();
				$this->idUsuario = $datos[0]['ID_USUARIO'];
				$this->idPersona = $datos[0]['ID_PERSONA'];
	 			return true;
	 		}else{
	 			return false;
	 		}
	 	}
	 	
	 	
	 	public function getHuellas($sess,$app){
	 		$json_result = array();
	 		
	 		if($this->validUser($sess,$app)){
			 	
				$sql = "select HUELLA as KEY 
				        from OWUSERS.CAT_HUELLA
				        where ID_PERSONA = ?";
				
	 			$data = $this->db->query($sql, array($this->idPersona));
	 			
		 		if($data->num_rows()>0){
		 			$data = $data->result_array();
		 			$data = $data[0];
		 			$blob = $data['KEY'];
		 			$cad = (string)$blob->read($blob->size());
		 			$data['KEY'] = base64_encode($cad);
		 			//$data['KEY'] = bin2hex($data['KEY']);
		 			$json_result['RESULT'] = $data;
		 			$json_result['MESSAGE'] = 'Acceso permitido';
		 			$json_result['ERROR_NUMBER'] = 4;
		 			
		 			//print_r($json_result);
		 			
		 		}else{
		 			$json_result['RESULT'] = array();
		 			$json_result['MESSAGE'] = 'No hay huellas';
		 			$json_result['ERROR_NUMBER'] = 2;
		 		}
				
		
	 		}else{
	 			$json_result['RESULT'] = array();
	 			$json_result['MESSAGE'] = 'Acceso no permitido';
	 			$json_result['ERROR_NUMBER'] = 3;
	 		}
	 		return  json_encode($json_result);
	 	}
	 	
	 	function saveDactilar($usuario,$huellaDactilar){
	 		
	 		$id_usuario = $this->getUser($usuario);
	 		
	 		$json_result = array();
	 		
	 		if(!empty($id_usuario)){
	 			
	 			if($id_usuario[0]['STATUS'] == 'A'){
	 			
		 			$id_usuario = $id_usuario[0]['ID_USUARIO'];
					$id_persona = $id_usuario[0]['ID_PERSONA'];
		 			
		 			$valida_huella = $this->db->query("SELECT COUNT(*) AS COUNT FROM OWUSERS.CAT_HUELLA WHERE ID_PERSONA=?",array($id_persona))->result_array();
		 			
		 			if(empty($valida_huella) || $valida_huella[0]['COUNT'] == 0){
		 				
						$sql = "select OWUSERS.SEQ_CAT_HUELLA.nextval as siguiente from dual";
						$sqlq = $this->db->query($sql);	
						
						if(!is_null($sqlq)){
							if(!is_null($sqlq->result_array())){
								$idHuella = $sqlq->result_array();	
								$idHuella = $id_su[0]['SIGUIENTE'];
							}	
						}
						
		 				$this->db->query("INSERT INTO OWUSERS.CAT_HUELLA(ID_HUELLA,ID_PERSONA,HUELLA) 
		 				                  VALUES(?,?,?)", array($idHuella,$id_persona,$huellaDactilar));
		 				
		 				$json_result['RESULT'] = array();
		 				$json_result['MESSAGE'] = 'Se inserto la huella '; 
		 				$json_result['ERROR_NUMBER'] = 4;
		 				
		 			}else{
		 				$json_result['RESULT'] = array();
		 				$json_result['MESSAGE'] = 'El usuario ya tiene asignada una huella';
		 				$json_result['ERROR_NUMBER'] = 3;
		 			}
		 			
	 			}else{
	 				$json_result['RESULT'] = array();
	 				$json_result['MESSAGE'] = 'El usuario se encuentra inactivo';
	 				$json_result['ERROR_NUMBER'] = 2;
	 			}
	 		}else{
	 				$json_result['RESULT'] = array();
	 				$json_result['MESSAGE'] = 'El nombre de usuario no existe';
	 				$json_result['ERROR_NUMBER'] = 1;
	 		}
	 		
	 		
	 		return json_encode($json_result);
	 		
	 		
	 	}
        
        function updateDactilar($usuario,$huellaDactilar){
        	
        	$id_usuario = $this->getUser($usuario);
	 		
	 		$json_result = array();
        	
        	if(!empty($id_usuario)){
        		
        		if($id_usuario[0]['STATUS'] == 'A'){
        			
        			$id_usuario = $id_usuario[0]['ID_USUARIO'];
					$id_persona = $id_usuario[0]['ID_PERSONA'];
        			
        			$valida_huella = $this->db->query("SELECT COUNT(*) AS COUNT FROM OWUSERS.CAT_HUELLA WHERE ID_PERSONA=?",array($id_persona))->result_array();
		 			
		 			if($valida_huella[0]['COUNT'] == 1){
        				
        				$this->db->query("UPDATE OWUSERS.CAT_HUELLA SET HUELLA=? WHERE ID_PERSONA=?", array($huellaDactilar,$id_persona));
        					
        				$json_result['RESULT'] = array();
        				$json_result['MESSAGE'] = 'Se actualizo la huella ';
        				$json_result['ERROR_NUMBER'] = 4;
        				
        			}else{
        				$json_result['RESULT'] = array();
		 				$json_result['MESSAGE'] = 'No se encontro la huella del usuario';
		 				$json_result['ERROR_NUMBER'] = 3;
        			}
        			
        		}else{
	 				$json_result['RESULT'] = array();
	 				$json_result['MESSAGE'] = 'El usuario se encuentra inactivo';
	 				$json_result['ERROR_NUMBER'] = 2;
	 			}
        	}else{
	 				$json_result['RESULT'] = array();
	 				$json_result['MESSAGE'] = 'El nombre de usuario no existe';
	 				$json_result['ERROR_NUMBER'] = 1;
	 		}
	 		return json_encode($json_result);
        }
        
        
        function deleteDactilar($usuario,$huellaDactilar){
        	
        	$id_usuario = $this->getUser($usuario);
	 		
	 		$json_result = array();
        	 
        	if(!empty($id_usuario)){
        
        		if($id_usuario[0]['STATUS'] == 'A'){
        			 
        			$id_usuario = $id_usuario[0]['ID_USUARIO'];
					$id_persona = $id_usuario[0]['ID_PERSONA'];
        			 
        			$valida_huella = $this->db->query("SELECT COUNT(*) AS COUNT FROM OWUSERS.CAT_HUELLA WHERE ID_PERSONA=?",array($id_persona))->result_array();
		 			
        			if(!empty($valida_huella) || $valida_huella[0]['COUNT'] == 1){
        
        				$this->db->query("DELETE OWUSERS.CAT_HUELLA WHERE ID_PERSONA=?", array($id_persona));
        				 
        				$json_result['RESULT'] = array();
        				$json_result['MESSAGE'] = 'Se elimino la huella del usuario '.$usuario;
        				$json_result['ERROR_NUMBER'] = 4;
        
        			}else{
		 				$json_result['RESULT'] = array();
		 				$json_result['MESSAGE'] = 'No se encotro el registro de huella dactilar ';
		 				$json_result['ERROR_NUMBER'] = 3;
		 			}
        			 
        		}else{
        			$json_result['RESULT'] = array();
        			$json_result['MESSAGE'] = 'El usuario se encuentra inactivo';
        			$json_result['ERROR_NUMBER'] = 2;
        		}
        	}else{
        		$json_result['RESULT'] = array();
        		$json_result['MESSAGE'] = 'El nombre de usuario y huella dactilar no existe';
        		$json_result['ERROR_NUMBER'] = 1;
        	}
        	return json_encode($json_result);
        }
	 	
}
?>