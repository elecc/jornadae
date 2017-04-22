<?php 

class Model_table_form{
        var $Vjwxu22tuzdn;
        var $Vrfy42o13s35;
        var $Vr5day4v4f0d;
        var $Ve5giyuqqlqu;
        var $Vny51jw34iop;
		
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
        
        public function setStyle($Vr5day4v4f0d){
        	$this->style = " style = '".$Vr5day4v4f0d."'";
        }
        
        public function getStyle(){
        	return $this->style;
        }

        public function newTh($Vllne4ankrll,$Vosxxeprqef2){
        	$this->ArrayHead[] = "<th class='".$Vosxxeprqef2."' >$Vllne4ankrll</th>";
        }
        
        
        public function openTr(){
        	$this->ArrayBody[] = '<tr>';
        }
        
        public function closeTr(){
        	$this->ArrayBody[] = '</tr>';
        }
        
        public function newTd($Vllne4ankrll,$Vehxmofpc004,$Vhb12bv41wul){
        	$this->ArrayBody[] = '<td style="width:'.$Vehxmofpc004.'" align='.$Vhb12bv41wul.'>'.$Vllne4ankrll.'</td>';
        }
		
		public function setClass($Vosxxeprqef2){
        	$this->class = " class = '".$Vosxxeprqef2."'";
        }
        
        public function getClass(){
        	return $this->class;
        }
		
        public function buildTable(){
        	$this->table.=  $this->getId() . $this->getClass() . $this->getStyle() . '>';
        	
        	foreach ($this->ArrayHead as $Vllne4ankrll){
        		$this->table.= $Vllne4ankrll;
        	}
        	foreach ($this->ArrayBody as $Vllne4ankrll){
        		$this->table.= $Vllne4ankrll;
        	}
        	$this->table.= '</table>';
        }

        public function getTable(){
        	return $this->table;
        }
        
        public function initElements(){
        	$this->table = ' <table ';
        	$this->id = '';
        	$this->style = '';
        	$this->ArrayBody = array();
        	$this->ArrayHead = array();
        }
        
}
?>