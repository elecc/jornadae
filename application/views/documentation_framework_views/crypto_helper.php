<p>
<h1>Configuración de la función Cripto Helper.</h1>	
<br>
</p>

<p>
Para encriptar una URL, se carga el helper cripto
<pre class="prettyprint">
$this->load->helper('cripto');
</pre>
</p>

<p>
Estos parametros encriptan la URL a través del helper, y se obtiene como salida la URL encriptada
	junto con la página a donde debe redirigirse cuando no sea válido algun parametro.
<pre class="prettyprint">
$var = "framework";
$data  = array('seguridad'=>'ok');
$url = base_url()."?".$var."=".base64_encode(mCrypt(serialize($data)));
</pre>
</p>

<p>
<h2>Código Ejemplo</h2>
<pre class="prettyprint">
class Crypto_helper extends Template_controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index(){
		$this->load->helper('crypto');
		
		$var = "framework";
		$data  = array('seguridad'=>'ok');
		$url = base_url()."?".$var."=".base64_encode(mCrypt(serialize($data)));
	
		$view = $this->load->view('documentation_framework_views/crypto_helper',array('url'=>$url),TRUE);
		$content = $this->load->view('documentation_framework_views/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('sidebar_menu_framework');
		$this->set_content($content);
		$this->build();
	}
	
}
</pre>
</p>
<br>

<p>
	<h2>Resultado una URL encriptada.</h2>	
	<pre class="prettyprint">
<?php echo $url?>
	</pre>
</p>

<p>
<h1>Desencriptar una URL.</h1>	
<br>
</p>

<p>
Para desencriptar una URL, obtiene por metodo GET la variable definida en este caso "framework" y obtenemos su valor
<pre class="prettyprint">
framework=SUc5SVVLRlZkUzFUVUU0OHdCTWhQeHpBamI0bHlwc3AyRW41UGtQdmI1a3N0dHlZNmhWZkZ2bGZFcGgwWnFMSw==

Valor -> SUc5SVVLRlZkUzFUVUU0OHdCTWhQeHpBamI0bHlwc3AyRW41UGtQdmI1a3N0dHlZNmhWZkZ2bGZFcGgwWnFMSw==
</pre>
</p>

<p>
La desencriptación se realiza mediante barrido de la variable $entity 
<pre class="prettyprint">
$entity = "S2FZaDZDcXNmZEwxMEk2ZjJ3WXh6dGU1V01vZmZHeERqMTJhQnQ5dlZIaU1Nc3QrV2NJWDFoaUhER0ZVdUk3bQ==";
if(base64_decode($entity) == true){
	$text = base64_decode($entity);
	try{
		$text = dCrypt($text);
		if(!is_bool($text)){
			$data = unserialize($text);
			print_r($data);
			return $data;
		}else{
			return false;
		}
	}catch(Exception $e){
		return false;
	}
}else{
	return false;
}
</pre>
</p>

<p>
Salida Desencriptar
<pre class="prettyprint">
Array ( [seguridad] => ok ) 
</pre>
</p>

<p>
<h2>Código Ejemplo</h2>
<pre class="prettyprint">
function desencriptar(){
		$entity = "S2FZaDZDcXNmZEwxMEk2ZjJ3WXh6dGU1V01vZmZHeERqMTJhQnQ5dlZIaU1Nc3QrV2NJWDFoaUhER0ZVdUk3bQ==";
		if(base64_decode($entity) == true){
			$text = base64_decode($entity);
			try{
				$text = dCrypt($text);
				if(!is_bool($text)){
					$data = unserialize($text);
					print_r($data);
					return $data;
				}else{
					return false;
				}
			}catch(Exception $e){
				return false;
			}
		}else{
			return false;
		}
}
</pre>
</p>
<br>

<p>
<h2>Código Final</h1>
<pre class="prettyprint">
class Crypto_helper extends Template_controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index(){
		$this->load->helper('crypto');
		
		$var = "framework";
		$data  = array('seguridad'=>'ok');
		$url = base_url()."?".$var."=".base64_encode(mCrypt(serialize($data)));
	
		$view = $this->load->view('documentation_framework_views/crypto_helper',array('url'=>$url),TRUE);
		$content = $this->load->view('documentation_framework_views/base_view',array('title'=>$title,'view'=>$view),TRUE);
		$this->set_menu('sidebar_menu_framework');
		$this->set_content($content);
		$this->build();
	}
	
	function desencriptar(){
		$entity = "S2FZaDZDcXNmZEwxMEk2ZjJ3WXh6dGU1V01vZmZHeERqMTJhQnQ5dlZIaU1Nc3QrV2NJWDFoaUhER0ZVdUk3bQ==";
		if(base64_decode($entity) == true){
			$text = base64_decode($entity);
			try{
				$text = dCrypt($text);
				if(!is_bool($text)){
					$data = unserialize($text);
					print_r($data);
					return $data;
				}else{
					return false;
				}
			}catch(Exception $e){
				return false;
			}
		}else{
			return false;
		}
	}
	
}
</pre>
</p>
