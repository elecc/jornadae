<?php 



class Model_select{
        var $Veirdybvfhkv;
        var $Vrfy42o13s35;
        var $Vonr0df11plf;
        var $Vllne4ankrll;
        var $Vrrrknwkhend;
       	var $Vosxxeprqef2;
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
        	$this->name = " name = '".$Vonr0df11plf."'";
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
		
        public function openOption($Vllne4ankrll,$Vg02hzmo5kn5,$Veirdybvfhkved){
        	$this->ArrayOption[] = ' <option value= "'.$Vllne4ankrll.'" '.$Veirdybvfhkved.'>'.$Vg02hzmo5kn5.'';
        } 
        
        public function closeOption(){
        	$this->ArrayOption[] = '</option>';
        }
        
        public function buildSelect(){
        	$this->select.= $this->getId() . $this->getName(). $this->getClass() . '>';
        	
        	
        	foreach ($this->ArrayOption as $Vllne4ankrll){    
        		$this->select.= $Vllne4ankrll;
        	}
        	
        	$this->select.= '</select>';
        	 
        	
        }

        public function getSelect(){
        	return $this->select;
        }
        
        public function initElements(){
        	$this->select = ' <select data-placeholder="Selecciona..." tabindex="2" ';
        	$this->id = '';
        	$this->name = '';
        	$this->value = '';
        	$this->ArrayOption = array();
        	
        }
        
}
?>