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
    var $PATH; /*sath grid*/
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
	
	public function sConfig_DB($Vpbbrp22rvlb){
		$this->CONFIG_DB = $Vpbbrp22rvlb;
	}
	
    public function sPATH($Vh2qtmbhfvhm){
        $this->PATH = $Vh2qtmbhfvhm;
    }
	
	public function sIdTable($Vfpm4243sqre){
        $this->ID = $Vfpm4243sqre;
    }
	
	public function sSERVERRUTE($V3sdxlgpbgww = 'serverProcessing'){
        $this->SERVERRUTE = $V3sdxlgpbgww;
    }

	 public function sTitle($Vasdbflliryo = 'Resultado'){
        $this->TITLE = $Vasdbflliryo;
    }
    
    public function showEXPORT($Vfuzax0ppa4r=true){
        $this->SHOW_EXPORT = $Vfuzax0ppa4r;
    }
    
    public function sRedirectForm($Vfugi3nbqhdo){
        $this->URL_REDIRECT_FORM = $Vfugi3nbqhdo;
    }
    
    public function gRedirectForm(){
        return $this->URL_REDIRECT_FORM;
    }
    
    public function setNameForm($Vzdqz3job4uh){
        $this->NAME_FORM = $Vzdqz3job4uh;
    }

    public function getNameForm(){
        return $this->NAME_FORM;
    }
    
    public function setHeight($Vtuukyoelheu = 400){
        $this->HEIGHT = $Vtuukyoelheu;
    }
    
    public function getHeight(){
        return $this->HEIGHT;
    }
    
    public function sTemplates($V1ko32vrh55h = array()){
    	$this->TEMPLATES = $V1ko32vrh55h;
    	$this->SHOW_TEMPLATE = true;
    }
    
    public function sIcons($Vxiapvs2znrm=true){
    	$this->ICON_TABLE_COLUMN = $Vxiapvs2znrm;
    }
    
    public function getFormButtonSubmit($Vrydytfuco1s){
    	return '<input type="submit" class="validador botonNormal" name="Submit'.$Vrydytfuco1s.'" rel="'.$Vrydytfuco1s.'" value="Guardar">';
    }
    
    public function setShowBackButton($V1ae3lzp2gpw= false){
    	$this->SHOW_BACK_BUTTON = $V1ae3lzp2gpw;
    	$this->VARS_GENERATE_PAGINATION_GRID = $_POST;
    }
    
    public function getShowBackButton(){
        return $this->SHOW_BACK_BUTTON;
    }
    
    public function setNameGridSession($Vrydytfuco1sGridSession){
        $this->NAME_GRID_SESSION = $Vrydytfuco1sGridSession;
    }
    
    public function showNEW($Vm3lrkdecbpw = true){
    	$this->SHOW_NEW = $Vm3lrkdecbpw;
    }
    
    public function showDELETE($Vm3lrkdecbpw = true){
    	$this->SHOW_DELETE = $Vm3lrkdecbpw;
    }
    
    public function showEDIT($Vm3lrkdecbpw = true){
    	$this->SHOW_EDIT = $Vm3lrkdecbpw;
    }
    
    public function sToggleBTN($V11anrn0x00j = true){
    	$this->SHOW_TOGGLEBTN = $V11anrn0x00j;
    }
    
    public function showCONTENT($Vm3lrkdecbpw = true,$Vvydfmgsfenm,$V4l1dgzu4dcd = 'Ver'){
    	$this->SHOW_CONTENT = $Vm3lrkdecbpw;
    	$this->SHOW_CONTENT_URL = $Vvydfmgsfenm;
    	$this->SHOW_CONTENT_TEXT = $V4l1dgzu4dcd;
    }
    
    public function showPOPUPCONTENT($Vm3lrkdecbpw = true,$Vvydfmgsfenm,$Vpnqehhiaw03 = 'Ver'){
    	$this->SHOW_POPUP_CONTENT = $Vm3lrkdecbpw;
    	$this->SHOW_POPUP_CONTENT_URL= $Vvydfmgsfenm;
    	$this->SHOW_POPUP_CONTENT_TEXT = $Vpnqehhiaw03;
    }
    
    
    
    public function prepareStack(){
         
        $V34r5jd5ws0f = basename ( "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" );
         
        $Vty3jumkfsw5 =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
         
        $_POST['URL'] = $Vty3jumkfsw5;
            
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
    
        if(!isset($_SESSION['grid_session']['flow'][$V34r5jd5ws0f]))
            $_SESSION['grid_session']['flow'][$V34r5jd5ws0f] = $_POST;
         
    }
	

	
    public function publishGridInSession($Vrydytfuco1s){
        
        $V1iojwdfuhax = $_SESSION;
         
        if(isset($V1iojwdfuhax['grid_session'])){
    
            $Vh11xlmpqmtl = $V1iojwdfuhax['grid_session'];
    
            $Vkrmtu54qj5r = count($Vh11xlmpqmtl);
    
            $Vrydytfuco1sGridSession = 'GridSession'.$Vrydytfuco1s;
    
            $Vh11xlmpqmtl[$Vrydytfuco1sGridSession] = $this->mCrypt(serialize($this));
    
            $_SESSION['grid_session'] = $Vh11xlmpqmtl;
    
        }else{
    
            $Vh11xlmpqmtl = array();
    
            $Vrydytfuco1sGridSession = 'GridSession'.$Vrydytfuco1s;
    
            $Vh11xlmpqmtl[$Vrydytfuco1sGridSession] = $this->mCrypt(serialize($this));
    
            $_SESSION['grid_session'] = $Vh11xlmpqmtl;
    
        }
        $this->setNameGridSession($Vrydytfuco1sGridSession);
         
    }
    
    
    
    private function cKey(){
        $Vca0kg4ix2od = new Model_password_hash();
        $Vsqvpkzrijnu = $Vca0kg4ix2od->create_hash('i82dtmg41');
        
        
    }
    
    
    
    private function mCrypt($Vftg0uaqbpln = 'ejemplo'){
         
        $Vsqvpkzrijnu = 'hUgpOw2IgnPms1PFHU2I/v5vPgk4UwDr';
         
        $Veahlyf3k1e3 = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $Vbj1bft5etzr = mcrypt_create_iv($Veahlyf3k1e3, MCRYPT_RAND);
         
        $Vtvjlpgxi1gm = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $Vsqvpkzrijnu,$Vftg0uaqbpln, MCRYPT_MODE_CBC, $Vbj1bft5etzr);
         
        $Vtvjlpgxi1gm = $Vbj1bft5etzr . $Vtvjlpgxi1gm;
         
        $Vtvjlpgxi1gm_base64 = base64_encode($Vtvjlpgxi1gm);
         
        return $Vtvjlpgxi1gm_base64;
         
    }
    
    
    
    private function dCrypt($Vtvjlpgxi1gm_base64){
         
        $Vsqvpkzrijnu = 'hUgpOw2IgnPms1PFHU2I/v5vPgk4UwDr';
         
        $Veahlyf3k1e3 = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
         
        $Vtvjlpgxi1gm_dec = base64_decode($Vtvjlpgxi1gm_base64);
         
        $Vbj1bft5etzr_dec = substr($Vtvjlpgxi1gm_dec, 0, $Veahlyf3k1e3);
         
        $Vtvjlpgxi1gm_dec = substr($Vtvjlpgxi1gm_dec, $Veahlyf3k1e3);
         
        $Vftg0uaqbpln_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $Vsqvpkzrijnu,$Vtvjlpgxi1gm_dec, MCRYPT_MODE_CBC, $Vbj1bft5etzr_dec);
         
        return $Vftg0uaqbpln_dec;
    }
    
    
    public function buildFlex($Vrydytfuco1s){
        $Vonowv0ypcsr = array('colModel' => array());
		
        $this->where('ROWNUM<=1');
            
        if(!$this->ERRORSQL){
            $this->select();
            
            $V4ozid1iwarh = $this->gResult();
		
            if(!empty($V4ozid1iwarh)){
                
                $this->setColumns($V4ozid1iwarh);
                
                if($this->SHOW_POPUP_CONTENT)
                    $Vonowv0ypcsr['colModel'][] = array('display' => $this->SHOW_POPUP_CONTENT_TEXT ,'name'=> 'ver','width'=>100,'sortable'=>false,'align'=>'left');
                if($this->SHOW_CONTENT)
                    $Vonowv0ypcsr['colModel'][] = array('display' => $this->SHOW_CONTENT_TEXT ,'name'=> 'ver','width'=>100,'sortable'=>false,'align'=>'left');
                if($this->SHOW_DELETE)
                    $Vonowv0ypcsr['colModel'][] = array('display' => 'Eliminar','name'=> 'delete','width'=>50,'sortable'=>false,'align'=>'left');
                if($this->SHOW_EDIT)
                    $Vonowv0ypcsr['colModel'][] = array('display' => 'Editar','name'=> 'edit','width'=>50,'sortable'=>false,'align'=>'left');
                
                foreach ($this->ARRAYCOLUMNS as $Vsqvpkzrijnu => $Vtuukyoelheu){
                    
                    $Vobu1vvix22l = false;
                        
                    $Vobu1vvix22l = $Vtuukyoelheu->hide_column;
                    
                    $Vra4y3zkahqc = $Vtuukyoelheu->max_length_column;
                   
                    $Vy0fskyofo2r = $Vtuukyoelheu->display_front_end;
                    
                    $Vtgrm3jn2sov = $Vtuukyoelheu->alias;
                    
                    $Vonowv0ypcsr['colModel'][] = array('display' => $Vy0fskyofo2r,'name'=>$Vtgrm3jn2sov ,'width'=>$Vra4y3zkahqc,'sortable'=>true,'align'=>'left','hide'=>$Vobu1vvix22l);
                    
                    if(!$Vobu1vvix22l)
                        $Vonowv0ypcsr['searchitems'][] = array('display' => $Vy0fskyofo2r,'name'=> $Vsqvpkzrijnu);
                    
                }
                
                $Vplqjbv13kh1 = 'doCommand';
                
                if(!$this->SHOW_TOGGLEBTN)
                    $Vf3f3j435ort = 'showToggleBtn: false,';
                else
                    $Vf3f3j435ort = '';
                    
                $Vonowv0ypcsr['buttons'][] = array('name'=>'Nuevo','bclass'=>'add','onpress'=>$Vplqjbv13kh1);
                
                $Vvydfmgsfenm = base_url($this->PATH.'/'.$this->SERVERRUTE);
                $Vg11tzrdagmb = '$("#'.$Vrydytfuco1s.'").flexigrid({'.$Vf3f3j435ort.'url:"'.$Vvydfmgsfenm.'",dataType:"json",grid_name:"'.$Vrydytfuco1s.'",';
                $Vg11tzrdagmb.= 'colModel:'.json_encode($Vonowv0ypcsr['colModel']);
                
                if(isset($Vonowv0ypcsr['searchitems']))
                    $Vg11tzrdagmb.= ',searchitems:'.json_encode($Vonowv0ypcsr['searchitems']);
                
                $Vg11tzrdagmb.= $this->gButtonsFlex();
                    
                $Vg11tzrdagmb.= ',showTableToggleBtn: true,title: "'.$this->TITLE.'",useRp: true,rp: 20,resizable: true,singleSelect: true,usepager: true,height:'.$this->getHeight().',usepager: true});';
                    
                $Vl5dywbjbf34 = 'var form = $(\'<form action = "'.base_url($this->PATH."/engine?security=".base64_encode($this->mCrypt('create'))).'" id="'.'create'.$this->ID.'" method="post"><input type="hidden" name="name_grid_session" id="name_grid_session" value="'.$this->ID.'"/></form>\'); $(\'body\').append(form); target_popup'.$this->ID.'(document.forms["create'.$this->ID.'"]);  $( "#create'.$this->ID.'" ).remove(); ';
                    
                $Vl5dywbjbf34Export = 'var formExport = $(\'<form action = "'.base_url($this->PATH."/engine?security=".base64_encode($this->mCrypt('export'))).'" id="'.'export'.$this->ID.'" method="post"><input type="hidden" name="name_grid_session" id="name_grid_session" value="'.$this->ID.'"/></form>\'); $(\'body\').append(formExport); target_popupExport'.$this->ID.'(document.forms["export'.$this->ID.'"]);  $( "#export'.$this->ID.'" ).remove(); ';
                
                $Vl5dywbjbf34Template = 'var formTemplate = $(\'<form action = "'.base_url($this->PATH."/engine?security=".base64_encode($this->mCrypt('template'))).'" id="'.'template'.$this->ID.'" method="post"><input type="hidden" name="name_grid_session" id="name_grid_session" value="'.$this->ID.'"/></form>\'); $(\'body\').append(formTemplate); target_popupTemplate'.$this->ID.'(document.forms["template'.$this->ID.'"]);  $( "#template'.$this->ID.'" ).remove(); ';
                    
                $Voew0htgcevj = 'function doCommand(com,grid){'.$Vl5dywbjbf34.'}';
                    
                $Voew0htgcevjExport = 'function doCommandExport(com,grid){'.$Vl5dywbjbf34Export.'}';
                
                $Voew0htgcevjTemplate = 'function doCommandTemplate(com,grid){'.$Vl5dywbjbf34Template.'}';
                    
                return $Vg11tzrdagmb.$Voew0htgcevj.$Voew0htgcevjExport.$Voew0htgcevjTemplate;
            
            }else{
                $this->ERROR_CODE[] = sprintf(GRIDA000000003);
            }
            
        }else{
            $this->ERROR_CODE[] = sprintf(GRIDA000000003);
        }
            
    }
    
    public function gButtonsFlex(){
        $Vpnl1mepueyp = ',buttons:[';
        if($this->SHOW_NEW){
            $Vpnl1mepueyp.='{name:"Nuevo",bclass:"add",onpress:doCommand},';
        }
           
        if($this->SHOW_EXPORT){
            $Vpnl1mepueyp.='{name:"Exportar",bclass:"excel",onpress:doCommandExport},';
        }
        
        if($this->SHOW_TEMPLATE){
        	$Vpnl1mepueyp.='{name:"Template",bclass:"template",onpress:doCommandTemplate,id:"'.GRID.$this->ID.'_btn_template"},';
        }
		
		if(!$this->SHOW_NEW && !$this->SHOW_EXPORT && !$this->SHOW_TEMPLATE)
		$Vpnl1mepueyp.='[';     
        
        $Vpnl1mepueyp = substr($Vpnl1mepueyp, 0, -1);
        
        $Vpnl1mepueyp.=']';
        return $Vpnl1mepueyp;
    }
    
    
    
    public function setColumns($Vierqcanr30f){

        

        $this->setArrayColumns($Vierqcanr30f['general']['COLUMNS']);
        
        
        
        $this->setColumnsComplement();
    }
    
    
    
    private function setArrayColumns($Vggzuhqphgjp){
        foreach ($Vggzuhqphgjp as $Vsqvpkzrijnu => $Vzzxs3bmzdiy){
            if(!$Vzzxs3bmzdiy->catalog){
            	if($Vzzxs3bmzdiy->editable){
               	   $this->ARRAYCOLUMNS[$Vsqvpkzrijnu] = $Vzzxs3bmzdiy;
            	}
            }
        }
    }
    
    public function setColumnsComplement(){
        if(isset($this->COLUMNS_NAME_COMPLEMENT))
	        foreach ($this->COLUMNS_NAME_COMPLEMENT as $Vsqvpkzrijnu => $VtuukyoelheuC){
        	   $VtuukyoelheuC->only_info = true;
	           $this->ARRAYCOLUMNS[$Vsqvpkzrijnu] = $VtuukyoelheuC;
            }       
    }
    
    
    
    private function gNTableNoValidations($Vkshurr04zcw){
        $Vewe1mi3liav = $this->field_data($Vkshurr04zcw);
        return $Vewe1mi3liav;
    }
    
    
     
    public function buildTable($Vrydytfuco1s){
        $this->publishGridInSession($Vrydytfuco1s);
        $Vfbxx2lgtibg = new Model_table();
        $Vfbxx2lgtibg->setId($Vrydytfuco1s);
        $Vfbxx2lgtibg->buildTable();
        $Vaw1cv3gnncr = $Vfbxx2lgtibg->getTable();
        return $Vaw1cv3gnncr;
    }
    

    
    
    public function serverProcessing($V2egiq4cymod){
    
    	$V2egiq4cymod['iDisplayStart'] = (( $V2egiq4cymod['page'] - 1 ) * $V2egiq4cymod['rp']);
        $V2egiq4cymod['iDisplayLength'] = $V2egiq4cymod['page'] * $V2egiq4cymod['rp'];
    
        if ( isset( $V2egiq4cymod['iDisplayStart'] ) && $V2egiq4cymod['iDisplayLength'] != '-1' ){
            $this->rowNum(($V2egiq4cymod['iDisplayStart']+1),($V2egiq4cymod['iDisplayLength']));
        }
    
        $Vkok3lpmyliy = "";
            
        if ( isset( $V2egiq4cymod['sortname'] ) && strlen(trim($V2egiq4cymod['sortname']))>0  && trim($V2egiq4cymod['sortname'])!='undefined'){
            $Vkok3lpmyliy = "ORDER BY  ";
            $Vkok3lpmyliy .= $V2egiq4cymod['sortname'];
    
            if(isset($V2egiq4cymod['sortorder']) && strlen(trim($V2egiq4cymod['sortorder']))>0 && trim($V2egiq4cymod['sortorder'])!='undefined'){
                $Vkok3lpmyliy.= " " .$V2egiq4cymod['sortorder'];
            }
    
            if ( $Vkok3lpmyliy == "ORDER BY  " )
            {
                $Vkok3lpmyliy = "";
            }
    
        }
            
        $Vwse4asus4tk = array();
            
        if(isset($V2egiq4cymod['qtype']) && is_array($V2egiq4cymod['qtype'])){
            if(isset( $V2egiq4cymod['qtype']) && count($V2egiq4cymod['qtype'])>0){
                if(isset( $V2egiq4cymod['query']) && count($V2egiq4cymod['query'])>0){
    
                    for($Vbje1pofprtg = 0;$Vbje1pofprtg<count($V2egiq4cymod['query']);$Vbje1pofprtg++){
                        if(is_array($V2egiq4cymod['qtype'][$Vbje1pofprtg])){
                            $V2egiq4cymod['qtype'][$Vbje1pofprtg]['values'] = $V2egiq4cymod['query'][$Vbje1pofprtg];
                            $Vwse4asus4tk['qtype_logical_expresion'][] = $V2egiq4cymod['qtype'][$Vbje1pofprtg];
                            unset($V2egiq4cymod['qtype'][$Vbje1pofprtg]);
                        }else{
                            $Vrncxg123zuc = $V2egiq4cymod['qtype'][$Vbje1pofprtg];
                            $Vouy5qg4x3p0 = $V2egiq4cymod['query'][$Vbje1pofprtg];
                            $Vwse4asus4tk[$Vrncxg123zuc] = $Vouy5qg4x3p0;
                        }
                    }
                }
            }
        }else{
            if(isset( $V2egiq4cymod['qtype']) && strlen(trim($V2egiq4cymod['qtype']))>0){
                if(isset( $V2egiq4cymod['query']) && strlen(trim($V2egiq4cymod['query']))>0){
                    $Vwse4asus4tk[$V2egiq4cymod['qtype']] = $V2egiq4cymod['query'];
                }
            }
        }
    
        $this->order($Vkok3lpmyliy);
            
        $this->select($Vwse4asus4tk);
    
        $V4ozid1iwarh = $this->gResult();
    
        
    
       
        
        $Vouy5qg4x3p0 = $V4ozid1iwarh['general']['select'];
      
        $_SESSION[$this->ID.'GRID_QUERY'] = $Vouy5qg4x3p0;
            
        $_SESSION[$this->ID.'GRID_QUERY_BEFORE_LIMIT'] = $V4ozid1iwarh['general']['select_before_limit'];
            
        $Vbje1pofprtgData = $this->DB->query($Vouy5qg4x3p0);
            
			
		if(!is_array($Vbje1pofprtgData)){
				 $Vbje1pofprtgData = array();
		}
			
		$Vbje1pofprtgFilteredTotal = count($Vbje1pofprtgData);
    
        
        
        $Vouy5qg4x3p0 = $V4ozid1iwarh['general']['count'];
    
            
        $Vwyg5jr3xz3j = $this->DB->query($Vouy5qg4x3p0);
        
		if(is_array($Vwyg5jr3xz3j)){
			$Vwyg5jr3xz3j = $Vwyg5jr3xz3j[0]['COUNT'];
            $Vbje1pofprtgTotal = $Vwyg5jr3xz3j;
		}else{
			$Vwyg5jr3xz3j = 0;
            $Vbje1pofprtgTotal = $Vwyg5jr3xz3j;
		}
			
        
    
        $Vhh3votbzecp = array(
                "total" => $Vbje1pofprtgTotal,
                "page"=>$V2egiq4cymod['page'],
                "rows" => array()
        );
            
        $Vhh3votbzecp = $this->buildRow($Vbje1pofprtgData, $Vhh3votbzecp);
            
        return $Vhh3votbzecp;
    }
    
    
    
    
    
    public function buildRow($Vbje1pofprtgData,$Vhh3votbzecp){
        if(!empty($Vbje1pofprtgData))
        foreach ($Vbje1pofprtgData as $Vbje1pofprtgValue){
            $Vbpa24lhhe1u = array();
            if($this->SHOW_EDIT)
                array_unshift($Vbje1pofprtgValue,$this->buildLink($Vbje1pofprtgValue,'edit'));
            if($this->SHOW_DELETE)
                array_unshift($Vbje1pofprtgValue,$this->buildLink($Vbje1pofprtgValue,'delete'));
            if($this->SHOW_CONTENT)
                array_unshift($Vbje1pofprtgValue,$this->buildLink($Vbje1pofprtgValue,'content'));
            if($this->SHOW_POPUP_CONTENT)
                array_unshift($Vbje1pofprtgValue,$this->buildLink($Vbje1pofprtgValue,'popup_content'));
    
            foreach ($Vbje1pofprtgValue as $Vsqvpkzrijnu => $Vzzxs3bmzdiy){
                    
                
                
                $V4n2do0p3if4 = explode('.', $Vsqvpkzrijnu);
                $Vngpnyeof5xx = array_pop($V4n2do0p3if4);
                
                
                
                
                    
                $Vbpa24lhhe1u[] = $Vzzxs3bmzdiy;
            }
    
            $Vhh3votbzecp['rows'][] = array('cell'=>$Vbpa24lhhe1u);
        }
        else{
            $Vhh3votbzecp['rows'][] = array();
        }
            
        return $Vhh3votbzecp;
    }
    
    
    
    public function buildLink($Vbje1pofprtgValue,$Vimvgps4b51o){
        unset($Vbje1pofprtgValue['RNUM']);
    
        
    
        if($Vimvgps4b51o == 'edit')
            $Vvydfmgsfenm =  base_url() . $this->PATH . "/engine?security=".base64_encode($this->mCrypt('edit')) ;
        else if($Vimvgps4b51o == 'delete')
            $Vvydfmgsfenm =  base_url() . $this->PATH . "/engine?security=".base64_encode($this->mCrypt('delete'));
        else if($Vimvgps4b51o == 'content')
            $Vvydfmgsfenm =  base_url() . $this->SHOW_CONTENT_URL;
        else if($Vimvgps4b51o == 'popup_content')
            $Vvydfmgsfenm =  base_url() . $this->SHOW_POPUP_CONTENT_URL;
    
        $Vacnlf34red2 = new Model_a_post();
        $Vacnlf34red2->setAction($Vvydfmgsfenm);
        $Vacnlf34red2->setMethod('post');
    
        if($Vimvgps4b51o == 'edit'){
            $Vacnlf34red2->addElement($this->gElementImgText($Vimvgps4b51o));
            $Vacnlf34red2->setOnclick('target_popup'.$this->ID.'(parentNode)');
        } else if($Vimvgps4b51o == 'delete'){
            $Vacnlf34red2->addElement($this->gElementImgText($Vimvgps4b51o));
            $Vacnlf34red2->setOnclick('target_popupDelete'.$this->ID.'(parentNode);');
        }else if($Vimvgps4b51o == 'content'){
            $Vacnlf34red2->addElement($this->SHOW_CONTENT_TEXT);
            $Vacnlf34red2->setOnclick('show_content'.$this->ID.'(parentNode)');
        }else if($Vimvgps4b51o == 'popup_content'){
            $Vacnlf34red2->addElement($this->SHOW_POPUP_CONTENT_TEXT);
            $Vacnlf34red2->setOnclick('target_popupPOPUPCONTENT'.$this->ID.'(parentNode)');
        }
        
        

        if(isset($this->TABLE_NAME['general']['FOREIGN_KEY']) || isset($this->TABLE_NAME['general']['PRIMARY_KEY'])){
            if(isset($this->TABLE_NAME['general']['FOREIGN_KEY'])){
                foreach ($this->TABLE_NAME['general']['FOREIGN_KEY'] as $Vsqvpkzrijnu => $Vtuukyoelheu){
                    $Vsqvpkzrijnu = $this->gNameColumn($Vsqvpkzrijnu);
                    if(isset($Vbje1pofprtgValue[$Vsqvpkzrijnu])){
                        $Vbje1pofprtgnput = new Model_input();
                        $Vbje1pofprtgnput->setType('hidden');
                        $Vbje1pofprtgnput->setName($Vsqvpkzrijnu);
                        $Vbje1pofprtgnput->setValue($Vbje1pofprtgValue[$Vsqvpkzrijnu]);
                        $Vbje1pofprtgnput->buildInput();
                        $Vacnlf34red2->addInput($Vbje1pofprtgnput->getInput());
                    }
                    
                }
            }
            
            if(isset($this->TABLE_NAME['general']['PRIMARY_KEY'])){
                foreach ($this->TABLE_NAME['general']['PRIMARY_KEY'] as $Vsqvpkzrijnu => $Vtuukyoelheu){
                    $Vsqvpkzrijnu = $this->gNameColumn($Vsqvpkzrijnu);
                    if(isset($Vbje1pofprtgValue[$Vsqvpkzrijnu])){
                        $Vbje1pofprtgnput = new Model_input();
                        $Vbje1pofprtgnput->setType('hidden');
                        $Vbje1pofprtgnput->setName($Vsqvpkzrijnu);
                        $Vbje1pofprtgnput->setValue($Vbje1pofprtgValue[$Vsqvpkzrijnu]);
                        $Vbje1pofprtgnput->buildInput();
                        $Vacnlf34red2->addInput($Vbje1pofprtgnput->getInput());
                    }
                    
                }
            }
        }
        
        
    
        $Vbje1pofprtgnput = new Model_input();
        $Vbje1pofprtgnput->setType('hidden');
        $Vbje1pofprtgnput->setName('name_grid_session');
        $Vbje1pofprtgnput->setValue($this->ID);
        $Vbje1pofprtgnput->buildInput();
        $Vacnlf34red2->addInput($Vbje1pofprtgnput->getInput());
    
        $Vacnlf34red2->buildA_post();
        return $Vacnlf34red2->getA_post();
    }
    
    
    
    private function gElementImgText($Vimvgps4b51o){
    	if($this->ICON_TABLE_COLUMN){
    		if($Vimvgps4b51o == 'delete')
    			return '<center><img src="'.base_url('css/grid/images/g_rec.gif').'"></img></center>';
    		else if($Vimvgps4b51o == 'edit'){
    			return '<center><img src="'.base_url('css/grid/images/gtk_edit.png').'"></img></center>';
    		}
    	}else{
    		if($Vimvgps4b51o == 'delete')
    			return "Eliminar";
    		else if($Vimvgps4b51o == 'edit'){
    			return "Editar";
    		}
    	}
    }
    
    
    
    public function export($Vrp2hm121vad){

    	
    	 
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
    	
    	$Vrydytfuco1s_grid_session = $Vrp2hm121vad['name_grid_session'];
    
    	$Vh11xlmpqmtl_var = $_SESSION['grid_session']['GridSession'.$Vrydytfuco1s_grid_session];
    
    	
    
    	$Vbtkyqv2h4td = $Vh11xlmpqmtl_var;
    
    	unset($Vrp2hm121vad['security']);
    
    	 
    	
    
    	$Vvni2ohingsp = $this->dCrypt($Vbtkyqv2h4td);
    
    
    	
    
    	$Viyqurj5dafb = unserialize($Vvni2ohingsp);
    
    	
    	$this->GGLOBAL = $Viyqurj5dafb->GGLOBAL;
    	$this->TABLE_NAME = $Viyqurj5dafb->TABLE_NAME;
    	$this->PROPERTIES = $Viyqurj5dafb->PROPERTIES;
    	$this->PATH = $Viyqurj5dafb->PATH;
    	$this->TITLE = $Viyqurj5dafb->TITLE;
    	$this->NAME_FORM = $Viyqurj5dafb->NAME_FORM ;
    	$this->ID = $Viyqurj5dafb->ID;
    	
			
		$Vpbbrp22rvlb = $Viyqurj5dafb->CONFIG_DB; 
		
		$this->select();
    
    	$V4ozid1iwarh = $this->gResult();
    	 
    	
    
    	$this->setColumns($V4ozid1iwarh);
    		
    	return $this->gFormExport($Vrydytfuco1s_grid_session,$V4ozid1iwarh,$Vpbbrp22rvlb);
    }
    
    
    

    private function gFormExport($Vrydytfuco1s_grid_session,$V4ozid1iwarh,$Vpbbrp22rvlb){
    		
			
		if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
			
		$Vl5dywbjbf34 = new Model_form();
		$Vl5dywbjbf34->setId($this->getNameForm());
		$Vsebw4s4c0aq = new Model_div();
		$Vsebw4s4c0aq->setClass('module_content');

		$Vsqvpkzrijnu = $this->ID."GRID_QUERY_BEFORE_LIMIT";

		$Vouy5qg4x3p0 = $_SESSION[$Vsqvpkzrijnu];

		$Vouy5qg4x3p0 = $this->rewriteQuery($Vouy5qg4x3p0);

		$Vi5mjeqfhbmz = new Model_engine_db($Vpbbrp22rvlb);

		$Vlzkmrx35wpz = $Vi5mjeqfhbmz->query_field_name($Vouy5qg4x3p0);
		
		$Vi5mjeqfhbmz->__destruct();   
		   
		foreach ($this->ARRAYCOLUMNS as $Vsqvpkzrijnu => $VtuukyoelheuC){
			if(!$VtuukyoelheuC->is_hidden)
			if(in_array($VtuukyoelheuC->alias, $Vlzkmrx35wpz)){
				$V1j05kn14czd = $this->gElementFormExport($Vsqvpkzrijnu,$VtuukyoelheuC);
				$Vsebw4s4c0aq->addelement($V1j05kn14czd);
			}
			
		}
		
		$Vsebw4s4c0aq->buildDiv();
			
		$Vl5dywbjbf34->addElement($Vsebw4s4c0aq->getDiv());
			
		$Vbje1pofprtgnput = new Model_input();
		$Vbje1pofprtgnput->setType('hidden');
		$Vbje1pofprtgnput->setId('name_grid_session');
		$Vbje1pofprtgnput->setName('name_grid_session');
		$Vbje1pofprtgnput->setValue($Vrydytfuco1s_grid_session);
			
		$Vbje1pofprtgnput->buildInput();
		$Vl5dywbjbf34->addElement($Vbje1pofprtgnput->getInput());

		

		$V4xw1mlrznbm = new Model_select();
			
		$V4xw1mlrznbm->setId(GRID_EXPORT_SELECT_ID);
		$V4xw1mlrznbm->setName(GRID_EXPORT_SELECT_ID);
			
		$V4xw1mlrznbm->openOption(GRID_EXPORT_ALL,'Todas','selected');
		$V4xw1mlrznbm->openOption(GRID_EXPORT_THIS,'Pagina Actual','');

		$V4xw1mlrznbm->closeOption();
		$V4xw1mlrznbm->buildSelect();
			
		$Vcma4so0ytne = new Model_label();
		$Vcma4so0ytne->setFor(GRID_EXPORT_SELECT_ID);
		$Vcma4so0ytne->addElement('Selecciona las paginas');
		$Vcma4so0ytne->buildLabel();
		
        $Vfbxx2lgtibg = new Model_table_form();
        $Vfbxx2lgtibg->setId($this->getNameForm());
		$Vfbxx2lgtibg->setClass("tableform");
		$Vfbxx2lgtibg->setStyle("width:100%");
		$Vfbxx2lgtibg->newTd($Vcma4so0ytne->getLabel(),"50%",'');
		$Vfbxx2lgtibg->newTd($V4xw1mlrznbm->getSelect(),"50%",'');
		$Vfbxx2lgtibg->buildTable();
		
		$Vl5dywbjbf34->addElement($Vfbxx2lgtibg->getTable());
	
    	$Vcma4so0ytne_format = new Model_label();
		$Vcma4so0ytne_format->addElement('Formato:');
		$Vcma4so0ytne_format->buildLabel();
		
		
		
		$Vbje1pofprtgmage_pdf=new Model_input();
		$Vbje1pofprtgmage_pdf->setType('image');
		$Vbje1pofprtgmage_pdf->setSrc(base_url().'imagenes/pdf_icono.png');
		$Vbje1pofprtgmage_pdf->setId('pdf');
		$Vbje1pofprtgmage_pdf->setClass('img');
		$Vvydfmgsfenm = base_url() . $this->PATH ."/engine?security=".base64_encode($this->mCrypt('pdf'));
		$Vbje1pofprtgmage_pdf->setFormaction($Vvydfmgsfenm);
		$Vbje1pofprtgmage_pdf->buildInput();
		
		$Vbje1pofprtgmage_excel=new Model_input();
		$Vbje1pofprtgmage_excel->setType('image');
		$Vbje1pofprtgmage_excel->setSrc(base_url().'imagenes/excel_icono.png');
		$Vbje1pofprtgmage_excel->setId('csv');
		$Vbje1pofprtgmage_excel->setClass('img');
		$Vvydfmgsfenm = base_url() . $this->PATH ."/engine?security=".base64_encode($this->mCrypt('csv'));
		$Vbje1pofprtgmage_excel->setFormaction($Vvydfmgsfenm);
		$Vbje1pofprtgmage_excel->buildInput();
		
        $Vfbxx2lgtibg = new Model_table_form();
        $Vfbxx2lgtibg->setId($this->getNameForm());
		$Vfbxx2lgtibg->setClass("tableform");
		$Vfbxx2lgtibg->setStyle("width:100%");
		$Vfbxx2lgtibg->newTd($Vcma4so0ytne_format->getLabel(),"50%",'');
		
		if($_POST['showPDF'.$this->ID]<102){
			$Vfbxx2lgtibg->newTd($Vbje1pofprtgmage_pdf->getInput(),"25%","left");
			$Vfbxx2lgtibg->newTd($Vbje1pofprtgmage_excel->getInput(),"25%","left");
		}
		else{
			$Vfbxx2lgtibg->newTd($Vbje1pofprtgmage_excel->getInput(),"50%","center");
		}
		
		$Vfbxx2lgtibg->buildTable();
		
		$Vl5dywbjbf34->addElement($Vfbxx2lgtibg->getTable());
	
	

		

		$Vo02dtmzrph2 = $this->gRedirectForm();
			
		$Vl5dywbjbf34->setMethod('post');
		$Vl5dywbjbf34->buildForm();
			
		return $Vl5dywbjbf34->getForm();
    	
    }
    
    
    
    private function gElementFormExport($Vsqvpkzrijnu,$Vsmh3spbnj12){
    	$Vcma4so0ytne = new Model_label();
    	$Vcma4so0ytne->setFor($Vsqvpkzrijnu);
    	$Vcma4so0ytne->addElement($Vsmh3spbnj12->display_front_end);
    	$Vcma4so0ytne->buildLabel();
    
    
    	$Vbje1pofprtgnput = new Model_input();
    	$Vbje1pofprtgnput->setType('checkbox');
    	$Vbje1pofprtgnput->setId($Vsqvpkzrijnu);
    	$Vbje1pofprtgnput->setName($Vsqvpkzrijnu);
		$Vbje1pofprtgnput->setChecked();
    
    	$Vbje1pofprtgnput->buildInput();
      
	    $Vfbxx2lgtibg = new Model_table_form();
        $Vfbxx2lgtibg->setId($this->getNameForm());
		$Vfbxx2lgtibg->setClass("tableform");
		$Vfbxx2lgtibg->setStyle("width:100%");
		$Vfbxx2lgtibg->newTd($Vcma4so0ytne->getLabel(),"50%",'');
		$Vfbxx2lgtibg->newTd($Vbje1pofprtgnput->getInput(),"50%","center");
		$Vfbxx2lgtibg->buildTable();
		
		return $Vfbxx2lgtibg->getTable();
    }
	
	
	
    
  	public function pdf($Vrp2hm121vad){
  		
		if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
			$V5iamlredcl1['error_pdf'] = GRIDA000000008;
			echo json_encode($V5iamlredcl1);
			exit;
    	}	
    	
    	$Vrydytfuco1s_grid_session = $Vrp2hm121vad['name_grid_session'];
    
    	unset($Vrp2hm121vad['name_grid_session']);
    
    	$Vh11xlmpqmtl_var = $_SESSION['grid_session']['GridSession'.$Vrydytfuco1s_grid_session];
    
    	
    
    	$Vbtkyqv2h4td = $Vh11xlmpqmtl_var;
    
    	unset($Vrp2hm121vad['security']);
    
    	 
    	
    
    	$Vvni2ohingsp = $this->dCrypt($Vbtkyqv2h4td);
    
    
    	
    
    	$Viyqurj5dafb = unserialize($Vvni2ohingsp);
    		
    		
    	
    	 
    	$this->GGLOBAL = $Viyqurj5dafb->GGLOBAL;
    	$this->TABLE_NAME = $Viyqurj5dafb->TABLE_NAME;
    	$this->PROPERTIES = $Viyqurj5dafb->PROPERTIES;
    	$this->PATH = $Viyqurj5dafb->PATH;
    	$this->TITLE = $Viyqurj5dafb->TITLE;
    	$this->NAME_FORM = $Viyqurj5dafb->NAME_FORM ;
    	$this->ID = $Viyqurj5dafb->ID;
    	
		
			
		$Vpbbrp22rvlb = $Viyqurj5dafb->CONFIG_DB; 
	
		$this->select();
			
		$V4ozid1iwarh = $this->gResult();
			
		if($Vrp2hm121vad[GRID_EXPORT_SELECT_ID] == GRID_EXPORT_ALL){
			$Vsqvpkzrijnu = $this->ID."GRID_QUERY_BEFORE_LIMIT";
			$Vouy5qg4x3p0 = $_SESSION[$Vsqvpkzrijnu];
		}else{
			$Vsqvpkzrijnu = $this->ID."GRID_QUERY";
			$Vouy5qg4x3p0 = $_SESSION[$Vsqvpkzrijnu];
		}
			
		unset($Vrp2hm121vad[GRID_EXPORT_SELECT_ID]);
			
		$this->setColumns($V4ozid1iwarh);

		$Vi5mjeqfhbmz = new Model_engine_db($Vpbbrp22rvlb);

      	$Vbapkhaziza3 = query_to_export($Vi5mjeqfhbmz,$Vouy5qg4x3p0,TRUE,$this->ARRAYCOLUMNS,$Vrp2hm121vad);
		
		$Vi5mjeqfhbmz->__destruct();
		
		
		$Viuqktblekbp=new mPDF('','Legal','','', 15, 15, 24, 20, 5,4);
		$Viuqktblekbp->AddPage('L');
		$Veywdwqcob0x = file_get_contents(APPPATH.'../css/table_pdf.css');
		$Viuqktblekbp->WriteHTML($Veywdwqcob0x,1);
		
		$Vwjydkuzzvz4 = '<table>';
		foreach ($Vbapkhaziza3 as $Vbje1pofprtgKey => $Vbje1pofprtgValue){
			$Vwjydkuzzvz4.='<tr>';
			foreach ($Vbje1pofprtgValue as $Vsqvpkzrijnu => $Vtuukyoelheu){
				$Vwjydkuzzvz4.='<td>'.$Vtuukyoelheu.'</td>';
			}
			$Vwjydkuzzvz4.='</tr>';
		}
		$Vwjydkuzzvz4.='</table>';
		$Viuqktblekbp->WriteHTML($Vwjydkuzzvz4,2);

		$Vojxlzliaqvj = $this->ID.date('YmdhMs').'.pdf';
		
		$Viuqktblekbp->Output(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj);	

		$this->download_file($Vojxlzliaqvj);
		
    }
    
    
    
    
    public function csv($Vrp2hm121vad){
    		
		if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
			$V5iamlredcl1['error_csv'] = GRIDA000000008;
			echo json_encode($V5iamlredcl1);
			exit;
    	}	
			
    	$Vrydytfuco1s_grid_session = $Vrp2hm121vad['name_grid_session'];
    
    	unset($Vrp2hm121vad['name_grid_session']);
    
    	$Vh11xlmpqmtl_var = $_SESSION['grid_session']['GridSession'.$Vrydytfuco1s_grid_session];
    
    	
    
    	$Vbtkyqv2h4td = $Vh11xlmpqmtl_var;
    
    	unset($Vrp2hm121vad['security']);
    
    	 
    	
    
    	$Vvni2ohingsp = $this->dCrypt($Vbtkyqv2h4td);
    
    
    	
    
    	$Viyqurj5dafb = unserialize($Vvni2ohingsp);
    		
    		
    	
    	 
    	$this->GGLOBAL = $Viyqurj5dafb->GGLOBAL;
    	$this->TABLE_NAME = $Viyqurj5dafb->TABLE_NAME;
    	$this->PROPERTIES = $Viyqurj5dafb->PROPERTIES;
    	$this->PATH = $Viyqurj5dafb->PATH;
    	$this->TITLE = $Viyqurj5dafb->TITLE;
    	$this->NAME_FORM = $Viyqurj5dafb->NAME_FORM ;
    	$this->ID = $Viyqurj5dafb->ID;
    		
			
		$Vpbbrp22rvlb = $Viyqurj5dafb->CONFIG_DB; 
	
		$this->select();
			
		$V4ozid1iwarh = $this->gResult();
			
		if($Vrp2hm121vad[GRID_EXPORT_SELECT_ID] == GRID_EXPORT_ALL){
			$Vsqvpkzrijnu = $this->ID."GRID_QUERY_BEFORE_LIMIT";
			$Vouy5qg4x3p0 = $_SESSION[$Vsqvpkzrijnu];
		}else{
			$Vsqvpkzrijnu = $this->ID."GRID_QUERY";
			$Vouy5qg4x3p0 = $_SESSION[$Vsqvpkzrijnu];
		}
			
		unset($Vrp2hm121vad[GRID_EXPORT_SELECT_ID]);
			
		$this->setColumns($V4ozid1iwarh);

		$Vi5mjeqfhbmz = new Model_engine_db($Vpbbrp22rvlb);

      	$Vioizjw0lvvv = query_to_export($Vi5mjeqfhbmz,$Vouy5qg4x3p0,TRUE,$this->ARRAYCOLUMNS,$Vrp2hm121vad);
		
		$Vi5mjeqfhbmz->__destruct();
		
		PHPExcel_Autoloader::register();
		
		$Vybaluod1sk3 = new PHPExcel();
		$Vybaluod1sk3->setActiveSheetIndex(0);
		$Vybaluod1sk3->getActiveSheet()->fromArray($Vioizjw0lvvv, null, 'A1');
		$Vpfjhulaxvep = PHPExcel_IOFactory::createWriter($Vybaluod1sk3, 'CSV');
    
 
    	$Vojxlzliaqvj = $this->ID.date('YmdhMs').'.csv';
		
		$Vpfjhulaxvep->save(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj);
		
		$this->download_file($Vojxlzliaqvj);
		
    }
    
    public function rewriteQuery($Vouy5qg4x3p0){
    	$Vouy5qg4x3p0 = "SELECT *FROM ($Vouy5qg4x3p0) WHERE rn=0";
    	return $Vouy5qg4x3p0;
    }
    
    
     
    public function create($Vrp2hm121vad){
    
    	
    	
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
    	
    	$Vrydytfuco1s_grid_session = $Vrp2hm121vad['name_grid_session'];
    
    	$Vh11xlmpqmtl_var = $_SESSION['grid_session']['GridSession'.$Vrydytfuco1s_grid_session];
    
    	
    
    	$Vbtkyqv2h4td = $Vh11xlmpqmtl_var;
    
    	unset($Vrp2hm121vad['security']);
    
    	 
    	
    
    	$Vvni2ohingsp = $this->dCrypt($Vbtkyqv2h4td);
    
    
    	
    
    	$Viyqurj5dafb = unserialize($Vvni2ohingsp);
    
	
    	
    	
    	$this->GGLOBAL = $Viyqurj5dafb->GGLOBAL;
    	$this->TABLE_NAME = $Viyqurj5dafb->TABLE_NAME;
    	$this->PROPERTIES = $Viyqurj5dafb->PROPERTIES;
    	$this->PATH = $Viyqurj5dafb->PATH;
    	$this->TITLE = $Viyqurj5dafb->TITLE;
    	$this->NAME_FORM = $Viyqurj5dafb->NAME_FORM ;
		$this->CONFIG_DB = $Viyqurj5dafb->CONFIG_DB; 
    	
		$this->select();
    
    	$V4ozid1iwarh = $this->gResult();
    
    	$this->setColumns($V4ozid1iwarh);
    
    	$Vwse4asus4tks = array();
    	
    	return $this->gForm($Vwse4asus4tks,$V4ozid1iwarh,'_create_new',$Vrydytfuco1s_grid_session);	
    }
    
    
    
    
     
    public function edit($Vrp2hm121vad){

    	
    	 
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
    	
        $Vrydytfuco1s_grid_session = $Vrp2hm121vad['name_grid_session'];
         
        $Vh11xlmpqmtl_var = $_SESSION['grid_session']['GridSession'.$Vrydytfuco1s_grid_session];
         
        
         
        $Vbtkyqv2h4td = $Vh11xlmpqmtl_var;
        unset($Vrp2hm121vad['security']);
         
        
         
        $Vvni2ohingsp = $this->dCrypt($Vbtkyqv2h4td);
         
         
        
         
        $Viyqurj5dafb = unserialize($Vvni2ohingsp);
         
        
        $this->GGLOBAL = $Viyqurj5dafb->GGLOBAL;
        $this->TABLE_NAME = $Viyqurj5dafb->TABLE_NAME;
        $this->PROPERTIES = $Viyqurj5dafb->PROPERTIES;
        $this->PATH = $Viyqurj5dafb->PATH;
        $this->TITLE = $Viyqurj5dafb->TITLE;
        $this->NAME_FORM = $Viyqurj5dafb->NAME_FORM ;
        $this->CONFIG_DB = $Viyqurj5dafb->CONFIG_DB;
		
	    
         
        if(isset($this->TABLE_NAME['general']['FOREIGN_KEY']))
            $Vmlf2ovhfnal = $this->TABLE_NAME['general']['FOREIGN_KEY'];
        else
            $Vmlf2ovhfnal = array();
         
        if(isset($this->TABLE_NAME['general']['PRIMARY_KEY']))
        	$Vfbq1kizupwd = $this->TABLE_NAME['general']['PRIMARY_KEY'];
        else
        	$Vfbq1kizupwd = array();
        
        
        $V2pthdimmjon = array_merge($Vmlf2ovhfnal,$Vfbq1kizupwd);
        
        $Vrp2hm121vadKey = array();
        
        foreach ($V2pthdimmjon as $Vsqvpkzrijnu => $Vtuukyoelheu){
        	$V53sl2m0qi3d = $this->gNameColumn($Vsqvpkzrijnu);
        	if(isset($Vrp2hm121vad[$V53sl2m0qi3d])){
        		$Vxjmlklts1qh = str_replace('-','.',$Vsqvpkzrijnu);
        		$Vrp2hm121vadKey[$Vxjmlklts1qh] = $Vrp2hm121vad[$V53sl2m0qi3d];
        	}
        }
        
        

        $this->select($Vrp2hm121vadKey);
         
        $V4ozid1iwarh = $this->gResult();
         
        
         
        $Vouy5qg4x3p0 = $V4ozid1iwarh['general']['select'];

		$Vi5mjeqfhbmz = new Model_engine_db($this->CONFIG_DB);

        $Vbje1pofprtgData = $Vi5mjeqfhbmz->query($Vouy5qg4x3p0);
		
		$Vi5mjeqfhbmz->__destruct();

        $Vr4qnopjm5lh['post'] = $Vrp2hm121vad;
        $Vr4qnopjm5lh['iData'] = $Vbje1pofprtgData;
        $Vr4qnopjm5lh['postKey'] = $Vrp2hm121vadKey;

        $this->setColumns($V4ozid1iwarh);

        return $this->gForm($Vr4qnopjm5lh,$V4ozid1iwarh,'_action_update',$Vrydytfuco1s_grid_session);
         
    }

    
    
    public function save($Vrp2hm121vad){
    	
    	$Vbje1pofprtgnfo = array();
    	
    	$Vrydytfuco1s_grid_session = $Vrp2hm121vad['name_grid_session'];
    
    	$Vh11xlmpqmtl_var = $_SESSION['grid_session']['GridSession'.$Vrydytfuco1s_grid_session];
    
    	
    
    	$Vbtkyqv2h4td = $Vh11xlmpqmtl_var;
    
    	unset($Vrp2hm121vad['security']);
    	 
    	
    	 
    	$Vvni2ohingsp = $this->dCrypt($Vbtkyqv2h4td);
    
    	 
    	
    	 
    	$Viyqurj5dafb = unserialize($Vvni2ohingsp);
    	 
    	
    	 
    	$this->GGLOBAL = $Viyqurj5dafb->GGLOBAL;
    	$this->TABLE_NAME = $Viyqurj5dafb->TABLE_NAME;
    	$this->PATH = $Viyqurj5dafb->PATH;
    	$this->URL_REDIRECT_FORM = $Viyqurj5dafb->URL_REDIRECT_FORM;
    	$this->TITLE = $Viyqurj5dafb->TITLE;	
    	$this->CONFIG_DB = $Viyqurj5dafb->CONFIG_DB;
		
		

    	$Vrp2hm121vadKey = array();
    	
    	foreach ($Vrp2hm121vad as $Vsqvpkzrijnu => $Vtuukyoelheu){
    			$Vxjmlklts1qh = str_replace('-','.',$Vsqvpkzrijnu);
    			$Vrp2hm121vadKey[$Vxjmlklts1qh] = $Vtuukyoelheu;
    	}
    	
    	
    	Model_engine_sql::insert($Vrp2hm121vadKey);

    	if(!$this->ERRORSQL){
    		
			$Vi5mjeqfhbmz = new Model_engine_db($this->CONFIG_DB);
			
			foreach ($this->TABLE_NAME as $VtuukyoelheuT){
		    	if(isset($VtuukyoelheuT['insert'])){
		    		$Vr4qnopjm5lh = $Vi5mjeqfhbmz->query($VtuukyoelheuT['select']);
					if($Vr4qnopjm5lh != null){
						if(!is_array($Vr4qnopjm5lh)){
							$Vr4qnopjm5lh = array();
						}
		    		}else{
		    			$Vr4qnopjm5lh = array();
					}
					
					if(empty($Vr4qnopjm5lh)){
						$Vouy5qg4x3p0 = $VtuukyoelheuT['insert'];
						$V4ozid1iwarh = $Vi5mjeqfhbmz->query($Vouy5qg4x3p0,null,false);
						if($V4ozid1iwarh){
							if(!$Vi5mjeqfhbmz->commit()){
								$this->ERRORSQL = true;
			    				$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vi5mjeqfhbmz->infoDB->message);
								if(!$Vi5mjeqfhbmz->rollback()){
									$this->ERRORSQL = true;
			    					$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vi5mjeqfhbmz->infoDB->message);
								}
							}else{
								$Vbje1pofprtgnfo['success'] = true;
							}
						}else{
							$this->ERRORSQL = true;
							$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vi5mjeqfhbmz->infoDB->message);
						}
					}else{
		    			$this->ERRORSQL = true;
		    			$this->ERROR_CODE[] = sprintf(GRIDA000000004,$this->TITLE);
		    		}
					
				}
			}
	    	
			$Vi5mjeqfhbmz->__destruct();

    	}else{
    		$this->ERROR_CODE[] = GRIDA000000011;
    	}
		
	    if(!empty($this->ERROR_CODE))
	    	$Vbje1pofprtgnfo['error'] = $this->ERROR_CODE;
	    
	    return json_encode($Vbje1pofprtgnfo);
	    
    }
    
    
    
    public function update($Vrp2hm121vad){
    	 
    	$Vrydytfuco1s_grid_session = $Vrp2hm121vad['name_grid_session'];
    	 
    	$Vh11xlmpqmtl_var = $_SESSION['grid_session']['GridSession'.$Vrydytfuco1s_grid_session];
    	 
    	
    	 
    	$Vbtkyqv2h4td = $Vh11xlmpqmtl_var;
    	 
    	unset($Vrp2hm121vad['security']);
    	 
    	
    
    	$Vvni2ohingsp = $this->dCrypt($Vbtkyqv2h4td);
    	 
    
    	
    
    	$Viyqurj5dafb = unserialize($Vvni2ohingsp);
    
    	
    	
    	$this->GGLOBAL = $Viyqurj5dafb->GGLOBAL;
    	$this->TABLE_NAME = $Viyqurj5dafb->TABLE_NAME;
    	
			
		
		$Vpbbrp22rvlb = $Viyqurj5dafb->CONFIG_DB; 
    	 
		
    	
    	$Vrp2hm121vadKey = array();
    	 
    	foreach ($Vrp2hm121vad as $Vsqvpkzrijnu => $Vtuukyoelheu){
    		$Vxjmlklts1qh = str_replace('-','.',$Vsqvpkzrijnu);
    		$Vrp2hm121vadKey[$Vxjmlklts1qh] = $Vtuukyoelheu;
    	}
    	
    	Model_engine_sql::update($Vrp2hm121vadKey);
    	 
    	
    	
    	if(!$this->ERRORSQL){
    	
	    	$Vi5mjeqfhbmz = new Model_engine_db($Vpbbrp22rvlb);
			
			foreach ($this->TABLE_NAME as $VtuukyoelheuT){
	    		if(isset($VtuukyoelheuT['update'])){
					$Vouy5qg4x3p0 = $VtuukyoelheuT['update'];
					$V4ozid1iwarh = $Vi5mjeqfhbmz->query($Vouy5qg4x3p0,null,false);
					if($V4ozid1iwarh){
						if(!$Vi5mjeqfhbmz->commit()){
							$this->ERRORSQL = true;
		    				$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vi5mjeqfhbmz->infoDB->message);
							if(!$Vi5mjeqfhbmz->rollback()){
								$this->ERRORSQL = true;
		    					$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vi5mjeqfhbmz->infoDB->message);
							}
						}else{
							$Vbje1pofprtgnfo['success'] = true;
						}
					}else{
						$this->ERRORSQL = true;
						$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vi5mjeqfhbmz->infoDB->message);
					}
				}
			}
	   	
			$Vi5mjeqfhbmz->__destruct();
	   
		}else{
    		$this->ERROR_CODE[] = GRIDA000000011;
    	}
    	
    	if(!empty($this->ERROR_CODE))
    		$Vbje1pofprtgnfo['error'] = $this->ERROR_CODE;
    	
    	return json_encode($Vbje1pofprtgnfo);
    }
    
    public function deleteRecord($Vrp2hm121vad){
    
    	
    	 
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
    	
    	$Vrydytfuco1s_grid_session = $Vrp2hm121vad['name_grid_session'];
    	 
    	$Vh11xlmpqmtl_var = $_SESSION['grid_session']['GridSession'.$Vrydytfuco1s_grid_session];
    	 
    	
    	 
    	$Vbtkyqv2h4td = $Vh11xlmpqmtl_var;
    
    	unset($Vrp2hm121vad['security']);
    
    	
    
    	$Vvni2ohingsp = $this->dCrypt($Vbtkyqv2h4td);
    
    
    	
    
    	$Viyqurj5dafb = unserialize($Vvni2ohingsp);
    
    	
    	 
    	$this->GGLOBAL = $Viyqurj5dafb->GGLOBAL;
    	$this->TABLE_NAME = $Viyqurj5dafb->TABLE_NAME;
    	$this->PROPERTIES = $Viyqurj5dafb->PROPERTIES;
    	$this->PATH = $Viyqurj5dafb->PATH;
    	$this->TITLE = $Viyqurj5dafb->TITLE;
    	
			
		
		$Vpbbrp22rvlb = $Viyqurj5dafb->CONFIG_DB; 
		
		
         
        if(isset($this->TABLE_NAME['general']['FOREIGN_KEY']))
            $Vmlf2ovhfnal = $this->TABLE_NAME['general']['FOREIGN_KEY'];
        else
            $Vmlf2ovhfnal = array();
         
        if(isset($this->TABLE_NAME['general']['PRIMARY_KEY']))
        	$Vfbq1kizupwd = $this->TABLE_NAME['general']['PRIMARY_KEY'];
        else
        	$Vfbq1kizupwd = array();
        
        
        $V2pthdimmjon = array_merge($Vmlf2ovhfnal,$Vfbq1kizupwd);
        
        $Vrp2hm121vadKey = array();
        
        foreach ($V2pthdimmjon as $Vsqvpkzrijnu => $Vtuukyoelheu){
        	$V53sl2m0qi3d = $this->gNameColumn($Vsqvpkzrijnu);
        	if(isset($Vrp2hm121vad[$V53sl2m0qi3d])){
        		$Vxjmlklts1qh = str_replace('-','.',$Vsqvpkzrijnu);
        		$Vrp2hm121vadKey[$Vxjmlklts1qh] = $Vrp2hm121vad[$V53sl2m0qi3d];
        	}
        }
    	 
    	Model_engine_sql::delete($Vrp2hm121vadKey);
    
    	
    	 
    	if(!$this->ERRORSQL){
    	
	    	$Vi5mjeqfhbmz = new Model_engine_db($Vpbbrp22rvlb);
	    	 
	    	foreach (array_reverse($this->TABLE_NAME) as $VtuukyoelheuT){
	    		if(isset($VtuukyoelheuT['delete'])){
	    				$Vouy5qg4x3p0 = $VtuukyoelheuT['delete'];
	    				$V4ozid1iwarh = $Vi5mjeqfhbmz->query($Vouy5qg4x3p0,null,false);
						if($V4ozid1iwarh){
							if(!$Vi5mjeqfhbmz->commit()){
									$this->ERRORSQL = true;
				    				$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vi5mjeqfhbmz->infoDB->message);
									if(!$Vi5mjeqfhbmz->rollback()){
										$this->ERRORSQL = true;
				    					$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vi5mjeqfhbmz->infoDB->message);
									}
							}else{
								$Vbje1pofprtgnfo['success'] = true;
							}
						}else{
							$this->ERRORSQL = true;
							$this->ERROR_CODE[] = sprintf(GRIDA000000010,$Vi5mjeqfhbmz->infoDB->message);
						}
    			}
	    	}
	   
	   		$Vi5mjeqfhbmz->__destruct();
			
		}else{
    		$this->ERROR_CODE[] = GRIDA000000011;
    	}
    	
    	if(!empty($this->ERROR_CODE))
    		$Vbje1pofprtgnfo['error'] = $this->ERROR_CODE;
    	
    	return json_encode($Vbje1pofprtgnfo);
    	
    }
    
    
    
    
    private function gForm($Vr4qnopjm5lh = array(),$V4ozid1iwarh = null,$V3f0t3bz4bvn = '_create_new',$Vrydytfuco1s_grid_session=''){
        $Vahgmznolrgv = array();
        
        $Vahgmznolrgv = $this->sSelect($V4ozid1iwarh);
      
        $V01xkx21jg1p = '<script> $(document).ready(function() { $("#'.$this->getNameForm().'").validate();';
         
        
         
        if (!empty($this->ARRAYCOLUMNS)){
    
            $Vl5dywbjbf34 = new Model_form();
            $Vl5dywbjbf34->setId($this->getNameForm());
            $Vsebw4s4c0aq = new Model_div();
            $Vsebw4s4c0aq->setClass('module_content');
            
            
            
            foreach ($this->ARRAYCOLUMNS as $Vsqvpkzrijnu => $Vsmh3spbnj12){
            	if(!isset($Vsmh3spbnj12->only_info)){
                	$Vrydytfuco1s =  $Vsmh3spbnj12->owner.'.'.$Vsmh3spbnj12->table_name.'.'.$Vsmh3spbnj12->name;
            	
            		if(!$Vsmh3spbnj12->is_hidden)
            			$V01xkx21jg1p.=$this->functionType($Vsmh3spbnj12->type,$Vrydytfuco1s);
            		
            		if(isset($Vsmh3spbnj12->expresion) && !isset($Vsmh3spbnj12->error_message_expresion))
            			$V01xkx21jg1p.=$this->functionValidate($Vsmh3spbnj12->expresion, $Vrydytfuco1s);
            		else if(isset($Vsmh3spbnj12->expresion) && isset($Vsmh3spbnj12->error_message_expresion))
            			$V01xkx21jg1p.=$this->functionValidate($Vsmh3spbnj12->expresion, $Vrydytfuco1s,$Vsmh3spbnj12->error_message_expresion);
            	
            		if(isset($Vsmh3spbnj12->funcion) && !isset($Vsmh3spbnj12->error_message_funcion))
            			$V01xkx21jg1p.=$this->functionValidateFuncion($Vsmh3spbnj12->funcion, $Vrydytfuco1s);
            		else if(isset($Vsmh3spbnj12->funcion) && isset($Vsmh3spbnj12->error_message_funcion))
            			$V01xkx21jg1p.=$this->functionValidateFuncion($Vsmh3spbnj12->funcion, $Vrydytfuco1s,$Vsmh3spbnj12->error_message_funcion);
            	     
                    $V1j05kn14czd = $this->gType($Vahgmznolrgv,$Vsqvpkzrijnu,$Vsmh3spbnj12,$Vr4qnopjm5lh);
                    
                    $Vsebw4s4c0aq->addelement($V1j05kn14czd);
                }
            }
            
            $Vsebw4s4c0aq->buildDiv();
    
            $Vh3nfjwhdwzi = new Model_article();
            $Vh3nfjwhdwzi->setClass('module width_full');
            $Vh3nfjwhdwzi->addElement('<header><h3>'.$this->TITLE.'</h3></header>');
            $Vh3nfjwhdwzi->addElement($Vsebw4s4c0aq->getDiv());
    
            
    
            $Vl5dywbjbf34->addElement($Vsebw4s4c0aq->getDiv());
    
            $Vbje1pofprtgnput = new Model_input();
            $Vbje1pofprtgnput->setType('hidden');
            $Vbje1pofprtgnput->setId('name_grid_session');
            $Vbje1pofprtgnput->setName('name_grid_session');
            $Vbje1pofprtgnput->setValue($Vrydytfuco1s_grid_session);
    
            $Vbje1pofprtgnput->buildInput();
            $Vl5dywbjbf34->addElement($Vbje1pofprtgnput->getInput());
    
            $Vo02dtmzrph2 = $this->gRedirectForm();
    
            if($V3f0t3bz4bvn == '_create_new' && !empty($Vo02dtmzrph2) && $Vo02dtmzrph2!='save'){
                $Vvydfmgsfenm = base_url() . $Vo02dtmzrph2;
            }else if($V3f0t3bz4bvn == '_create_new'){
                $Vvydfmgsfenm = base_url() . $this->PATH ."/engine?security=".base64_encode($this->mCrypt('save'));
            }else{
                $Vvydfmgsfenm = base_url() . $this->PATH ."/engine?security=".base64_encode($this->mCrypt('update'));
            }
            $V01xkx21jg1p.=' }); </script>';
    
            $Vl5dywbjbf34->addElement($V01xkx21jg1p);
    
            $Vl5dywbjbf34->setAction($Vvydfmgsfenm);
            $Vl5dywbjbf34->setMethod('post');
            $Vl5dywbjbf34->buildForm();
    
            return $Vl5dywbjbf34->getForm();
        }
         
    }
    
    
    private function sSelect($V4ozid1iwarh){
    	$Vahgmznolrgv = array();
    	foreach ($V4ozid1iwarh as $Vsqvpkzrijnu => $Vtuukyoelheu){
    		if(is_numeric($Vsqvpkzrijnu) && $Vsqvpkzrijnu>0){
    			if(isset($Vtuukyoelheu['CATALOG'])){
    				if(isset($Vtuukyoelheu['PRIMARY_KEY'])){
    					foreach ($Vtuukyoelheu['PRIMARY_KEY'] as $VtuukyoelheuPK){
    						$Vahgmznolrgv[$VtuukyoelheuPK->name] = $Vtuukyoelheu;
    						break;
    					}
    				}
    			}
    		}
    	}
    	return $Vahgmznolrgv;
    }
    
    private function functionType($V3f0t3bz4bvn,$Vrydytfuco1s){
    	$Vrydytfuco1s = str_replace('.','-', $Vrydytfuco1s);
        if(strtoupper($V3f0t3bz4bvn) == 'DATE'){
            return "$('#".$Vrydytfuco1s."').datetimepicker({lang:'es',timepicker: false,format: 'Y-m-d',showOn: 'both',buttonImage: '".base_url()."images/calendar.png',buttonImageOnly: false});";
        }else if(strpos($V3f0t3bz4bvn,'TIMESTAMP') !== false){
            return "$('#".$Vrydytfuco1s."').datetimepicker({lang:'es',format: 'Y-m-d H:i',showOn: 'both',buttonImage: '".base_url()."images/calendar.png',buttonImageOnly: false});";
        }
    }
    
    private function functionValidate($Vtaygtcff0wx,$Vrydytfuco1s,$V5iamlredcl1_message='Error'){
    	$Vrydytfuco1s = str_replace('.','-', $Vrydytfuco1s);
        return "
                $.validator.addMethod(
                '$Vrydytfuco1s',
                function(value, element, regexpString) {
                    var regParts = regexpString.match(/^\/(.*?)\/([gim]*)$/);
                    if (regParts) {
                        var regexp = new RegExp(regParts[1], regParts[2]);
                    } else {
                        var regexp = new RegExp(regexpString);
                    }
                    return regexp.test(value);
                },
                '$V5iamlredcl1_message'
                );
                    
                $('#$Vrydytfuco1s').rules('add', { '$Vrydytfuco1s': '$Vtaygtcff0wx'});
                ";
    }
    
    
    private function functionValidateFuncion($Vqg1dqcubp2c,$Vrydytfuco1s,$V5iamlredcl1_message='Error'){
    	$Vrydytfuco1s = str_replace('.','-', $Vrydytfuco1s);
        $Vrydytfuco1sFunction = $Vrydytfuco1s .'_Function';
        return "
                $.validator.addMethod(
                '$Vrydytfuco1sFunction',
                function(value, element, regexpString) {
                        if ($Vqg1dqcubp2c(element)) {
                        return true;
                        }
                        return false;
                },
                        '$V5iamlredcl1_message'
                );
                         
                $('#$Vrydytfuco1s').rules('add', { '$Vrydytfuco1sFunction': ''});
                ";
    }
    
    
    
    private function gType($Vahgmznolrgv,$Vsqvpkzrijnu,$Vsmh3spbnj12,$Vr4qnopjm5lh){

    	if($Vsmh3spbnj12->is_select && !$Vsmh3spbnj12->is_hidden){
        	return '<div class="form-group">'.$this->gSelectABased($Vsqvpkzrijnu, $Vsmh3spbnj12->array_select, $Vsmh3spbnj12,$Vr4qnopjm5lh).'</div>';
        }else if($Vsmh3spbnj12->is_hidden){
        	return '<div class="form-group">'.$this->gInputHidden($Vsqvpkzrijnu, $Vr4qnopjm5lh, $Vsmh3spbnj12).'</div>';
        }else  if(array_key_exists($Vsmh3spbnj12->name,$Vahgmznolrgv)  && !$Vsmh3spbnj12->is_hidden){
        	return '<div class="form-group">'.$this->gSelectCBased($Vsqvpkzrijnu, $Vahgmznolrgv, $Vr4qnopjm5lh, $Vsmh3spbnj12).'</div>';
        }else if(strpos($Vsmh3spbnj12->type,'VARCHAR') !== false && $Vsmh3spbnj12->max_length >=100){
        	return '<div class="form-group">'.$this->gTextArea($Vsqvpkzrijnu, $Vr4qnopjm5lh, $Vsmh3spbnj12).'</div>';
       	}else{
            return '<div class="form-group">'.$this->gInput($Vsqvpkzrijnu, $Vr4qnopjm5lh, $Vsmh3spbnj12).'</div>';
        }
        
     }
    
    
    
    private function gSelectABased($Vsqvpkzrijnu,$Vyqjkwofqy0n,$Vsmh3spbnj12,$Vr4qnopjm5lh = array()){

    	$V2huddyqd2p2 = str_replace('.','-', $Vsqvpkzrijnu);
        
        $V4xw1mlrznbm = new Model_select();
        $V4xw1mlrznbm->setId($V2huddyqd2p2);
        $V4xw1mlrznbm->setName($V2huddyqd2p2);
        
        $Vtuukyoelheu_type = '';
        
        $Vtuukyoelheu_type = $Vsmh3spbnj12->owner.'.'.$Vsmh3spbnj12->table_name.'.'.$Vsmh3spbnj12->name;
        
        $Vtuukyoelheu_type = $this->gNameColumn($Vtuukyoelheu_type);

        foreach ($Vyqjkwofqy0n as $V4n2do0p3if4 => $Vtuukyoelheu){
        	    	if(isset($Vr4qnopjm5lh['iData'])){
        	    		$Vbje1pofprtgData = $Vr4qnopjm5lh['iData'];
        	    		if(isset($Vbje1pofprtgData[0]) && isset($Vbje1pofprtgData[0][$Vtuukyoelheu_type]) && $Vbje1pofprtgData[0][$Vtuukyoelheu_type] == $V4n2do0p3if4)
		            		$V4xw1mlrznbm->openOption($V4n2do0p3if4,$Vtuukyoelheu,'selected');
		            	else
		            		$V4xw1mlrznbm->openOption($V4n2do0p3if4,$Vtuukyoelheu,'');
	            	}else{
	            		$V4xw1mlrznbm->openOption($V4n2do0p3if4,$Vtuukyoelheu,'');
	            	}
	    }
       
        $V4xw1mlrznbm->closeOption();
        $V4xw1mlrznbm->buildSelect();
    
        $Vcma4so0ytne = new Model_label();
        $Vcma4so0ytne->setFor($V2huddyqd2p2);
        $Vcma4so0ytne->addElement($Vsmh3spbnj12->display_front_end);
        $Vcma4so0ytne->buildLabel();
        
		$Vfbxx2lgtibg = new Model_table_form();
        $Vfbxx2lgtibg->setId($this->getNameForm());
		$Vfbxx2lgtibg->setClass("tableform");
		$Vfbxx2lgtibg->setStyle("width:100%");
		$Vfbxx2lgtibg->newTd($Vcma4so0ytne->getLabel(),"50%",'');
		$Vfbxx2lgtibg->newTd($V4xw1mlrznbm->getSelect(),"50%",'');
		$Vfbxx2lgtibg->buildTable();
        
		return $Vfbxx2lgtibg->getTable();
         
    }
    
    
    
    private function gSelectCBased($Vsqvpkzrijnu,$Vahgmznolrgv,$Vr4qnopjm5lh,$Vsmh3spbnj12){
    	
        $V4ozid1iwarh = $this->fSelect($Vahgmznolrgv[$Vsmh3spbnj12->name]['select'],$Vsmh3spbnj12->name);

        $Vslew0gtvkxf = $this->cfSelect($Vahgmznolrgv[$Vsmh3spbnj12->name]['select'], $Vsmh3spbnj12->name);
      
        $V4ozid1iwarh = array_merge($Vslew0gtvkxf,$V4ozid1iwarh);
        
		$V4xw1mlrznbm = new Model_select();
        
        $V2huddyqd2p2 = str_replace('.','-', $Vsqvpkzrijnu);
        
        $V4xw1mlrznbm->setId($V2huddyqd2p2);
        $V4xw1mlrznbm->setName($V2huddyqd2p2);
        
        $Vtuukyoelheu_type = '';
        
        $Vtuukyoelheu_type = $Vsmh3spbnj12->owner.'.'.$Vsmh3spbnj12->table_name.'.'.$Vsmh3spbnj12->name;
        
        $Vtuukyoelheu_type = $this->gNameColumn($Vtuukyoelheu_type);
        
        foreach ($V4ozid1iwarh as $Vtuukyoelheu){
        	$V3452ddxns4i = '';
        	
        	foreach ($Vtuukyoelheu as $Vy212dbzpnua){
            	$V3452ddxns4i.=$Vy212dbzpnua.'|';
            }
            
            $Vsqvpkzrijnu_val = $Vtuukyoelheu[$Vsmh3spbnj12->name];
            
            if(isset($Vr4qnopjm5lh['iData'])){
            	$Vbje1pofprtgData = $Vr4qnopjm5lh['iData'];
            	if(isset($Vbje1pofprtgData[0])){
	            	if(isset($Vbje1pofprtgData[0][$Vtuukyoelheu_type]) && $Vbje1pofprtgData[0][$Vtuukyoelheu_type] == $Vsqvpkzrijnu_val)
	            		$V4xw1mlrznbm->openOption($Vsqvpkzrijnu_val,$V3452ddxns4i,'selected');
	            	else 
	            		$V4xw1mlrznbm->openOption($Vsqvpkzrijnu_val,$V3452ddxns4i,'');
            	}
            }else{
                $V4xw1mlrznbm->openOption($Vsqvpkzrijnu_val,$V3452ddxns4i,'');
            }
        }
        
        $V4xw1mlrznbm->closeOption();
        $V4xw1mlrznbm->buildSelect();
            
        $Vcma4so0ytne = new Model_label();
        $Vcma4so0ytne->setFor($V2huddyqd2p2);
        $Vcma4so0ytne->addElement($Vsmh3spbnj12->display_front_end);
        $Vcma4so0ytne->buildLabel();
     
        $Vfbxx2lgtibg = new Model_table_form();
        $Vfbxx2lgtibg->setId($this->getNameForm());
		$Vfbxx2lgtibg->setClass("tableform");
		$Vfbxx2lgtibg->setStyle("width:100%");
		$Vfbxx2lgtibg->newTd($Vcma4so0ytne->getLabel(),"50%",'');
		$Vfbxx2lgtibg->newTd($V4xw1mlrznbm->getSelect(),"50%",'');
		$Vfbxx2lgtibg->buildTable();
        
		return $Vfbxx2lgtibg->getTable();
    }
    
    
    
    private function gInput($Vsqvpkzrijnu,$Vr4qnopjm5lh,$Vsmh3spbnj12){
        
    	$Vxv4aufu24nu = $this->gNameColumn($Vsqvpkzrijnu);
    	
        $V2huddyqd2p2 = str_replace('.','-', $Vsqvpkzrijnu);
        
       
        
        $Vcma4so0ytne = new Model_label();
        $Vcma4so0ytne->setFor($V2huddyqd2p2);
        $Vcma4so0ytne->addElement($Vsmh3spbnj12->display_front_end);
        $Vcma4so0ytne->buildLabel();
            
        $Vbje1pofprtgnput = new Model_input();
        
        if(isset($Vsmh3spbnj12->type_password) && $Vsmh3spbnj12->type_password)
        	$Vbje1pofprtgnput->setType('password');
        else 
        	$Vbje1pofprtgnput->setType('text');
        
        $Vbje1pofprtgnput->setId($V2huddyqd2p2);
        $Vbje1pofprtgnput->setName($V2huddyqd2p2);
        $this->addClass($Vbje1pofprtgnput, $Vsmh3spbnj12);
    
        if($Vsmh3spbnj12->type== 'DATE')
            $Vbje1pofprtgnput->setMaxlength(10);
        else if(strpos($Vsmh3spbnj12->type,'TIMESTAMP') !== false)
            $Vbje1pofprtgnput->setMaxlength(16);
        else if(isset($Vsmh3spbnj12->max_length) && $Vsmh3spbnj12->type!='DATE')
            $Vbje1pofprtgnput->setMaxlength($Vsmh3spbnj12->max_length);

        if(isset($Vr4qnopjm5lh['iData'])){
       		 $Vbje1pofprtgData = $Vr4qnopjm5lh['iData'];
	         if(isset($Vbje1pofprtgData[0])){
		         if(isset($Vbje1pofprtgData[0][$Vxv4aufu24nu])){
		         	 $Vbje1pofprtgnput->setValue($Vbje1pofprtgData[0][$Vxv4aufu24nu]);
		         }
	         }
        }
        $Vbje1pofprtgnput->buildInput();
       
		$Vfbxx2lgtibg = new Model_table_form();
        $Vfbxx2lgtibg->setId($this->getNameForm());
		$Vfbxx2lgtibg->setClass("tableform");
		$Vfbxx2lgtibg->setStyle("width:100%");
		$Vfbxx2lgtibg->newTd($Vcma4so0ytne->getLabel(),"50%",'');
		$Vfbxx2lgtibg->newTd($Vbje1pofprtgnput->getInput(),"50%","center");
		$Vfbxx2lgtibg->buildTable();
        
		return $Vfbxx2lgtibg->getTable();
		
    }
    
    
    
    private function gInputHidden($Vsqvpkzrijnu,$Vr4qnopjm5lh,$Vsmh3spbnj12){
    
    	$V2huddyqd2p2 = str_replace('.','-', $Vsqvpkzrijnu);
    	
    	$Vxv4aufu24nu = $this->gNameColumn($Vsqvpkzrijnu);
    	 
    	$Vbje1pofprtgnput = new Model_input();
    	$Vbje1pofprtgnput->setType('hidden');
    	$Vbje1pofprtgnput->setId($V2huddyqd2p2);
    	$Vbje1pofprtgnput->setName($V2huddyqd2p2);
    	 
    	$this->addClass($Vbje1pofprtgnput, $Vsmh3spbnj12);
    
    	if($Vsmh3spbnj12->type == 'DATE')
    		$Vbje1pofprtgnput->setMaxlength(10);
    	else if(strpos($Vsmh3spbnj12->type,'TIMESTAMP') !== false)
    		$Vbje1pofprtgnput->setMaxlength(16);
    	else if(isset($Vsmh3spbnj12->max_length) && $Vsmh3spbnj12->type!='DATE')
    		$Vbje1pofprtgnput->setMaxlength($Vsmh3spbnj12->max_length);
    
    	if(isset($Vr4qnopjm5lh['iData'])){
    		$Vbje1pofprtgData = $Vr4qnopjm5lh['iData'];
    		if(isset($Vbje1pofprtgData[0])){
    			if(isset($Vbje1pofprtgData[0][$Vxv4aufu24nu])){
    				$Vbje1pofprtgnput->setValue($Vbje1pofprtgData[0][$Vxv4aufu24nu]);
    			}
    		}
    	}
    	 
    	$Vbje1pofprtgnput->buildInput();

    	return $Vbje1pofprtgnput->getInput();
    }
    
    
    
    private function gTextArea($Vsqvpkzrijnu,$Vr4qnopjm5lh,$Vsmh3spbnj12){
    	
    	$V2huddyqd2p2 = str_replace('.','-', $Vsqvpkzrijnu);
    	
    	$Vxv4aufu24nu = $this->gNameColumn($Vsqvpkzrijnu);
    	
    	$Vcma4so0ytne = new Model_label();
    	$Vcma4so0ytne->setFor($V2huddyqd2p2);
    	$Vcma4so0ytne->addElement($Vsmh3spbnj12->display_front_end);
    	$Vcma4so0ytne->buildLabel();
    
    	$Vmndij5sum4g = new Model_textarea();
    	$Vmndij5sum4g->setId($V2huddyqd2p2);
    	$Vmndij5sum4g->setName($V2huddyqd2p2);
    	$Vmndij5sum4g->setMaxlength($Vsmh3spbnj12->max_length);
    		
    	if($Vsmh3spbnj12->nullable=='N'){
    		$Vmndij5sum4g->setClass('requerido');
    	}

    	if(isset($Vr4qnopjm5lh['iData'])){
    		$Vbje1pofprtgData = $Vr4qnopjm5lh['iData'];
	    	if(isset($Vbje1pofprtgData[0])){
	    		if(isset($Vbje1pofprtgData[0][$Vxv4aufu24nu])){
	    			$Vmndij5sum4g->setValue($Vbje1pofprtgData[0][$Vxv4aufu24nu]);
	    		}
	    	}
    	}
    	$Vmndij5sum4g->buildTextarea();
    	
        $Vfbxx2lgtibg = new Model_table_form();
        $Vfbxx2lgtibg->setId($this->getNameForm());
		$Vfbxx2lgtibg->setClass("tableform");
		$Vfbxx2lgtibg->setStyle("width:100%");
		$Vfbxx2lgtibg->newTd($Vcma4so0ytne->getLabel(),"50%",'');
		$Vfbxx2lgtibg->newTd($Vmndij5sum4g->getTextarea(),"50%","center");
		$Vfbxx2lgtibg->buildTable();
        
		return $Vfbxx2lgtibg->getTable();	
    }
    
    
    
 	private function addClass(&$Vbje1pofprtgnput,$Vsmh3spbnj12){
            
        $Va0wbqhb0ads = '';
      
        if(!$Vsmh3spbnj12->is_hidden){
	        if($Vsmh3spbnj12->nullable == 'N'){
	            $Va0wbqhb0ads = 'requerido';
	        }
	            
	        if($Vsmh3spbnj12->type == 'NUMBER' && $Vsmh3spbnj12->data_scale == '0'){
	            if(empty($Va0wbqhb0ads)){
	                $Va0wbqhb0ads = 'intNegativo';
	            }else{
	                $Va0wbqhb0ads.= ' intNegativo';
	            }
	        }else if($Vsmh3spbnj12->type == 'NUMBER' && (is_null($Vsmh3spbnj12->data_scale) || empty($Vsmh3spbnj12->data_scale))){
	            if(empty($Va0wbqhb0ads)){
	                $Va0wbqhb0ads = 'floatNegativo';
	            }else{
	                $Va0wbqhb0ads.= ' floatNegativo';
	            }
	        }
        }    
            
        $Vbje1pofprtgnput->setClass($Va0wbqhb0ads);
    }
    
    
    
    private function fSelect($Vouy5qg4x3p0,$Vsqvpkzrijnu){
    	$Vi5mjeqfhbmz = new Model_engine_db($this->CONFIG_DB);
		$Vbje1pofprtgData = $Vi5mjeqfhbmz->query($Vouy5qg4x3p0.' ORDER BY '.$Vsqvpkzrijnu);
		$Vi5mjeqfhbmz->__destruct();
        return $Vbje1pofprtgData;
    }
    
    
     
    private function cfSelect($Vouy5qg4x3p0,$Vsqvpkzrijnu){
        if(strpos($Vouy5qg4x3p0,'=')!== false){
            $Vouy5qg4x3p0 = str_replace('=', ' NOT IN ', $Vouy5qg4x3p0);
			$Vi5mjeqfhbmz = new Model_engine_db($this->CONFIG_DB);
	        $Vbje1pofprtgData = $Vi5mjeqfhbmz->query($Vouy5qg4x3p0.' ORDER BY '.$Vsqvpkzrijnu);
			$Vi5mjeqfhbmz->__destruct();
            return $Vbje1pofprtgData;
        }else
            return array();
    }
    
    
    
    public function buildBackButton(){
    
    	if(isset($_SESSION['grid_session']['flow'])){
    
    		$V30tisvtolj0 = $_SESSION['grid_session']['flow'];
    
    		$V34r5jd5ws0f = basename ( "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" );
    
    		if(isset($V30tisvtolj0[$V30tisvtolj0[$V34r5jd5ws0f]['CALL_FROM']])){
    			$Vr4qnopjm5lh = $V30tisvtolj0[$V30tisvtolj0[$V34r5jd5ws0f]['CALL_FROM']];
    		
    			$Vacnlf34red2 = new Model_a_post();
    			 
    			$Vacnlf34red2->setMethod('post');
    			$Vacnlf34red2->setOnclick('show_content'.$this->ID.'(parentNode)');
    
    			$Vacnlf34red2->addElement('Volver Atr&aacute;s');
    			 
    			$Vacnlf34red2->setAction($Vr4qnopjm5lh['URL']);
    			 
    			foreach ($Vr4qnopjm5lh as $Vsqvpkzrijnu => $VtuukyoelheuColumn){
    				$Vbje1pofprtgnput = new Model_input();
    				$Vbje1pofprtgnput->setType('hidden');
    				$Vbje1pofprtgnput->setName(str_replace('.','-',$Vsqvpkzrijnu));
    				$Vbje1pofprtgnput->setValue($VtuukyoelheuColumn);
    				$Vbje1pofprtgnput->buildInput();
    				$Vacnlf34red2->addInput($Vbje1pofprtgnput->getInput());
    			}
    			 
    			$Vbje1pofprtgnput = new Model_input();
    			$Vbje1pofprtgnput->setType('hidden');
    			 
    			 
    			if(isset($Vr4qnopjm5lh['name_grid_session'])){
    				$Vbje1pofprtgnput->setName('name_grid_session');
    				$Vbje1pofprtgnput->setValue($Vr4qnopjm5lh['name_grid_session']);
    			}else{
    				$Vbje1pofprtgnput->setName('name_grid_session_no_defined');
    				$Vbje1pofprtgnput->setValue('');
    			}
    			 
    			$Vbje1pofprtgnput->buildInput();
    			$Vacnlf34red2->addInput($Vbje1pofprtgnput->getInput());
    
    			$Vacnlf34red2->buildA_post();
    			 
    			return $Vacnlf34red2->getA_post();
    		}
    		return "";
    	}
    }
    
    
 
    public function template($Vrp2hm121vad){
    	
    	
    	 
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
    	
    	$Vrydytfuco1s_grid_session = $Vrp2hm121vad['name_grid_session'];

    	$Vh11xlmpqmtl_var = $_SESSION['grid_session']['GridSession'.$Vrydytfuco1s_grid_session];
    	
    	
    	
    	$Vbtkyqv2h4td = $Vh11xlmpqmtl_var;
    	
    	unset($Vrp2hm121vad['security']);
    	
    	
    	
    	
    	$Vvni2ohingsp = $this->dCrypt($Vbtkyqv2h4td);
    	
    	
    	
    	
    	$Viyqurj5dafb = unserialize($Vvni2ohingsp);
    	
    	
    	
    	$this->TEMPLATES = $Viyqurj5dafb->TEMPLATES;
    	$this->PATH = $Viyqurj5dafb->PATH;
    	$this->TITLE = $Viyqurj5dafb->TITLE;
    	$this->NAME_FORM = $Viyqurj5dafb->NAME_FORM ;
    	
    	return $this->gFormTemplate($Vrydytfuco1s_grid_session);
    }
    
    
    private function gFormTemplate($Vrydytfuco1s_grid_session){
    	
    	
    	 
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
    		return GRIDA000000008;
    	}
    	
		if(!empty($this->TEMPLATES)){
		
    		$Vl5dywbjbf34 = new Model_form();
    		$Vl5dywbjbf34->setId($this->getNameForm());
    		    		
    		$V4xw1mlrznbm = new Model_select();
    		
    		$V4xw1mlrznbm->setId(GRID_TEMPLATE_SELECT_ID);
    		$V4xw1mlrznbm->setName(GRID_TEMPLATE_SELECT_ID);
    		
    		foreach ($this->TEMPLATES as $Vm1rsddv1034 => $Vce3qe5d4etr){
    			if(isset($Vce3qe5d4etr['properties'])){
    				if(isset($Vce3qe5d4etr['properties']['name'])){
    					$Vmh1us1sg5nn = $Vce3qe5d4etr['properties']['name'];
    				}else{
    					$Vmh1us1sg5nn = $Vm1rsddv1034;
    				}
    			}else{
    				$Vmh1us1sg5nn = $Vm1rsddv1034;
    			}
    			$V4xw1mlrznbm->openOption($Vm1rsddv1034,$Vmh1us1sg5nn,'');
    		}
    		
    		$V4xw1mlrznbm->closeOption();
    		$V4xw1mlrznbm->buildSelect();
    		 
    		$Vcma4so0ytne = new Model_label();
    		$Vcma4so0ytne->setFor(GRID_TEMPLATE_SELECT_ID);
    		$Vcma4so0ytne->addElement('Selecciona el template');
    		$Vcma4so0ytne->buildLabel();
    		 
    		$Vfbxx2lgtibg = new Model_table_form();
   			$Vfbxx2lgtibg->setId($this->getNameForm());
			$Vfbxx2lgtibg->setClass("tableform");
			$Vfbxx2lgtibg->setStyle("width:100%");
			$Vfbxx2lgtibg->newTd($Vcma4so0ytne->getLabel(),"50%",'');
			$Vfbxx2lgtibg->newTd($V4xw1mlrznbm->getSelect(),"50%","center");
			$Vfbxx2lgtibg->buildTable();
			$Vl5dywbjbf34->addElement($Vfbxx2lgtibg->getTable());
    		 
    		$Vbje1pofprtgnput = new Model_input();
    		$Vbje1pofprtgnput->setType('hidden');
    		$Vbje1pofprtgnput->setId('name_grid_session');
    		$Vbje1pofprtgnput->setName('name_grid_session');
    		$Vbje1pofprtgnput->setValue($Vrydytfuco1s_grid_session);
    		 
    		$Vbje1pofprtgnput->buildInput();
    		$Vl5dywbjbf34->addElement($Vbje1pofprtgnput->getInput());
    	
    		
    	
    		$V4xw1mlrznbm = new Model_select();
    		 
    		$V4xw1mlrznbm->setId(GRID_EXPORT_SELECT_ID);
    		$V4xw1mlrznbm->setName(GRID_EXPORT_SELECT_ID);
    		 
    		$V4xw1mlrznbm->openOption(GRID_EXPORT_ALL,'Todas','selected');
    		$V4xw1mlrznbm->openOption(GRID_EXPORT_THIS,'Pagina Actual','');
    	
    		$V4xw1mlrznbm->closeOption();
    		$V4xw1mlrznbm->buildSelect();
    		 
    		$Vcma4so0ytne = new Model_label();
    		$Vcma4so0ytne->setFor(GRID_EXPORT_SELECT_ID);
    		$Vcma4so0ytne->addElement('Selecciona las paginas');
    		$Vcma4so0ytne->buildLabel();
    		 
    		$Vfbxx2lgtibg = new Model_table_form();
   			$Vfbxx2lgtibg->setId($this->getNameForm());
			$Vfbxx2lgtibg->setClass("tableform");
			$Vfbxx2lgtibg->setStyle("width:100%");
			$Vfbxx2lgtibg->newTd($Vcma4so0ytne->getLabel(),"50%",'');
			$Vfbxx2lgtibg->newTd($V4xw1mlrznbm->getSelect(),"50%","center");
			$Vfbxx2lgtibg->buildTable();
			$Vl5dywbjbf34->addElement($Vfbxx2lgtibg->getTable());
    	
    		
    	
    		$Vo02dtmzrph2 = $this->gRedirectForm();
    		 
    		$Vvydfmgsfenm = base_url() . $this->PATH . "/engine?security=".base64_encode($this->mCrypt('toTemplate'));
    		 
    		$Vl5dywbjbf34->setAction($Vvydfmgsfenm);
    		$Vl5dywbjbf34->setMethod('post');
    		$Vl5dywbjbf34->buildForm();
    		 
    		return $Vl5dywbjbf34->getForm();
    		
		}else{
			return "No hay templates";
		}
    	
    	
    }
    
    public function toTemplate($Vrp2hm121vad){
    	
    	$Vhy14pjizggg = $this->getExtension($Vrp2hm121vad['GRID_SELECT_TEMPLATE']);
    	
    	switch ($Vhy14pjizggg){
    		case 'docx':
    			$this->toWord($Vrp2hm121vad);
    			break;
    		case 'xls':
    			$this->toExcel($Vrp2hm121vad);
    			break;
    	}
    	
    }
    
    
    public function toWord($Vrp2hm121vad){
		 
    	if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
			$V5iamlredcl1 = array();
			$V5iamlredcl1['error_csv'] = GRIDA000000008;
			echo json_encode($V5iamlredcl1);
			exit;
    	}
    	
		
    	$Vrydytfuco1s_grid_session = $Vrp2hm121vad['name_grid_session'];
    	
    	unset($Vrp2hm121vad['name_grid_session']);
    	
    	$Vh11xlmpqmtl_var = $_SESSION['grid_session']['GridSession'.$Vrydytfuco1s_grid_session];
    	
    	
    	
    	$Vbtkyqv2h4td = $Vh11xlmpqmtl_var;
    	
    	unset($Vrp2hm121vad['security']);
    	
    	
    	
    	
    	$Vvni2ohingsp = $this->dCrypt($Vbtkyqv2h4td);
    	
    	
    	
    	
    	$Viyqurj5dafb = unserialize($Vvni2ohingsp);
    	
    	
    	
    	
    	$this->GGLOBAL = $Viyqurj5dafb->GGLOBAL;
    	$this->TABLE_NAME = $Viyqurj5dafb->TABLE_NAME;
    	$this->PROPERTIES = $Viyqurj5dafb->PROPERTIES;
    	$this->PATH = $Viyqurj5dafb->PATH;
    	$this->TITLE = $Viyqurj5dafb->TITLE;
    	$this->NAME_FORM = $Viyqurj5dafb->NAME_FORM ;
    	$this->ID = $Viyqurj5dafb->ID;
    	
			
		$Vpbbrp22rvlb = $Viyqurj5dafb->CONFIG_DB; 
	
		$this->select();
		 
		$V4ozid1iwarh = $this->gResult();
		 
		if($Vrp2hm121vad[GRID_EXPORT_SELECT_ID] == GRID_EXPORT_ALL){
			$Vsqvpkzrijnu = $this->ID."GRID_QUERY_BEFORE_LIMIT";
			$Vouy5qg4x3p0 = $_SESSION[$Vsqvpkzrijnu];
		}else{
			$Vsqvpkzrijnu = $this->ID."GRID_QUERY";
			$Vouy5qg4x3p0 = $_SESSION[$Vsqvpkzrijnu];
		}
		 
		unset($Vrp2hm121vad[GRID_EXPORT_SELECT_ID]);
		 
		$this->setColumns($V4ozid1iwarh);
	
		$Vi5mjeqfhbmz = new Model_engine_db($Vpbbrp22rvlb);
		$Vbje1pofprtgData = $Vi5mjeqfhbmz->query($Vouy5qg4x3p0);
		$Vi5mjeqfhbmz->__destruct();
		
		\PhpOffice\PhpWord\Autoloader::register();
		
		$Vnt1gnz4yjev = new \PhpOffice\PhpWord\PhpWord();
		
		$Vce3qe5d4etrProcessor = $Vnt1gnz4yjev->loadTemplate(APPPATH.'grid/templates/'.$Vrp2hm121vad['GRID_SELECT_TEMPLATE']);
		 
		$Vce3qe5d4etrProcessor->setValue('title', htmlspecialchars($this->TITLE, ENT_COMPAT, 'UTF-8'));
		$Vce3qe5d4etrProcessor->setValue('date', htmlspecialchars(date('l F Y h:i:s A'), ENT_COMPAT, 'UTF-8'));
		
		$Vce3qe5d4etrProcessor->cloneRow('row_number', count($Vbje1pofprtgData));
		
		foreach ($Vbje1pofprtgData as $Vbje1pofprtgKey => $Vbje1pofprtgValue){
			$Vce3qe5d4etrProcessor->setValue("row_number#".($Vbje1pofprtgKey+1), htmlspecialchars(($Vbje1pofprtgKey+1), ENT_COMPAT, 'UTF-8'));
			foreach ($Vbje1pofprtgValue as $Vsqvpkzrijnu => $Vtuukyoelheu){
				$Vce3qe5d4etrProcessor->setValue($Vsqvpkzrijnu."#".($Vbje1pofprtgKey+1), htmlspecialchars($Vtuukyoelheu, ENT_COMPAT, 'UTF-8'));
			}
		}

		$Vojxlzliaqvj = $this->ID.date('YmdhMs').'.docx';
		
		$Vce3qe5d4etrProcessor->saveAs(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj);
		
		$this->download_file($Vojxlzliaqvj);
    
    }

    
    
    public function toExcel($Vrp2hm121vad){
    	
		if(!$this->checkSession()){
    		$this->ERROR_CODE[] = GRIDA000000008;
			$V5iamlredcl1 = array();
			$V5iamlredcl1['error_csv'] = GRIDA000000008;
			echo json_encode($V5iamlredcl1);
			exit;
    	}
		
    	$Vrydytfuco1s_grid_session = $Vrp2hm121vad['name_grid_session'];
    	 
    	unset($Vrp2hm121vad['name_grid_session']);
    	 
    	$Vh11xlmpqmtl_var = $_SESSION['grid_session']['GridSession'.$Vrydytfuco1s_grid_session];
    	 
    	
    	 
    	$Vbtkyqv2h4td = $Vh11xlmpqmtl_var;
    	 
    	unset($Vrp2hm121vad['security']);
    	 
    	 
    	
    	 
    	$Vvni2ohingsp = $this->dCrypt($Vbtkyqv2h4td);
    	 
    	 
    	
    	 
    	$Viyqurj5dafb = unserialize($Vvni2ohingsp);
    	 
    	 
    	
    	 
    	$this->GGLOBAL = $Viyqurj5dafb->GGLOBAL;
    	$this->TABLE_NAME = $Viyqurj5dafb->TABLE_NAME;
    	$this->PROPERTIES = $Viyqurj5dafb->PROPERTIES;
    	$this->PATH = $Viyqurj5dafb->PATH;
    	$this->TITLE = $Viyqurj5dafb->TITLE;
    	$this->NAME_FORM = $Viyqurj5dafb->NAME_FORM ;
    	$this->ID = $Viyqurj5dafb->ID;
    	$this->TEMPLATES = $Viyqurj5dafb->TEMPLATES; 
    	
			
		$Vpbbrp22rvlb = $Viyqurj5dafb->CONFIG_DB; 
		
		$this->select();
		 
		$V4ozid1iwarh = $this->gResult();
		 
		if($Vrp2hm121vad[GRID_EXPORT_SELECT_ID] == GRID_EXPORT_ALL){
			$Vsqvpkzrijnu = $this->ID."GRID_QUERY_BEFORE_LIMIT";
			$Vouy5qg4x3p0 = $_SESSION[$Vsqvpkzrijnu];
		}else{
			$Vsqvpkzrijnu = $this->ID."GRID_QUERY";
			$Vouy5qg4x3p0 = $_SESSION[$Vsqvpkzrijnu];
		}
		 
		unset($Vrp2hm121vad[GRID_EXPORT_SELECT_ID]);
		 
		$this->setColumns($V4ozid1iwarh);
		
		$Vi5mjeqfhbmz = new Model_engine_db($Vpbbrp22rvlb);
		$Vbje1pofprtgData = $Vi5mjeqfhbmz->query($Vouy5qg4x3p0);
		$Vi5mjeqfhbmz->__destruct();
		
		PHPExcel_Autoloader::register();
		
		$Vkr5xtrrgx4x = PHPExcel_IOFactory::createReader('Excel5');
		$Varxxy5mkq1u = $Vkr5xtrrgx4x->load(APPPATH.'grid/templates/'.$Vrp2hm121vad['GRID_SELECT_TEMPLATE']);
		
		$Vpaje3y3v2ay = new Model_engine_properties_template();
		$Vpaje3y3v2ay->tProperties($Vrp2hm121vad, $Varxxy5mkq1u,$this->TEMPLATES);
		
		$Vkyh4ai1jzyp = 5;
		
		
		foreach($Vbje1pofprtgData as $Vbsj1ug51i45 => $Vr4qnopjm5lhRow) {
			$Vbpa24lhhe1u = $Vkyh4ai1jzyp + $Vbsj1ug51i45;
			$Varxxy5mkq1u->getActiveSheet()->insertNewRowBefore($Vbpa24lhhe1u,1);
			
			$Varxxy5mkq1u->getActiveSheet()->setCellValue(PHPExcel_Cell::stringFromColumnIndex(0).$Vbpa24lhhe1u,$Vr4qnopjm5lhRow['RN']);
			
			unset($Vr4qnopjm5lhRow['RN']);
			unset($Vr4qnopjm5lhRow['CNT']);
			
			$Vsmh3spbnj12Index = 1;
			foreach ($Vr4qnopjm5lhRow as $Vsqvpkzrijnu => $Vtuukyoelheu){
				$Varxxy5mkq1u->getActiveSheet()->setCellValue(PHPExcel_Cell::stringFromColumnIndex($Vsmh3spbnj12Index).$Vbpa24lhhe1u,$Vtuukyoelheu);
				$Vsmh3spbnj12Index++;
			}
			
			$Vpaje3y3v2ay->tOperation($Vrp2hm121vad, $Varxxy5mkq1u, $this->TEMPLATES, $Vbpa24lhhe1u);
			
		}
		
		$Vm2bpfpriura = PHPExcel_IOFactory::createWriter($Varxxy5mkq1u, 'Excel5');
		
		$Vojxlzliaqvj = $this->ID.date('YmdhMs').'.xls';
		
		$Vm2bpfpriura->save(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj);
		
		$this->download_file($Vojxlzliaqvj);
  
    	
    }
    
    
    
    private function getExtension($V0i5ofi003ed) {
    	$Vhy14pjizgggension = explode('.', $V0i5ofi003ed);
    	$Vhy14pjizgggension = array_pop($Vhy14pjizgggension);
    	return $Vhy14pjizgggension;
    }

	

	private function download_file($Vojxlzliaqvj){
		
		$V3f0t3bz4bvn= $this->getExtension($Vojxlzliaqvj);		
    	
    	header('Content-Description: File Transfer');
		header("Content-Disposition: attachment; filename=$Vojxlzliaqvj");
		header('Expires: 0');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj));
		header('Cache-Control: max-age=60, must-revalidate');
		header('Set-Cookie: fileDownload=true; path=/');
    	
    	switch ($V3f0t3bz4bvn){
    		case 'docx':
				header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    			readfile(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj);
    			unlink(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj);
    			break;
    		case 'xls':
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    			readfile(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj);
    			unlink(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj);
    			break;
			case 'csv':
				header('Content-Encoding: UTF-8');
				header('Content-type: text/csv; charset=UTF-8');
				echo "\xEF\xBB\xBF";
    			readfile(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj);
    			unlink(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj);
    			break;
    		case 'pdf':
				header('Content-Type: application/octet-stream');
    			readfile(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj);
    			unlink(_GRID_PATH.'docs_temp/'.$Vojxlzliaqvj);
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