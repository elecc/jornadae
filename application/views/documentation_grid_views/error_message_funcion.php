<p><h2>Descripción</h2></p>

<p>Evalua un campo con una función javascript y muestra error personalizado</p>

<p>Ejemplo: Números menores o iguales a 8 en el campo TDG_ID</p>

<pre class="prettyprint">
$properties['TDG_ID']['FUNCION'] = 'valida';
$properties['TDG_ID']['ERROR_MESSAGE_FUNCION'] = 'El valor debe ser menor o igual a 8';
</pre>

<p>Codigo Javascript</p>

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
	
<?php

 $file = file(APPPATH.'controllers/grid/Error_message_funcion.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	
</pre>
