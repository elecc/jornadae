<?php 



class Model_ol{
        var $Vaylyppd54zf;
        var $Vrfy42o13s35;
        var $Vosxxeprqef2;
        var $Vonr0df11plf;
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
        
        public function setClass($Vosxxeprqef2){
        	$this->class = " class= '".$Vosxxeprqef2."'";
        }
        
        public function getClass(){
        	return $this->class;
        }
        
        
        public function setName($Vonr0df11plf){
        	$this->name = " name = '".$Vonr0df11plf."'";
        }
        
        public function getName(){
        	return $this->name;
        }
        
        public function openLi($Vosxxeprqef2){
        	$this->arrayElement[] = ' <li class= "'.$Vosxxeprqef2.'">';
        } 
        
        public function addElement($Vllne4ankrll){
        	$this->arrayElement[] = $Vllne4ankrll;
        }
        
        public function closeLi(){
        	$this->arrayElement[] = '</li>';
        }
        
        public function buildOl(){
        	$this->ol.= $this->getId() . $this->getName() . $this->getClass() . '>';
        	
        	foreach ($this->arrayElement as $Vllne4ankrll){
        		$this->ol.= $Vllne4ankrll;
        	}
        	
        	$this->ol.= '</ol>';
        }

        public function getOl(){
        	return $this->ol;
        }
        
        public function initElements(){
        	$this->ol = ' <ol ';
        	$this->id = '';
        	$this->name = '';
        	$this->arrayElement = array();
        }
        
}
?>