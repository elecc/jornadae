<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Seguridad_cls
{
	/**
	 *	Variables de la clase necesarias para algunas operaciones.
	*/

	var $dir_log;
 	var $error_not_secure;
	var $error;
	
	function __construct(){
		$this->error_not_secure = array();
		$this->error = false;
	}

	/**
	 * Esta funcion obtiene la direccion ip del usuario que usa la pagina o sistema.
	*/

    private function Obtener_IP_Cliente()
    {
    	if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    	return $_SERVER['REMOTE_ADDR'];
	}

	/**
	 * Esta funcion filtra mediante expresiones regulares los patrones que coinciden con cadenas
	 * que puedan intentar hacer inyeccion de datos en base a la estructura con que se forman.
	 * ejem: DROP TABLE USUARIO;
	*/

	private function chksql_min($cadena)
	{
		$patrones = '/.*\bCREATE\b.*|.*\bDROP\b.*|.*\bALTER\b.*';
		$patrones .= '|.*\bADMIN\b.*|.*\bROOT\b.*|.*\bEXEC\b.*';
		$patrones .= '|.*\bxp_(\w+|\d+|\s+)|.*\bCHR\(\s*\w*\s?\).*|.*\b.INI\b.*';
		$patrones .='|\<(\s*)\bscript\b(\s*)\>.*?\<(\s*)\/\bscript\b(\s*)\>';
		$patrones .= '|.*\bjavascript\b\:\w*?;?.*|.*\bINNER\b.*|[\x00\x1a\x0a\x0d\x09]/mi';

		$val = preg_match($patrones,$cadena,$salidas);

		if ($val === 1) { return TRUE; } else { return FALSE; }
	}

	/**
	 * Esta funcion filtra igualmente que la "chksql_min" empleando expresiones regulares patrones
	 * coincidentes con sentencias sql mal intenccionadas inyectadas en variables basado en su estructura
	 * la diferencia entre ambas es que esta funcion es mas estricta en cuanto a su validación.
	*/

	private function chksql($cadena)
	{
		$patrones = '/.*\bALTER\b.*|.*\bSELECT\b.*|.*\bUPDATE\b.*';
		$patrones .= '|.*\bINSERT\b.*|.*\bDELETE\b.*|.*\bDROP\b.*';
		$patrones .= '|.*\bFROM\b.*|.*\bWHERE\b.*|.*\bLIKE\b.*';
		$patrones .= '|.*\bBETWEEN\b.*|.*\bCREATE\b.*|.*\bAND\b.*';
		$patrones .= '|.*\bOR\b.*|.*\bROOT\b.*|.*\bINNER\b.*';
		$patrones .= '|.*\bXMLTYPE\b.*|.*\bUPPER\(\s*\w*\s?\).*|.*\bLOWER\(\s*\w*\s?\).*';
		$patrones .= '|.*\bxp_(\w+|\d+|\s+)|.*\bVALUES\b.*|.*\bCHR\(\s*\w*\s?\).*';
		$patrones .='|\<(\s*)\bscript\b(\s*)\>.*?\<(\s*)\/\bscript\b(\s*)\>';
		$patrones .= '|.*\bjavascript\b\:\w*?;?.*|.*\bADMIN\b.*|.*\bEXEC\b.*|[\x00\x1a\x0a\x0d\x09]/mi';

		$val = preg_match($patrones,$cadena,$salidas);

		if ($val===1) { return TRUE; } else { return FALSE; }
	}

	/**
	 * Esta funcion valida el uso de tecnicas de cross side scripting mediante la filtracion de datos que son tomados e
	 * incrustados directamente sobre phps que generan vistas o codigo html evitando que script que han sido insertados 
	 * en campos sean ejecutados de forma clandestina y sean detenidos, ejem:
	 * <input name="titulo" value="<?php echo $titulo; ?>"/>
	 * si la variable titulo ha sido escrita desde una pagina esta puede ser alterada durante la transaccion para ejecutar scripts
	 * que pueden comprometer la informacion por dicha razon lo filtramos de la siguiente forma:
	 * <input name="titulo" value="<?php echo chkxss($titulo);?>"/>
	*/

	private function chkxss($cadena)
	{
		$patrones = '/\<(\s*)\bscript\b(\s*)\>.*?\<(\s*)\/\bscript\b(\s*)\>|.*\bjavascript\b\:\w*?;?.*/mi';

		$val = preg_match($patrones,$cadena,$salidas);

		if ($val === 1) { return TRUE;} else { return FALSE; }
	}

	/**
	 * Igualmente que chksql y chksql_min esta funcion valida posibles cadenas incrustadas en textos comunes de una forma
	 * aun mas estricta filtrando casi en su totalidad las posibles sentencias SQL que se pudieran formar,
	 * en cuanto a el uso de cada una de ellas depende del grado de seguridad de la funcion donde se usa, ejem:
	 * grado o modo 0: campos de texto libre como: "observaciones", "indicios", campos donde se requiere permitir gran variedad de simbolos.
	 * grado o modo 1: campos menos permisivos como: "calle", "razon social", etc.
	 * grado o modo 3: validacion de campos como password o login de no contener mas que datos de tipo alfanumerico y numeros limitando al maximo
	 * 					que una posible sentencia de SQL sea inyectada a la base de datos.
	*/

	private function chksql_max($cadena)
	{
		$patrones = '/.*\bALTER\b.*|.*\bSELECT\b.*|.*\bUPDATE\b.*';
		$patrones .= '|.*\bINSERT\b.*|.*\bDELETE\b.*|.*\bDROP\b.*';
		$patrones .= '|.*\bFROM\b.*|.*\bWHERE\b.*|.*\bLIKE\b.*';
		$patrones .= '|.*\bBETWEEN\b.*|.*\bCREATE\b.*|.*\bAND\b.*';
		$patrones .= '|.*\bOR\b.*|.*\bROOT\b.*|.*\bINNER\b.*';
		$patrones .= '|.*\bXMLTYPE\b.*|.*\bUPPER\(\s*\w*\s?\).*|.*\bLOWER\(\s*\w*\s?\).*';
		$patrones .= '|.*\bxp_(\w+|\d+|\s+)|.*\bVALUES\b.*|.*\bCHR\(\s*\w*\s?\).*';
		$patrones .='|\<(\s*)\bscript\b(\s*)\>.*?\<(\s*)\/\bscript\b(\s*)\>';
		$patrones .= '|.*\bjavascript\b\:\w*?;?.*|.*\bADMIN\b.*|.*\bEXEC\b.*';
		$patrones .= '|[\|\^\,\|\{\}\[\]\“\^\x00\x1a\x0a\x0d\x09\=\n\r\’\‘\#\%\?\!\;\*\<\>\"\']/mi';

		$val = preg_match($patrones,$cadena,$salidas);

		if ($val === 1) { return TRUE; } else { return FALSE; }
	}

	/**
	 *	La funcion InjectSQL recibe 3 parametros:
	 * 	$valor - Este sera el total de argumentos que la funcion este recibiendo por lo que se aconseja
	 * 			 que la funcion donde se usa sea unicamente de recibir parametros a insertar a la base de datos
	 * 			 y no algun tipo de datos que generamos para hacer una insercion, ejem:
	 * 			 			
	 *			 ESTO ES CORRECTO
	 * 			 public function mifuncion('nombre','apellido',edad)
	 *
	 * 			 ESTO ES INCORRECTO
	 *			 public function mifuncion('insert into usuario(nombre,apellido,edad) values('juan','perez',25)')
	 * 			 			
	 * 			 si nosotros hacemos eso la funcion encontrara los patrones de las sentencias SQL lo que impedira que se inserte correctamente
	 *			 por lo cual solo debemos ejecutar la funcion donde solo estemos pasando parametros a insertar.
	 * 
	 *	$modo - El nivel de seguridad con que se evaluaran todos los argumentos que se esta pasando a la funcion.
	 *
	 *			SQL
	 * 			0 - Es el nivel mas bajo, solo revisa palabras minimas.
	 * 			1 - Es el nivel normal intermedio que ademas de revisar palabras muy especificas del lenguaje SQL
	 * 				valua tambien algunas de las sentencias que no se suelen usar regularmente a nivel web.
	 * 			2 - Es el nivel mas alto y estricto de revision, valua toda palabra relacionada al lenguaje SQL y
	 * 				busca posibles estructuras de inyeccion de datos.
	 *
	 *			XSS
	 * 			1 - Es un nivel distinto de validación, generado para filtrar las cadenas enviadas por los métodos 
	 * 				get y post que pudieran contener cadenas con código malicioso especialmente mediante la técnica del XSS.
	 * 
	 * 	        $tipo - Es el tipo de filtrado que se asignara ya sea este de tipo SQL o XSS
	 *
	 *
	 *
	 *		Nota: Como dato adicional se informa que de preferencia debemos generar un archivo de texto plano llamado: bitLog.txt con permisos 777 
	 *		ya que de no generarlo el script intentara crear uno pero al no ser los dueños del documento y no saber con que permisos lo genera
	 *		podemos caer en la problematica de no poder editarlo ni eliminarlo.
	 *		
	 *		Tambien es posible configurar la ruta ya sea absoluta o relativa de la carpeta donde hayamos creado el archivo bitLog.txt en caso de que
	 *		no deseemos que se encuentre en el mismo lugar donde guardamos nuestra clase de Seguridad, esto en un archivo que viene junto a la clase 
	 *		llamado seguridad_cls.ini
	*/

	public function injectSQL($parameter,$mode = 1, $type = ''){
		if(is_array($parameter)){
			foreach($parameter as $value){
				if(is_array($value))
					foreach($value as $parameter_value)
						$this->InjectSQL($parameter_value,$mode,$type);
				else{
					$passed = $this->injectSQLNext($value,$mode,$type);
					if($passed){ $this->error = true; break;} 
				}
			}
		}else if(is_string($parameter)){
			$passed = $this->injectSQLNext($parameter,$mode,$type);
			if($passed){ $this->error = true; } 
		}
	}
	
	public function injectSQLNext($value,$mode,$type){
		$cip = $this->Obtener_IP_Cliente();
		$passed = true;
		
		if($type == 'sql'){
			if ($mode == 0)
				$passed = $this->chksql_min($value);
			else if ($mode == 2)
				$passed = $this->chksql_max($value);
			else if ($mode == 1)
				$passed = $this->chksql($value);
			else
				$passed = true;
		}else if ($tipo == 'xss'){
			if ($mode == 1)
				$passed = $this->chkxss($value);
			else
				$passed = true;
		}
		
		if ($passed){
			$identifier = date("d/m/Y H:i:s")."|cadena sospechosa|".$value."|IP: ".$cip."\r\n";
			$this->error_not_secure[] = $identifier;
			return $passed;
		}else{
			return $passed;
		}
	}
	
	
	/**
	 * FALTA DOCUMENTACION
	 *
	 *
	*/

	public function unhtmlspecialchars($string)
	{
		$search  = array('&', '\'', '"', '<', '>', '/');
		$replace = array('&amp;', '&#039;', '&quot;', '&lt;', '&gt;', '&#x2F');
	 
		$string = str_replace ( $search, $replace, $string, $count);
	    
		if ($count>0)
		{
			$cip = $this->Obtener_IP_Cliente();
			if (!empty($_SESSION['ss_registrado'])) $identifier = $_SESSION['ss_login']."/".$_SESSION['ss_usuario']."/".$_SESSION['ss_permiso']."|";
			else $identifier = "";
			date_default_timezone_set('America/Mexico_City');
			$input = fopen($this->dir_log."bitLog.txt","a+");
			fwrite($input,$identifier.date("d/m/Y H:i:s")."|cadena sospechosa|".$string."|IP: ".$cip."\r\n");
			fclose($input);
			print_r("<br>Medida de seguridad accionada, por favor consulte a su administrador para mas detalles.<br>");
			exit();
	    }
		else{
			print_r("<br>Filtros pasados satisfactoriamente<br>");
			return $string;
		}
	}
}
?>