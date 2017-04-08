<p><h2>Descripción</h2></p>


<p>Cambia el título de la columna y la etiqueta que aparece en el form, para ver el resultado presione nuevo o editar</p>

<p>Ejemplo: Cambia el título de TDG_VARCHAR2 a Campo VARCHAR 2</p>

<pre class="prettyprint">
$properties['TDG_VARCHAR2']['DISPLAY'] = 'Campo VARCHAR 2';
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Display.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
</pre>
