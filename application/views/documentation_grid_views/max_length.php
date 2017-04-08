<p><h2>Descripción</h2></p>

<p>Cambia el ancho de una columna en el GRID</p>


<p>Ejemplo: Cambia ancho a TDG_BLOB</p>

<pre class="prettyprint">
$properties['TDG_BLOB']['MAX_LENGTH'] = 150;
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Max_length.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	
</pre>

