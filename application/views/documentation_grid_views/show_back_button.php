<p><h2>Descripción</h2></p>
<p>Muestra u oculta link de Volver atras en la parte inferior del GRID</p>

<p><h2>IMPORTANTE</h2></p>

<p>La navegación solo funciona entre GRIDS</p>

<p>Ejemplo: Presiona el link "Ver" de algún registro</p>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
	<?php

 $file = file(APPPATH.'controllers/grid/Show_back_button.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
	
</pre>
