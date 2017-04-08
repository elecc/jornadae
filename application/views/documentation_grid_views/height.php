<p><h2>Descripción</h2></p>
<p>Cambia la altura del GRID</p>

<p>Ejemplo: Cambiar la altura del GRID a 200  </p>

<pre class="prettyprint">
$config['setHeight'] = 200;
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
	
<?php

 $file = file(APPPATH.'controllers/grid/Height.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
	
</pre>
