<?php 

class Model_input{
		var $V4x0vbcaeswk;
		var $Vllne4ankrll;
		var $Vosxxeprqef2;
		var $Viir2ammnmiv;
        var $Vni1bwmdl2ey;
        var $Vrfy42o13s35;
        var $Vonr0df11plf;
        var $V0fauqtkgt3i;
        var $Vkbl5ko4nmxa;
       	var $Vnz21b0todl1;
       	var $Vt2nj4ihgdlu;
		var $V4bykhourbpp;
		var $Vp2kzjy5oemu;
		var $Voiwap5hflro;
		var $Vrnieuddde4x;
		function __construct() {
        	$this->initElements();
        }
        
        public function setType($V4x0vbcaeswk){
        	$this->type = " type= '".$V4x0vbcaeswk."'";
        }
        
        public function getType(){
        	return $this->type;
        }
        
        public function setValue($Vllne4ankrll){
        	$this->value = " value= '".$Vllne4ankrll."'";
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
		
		 public function setRequired($Vrnieuddde4x){
        	$this->required = " required = '".$Vrnieuddde4x."'";
        	
        }
        
        public function getRequired(){
        	return $this->required;
        	 
        }
        
        public function setMaxlength($Vkbl5ko4nmxaLen){
        	$this->maxlength = " maxlength = ".$Vkbl5ko4nmxaLen."";        	
        	
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
        
        public function setMin($V0fauqtkgt3i){
        	$this->min = " min= '".$V0fauqtkgt3i."'";
        }
        
        public function getMin(){
        	return $this->min;
        }
        
        public function setMax($Vkbl5ko4nmxa){
        	$this->max = " max= '".$Vkbl5ko4nmxa."'";
        }
        
        public function getMax(){
        	return $this->max;
        }
        
        public function getInput(){
        	return $this->input;
        }
        
        public function setDisable(){
        	$this->disable = ' disable ';
        }
        
        public function getDisable(){
        	return $this->disable;
        }
		
		public function setChecked(){
        	$this->checked = 'checked';
        }
        
        public function getChecked(){
        	return $this->checked;
        }
		
		public function setSrc($Vr54zz2q1epg){
        	$this->src ="src= '".$Vr54zz2q1epg."'";
        }
        
        public function getSrc(){
        	return $this->src;
        }
		
		public function setFormaction($Vr54zz2q1epg){
        	$this->formaction="formaction= '$Vr54zz2q1epg'";
        }
        
        public function getFormaction(){
        	return $this->formaction;
        }
        
 		public function buildInput(){
        	$this->input.= $this->getType() . $this->getFormaction() . $this->getSrc() . $this->getValue() . $this->getClass() . $this->getRequired() . $this->getMaxlength() . $this->getId() . $this->getName() . $this->getMin() . $this->getMax() . $this->getOnclick() . $this->getDisable() . $this->getChecked() .'>';
        }
        
        
        public function initElements(){
        	$this->input = ' <input ';
        	$this->value = '';
        	$this->class = '';
        	$this->maxlength = '';
        	$this->id = '';
        	$this->name = '';
        	$this->min = '';
        	$this->max = '';
        	$this->onclick = '';
        	$this->disable = '';
        }
        
}
?>