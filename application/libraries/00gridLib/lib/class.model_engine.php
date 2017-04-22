<?php 



 
if (!defined('_GRID_PATH')) define('_GRID_PATH', dirname(preg_replace('/\\\\/','/',__FILE__)) . '/');

require_once _GRID_PATH.'class.model_engine_sql.php';
require_once _GRID_PATH.'class.model_table.php';
require_once _GRID_PATH.'class.model_a_post.php';
require_once _GRID_PATH.'class.model_input.php';
require_once _GRID_PATH.'class.model_div.php';
require_once _GRID_PATH.'class.model_label.php';
require_once _GRID_PATH.'class.model_fieldset.php';
require_once _GRID_PATH.'class.model_form.php';
require_once _GRID_PATH.'class.model_select.php';
require_once _GRID_PATH.'class.model_article.php';
require_once _GRID_PATH.'class.model_textarea.php';
require_once _GRID_PATH.'class.model_table_form.php';        
require_once _GRID_PATH.'class.model_engine_properties_template.php';  
require_once _GRID_PATH.'class.model_password_hash.php';  
require_once _GRID_PATH.'phpoffice/PHPExcel/Classes/PHPExcel.php';
require_once _GRID_PATH.'phpoffice/PHPExcel/Classes/PHPExcel/Autoloader.php';
require_once _GRID_PATH.'phpoffice/PHPWord/src/PhpWord/Autoloader.php';
require_once _GRID_PATH.'mpdf/mpdf.php';
require_once _GRID_PATH.'grid_export.php';

class Model_engine  extends Model_engine_sql{
    
	var $ARRAYCOLUMNS; /*Data of columns*/
    var $HEIGHT = 400; /*Define height Grid*/
    var $ID = 'table'; /*Id table*/
    var $ICON_TABLE_COLUMN = false;
    var $NAME_FORM = 'GridForm';
    var $NAME_GRID_SESSION = '';
    var $PATH; /*path grid*/
    var $SHOW_BACK_BUTTON = false; /*Show back button*/
    var $SHOW_EXPORT = true; /*Show Export Button*/
    var $SHOW_TOGGLEBTN = false;
    var $SHOW_NEW = true; /*Show Button New*/
    var $SHOW_EDIT = true; /*Show edit link*/
    var $SHOW_TEMPLATE = false; /*Show edit link*/
    var $SHOW_POPUP_CONTENT = false; /*Show POPUP CONTENT FUNCTION*/
    var $SHOW_POPUP_CONTENT_URL = '';/*URL Function*/
    var $SHOW_POPUP_CONTENT_TEXT = '';/*Text Colum*/
    var $SHOW_DELETE = true /*Show delete link*/;
    var $SHOW_CONTENT = false; /*Show Content of view*/
    var $SHOW_CONTENT_URL = ''; /*URL show Content*/
    var $SHOW_CONTENT_TEXT = '';
    var $SERVERRUTE = 'serverProcessing'; /*server json data*/
    var $TITLE = 'Resultado';/*table title*/
    var $TEMPLATES = array(); /*Templates*/
    var $URL_REDIRECT_FORM = 'save';
    var $VARS_GENERATE_PAGINATION_GRID = array(); /*Vars To Back Page*/
	var $CONFIG_DB = array();
	
	function __construct() {
       
    }
	
	function initFuntions(){
        $this->prepareStack();
    }
	
	public function sConfig_DB($Vcekyiohn0i4){
		$this->CONFIG_DB = $Vcekyiohn0i4;
	}
	
    public function sPATH($Vgm0d5xxtxtk){
        $this->PATH = $Vgm0d5xxtxtk;
    }
	
	public function sIdTable($Vrfy42o13s35){
        $this->ID = $Vrfy42o13s35;
    }
	
	public function sSERVERRUTE($Vrorzdpfwj22 = 'serverProcessing'){
        $this->SERVERRUTE = $Vrorzdpfwj22;
    }

	 public function sTitle($Vag41yifh232 = 'Resultado'){
        $this->TITLE = $Vag41yifh232;
    }
    
    public function showEXPORT($Vdhgdqxtanea=true){
        $this->SHOW_EXPORT = $Vdhgdqxtanea;
    }
    
    public function sRedirectForm($Votxvnf0psaq){
        $this->URL_REDIRECT_FORM = $Votxvnf0psaq;
    }
    
    public function gRedirectForm(){
        return $this->URL_REDIRECT_FORM;
    }
    
    public function setNameForm($Vavxdqhxwwon){
        $this->NAME_FORM = $Vavxdqhxwwon;
    }

    public function getNameForm(){
        return $this->NAME_FORM;
    }
    
    public function setHeight($Vllne4ankrll = 400){
        $this->HEIGHT = $Vllne4ankrll;
    }
    
    public function getHeight(){
        return $this->HEIGHT;
    }
    
    public function sTemplates($Vio4s4g3jxfs = array()){
    	$this->TEMPLATES = $Vio4s4g3jxfs;
    	$this->SHOW_TEMPLATE = true;
    }
    
    public function sIcons($Vehbzueedyoz=true){
    	$this->ICON_TABLE_COLUMN = $Vehbzueedyoz;
    }
    
    public function getFormButtonSubmit($Vonr0df11plf){
    	return '<div class="form-group"> <input type="submit" class="validador btn btn-primary" name="Submit'.$Vonr0df11plf.'" rel="'.$Vonr0df11plf.'" value="Guardar"></div>';
    }
    
    public function setShowBackButton($V4mu44euhnx0= false){
    	$this->SHOW_BACK_BUTTON = $V4mu44euhnx0;
    	$this->VARS_GENERATE_PAGINATION_GRID = $_POST;
    }
    
    public function getShowBackButton(){
        return $this->SHOW_BACK_BUTTON;
    }
    
    public function setNameGridSession($Vonr0df11plfGridSession){
        $this->NAME_GRID_SESSION = $Vonr0df11plfGridSession;
    }
    
    public function showNEW($Va2kfkkfc15i = true){
    	$this->SHOW_NEW = $Va2kfkkfc15i;
    }
    
    public function showDELETE($Va2kfkkfc15i = true){
    	$this->SHOW_DELETE = $Va2kfkkfc15i;
    }
    
    public function showEDIT($Va2kfkkfc15i = true){
    	$this->SHOW_EDIT = $Va2kfkkfc15i;
    }
    
    public function sToggleBTN($Vp1e4qmnm4qw = true){
    	$this->SHOW_TOGGLEBTN = $Vp1e4qmnm4qw;
    }
    
    public function showCONTENT($Va2kfkkfc15i = true,$V30sjpyaynkq,$Vvbza1f45id3 = 'Ver'){
    	$this->SHOW_CONTENT = $Va2kfkkfc15i;
    	$this->SHOW_CONTENT_URL = $V30sjpyaynkq;
    	$this->SHOW_CONTENT_TEXT = $Vvbza1f45id3;
    }
    
    public function showPOPUPCONTENT($Va2kfkkfc15i = true,$V30sjpyaynkq,$Vsaffr1ttoai = 'Ver'){
    	$this->SHOW_POPUP_CONTENT = $Va2kfkkfc15i;
    	$this->SHOW_POPUP_CONTENT_URL= $V30sjpyaynkq;
    	$this->SHOW_POPUP_CONTENT_TEXT = $Vsaffr1ttoai;
    }
    
    
    
    public function prepareStack(){
         
        $V11hecrlk0uj = basename ( "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" );
         
        $V1ht3tqs001f =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
         
        $_POST['URL'] = $V1ht3tqs001f;
            
        if(isset($_SERVER['HTTP_REFERER']))
            $_POST['CALL_FROM'] = basename ($_SERVER['HTTP_REFERER']);
         
        if(isset($_POST['name_grid_session'])){
    
            if(!isset($_SESSION['grid_session']['flow_start'])){
                $_SESSION['grid_session']['flow_start'] = true;
            }
    
        }else{
    
            if(isset($_SESSION['grid_session']['flow_start'])){
                unset($_SESSION['grid_session']['flow_start']);
            }
    
            if(isset($_SESSION['grid_session']['flow'])){
                unset($_SESSION['grid_session']['flow']);
            }
    
        }
    
        if(!isset($_SESSION['grid_session']['flow'][$V11hecrlk0uj]))
            $_SESSION['grid_session']['flow'][$V11hecrlk0uj] = $_POST;
         
    }
	

	
    public function publishGridInSession($Vonr0df11plf){
        
        $Vnksz0zp5ire = $_SESSION;
         
        if(isset($Vnksz0zp5ire['grid_session'])){
    
            $Vibotl1q5g0p = $Vnksz0zp5ire['grid_session'];
    
            $Ven1pfwkl4au = count($Vibotl1q5g0p);
    
            $Vonr0df11plfGridSession = 'GridSession'.$Vonr0df11plf;
    
            $Vibotl1q5g0p[$Vonr0df11plfGridSession] = $this->mCrypt(serialize($this));
    
            $_SESSION['grid_session'] = $Vibotl1q5g0p;
    
        }else{
    
            $Vibotl1q5g0p = array();
    
            $Vonr0df11plfGridSession = 'GridSession'.$Vonr0df11plf;
    
            $Vibotl1q5g0p[$Vonr0df11plfGridSession] = $this->mCrypt(serialize($this));
    
            $_SESSION['grid_session'] = $Vibotl1q5g0p;
    
        }
        $this->setNameGridSession($Vonr0df11plfGridSession);
         
    }
    
    
    
    private function cKey(){
        $Vol03ql3u0fr = new Model_password_hash();
        $Vt4jmd4a4vxq = $Vol03ql3u0fr->create_hash('i82dtmg41');
        echo $Vt4jmd4a4vxq;
        
    }
    
    
    
    private function mCrypt($V4nwlbj2j51v = 'ejemplo'){
         
        $Vt4jmd4a4vxq = 'KHNdBGCelC4ONfL2JhH1MkTYttF0Y3Ry';
         
        $Vnodjsxar53u = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $Vq1tdjfm2aoq = mcrypt_create_iv($Vnodjsxar53u, MCRYPT_RAND);
         
        $Vrj2a0d5eyhj = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $Vt4jmd4a4vxq,$V4nwlbj2j51v, MCRYPT_MODE_CBC, $Vq1tdjfm2aoq);
         
        $Vrj2a0d5eyhj = $Vq1tdjfm2aoq . $Vrj2a0d5eyhj;
         
        $Vrj2a0d5eyhj_base64 = base64_encode($Vrj2a0d5eyhj);
         
        return $Vrj2a0d5eyhj_base64;
         
    }
    
    
    
    private function dCrypt($Vrj2a0d5eyhj_base64){
         
        $Vt4jmd4a4vxq = 'KHNdBGCelC4ONfL2JhH1MkTYttF0Y3Ry';
         
        $Vnodjsxar53u = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
         
        $Vrj2a0d5eyhj_dec = base64_decode($Vrj2a0d5eyhj_base64);
         
        $Vq1tdjfm2aoq_dec = substr($Vrj2a0d5eyhj_dec, 0, $Vnodjsxar53u);
         
        $Vrj2a0d5eyhj_dec = substr($Vrj2a0d5eyhj_dec, $Vnodjsxar53u);
         
        $V4nwlbj2j51v_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $Vt4jmd4a4vxq,$Vrj2a0d5eyhj_dec, MCRYPT_MODE_CBC, $Vq1tdjfm2aoq_dec);
         
        return $V4nwlbj2j51v_dec;
    }
    
    
    public function buildFlex($Vonr0df11plf){
        $V2rrc5hpjbxs = array('colModel' => array());
            
        $this->where('ROWNUM<=1');
            
        if(!$this->ERRORSQL){
            $this->select();
            
            $Vyd4lo23gpo4 = $this->gResult();
		
            if(!empty($Vyd4lo23gpo4)){
                
                $this->setColumns($Vyd4lo23gpo4);
                
                if($this->SHOW_POPUP_CONTENT)
                    $V2rrc5hpjbxs['colModel'][] = array('display' => $this->SHOW_POPUP_CONTENT_TEXT ,'name'=> 'ver','width'=>100,'sortable'=>false,'align'=>'left');
                if($this->SHOW_CONTENT)
                    $V2rrc5hpjbxs['colModel'][] = array('display' => $this->SHOW_CONTENT_TEXT ,'name'=> 'ver','width'=>100,'sortable'=>false,'align'=>'left');
                if($this->SHOW_DELETE)
                    $V2rrc5hpjbxs['colModel'][] = array('display' => 'Eliminar','name'=> 'delete','width'=>50,'sortable'=>false,'align'=>'left');
                if($this->SHOW_EDIT)
                    $V2rrc5hpjbxs['colModel'][] = array('display' => 'Editar','name'=> 'edit','width'=>50,'sortable'=>false,'align'=>'left');
                
                foreach ($this->ARRAYCOLUMNS as $Vt4jmd4a4vxq => $Vllne4ankrll){
                    
                    $Vpjwxlb04cdg = false;
                        
                    $Vpjwxlb04cdg = $Vllne4ankrll->hide_column;
                    
                    $Vrt5mkri0uhe = $Vllne4ankrll->max_length_column;
                   
                    $Vg02hzmo5kn5 = $Vllne4ankrll->display_front_end;
                    
                    $Voswlmsty4i0 = $Vllne4ankrll->alias;
                    
                    $V2rrc5hpjbxs['colModel'][] = array('display' => $Vg02hzmo5kn5,'name'=>$Voswlmsty4i0 ,'width'=>$Vrt5mkri0uhe,'sortable'=>true,'align'=>'left','hide'=>$Vpjwxlb04cdg);
                    
                    if(!$Vpjwxlb04cdg)
                        $V2rrc5hpjbxs['searchitems'][] = array('display' => $Vg02hzmo5kn5,'name'=> $Vt4jmd4a4vxq);
                    
                }
                
                $Vtc0feyan4m4 = 'doCommand';
                
                if(!$this->SHOW_TOGGLEBTN)
                    $V3x3ibqxuh3j = 'showToggleBtn: false,';
                else
                    $V3x3ibqxuh3j = '';
                    
                $V2rrc5hpjbxs['buttons'][] = array('name'=>'Nuevo','bclass'=>'add','onpress'=>$Vtc0feyan4m4);
                
                $V30sjpyaynkq = base_url($this->PATH.'/'.$this->SERVERRUTE);
                $Vclfcatlf4dx = '$("#'.$Vonr0df11plf.'").flexigrid({'.$V3x3ibqxuh3j.'url:"'.$V30sjpyaynkq.'",dataType:"json",grid_name:"'.$Vonr0df11plf.'",';
                $Vclfcatlf4dx.= 'colModel:'.json_encode($V2rrc5hpjbxs['colModel']);
                
                if(isset($V2rrc5hpjbxs['searchitems']))
                    $Vclfcatlf4dx.= ',searchitems:'.json_encode($V2rrc5hpjbxs['searchitems']);
                
                $Vclfcatlf4dx.= $this->gButtonsFlex();
                    
                $Vclfcatlf4dx.= ',showTableToggleBtn: true,title: "'.$this->TITLE.'",useRp: true,rp: 20,resizable: true,singleSelect: true,usepager: true,height:'.$this->getHeight().',usepager: true});';
                    
                $Vtowlqx55h4o = 'var form = $(\'<form action = "'.base_url($this->PATH."/engine?security=".base64_encode($this->mCrypt('create'))).'" id="'.'create'.$this->ID.'" method="post"><input type="hidden" name="name_grid_session" id="name_grid_session" value="'.$this->ID.'"/></form>\'); $(\'body\').append(form); target_popup'.$this->ID.'(document.forms["create'.$this->ID.'"]);  $( "#create'.$this->ID.'" ).remove(); ';
                    
                $Vtowlqx55h4oExport = 'var formExport = $(\'<form action = "'.base_url($this->PATH."/engine?security=".base64_encode($this->mCrypt('export'))).'" id="'.'export'.$this->ID.'" method="post"><input type="hidden" name="name_grid_session" id="name_grid_session" value="'.$this->ID.'"/></form>\'); $(\'body\').append(formExport); target_popupExport'.$this->ID.'(document.forms["export'.$this->ID.'"]);  $( "#export'.$this->ID.'" ).remove(); ';
                
                $Vtowlqx55h4oTemplate = 'var formTemplate = $(\'<form action = "'.base_url($this->PATH."/engine?security=".base64_encode($this->mCrypt('template'))).'" id="'.'template'.$this->ID.'" method="post"><input type="hidden" name="name_grid_session" id="name_grid_session" value="'.$this->ID.'"/></form>\'); $(\'body\').append(formTemplate); target_popupTemplate'.$this->ID.'(document.forms["template'.$this->ID.'"]);  $( "#template'.$this->ID.'" ).remove(); ';
                    
                $Vhm5wdy2nkxu = 'function doCommand(com,grid){'.$Vtowlqx55h4o.'}';
                    
                $Vhm5wdy2nkxuExport = 'function doCommandExport(com,grid){'.$Vtowlqx55h4oExport.'}';
                
                $Vhm5wdy2nkxuTemplate = 'function doCommandTemplate(com,grid){'.$Vtowlqx55h4oTemplate.'}';
                    
                return $Vclfcatlf4dx.$Vhm5wdy2nkxu.$Vhm5wdy2nkxuExport.$Vhm5wdy2nkxuTemplate;
            
            }else{
                $this->ERROR_CODE[] = sprintf(GRIDA000000003);
            }
            
        }else{
            $this->ERROR_CODE[] = sprintf(GRIDA000000003);
        }
            
    }
    
    public function gButtonsFlex(){
        $Vx3dv5mhcyvc = ',buttons:[';
        if($this->SHOW_NEW){
            $Vx3dv5mhcyvc.='{name:"Nuevo",bclass:"add",onpress:doCommand},';
        }
           
        if($this->SHOW_EXPORT){
            $Vx3dv5mhcyvc.='{name:"Exportar",bclass:"excel",onpress:doCommandExport},';
        }
        
        if($this->SHOW_TEMPLATE){
        	$Vx3dv5mhcyvc.='{name:"Template",bclass:"template",onpress:doCommandTemplate,id:"'.GRID.$this->ID.'_btn_template"},';
        }
		
		if(!$this->SHOW_NEW && !$this->SHOW_EXPORT && !$this->SHOW_TEMPLATE)
		$Vx3dv5mhcyvc.='[';     
        
        $Vx3dv5mhcyvc = substr($Vx3dv5mhcyvc, 0, -1);
        
        $Vx3dv5mhcyvc.=']';
        return $Vx3dv5mhcyvc;
    }
    
    
    
    public function setColumns($Vk4ca3jigxxy){

        

        $this->setArrayColumns($Vk4ca3jigxxy['general']['COLUMNS']);
        
        
        
        $this->setColumnsComplement();
    }
    
    
    
    private function setArrayColumns($V5f0henpkhfw){
        foreach ($V5f0henpkhfw as $Vt4jmd4a4vxq => $Vkahvy2uj5ku){
            if(!$Vkahvy2uj5ku->catalog){
            	if($Vkahvy2uj5ku->editable){
               	   $this->ARRAYCOLUMNS[$Vt4jmd4a4vxq] = $Vkahvy2uj5ku;
            	}
            }
        }
    }
    
    public function setColumnsComplement(){
        if(isset($this->COLUMNS_NAME_COMPLEMENT))
	        foreach ($this->COLUMNS_NAME_COMPLEMENT as $Vt4jmd4a4vxq => $Vllne4ankrllC){
        	   $Vllne4ankrllC->only_info = true;
	           $this->ARRAYCOLUMNS[$Vt4jmd4a4vxq] = $Vllne4ankrllC;
            }       
    }
    
    
    
    private function gNTableNoValidations($Vl1z5wepwkiu){
        $Vflx50kn4c0y = $this->field_data($Vl1z5wepwkiu);
        return $Vflx50kn4c0y;
    }
    
    
     
    public function buildTable($Vonr0df11plf){
        $this->publishGridInSession($Vonr0df11plf);
        $Vxphny5lklwi = new Model_table();
        $Vxphny5lklwi->setId($Vonr0df11plf);
        $Vxphny5lklwi->buildTable();
        $Vmicjkamk4ir = $Vxphny5lklwi->getTable();
        return $Vmicjkamk4ir;
    }
    

    
    
    public function serverProcessing($Vpg4mi2sesf5){
    
    	$Vpg4mi2sesf5['iDisplayStart'] = (( $Vpg4mi2sesf5['page'] - 1 ) * $Vpg4mi2sesf5['rp']);
        $Vpg4mi2sesf5['iDisplayLength'] = $Vpg4mi2sesf5['page'] * $Vpg4mi2sesf5['rp'];
    
        if ( isset( $Vpg4mi2sesf5['iDisplayStart'] ) && $Vpg4mi2sesf5['iDisplayLength'] != '-1' ){
            $this->rowNum(($Vpg4mi2sesf5['iDisplayStart']+1),($Vpg4mi2sesf5['iDisplayLength']));
        }
    
        $Vjp5wagudo4u = "";
            
        if ( isset( $Vpg4mi2sesf5['sortname'] ) && strlen(trim($Vpg4mi2sesf5['sortname']))>0  && trim($Vpg4mi2sesf5['sortname'])!='undefined'){
            $Vjp5wagudo4u = "ORDER BY  ";
            $Vjp5wagudo4u .= $Vpg4mi2sesf5['sortname'];
    
            if(isset($Vpg4mi2sesf5['sortorder']) && strlen(trim($Vpg4mi2sesf5['sortorder']))>0 && trim($Vpg4mi2sesf5['sortorder'])!='undefined'){
                $Vjp5wagudo4u.= " " .$Vpg4mi2sesf5['sortorder'];
            }
    
            if ( $Vjp5wagudo4u == "ORDER BY  " )
            {
                $Vjp5wagudo4u = "";
            }
    
        }
            
        $Vnrp4bokkm35 = array();
            
        if(isset($Vpg4mi2sesf5['qtype']) && is_array($Vpg4mi2sesf5['qtype'])){
            if(isset( $Vpg4mi2sesf5['qtype']) && count($Vpg4mi2sesf5['qtype'])>0){
                if(isset( $Vpg4mi2sesf5['query']) && count($Vpg4mi2sesf5['query'])>0){
    
                    for($Vi0oyq1lze1p = 0;$Vi0oyq1lze1p<count($Vpg4mi2sesf5['query']);$Vi0oyq1lze1p++){
                        if(is_array($Vpg4mi2sesf5['qtype'][$Vi0oyq1lze1p])){
                            $Vpg4mi2sesf5['qtype'][$Vi0oyq1lze1p]['values'] = $Vpg4mi2sesf5['query'][$Vi0oyq1lze1p];
                            $Vnrp4bokkm35['qtype_logical_expresion'][] = $Vpg4mi2sesf5['qtype'][$Vi0oyq1lze1p];
                            unset($Vpg4mi2sesf5['qtype'][$Vi0oyq1lze1p]);
                        }else{
                            $Vab51iahjrvu = $Vpg4mi2sesf5['qtype'][$Vi0oyq1lze1p];
                            $Vpoae2jcihwa = $Vpg4mi2sesf5['query'][$Vi0oyq1lze1p];
                            $Vnrp4bokkm35[$Vab51iahjrvu] = $Vpoae2jcihwa;
                        }
                    }
                }
            }
        }else{
            if(isset( $Vpg4mi2sesf5['qtype']) && strlen(trim($Vpg4mi2sesf5['qtype']))>0){
                if(isset( $Vpg4mi2sesf5['query']) && strlen(trim($Vpg4mi2sesf5['query']))>0){
                    $Vnrp4bokkm35[$Vpg4mi2sesf5['qtype']] = $Vpg4mi2sesf5['query'];
                }
            }
        }
    
        $this->order($Vjp5wagudo4u);
        
		//echo $Vnrp4bokkm35; 
		    
        $this->select($Vnrp4bokkm35);
		
		    
        $Vyd4lo23gpo4 = $this->gResult();
    
        
    
       
        
        $Vpoae2jcihwa = $Vyd4lo23gpo4['general']['select'];
      
        $_SESSION[$this->ID.'GRID_QUERY'] = $Vpoae2jcihwa;
            
        $_SESSION[$this->ID.'GRID_QUERY_BEFORE_LIMIT'] = $Vyd4lo23gpo4['general']['select_before_limit'];
            
        $Vi0oyq1lze1pData = $this->DB->query($Vpoae2jcihwa);
            
			
		if(!is_array($Vi0oyq1lze1pData)){
				 $Vi0oyq1lze1pData = array();
		}
			
		$Vi0oyq1lze1pFilteredTotal = count($Vi0oyq1lze1pData);
    
        
        
        $Vpoae2jcihwa = $Vyd4lo23gpo4['general']['count'];
    
            
        $V4wv2msaalsw = $this->DB->query($Vpoae2jcihwa);
        
		if(is_array($V4wv2msaalsw)){
			$V4wv2msaalsw = $V4wv2msaalsw[0]['COUNT'];
            $Vi0oyq1lze1pTotal = $V4wv2msaalsw;
		}else{
			$V4wv2msaalsw = 0;
            $Vi0oyq1lze1pTotal = $V4wv2msaalsw;
		}
			
        
    
        $Vyrf3lp3ic15 = array(
                "total" => $Vi0oyq1lze1pTotal,
                "page"=>$Vpg4mi2sesf5['page'],
                "rows" => array()
        );
            
        $Vyrf3lp3ic15 = $this->buildRow($Vi0oyq1lze1pData, $Vyrf3lp3ic15);
            
        return $Vyrf3lp3ic15;
    }
    
    
    
    
    
    public function buildRow($Vi0oyq1lze1pData,$Vyrf3lp3ic15){
        if(!empty($Vi0oyq1lze1pData))
        foreach ($Vi0oyq1lze1pData as $Vi0oyq1lze1pValue){
            $Vqnevr1zyszc = array();
            if($this->SHOW_EDIT)
                array_unshift($Vi0oyq1lze1pValue,$this->buildLink($Vi0oyq1lze1pValue,'edit'));
            if($this->SHOW_DELETE)
                array_unshift($Vi0oyq1lze1pValue,$this->buildLink($Vi0oyq1lze1pValue,'delete'));
            if($this->SHOW_CONTENT)
                array_unshift($Vi0oyq1lze1pValue,$this->buildLink($Vi0oyq1lze1pValue,'content'));
            if($this->SHOW_POPUP_CONTENT)
                array_unshift($Vi0oyq1lze1pValue,$this->buildLink($Vi0oyq1lze1pValue,'popup_content'));
    
            foreach ($Vi0oyq1lze1pValue as $Vt4jmd4a4vxq => $Vkahvy2uj5ku){
                    
                
                
                $Ve54ae0gczsk = explode('.', $Vt4jmd4a4vxq);
                $Vlkttw2eooz1 = array_pop($Ve54ae0gczsk);
                
                
                
                
                    
                $Vqnevr1zyszc[] = $Vkahvy2uj5ku;
            }
    
            $Vyrf3lp3ic15['rows'][] = array('cell'=>$Vqnevr1zyszc);
        }
        else{
            $Vyrf3lp3ic15['rows'][] = array();
        }
            
        return $Vyrf3lp3ic15;
    }
    
    
    
    public function buildLink($Vi0oyq1lze1pValue,$Vvrt253ibqmq){
        unset($Vi0oyq1lze1pValue['RNUM']);
    
        
    
        if($Vvrt253ibqmq == 'edit')
            $V30sjpyaynkq =  base_url() . $this->PATH . "/engine?security=".base64_encode($this->mCrypt('edit')) ;
        else if($Vvrt253ibqmq == 'delete')
            $V30sjpyaynkq =  base_url() . $this->PATH . "/engine?security=".base64_encode($this->mCrypt('delete'));
        else if($Vvrt253ibqmq == 'content')
            $V30sjpyaynkq =  base_url() . $this->SHOW_CONTENT_URL;
        else if($Vvrt253ibqmq == 'popup_content')
            $V30sjpyaynkq =  base_url() . $this->SHOW_POPUP_CONTENT_URL;
    
        $V0rdrxvj34c4 = new Model_a_post();
        $V0rdrxvj34c4->setAction($V30sjpyaynkq);
        $V0rdrxvj34c4->setMethod('post');
    
        if($Vvrt253ibqmq == 'edit'){
            $V0rdrxvj34c4->addElement($this->gElementImgText($Vvrt253ibqmq));
            $V0rdrxvj34c4->setOnclick('target_popup'.$this->ID.'(parentNode)');
        } else if($Vvrt253ibqmq == 'delete'){
            $V0rdrxvj34c4->addElement($this->gElementImgText($Vvrt253ibqmq));
            $V0rdrxvj34c4->setOnclick('target_popupDelete'.$this->ID.'(parentNode);');
        }else if($Vvrt253ibqmq == 'content'){
            $V0rdrxvj34c4->addElement($this->SHOW_CONTENT_TEXT);
            $V0rdrxvj34c4->setOnclick('show_content'.$this->ID.'(parentNode)');
        }else if($Vvrt253ibqmq == 'popup_content'){
            $V0rdrxvj34c4->addElement($this->SHOW_POPUP_CONTENT_TEXT);
            $V0rdrxvj34c4->setOnclick('target_popupPOPUPCONTENT'.$this->ID.'(parentNode)');
        }
        
        

        if(isset($this->TABLE_NAME['general']['FOREIGN_KEY']) || isset($this->TABLE_NAME['general']['PRIMARY_KEY'])){
            if(isset($this->TABLE_NAME['general']['FOREIGN_KEY'])){
                foreach ($this->TABLE_NAME['general']['FOREIGN_KEY'] as $Vt4jmd4a4vxq => $Vllne4ankrll){
                    $Vt4jmd4a4vxq = $this->gNameColumn($Vt4jmd4a4vxq);
                    if(isset($Vi0oyq1lze1pValue[$Vt4jmd4a4vxq])){
                        $Vi0oyq1lze1pnput = new Model_input();
                        $Vi0oyq1lze1pnput->setType('hidden');
                        $Vi0oyq1lze1pnput->setName($Vt4jmd4a4vxq);
                        $Vi0oyq1lze1pnput->setValue($Vi0oyq1lze1pValue[$Vt4jmd4a4vxq]);
                        $Vi0oyq1lze1pnput->buildInput();
                        $V0rdrxvj34c4->addInput($Vi0oyq1lze1pnput->getInput());
                    }
                    
                }
            }
            
            if(isset($this->TABLE_NAME['general']['PRIMARY_KEY'])){
                foreach ($this->TABLE_NAME['general']['PRIMARY_KEY'] as $Vt4jmd4a4vxq => $Vllne4ankrll){
                    $Vt4jmd4a4vxq = $this->gNameColumn($Vt4jmd4a4vxq);
                    if(isset($Vi0oyq1lze1pValue[$Vt4jmd4a4vxq])){
                        $Vi0oyq1lze1pnput = new Model_input();
                        $Vi0oyq1lze1pnput->setType('hidden');
                        $Vi0oyq1lze1pnput->setName($Vt4jmd4a4vxq);
                        $Vi0oyq1lze1pnput->setValue($Vi0oyq1lze1pValue[$Vt4jmd4a4vxq]);
                        $Vi0oyq1lze1pnput->buildInput();
                        $V0rdrxvj34c4->addInput($Vi0oyq1lze1pnput->getInput());
                    }
                    
                }
            }
        }
        
        
    
        $Vi0oyq1lze1pnput = new Model_input();
        $Vi0oyq1lze1pnput->setType('hidden');
        $Vi0oyq1lze1pnput->setName('name_grid_session');
        $Vi0oyq1lze1pnput->setValue($this->ID);
        $Vi0oyq1lze1pnput->buildInput();
        $V0rdrxvj34c4->addInput($Vi0oyq1lze1pnput->getInput());
    
        $V0rdrxvj34c4->buildA_post();
        return $V0rdrxvj34c4->getA_post();
    }
    
    
    
    private function gElementImgText($Vvrt253ibqmq){
    	if($this->ICON_TABLE_COLUMN){
    		if($Vvrt253ibqmq == 'delete')
    			return '<center><img src="'.base_url('css/grid/images/g_rec.gif').'"></img></center>';
    		else if($Vvrt253ibqmq == 'edit'){
    			return '<center><img src="'.base_url('css/grid/images/gtk_edit.png').'"></img></center>';
    		}
    	}else{
    		if($Vvrt253ibqmq == 'delete')
    			return "Eliminar";
    		else if($Vvrt253ibqmq == 'edit'){
    			return "Editar";
    		}
    	}
    }
    
    
    
    public function export($Vx21w2sesbf5){

    	
    	
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
    	
    	$Vonr0df11plf_grid_session = $Vx21w2sesbf5['name_grid_session'];
    
    	$Vibotl1q5g0p_var = $_SESSION['grid_session']['GridSession'.$Vonr0df11plf_grid_session];
    
    	
    
    	$Vzh11x4qzct4 = $Vibotl1q5g0p_var;
    
    	unset($Vx21w2sesbf5['security']);
    
    	 
    	
    
    	$Vw4xq1relazr = $this->dCrypt($Vzh11x4qzct4);
    
    
    	
    
    	$Viwy41kuttrs = unserialize($Vw4xq1relazr);
    
    	
    	$this->GGLOBAL = $Viwy41kuttrs->GGLOBAL;
    	$this->TABLE_NAME = $Viwy41kuttrs->TABLE_NAME;
    	$this->PROPERTIES = $Viwy41kuttrs->PROPERTIES;
    	$this->PATH = $Viwy41kuttrs->PATH;
    	$this->TITLE = $Viwy41kuttrs->TITLE;
    	$this->NAME_FORM = $Viwy41kuttrs->NAME_FORM ;
    	$this->ID = $Viwy41kuttrs->ID;
    	
			
		$Vcekyiohn0i4 = $Viwy41kuttrs->CONFIG_DB; 
		
		$this->select();
    
    	$Vyd4lo23gpo4 = $this->gResult();
    	 
    	
    
    	$this->setColumns($Vyd4lo23gpo4);
    		
    	return $this->gFormExport($Vonr0df11plf_grid_session,$Vyd4lo23gpo4,$Vcekyiohn0i4);
    }
    
    
    

    private function gFormExport($Vonr0df11plf_grid_session,$Vyd4lo23gpo4,$Vcekyiohn0i4){
    		
			
		if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
			
		$Vtowlqx55h4o = new Model_form();
		$Vtowlqx55h4o->setId($this->getNameForm());
		$Vtowlqx55h4o->setClass("form-horizontal form-label-left");
		$V5gyudwgjyfr = new Model_div();
		$V5gyudwgjyfr->setClass('module_content');

		$Vt4jmd4a4vxq = $this->ID."GRID_QUERY_BEFORE_LIMIT";

		$Vpoae2jcihwa = $_SESSION[$Vt4jmd4a4vxq];

		$Vpoae2jcihwa = $this->rewriteQuery($Vpoae2jcihwa);

		$Vle3ldyht4v2 = new Model_engine_db($Vcekyiohn0i4);

		$Vzt1vytatydb = $Vle3ldyht4v2->query_field_name($Vpoae2jcihwa);
		
		$Vle3ldyht4v2->__destruct();   
		   
		foreach ($this->ARRAYCOLUMNS as $Vt4jmd4a4vxq => $Vllne4ankrllC){
			if(!$Vllne4ankrllC->is_hidden)
			if(in_array($Vllne4ankrllC->alias, $Vzt1vytatydb)){
				$Vqai1bn0nbku = $this->gElementFormExport($Vt4jmd4a4vxq,$Vllne4ankrllC);
				$V5gyudwgjyfr->addelement($Vqai1bn0nbku);
			}
			
		}
		
		

		$Veirdybvfhkv = new Model_select();
		$Veirdybvfhkv->setClass('form-control');
		$Veirdybvfhkv->setId(GRID_EXPORT_SELECT_ID);
		$Veirdybvfhkv->setName(GRID_EXPORT_SELECT_ID);
			
		$Veirdybvfhkv->openOption(GRID_EXPORT_ALL,'Todas','selected');
		$Veirdybvfhkv->openOption(GRID_EXPORT_THIS,'Pagina Actual','');

		$Veirdybvfhkv->closeOption();
		$Veirdybvfhkv->buildSelect();
			
		$Vct1pgb4e5za = new Model_label();
		$Vct1pgb4e5za->setClass('control-label col-md-4 col-sm-4 col-xs-12');
		$Vct1pgb4e5za->setFor(GRID_EXPORT_SELECT_ID);
		$Vct1pgb4e5za->addElement('Selecciona las paginas');
		$Vct1pgb4e5za->buildLabel();
		
    	$V5gyudwgjyfr_select = new Model_div();
        $V5gyudwgjyfr_select->setClass('form-group');
      	$V5gyudwgjyfr_select->addElement($Vct1pgb4e5za->getLabel());
      	
		$V5gyudwgjyfr_col = new Model_div();
		$V5gyudwgjyfr_col->setClass('col-md-6 col-sm-6 col-xs-12');
		$V5gyudwgjyfr_col->addElement($Veirdybvfhkv->getSelect());
		$V5gyudwgjyfr_col->buildDiv();
		
		$V5gyudwgjyfr_select->addElement($V5gyudwgjyfr_col->getDiv());
		$V5gyudwgjyfr_select->buildDiv();
		
		$V5gyudwgjyfr->addElement($V5gyudwgjyfr_select->getDiv());
		
		$V5gyudwgjyfr->buildDiv();
		
		$Vtowlqx55h4o->addElement($V5gyudwgjyfr->getDiv());
			
		$Vi0oyq1lze1pnput = new Model_input();
		$Vi0oyq1lze1pnput->setType('hidden');
		$Vi0oyq1lze1pnput->setId('name_grid_session');
		$Vi0oyq1lze1pnput->setName('name_grid_session');
		$Vi0oyq1lze1pnput->setValue($Vonr0df11plf_grid_session);
			
		$Vi0oyq1lze1pnput->buildInput();
		$Vtowlqx55h4o->addElement($Vi0oyq1lze1pnput->getInput());

		$Vct1pgb4e5za_format = new Model_label();
		$Vct1pgb4e5za_format->addElement('Formato:');
		$Vct1pgb4e5za_format->buildLabel();
				
		$Vi0oyq1lze1pmage_pdf=new Model_input();
		$Vi0oyq1lze1pmage_pdf->setType('image');
		$Vi0oyq1lze1pmage_pdf->setSrc(base_url().'images/pdf_icono.png');
		$Vi0oyq1lze1pmage_pdf->setId('pdf');
		$Vi0oyq1lze1pmage_pdf->setClass('img');
		$V30sjpyaynkq = base_url() . $this->PATH ."/engine?security=".base64_encode($this->mCrypt('pdf'));
		$Vi0oyq1lze1pmage_pdf->setFormaction($V30sjpyaynkq);
		$Vi0oyq1lze1pmage_pdf->buildInput();
		
		$Vi0oyq1lze1pmage_excel=new Model_input();
		$Vi0oyq1lze1pmage_excel->setType('image');
		$Vi0oyq1lze1pmage_excel->setSrc(base_url().'images/excel_icono.png');
		$Vi0oyq1lze1pmage_excel->setId('csv');
		$Vi0oyq1lze1pmage_excel->setClass('img');
		$V30sjpyaynkq = base_url() . $this->PATH ."/engine?security=".base64_encode($this->mCrypt('csv'));
		$Vi0oyq1lze1pmage_excel->setFormaction($V30sjpyaynkq);
		$Vi0oyq1lze1pmage_excel->buildInput();
		
        $Vxphny5lklwi = new Model_table_form();
        $Vxphny5lklwi->setId($this->getNameForm());
		$Vxphny5lklwi->setClass("tableform");
		$Vxphny5lklwi->setStyle("width:100%");
		$Vxphny5lklwi->newTd($Vct1pgb4e5za_format->getLabel(),"50%",'');
		if($_POST['showPDF'.$this->ID]<102){
			$Vxphny5lklwi->newTd($Vi0oyq1lze1pmage_pdf->getInput(),"25%","left");
			$Vxphny5lklwi->newTd($Vi0oyq1lze1pmage_excel->getInput(),"25%","left");
		}
		else{
			$Vxphny5lklwi->newTd($Vi0oyq1lze1pmage_excel->getInput(),"50%","center");
		}
		
		$Vxphny5lklwi->buildTable();
		
		$Vtowlqx55h4o->addElement($Vxphny5lklwi->getTable());
	
	

		

		$Vrw3cseazbqi = $this->gRedirectForm();
			
		$Vtowlqx55h4o->setMethod('post');
		$Vtowlqx55h4o->buildForm();
			
		return $Vtowlqx55h4o->getForm();
    	
    }
    
    
    
    private function gElementFormExport($Vt4jmd4a4vxq,$Volg3rx0n3n0){
    	$Vct1pgb4e5za = new Model_label();
    	$Vct1pgb4e5za->setFor($Vt4jmd4a4vxq);
    	$Vct1pgb4e5za->addElement($Volg3rx0n3n0->display_front_end);
		$Vct1pgb4e5za->setClass('control-label col-md-4 col-sm-4 col-xs-12');
    	$Vct1pgb4e5za->buildLabel();
    
    
    	$Vi0oyq1lze1pnput = new Model_input();
    	$Vi0oyq1lze1pnput->setType('checkbox');
    	$Vi0oyq1lze1pnput->setId($Vt4jmd4a4vxq);
    	$Vi0oyq1lze1pnput->setName($Vt4jmd4a4vxq);
		$Vi0oyq1lze1pnput->setChecked();
    
    	$Vi0oyq1lze1pnput->buildInput();
		
		$V5gyudwgjyfr = new Model_div();
        $V5gyudwgjyfr->setClass('form-group');
      	$V5gyudwgjyfr->addElement($Vct1pgb4e5za->getLabel());
      	
		$V5gyudwgjyfr_col = new Model_div();
		$V5gyudwgjyfr_col->setClass('col-md-6 col-sm-6 col-xs-12');
		$V5gyudwgjyfr_col->addElement($Vi0oyq1lze1pnput->getInput());
		$V5gyudwgjyfr_col->buildDiv();
		
		$V5gyudwgjyfr->addElement($V5gyudwgjyfr_col->getDiv());
		
		$V5gyudwgjyfr->buildDiv();
		return $V5gyudwgjyfr->getDiv();
    }
	
	
	
    
  	public function pdf($Vx21w2sesbf5){
  		
		if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
			$Vr34v15b45kj['error_pdf'] = GRIDA000000008;
			echo json_encode($Vr34v15b45kj);
			exit;
    	}	
    	
    	$Vonr0df11plf_grid_session = $Vx21w2sesbf5['name_grid_session'];
    
    	unset($Vx21w2sesbf5['name_grid_session']);
    
    	$Vibotl1q5g0p_var = $_SESSION['grid_session']['GridSession'.$Vonr0df11plf_grid_session];
    
    	
    
    	$Vzh11x4qzct4 = $Vibotl1q5g0p_var;
    
    	unset($Vx21w2sesbf5['security']);
    
    	 
    	
    
    	$Vw4xq1relazr = $this->dCrypt($Vzh11x4qzct4);
    
    
    	
    
    	$Viwy41kuttrs = unserialize($Vw4xq1relazr);
    		
    		
    	
    	 
    	$this->GGLOBAL = $Viwy41kuttrs->GGLOBAL;
    	$this->TABLE_NAME = $Viwy41kuttrs->TABLE_NAME;
    	$this->PROPERTIES = $Viwy41kuttrs->PROPERTIES;
    	$this->PATH = $Viwy41kuttrs->PATH;
    	$this->TITLE = $Viwy41kuttrs->TITLE;
    	$this->NAME_FORM = $Viwy41kuttrs->NAME_FORM ;
    	$this->ID = $Viwy41kuttrs->ID;
    	
		
			
		$Vcekyiohn0i4 = $Viwy41kuttrs->CONFIG_DB; 
	
		$this->select();
			
		$Vyd4lo23gpo4 = $this->gResult();
			
		if($Vx21w2sesbf5[GRID_EXPORT_SELECT_ID] == GRID_EXPORT_ALL){
			$Vt4jmd4a4vxq = $this->ID."GRID_QUERY_BEFORE_LIMIT";
			$Vpoae2jcihwa = $_SESSION[$Vt4jmd4a4vxq];
		}else{
			$Vt4jmd4a4vxq = $this->ID."GRID_QUERY";
			$Vpoae2jcihwa = $_SESSION[$Vt4jmd4a4vxq];
		}
			
		unset($Vx21w2sesbf5[GRID_EXPORT_SELECT_ID]);
			
		$this->setColumns($Vyd4lo23gpo4);

		$Vle3ldyht4v2 = new Model_engine_db($Vcekyiohn0i4);

      	$V02e1o2znvm2 = query_to_export($Vle3ldyht4v2,$Vpoae2jcihwa,TRUE,$this->ARRAYCOLUMNS,$Vx21w2sesbf5);
		
		$Vle3ldyht4v2->__destruct();
		
		
		$Vgjq3stvhpun=new mPDF('','Legal','','', 15, 15, 24, 20, 5,4);
		$Vgjq3stvhpun->AddPage('L');
		$Vu0fopdqrmj4 = file_get_contents(APPPATH.'../css/table_pdf.css');
		$Vgjq3stvhpun->WriteHTML($Vu0fopdqrmj4,1);
		
		$Vjwxu22tuzdn = '<table>';
		foreach ($V02e1o2znvm2 as $Vi0oyq1lze1pKey => $Vi0oyq1lze1pValue){
			$Vjwxu22tuzdn.='<tr>';
			foreach ($Vi0oyq1lze1pValue as $Vt4jmd4a4vxq => $Vllne4ankrll){
				$Vjwxu22tuzdn.='<td>'.$Vllne4ankrll.'</td>';
			}
			$Vjwxu22tuzdn.='</tr>';
		}
		$Vjwxu22tuzdn.='</table>';
		$Vgjq3stvhpun->WriteHTML($Vjwxu22tuzdn,2);

		$Vrjwipdjiuqc = $this->ID.date('YmdhMs').'.pdf';
		
		$Vgjq3stvhpun->Output(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc);	

		$this->download_file($Vrjwipdjiuqc);
		
    }
    
    
    
    
    public function csv($Vx21w2sesbf5){
    		
		if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
			$Vr34v15b45kj['error_csv'] = GRIDA000000008;
			echo json_encode($Vr34v15b45kj);
			exit;
    	}	
			
    	$Vonr0df11plf_grid_session = $Vx21w2sesbf5['name_grid_session'];
    
    	unset($Vx21w2sesbf5['name_grid_session']);
    
    	$Vibotl1q5g0p_var = $_SESSION['grid_session']['GridSession'.$Vonr0df11plf_grid_session];
    
    	
    
    	$Vzh11x4qzct4 = $Vibotl1q5g0p_var;
    
    	unset($Vx21w2sesbf5['security']);
    
    	 
    	
    
    	$Vw4xq1relazr = $this->dCrypt($Vzh11x4qzct4);
    
    
    	
    
    	$Viwy41kuttrs = unserialize($Vw4xq1relazr);
    		
    		
    	
    	 
    	$this->GGLOBAL = $Viwy41kuttrs->GGLOBAL;
    	$this->TABLE_NAME = $Viwy41kuttrs->TABLE_NAME;
    	$this->PROPERTIES = $Viwy41kuttrs->PROPERTIES;
    	$this->PATH = $Viwy41kuttrs->PATH;
    	$this->TITLE = $Viwy41kuttrs->TITLE;
    	$this->NAME_FORM = $Viwy41kuttrs->NAME_FORM ;
    	$this->ID = $Viwy41kuttrs->ID;
    		
			
		$Vcekyiohn0i4 = $Viwy41kuttrs->CONFIG_DB; 
	
		$this->select();
			
		$Vyd4lo23gpo4 = $this->gResult();
			
		if($Vx21w2sesbf5[GRID_EXPORT_SELECT_ID] == GRID_EXPORT_ALL){
			$Vt4jmd4a4vxq = $this->ID."GRID_QUERY_BEFORE_LIMIT";
			$Vpoae2jcihwa = $_SESSION[$Vt4jmd4a4vxq];
		}else{
			$Vt4jmd4a4vxq = $this->ID."GRID_QUERY";
			$Vpoae2jcihwa = $_SESSION[$Vt4jmd4a4vxq];
		}
			
		unset($Vx21w2sesbf5[GRID_EXPORT_SELECT_ID]);
			
		$this->setColumns($Vyd4lo23gpo4);

		$Vle3ldyht4v2 = new Model_engine_db($Vcekyiohn0i4);

      	$V0fxvrz0tqh0 = query_to_export($Vle3ldyht4v2,$Vpoae2jcihwa,TRUE,$this->ARRAYCOLUMNS,$Vx21w2sesbf5);
		
		$Vle3ldyht4v2->__destruct();
		
		PHPExcel_Autoloader::register();
		
		$Vbb52anpklqy = new PHPExcel();
		$Vbb52anpklqy->setActiveSheetIndex(0);
		$Vbb52anpklqy->getActiveSheet()->fromArray($V0fxvrz0tqh0, null, 'A1');
		$Vgriczoeyddi = PHPExcel_IOFactory::createWriter($Vbb52anpklqy, 'CSV');
    
 
    	$Vrjwipdjiuqc = $this->ID.date('YmdhMs').'.csv';
		
		$Vgriczoeyddi->save(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc);
		
		$this->download_file($Vrjwipdjiuqc);
		
    }
    
    public function rewriteQuery($Vpoae2jcihwa){
    	$Vpoae2jcihwa = "SELECT *FROM ($Vpoae2jcihwa) WHERE rn=0";
    	return $Vpoae2jcihwa;
    }
    
    
     
    public function create($Vx21w2sesbf5){
    
    	
    	
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
    	
    	$Vonr0df11plf_grid_session = $Vx21w2sesbf5['name_grid_session'];
    
    	$Vibotl1q5g0p_var = $_SESSION['grid_session']['GridSession'.$Vonr0df11plf_grid_session];
    
    	
    
    	$Vzh11x4qzct4 = $Vibotl1q5g0p_var;
    
    	unset($Vx21w2sesbf5['security']);
    
    	 
    	
    
    	$Vw4xq1relazr = $this->dCrypt($Vzh11x4qzct4);
    
    
    	
    
    	$Viwy41kuttrs = unserialize($Vw4xq1relazr);
    
	
    	
    	
    	$this->GGLOBAL = $Viwy41kuttrs->GGLOBAL;
    	$this->TABLE_NAME = $Viwy41kuttrs->TABLE_NAME;
    	$this->PROPERTIES = $Viwy41kuttrs->PROPERTIES;
    	$this->PATH = $Viwy41kuttrs->PATH;
    	$this->TITLE = $Viwy41kuttrs->TITLE;
    	$this->NAME_FORM = $Viwy41kuttrs->NAME_FORM ;
		$this->CONFIG_DB = $Viwy41kuttrs->CONFIG_DB; 
    	
		$this->select();
    
    	$Vyd4lo23gpo4 = $this->gResult();
    
    	$this->setColumns($Vyd4lo23gpo4);
    
    	$Vnrp4bokkm35s = array();
    	
    	return $this->gForm($Vnrp4bokkm35s,$Vyd4lo23gpo4,'_create_new',$Vonr0df11plf_grid_session);	
    }
    
    
    
    
     
    public function edit($Vx21w2sesbf5){

    	
    	 
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
    	
        $Vonr0df11plf_grid_session = $Vx21w2sesbf5['name_grid_session'];
         
        $Vibotl1q5g0p_var = $_SESSION['grid_session']['GridSession'.$Vonr0df11plf_grid_session];
         
        
         
        $Vzh11x4qzct4 = $Vibotl1q5g0p_var;
        unset($Vx21w2sesbf5['security']);
         
        
         
        $Vw4xq1relazr = $this->dCrypt($Vzh11x4qzct4);
         
         
        
         
        $Viwy41kuttrs = unserialize($Vw4xq1relazr);
         
        
        $this->GGLOBAL = $Viwy41kuttrs->GGLOBAL;
        $this->TABLE_NAME = $Viwy41kuttrs->TABLE_NAME;
        $this->PROPERTIES = $Viwy41kuttrs->PROPERTIES;
        $this->PATH = $Viwy41kuttrs->PATH;
        $this->TITLE = $Viwy41kuttrs->TITLE;
        $this->NAME_FORM = $Viwy41kuttrs->NAME_FORM ;
        $this->CONFIG_DB = $Viwy41kuttrs->CONFIG_DB;
		
	    
         
        if(isset($this->TABLE_NAME['general']['FOREIGN_KEY']))
            $Vf2jsabs1rnc = $this->TABLE_NAME['general']['FOREIGN_KEY'];
        else
            $Vf2jsabs1rnc = array();
         
        if(isset($this->TABLE_NAME['general']['PRIMARY_KEY']))
        	$Vujecti5rpfl = $this->TABLE_NAME['general']['PRIMARY_KEY'];
        else
        	$Vujecti5rpfl = array();
        
        
        $Vpd3il5r2gom = array_merge($Vf2jsabs1rnc,$Vujecti5rpfl);
        
        $Vx21w2sesbf5Key = array();
        
        foreach ($Vpd3il5r2gom as $Vt4jmd4a4vxq => $Vllne4ankrll){
        	$V2yvhydjw5pv = $this->gNameColumn($Vt4jmd4a4vxq);
        	if(isset($Vx21w2sesbf5[$V2yvhydjw5pv])){
        		$Vzsp3u2i1ejg = str_replace('-','.',$Vt4jmd4a4vxq);
        		$Vx21w2sesbf5Key[$Vzsp3u2i1ejg] = $Vx21w2sesbf5[$V2yvhydjw5pv];
        	}
        }
        
        

        $this->select($Vx21w2sesbf5Key);
         
        $Vyd4lo23gpo4 = $this->gResult();
         
        
         
        $Vpoae2jcihwa = $Vyd4lo23gpo4['general']['select'];

		$Vle3ldyht4v2 = new Model_engine_db($this->CONFIG_DB);

        $Vi0oyq1lze1pData = $Vle3ldyht4v2->query($Vpoae2jcihwa);
		
		$Vle3ldyht4v2->__destruct();

        $Vdruamuofwxp['post'] = $Vx21w2sesbf5;
        $Vdruamuofwxp['iData'] = $Vi0oyq1lze1pData;
        $Vdruamuofwxp['postKey'] = $Vx21w2sesbf5Key;

        $this->setColumns($Vyd4lo23gpo4);

        return $this->gForm($Vdruamuofwxp,$Vyd4lo23gpo4,'_action_update',$Vonr0df11plf_grid_session);
         
    }

    
    
    public function save($Vx21w2sesbf5){
    	
    	$Vi0oyq1lze1pnfo = array();
    	
    	$Vonr0df11plf_grid_session = $Vx21w2sesbf5['name_grid_session'];
    
    	$Vibotl1q5g0p_var = $_SESSION['grid_session']['GridSession'.$Vonr0df11plf_grid_session];
    
    	
    
    	$Vzh11x4qzct4 = $Vibotl1q5g0p_var;
    
    	unset($Vx21w2sesbf5['security']);
    	 
    	
    	 
    	$Vw4xq1relazr = $this->dCrypt($Vzh11x4qzct4);
    
    	 
    	
    	 
    	$Viwy41kuttrs = unserialize($Vw4xq1relazr);
    	 
    	
    	 
    	$this->GGLOBAL = $Viwy41kuttrs->GGLOBAL;
    	$this->TABLE_NAME = $Viwy41kuttrs->TABLE_NAME;
    	$this->PATH = $Viwy41kuttrs->PATH;
    	$this->URL_REDIRECT_FORM = $Viwy41kuttrs->URL_REDIRECT_FORM;
    	$this->TITLE = $Viwy41kuttrs->TITLE;	
    	$this->CONFIG_DB = $Viwy41kuttrs->CONFIG_DB;
		
		

    	$Vx21w2sesbf5Key = array();
    	
    	foreach ($Vx21w2sesbf5 as $Vt4jmd4a4vxq => $Vllne4ankrll){
    			$Vzsp3u2i1ejg = str_replace('-','.',$Vt4jmd4a4vxq);
    			$Vx21w2sesbf5Key[$Vzsp3u2i1ejg] = $Vllne4ankrll;
    	}
    	
    	
    	Model_engine_sql::insert($Vx21w2sesbf5Key);

    	if(!$this->ERRORSQL){
    		
			$Vle3ldyht4v2 = new Model_engine_db($this->CONFIG_DB);
			
			foreach ($this->TABLE_NAME as $Vllne4ankrllT){
		    	if(isset($Vllne4ankrllT['insert'])){
		    		$Vdruamuofwxp = $Vle3ldyht4v2->query($Vllne4ankrllT['select']);
					if($Vdruamuofwxp != null){
						if(!is_array($Vdruamuofwxp)){
							$Vdruamuofwxp = array();
						}
		    		}else{
		    			$Vdruamuofwxp = array();
					}
					
					if(empty($Vdruamuofwxp)){
						$Vpoae2jcihwa = $Vllne4ankrllT['insert'];
						$Vyd4lo23gpo4 = $Vle3ldyht4v2->query($Vpoae2jcihwa,null,false);
						if($Vyd4lo23gpo4){
							if(!$Vle3ldyht4v2->commit()){
								$this->ERRORSQL = true;
			    				$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vle3ldyht4v2->infoDB->message);
								if(!$Vle3ldyht4v2->rollback()){
									$this->ERRORSQL = true;
			    					$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vle3ldyht4v2->infoDB->message);
								}
							}else{
								$Vi0oyq1lze1pnfo['success'] = true;
							}
						}else{
							$this->ERRORSQL = true;
							$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vle3ldyht4v2->infoDB->message);
						}
					}else{
		    			$this->ERRORSQL = true;
		    			$this->ERROR_CODE[] = sprintf(GRIDA000000004,$this->TITLE);
		    		}
					
				}
			}
	    	
			$Vle3ldyht4v2->__destruct();

    	}else{
    		$this->ERROR_CODE[] = GRIDA000000011;
    	}
		
	    if(!empty($this->ERROR_CODE))
	    	$Vi0oyq1lze1pnfo['error'] = $this->ERROR_CODE;
	    
	    return json_encode($Vi0oyq1lze1pnfo);
	    
    }
    
    
    
    public function update($Vx21w2sesbf5){
    	 
    	$Vonr0df11plf_grid_session = $Vx21w2sesbf5['name_grid_session'];
    	 
    	$Vibotl1q5g0p_var = $_SESSION['grid_session']['GridSession'.$Vonr0df11plf_grid_session];
    	 
    	
    	 
    	$Vzh11x4qzct4 = $Vibotl1q5g0p_var;
    	 
    	unset($Vx21w2sesbf5['security']);
    	 
    	
    
    	$Vw4xq1relazr = $this->dCrypt($Vzh11x4qzct4);
    	 
    
    	
    
    	$Viwy41kuttrs = unserialize($Vw4xq1relazr);
    
    	
    	
    	$this->GGLOBAL = $Viwy41kuttrs->GGLOBAL;
    	$this->TABLE_NAME = $Viwy41kuttrs->TABLE_NAME;
    	
			
		
		$Vcekyiohn0i4 = $Viwy41kuttrs->CONFIG_DB; 
    	 
		
    	
    	$Vx21w2sesbf5Key = array();
    	 
    	foreach ($Vx21w2sesbf5 as $Vt4jmd4a4vxq => $Vllne4ankrll){
    		$Vzsp3u2i1ejg = str_replace('-','.',$Vt4jmd4a4vxq);
    		$Vx21w2sesbf5Key[$Vzsp3u2i1ejg] = $Vllne4ankrll;
    	}
    	
    	Model_engine_sql::update($Vx21w2sesbf5Key);
    	 
    	
    	
    	if(!$this->ERRORSQL){
    	
	    	$Vle3ldyht4v2 = new Model_engine_db($Vcekyiohn0i4);
			
			foreach ($this->TABLE_NAME as $Vllne4ankrllT){
	    		if(isset($Vllne4ankrllT['update'])){
					$Vpoae2jcihwa = $Vllne4ankrllT['update'];
					$Vyd4lo23gpo4 = $Vle3ldyht4v2->query($Vpoae2jcihwa,null,false);
					if($Vyd4lo23gpo4){
						if(!$Vle3ldyht4v2->commit()){
							$this->ERRORSQL = true;
		    				$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vle3ldyht4v2->infoDB->message);
							if(!$Vle3ldyht4v2->rollback()){
								$this->ERRORSQL = true;
		    					$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vle3ldyht4v2->infoDB->message);
							}
						}else{
							$Vi0oyq1lze1pnfo['success'] = true;
						}
					}else{
						$this->ERRORSQL = true;
						$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vle3ldyht4v2->infoDB->message);
					}
				}
			}
	   	
			$Vle3ldyht4v2->__destruct();
	   
		}else{
    		$this->ERROR_CODE[] = GRIDA000000011;
    	}
    	
    	if(!empty($this->ERROR_CODE))
    		$Vi0oyq1lze1pnfo['error'] = $this->ERROR_CODE;
    	
    	return json_encode($Vi0oyq1lze1pnfo);
    }
    
    public function deleteRecord($Vx21w2sesbf5){
    
    	
    	 
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
    	
    	$Vonr0df11plf_grid_session = $Vx21w2sesbf5['name_grid_session'];
    	 
    	$Vibotl1q5g0p_var = $_SESSION['grid_session']['GridSession'.$Vonr0df11plf_grid_session];
    	 
    	
    	 
    	$Vzh11x4qzct4 = $Vibotl1q5g0p_var;
    
    	unset($Vx21w2sesbf5['security']);
    
    	
    
    	$Vw4xq1relazr = $this->dCrypt($Vzh11x4qzct4);
    
    
    	
    
    	$Viwy41kuttrs = unserialize($Vw4xq1relazr);
    
    	
    	 
    	$this->GGLOBAL = $Viwy41kuttrs->GGLOBAL;
    	$this->TABLE_NAME = $Viwy41kuttrs->TABLE_NAME;
    	$this->PROPERTIES = $Viwy41kuttrs->PROPERTIES;
    	$this->PATH = $Viwy41kuttrs->PATH;
    	$this->TITLE = $Viwy41kuttrs->TITLE;
    	
			
		
		$Vcekyiohn0i4 = $Viwy41kuttrs->CONFIG_DB; 
		
		
         
        if(isset($this->TABLE_NAME['general']['FOREIGN_KEY']))
            $Vf2jsabs1rnc = $this->TABLE_NAME['general']['FOREIGN_KEY'];
        else
            $Vf2jsabs1rnc = array();
         
        if(isset($this->TABLE_NAME['general']['PRIMARY_KEY']))
        	$Vujecti5rpfl = $this->TABLE_NAME['general']['PRIMARY_KEY'];
        else
        	$Vujecti5rpfl = array();
        
        
        $Vpd3il5r2gom = array_merge($Vf2jsabs1rnc,$Vujecti5rpfl);
        
        $Vx21w2sesbf5Key = array();
        
        foreach ($Vpd3il5r2gom as $Vt4jmd4a4vxq => $Vllne4ankrll){
        	$V2yvhydjw5pv = $this->gNameColumn($Vt4jmd4a4vxq);
        	if(isset($Vx21w2sesbf5[$V2yvhydjw5pv])){
        		$Vzsp3u2i1ejg = str_replace('-','.',$Vt4jmd4a4vxq);
        		$Vx21w2sesbf5Key[$Vzsp3u2i1ejg] = $Vx21w2sesbf5[$V2yvhydjw5pv];
        	}
        }
    	 
    	Model_engine_sql::delete($Vx21w2sesbf5Key);
    
    	
    	 
    	if(!$this->ERRORSQL){
    	
	    	$Vle3ldyht4v2 = new Model_engine_db($Vcekyiohn0i4);
	    	 
	    	foreach (array_reverse($this->TABLE_NAME) as $Vllne4ankrllT){
	    		if(isset($Vllne4ankrllT['delete'])){
	    				$Vpoae2jcihwa = $Vllne4ankrllT['delete'];
	    				$Vyd4lo23gpo4 = $Vle3ldyht4v2->query($Vpoae2jcihwa,null,false);
						if($Vyd4lo23gpo4){
							if(!$Vle3ldyht4v2->commit()){
									$this->ERRORSQL = true;
				    				$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vle3ldyht4v2->infoDB->message);
									if(!$Vle3ldyht4v2->rollback()){
										$this->ERRORSQL = true;
				    					$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vle3ldyht4v2->infoDB->message);
									}
							}else{
								$Vi0oyq1lze1pnfo['success'] = true;
							}
						}else{
							$this->ERRORSQL = true;
							$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vle3ldyht4v2->infoDB->message);
						}
    			}
	    	}
	   
	   		$Vle3ldyht4v2->__destruct();
			
		}else{
    		$this->ERROR_CODE[] = GRIDA000000011;
    	}
    	
    	if(!empty($this->ERROR_CODE))
    		$Vi0oyq1lze1pnfo['error'] = $this->ERROR_CODE;
    	
    	return json_encode($Vi0oyq1lze1pnfo);
    	
    }
    
    
    
    
    
    
    private function gForm($Vdruamuofwxp = array(),$Vyd4lo23gpo4 = null,$V4x0vbcaeswk = '_create_new',$Vonr0df11plf_grid_session=''){
        $Vzqmwuojh4kj = array();
        
        $Vzqmwuojh4kj = $this->sSelect($Vyd4lo23gpo4);
		
        $Vljne3cugh2d.= '<script> $(document).ready(function() { ';
        

        if (!empty($this->ARRAYCOLUMNS)){
    
            $Vtowlqx55h4o = new Model_form();
            $Vtowlqx55h4o->setId($this->getNameForm());
			$Vtowlqx55h4o->setClass("form-horizontal form-label-left");
            $V5gyudwgjyfr = new Model_div();
            $V5gyudwgjyfr->setClass('module_content');
            
            
            
            foreach ($this->ARRAYCOLUMNS as $Vt4jmd4a4vxq => $Volg3rx0n3n0){
            	if(!isset($Volg3rx0n3n0->only_info)){
                	$Vonr0df11plf =  $Volg3rx0n3n0->owner.'.'.$Volg3rx0n3n0->table_name.'.'.$Volg3rx0n3n0->name;
            	
            		if(!$Volg3rx0n3n0->is_hidden)
            			$Vljne3cugh2d.=$this->functionType($Volg3rx0n3n0->type,$Vonr0df11plf);
            		
            		$Vqai1bn0nbku = $this->gType($Vzqmwuojh4kj,$Vt4jmd4a4vxq,$Volg3rx0n3n0,$Vdruamuofwxp);
                    
                    $V5gyudwgjyfr->addelement($Vqai1bn0nbku);
                }
            }
            
			$Vljne3cugh2d_validation = $this->scriptBasicValidation($this->ARRAYCOLUMNS);
			
            $V5gyudwgjyfr->buildDiv();
    
            $Vftbatglw50m = new Model_article();
            $Vftbatglw50m->setClass('module width_full');
            $Vftbatglw50m->addElement('<header><h3>'.$this->TITLE.'</h3></header>');
            $Vftbatglw50m->addElement($V5gyudwgjyfr->getDiv());
    
            
    
            $Vtowlqx55h4o->addElement($V5gyudwgjyfr->getDiv());
    
            $Vi0oyq1lze1pnput = new Model_input();
            $Vi0oyq1lze1pnput->setType('hidden');
            $Vi0oyq1lze1pnput->setId('name_grid_session');
            $Vi0oyq1lze1pnput->setName('name_grid_session');
            $Vi0oyq1lze1pnput->setValue($Vonr0df11plf_grid_session);
    
            $Vi0oyq1lze1pnput->buildInput();
            $Vtowlqx55h4o->addElement($Vi0oyq1lze1pnput->getInput());
    
            $Vrw3cseazbqi = $this->gRedirectForm();
    
            if($V4x0vbcaeswk == '_create_new' && !empty($Vrw3cseazbqi) && $Vrw3cseazbqi!='save'){
                $V30sjpyaynkq = base_url() . $Vrw3cseazbqi;
            }else if($V4x0vbcaeswk == '_create_new'){
                $V30sjpyaynkq = base_url() . $this->PATH ."/engine?security=".base64_encode($this->mCrypt('save'));
            }else{
                $V30sjpyaynkq = base_url() . $this->PATH ."/engine?security=".base64_encode($this->mCrypt('update'));
            }
            $Vljne3cugh2d.=' }); </script>';
    		$Vljne3cugh2d.=$Vljne3cugh2d_validation;
            $Vtowlqx55h4o->addElement($Vljne3cugh2d);
    
            $Vtowlqx55h4o->setAction($V30sjpyaynkq);
            $Vtowlqx55h4o->setMethod('post');
            $Vtowlqx55h4o->buildForm();
    
            return $Vtowlqx55h4o->getForm();
        }
         
    }
    
	
	
	private function scriptBasicValidation($Vkghsum422za){
		$Vljne3cugh2d_extra_validation = "<script>";
		$Vljne3cugh2d_extra_validation.= $this->scriptExtraValidation();	
		$Vljne3cugh2d_validation = "<script>";	
		$Vljne3cugh2d_validation.= "$('#".$this->getNameForm()."').validate({";
		$Vljne3cugh2d_validation.= "rules: {";
		foreach ($Vkghsum422za as $Vt4jmd4a4vxq => $Volg3rx0n3n0) {
			if(!isset($Volg3rx0n3n0->only_info)){
				
				if(!$Volg3rx0n3n0->is_hidden){
	                $Vonr0df11plf =  $Volg3rx0n3n0->owner.'-'.$Volg3rx0n3n0->table_name.'-'.$Volg3rx0n3n0->name;
					$Vdwjvpg0bk03 = " ";
					
					if(isset($Volg3rx0n3n0->nullable) && $Volg3rx0n3n0->nullable == 'N'){
						$Vdwjvpg0bk03.='required: true,';
					}
				    if(strtoupper($Volg3rx0n3n0->type) == 'DATE'){
			        	$Vdwjvpg0bk03.='maxlength: 10,';
			        }else if(strpos($Volg3rx0n3n0->type,'TIMESTAMP') !== false){
			        	$Vdwjvpg0bk03.='maxlength: 16,';
			        }else if(isset($Volg3rx0n3n0->max_length)){
						$Vdwjvpg0bk03.='maxlength: '.$Volg3rx0n3n0->max_length.',';
					}
					
					if(isset($Volg3rx0n3n0->expresion) && !isset($Volg3rx0n3n0->error_message_expresion)){
						$Vljne3cugh2d_extra_validation.= $this->functionValidate($Volg3rx0n3n0->expresion, $Vonr0df11plf);
						$Vdwjvpg0bk03.= md5($Vonr0df11plf).':'.$Volg3rx0n3n0->expresion.',';
					}else if(isset($Volg3rx0n3n0->expresion) && isset($Volg3rx0n3n0->error_message_expresion)){
						$Vljne3cugh2d_extra_validation.= $this->functionValidate($Volg3rx0n3n0->expresion, $Vonr0df11plf,$Volg3rx0n3n0->error_message_expresion);
						$Vdwjvpg0bk03.= md5($Vonr0df11plf).':'.$Volg3rx0n3n0->expresion.',';
					}
					
					if(isset($Volg3rx0n3n0->funcion) && !isset($Volg3rx0n3n0->error_message_funcion)){
            			$Vljne3cugh2d_extra_validation.= $this->functionValidateFuncion($Volg3rx0n3n0->funcion, $Vonr0df11plf);
						$Vdwjvpg0bk03.= md5($Vonr0df11plf.'_Function').': true,';
					}else if(isset($Volg3rx0n3n0->funcion) && isset($Volg3rx0n3n0->error_message_funcion)){
            			$Vljne3cugh2d_extra_validation.= $this->functionValidateFuncion($Volg3rx0n3n0->funcion, $Vonr0df11plf,$Volg3rx0n3n0->error_message_funcion);
						$Vdwjvpg0bk03.= md5($Vonr0df11plf.'_Function').': true,';
					}
            	
					if(isset($Volg3rx0n3n0->type) && $Volg3rx0n3n0->type == 'NUMBER' && $Volg3rx0n3n0->data_scale == '0'){
			            $Vdwjvpg0bk03.='regexp: /^[1-9]*$/,';
			        }else if($Volg3rx0n3n0->type == 'NUMBER' && (is_null($Volg3rx0n3n0->data_scale) || empty($Volg3rx0n3n0->data_scale)) && (is_null($Volg3rx0n3n0->data_precision) || empty($Volg3rx0n3n0->data_precision))){
			            $Vdwjvpg0bk03.='regexp: /^[1-9]\d*(.\d+)?$/,';
			        }else if($Volg3rx0n3n0->type == ('NUMBER' || 'FLOAT') && (is_null($Volg3rx0n3n0->data_scale) || empty($Volg3rx0n3n0->data_scale)) && (!is_null($Volg3rx0n3n0->data_precision) || !empty($Volg3rx0n3n0->data_precision)) && $Volg3rx0n3n0->data_precision > 0){
			            $Vdwjvpg0bk03.='regexp: /^[1-9]\d*(.\d+)?$/,';
			        }
				
					$Vdwjvpg0bk03 = trim(substr($Vdwjvpg0bk03, 0, -1));
					
					$Vljne3cugh2d_validation.= "'$Vonr0df11plf':{".$Vdwjvpg0bk03."},";
				}
				
			}
		}
		$Vljne3cugh2d_validation = trim(substr($Vljne3cugh2d_validation, 0, -1));
		$Vljne3cugh2d_validation.= "},";
		$Vljne3cugh2d_validation.= "  highlight: function(element) {
						            $(element).closest('.form-group').addClass('has-error');
						        },
						        unhighlight: function(element) {
						            $(element).closest('.form-group').removeClass('has-error');
						        },
						        errorElement: 'span',
						        errorClass: 'help-block',
						        errorPlacement: function(error, element) {
						            if(element.parent('.input-group').length) {
						                error.insertAfter(element.parent());
						            } else {
						                error.insertAfter(element);
						            }
						        }";
		$Vljne3cugh2d_validation.= "});";
		$Vljne3cugh2d_validation.= "</script>";
		
		$Vljne3cugh2d_extra_validation.= "</script>";
		
		$Vljne3cugh2d_validation.= $Vljne3cugh2d_extra_validation;
		return $Vljne3cugh2d_validation;
	}
	
	public function scriptExtraValidation(){
		$Vljne3cugh2d = "$.validator.addMethod('regexp', function(value, element, param) {
				        return this.optional(element) || value.match(param);
				   },'El tipo de dato no es valido');";
		return $Vljne3cugh2d;
	}
	
	 private function functionValidate($Vxre0fy252zu,$Vonr0df11plf,$Vr34v15b45kj_message='Error'){
    	$Vonr0df11plf = md5($Vonr0df11plf);
        return "$.validator.addMethod('$Vonr0df11plf',function(value, element, param) {
                   return this.optional(element) || value.match(param);
                },'$Vr34v15b45kj_message');
                ";
    }
    
    
    private function functionValidateFuncion($Vz2blxv0gclq,$Vonr0df11plf,$Vr34v15b45kj_message='Error'){
    	$Vonr0df11plf = md5($Vonr0df11plf.'_Function');
        return "$.validator.addMethod('$Vonr0df11plf',function(value, element, string) {
                        if ($Vz2blxv0gclq(element)) {
                        	return true;
                        }
                        return false;
                },'$Vr34v15b45kj_message');";
    }
	
    
    
    private function sSelect($Vyd4lo23gpo4){
    	$Vzqmwuojh4kj = array();
    	foreach ($Vyd4lo23gpo4 as $Vt4jmd4a4vxq => $Vllne4ankrll){
    		if(is_numeric($Vt4jmd4a4vxq) && $Vt4jmd4a4vxq>0){
    			if(isset($Vllne4ankrll['CATALOG'])){
    				if(isset($Vllne4ankrll['PRIMARY_KEY'])){
    					foreach ($Vllne4ankrll['PRIMARY_KEY'] as $Vllne4ankrllPK){
    						$Vzqmwuojh4kj[$Vllne4ankrllPK->name] = $Vllne4ankrll;
    						break;
    					}
    				}
    			}
    		}
    	}
    	return $Vzqmwuojh4kj;
    }
    
    private function functionType($V4x0vbcaeswk,$Vonr0df11plf){
    	$Vonr0df11plf = str_replace('.','-', $Vonr0df11plf);
        if(strtoupper($V4x0vbcaeswk) == 'DATE'){
            return "$('#".$Vonr0df11plf."').datetimepicker({
                    locale: 'es',
                    format: 'YYYY-MM-DD'
                });";
            //return "$('#".$Vonr0df11plf."').datetimepicker({lang:'es',timepicker: false,format: 'Y-m-d',showOn: 'both',buttonImage: '".base_url()."images/calendar.png',buttonImageOnly: false});";
        }else if(strpos($V4x0vbcaeswk,'TIMESTAMP') !== false){
             return "$('#".$Vonr0df11plf."').datetimepicker({
                    locale: 'es',
                    format: 'YYYY-MM-DD H:mm'
                });";
            //return "$('#".$Vonr0df11plf."').datetimepicker({lang:'es',format: 'Y-m-d H:i',showOn: 'both',buttonImage: '".base_url()."images/calendar.png',buttonImageOnly: false});";
        }
    }
     
    
    
    private function gType($Vzqmwuojh4kj,$Vt4jmd4a4vxq,$Volg3rx0n3n0,$Vdruamuofwxp){

    	if($Volg3rx0n3n0->is_select && !$Volg3rx0n3n0->is_hidden){
        	return $this->gSelectABased($Vt4jmd4a4vxq, $Volg3rx0n3n0->array_select, $Volg3rx0n3n0,$Vdruamuofwxp);
        }else if($Volg3rx0n3n0->is_hidden){
        	return $this->gInputHidden($Vt4jmd4a4vxq, $Vdruamuofwxp, $Volg3rx0n3n0);
        }else  if(array_key_exists($Volg3rx0n3n0->name,$Vzqmwuojh4kj)  && !$Volg3rx0n3n0->is_hidden){
        	return $this->gSelectCBased($Vt4jmd4a4vxq, $Vzqmwuojh4kj, $Vdruamuofwxp, $Volg3rx0n3n0);
        }else if(strpos($Volg3rx0n3n0->type,'VARCHAR') !== false && $Volg3rx0n3n0->max_length >=100){
        	return $this->gTextArea($Vt4jmd4a4vxq, $Vdruamuofwxp, $Volg3rx0n3n0);
       	}else{
            return $this->gInput($Vt4jmd4a4vxq, $Vdruamuofwxp, $Volg3rx0n3n0);
        }
        
     }
    
    
    
    private function gSelectABased($Vt4jmd4a4vxq,$Vrdfbcgbrri2,$Volg3rx0n3n0,$Vdruamuofwxp = array()){

    	$Vmikwadjtpxz = str_replace('.','-', $Vt4jmd4a4vxq);
        
        $Veirdybvfhkv = new Model_select();
        $Veirdybvfhkv->setId($Vmikwadjtpxz);
        $Veirdybvfhkv->setName($Vmikwadjtpxz);
		$Veirdybvfhkv->setClass("form-control");
        $Vllne4ankrll_type = '';
        
        $Vllne4ankrll_type = $Volg3rx0n3n0->owner.'.'.$Volg3rx0n3n0->table_name.'.'.$Volg3rx0n3n0->name;
        
        $Vllne4ankrll_type = $this->gNameColumn($Vllne4ankrll_type);

        foreach ($Vrdfbcgbrri2 as $Ve54ae0gczsk => $Vllne4ankrll){
        	    	if(isset($Vdruamuofwxp['iData'])){
        	    		$Vi0oyq1lze1pData = $Vdruamuofwxp['iData'];
        	    		if(isset($Vi0oyq1lze1pData[0]) && isset($Vi0oyq1lze1pData[0][$Vllne4ankrll_type]) && $Vi0oyq1lze1pData[0][$Vllne4ankrll_type] == $Ve54ae0gczsk)
		            		$Veirdybvfhkv->openOption($Ve54ae0gczsk,$Vllne4ankrll,'selected');
		            	else
		            		$Veirdybvfhkv->openOption($Ve54ae0gczsk,$Vllne4ankrll,'');
	            	}else{
	            		$Veirdybvfhkv->openOption($Ve54ae0gczsk,$Vllne4ankrll,'');
	            	}
	    }
       
        $Veirdybvfhkv->closeOption();
        $Veirdybvfhkv->buildSelect();
    
        $Vct1pgb4e5za = new Model_label();
        $Vct1pgb4e5za->setFor($Vmikwadjtpxz);
        $Vct1pgb4e5za->addElement($Volg3rx0n3n0->display_front_end);
		$Vct1pgb4e5za->setClass('control-label col-md-4 col-sm-4 col-xs-12');
        $Vct1pgb4e5za->buildLabel();
		
		$V5gyudwgjyfr = new Model_div();
        $V5gyudwgjyfr->setClass('form-group');
      	$V5gyudwgjyfr->addElement($Vct1pgb4e5za->getLabel());
      	
		$V5gyudwgjyfr_col = new Model_div();
		$V5gyudwgjyfr_col->setClass('col-md-6 col-sm-6 col-xs-12');
		$V5gyudwgjyfr_col->addElement($Veirdybvfhkv->getSelect());
		$V5gyudwgjyfr_col->buildDiv();
		
		$V5gyudwgjyfr->addElement($V5gyudwgjyfr_col->getDiv());
		
		$V5gyudwgjyfr->buildDiv();
		return $V5gyudwgjyfr->getDiv();
		
    }

	
    
    
   private function gSelectCBased($Vt4jmd4a4vxq,$Vzqmwuojh4kj,$Vdruamuofwxp,$Volg3rx0n3n0){
    	
        $Vyd4lo23gpo4 = $this->fSelect($Vzqmwuojh4kj[$Volg3rx0n3n0->name]['select'],$Volg3rx0n3n0->name);

        $Viqojlhhh2ni = $this->cfSelect($Vzqmwuojh4kj[$Volg3rx0n3n0->name]['select'], $Volg3rx0n3n0->name);
      
        $Vyd4lo23gpo4 = array_merge($Viqojlhhh2ni,$Vyd4lo23gpo4);
        
		$Veirdybvfhkv = new Model_select();
        
        $Vmikwadjtpxz = str_replace('.','-', $Vt4jmd4a4vxq);
        
        $Veirdybvfhkv->setId($Vmikwadjtpxz);
        $Veirdybvfhkv->setName($Vmikwadjtpxz);
        $Veirdybvfhkv->setClass("form-control");
        $Vllne4ankrll_type = '';
        
        $Vllne4ankrll_type = $Volg3rx0n3n0->owner.'.'.$Volg3rx0n3n0->table_name.'.'.$Volg3rx0n3n0->name;
        
        $Vllne4ankrll_type = $this->gNameColumn($Vllne4ankrll_type);
        
        foreach ($Vyd4lo23gpo4 as $Vllne4ankrll){
        	$Vj5mlgrdfnno = '';
        	
        	foreach ($Vllne4ankrll as $Vvyb45zoel1m){
            	$Vj5mlgrdfnno.=$Vvyb45zoel1m.'|';
            }
            
            $Vt4jmd4a4vxq_val = $Vllne4ankrll[$Volg3rx0n3n0->name];
            
            if(isset($Vdruamuofwxp['iData'])){
            	$Vi0oyq1lze1pData = $Vdruamuofwxp['iData'];
            	if(isset($Vi0oyq1lze1pData[0])){
	            	if(isset($Vi0oyq1lze1pData[0][$Vllne4ankrll_type]) && $Vi0oyq1lze1pData[0][$Vllne4ankrll_type] == $Vt4jmd4a4vxq_val)
	            		$Veirdybvfhkv->openOption($Vt4jmd4a4vxq_val,$Vj5mlgrdfnno,'selected');
	            	else 
	            		$Veirdybvfhkv->openOption($Vt4jmd4a4vxq_val,$Vj5mlgrdfnno,'');
            	}
            }else{
                $Veirdybvfhkv->openOption($Vt4jmd4a4vxq_val,$Vj5mlgrdfnno,'');
            }
        }
        
        $Veirdybvfhkv->closeOption();
        $Veirdybvfhkv->buildSelect();
            
        $Vct1pgb4e5za = new Model_label();
        $Vct1pgb4e5za->setFor($Vmikwadjtpxz);
        $Vct1pgb4e5za->addElement($Volg3rx0n3n0->display_front_end);
        $Vct1pgb4e5za->setClass('control-label col-md-4 col-sm-4 col-xs-12');
        $Vct1pgb4e5za->buildLabel();
		
		$V5gyudwgjyfr = new Model_div();
        $V5gyudwgjyfr->setClass('form-group');
      	$V5gyudwgjyfr->addElement($Vct1pgb4e5za->getLabel());
      	
		$V5gyudwgjyfr_col = new Model_div();
		$V5gyudwgjyfr_col->setClass('col-md-6 col-sm-6 col-xs-12');
		$V5gyudwgjyfr_col->addElement($Veirdybvfhkv->getSelect());
		$V5gyudwgjyfr_col->buildDiv();
		
		$V5gyudwgjyfr->addElement($V5gyudwgjyfr_col->getDiv());
		
		$V5gyudwgjyfr->buildDiv();
		return $V5gyudwgjyfr->getDiv();
    }
    
    
    
    private function gInput($Vt4jmd4a4vxq,$Vdruamuofwxp,$Volg3rx0n3n0){
        
    	$Vwcgwqd1a0es = $this->gNameColumn($Vt4jmd4a4vxq);
    	
        $Vmikwadjtpxz = str_replace('.','-', $Vt4jmd4a4vxq);
        
       
        
        $Vct1pgb4e5za = new Model_label();
        $Vct1pgb4e5za->setFor($Vmikwadjtpxz);
        $Vct1pgb4e5za->addElement($Volg3rx0n3n0->display_front_end);
        $Vct1pgb4e5za->setClass('control-label col-md-4 col-sm-4 col-xs-12');
        $Vct1pgb4e5za->buildLabel();
		
        $Vi0oyq1lze1pnput = new Model_input();
        
        if(isset($Volg3rx0n3n0->type_password) && $Volg3rx0n3n0->type_password)
        	$Vi0oyq1lze1pnput->setType('password');
        else 
        	$Vi0oyq1lze1pnput->setType('text');
        
        $Vi0oyq1lze1pnput->setId($Vmikwadjtpxz);
        $Vi0oyq1lze1pnput->setName($Vmikwadjtpxz);
        $this->addRequired($Vi0oyq1lze1pnput, $Volg3rx0n3n0);
        $this->addClass($Vi0oyq1lze1pnput, $Volg3rx0n3n0);
    
        if($Volg3rx0n3n0->type== 'DATE')
            $Vi0oyq1lze1pnput->setMaxlength(10);
        else if(strpos($Volg3rx0n3n0->type,'TIMESTAMP') !== false)
            $Vi0oyq1lze1pnput->setMaxlength(16);
        else if(isset($Volg3rx0n3n0->max_length) && $Volg3rx0n3n0->type!='DATE')
            $Vi0oyq1lze1pnput->setMaxlength($Volg3rx0n3n0->max_length);

        if(isset($Vdruamuofwxp['iData'])){
       		 $Vi0oyq1lze1pData = $Vdruamuofwxp['iData'];
	         if(isset($Vi0oyq1lze1pData[0])){
		         if(isset($Vi0oyq1lze1pData[0][$Vwcgwqd1a0es])){
		         	 $Vi0oyq1lze1pnput->setValue($Vi0oyq1lze1pData[0][$Vwcgwqd1a0es]);
		         }
	         }
        }
        $Vi0oyq1lze1pnput->buildInput();
      
	  	$V5gyudwgjyfr = new Model_div();
        $V5gyudwgjyfr->setClass('form-group');
      	$V5gyudwgjyfr->addElement($Vct1pgb4e5za->getLabel());
      	
		$V5gyudwgjyfr_col = new Model_div();
		$V5gyudwgjyfr_col->setClass('col-md-6 col-sm-6 col-xs-12');
		$V5gyudwgjyfr_col->addElement($Vi0oyq1lze1pnput->getInput());
		$V5gyudwgjyfr_col->buildDiv();
		
		$V5gyudwgjyfr->addElement($V5gyudwgjyfr_col->getDiv());
		
		$V5gyudwgjyfr->buildDiv();
		return $V5gyudwgjyfr->getDiv();
    }
    
    
    
    private function gInputHidden($Vt4jmd4a4vxq,$Vdruamuofwxp,$Volg3rx0n3n0){
    
    	$Vmikwadjtpxz = str_replace('.','-', $Vt4jmd4a4vxq);
    	
    	$Vwcgwqd1a0es = $this->gNameColumn($Vt4jmd4a4vxq);
    	 
    	$Vi0oyq1lze1pnput = new Model_input();
    	$Vi0oyq1lze1pnput->setType('hidden');
    	$Vi0oyq1lze1pnput->setId($Vmikwadjtpxz);
    	$Vi0oyq1lze1pnput->setName($Vmikwadjtpxz);
    	$this->addRequired($Vi0oyq1lze1pnput,$Volg3rx0n3n0);
    	$this->addClass($Vi0oyq1lze1pnput, $Volg3rx0n3n0);
    
    	if($Volg3rx0n3n0->type == 'DATE')
    		$Vi0oyq1lze1pnput->setMaxlength(10);
    	else if(strpos($Volg3rx0n3n0->type,'TIMESTAMP') !== false)
    		$Vi0oyq1lze1pnput->setMaxlength(16);
    	else if(isset($Volg3rx0n3n0->max_length) && $Volg3rx0n3n0->type!='DATE')
    		$Vi0oyq1lze1pnput->setMaxlength($Volg3rx0n3n0->max_length);
    
    	if(isset($Vdruamuofwxp['iData'])){
    		$Vi0oyq1lze1pData = $Vdruamuofwxp['iData'];
    		if(isset($Vi0oyq1lze1pData[0])){
    			if(isset($Vi0oyq1lze1pData[0][$Vwcgwqd1a0es])){
    				$Vi0oyq1lze1pnput->setValue($Vi0oyq1lze1pData[0][$Vwcgwqd1a0es]);
    			}
    		}
    	}
    	 
    	$Vi0oyq1lze1pnput->buildInput();

    	return $Vi0oyq1lze1pnput->getInput();
    }
    
    
    
    private function gTextArea($Vt4jmd4a4vxq,$Vdruamuofwxp,$Volg3rx0n3n0){
    	
    	$Vmikwadjtpxz = str_replace('.','-', $Vt4jmd4a4vxq);
    	
    	$Vwcgwqd1a0es = $this->gNameColumn($Vt4jmd4a4vxq);
    	
    	$Vct1pgb4e5za = new Model_label();
    	$Vct1pgb4e5za->setFor($Vmikwadjtpxz);
    	$Vct1pgb4e5za->addElement($Volg3rx0n3n0->display_front_end);
		$Vct1pgb4e5za->setClass('control-label col-md-4 col-sm-4 col-xs-12');
    	$Vct1pgb4e5za->buildLabel();
    
    	$V12qazceal3r = new Model_textarea();
    	$V12qazceal3r->setId($Vmikwadjtpxz);
    	$V12qazceal3r->setName($Vmikwadjtpxz);
    	$V12qazceal3r->setMaxlength($Volg3rx0n3n0->max_length);
    		
    	if($Volg3rx0n3n0->nullable=='N'){
    		$V12qazceal3r->setClass('required form-control');
    	}else{
    		$V12qazceal3r->setClass('form-control');
    	}

    	if(isset($Vdruamuofwxp['iData'])){
    		$Vi0oyq1lze1pData = $Vdruamuofwxp['iData'];
	    	if(isset($Vi0oyq1lze1pData[0])){
	    		if(isset($Vi0oyq1lze1pData[0][$Vwcgwqd1a0es])){
	    			$V12qazceal3r->setValue($Vi0oyq1lze1pData[0][$Vwcgwqd1a0es]);
	    		}
	    	}
    	}
    	$V12qazceal3r->buildTextarea();
		
		$V5gyudwgjyfr = new Model_div();
        $V5gyudwgjyfr->setClass('form-group');
      	$V5gyudwgjyfr->addElement($Vct1pgb4e5za->getLabel());
      	
		$V5gyudwgjyfr_col = new Model_div();
		$V5gyudwgjyfr_col->setClass('col-md-6 col-sm-6 col-xs-12');
		$V5gyudwgjyfr_col->addElement($V12qazceal3r->getTextarea());
		$V5gyudwgjyfr_col->buildDiv();
		
		$V5gyudwgjyfr->addElement($V5gyudwgjyfr_col->getDiv());
		$V5gyudwgjyfr->buildDiv();
		
		return $V5gyudwgjyfr->getDiv();
    }
    
    
    
 	private function addClass(&$Vi0oyq1lze1pnput,$Volg3rx0n3n0){
            
        $Vosxxeprqef2 = '';
      
        if(!$Volg3rx0n3n0->is_hidden){
	        if($Volg3rx0n3n0->nullable == 'N'){
	            $Vosxxeprqef2 = 'required';
	        }
			
	        if($Volg3rx0n3n0->type == 'NUMBER' && $Volg3rx0n3n0->data_scale == '0'){
	            if(empty($Vosxxeprqef2)){
	                $Vosxxeprqef2 = 'intNegativo';
	            }else{
	                $Vosxxeprqef2.= ' intNegativo';
	            }
	        }else if($Volg3rx0n3n0->type == 'NUMBER' && (is_null($Volg3rx0n3n0->data_scale) || empty($Volg3rx0n3n0->data_scale))){
	            if(empty($Vosxxeprqef2)){
	                $Vosxxeprqef2 = 'floatNegativo';
	            }else{
	                $Vosxxeprqef2.= ' floatNegativo';
	            }
	        }
        }    
            
		$Vosxxeprqef2.=' form-control form-control col-md-7 col-xs-12';
			
        $Vi0oyq1lze1pnput->setClass($Vosxxeprqef2);
    }
    
	
    
    private function addRequired(&$Vi0oyq1lze1pnput,$Volg3rx0n3n0){
    	
        if(!$Volg3rx0n3n0->is_hidden){
	        if($Volg3rx0n3n0->nullable == 'N'){
				$Vi0oyq1lze1pnput->setRequired('required');
			}
		}
    }
    
    
    
    private function fSelect($Vpoae2jcihwa,$Vt4jmd4a4vxq){
    	$Vle3ldyht4v2 = new Model_engine_db($this->CONFIG_DB);
		$Vi0oyq1lze1pData = $Vle3ldyht4v2->query($Vpoae2jcihwa.' ORDER BY '.$Vt4jmd4a4vxq);
		$Vle3ldyht4v2->__destruct();
        return $Vi0oyq1lze1pData;
    }
    
    
     
    private function cfSelect($Vpoae2jcihwa,$Vt4jmd4a4vxq){
        if(strpos($Vpoae2jcihwa,'=')!== false){
            $Vpoae2jcihwa = str_replace('=', ' NOT IN ', $Vpoae2jcihwa);
			$Vle3ldyht4v2 = new Model_engine_db($this->CONFIG_DB);
	        $Vi0oyq1lze1pData = $Vle3ldyht4v2->query($Vpoae2jcihwa.' ORDER BY '.$Vt4jmd4a4vxq);
			$Vle3ldyht4v2->__destruct();
            return $Vi0oyq1lze1pData;
        }else
            return array();
    }
    
    
    
    public function buildBackButton(){
    
    	if(isset($_SESSION['grid_session']['flow'])){
    
    		$Vatlxtsswe1y = $_SESSION['grid_session']['flow'];
    
    		$V11hecrlk0uj = basename ( "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" );
    
    		if(isset($Vatlxtsswe1y[$Vatlxtsswe1y[$V11hecrlk0uj]['CALL_FROM']])){
    			$Vdruamuofwxp = $Vatlxtsswe1y[$Vatlxtsswe1y[$V11hecrlk0uj]['CALL_FROM']];
    		
    			$V0rdrxvj34c4 = new Model_a_post();
    			 
    			$V0rdrxvj34c4->setMethod('post');
    			$V0rdrxvj34c4->setOnclick('show_content'.$this->ID.'(parentNode)');
    
    			$V0rdrxvj34c4->addElement('Volver Atr&aacute;s');
    			 
    			$V0rdrxvj34c4->setAction($Vdruamuofwxp['URL']);
    			 
    			foreach ($Vdruamuofwxp as $Vt4jmd4a4vxq => $Vllne4ankrllColumn){
    				$Vi0oyq1lze1pnput = new Model_input();
    				$Vi0oyq1lze1pnput->setType('hidden');
    				$Vi0oyq1lze1pnput->setName(str_replace('.','-',$Vt4jmd4a4vxq));
    				$Vi0oyq1lze1pnput->setValue($Vllne4ankrllColumn);
    				$Vi0oyq1lze1pnput->buildInput();
    				$V0rdrxvj34c4->addInput($Vi0oyq1lze1pnput->getInput());
    			}
    			 
    			$Vi0oyq1lze1pnput = new Model_input();
    			$Vi0oyq1lze1pnput->setType('hidden');
    			 
    			 
    			if(isset($Vdruamuofwxp['name_grid_session'])){
    				$Vi0oyq1lze1pnput->setName('name_grid_session');
    				$Vi0oyq1lze1pnput->setValue($Vdruamuofwxp['name_grid_session']);
    			}else{
    				$Vi0oyq1lze1pnput->setName('name_grid_session_no_defined');
    				$Vi0oyq1lze1pnput->setValue('');
    			}
    			 
    			$Vi0oyq1lze1pnput->buildInput();
    			$V0rdrxvj34c4->addInput($Vi0oyq1lze1pnput->getInput());
    
    			$V0rdrxvj34c4->buildA_post();
    			 
    			return $V0rdrxvj34c4->getA_post();
    		}
    		return "";
    	}
    }
    
    
 
    public function template($Vx21w2sesbf5){
    	
    	
    	 
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
    	
    	$Vonr0df11plf_grid_session = $Vx21w2sesbf5['name_grid_session'];

    	$Vibotl1q5g0p_var = $_SESSION['grid_session']['GridSession'.$Vonr0df11plf_grid_session];
    	
    	
    	
    	$Vzh11x4qzct4 = $Vibotl1q5g0p_var;
    	
    	unset($Vx21w2sesbf5['security']);
    	
    	
    	
    	
    	$Vw4xq1relazr = $this->dCrypt($Vzh11x4qzct4);
    	
    	
    	
    	
    	$Viwy41kuttrs = unserialize($Vw4xq1relazr);
    	
    	
    	
    	$this->TEMPLATES = $Viwy41kuttrs->TEMPLATES;
    	$this->PATH = $Viwy41kuttrs->PATH;
    	$this->TITLE = $Viwy41kuttrs->TITLE;
    	$this->NAME_FORM = $Viwy41kuttrs->NAME_FORM ;
    	
    	return $this->gFormTemplate($Vonr0df11plf_grid_session);
    }
    
    
    private function gFormTemplate($Vonr0df11plf_grid_session){
    	
    	
    	 
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
    	
		if(!empty($this->TEMPLATES)){
		
    		$Vtowlqx55h4o = new Model_form();
			$Vtowlqx55h4o->setClass("form-horizontal form-label-left");
    		$Vtowlqx55h4o->setId($this->getNameForm());
    		    		
    		$Veirdybvfhkv = new Model_select();
    		$Veirdybvfhkv->setClass("form-control");
    		$Veirdybvfhkv->setId(GRID_TEMPLATE_SELECT_ID);
    		$Veirdybvfhkv->setName(GRID_TEMPLATE_SELECT_ID);
    		
    		foreach ($this->TEMPLATES as $V41jddyrs5sh => $Voozv1ce1z55){
    			if(isset($Voozv1ce1z55['properties'])){
    				if(isset($Voozv1ce1z55['properties']['name'])){
    					$Vprghqetum14 = $Voozv1ce1z55['properties']['name'];
    				}else{
    					$Vprghqetum14 = $V41jddyrs5sh;
    				}
    			}else{
    				$Vprghqetum14 = $V41jddyrs5sh;
    			}
    			$Veirdybvfhkv->openOption($V41jddyrs5sh,$Vprghqetum14,'');
    		}
    		
    		$Veirdybvfhkv->closeOption();
    		$Veirdybvfhkv->buildSelect();
    		 
    		$Vct1pgb4e5za = new Model_label();
			$Vct1pgb4e5za->setClass('control-label col-md-4 col-sm-4 col-xs-12');
    		$Vct1pgb4e5za->setFor(GRID_TEMPLATE_SELECT_ID);
    		$Vct1pgb4e5za->addElement('Selecciona el template');
    		$Vct1pgb4e5za->buildLabel();
    		 
    		$V5gyudwgjyfr = new Model_div();
	        $V5gyudwgjyfr->setClass('form-group');
	      	$V5gyudwgjyfr->addElement($Vct1pgb4e5za->getLabel());
	      	
			$V5gyudwgjyfr_col = new Model_div();
			$V5gyudwgjyfr_col->setClass('col-md-6 col-sm-6 col-xs-12');
			$V5gyudwgjyfr_col->addElement($Veirdybvfhkv->getSelect());
			$V5gyudwgjyfr_col->buildDiv();
			
			$V5gyudwgjyfr->addElement($V5gyudwgjyfr_col->getDiv());
			$V5gyudwgjyfr->buildDiv();
			$Vtowlqx55h4o->addElement($V5gyudwgjyfr->getDiv());
			 
    		$Vi0oyq1lze1pnput = new Model_input();
    		$Vi0oyq1lze1pnput->setType('hidden');
    		$Vi0oyq1lze1pnput->setId('name_grid_session');
    		$Vi0oyq1lze1pnput->setName('name_grid_session');
    		$Vi0oyq1lze1pnput->setValue($Vonr0df11plf_grid_session);
    		 
    		$Vi0oyq1lze1pnput->buildInput();
    		$Vtowlqx55h4o->addElement($Vi0oyq1lze1pnput->getInput());
    	
    		
    	
    		$Veirdybvfhkv = new Model_select();
    		$Veirdybvfhkv->setClass("form-control"); 
    		$Veirdybvfhkv->setId(GRID_EXPORT_SELECT_ID);
    		$Veirdybvfhkv->setName(GRID_EXPORT_SELECT_ID);
    		 
    		$Veirdybvfhkv->openOption(GRID_EXPORT_ALL,'Todas','selected');
    		$Veirdybvfhkv->openOption(GRID_EXPORT_THIS,'Pagina Actual','');
    	
    		$Veirdybvfhkv->closeOption();
    		$Veirdybvfhkv->buildSelect();
    		 
    		$Vct1pgb4e5za = new Model_label();
			$Vct1pgb4e5za->setClass('control-label col-md-4 col-sm-4 col-xs-12');
    		$Vct1pgb4e5za->setFor(GRID_EXPORT_SELECT_ID);
    		$Vct1pgb4e5za->addElement('Selecciona las paginas');
    		$Vct1pgb4e5za->buildLabel();
    		
    		$V5gyudwgjyfr = new Model_div();
	        $V5gyudwgjyfr->setClass('form-group');
	      	$V5gyudwgjyfr->addElement($Vct1pgb4e5za->getLabel());
	      	
			$V5gyudwgjyfr_col = new Model_div();
			$V5gyudwgjyfr_col->setClass('col-md-6 col-sm-6 col-xs-12');
			$V5gyudwgjyfr_col->addElement($Veirdybvfhkv->getSelect());
			$V5gyudwgjyfr_col->buildDiv();
			
			$V5gyudwgjyfr->addElement($V5gyudwgjyfr_col->getDiv());
			$V5gyudwgjyfr->buildDiv();
			
			$Vtowlqx55h4o->addElement($V5gyudwgjyfr->getDiv());
    	
    		
    	
    		$Vrw3cseazbqi = $this->gRedirectForm();
    		 
    		$V30sjpyaynkq = base_url() . $this->PATH . "/engine?security=".base64_encode($this->mCrypt('toTemplate'));
    		 
    		$Vtowlqx55h4o->setAction($V30sjpyaynkq);
    		$Vtowlqx55h4o->setMethod('post');
    		$Vtowlqx55h4o->buildForm();
    		 
    		return $Vtowlqx55h4o->getForm();
    		
		}else{
			return "No hay templates";
		}
    	
    	
    }
    
    public function toTemplate($Vx21w2sesbf5){
    	
    	$Vup2s4iweeos = $this->getExtension($Vx21w2sesbf5['GRID_SELECT_TEMPLATE']);
    	
    	switch ($Vup2s4iweeos){
    		case 'docx':
    			$this->toWord($Vx21w2sesbf5);
    			break;
    		case 'xls':
    			$this->toExcel($Vx21w2sesbf5);
    			break;
    	}
    	
    }
    
    
    public function toWord($Vx21w2sesbf5){
		 
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
			$Vr34v15b45kj = array();
			$Vr34v15b45kj['error_csv'] = GRIDA000000008;
			echo json_encode($Vr34v15b45kj);
			exit;
    	}
    	
		
    	$Vonr0df11plf_grid_session = $Vx21w2sesbf5['name_grid_session'];
    	
    	unset($Vx21w2sesbf5['name_grid_session']);
    	
    	$Vibotl1q5g0p_var = $_SESSION['grid_session']['GridSession'.$Vonr0df11plf_grid_session];
    	
    	
    	
    	$Vzh11x4qzct4 = $Vibotl1q5g0p_var;
    	
    	unset($Vx21w2sesbf5['security']);
    	
    	
    	
    	
    	$Vw4xq1relazr = $this->dCrypt($Vzh11x4qzct4);
    	
    	
    	
    	
    	$Viwy41kuttrs = unserialize($Vw4xq1relazr);
    	
    	
    	
    	
    	$this->GGLOBAL = $Viwy41kuttrs->GGLOBAL;
    	$this->TABLE_NAME = $Viwy41kuttrs->TABLE_NAME;
    	$this->PROPERTIES = $Viwy41kuttrs->PROPERTIES;
    	$this->PATH = $Viwy41kuttrs->PATH;
    	$this->TITLE = $Viwy41kuttrs->TITLE;
    	$this->NAME_FORM = $Viwy41kuttrs->NAME_FORM ;
    	$this->ID = $Viwy41kuttrs->ID;
    	
			
		$Vcekyiohn0i4 = $Viwy41kuttrs->CONFIG_DB; 
	
		$this->select();
		 
		$Vyd4lo23gpo4 = $this->gResult();
		 
		if($Vx21w2sesbf5[GRID_EXPORT_SELECT_ID] == GRID_EXPORT_ALL){
			$Vt4jmd4a4vxq = $this->ID."GRID_QUERY_BEFORE_LIMIT";
			$Vpoae2jcihwa = $_SESSION[$Vt4jmd4a4vxq];
		}else{
			$Vt4jmd4a4vxq = $this->ID."GRID_QUERY";
			$Vpoae2jcihwa = $_SESSION[$Vt4jmd4a4vxq];
		}
		 
		unset($Vx21w2sesbf5[GRID_EXPORT_SELECT_ID]);
		 
		$this->setColumns($Vyd4lo23gpo4);
	
		$Vle3ldyht4v2 = new Model_engine_db($Vcekyiohn0i4);
		$Vi0oyq1lze1pData = $Vle3ldyht4v2->query($Vpoae2jcihwa);
		$Vle3ldyht4v2->__destruct();
		
		\PhpOffice\PhpWord\Autoloader::register();
		
		$Vbmk0kbqw3kk = new \PhpOffice\PhpWord\PhpWord();
		
		$Voozv1ce1z55Processor = $Vbmk0kbqw3kk->loadTemplate(APPPATH.'grid/templates/'.$Vx21w2sesbf5['GRID_SELECT_TEMPLATE']);
		 
		$Voozv1ce1z55Processor->setValue('title', htmlspecialchars($this->TITLE, ENT_COMPAT, 'UTF-8'));
		$Voozv1ce1z55Processor->setValue('date', htmlspecialchars(date('l F Y h:i:s A'), ENT_COMPAT, 'UTF-8'));
		
		$Voozv1ce1z55Processor->cloneRow('row_number', count($Vi0oyq1lze1pData));
		
		foreach ($Vi0oyq1lze1pData as $Vi0oyq1lze1pKey => $Vi0oyq1lze1pValue){
			$Voozv1ce1z55Processor->setValue("row_number#".($Vi0oyq1lze1pKey+1), htmlspecialchars(($Vi0oyq1lze1pKey+1), ENT_COMPAT, 'UTF-8'));
			foreach ($Vi0oyq1lze1pValue as $Vt4jmd4a4vxq => $Vllne4ankrll){
				$Voozv1ce1z55Processor->setValue($Vt4jmd4a4vxq."#".($Vi0oyq1lze1pKey+1), htmlspecialchars($Vllne4ankrll, ENT_COMPAT, 'UTF-8'));
			}
		}

		$Vrjwipdjiuqc = $this->ID.date('YmdhMs').'.docx';
		
		$Voozv1ce1z55Processor->saveAs(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc);
		
		$this->download_file($Vrjwipdjiuqc);
    
    }

    
    
    public function toExcel($Vx21w2sesbf5){
    	
		if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
			$Vr34v15b45kj = array();
			$Vr34v15b45kj['error_csv'] = GRIDA000000008;
			echo json_encode($Vr34v15b45kj);
			exit;
    	}
		
    	$Vonr0df11plf_grid_session = $Vx21w2sesbf5['name_grid_session'];
    	 
    	unset($Vx21w2sesbf5['name_grid_session']);
    	 
    	$Vibotl1q5g0p_var = $_SESSION['grid_session']['GridSession'.$Vonr0df11plf_grid_session];
    	 
    	
    	 
    	$Vzh11x4qzct4 = $Vibotl1q5g0p_var;
    	 
    	unset($Vx21w2sesbf5['security']);
    	 
    	 
    	
    	 
    	$Vw4xq1relazr = $this->dCrypt($Vzh11x4qzct4);
    	 
    	 
    	
    	 
    	$Viwy41kuttrs = unserialize($Vw4xq1relazr);
    	 
    	 
    	
    	 
    	$this->GGLOBAL = $Viwy41kuttrs->GGLOBAL;
    	$this->TABLE_NAME = $Viwy41kuttrs->TABLE_NAME;
    	$this->PROPERTIES = $Viwy41kuttrs->PROPERTIES;
    	$this->PATH = $Viwy41kuttrs->PATH;
    	$this->TITLE = $Viwy41kuttrs->TITLE;
    	$this->NAME_FORM = $Viwy41kuttrs->NAME_FORM ;
    	$this->ID = $Viwy41kuttrs->ID;
    	$this->TEMPLATES = $Viwy41kuttrs->TEMPLATES; 
    	
			
		$Vcekyiohn0i4 = $Viwy41kuttrs->CONFIG_DB; 
		
		$this->select();
		 
		$Vyd4lo23gpo4 = $this->gResult();
		 
		if($Vx21w2sesbf5[GRID_EXPORT_SELECT_ID] == GRID_EXPORT_ALL){
			$Vt4jmd4a4vxq = $this->ID."GRID_QUERY_BEFORE_LIMIT";
			$Vpoae2jcihwa = $_SESSION[$Vt4jmd4a4vxq];
		}else{
			$Vt4jmd4a4vxq = $this->ID."GRID_QUERY";
			$Vpoae2jcihwa = $_SESSION[$Vt4jmd4a4vxq];
		}
		 
		unset($Vx21w2sesbf5[GRID_EXPORT_SELECT_ID]);
		 
		$this->setColumns($Vyd4lo23gpo4);
		
		$Vle3ldyht4v2 = new Model_engine_db($Vcekyiohn0i4);
		$Vi0oyq1lze1pData = $Vle3ldyht4v2->query($Vpoae2jcihwa);
		$Vle3ldyht4v2->__destruct();
		
		PHPExcel_Autoloader::register();
		
		$Vullgvbrxj5w = PHPExcel_IOFactory::createReader('Excel5');
		$Vy4giw0u4jtt = $Vullgvbrxj5w->load(APPPATH.'grid/templates/'.$Vx21w2sesbf5['GRID_SELECT_TEMPLATE']);
		
		$Va1pjg0tjrve = new Model_engine_properties_template();
		$Va1pjg0tjrve->tProperties($Vx21w2sesbf5, $Vy4giw0u4jtt,$this->TEMPLATES);
		
		$Vv5rd02q4ds4 = 5;
		
		
		foreach($Vi0oyq1lze1pData as $V0v4hlilepq1 => $VdruamuofwxpRow) {
			$Vqnevr1zyszc = $Vv5rd02q4ds4 + $V0v4hlilepq1;
			$Vy4giw0u4jtt->getActiveSheet()->insertNewRowBefore($Vqnevr1zyszc,1);
			
			$Vy4giw0u4jtt->getActiveSheet()->setCellValue(PHPExcel_Cell::stringFromColumnIndex(0).$Vqnevr1zyszc,$VdruamuofwxpRow['RN']);
			
			unset($VdruamuofwxpRow['RN']);
			unset($VdruamuofwxpRow['CNT']);
			
			$Volg3rx0n3n0Index = 1;
			foreach ($VdruamuofwxpRow as $Vt4jmd4a4vxq => $Vllne4ankrll){
				$Vy4giw0u4jtt->getActiveSheet()->setCellValue(PHPExcel_Cell::stringFromColumnIndex($Volg3rx0n3n0Index).$Vqnevr1zyszc,$Vllne4ankrll);
				$Volg3rx0n3n0Index++;
			}
			
			$Va1pjg0tjrve->tOperation($Vx21w2sesbf5, $Vy4giw0u4jtt, $this->TEMPLATES, $Vqnevr1zyszc);
			
		}
		
		$Vnc5bzse5lur = PHPExcel_IOFactory::createWriter($Vy4giw0u4jtt, 'Excel5');
		
		$Vrjwipdjiuqc = $this->ID.date('YmdhMs').'.xls';
		
		$Vnc5bzse5lur->save(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc);
		
		$this->download_file($Vrjwipdjiuqc);
  
    	
    }
    
    
    
    private function getExtension($Vmfv3zpjqcic) {
    	$Vup2s4iweeosension = explode('.', $Vmfv3zpjqcic);
    	$Vup2s4iweeosension = array_pop($Vup2s4iweeosension);
    	return $Vup2s4iweeosension;
    }

	

	private function download_file($Vrjwipdjiuqc){
		
		$V4x0vbcaeswk= $this->getExtension($Vrjwipdjiuqc);		
    	
    	header('Content-Description: File Transfer');
		header("Content-Disposition: attachment; filename=$Vrjwipdjiuqc");
		header('Expires: 0');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc));
		header('Cache-Control: max-age=60, must-revalidate');
		header('Set-Cookie: fileDownload=true; path=/');
    	
    	switch ($V4x0vbcaeswk){
    		case 'docx':
				header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    			readfile(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc);
    			unlink(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc);
    			break;
    		case 'xls':
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    			readfile(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc);
    			unlink(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc);
    			break;
			case 'csv':
				header('Content-Encoding: UTF-8');
				header('Content-type: text/csv; charset=UTF-8');
				echo "\xEF\xBB\xBF";
    			readfile(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc);
    			unlink(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc);
    			break;
    		case 'pdf':
				header('Content-Type: application/octet-stream');
    			readfile(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc);
    			unlink(_GRID_PATH.'docs_temp/'.$Vrjwipdjiuqc);
    			break;
    	}
	}
    
	
    
     
    public function checkSession(){
    	if(!isset($_SESSION))
    		return false;
    	else if(!isset($_SESSION['grid_session'])) {
    			return false;
    	}else{
    		return true;
    	}
    }
	

}
?>