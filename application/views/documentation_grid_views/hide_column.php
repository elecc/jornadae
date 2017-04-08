<p><h2>Descripción</h2></p>

<p>Oculta una columna en el GRID</p>

<?php echo $parameters['html']?>

<p>Ejemplo: Oculta TDG_VARCHAR2</p>

<pre class="prettyprint">
$properties['TDG_VARCHAR2']['HIDE_COLUMN'] = true;
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Hide_column.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	
</pre>
