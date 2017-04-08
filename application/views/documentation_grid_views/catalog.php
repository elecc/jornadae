<p><h2>Descripción</h2></p>

<p>CATALOG crea un SELECT html en un campo a partir de  2 tablas relacionadas, para ver el resultado presione nuevo o editar</p>

<p><h2>IMPORTANTE</h2></p>

<p>En el grid no se muestran las columnas del catalogo ver la propiedad de CATALOG SHOW_GRID_COLUMNS</p>

<p>Ejemplo: Cambia TDC_ID a CATALOG SELECT</p>

<pre class="prettyprint">
$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_GRID_CATALOG');
$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_CATALOG','CATALOG'=>array());
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Catalog.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	
</pre>
