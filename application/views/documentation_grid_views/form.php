<p><h2>Descripción</h2></p>
<p>gForm cambia de un GRID a un FORM</p>

<p><h2>IMPORTANTE</h2></p>

<p>Las propiedades y configuraciones son las mismas que se utilizan para generar un GRID </p>

<p><br>La configuracion server_rute no es necesaria<br></p>

<p>Ejemplo: Crea un Form</p>

<pre class="prettyprint">
$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_GRID_CATALOG');
$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_CATALOG','CATALOG'=>array());
</pre>


<p>Cambia la función gGrid por gForm<br></p>

<pre class="prettyprint">
public function control(){
		return $this->gForm($this->gConfig());
}	
</pre>

<p>Config sRedirectForm<br></p>

<pre class="prettyprint">
$config['sRedirectForm'] = 'form/postForm'; // Controller/funcion a donde se va a redireccionar
</pre>

<p>Función postForm</p>

<pre class="prettyprint">
	
public function postForm(){
	$this->save();	// IMPORTANTE la funcion save guarda los datos que enviamos atraves del formulario
	echo "Ejemplo Form";
	print_r($_POST);
}
	
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
<?php

 $file = file(APPPATH.'controllers/grid/Form.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>	

	
</pre>
