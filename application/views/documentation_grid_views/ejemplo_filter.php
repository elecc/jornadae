<p><h2>Descripción</h2></p>
Permite filtrar Datos con la condición AND


<p>
<h2>Configuración</h2>
</p>


<pre class="prettyprint">
/*Configuracion*/

public function serverProcessing(){
	$eS = $this->gConfig();
	$array_query = array();
	$array_qtype = array();
   
        if(isset($_POST['query']) && strlen($_POST['query'])>=1){
            array_push($array_query,$_POST['query']);
            array_push($array_qtype, $_POST['qtype']);
        }
	   
        array_push($array_query,1);
        array_push($array_qtype,'TIPOS_DATOS_GRID.TDG_NUMBER');
        
        $_POST['query'] = $array_query;
        $_POST['qtype'] = $array_qtype;
        
	$output = $eS->serverProcessing($_POST);
	echo json_encode($output);
}
</pre>

<p>
<h2>Codigo Final</h2>
</p>

<pre class="prettyprint">

<?php

 $file = file(APPPATH.'controllers/grid/Ejemplo_filter.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
</pre>
