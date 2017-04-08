<p>Muestra o oculta un link de Volver atras en la parte inferior del GRID</p>

<p><h2>IMPORTANTE</h2></p>

<p>La navegacion solo funciona entre GRIDS</p>

<p>Ejemplo: Presiona el Link Volver Atras</p>

<pre class="prettyprint">
$config['setShowBackButton'] = true;
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
	<?php

 $file = file(APPPATH.'controllers/grid/Ejemplo_back_button.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
	
</pre>