<p><h2>Descripción</h2></p>
<p>Link que muestra un DIALOG BOX por cada registro con el contenido que especifique el desarrollador </p>

<p>Ejemplo: Muestra el contenido de la función ejemploPOPUPCONTENT</p>

<pre class="prettyprint">
$config['showPOPUPCONTENT']['visible'] = true;
$config['showPOPUPCONTENT']['url'] = 'grid/show_popup_content/ejemploPOPUPCONTENT';
$config['showPOPUPCONTENT']['show_popup_content_text'] = 'Ver';
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Show_popup_content.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
	
</pre>
