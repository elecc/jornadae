<p><h2>Descripción</h2></p>

<p>Agrega un SELECT html a un campo en el form, los index deben corresponder a los tipos de dato de la base de datos, para ver el resultado presione nuevo o editar</p>

<p>Ejemplo: SELECT al campo TDG_NUMERIC</p>

<pre class="prettyprint">
$properties['TDG_NUMERIC']['SELECT'] = array(1=>'Item 1',2=>'Item 2');
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Select.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	
</pre>
