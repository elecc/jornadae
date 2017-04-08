<p><h2>Descripción</h2></p>
<p>Link que redirecciona a una nueva pagina por cada registro</p>

<p>Ejemplo: Muestra el contenido de la función ejemploCONTENT</p>

<pre class="prettyprint">
$config['showCONTENT']['visible'] = true;
$config['showCONTENT']['url'] = 'grid/show_content/ejemploCONTENT';
$config['showCONTENT']['show_content_text'] = 'Ver';
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Show_content.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>

	
</pre>
