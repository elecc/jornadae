<p><h2>Descripción</h2></p>

<p>Oculta un campo en el form, presiona nuevo o editar para ver el resultado</p>

<?php echo $parameters['html']?>

<p>Ejemplo: Oculta TDG_VARCHAR2</p>

<pre class="prettyprint">
$properties['TDG_VARCHAR2']['HIDDEN'] = true;
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
