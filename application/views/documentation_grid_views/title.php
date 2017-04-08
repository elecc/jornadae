<p><h2>Descripción</h2></p>

<p>Título del GRID</p>

<p>Ejemplo: Define un título al grid "Nuevo Titulo Tipos de dato 2"</p>

<pre class="prettyprint">
$config['sTitle'] = 'Nuevo Titulo Tipos de dato 2';
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Title.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
	
</pre>
