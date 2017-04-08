<p><h2>Descripción</h2></p>

<p>Evalua un campo con una expresión regular y agrega un mensaje de error personalizado</p>

<?php echo $parameters['html']?>

<p>Ejemplo: Solo letras Mayúsculas en el campo TDG_VARCHAR2</p>

<pre class="prettyprint">
$properties['TDG_VARCHAR2']['EXPRESION'] = '/^[A-Z]*$/';
$properties['TDG_VARCHAR2']['ERROR_MESSAGE_EXPRESION'] = 'Solo Mayusculas';
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Error_message_expresion.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	
</pre>
