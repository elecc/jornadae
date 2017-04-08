<p><h2>Descripción</h2></p>


<p>Evalua un campo con una expresión regular</p>

<p>Ejemplo: Solo letras Mayúsculas en el campo TDG_VARCHAR2</p>

<pre class="prettyprint">
$properties['TDG_VARCHAR2']['EXPRESION'] = '/^[A-Z]*$/';
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Expresion.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
</pre>
