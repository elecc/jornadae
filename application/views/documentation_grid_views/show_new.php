<p><h2>Descripción</h2></p>

<p>Muestra u oculta el botón Nuevo en el GRID</p>

<p>Ejemplo: Oculta el botón Nuevo en el GRID</p>

<pre class="prettyprint">
$config['showNEW'] = false;
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Show_new.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
	
</pre>
