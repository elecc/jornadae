<?php 

class Model_engine_db_pgsql {
		
	private $conn;
	private $username;
	private $password;
	private $connection_string;
	private $dbdriver;
	var $connected;
	var $infoDB;
	
	function __construct($V5dpethpb5ks){
	 	$this->infoDB = new stdClass();
		$this->connected = false;
		$this->validateParameters($V5dpethpb5ks);
		
		if($this->infoDB->error == 0){
	      if (!($this->conn = pg_connect($V5dpethpb5ks['connection_string']))) {
	    	$this->infoDB->error = 1;
			$this->infoDB->message = 'Cannot connect to '.$V5dpethpb5ks['connection_string'];
	        $this->connected = false;
	      } else {
	        $this->connected = true;
	      }
		}
		
	 }
	
	function __destruct() {
	  if ($this->connected) {
	  	if($this->conn != NULL)
    	    pg_close($this->conn);
		  	$this->connected = false;
      }
    }
	
	
	public function query($Vli2kmzedtjg){
		 $this->infoDB->error = 0;
		 if(!empty($Vli2kmzedtjg)){
		 	  if ($this->connected) {
		 	 	  		$records = array();
						$result = pg_query($this->conn,$Vli2kmzedtjg);
					  	if(!$result){
					  		$this->infoDB->message = pg_last_error($this->conn);
					  	}else{
					  		$type_statement = strpos($Vli2kmzedtjg, 'SELECT');
							if ($type_statement !== false) 
					  			$records = pg_fetch_all($result);
							else 
								return true;
					  	}
					    $this->infoDB->error = 0;
						return $records;
			   } else {
		      	$this->infoDB->error = 1;
				$this->infoDB->message = 'No esta conectado a la base de datos';
				return false;
		      }
	      }else{
	      	$this->infoDB->error = 1;
			$this->infoDB->message = 'Query invalido';
			return false;
	      }
		  return false;
	}

	public function query_field_name($Vli2kmzedtjg){
		$this->infoDB->error = 0;
		if(!empty($Vli2kmzedtjg)){
			 if ($this->connected) {
			 		$res = pg_query($this->conn, $Vli2kmzedtjg);
				    $ncols = pg_num_fields($res);
					$records = array();
					
					for ($i = 0; $i < $ncols; $i++) {
       					    $column_name  = pg_field_name($res, $i);
							$records[] = $column_name;
					}
					$this->infoDB->error = 0;
					return $records;
				 
			 }else{
			 	$this->infoDB->error = 1;
				$this->infoDB->message = 'No esta conectado a la base de datos';
				return false;
			 }	
		}else{
	      	$this->infoDB->error = 1;
			$this->infoDB->message = 'Query invalido';
			return false;
	    }
		
	}


	public function commit() {
      $this->infoDB = new stdClass();
      if ($this->connected) {
      	$this->infoDB->error = 0;
        return pg_query($this->conn,"COMMIT");
      } else {
      	$this->infoDB->error = 1;
		$this->infoDB->message = 'No se puede confirmar la transacción; no conectado.';
        return false;
      }  
    }
	
	public function rollback() {
        $this->infoDB = new stdClass();
	    if ($this->connected) {
	      	$this->infoDB->error = 0;
			return pg_query($this->conn,"ROLLBACK");
	     } else {
	      	$this->infoDB->error = 1;
			$this->infoDB->message = 'No se puede revertir la transacción; no conectado.';
	        return false;
	     }  
    }
	
	
	function validateParameters($V5dpethpb5ks){
		if(isset($V5dpethpb5ks['dbdriver'])){
			if($V5dpethpb5ks['dbdriver'] == 'pgsql'){
				if(isset($V5dpethpb5ks['connection_string'])){
					$this->infoDB->error = 0;
				}else{
					$this->infoDB->error = 1;
					$this->infoDB->message = 'Configuración de base de datos invalida';
				}
			}else{
				$this->infoDB->error = 1;
				$this->infoDB->message= 'dbdriver no soportado';
			}	
		}else{
			$this->infoDB->error = 1;
			$this->infoDB->message = 'Por favor especifique la variable dbdriver';
		}
	}
}
?>