<?php  
class Modelo_jornadae extends CI_Model{	
	
	public function construct__() {
		parent::__construct();
	}
	
	//METODOS GLOBALES
	public function consultar_catalogo($catalogo,$criterios,$orden){			//01 USADISIMO PARA TODOS LOS CATALOGOS
		
		if($criterios!="") $criterios=" where ".$criterios;
		if($orden!="") $orden=" order by ".$orden;
		$sql = "SELECT * FROM ".$catalogo." " .$criterios. " " .$orden."";			//echo $sql; exit();
		
		$this->db->trans_start();
		$rs = $this->db->query($sql);			//echo "<pre>"; print_r($rs); exit();
		
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){return 0;}else{return $rs;}
	}
	
	public function consultar_consecutivo($campo,$tabla){			//02 BASICO
		
		$sql = "SELECT MAX(".$campo.") ".$campo." FROM ".$tabla;
		$res = $this->db->query($sql)->result_array();			//print_r($res); exit();
				 
		$max = $res[0][$campo];              
        if($max==""){ $max=1; }else { $max=$max+1; }		
		return $max;
	}
	
	/***********************************************************************************************************************************************/
	//METODOS DEL SISTEMA	
	public function insertar_je($descripcion_je,$fecha_je,$id_estado){
		
		$id_je = $this->consultar_consecutivo('id_jornada','jornada');
		$usuario_creacion = 1;			//TIPO NUMBER
		$usuario_modificacion = 1;			//TIPO NUMBER

		$sql0 = "insert into jornada(id_jornada,nombre,fechacreacion,usuariocreacion,usuariomodificacion,fechamodificacion,activo) "
		."VALUES(".$id_je.",'".$descripcion_je."',TO_DATE('".$fecha_je."','DD/MM/YYYY'),".$usuario_creacion.",".$usuario_modificacion.",current_date,1)";

		$this->db->trans_start();
		$res = $this->db->query($sql0);
		//print_r($id_estado);
		for ($i=0;$i<count($id_estado);$i++)    
		{     
			$id_jeest = $this->consultar_consecutivo('id_jornada_estado','jornada_estados');   
			$sql[$i] = "insert into jornada_estados(id_jornada_estado,id_jornada,id_estado) "
		."VALUES(".$id_jeest.",".$id_je.",".$id_estado[$i].")";
		   $res = $this->db->query($sql[$i]);
		}
				
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{return 0;}else{return 1;}
	}
}
?>