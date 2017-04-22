<?php 


if (!defined('_GRID_PATH')) define('_GRID_PATH', dirname(preg_replace('/\\\\/','/',__FILE__)) . '/');

require_once _GRID_PATH.'class.model_engine_properties.php';

class Model_engine_sql extends Model_engine_properties {
		
	var $V1k2x0ofmgwb; 
    var $V2li3bccjpzj;
    var $Vcuh1wre5ovj = false;
    var $Vkea15dw4rnw;
    var $V03olmoxsyq5;
    var $Vyqjvktzfcib;
    var $Vai1qbkjmjcc;
    var $V4flpxekccyw;
    var $Vbnrnsvdp1iw;
    var $V13ynl0qupbg;

	function __construct() {
   
    }
    
	public function sDB($V2li3bccjpzj){
        $this->DB = $V2li3bccjpzj;
    }
    
	 
    
    public function table($Vbnrnsvdp1iw){
        $this->TABLE_NAME = $Vbnrnsvdp1iw;
        $this->gComponents();
    }
	
	private function gComponents(){
        $this->aTable();
        if(!$this->ERRORSQL)
            $this->gGlobal();
        else{
            $this->ERROR_CODE[] = sprintf(GRIDA000000002);
        }
    }
	 
	public function gResult(){
    	return $this->TABLE_NAME;
    }
    
    
    
    private function aTable(){
        foreach ($this->TABLE_NAME as &$Vllne4ankrll){
            if($this->table_exists($Vllne4ankrll['TABLE_NAME'])){
                $Vflx50kn4c0y = $this->field_data($Vllne4ankrll);
                $Vllne4ankrll['COLUMNS'] = $Vflx50kn4c0y;
                $this->gPKFK($Vllne4ankrll);
            }else{
                $this->ERRORSQL = true;
                $this->ERROR_CODE[] = sprintf(GRIDA000000001,$Vllne4ankrll['TABLE_NAME']);
            }
        }
    }
	 
	 
    
    private function table_exists($Vjwxu22tuzdn){
        $V4xxdn54qrv5= strpos($Vjwxu22tuzdn, '.');
    
        if($V4xxdn54qrv5 !== FALSE){
            $Vpbjjqqjjrkd = explode('.', $Vjwxu22tuzdn);
            $Vk3t1crw0vdp = $Vpbjjqqjjrkd[0];
            $Vjwxu22tuzdn = $Vpbjjqqjjrkd[1];
            $Vyd4lo23gpo4 = $this->DB->query("SELECT * FROM ALL_TABLES WHERE OWNER='$Vk3t1crw0vdp' AND upper(table_name) = '$Vjwxu22tuzdn'");
        }else{
            $Vyd4lo23gpo4 = $this->DB->query("SELECT * FROM ALL_TABLES WHERE upper(table_name) = '$Vjwxu22tuzdn'");
        }
		
		if(is_array($Vyd4lo23gpo4)){
			if(!empty($Vyd4lo23gpo4)){
				return true;
			}
		}else{
			return false;
		}
		
      
    }
	
	
    
    public function field_data(&$Vllne4ankrllT){
        $V0n1gqhlw3lg = array();
    
        $Vjwxu22tuzdn =  $Vllne4ankrllT['TABLE_NAME'];
        
        $V4xxdn54qrv5= strpos($Vjwxu22tuzdn, '.');
        
        $Vjwxu22tuzdn_before = $Vjwxu22tuzdn;
    
        if($V4xxdn54qrv5 !== FALSE){
            $Vpbjjqqjjrkd = explode('.', $Vjwxu22tuzdn);
            $Vk3t1crw0vdp = $Vpbjjqqjjrkd[0];
            $Vjwxu22tuzdn = $Vpbjjqqjjrkd[1];
            $Vllne4ankrllT['TABLE_NAME'] = $Vjwxu22tuzdn;
            $Vyd4lo23gpo4 = $this->DB->query("SELECT  * FROM  all_tab_columns WHERE  upper(table_name) = '$Vjwxu22tuzdn' AND OWNER = '$Vk3t1crw0vdp' ORDER BY COLUMN_ID");
        }else{
            $Vyd4lo23gpo4 = $this->DB->query("SELECT  * FROM  all_tab_columns WHERE  upper(table_name) = '$Vjwxu22tuzdn' ORDER BY COLUMN_ID");
        }
  
    	if(is_array($Vyd4lo23gpo4)){
    		
			if(!empty($Vyd4lo23gpo4)){
				
				$V5it1uefbkba = $this->iCatalog($Vllne4ankrllT);

                foreach ($Vyd4lo23gpo4 as $Vt4jmd4a4vxq => $Vllne4ankrll) {
                    
                    if(!isset($Vllne4ankrllT['OWNER']))
                        $Vllne4ankrllT['OWNER'] = $Vllne4ankrll['OWNER'];
                    
                    $Vbcaoyslxyol          = new stdClass();
                    $Vbcaoyslxyol->owner = $Vllne4ankrll['OWNER'];
                    $Vbcaoyslxyol->table_name = $Vllne4ankrll['TABLE_NAME'];
                    $Vbcaoyslxyol->name = $Vllne4ankrll['COLUMN_NAME'];
                    $Vbcaoyslxyol->type = $Vllne4ankrll['DATA_TYPE'];
                    $Vbcaoyslxyol->max_length  = $Vllne4ankrll['DATA_LENGTH'];
                    $Vbcaoyslxyol->nullable    = $Vllne4ankrll['NULLABLE'];
                    $Vbcaoyslxyol->data_scale = $Vllne4ankrll['DATA_SCALE'];
                    $Vbcaoyslxyol->data_default = $Vllne4ankrll['DATA_DEFAULT'];
					$Vbcaoyslxyol->data_precision = $Vllne4ankrll['DATA_PRECISION'];
                    $Vbcaoyslxyol->catalog = $V5it1uefbkba;
                    
                    $Vzvgjwbf40rc = true;
                    
                    $this->aProperties($Vbcaoyslxyol);
                    
                    $Vf314n31yup4 = $Vbcaoyslxyol->owner.'.'.$Vbcaoyslxyol->table_name.'.'.$Vbcaoyslxyol->name;

                    $V0n1gqhlw3lg[$Vf314n31yup4] = $Vbcaoyslxyol;
                }
				
			}
			
    	}
    
        return $V0n1gqhlw3lg;
    }	

	private function iCatalog($Vllne4ankrllT){
        if(isset($Vllne4ankrllT['CATALOG'])){
            return true;
        }else{
            return false;
        }
    }
    
	 
    
    private function gPKFK(&$Vllne4ankrll){
         
        $Vjwxu22tuzdn_name = explode('.', $Vllne4ankrll['TABLE_NAME']);
         
        if(count($Vjwxu22tuzdn_name) > 1){
            $Vk3t1crw0vdp = $Vjwxu22tuzdn_name[0];
            $Vjwxu22tuzdn_name = $Vjwxu22tuzdn_name[1];
            $Vpoae2jcihwa = "SELECT cols.table_name, cols.column_name, cols.position, cons.status, cons.owner,cons.constraint_type ".
                    "FROM all_constraints cons, all_cons_columns cols ".
                    "WHERE cons.constraint_name = cols.constraint_name ".
                    "AND cons.owner = cols.owner AND cols.table_name='".$Vjwxu22tuzdn_name."' AND COLS.OWNER='".$Vk3t1crw0vdp."' ".
                    "ORDER BY cols.table_name, cols.position";
    
            
        }else{
            $Vjwxu22tuzdn_name = $Vjwxu22tuzdn_name[0];
            $Vpoae2jcihwa = "SELECT cols.table_name, cols.column_name, cols.position, cons.status, cons.owner,cons.constraint_type ".
                    "FROM all_constraints cons, all_cons_columns cols ".
                    "WHERE cons.constraint_name = cols.constraint_name ".
                    "AND cons.owner = cols.owner AND cols.table_name='".$Vjwxu22tuzdn_name."' ".
                    "ORDER BY cols.table_name, cols.position";
        }
        
        $Vdruamuofwxp = $this->DB->query($Vpoae2jcihwa);
        
        if(!empty($Vdruamuofwxp)){
            foreach ($Vdruamuofwxp as $Vllne4ankrllPKFK){
                
                $Vt4jmd4a4vxq = $Vllne4ankrllPKFK['OWNER'].'.'.$Vllne4ankrllPKFK['TABLE_NAME'].'.'.$Vllne4ankrllPKFK['COLUMN_NAME'];
                
                if($Vllne4ankrllPKFK['CONSTRAINT_TYPE'] == 'P'){
                    if(isset($Vllne4ankrll['COLUMNS'][$Vt4jmd4a4vxq])){
                        $Vywptzkgc1jj = $Vllne4ankrll['COLUMNS'][$Vt4jmd4a4vxq];
                        
                        $Vllne4ankrll['COLUMNS'][$Vt4jmd4a4vxq]->PR = 'P';
                        $Vllne4ankrll['PRIMARY_KEY'][$Vt4jmd4a4vxq] = $Vywptzkgc1jj;
                    }
                }else if($Vllne4ankrllPKFK['CONSTRAINT_TYPE'] == 'R'){
                    if(isset($Vllne4ankrll['COLUMNS'][$Vt4jmd4a4vxq])){
                        $Vywptzkgc1jj = $Vllne4ankrll['COLUMNS'][$Vt4jmd4a4vxq];
                        $Vllne4ankrll['COLUMNS'][$Vt4jmd4a4vxq]->PR = 'R';
                        $Vllne4ankrll['FOREIGN_KEY'][$Vt4jmd4a4vxq] = $Vywptzkgc1jj;
                    }
                }
            }

        }
    }

	 
    
    private function gGlobal(){
        if(count($this->TABLE_NAME) > 0){
            $this->GGLOBAL = array();
            $this->GGLOBAL['TABLE_NAME'] = $this->gTable();
            $this->GGLOBAL['COLUMNS'] = $this->gColumns();
            $this->gPFK($this->GGLOBAL);
            $this->TABLE_NAME['general'] =  $this->GGLOBAL;
        }
    }
    
    private function gTable(){
        $Vjwxu22tuzdn = "";
        foreach ($this->TABLE_NAME as $Vllne4ankrllT){
            $Vjwxu22tuzdn.=$Vllne4ankrllT['OWNER'].'.'.$Vllne4ankrllT['TABLE_NAME'].',';
        }
        $Vjwxu22tuzdn = substr($Vjwxu22tuzdn, 0, -1);
        return $Vjwxu22tuzdn;
    }
    
    private function pColumns($V4x0vbcaeswk = 'select'){
    	foreach ($this->TABLE_NAME as $V41jddyrs5sh => &$Vllne4ankrllT){
        	if(is_numeric($V41jddyrs5sh)){
	            foreach ($Vllne4ankrllT['COLUMNS'] as $Vt4jmd4a4vxq => &$Vllne4ankrllC){
	            	if($V4x0vbcaeswk == 'insert' && isset($Vllne4ankrllC->sequence)){
	            		$Vllne4ankrllSequence = $this->gSequence($Vllne4ankrllC->sequence);
	            		$Vllne4ankrllC->value = $this->pDataType($Vllne4ankrllC,$Vllne4ankrllSequence);
	            		$this->PARAMETERS[$Vt4jmd4a4vxq] = $Vllne4ankrllC->value;
	            	}else if($V4x0vbcaeswk == 'insert' && isset($Vllne4ankrllC->svalue)){
	            			$Vllne4ankrllC->value = $this->pDataType($Vllne4ankrllC,$Vllne4ankrllC->svalue);
	            			$this->PARAMETERS[$Vt4jmd4a4vxq] = $Vllne4ankrllC->value;
	            	}else if($V4x0vbcaeswk == 'update' && isset($Vllne4ankrllC->evalue)){
	            			$Vllne4ankrllC->value = $this->pDataType($Vllne4ankrllC,$Vllne4ankrllC->evalue);
	            			$this->PARAMETERS[$Vt4jmd4a4vxq] = $Vllne4ankrllC->value;
	            	}else if(isset($this->PARAMETERS[$Vt4jmd4a4vxq])){
	                    $Vllne4ankrllC->value = $this->pDataType($Vllne4ankrllC,$this->PARAMETERS[$Vt4jmd4a4vxq]);
	                    $this->PARAMETERS[$Vt4jmd4a4vxq] = $Vllne4ankrllC->value;
	                }
	            }
        	}
        }
    }
    
    private function gSequence($Viyorxsd3xbb){
    	$Vle3ldyht4v2 = new Model_engine_db($this->CONFIG_DB);
    	$Vecr3rhsfgzd = $Vle3ldyht4v2->query($Viyorxsd3xbb);
		$Vle3ldyht4v2->__destruct();
    	if($Vecr3rhsfgzd!=NULL){
    			if(!empty($Vecr3rhsfgzd)){
		    		return array_pop($Vecr3rhsfgzd[0]);
		    	}else {
		    		return 0;
		    	}
    	}else{
    		return 0;
    	}
    }
   
    private function pDataType($Vllne4ankrllC,$Vllne4ankrllP){
    	if($Vllne4ankrllC->type == 'DATE' ){
        	
            if($this->eDate($Vllne4ankrllP)){
                return "to_date('$Vllne4ankrllP','YYYY-MM-DD')";
            }else if($Vllne4ankrllP == 'SYSDATE')
                return "SYSDATE";
            else
                return "''";

        }else if(strpos($Vllne4ankrllC->type,'TIMESTAMP') !== false){

        	if($this->eTimeStamp($Vllne4ankrllP)){
                return "to_timestamp('$Vllne4ankrllP','YYYY-MM-DD HH24:MI')";
            }else if($Vllne4ankrllP == 'SYSDATE')
	            return "SYSDATE";
	        else
	            return "''";
        
        }else{
            if(strpos($Vllne4ankrllP, "'")!== FALSE)
                return "".$Vllne4ankrllP."";
                    else
                return "'".$Vllne4ankrllP."'";
        }
        
    }
    
    
    private function pSelect(&$Vllne4ankrllT){
    	
    	$Vpoae2jcihwa = "";
    	
        $Vdb1adanyczz = "";
       
        $this->aColumns($Vllne4ankrllT);
        
        $Vdb1adanyczz = $this->pSelectColumns($Vllne4ankrllT);
        
        $this->cColumns($Vllne4ankrllT);
        
        if(isset($Vllne4ankrllT['GENERAL']) && isset($this->TABLE_NAME['general']['complement_column']) && count($this->TABLE_NAME['general']['complement_column'])>0 ){$Vdb1adanyczz.= ','.$this->bColumns();}
            
        $Vhw3ckeeacck = $this->pWhere($Vllne4ankrllT);
       
        if(isset($Vllne4ankrllT['GENERAL']))
        	$Vpoae2jcihwa = "SELECT ".$Vdb1adanyczz.",count(*) over() cnt,row_number() over(order by 1) rn  FROM ".$Vllne4ankrllT['TABLE_NAME'].$Vhw3ckeeacck;
        else if(isset($Vllne4ankrllT['OWNER'])){
        	$Vpoae2jcihwa = "SELECT ".$Vdb1adanyczz.",count(*) over() cnt,row_number() over(order by 1) rn  FROM ".$Vllne4ankrllT['OWNER'].'.'.$Vllne4ankrllT['TABLE_NAME'].$Vhw3ckeeacck;
        }
        
        $Vllne4ankrllT['select'] = $Vpoae2jcihwa;
        $Vpoae2jcihwa = "SELECT  count(*) as COUNT FROM ".$Vllne4ankrllT['TABLE_NAME'].$Vhw3ckeeacck;
        $Vllne4ankrllT['count'] = $Vpoae2jcihwa;
        $Vllne4ankrllT['where'] = $Vhw3ckeeacck;
    }
    
    private function pSelectColumns($Vllne4ankrllT){
        $Vdb1adanyczz = " ";

        $Vlogvkjy5zft = false;
        
        if(isset($Vllne4ankrllT['GENERAL']))
        	$Vlogvkjy5zft = true;
        
        foreach ($Vllne4ankrllT['COLUMNS'] as $Vllne4ankrllC){
        	    if(!$Vllne4ankrllC->catalog && $Vlogvkjy5zft){
	                $Vdb1adanyczz.=$Vllne4ankrllC->value_type.",";
	            }else{
	            	$Vdb1adanyczz.=$Vllne4ankrllC->value_type.",";
	            }
        }
        
        $Vdb1adanyczz = substr($Vdb1adanyczz, 0, -1);
        return $Vdb1adanyczz;
    }
    
    private function gSelect(){
        if(count($this->TABLE_NAME) > 0){
            $this->TABLE_NAME['general']['GENERAL'] = true;
            $this->pSelect($this->TABLE_NAME['general']);
            $this->gRelation();
            
            
            $Vhw3ckeeacck = '';
            
            if(strlen($this->WHERE)>0){
                $Vhw3ckeeacck = $this->WHERE;
            }else{
                $Vhw3ckeeacck = ' ';
            }
            
    		$Vseguzdhqlmi = $this->cWhere($this->TABLE_NAME['general']);
    
    		$Vpoae2jcihwa = $this->TABLE_NAME['general']['select']." ".$this->RELATION." ".$Vseguzdhqlmi.$Vhw3ckeeacck." ".$this->ORDER;
    
    		$this->TABLE_NAME['general']['select_before_limit'] = $Vpoae2jcihwa;
    
            $Vpoae2jcihwa = $this->gLimit($Vpoae2jcihwa);
            
            $this->TABLE_NAME['general']['select'] = $Vpoae2jcihwa;
            $Vpoae2jcihwa = $this->TABLE_NAME['general']['count']." ".$this->RELATION.$Vseguzdhqlmi.$Vhw3ckeeacck;
            $this->TABLE_NAME['general']['count'] = $Vpoae2jcihwa;
        }
    }
    
    
    private function gRelation(){
        
        $Vg1d4wj32osa = "";
        
        if(isset($this->TABLE_NAME['general']['FOREIGN_KEY'])){
            
            if(isset($this->TABLE_NAME['general']['PRIMARY_KEY'])){
                
                foreach ($this->TABLE_NAME['general']['PRIMARY_KEY'] as $Vgbdgcsytora => $V0eicz4kbdrq){
                    foreach ($this->TABLE_NAME['general']['FOREIGN_KEY'] as $V3t3a5aiojcq => $V041cupk4npy){
                        if($V0eicz4kbdrq->name == $V041cupk4npy->name){
                            if($Vgbdgcsytora!=$V3t3a5aiojcq)
                                $Vg1d4wj32osa.= $Vgbdgcsytora.'='.$V3t3a5aiojcq.' AND ';
                        }
                    }
                }
                
                $this->RELATION = substr($Vg1d4wj32osa,0,-4);

                if(empty($this->TABLE_NAME['general']['where']) && !empty($this->RELATION)){
                    $this->RELATION = " WHERE ".$this->RELATION;
                }else if(!empty($this->RELATION)){
                    $this->RELATION = " AND ".$this->RELATION;
                }else{
                    $this->RELATION = "";
                }
                
            }else{
                $this->RELATION = "";
            }
        
        }else{
            $this->RELATION = "";
        }
        
    }
    
    
    private function cWhere($Vllne4ankrllT){
        $Vhw3ckeeacck = "";

        if(!empty($this->PARAMETERS)){
            foreach ($this->PARAMETERS as $Vt4jmd4a4vxq => $Vllne4ankrll){

            	if(isset($this->TABLE_NAME['general']['COLUMNS'][$Vt4jmd4a4vxq])){
            		$Vllne4ankrllC = $this->TABLE_NAME['general']['COLUMNS'][$Vt4jmd4a4vxq];
            		$Vllne4ankrll = $this->pDataType($Vllne4ankrllC, $Vllne4ankrll);
            	}else{
            		if(!is_array($Vllne4ankrll)){
            			if(isset($this->COLUMNS_NAME_COMPLEMENT[$Vt4jmd4a4vxq])){
            				$Vllne4ankrllC = $this->COLUMNS_NAME_COMPLEMENT[$Vt4jmd4a4vxq];
            				$Vllne4ankrll = $this->pDataType($Vllne4ankrllC, $Vllne4ankrll);
            			}
            		}
            	}
            	
                if(!is_array($Vllne4ankrll)){
                    $Vhw3ckeeacck.= " ".$Vt4jmd4a4vxq."=".$Vllne4ankrll." AND ";
                }else{
    
                    foreach ($Vllne4ankrll as $Vlkttw2eooz1 => $Vywptzkgc1jj){
                        $Vyd4lo23gpo4 = $this->logicalExpresion($Vywptzkgc1jj[0], $Vywptzkgc1jj[1], $Vywptzkgc1jj['values']);
                        if(!is_bool($Vyd4lo23gpo4)){
                            $Vhw3ckeeacck.= $Vyd4lo23gpo4." AND ";
                        }else{
                        	$this->ERRORSQL = true;
                        	$this->ERROR_CODE[] = sprintf(GRIDA000000007,$Vllne4ankrll['TABLE_NAME']);
                        }
                    }
                }
            }
        }
    
        $Vhw3ckeeacck = substr($Vhw3ckeeacck, 0, -4);
    
        if(empty($Vllne4ankrllT['where']) && empty($this->RELATION) && strlen($Vhw3ckeeacck)>0){
            $Vhw3ckeeacck = " WHERE ".$Vhw3ckeeacck;
        }else if(strlen($Vhw3ckeeacck)>0){
            $Vhw3ckeeacck = " AND ".$Vhw3ckeeacck;
        }
         
    
        return $Vhw3ckeeacck;
    }
    
    
    
    private function logicalExpresion($Vywptzkgc1jj,$Vuzeesezkigi,$Vllne4ankrlls){
    	 
    	$Vyd4lo23gpo4 = "";
    	 
    	if($Vuzeesezkigi == GRID_OR){
    		$Vdhnu5rqwdv3 = "(";
    		if(count($Vllne4ankrlls)>1){
    			 
    			foreach ($Vllne4ankrlls as $Vllne4ankrll){
    				$Vdhnu5rqwdv3.= $Vywptzkgc1jj." = ".$Vllne4ankrll.$Vuzeesezkigi;
    			}
    
    			$Vdhnu5rqwdv3 = substr($Vdhnu5rqwdv3, 0, -strlen($Vuzeesezkigi)) . ")";
    			 
    			$Vyd4lo23gpo4 = $Vdhnu5rqwdv3;
    			return $Vyd4lo23gpo4;
    			 
    		}else
    			return false;
    	}else if($Vuzeesezkigi == GRID_IN){
    		$Vsugsy2setni = "(";
    		if(count($Vllne4ankrlls)>0){
    			 
    			foreach ($Vllne4ankrlls as $Vllne4ankrll){
    				$Vsugsy2setni.= $Vllne4ankrll.",";
    			}
    
    			$Vsugsy2setni = substr($Vsugsy2setni, 0, -1).")";
    
    			$Vyd4lo23gpo4 = $Vywptzkgc1jj.$Vuzeesezkigi.$Vsugsy2setni;
    			return $Vyd4lo23gpo4;
    			 
    		}else
    			return false;
    	}else if($Vuzeesezkigi == GRID_BETWEEN){
    		$V2dngjsoykmr = "";
    		if(count($Vllne4ankrlls)>1){
    			 
    			foreach ($Vllne4ankrlls as $Vllne4ankrll){
    				$V2dngjsoykmr.= $Vllne4ankrll." AND ";
    			}
    			
    			$V2dngjsoykmr = substr($V2dngjsoykmr, 0, -4)."";
    
    			$Vyd4lo23gpo4 = $Vywptzkgc1jj.$Vuzeesezkigi.$V2dngjsoykmr;
    			return $Vyd4lo23gpo4;
    			 
    		}else
    			return false;
    	}
    	 
    	 
    	 
    	return false;
    }
    
    private function gLimit($Vpoae2jcihwa){
        $V0ebfx4tgmxj = "";
        $Vei5gufzpbmd = "";
        if((isset($this->MAX_ROWS) && strlen($this->MAX_ROWS)>0 ) && (isset($this->MIN_ROWS) && strlen($this->MIN_ROWS)>0)){
            $V0ebfx4tgmxj = $this->MIN_ROWS;
            $Vei5gufzpbmd = $this->MAX_ROWS;
            $Vpoae2jcihwa = "SELECT *FROM ($Vpoae2jcihwa) WHERE rn BETWEEN $V0ebfx4tgmxj AND $Vei5gufzpbmd";
        }else{
            $Vpoae2jcihwa = "SELECT *FROM ($Vpoae2jcihwa)";
        }
         
        return $Vpoae2jcihwa;
    }
    
    private function pWhere($Vllne4ankrllT){
        $Vhw3ckeeacck = "";
        
        if(!empty($this->PARAMETERS)){
        	if(isset($Vllne4ankrllT['PRIMARY_KEY'])){
        		foreach ($Vllne4ankrllT['PRIMARY_KEY'] as $Vt4jmd4a4vxq => $Vllne4ankrllPK){
        			if(isset($this->PARAMETERS[$Vt4jmd4a4vxq])){
        				$Vhw3ckeeacck.= " ".$Vt4jmd4a4vxq."=".$this->pDataType($Vllne4ankrllPK, $this->PARAMETERS[$Vt4jmd4a4vxq])." AND ";
        			}else{
        			    $this->ERRORSQL = true;
                        $this->ERROR_CODE[] = sprintf(GRIDA000000009,$Vllne4ankrllT['TABLE_NAME']);
        			}	
        		}
        	}
        	if(isset($Vllne4ankrllT['FOREIGN_KEY'])){
        		foreach ($Vllne4ankrllT['FOREIGN_KEY'] as $Vt4jmd4a4vxq => $Vllne4ankrllPK){
        			if(isset($this->PARAMETERS[$Vt4jmd4a4vxq])){
        				$Vhw3ckeeacck.= " ".$Vt4jmd4a4vxq."=".$this->pDataType($Vllne4ankrllPK, $this->PARAMETERS[$Vt4jmd4a4vxq])." AND ";
        			}
        		}
        	}
        }	
        
        $Vhw3ckeeacck = substr($Vhw3ckeeacck, 0, -4);

        if(strlen($Vhw3ckeeacck)>0){
        	$Vhw3ckeeacck = " WHERE ".$Vhw3ckeeacck;
        }
        
        return $Vhw3ckeeacck;
    }
    
    
    
    private function cColumns($Vllne4ankrllT){
        $Vdb1adanyczz = "";
        
        if(isset($Vllne4ankrllT['CATALOG']))
        if(isset($Vllne4ankrllT['CATALOG']['SHOW_GRID_COLUMNS'])){
            foreach ($Vllne4ankrllT['CATALOG']['SHOW_GRID_COLUMNS'] as $Vllne4ankrllSGC){
                
            	foreach ($Vllne4ankrllT['COLUMNS'] as $Vllne4ankrllC){

            		$Vt4jmd4a4vxq = $Vllne4ankrllC->owner.'.'.$Vllne4ankrllC->table_name.'.'.$Vllne4ankrllC->name;
            		$Vvao5bzg2nln = explode('.', $Vllne4ankrllSGC);
					$Vt4jmd4a4vxqSGC = array_pop($Vvao5bzg2nln);
					$Vt4jmd4a4vxqSGC = $Vllne4ankrllC->owner.'.'.$Vllne4ankrllC->table_name.'.'.$Vt4jmd4a4vxqSGC;
					
					if($Vt4jmd4a4vxq == $Vt4jmd4a4vxqSGC){
						$Vdb1adanyczz.=$Vt4jmd4a4vxq.' as '.$this->gNameColumn($Vt4jmd4a4vxq).',';
						$Vllne4ankrllC->alias = $this->gNameColumn($Vt4jmd4a4vxq);
						$this->COLUMNS_NAME_COMPLEMENT[$Vt4jmd4a4vxq] = $Vllne4ankrllC;
						break;
					}
					
            	}
            }
            $Vdb1adanyczz = substr($Vdb1adanyczz, 0, -1);
            $this->TABLE_NAME['general']['complement_column'][$Vllne4ankrllT['TABLE_NAME']]= $Vdb1adanyczz;
        }
    }
    
    
    
    private function bColumns(){
        $Vdb1adanyczz = "";

        if(isset($this->TABLE_NAME['general']))
        if (isset($this->TABLE_NAME['general']['complement_column'])) {
            foreach ($this->TABLE_NAME['general']['complement_column'] as $Vk4fwbjqpekx){
                $Vdb1adanyczz.= $Vk4fwbjqpekx .',';
            }
        }
         
        $Vdb1adanyczz = substr($Vdb1adanyczz, 0, -1);
        
        return $Vdb1adanyczz;
    }
    
    private function aColumns(&$Vllne4ankrllT){
        foreach ($Vllne4ankrllT['COLUMNS'] as $Vt4jmd4a4vxq => &$Vllne4ankrllC){
            $Vllne4ankrllC->value_type = $this->aDataType($Vllne4ankrllC,$Vt4jmd4a4vxq);
        }
        
        if(isset($Vllne4ankrllT['PRIMARY_KEY'])){
            foreach ($Vllne4ankrllT['PRIMARY_KEY'] as $Vt4jmd4a4vxq => &$Vllne4ankrllC){
                $Vllne4ankrllC->value_type = $this->aDataType($Vllne4ankrllC,$Vt4jmd4a4vxq);
            }
        }
        
        if(isset($Vllne4ankrllT['FOREIGN_KEY'])){
            foreach ($Vllne4ankrllT['FOREIGN_KEY'] as $Vt4jmd4a4vxq => &$Vllne4ankrllC){
                $Vllne4ankrllC->value_type = $this->aDataType($Vllne4ankrllC,$Vt4jmd4a4vxq);
            }
        }
        
    }
    
    private function aDataType(&$Vllne4ankrllC,$Vllne4ankrllP){
        
       $Vllne4ankrll = "";
        
        if(!$Vllne4ankrllC->catalog){
        	$Vllne4ankrll = $this->gNameColumn($Vllne4ankrllP);
        	$Vllne4ankrllC->alias = $Vllne4ankrll;
        }else{ 
        	$Vllne4ankrll = $Vllne4ankrllC->name;
        	$Vllne4ankrllC->alias = $Vllne4ankrll;
        }
        
        if($Vllne4ankrllC->type == 'DATE'){
                return "to_char(".$Vllne4ankrllP.",'YYYY-MM-DD') as ".$Vllne4ankrll;
        }else if(strpos($Vllne4ankrllC->type,'TIMESTAMP') !== false){
                return "to_char(".$Vllne4ankrllP.",'YYYY-MM-DD HH24:MI') as ".$Vllne4ankrll;
        }else if(strpos($Vllne4ankrllC->type,'BLOB') !== false) {
                return "UTL_RAW.CAST_TO_VARCHAR2(".$Vllne4ankrllP.") as ".$Vllne4ankrll;
        }else{
            return $Vllne4ankrllP.' as '.$Vllne4ankrll;
        }
    }
    
    
    public function gNameColumn($Vllne4ankrllP){
        $Vdqytxgovylt = GRID.strtoupper(substr(hash("sha256",$Vllne4ankrllP), 0, 28));
        return $Vdqytxgovylt;
    }
    
    private function eDate($Vogvoxpknabh){
        if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$Vogvoxpknabh))
            return true;
        else
            return false;
    }
    
    private function eTimeStamp($Vogvoxpknabh){
        if(preg_match("/^[0-9]{1,4}-[0-9]{1,2}-[0-9]{1,2} [0-9]{1,2}:[0-9]{1,2}$/", $Vogvoxpknabh))
            return true;
        else
            return false;
    
    }
    
    private function gColumns(){
        $Vdb1adanyczz = array();
        foreach ($this->TABLE_NAME as $Vllne4ankrllT){
            foreach ($Vllne4ankrllT['COLUMNS'] as $Vllne4ankrllC){
                if(!$Vllne4ankrllC->catalog){                          
                    $Vt4jmd4a4vxq = $Vllne4ankrllC->owner.'.'.$Vllne4ankrllC->table_name.'.'.$Vllne4ankrllC->name;
                    $Vdb1adanyczz[$Vt4jmd4a4vxq] = $Vllne4ankrllC;
                }
            }
        }
        return $Vdb1adanyczz;
    }
    
    
    
    
    
    private function gPFK(&$Vdv2nvovwqm0){
        foreach ($this->TABLE_NAME as $Vllne4ankrllT){
            
            if(isset($Vllne4ankrllT['PRIMARY_KEY'])){
                foreach ($Vllne4ankrllT['PRIMARY_KEY'] as $Vllne4ankrllFK){
                    $Vt4jmd4a4vxq = $Vllne4ankrllFK->owner.'.'.$Vllne4ankrllFK->table_name.'.'.$Vllne4ankrllFK->name;
                    $Vdv2nvovwqm0['PRIMARY_KEY'][$Vt4jmd4a4vxq] = $Vllne4ankrllFK;
                }
            }
            if(isset($Vllne4ankrllT['FOREIGN_KEY'])){
                foreach ($Vllne4ankrllT['FOREIGN_KEY'] as $Vllne4ankrllF){
                    $Vt4jmd4a4vxq = $Vllne4ankrllF->owner.'.'.$Vllne4ankrllF->table_name.'.'.$Vllne4ankrllF->name;
                    $Vdv2nvovwqm0['FOREIGN_KEY'][$Vt4jmd4a4vxq] = $Vllne4ankrllF;
                }
            }
        }
    }
    
    public function rowNum($V1efcpfmeoiv='',$Vf4wxwhx4tj4=''){
        if(strlen($V1efcpfmeoiv)>0){
            $this->MIN_ROWS = $V1efcpfmeoiv;
        }
        if(strlen($Vf4wxwhx4tj4)>0){
            $this->MAX_ROWS = $Vf4wxwhx4tj4;
        }
    }
    
    public function where($Vhw3ckeeacck){
        $this->WHERE = " WHERE ".$Vhw3ckeeacck;
    }
    
    public function order($Vyqjvktzfcib){
        $this->ORDER = $Vyqjvktzfcib;
    }
    
    public function select($Vyyztjqrgtjt = array()){
        $this->PARAMETERS = $Vyyztjqrgtjt;
        
        foreach ($this->TABLE_NAME as &$Vllne4ankrllT){
            $this->pSelect($Vllne4ankrllT);
        }
        $this->gSelect();
    }
    
    public function delete($Vyyztjqrgtjt = array()){
        $this->PARAMETERS = $Vyyztjqrgtjt;
        foreach ($this->TABLE_NAME as $Vt4jmd4a4vxq => &$Vllne4ankrllT){
            if(!isset($Vllne4ankrllT['CATALOG']))
            	if(is_numeric($Vt4jmd4a4vxq))
               	 	$this->pDelete($Vllne4ankrllT);
        }
    }
    
    private function pDelete(&$Vllne4ankrllT){
    	$Vdb1adanyczz = "";
    	$Vhw3ckeeacck = $this->pWhere($Vllne4ankrllT);
    	if(!empty($Vhw3ckeeacck)){
    		$Vpoae2jcihwa = "DELETE  FROM ".$Vllne4ankrllT['OWNER'].'.'.$Vllne4ankrllT['TABLE_NAME'].$Vhw3ckeeacck;
    		$Vllne4ankrllT['delete'] = $Vpoae2jcihwa;
    	}
    }
    
	public function insert($Vyyztjqrgtjt){
    	$this->PARAMETERS = $Vyyztjqrgtjt;
    	$this->pColumns('insert');
    	foreach ($this->TABLE_NAME as $Vt4jmd4a4vxq => &$Vllne4ankrllT){
    		if(is_numeric($Vt4jmd4a4vxq)){
    			 if(!isset($Vllne4ankrllT['CATALOG'])){
		    		$this->pSelect($Vllne4ankrllT);
		    		$this->pInsert($Vllne4ankrllT);
    			 }
    		}
    	}
    }
    
    private function pInsert(&$Vllne4ankrllT){
    	if(isset($Vllne4ankrllT['PRIMARY_KEY'])){
    		$Vpoae2jcihwa = "INSERT INTO ";
    		$Vpoae2jcihwa.= $Vllne4ankrllT['OWNER'].'.'.$Vllne4ankrllT['TABLE_NAME']."(";
    		$Vdb1adanyczz = "";
    		$Vllne4ankrlls = "";
    		foreach ($Vllne4ankrllT['COLUMNS'] as $Vllne4ankrllC){
    			$Vt4jmd4a4vxq = $Vllne4ankrllC->owner.'.'.$Vllne4ankrllC->table_name.'.'.$Vllne4ankrllC->name;
    			if(isset($Vllne4ankrllC->value) && strpos($Vllne4ankrllC->type, 'BLOB')!==FALSE){
    				$Vdb1adanyczz.= $Vt4jmd4a4vxq.",";
    				$Vllne4ankrlls.= "utl_raw.cast_to_raw(".$Vllne4ankrllC->value."),";
    			}else if(isset($Vllne4ankrllC->value)){
    				$Vdb1adanyczz.= $Vt4jmd4a4vxq.",";
    				$Vllne4ankrlls.=$Vllne4ankrllC->value.",";
    			}
    		}
    		$Vdb1adanyczz = substr($Vdb1adanyczz, 0, -1);
    		$Vllne4ankrlls = substr($Vllne4ankrlls, 0, -1);
    
    		$Vpoae2jcihwa.=$Vdb1adanyczz.") VALUES(".$Vllne4ankrlls.")";
    		$Vllne4ankrllT['insert'] = $Vpoae2jcihwa;
    	}
    }
    
    public function update($Vyyztjqrgtjt){
    	$this->PARAMETERS = $Vyyztjqrgtjt;
    	$this->pColumns('update');
    	foreach ($this->TABLE_NAME as $Vt4jmd4a4vxq => &$Vllne4ankrllT){
    		if(is_numeric($Vt4jmd4a4vxq)){
    			$this->pUpdate($Vllne4ankrllT);
    		}
    	}
    }
    
    private function pUpdate(&$Vllne4ankrllT){
    	if(isset($Vllne4ankrllT['PRIMARY_KEY']) && !isset($Vllne4ankrllT['CATALOG'])){
    		$Vpoae2jcihwa = "UPDATE ";
    		$Vpoae2jcihwa.= $Vllne4ankrllT['OWNER'].'.'.$Vllne4ankrllT['TABLE_NAME']." SET ";
    		$Vllne4ankrlls = "";
    		$Vhw3ckeeacck = "";
    
    		foreach ($Vllne4ankrllT['COLUMNS'] as $Vllne4ankrllC){
    			$Vt4jmd4a4vxq = $Vllne4ankrllC->owner.'.'.$Vllne4ankrllC->table_name.'.'.$Vllne4ankrllC->name;
    			if(isset($Vllne4ankrllC->value) && (!isset($Vllne4ankrllT['PRIMARY_KEY'][$Vt4jmd4a4vxq]))){
    				if(strpos($Vllne4ankrllC->type, 'BLOB')!==FALSE){
    					$Vllne4ankrlls.=$Vt4jmd4a4vxq."=utl_raw.cast_to_raw(".$Vllne4ankrllC->value."),";
    				}else{
    					$Vllne4ankrlls.=$Vt4jmd4a4vxq."=".$Vllne4ankrllC->value.",";
    				}
    			}else if (isset($Vllne4ankrllT['PRIMARY_KEY'][$Vt4jmd4a4vxq])){
    				$Vhw3ckeeacck.=$Vt4jmd4a4vxq."=".$Vllne4ankrllC->value." AND ";
    			}
    		}
    
    		$Vllne4ankrlls = substr($Vllne4ankrlls, 0, -1);
    		$Vhw3ckeeacck = substr($Vhw3ckeeacck, 0, -4);
    
    		if(strlen(trim($Vhw3ckeeacck))>1){
    			$Vhw3ckeeacck = ' WHERE ' .$Vhw3ckeeacck;
    		}
    
    		$Vpoae2jcihwa.=$Vllne4ankrlls.$Vhw3ckeeacck;
    
    		if(!empty($Vllne4ankrlls) && !empty($Vhw3ckeeacck))
    			$Vllne4ankrllT['update'] = $Vpoae2jcihwa;
    	}
    }

		
}

?>