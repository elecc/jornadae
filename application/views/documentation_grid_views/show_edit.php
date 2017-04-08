<p><h2>Descripción</h2></p>
<p>Muestra u oculta la columna Editar en el GRID</p>

<p>Ejemplo: Oculta la columna Editar en el GRID</p>

<pre class="prettyprint">
$config['showEDIT']= false;
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Show_edit.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
	
</pre>
