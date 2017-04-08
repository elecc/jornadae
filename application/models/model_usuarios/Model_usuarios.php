<?php 
class Model_usuarios extends CI_Model{
	var $DB;
	function __construct() {
        parent::__construct();
		$this->DB = $this->load->database(DB_USUARIOS,TRUE);
    }
	
	//Registra sesión
	public function registraSesion($session_id,$idAplicacion,$usr,$tipoAcceso = array()){
		$this->aseguraSesion($session_id);		
		$sql = "select OWUSER.SEQ_SESION_USUARIO.nextval as siguiente from dual";
		$sqlq = $this->DB->query($sql);	
		
		if(!is_null($sqlq)){
			if(!is_null($sqlq->result_array())){
				$id_su = $sqlq->result_array();	
				$id_su = $id_su[0]['SIGUIENTE'];
			}	
		}
		
		$usrInformacion = $this->obtieneUsuario($usr);
		$idUsuario = $usrInformacion[0]['ID_USUARIO'];
		$sql = "insert into OWUSER.SESION_USUARIO(
					ID_SU,
					SESSION_ID,
					ID_USUARIO,
					ID_APLICACION,
					FECHA_INICIO
				)
				values(
					?,
					?,
					?,
					?,
					SYSDATE
				)";
		$datos = array($id_su,$session_id,$idUsuario,$idAplicacion);
		$this->DB->query($sql,$datos);	
		
		if(!empty($tipoAcceso)){
			foreach($tipoAcceso as $ta){
				$sql = "insert into OWUSER.SESION_DETALLE(
							ID_SU,
							ID_TIPOACCESO
						)
						values(
							?,
							?
						)" ;
				$datos = array($id_su,$ta);
				$this->DB->query($sql,$datos);	
			}
		}
	
	}
	
	//Obtiene información del usuario
	public function obtieneUsuario($usr){
		$sql = "select * from OWUSER.CAT_USUARIO where LOGIN = '".$usr."'";
		$sqlq = $this->DB->query($sql);	
		
		$usrInformacion = array();
		
		if(!is_null($sqlq)){
			if(!is_null($sqlq->result_array())){
				$usrInformacion = $sqlq->result_array();	
			}	
		}
		
		return $usrInformacion;		
	}
	
	//Asegura que sea la unica sesión
	private function aseguraSesion($session_id){
		$sql="update OWUSER.SESION_USUARIO set FECHA_FIN = SYSDATE where SESSION_ID = ?";
		$this->DB->query($sql,array($session_id));
	}
	
	//Entrega el dato validado segun la sesión y el tipo de acceso
	public function obtieneTipoAccesoValidado($session_id,$tipoAcceso){
		$sql = "select * from OWUSER.SESION_DETALLE
				where 
				  ID_SU in(
				    select ID_SU from OWUSER.SESION_USUARIO
				    where
				    SESSION_ID = ? and
				    FECHA_FIN is NULL
				  ) and
				  ID_TIPOACCESO = ? and
				  VALIDACION IS NOT NULL";
		$datos = array($session_id,$tipoAcceso);
		$sqlq = $this->DB->query($sql,$datos);
		
		$datos = array();
		if(!is_null($sqlq)){
			if(!is_null($sqlq->result_array())){
				$datos = $sqlq->result_array();
			}
		}
		
		return $datos;
	}
	
	//Entrega los tipos de acceso no validado de la sesión
	public function obtieneTiposAccesoNoValidados($session_id){
		$sql = "select * from OWUSER.SESION_DETALLE
				where 
				  ID_SU in(
				    select ID_SU from OWUSER.SESION_USUARIO
				    where
				    SESSION_ID = ? and
				    FECHA_FIN is NULL
				  ) and
				  VALIDACION IS NULL";
		$datos = array($session_id);
		$sqlq = $this->DB->query($sql,$datos);
		
		$datos = array();
		if(!is_null($sqlq)){
			if(!is_null($sqlq->result_array())){
				$datos = $sqlq->result_array();
			}
		}
		
		return $datos;
	}
	
}
?>