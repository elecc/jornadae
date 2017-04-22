<?php 

class Model_engine_properties{

    var $Vgiwgvvh2rby;
    
    function __construct() {
        parent::__construct();
    }
    
    public function properties($Vgiwgvvh2rby){
        $this->PROPERTIES = $Vgiwgvvh2rby;
    }
    
    public function aProperties(&$Vbcaoyslxyol){
    	$Vf314n31yup4 = $Vbcaoyslxyol->owner.'.'.$Vbcaoyslxyol->table_name.'.'.$Vbcaoyslxyol->name;
    	$this->pEditable($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pDisplay($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pHideColumn($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pMaxLength($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pMaxLengthColumn($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pSelectHTML($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pHidden($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pExpresion($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pErrorMessageExpresion($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pFuncion($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pErrorMessageFuncion($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pSValue($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pEValue($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->pSequence($Vbcaoyslxyol, $Vf314n31yup4);
    	$this->isPassword($Vbcaoyslxyol, $Vf314n31yup4);
    }

    private function pEditable(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_EDITABLE])){
    		if(is_bool($this->PROPERTIES[$Vf314n31yup4][GRID_EDITABLE]))
    			$Vbcaoyslxyol->editable = $this->PROPERTIES[$Vf314n31yup4][GRID_EDITABLE];
    		else 
    			$Vbcaoyslxyol->editable = true;
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_EDITABLE])){
    		if(is_bool($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_EDITABLE]))
    			$Vbcaoyslxyol->editable = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_EDITABLE];
    		else
    			$Vbcaoyslxyol->editable = true;
    	}else{
    		$Vbcaoyslxyol->editable = true;
    	}
    }
    
    
    private function pDisplay(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_DISPLAY])){
    		$Vbcaoyslxyol->display_front_end = $this->PROPERTIES[$Vf314n31yup4][GRID_DISPLAY];
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_DISPLAY])){
    		$Vbcaoyslxyol->display_front_end = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_DISPLAY];
    	}else{
    		$Vbcaoyslxyol->display_front_end = $Vbcaoyslxyol->name;
    	}
    }
    
    
    
    private function pHideColumn(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_HIDE_COLUMN])){
    		if(is_bool($this->PROPERTIES[$Vf314n31yup4][GRID_HIDE_COLUMN]))
    			$Vbcaoyslxyol->hide_column = $this->PROPERTIES[$Vf314n31yup4][GRID_HIDE_COLUMN];
    		else 
    			$Vbcaoyslxyol->hide_column = false;
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_HIDE_COLUMN])){
    		if(is_bool($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_HIDE_COLUMN]))
    			$Vbcaoyslxyol->hide_column = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_HIDE_COLUMN];
    		else 
    			$Vbcaoyslxyol->hide_column = false;
    	}else{
    		$Vbcaoyslxyol->hide_column = false;
    	}
    }
    
    private function pMaxLength(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_MAX_LENGTH])){
    		$Vbcaoyslxyol->max_length = $this->PROPERTIES[$Vf314n31yup4][GRID_MAX_LENGTH];
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_MAX_LENGTH])){
    		$Vbcaoyslxyol->max_length = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_MAX_LENGTH];
    	}
    }
    
    private function pMaxLengthColumn(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_MAX_LENGTH])){
    		$Vbcaoyslxyol->max_length_column = $this->PROPERTIES[$Vf314n31yup4][GRID_MAX_LENGTH];
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_MAX_LENGTH])){
    		$Vbcaoyslxyol->max_length_column = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_MAX_LENGTH];
    	}else{
    		$Vbcaoyslxyol->max_length_column = ($Vbcaoyslxyol->max_length*2)+100;
    	}
    }
    
    private function pSelectHTML(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_SELECT])){
    		$Vbcaoyslxyol->is_select = true;
    		$Vbcaoyslxyol->array_select = $this->PROPERTIES[$Vf314n31yup4][GRID_SELECT];
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_SELECT])){
    		$Vbcaoyslxyol->is_select = true;
    		$Vbcaoyslxyol->array_select = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_SELECT];
    	}else{
    		$Vbcaoyslxyol->is_select = false;
    	}
    }
    
    private function pHidden(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_HIDDEN])){
    		if(is_bool($this->PROPERTIES[$Vf314n31yup4][GRID_HIDDEN]))
    			$Vbcaoyslxyol->is_hidden = $this->PROPERTIES[$Vf314n31yup4][GRID_HIDDEN];
    		else 
    			$Vbcaoyslxyol->is_hidden = false;
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_HIDDEN])){
    		if(is_bool($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_HIDDEN]))
    			$Vbcaoyslxyol->is_hidden = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_HIDDEN];
    		else 
    			$Vbcaoyslxyol->is_hidden = false;
    	}else{
    		$Vbcaoyslxyol->is_hidden = false;
    	}
    }
    
    public function pForceAddValueComplementLeft(&$Vkahvy2uj5ku,$Vt4jmd4a4vxq,$Vlkttw2eooz1){
   		 if(isset($this->PROPERTIES[$Vt4jmd4a4vxq][GRID_FORCE_ADD_VALUE_COMPLEMENT_LEFT])){
            $Vkahvy2uj5ku.=$this->PROPERTIES[$Vt4jmd4a4vxq][GRID_FORCE_ADD_VALUE_COMPLEMENT_LEFT];
         }else if(isset($this->PROPERTIES[$Vlkttw2eooz1][GRID_FORCE_ADD_VALUE_COMPLEMENT_LEFT])){
            $Vkahvy2uj5ku.=$this->PROPERTIES[$Vlkttw2eooz1][GRID_FORCE_ADD_VALUE_COMPLEMENT_LEFT];
         }
    }
    
    public function pForceAddValueComplementRight(&$Vkahvy2uj5ku,$Vt4jmd4a4vxq,$Vlkttw2eooz1){
    	if(isset($this->PROPERTIES[$Vt4jmd4a4vxq][GRID_FORCE_ADD_VALUE_COMPLEMENT_RIGHT])){
    		$Vkahvy2uj5ku = $this->PROPERTIES[$Vt4jmd4a4vxq][GRID_FORCE_ADD_VALUE_COMPLEMENT_RIGHT] . $Vkahvy2uj5ku;
    	}else if(isset($this->PROPERTIES[$Vlkttw2eooz1][GRID_FORCE_ADD_VALUE_COMPLEMENT_RIGHT])){
    		$Vkahvy2uj5ku = $this->PROPERTIES[$Vlkttw2eooz1][GRID_FORCE_ADD_VALUE_COMPLEMENT_RIGHT] . $Vkahvy2uj5ku;
    	}
    }
    
    public function pForceAddValue(&$Vkahvy2uj5ku,$Vt4jmd4a4vxq,$Vlkttw2eooz1){
    	if(isset($this->PROPERTIES[$Vt4jmd4a4vxq][GRID_FORCE_ADD_VALUE])){
    		$Vkahvy2uj5ku = $this->PROPERTIES[$Vt4jmd4a4vxq][GRID_FORCE_ADD_VALUE];
    	}else if(isset($this->PROPERTIES[$Vlkttw2eooz1][GRID_FORCE_ADD_VALUE])){
    		$Vkahvy2uj5ku = $this->PROPERTIES[$Vlkttw2eooz1][GRID_FORCE_ADD_VALUE];
    	}
    }
    
    private function pExpresion(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_EXPRESION])){
    		$Vbcaoyslxyol->expresion = $this->PROPERTIES[$Vf314n31yup4][GRID_EXPRESION];
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_EXPRESION])){
    		$Vbcaoyslxyol->expresion = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_EXPRESION];
    	}
    }
    
    private function pErrorMessageExpresion(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_ERROR_MESSAGE_EXPRESION])){
    		$Vbcaoyslxyol->error_message_expresion = $this->PROPERTIES[$Vf314n31yup4][GRID_ERROR_MESSAGE_EXPRESION];
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_ERROR_MESSAGE_EXPRESION])){
    		$Vbcaoyslxyol->error_message_expresion = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_ERROR_MESSAGE_EXPRESION];
    	}
    }
    
    private function pFuncion(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_FUNCION])){
    		$Vbcaoyslxyol->funcion = $this->PROPERTIES[$Vf314n31yup4][GRID_FUNCION];
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_FUNCION])){
    		$Vbcaoyslxyol->funcion = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_FUNCION];
    	}
    }
    
    private function pErrorMessageFuncion(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_ERROR_MESSAGE_FUNCION])){
    		$Vbcaoyslxyol->error_message_funcion = $this->PROPERTIES[$Vf314n31yup4][GRID_ERROR_MESSAGE_FUNCION];
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_ERROR_MESSAGE_FUNCION])){
    		$Vbcaoyslxyol->error_message_funcion = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_ERROR_MESSAGE_FUNCION];
    	}
    }
    
    private function pSValue(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_SVALUE])){
    		$Vbcaoyslxyol->svalue = $this->PROPERTIES[$Vf314n31yup4][GRID_SVALUE];
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_SVALUE])){
    		$Vbcaoyslxyol->svalue = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_SVALUE];
    	}
    }
    	
    private function pEValue(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_EVALUE])){
    		$Vbcaoyslxyol->evalue = $this->PROPERTIES[$Vf314n31yup4][GRID_EVALUE];
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_EVALUE])){
    		$Vbcaoyslxyol->evalue = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_EVALUE];
    	}
    }
    
    private function pSequence(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_SEQUENCE])){
    		$Vbcaoyslxyol->sequence = $this->PROPERTIES[$Vf314n31yup4][GRID_SEQUENCE];
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_SEQUENCE])){
    		$Vbcaoyslxyol->sequence = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_SEQUENCE];
    	}
    }
    
    private function isPassword(&$Vbcaoyslxyol,$Vf314n31yup4){
    	if(isset($this->PROPERTIES[$Vf314n31yup4][GRID_INPUT_TYPE_PASSWORD])){
    		$Vbcaoyslxyol->type_password = $this->PROPERTIES[$Vf314n31yup4][GRID_INPUT_TYPE_PASSWORD];
    	}else if(isset($this->PROPERTIES[$Vbcaoyslxyol->name][GRID_INPUT_TYPE_PASSWORD])){
    		$Vbcaoyslxyol->type_password = $this->PROPERTIES[$Vbcaoyslxyol->name][GRID_INPUT_TYPE_PASSWORD];
    	}
    }
    
}
?>