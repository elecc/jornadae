<div id="zonaTrabajo">
<p><h1>Propiedad FORCE_ADD_VALUE</h1></p>

<p>FORCE_ADD_VALUE remplaza el TEXTO del valor original, este no se guarda en la base de datos solo se muestra en el GRID</p>

<?php echo $parameters['html']?>

<p>Ejemplo: Agrega -1 a la columna TDG_VARCHAR2</p>

<pre class="prettyprint">
$properties['TDG_VARCHAR2']['FORCE_ADD_VALUE'] = '-1';
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
	
class FORCE_ADD_VALUE extends Plantilla_controller {
	
	function __construct(){
		parent::__construct();
		$this->sPATH(dirname(__FILE__));
		$this->sClass(get_class($this));
	}
	
	public function index(){
		$this->load->helper('url');
		$html = $this->control();
		$division = array('area'=>'documentation_grid_views/force_add_value','parameters'=>array('html'=>$html));
		$this->build(array($division));
	}
	
	public function gConfig(){
		$eS = new Model_engine();
		$eS->sDB($this->db);
		$eS->sPATH($this->gPath());
		$eS->sIdTable('tiposDato');
		$eS->sSERVERRUTE('serverProcessing');
	
		$properties['TDG_VARCHAR2']['FORCE_ADD_VALUE'] = '-1';
	
		$table[] = array('TABLE_NAME'=>'TIPOS_DATOS_GRID');
		

		$eS->properties($properties);
		$eS->sTitle('Tipos de dato');
		$eS->table($table);
		return $eS;
	}
	
	public function control(){
		return $this->gGrid($this->gConfig());
	}
	
	public function serverProcessing(){
		$eS = $this->gConfig();
		$output = $eS->serverProcessing($_POST);
		echo json_encode($output);
	}
}
	
</pre>

</div>
