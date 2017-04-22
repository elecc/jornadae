<?php  
class Modelo_jornadae extends CI_Model{	
	
	public function construct__() {
		parent::__construct();
	}
	
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
		
		$sql = "SELECT " .$campo. " FROM ". $tabla;
		
		$res = $this->db->query($sql)->result_array();			//print_r($res); exit();
				 
		$max = $res[0][$campo];              
		
        if($max==""){ $max=1; }else { $max=$max+1; }		
		return $max;
	}
	
	/***********************************************************************************************************************************************/
	//METODOS DEL SISTEMA	
	public function insertar_je($descripcion_je,$fecha_je,$id_estado_je){
		
		$id_je = $this->consultar_consecutivo('ID_JORNADA','JORNADA');
		
		$usuario_creacion = 1;			//TIPO NUMBER
		$usuario_modificacion = 1;			//TIPO NUMBER
		
		$sql = "INSERT INTO JORNADA(ID_JORNADA,NOMBRE,ID_ESTADO,FECHACREACION,USUARIOCREACION,USUARIOMODIFICACION,FECHAMODIFICACION,ACTIVO) "
		."VALUES(".$id_je.",'".$descripcion_je."',".$id_estado_je.",TO_DATE('".$fecha_je."','DD/MM/YYYY'),".$usuario_creacion.",".$usuario_modificacion.",SYSDATE,1)";
		
		$this->db->trans_start();
		$res = $this->db->query($sql);
		
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{return 0;}else{return 1;}
	}
}
?>