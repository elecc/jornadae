<p><h2>Descripción</h2></p>

<p>Asigna el atributo type=password a un input del formulario</p>
<br>
<p>Ejemplo: Asigna el atributo type=password al input del campo TDG_VARCHAR2_SIZE20</p>
<pre class="prettyprint">
$properties['TDG_VARCHAR2_SIZE20']['INPUT_TYPE_PASSWORD'] = true;
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Password.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	
</pre>
