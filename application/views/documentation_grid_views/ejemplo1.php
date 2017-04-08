<h2>Configuración Básica</h2>

<p>
El controller debe heredar las propiedades  de <b>Plantilla_controller</b>
</p>

<pre class="prettyprint">
class Ejemplo1 extends Plantilla_controller {
	
}
</pre>

<p>
Agrega sPATH y sClass al constructor
</p>

<pre class="prettyprint">
	
$this->sPATH(dirname(__FILE__));
$this->sClass(get_class($this));

</pre>

<pre class="prettyprint">
	
class Ejemplo1 extends Plantilla_controller {
	function __construct(){
		parent::__construct();
		$this->sPATH(dirname(__FILE__));
		$this->sClass(get_class($this));
	}
}

</pre>

<p>
Configuración básica del grid 
</p>
<pre class="prettyprint">
class Ejemplo1 extends Plantilla_controller {
	
	function __construct(){
		parent::__construct();
		$this->sPATH(dirname(__FILE__));
		$this->sClass(get_class($this));
	}
	
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
	
}	
</pre>

<p>Agregar la función control</p>

<pre class="prettyprint">
private function control(){
	return $this->gGrid($this->gConfig());
}
</pre>

<p>Agregar la función serverProcessing</p>

<pre class="prettyprint">
public function serverProcessing(){
	$eS = $this->gModel_engine($this->gConfig());
	$output = $eS->serverProcessing($_POST);
	echo json_encode($output);
}	
</pre>

<p><h2>Codigo Final</h2></p>
<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Ejemplo.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>

</pre>