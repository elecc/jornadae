<p><h2>Descripción</h2></p>
<p>Muestra u oculta las columnas del GRID</p>

<p>Ejemplo: Muestra toggleBTN en el GRID</p>

<pre class="prettyprint">
$config['sToggleBTN'] = true;
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Show_togglebtn.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
</pre>
