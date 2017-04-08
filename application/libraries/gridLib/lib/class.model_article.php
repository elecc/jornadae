<?php 

class Model_article{
		var $Vftbatglw50m;
        var $Vrfy42o13s35;
        var $Vonr0df11plf;
        var $Vosxxeprqef2;
        var $Vg3vmelh120g;
		function __construct() {
         	$this->initElements();
        }
                       
        public function setId($Vrfy42o13s35){
        	$this->id = " id= '".$Vrfy42o13s35."'";
        }
        
        public function getId(){
        	return $this->id;
        }
        
        public function setName($Vonr0df11plf){
        	$this->name = " name= '".$Vonr0df11plf."'";
        }
        
        public function getName(){
        	return $this->name;
        }
        
        public function setClass($Vosxxeprqef2){
        	$this->class = " class= '".$Vosxxeprqef2."'";
        }
        
        public function getClass(){
        	return $this->class;
        }
       
        public function addElement($Vllne4ankrll){
        	$this->arrayElement[] = $Vllne4ankrll;
        }
        
 		public function buildArticle(){
        	$this->article.= $this->getId(). $this->getClass() . $this->getName() . '>';
        	foreach ($this->arrayElement as $Vllne4ankrll){
        		$this->article.= $Vllne4ankrll;
        	}
        	$this->article.='</article>';
        }

        public function getArticle(){
        	return $this->article;
        }
        
        public function initElements(){
        	$this->article = ' <article ';
        	$this->id = '';
        	$this->name = '';
        	$this->class = '';
        	$this->arrayElement = array();
        }
        
}
?>