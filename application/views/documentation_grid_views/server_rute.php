<p><h2>Descripción</h2></p>

<p>Identificador del servidor de procesos</p>

<p><h2>IMPORTANTE</h2></p>

<p>Si hay más de un grid en el CONTROLLER los servidores de procesos deben ser distintos</p>

<?php echo $parameters['html']?>

<p>Ejemplo: ID "serverProcessing"</p>

<pre class="prettyprint">
$config['server_rute'] = 'serverProcessing';
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	<?php

 $file = file(APPPATH.'controllers/grid/Server_rute.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
