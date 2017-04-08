<p><h2>Descripción</h2></p>


<p>Oculta una columna en el GRID,FORM,EXPORTAR,TEMPLATES </p>

<p>Ejemplo: Oculta el campo TDG_VARCHAR2</p>

<pre class="prettyprint">
$properties['TDG_VARCHAR2']['EDITABLE'] = false;
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Editable.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	
</pre>
