<h1>Configuración Básica</h1>

<p>
Cargar la libreria map
</p>

<pre class="prettyprint">
$this->load->library('map');
</pre>

<p>
Crear nuevo objeto de la libreria map y hacer referencia a la funcion SimpleMap
</p>

<pre class="prettyprint">
$map = new Map();
$map = $map->SimpleMap('ejemplo', '19.4233254', '-99.1508042','Mapa de Ejemplo');
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
<?php

 $file = file(APPPATH.'controllers/map/Simple_map.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
</pre>
