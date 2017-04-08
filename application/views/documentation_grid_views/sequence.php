<p><h2>Descripción</h2></p>

<p>Asigna el valor de una SEQUENCE ORACLE a un campo del form, para ver el resultado presione nuevo</p>

<?php echo $parameters['html']?>

<p>Ejemplo: Asigna una SEQUENCE a TDG_ID</p>

<pre class="prettyprint">
$properties['TDG_ID']['SEQUENCE'] = ' SELECT tdg_tipos_de_dato_seq.nextval as TDG_ID from dual';
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Sequence.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
	
</pre>
