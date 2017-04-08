<p><h2>Descripción</h2></p>
<p>ID del GRID</p>

<p><h2>IMPORTANTE</h2></p>

<p>Si hay más de un grid en el CONTROLLER los ID deben ser distintos</p>

<p>Ejemplo: ID "tiposDatoID"</p>

<pre class="prettyprint">
$config['sIdTable'] = 'tiposDatoID';
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	<?php

 $file = file(APPPATH.'controllers/grid/Id.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
	
</pre>
