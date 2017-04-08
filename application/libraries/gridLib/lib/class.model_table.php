<?php 

class Model_table{
        var $Vjwxu22tuzdn;
        var $Vrfy42o13s35;
        var $Vr5day4v4f0d;
        var $Ve5giyuqqlqu;
        var $Vny51jw34iop;
		
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

        public function openThead(){
        	$this->ArrayHead[] = ' <thead> ';
        } 
        
        public function newTh($Vllne4ankrll,$Vosxxeprqef2){
        	$this->ArrayHead[] = "<th class='".$Vosxxeprqef2."' >$Vllne4ankrll</th>";
        }
        
        public function closeThead(){
        	$this->ArrayHead[] = '</thead>';
        }
        
        public function openTr(){
        	$this->ArrayBody[] = '<tr>';
        }
        
        public function closeTr(){
        	$this->ArrayBody[] = '</tr>';
        }
        
        public function newTd($Vllne4ankrll){
        	$this->ArrayBody[] = '<td>'.$Vllne4ankrll.'</td>';
        }
		        
        public function buildTable(){
        	$this->table.= $this->getId() . $this->getStyle() . '>';
        	
        	foreach ($this->ArrayHead as $Vllne4ankrll){
        		$this->table.= $Vllne4ankrll;
        	}
        	$this->table.='<tbody>';
        	foreach ($this->ArrayBody as $Vllne4ankrll){
        		$this->table.= $Vllne4ankrll;
        	}
        	$this->table.='</tbody>';
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