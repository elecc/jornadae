<p><h2>Descripción</h2></p>


<p>SHOW_GRID_COLUMNS muestra las columnas especificas de un catalogo en el GRID</p>

<p>Ejemplo: Muestra  TDC_DESCRIPCION en el GRID</p>

<pre class="prettyprint">
$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_GRID_CATALOG');
$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_CATALOG','CATALOG'=>array('SHOW_GRID_COLUMNS'=>array('TDC_DESCRIPCION')));
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Catalog_show_grid_columns.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	
</pre>
