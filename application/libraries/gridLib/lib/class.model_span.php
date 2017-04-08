<?php 



class Model_span{
        var $Vuz5mbmbk1z3;
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
        
        public function addElement($Vqai1bn0nbku){
        	$this->arrayElement[] = $Vqai1bn0nbku;
        } 
        
        public function buildSpan(){
        	$this->span.= $this->getId() . $this->getName() . $this->getClass() . '>';
        	
        	foreach ($this->arrayElement as $Vllne4ankrll){
        		$this->span.= $Vllne4ankrll;
        	}
        	
        	$this->span.= '</span>';
        }

        public function getSpan(){
        	return $this->span;
        }
        
        public function initElements(){
        	$this->span = ' <span ';
        	$this->id = '';
        	$this->name = '';
        	$this->arrayElement = array();
        }
        
}
?>