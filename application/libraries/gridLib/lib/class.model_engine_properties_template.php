<?php 

class Model_engine_properties_template {

    
    function __construct() {

    }
    
    public function tProperties($Vx21w2sesbf5,PHPExcel $V0td4le3jb3z,$Vio4s4g3jxfs){
    	$this->tDate($Vx21w2sesbf5, $V0td4le3jb3z,$Vio4s4g3jxfs);
    }
    
    private function tDate($Vx21w2sesbf5,PHPExcel $V0td4le3jb3z,$Vio4s4g3jxfs){
    	if(isset($Vio4s4g3jxfs[$Vx21w2sesbf5['GRID_SELECT_TEMPLATE']]['properties'])){
    		if(isset($Vio4s4g3jxfs[$Vx21w2sesbf5['GRID_SELECT_TEMPLATE']]['properties']['date'])){
    			$V0td4le3jb3z->getActiveSheet()->setCellValue($Vio4s4g3jxfs[$Vx21w2sesbf5['GRID_SELECT_TEMPLATE']]['properties']['date'], PHPExcel_Shared_Date::PHPToExcel(time()));
    		}
    	}
    }

    public function tOperation($Vx21w2sesbf5,PHPExcel $V0td4le3jb3z,$Vio4s4g3jxfs,$Vqnevr1zyszc){
    	if(isset($Vio4s4g3jxfs[$Vx21w2sesbf5['GRID_SELECT_TEMPLATE']]['properties'])){
    		if(isset($Vio4s4g3jxfs[$Vx21w2sesbf5['GRID_SELECT_TEMPLATE']]['properties']['operation'])){
    			$Vcj5vnq3ehpc = $Vio4s4g3jxfs[$Vx21w2sesbf5['GRID_SELECT_TEMPLATE']]['properties']['operation'];
    			foreach ($Vcj5vnq3ehpc as $Vn51hx5m0fm2 => $Ve0i3d5ozite){
    				$V0gs35k3kf5b = sprintf($Vn51hx5m0fm2, $Vqnevr1zyszc);
    				$V13zzvzg421j = sprintf($Ve0i3d5ozite, $Vqnevr1zyszc ,$Vqnevr1zyszc);
    				$V0td4le3jb3z->getActiveSheet()->setCellValue($V0gs35k3kf5b,$V13zzvzg421j);
    			}
    		}
    	}
    }
}
?>