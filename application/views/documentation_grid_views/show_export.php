<p><h2>Descripción</h2></p>
<p>Muestra u oculta el botón de Exportar en el GRID</p>
<p>Los formatos soportados son: CSV y PDF</p>
<br>
<p><h2>IMPORTANTE</h2></p>

<p>Para la migración a archivos PDF el limite es de 100 registros, esto para evitar un procesamiento largo y saturación del server, por lo tanto, el icono de PDF se ocultará al sobrepasar dicha cantidad.</p>

<p>Ejemplo: Oculta el botón Exportar en el GRID</p>

<pre class="prettyprint">
$config['showEXPORT'] = false;
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Show_export.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	
	
</pre>
