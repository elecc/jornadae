<p><h2>Descripción</h2></p>

<p>Base de datos a la que hara consultas el GRID</p>

<p>Ejemplo: Configuraci&oacute;n Base de datos</p>

<pre class="prettyprint">
$config['db']['username'] = 'desarrollo';
$config['db']['password'] = '.desarrollo.';
$config['db']['connection_string'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.1.65.92)(PORT=1521))(CONNECT_DATA=(SID=desorcl)))';
$config['db']['dbdriver'] = 'oci8';
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Db.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
	
</pre>
