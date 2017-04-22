<?php 

class Model_engine_db {
		
	private $conn;
	private $username;
	private $password;
	private $connection_string;
	private $dbdriver;
	var $connected;
	var $infoDB;
	
	 function __construct($V5dpethpb5ks) {
	 	$this->infoDB = new stdClass();
		$this->connected = false;
		$this->validateParameters($V5dpethpb5ks);
	
		if($this->infoDB->error == 0){
	      if (!($this->conn = @oci_pconnect($V5dpethpb5ks['username'], $V5dpethpb5ks['password'], $V5dpethpb5ks['connection_string']))) {
	    	$this->infoDB->error = 1;
			$this->infoDB->message = 'Cannot connect to '.$V5dpethpb5ks['username'].'@'.$V5dpethpb5ks['connection_string'];
	        $this->connected = false;
	      } else {
	        $this->connected = true;
	      }
		}
    }
	
	function __destruct() {
	  if ($this->connected) {
	  	if($this->conn != NULL)
    	    oci_close($this->conn);
		  	$this->connected = false;
      }
    }
	
	public function query($Vli2kmzedtjg, $Vyyztjqrgtjt = null, $Vwqhhyww2410 = true) {
		  $this->infoDB->error = 0;
	 	  if(!empty($Vli2kmzedtjg)){
		 	  if ($this->connected) {
		 	  	if (!($Vpix0za4fzw3 = @oci_parse($this->conn, $Vli2kmzedtjg))) {
		          $this->infoDB->error = 1;
				  $V15k23dlrr1q = oci_error($this->conn);
				  $this->infoDB->message = $V15k23dlrr1q['message'];
				  return false;
		        } else {
		          $V03sxdkvddmg = true;
		          
		          if (count($Vyyztjqrgtjt) > 0)
		            foreach ($Vyyztjqrgtjt as $Vt4jmd4a4vxq => $Vgn1heae3qo0)
		              $V03sxdkvddmg = $V03sxdkvddmg && @oci_bind_by_name($Vpix0za4fzw3, $Vt4jmd4a4vxq, $Vyyztjqrgtjt[$Vt4jmd4a4vxq]);
					
		          if (!$V03sxdkvddmg) {
		            $this->infoDB->error = 1;
				 	$V15k23dlrr1q = oci_error($Vpix0za4fzw3);
				 	 $this->infoDB->message = $V15k23dlrr1q['message'];
					return false;
		          } else {
		            if (!@oci_execute($Vpix0za4fzw3, $Vwqhhyww2410?OCI_COMMIT_ON_SUCCESS:OCI_DEFAULT)) {
		             	$this->infoDB->error = 1;
				 		$V15k23dlrr1q = oci_error($Vpix0za4fzw3);
				  		$this->infoDB->message = $V15k23dlrr1q['message'];
						return false;
				    } else {
		              $Vfxfolq3jeyb = array();
		              if (oci_statement_type($Vpix0za4fzw3) == "SELECT" && oci_fetch_all($Vpix0za4fzw3, $Vfxfolq3jeyb, null, null, OCI_FETCHSTATEMENT_BY_ROW) !== false) {
		                oci_free_statement($Vpix0za4fzw3);
						$this->infoDB->error = 0;
						return $Vfxfolq3jeyb;
		              } else {
		              	$this->infoDB->error = 0;
		                oci_free_statement($Vpix0za4fzw3);
		                return true;
		              }
		            }
		          }
		        }
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


	public function query_field_name($Vli2kmzedtjg) {
		  $this->infoDB->error = 0;
	 	  if(!empty($Vli2kmzedtjg)){
		 	  if ($this->connected) {
		 	  	if (!($Vpix0za4fzw3 = @oci_parse($this->conn, $Vli2kmzedtjg))) {
		          $this->infoDB->error = 1;
				  $V15k23dlrr1q = oci_error($this->conn);
				  $this->infoDB->message = $V15k23dlrr1q['message'];
				  return false;
		        } else {
		          $V03sxdkvddmg = true;
		            if (!@oci_execute($Vpix0za4fzw3, OCI_DESCRIBE_ONLY)) {
		             	$this->infoDB->error = 1;
				 		$V15k23dlrr1q = oci_error($Vpix0za4fzw3);
				  		$this->infoDB->message = $V15k23dlrr1q['message'];
						return false;
				    } else {
		              $Vfxfolq3jeyb = array();
		              if (oci_statement_type($Vpix0za4fzw3) == "SELECT") {
		               	$V1xpymtzwfqp = oci_num_fields($Vpix0za4fzw3);
						for ($Vi0oyq1lze1p = 1; $Vi0oyq1lze1p <= $V1xpymtzwfqp; $Vi0oyq1lze1p++) {
       					    $Vymhyuwz12em  = oci_field_name($Vpix0za4fzw3, $Vi0oyq1lze1p);
							$Vfxfolq3jeyb[] = $Vymhyuwz12em;
						}
						$this->infoDB->error = 0;
						return $Vfxfolq3jeyb;
		              } else {
		              	$this->infoDB->error = 0;
		                oci_free_statement($Vpix0za4fzw3);
		                return true;
		              }
		            }
		          }
		        
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

	public function commit() {
      $this->infoDB = new stdClass();
      if ($this->connected) {
      	$this->infoDB->error = 0;
        return @oci_commit($this->conn);
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
        return @oci_rollback($this->conn);
      } else {
      	$this->infoDB->error = 1;
		$this->infoDB->message = 'No se puede revertir la transacción; no conectado.';
        return false;
      }  
    }
	
	
		
	function validateParameters($V5dpethpb5ks){
		if(isset($V5dpethpb5ks['dbdriver'])){
			if($V5dpethpb5ks['dbdriver'] == 'oci8'){
				if(isset($V5dpethpb5ks['username']) && isset($V5dpethpb5ks['password']) && isset($V5dpethpb5ks['connection_string'])){
					$this->infoDB->error = 0;
				}else{
					$this->infoDB->error = 1;
					$this->infoDB->message = 'Configuracion de base de datos invalida';
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