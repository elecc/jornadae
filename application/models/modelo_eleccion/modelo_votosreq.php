<?php  
class Modelo_votosreq extends CI_Model{	
	
	public function construct__() {
		parent::__construct();
	}
	
	//METODOS GLOBALES
	public function consultar_catalogo($catalogo,$criterios,$orden){			//01 USADISIMO PARA TODOS LOS CATALOGOS
		
		if($criterios!="") $criterios=" where ".$criterios;
		if($orden!="") $orden=" order by ".$orden;
		$sql = "SELECT * FROM ".$catalogo." " .$criterios. " " .$orden."";			//echo $sql; exit();
        /*echo "<pre>"; print_r($sql);
        exit();
		*/
		$this->db->trans_start();
		$rs = $this->db->query($sql);			
		
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){return 0;}else{return $rs;}
	}

	public function consultar_inersimple($tabla1,$tabla2,$union, $criterios,$orden){
		
		if($criterios!="") $criterios=" where ".$criterios;
		if($orden!="") $orden=" order by ".$orden;
    
        /*
        SELECT * FROM "JORNADA_ESTADOS" INNER JOIN "ESTADO"  
        USING ("ID_ESTADO") WHERE "ID_JORNADA"=1;
        */
        
		$sql = "select * from ".$tabla1." inner join ".$tabla2
        ." using (".$union.") "
        .$criterios. " "
        .$orden."";			
        //echo $sql; exit();
        /*
        echo "<pre>"; print_r($sql);
        exit();
		*/
        
		$this->db->trans_start();
		$rs = $this->db->query($sql);			
		
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){return 0;}else{return $rs;}
	}

	public function consultar_elecciones($criterios,$orden){
		
		//if($criterios!="") $criterios=" where ".$criterios;
		if($orden!="") $orden=" order by ".$orden;
    
        /*
        SELECT E."ID_ELECCION" AS IDE, E."DESCRIPCION" AS DESCRIP, E."FECHACREACION" AS FECHA, 
        CE."DESCRIPCION" AS PUESTO, EDO."DESCRIPCION" AS ESTADO 
          FROM "ELECCION" as E, "CATELECCION" as CE, "ESTADO" as EDO
        WHERE E."TIPOELECCION"=CE."ID_CATELECCION" AND
        E."ID_ESTADO"=EDO."ID_ESTADO" 
        AND E."ID_JORNADA"=1;
        */
        
        $sql='select e."id_eleccion" as "ide", e."descripcion" as "descrip", e."fechacreacion" as "fecha", 
        ce."descripcion" as "puesto", edo."descripcion" as "estado" 
        from "eleccion" as e, "cateleccion" as ce, "estado" as edo
        where e."tipoeleccion"=ce."id_cateleccion" and
        e."id_estado"=edo."id_estado" 
        and e."id_jornada"='
        .$criterios. " "
        .$orden."";			
        /*
        echo $sql; 
        exit();
        /*
        echo "<pre>"; print_r($sql);
        exit();
		*/
        
		$this->db->trans_start();
		$rs = $this->db->query($sql);			

		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){return 0;}else{return $rs;}
	}

	
	public function consultar_consecutivo($campo,$tabla){			//02 BASICO
		
		$sql = "select max(".$campo.") ".$campo." FROM ". $tabla."";
		$res = $this->db->query($sql)->result_array();			//print_r($res); exit();
				 
		$max = $res[0][$campo];              
        if($max==""){ $max=1; }else { $max=$max+1; }		
		return $max;
	}
	
	/***********************************************************************************************************************************************/
	//METODOS DEL SISTEMA	
	public function insertar_votosreq($seccion,$votos,$eleccion){
		$id_votoreq = $this->consultar_consecutivo('id_votorequerido','votorequerido');
		$usuario_creacion = 1;			//TIPO NUMBER
		$usuario_modificacion = 1;			//TIPO NUMBER

		$sql = "insert into votorequerido
        (id_votorequerido,ideleccion,idseccion,voto,
        usuariocreacion,usuariomodificacion,fechamodificacion,activo) "
		."VALUES(".$id_votoreq.",'".$eleccion."','".$seccion."','".$votos."',"
        .$usuario_creacion.",".$usuario_modificacion.",current_date,1)";
        
            
		$this->db->trans_start();
		$res = $this->db->query($sql);
		//print_r($id_estado);
				
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{return 0;}else{return 1;}
	}
}
?>