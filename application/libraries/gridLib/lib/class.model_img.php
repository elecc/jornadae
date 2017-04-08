<?php 



class Model_img{
		var $Vyf5zmlby1pj;
        var $Vrfy42o13s35;
        var $Vonr0df11plf;
        var $Vosxxeprqef2;
        var $Vp2kzjy5oemu;
        var $Vnz21b0todl1;
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
        
        public function setSrc($Vr54zz2q1epg){
        	$this->src = $Vr54zz2q1epg;
        }
        
        public function getSrc(){
        	return $this->src;
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
        	$this->img.= "'" . $this->getSrc() . "'" . $this->getId(). $this->getClass() . $this->getName(). $this->getOnclick() . '>';
        	foreach ($this->arrayElement as $Vllne4ankrll){
        		$this->a.= $Vllne4ankrll;
        	}
        	$this->img.= '</img>';
        }
        
        public function getA(){
        	return $this->img;
        }
        
        
        
        public function initElements(){
        	$this->img = ' <img src = ';
        	$this->id = '';
        	$this->name = '';
        	$this->class = '';
        	$this->href = '';
        	$this->onclick = '';
        }
        
}
?>