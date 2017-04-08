<p><h2>Descripción</h2></p>

<p>Muestra los iconos de Editar y Eliminar en el GRID</p>


<p>Ejemplo: Muestra iconos</p>

<pre class="prettyprint">
$config['sIcons'] = true;
</pre>

<p><h2>Codigo Final</h2></p>

<<pre class="prettyprint">
	<?php

 $file = file(APPPATH.'controllers/grid/Sicons.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
</pre>