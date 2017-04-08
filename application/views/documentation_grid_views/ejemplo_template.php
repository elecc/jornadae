<p><h2>Descripción</h2></p>

<p>Exporta la información a un template de WORD o EXCEL </p>

<p>Los templates deben estar en la carpeta application/grid/templates</p>
<br>
<p><h2>IMPORTANTE</h2></p>

<p>Para mandar los datos a una plantilla estos no deberan pasar de los 100 registros por saturación del servidor y lento procesamiento.</p>
<p>Por lo tanto, el botón de "template" no se mostrara en el Grid al sobrepasar el numero de registros contemplados.</p>
<p>Ejemplo: Para ver el resultado presiona el botón de Template en el GRID, Elige el template y Selecciona "Descargar"</p>

<pre class="prettyprint">
$plantilla['template_word_example.docx'] = array('properties'=>array('name'=>'Plantilla DOC'));
$plantilla['template_excel_example.xls'] = array('properties'=>array('name'=>'Plantilla XLS','date'=>'H15','operation'=>array('I%s'=>'=G%s+F%s')));
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Ejemplo_template.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
</pre>
