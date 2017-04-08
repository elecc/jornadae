<p><h2>Descripción</h2></p>

<p>Evalua un campo con una función javascript</p>

<p>Ejemplo: Números menores o iguales a 8 en el campo TDG_ID</p>

<pre class="prettyprint">
$properties['TDG_ID']['FUNCION'] = 'valida';
</pre>

<p><h2>Codigo Javascript</h2></p>

<pre class="prettyprint">
function valida(element){
	if(element.value>8){
		return false;
	}
	return true;
}	
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
c<?php

 $file = file(APPPATH.'controllers/grid/Funcion.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	
</pre>
