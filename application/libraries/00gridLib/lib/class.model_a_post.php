<?php 


if (!defined('_GRID_PATH')) define('_GRID_PATH', dirname(preg_replace('/\\\\/','/',__FILE__)) . '/');

require_once _GRID_PATH.'class.model_form.php';
require_once _GRID_PATH.'class.model_a.php';
class Model_a_post {
		var $V0rdrxvj34c4;
        var $Vrfy42o13s35;
        var $Vvrt253ibqmq;
        var $Vydwki0mscq4;
        var $Vg3vmelh120g;
        var $Vit4m4o5svc4;
        var $Vnz21b0todl1;
		function __construct() {
         	$this->initElements();
        }

        public function setId($Vrfy42o13s35){
        	$this->id = " id= '".$Vrfy42o13s35."'";
        }
        
        public function getId(){
        	return $this->id;
        }
        
        public function setAction($Vvrt253ibqmq){
        	$this->action = $Vvrt253ibqmq;
        }
        
        public function getAction(){
        	return $this->action;
        }
        
        public function setMethod($Vydwki0mscq4){
        	$this->method = $Vydwki0mscq4;
        }
        
        public function getMethod(){
        	return $this->method;
        }
        
		 public function addElement($Vllne4ankrll){
        	$this->arrayElement[] = $Vllne4ankrll;
        }
        
        public function addInput($Vllne4ankrll){
        	$this->arrayInput[] = $Vllne4ankrll;
        }
        
        public function setOnclick($Vnz21b0todl1){
        	$this->onclick = $Vnz21b0todl1;
        }
        
        public function buildA_post(){
        	$Vtowlqx55h4o = new Model_form();
        	$Vtowlqx55h4o->setAction($this->getAction());
        	$Vtowlqx55h4o->setMethod($this->getMethod());
        	$Vvlicjdvilsu = new Model_a();
        	$Vvlicjdvilsu->setHref('javascript:;');
        	$Vvlicjdvilsu->setOnclick($this->onclick);
        	foreach ($this->arrayElement as $Vllne4ankrll){
        		$Vvlicjdvilsu->addElement($Vllne4ankrll);
        	}
        	$Vvlicjdvilsu->buildA();
        	$Vtowlqx55h4o->addElement($Vvlicjdvilsu->getA());
        	foreach ($this->arrayInput as $Vllne4ankrll){
        		$Vtowlqx55h4o->addElement($Vllne4ankrll);
        	}
        	$Vtowlqx55h4o->buildForm();
        	$this->a_post = $Vtowlqx55h4o->getForm();
        }
        
        public function getA_post(){
        	return $this->a_post;
        }
        
        public function getLabel(){
        	return $this->label;
        }
        
        public function initElements(){
        	$this->a_post = '';
        	$this->id = '';
        	$this->name = '';
        	$this->action = '';
        	$this->method = '';
        	$this->arrayElement = array();
        	$this->arrayInput = array();
        }
        
}
?>