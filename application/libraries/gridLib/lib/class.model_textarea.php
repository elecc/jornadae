<?php 

class Model_textarea{
			
		var $V2jkpeejdlvj;
		var $Vtgfkwhxyds5;
		var $Vosxxeprqef2;
		var $Viir2ammnmiv;
        var $Vrfy42o13s35;
        var $Vonr0df11plf;
       	var $Vnz21b0todl1;
  		var $Vllne4ankrll;
		var $Vo4fh4a2bmpn;
		var $Vr5day4v4f0d;
		function __construct() {
        	$this->initElements();
        }
		
		public function setStyle($Vr5day4v4f0d){
        	$this->cols = " style= '".$Vr5day4v4f0d."'";
        }
        
		public function getStyle(){
			return $this->style;
		}
        
        public function setCols($V2jkpeejdlvj){
        	$this->cols = " cols= '".$V2jkpeejdlvj."'";
        }
        
		public function getCols(){
			return $this->cols;
		}
		
		public function setRows($Vtgfkwhxyds5){
        	$this->cols = " rows= '".$Vtgfkwhxyds5."'";
        }
        
		public function getRows(){
			return $this->rows;
		}
		
        public function setValue($Vllne4ankrll){
        	$this->value = $Vllne4ankrll;
        }
        
        public function getValue(){
        	return $this->value;
        }
        
        public function setClass($Vosxxeprqef2){
        	$this->class = " class = '".$Vosxxeprqef2."'";
        	
        }
        
        public function getClass(){
        	return $this->class;
        	 
        }
        
        public function setMaxlength($Vudhx2ldugmg){
        	$this->maxlength = " maxlength = ".$Vudhx2ldugmg."";        	
        	
        }
        
        public function setOnclick($Vnz21b0todl1){
        	$this->onclick = " onclick='" . $Vnz21b0todl1 . "' ";
        }
        
        public function getOnclick(){
        	return $this->onclick;
        }
        
        public function getMaxlength(){
        	return $this->maxlength;
        	 
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
        
      
 		public function buildTextarea(){
 			
			$this->setRows(($this->getMaxlength()/3));
			
        	$this->textarea.= $this->getCols() . $this->getRows() . $this->getClass(). $this->getStyle() . $this->getMaxlength() . $this->getId() . $this->getName() .  $this->getOnclick().'>';
			
			$this->textarea.= $this->getValue();
			
			$this->textarea.= '</textarea>';
			
		}
        
		public function getTextarea(){
			return $this->textarea;
		}
        
        public function initElements(){
        	$this->textarea = ' <textarea ';
			$this->cols = '';
			$this->rows = '';
        	$this->value = '';
        	$this->class = '';
        	$this->maxlength = '';
        	$this->id = '';
        	$this->name = '';
        	$this->onclick = '';
        }
        
}
?>