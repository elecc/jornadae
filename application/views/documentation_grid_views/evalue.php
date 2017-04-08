<p><h2>Descripción</h2></p>

<p>Asigna un valor por defecto en el campo del form al editar un registro, para ver el resultado presione editar</p>

<p>Ejemplo: Asigna el texto AUTO a TDG_VARCHAR2</p>

<pre class="prettyprint">
$properties['TDG_VARCHAR2']['EVALUE'] = 'AUTO EDIT';
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Evalue.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	
</pre>
