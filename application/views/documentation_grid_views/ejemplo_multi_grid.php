<p><h2>Descripción</h2></p>

Permite tener multiples GRID a diferentes Tablas y Bases de datos

<p>
<h2>Configuración del Primer GRID</h2>
</p>



<pre class="prettyprint">
/*Configuracion del Primer GRID*/
	
	private function gConfig(){
		$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_GRID');
		
		$config['sIdTable'] = 'tiposDato';
		$config['server_rute'] = 'serverProcessing';
		$config['sPath'] = $this->gPath();
		$config['table'] = $table;
		$config['sTitle'] = 'Tipos de dato';
		$config['db']['username'] = 'desarrollo';
		$config['db']['password'] = '.desarrollo.';
		$config['db']['connection_string'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.1.130.24)(PORT=1521))(CONNECT_DATA=(SID=desorcl)))';
		$config['db']['dbdriver'] = 'oci8';
		
		return $config;
	}
	
	
	private function control(){
		return $this->gGrid($this->gConfig());
	}
	
	public function serverProcessing(){
		$eS = $this->gModel_engine($this->gConfig());
		$output = $eS->serverProcessing($_POST);
		echo json_encode($output);
	}
	
</pre>

<p>
<h2>Configuración del Segundo GRID</h2>
</p>


<pre class="prettyprint">
/*Configuracion del Segundo GRID*/
	
	private function gConfigGrid2(){
		$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_GRID_CATALOG');
		
		$config['sIdTable'] = 'tiposDatoCatalog';
		$config['server_rute'] = 'serverProcessingGrid2';
		$config['sPath'] = $this->gPath();
		$config['table'] = $table;
		$config['sTitle'] = 'Tipos de dato Grid 2';
		$config['db']['username'] = 'desarrollo';
		$config['db']['password'] = '.desarrollo.';
		$config['db']['connection_string'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.1.130.24)(PORT=1521))(CONNECT_DATA=(SID=desorcl)))';
		$config['db']['dbdriver'] = 'oci8';
		
		return $config;
	}
	
	private function controlGrid2(){
		return $this->gGrid($this->gConfigGrid2());
	}
	
	public function serverProcessingGrid2(){
		$eS = $this->gModel_engine($this->gConfigGrid2());
		$output = $eS->serverProcessing($_POST);
		echo json_encode($output);
	}
</pre>

<p>
<h2>Codigo Final</h2>
</p>

<pre class="prettyprint">
<?php

 $file = file(APPPATH.'controllers/grid/Ejemplo_multi_grid.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
</pre>