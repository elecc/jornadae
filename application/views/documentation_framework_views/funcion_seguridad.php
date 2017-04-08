<p>
<h1>Instalación de la Función de Seguridad.</h1>	
<br>
<p>
Se carga el helper y se crea una nueva variable que contenga al objeto Seguridad_cls
<pre class="prettyprint">
$this->load->helper('seguridad_cls/seguridad_cls');
$s = new Seguridad_cls();
</pre>
</p>

<p>
La variable $parameters (o el nombre que quieras) puede contener un String como el siguiente:
<pre class="prettyprint">
$parameters = 'DELETE';
</pre>
</p>

<p>
O un conjunto de arreglos:
<pre class="prettyprint">
$parameters = array('jansidaisdjio','ijasbidbauid',array('delete *from','drop table usuario',array('jasdsa','hasbd',array('jiasbdias'))));
</pre>
</p>

<p>
La función InjectSQL que pertenece al objecto Seguridad_cls recibe los parametros y argumentos a evaluar
<pre class="prettyprint">
Define InjectSQL($parameters,$mode,$type);
$s->InjectSQL($parameters,1,'sql');
</pre>
</p

<p>
<pre class="prettyprint">	 
La función InjectSQL recibe 3 parametros:

	 $parameters -  Este sera el total de argumentos que la función este recibiendo por lo que se aconseja
			que la donde se usa sea unicamente de recibir parametros a insertar a la base de datos
 			y no algún tipo de datos que generemos para hacer una inserción, ejemplo:
  			 			
 			ESTO ES CORRECTO
  			public function mifuncion('nombre','apellido',edad)
 
  			ESTO ES INCORRECTO
 			public function mifuncion('insert into usuario(nombre,apellido,edad) values('juan','perez',25)')
  			 			
  			si nosotros hacemos eso la función encontrara los patrones de las sentencias SQL lo que impedira que se inserte correctamente
 			por lo cual solo debemos ejecutar la función donde solo estemos pasando parametros a insertar.
	  
	 	$mode - El nivel de seguridad con que se evaluaran todos los argumentos que se esta pasando a la función.
	 
 			SQL
  			0 - Es el nivel mas bajo, solo revisa palabras minimas.
  			1 - Es el nivel normal intermedio que ademas de revisar palabras muy especificas del lenguaje SQL
  				valua tambien algúnas de las sentencias que no se suelen usar regularmente a nivel web.
  			2 - Es el nivel mas alto y estricto de revision, valua toda palabra relacionada al lenguaje SQL y
  				busca posibles estructuras de inyeccion de datos.
 
 			XSS
  			1 - Es un nivel distinto de validación, generado para filtrar las cadenas enviadas por los métodos 
  				get y post que pudieran contener cadenas con código malicioso especialmente mediante la técnica del XSS.
	  
	  	$type - Es el tipo de filtrado que se asignara ya sea este de tipo SQL o XSS
	 
Nota: Como dato adicional se informa que de preferencia debemos generar un archivo de texto plano llamado: bitLog.txt con permisos 777 
ya que de no generarlo el script intentara crear uno pero al no ser los dueños del documento y no saber con que permisos lo genera
podemos caer en la problematica de no poder editarlo ni eliminarlo.

Tambien es posible configurar la ruta ya sea absoluta o relativa de la carpeta donde hayamos creado el archivo bitLog.txt en caso de que
no deseemos que se encuentre en el mismo lugar donde guardamos nuestra clase de Seguridad, esto en un archivo que viene junto a la clase 
llamado seguridad_cls.ini
</pre>
</p>

<p>

El objeto Seguridad_cls tiene la variable error (BOOLEAN) y error_not_secure (Array)
Variable error(BOOLEAN) si no hay algún error, la variable sera igual a FALSE, en caso contrario será TRUE
Variable error_not_secure(Array) almacena las posibles cadenas peligrosas
<br>
<h2>Ejemplo:</h2>
<pre class="prettyprint">
if($s->error){
	$result = "Funcion de seguridad activada ";
	foreach ($s->error_not_secure as $key => $value) {
		print_r($value);
	}
}else{
	$result = "Cadena Valida";
}
</pre>
</p>



<p>
<h2>Código Ejemplo</h2>
<pre class="prettyprint">	
class Funcion_seguridad extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		$this->load->helper('seguridad_cls/seguridad_cls');
		$s = new Seguridad_cls();
		$parameters = 'DELETE';
		
		$parameters = array('jansidaisdjio','ijasbidbauid',array('delete *from','drop table usuario',array('jasdsa','hasbd',array('jiasbdias'))));
		
		$s->InjectSQL($parameters,0,'sql');
		
		if($s->error){
			$result = "Funcion de seguridad activada ";
			foreach ($s->error_not_secure as $key => $value) {
				print_r($value);
			}
		}else{
			$result = "Cadena Valida";
		}
		
		$view = $this->load->view('documentation_framework_views/funcion_seguridad','',TRUE);
		$content = $this->load->view('documentation_framework_views/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('sidebar_menu_framework');
		$this->set_content($content);
		$this->build();
	}

}
</pre>
</p>