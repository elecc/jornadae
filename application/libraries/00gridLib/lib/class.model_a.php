<?php 



class Model_a{
		var $Vtdaxmbh0m5p;
        var $Vrfy42o13s35;
        var $Vonr0df11plf;
        var $Vosxxeprqef2;
        var $Vr54zz2q1epg;
        var $Vnz21b0todl1;
        var $Vtdaxmbh0m5prrayElement;
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
        
        public function setHref($Vr54zz2q1epg){
        	$this->href = $Vr54zz2q1epg;
        }
        
        public function getHref(){
        	return $this->href;
        }
        
        public function setOnclick($Vnz21b0todl1){
        	$this->onclick = " onclick= '". $Vnz21b0todl1 ."'";
        }
        
        public function getOnclick(){
        	return $this->onclick;
        }
        
        public function addElement($Vllne4ankrll){
        	$this->arrayElement[] = $Vllne4ankrll;
        }
 		public function buildA(){
        	$this->a.= "'" . $this->getHref() . "'" . $this->getId(). $this->getClass() . $this->getName(). $this->getOnclick() . '>';
        	foreach ($this->arrayElement as $Vllne4ankrll){
        		$this->a.= $Vllne4ankrll;
        	}
        	$this->a.= '</a>';
        }
        
        public function getA(){
        	return $this->a;
        }
        
        
        
        public function initElements(){
        	$this->a = ' <a href = ';
        	$this->id = '';
        	$this->name = '';
        	$this->class = '';
        	$this->href = '';
        	$this->onclick = '';
        }
        
}
?>