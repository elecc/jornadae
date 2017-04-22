<?php  
class Modelo_coaliciones extends CI_Model{	
	
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
        
		$sql = "SELECT * FROM ".$tabla1." INNER JOIN ".$tabla2
        ." USING (".$union.") "
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
		if($orden!="") $orden=" order by ".$orden;
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

	public function consultar_coalicion($criterios,$orden){
		
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
        
        $sql='select c.id_coalicion, c.id_eleccion, c.conteorapido,
        cp.id_coalicionpartido, cp.id_partido,
        p.nombre, p.nombrecorto
        from coalicion as c, coalicionpartido as cp, partido as p
        where c.id_coalicion=cp.id_coalicion and
        cp.id_partido=p.id_partido and '
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
		
		$sql = "SELECT MAX(".$campo.") ".$campo." FROM ". $tabla."";
		$res = $this->db->query($sql)->result_array();			//print_r($res); exit();
				 
		$max = $res[0][$campo];              
        if($max==""){ $max=1; }else { $max=$max+1; }		
		return $max;
	}
	
	/***********************************************************************************************************************************************/
	//METODOS DEL SISTEMA	
	public function insertar_parcoa($descrip_coa,$parcoains,$eleccion,$crapido){
		
		$id_coa = $this->consultar_consecutivo('id_coalicion','coalicion');
		$usuario_creacion = 1;			//TIPO NUMBER
		$usuario_modificacion = 1;			//TIPO NUMBER

		$sql0 = "insert into coalicion(id_coalicion,nombre,fechacreacion,usuariocreacion,usuariomodificacion,
        fechamodificacion,activo,logo, id_eleccion, conteorapido) "
		."VALUES(".$id_coa.",'".$descrip_coa."',current_date,".$usuario_creacion.",".$usuario_modificacion
        .",current_date,1,'0',".$eleccion.",".$crapido.")";

        
		$this->db->trans_start();
		$res = $this->db->query($sql0);
		for ($i=0;$i<count($parcoains);$i++)    
		{     
			$id_coapar = $this->consultar_consecutivo('id_coalicionpartido','coalicionpartido');   
			$sql[$i] = "insert into coalicionpartido(id_coalicionpartido,id_coalicion,id_partido,
            fechacreacion,usuariocreacion,usuariomodificacion,fechamodificacion,activo) "
		."VALUES(".$id_coapar.",".$id_coa.",".$parcoains[$i]
        .",current_date,".$usuario_creacion.",".$usuario_modificacion.",current_date,1)";
		   $res = $this->db->query($sql[$i]);
		}

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{return 0;}else{return 1;}
	}

}
?>