<?php  
class Modelo_usuarios extends CI_Model{	
	
	public function construct__() {
		parent::__construct();
	}
	
	//FUNCIONES PARA EL LOGIN
	public function consultar_usuario($user, $pass){
					
			$sql = "SELECT * FROM USUARIO WHERE LOGIN='".$user."' AND PASSWORD ='".$pass."' ";
			
			$this->db->trans_start();
			$rs = $this->db->query($sql);
			$this->db->trans_complete();
			if($this->db->trans_status() === FALSE){return 0;}else{return $rs;}				
			//if($this->db->trans_status() === FALSE){return 0;}else{return 1;}
	}
	
	public function consultar_upp($id_usuario){
			
			$sql = "SELECT * FROM USUARIO_PERSONA_PERFIL WHERE ID_USUARIO=".$id_usuario." ";
			$this->db->trans_start();
			$rs = $this->db->query($sql);
			$this->db->trans_complete();
			if($this->db->trans_status() === FALSE){return 0;}else{return $rs;}				
	}
	
	public function consultar_persona($id_persona){
			
			$sql = "SELECT * FROM PERSONA WHERE ID_PERSONA=".$id_persona." ";
			$this->db->trans_start();
			$rs = $this->db->query($sql);
			$this->db->trans_complete();
			if($this->db->trans_status() === FALSE){return 0;}else{return $rs;}				
	}
	
	public function consultar_perfil($id_perfil){			//CONSULTA TODOS LOS DATOS DEL ENTE, SEGUN SU ID_AREADOMICILIO
			
			$sql = "SELECT * FROM PERFIL WHERE ID_PERFIL = ".$id_perfil."";
			$this->db->trans_start();
			$rs = $this->db->query($sql);
			$this->db->trans_complete();
			if($this->db->trans_status() === FALSE){return 0;}else{return $rs;}				
	}			//consulta_domicilio
	
	//METODOS GLOBALES
	public function consultar_catalogo($catalogo,$criterios,$orden){			//01 USADISIMO PARA TODOS LOS CATALOGOS
		
		if($criterios!="") $criterios=" where ".$criterios;
		if($orden!="") $orden=" order by ".$orden;
		$sql = "SELECT * FROM ".$catalogo." " .$criterios. " " .$orden;			//echo $sql; exit();
		
		$this->db->trans_start();
		$rs = $this->db->query($sql);			//echo "<pre>"; print_r($rs); exit();
		
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){return 0;}else{return $rs;}
	}
	
	public function consultar_consecutivo($campo,$tabla){			//02 BASICO
		
		$sql = "SELECT MAX(".$campo.") AS ".$campo." FROM ".$tabla." ";
		$res = $this->db->query($sql)->result_array();			//print_r($res); //exit();
		$max = $res[0][$campo];
        if($max==""){ $max=1; }else { $max=$max+1; }			//print_r($max); exit();		
		return $max;
	}
	
	/***********************************************************************************************************************************************/
	//METODOS DEL SISTEMA	
	public function insertar_usuario($nombre,$paterno,$materno,$rfc,$correo){
		//CHEKAR SI YA EXISTE LOGIN
		$sql = " SELECT * FROM PERSONA WHERE RFC='".strtoupper($rfc)."' ";
	
		//INSERTA PERSONA
		$id_persona = $this->consultar_consecutivo('id_persona','PERSONA');
		$sql1 = "INSERT INTO PERSONA "
			   ."(ID_PERSONA,NOMBRE,PATERNO,MATERNO,RFC,ESTATUS,FECHA_ALTA) "
			   ."VALUES(".$id_persona.",'".strtoupper($nombre)."','".strtoupper($paterno)."','".strtoupper($materno)."','".strtoupper($rfc)."',1,LOCALTIMESTAMP)";
		
		//TABLA USUARIO
		$id_usuario = $this->consultar_consecutivo('id_usuario','USUARIO');
		$sql2 = "INSERT INTO USUARIO "
			   ."(ID_USUARIO,LOGIN,PASSWORD,ACTIVO,FECHACREACION) " 
			   ."VALUES(".$id_usuario.",'".strtoupper($rfc)."','".strtoupper(md5(strtoupper($rfc)))."',0,LOCALTIMESTAMP)";
		//echo $sql2; exit();			   
		//TABLA USUARIO_PERSONA_PERFIL
		$id_upp = $this->consultar_consecutivo('id_usuario_persona_perfil','USUARIO_PERSONA_PERFIL');
		$sql3 = "INSERT INTO USUARIO_PERSONA_PERFIL "
			   ."(ID_USUARIO_PERSONA_PERFIL,ID_PERSONA,ID_USUARIO,ID_PERFIL,ID_APLICACION,FECHA_INICIO,ESTATUS,CAMBIO_CONTRASENA) "
			   ."VALUES(".$id_upp.",".$id_persona.",".$id_usuario.",0,1,LOCALTIMESTAMP,1,0)";			//SIN PERFIL PARA DARLE PERFIL DESPUES
		
		//INSERTA CORREOE
		$id_correoe = $this->consultar_consecutivo('id_correoe','CORREOE');	
		$sql4 = "INSERT INTO CORREOE " 
			   ."(ID_CORREOE,ID_TIPO_CORREOE,ID_PERSONA,CORREOE) "
			   ."VALUES(".$id_correoe.",1,".$id_persona.",'".$correo."')";				   	 
				
		$this->db->trans_start();
		$this->db->query($sql);
		
		//VALIDAMOS QUE NO EXISTA ESE RFC
		$existe = $this->db->query($sql)->num_rows();
		if($existe > 0){			//EN CASO DE QUE EXISTA SACALO
			return -1;
			exit();}
		
		$this->db->query($sql1);
		$this->db->query($sql2);
		$this->db->query($sql3);
		$this->db->query($sql4);
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
			{return 0;}else{
				return 1;}
	}

	public function consultar_usuarios($id_perfil){
				
		//SI ID_PERFIL = 1 ES SUPERUSUARIO POR LO TANTO SOLO BUSCARA USUARIOS ADMINISTRADORES DEL SISTEMA (ID_PERFDIL ==2)
		if($id_perfil == 1){$criterio = "AND PF.ID_PERFIL = 2";}
		
		$criterios = "UPP.ID_PERSONA = PE.ID_PERSONA AND UPP.ID_USUARIO = US.ID_USUARIO AND UPP.ID_PERFIL = PF.ID_PERFIL ".$criterio;
		if($criterios!="") $criterios=" where ".$criterios;
		$orden = "US.ID_USUARIO DESC";
		if($orden!="") $orden=" order by ".$orden;
		$campos = "PE.NOMBRE, PE.PATERNO, PE.MATERNO, US.LOGIN, PF.NOMBRE AS PERFIL, US.ID_USUARIO, PE.ID_PERSONA";			//TABLA DESARROLLO
		$tablas = "USUARIO_PERSONA_PERFIL UPP, USUARIO US, PERSONA PE, PERFIL PF";			//TABLA DESARROLLO
		
		$sql = "SELECT ".$campos." FROM ".$tablas." " .$criterios. " " .$orden;			//echo $sql; exit();
		
		$this->db->trans_start();
		$rs = $this->db->query($sql);
		
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){return 0;}else{return $rs;}
	}
	
	public function eliminar_usuario($id_usuario,$id_persona){
		
		//BORRAMOS DE LA TABLA CORREOE
		$sql = "DELETE FROM CORREOE WHERE ID_PERSONA = ".$id_persona." ";
		//BORRAMOS DE LA TABLA USUARIO_PERSONA_PERFIL
		$sql2 = "DELETE FROM USUARIO_PERSONA_PERFIL WHERE ID_PERSONA = ".$id_persona." AND ID_USUARIO = ".$id_usuario." ";
		//BORRAMOS DE LA TABLA USUARIO
		$sql3 = "DELETE FROM USUARIO WHERE ID_USUARIO = ".$id_usuario." ";		
		//BORRAMOS DE LA TABLA PERSONA
		$sql4 = "DELETE FROM PERSONA WHERE ID_PERSONA = ".$id_persona." ";
		
		$this->db->trans_start();
		
		$this->db->query($sql);
		$this->db->query($sql2);
		$this->db->query($sql3);
		$this->db->query($sql4);
		
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){return 0;}else{return 1;}
	}
	
	public function actualizar_perfil($id_usuario,$id_persona,$id_perfil){
		
		//ACTUALIZAMOS LA TABLA USUARIO_PERSONA_PERFIL
		$sql = "UPDATE USUARIO_PERSONA_PERFIL SET ID_PERFIL = ".$id_perfil." WHERE ID_PERSONA = ".$id_persona." AND ID_USUARIO = ".$id_usuario." ";
		
		$this->db->trans_start();
		$this->db->query($sql);
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){return 0;}else{return 1;}
	}
}
?>