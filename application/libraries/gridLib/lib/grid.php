<?php



if (!defined('_GRID_PATH')) define('_GRID_PATH', dirname(preg_replace('/\\\\/','/',__FILE__)) . '/');
require_once _GRID_PATH.'class.constants_helper.php';
require_once _GRID_PATH.'class.model_engine_db.php';
require_once _GRID_PATH.'class.model_engine.php';


class Grid {
	
	var $Vcetvdjvmsya;
	var $Vmrph1b0x11n;


	function __construct() {
		
		if(!isset($_SESSION))
			session_start();
		
	}

	public function sClass($Vosxxeprqef2){
		$this->CLASS = $Vosxxeprqef2;
	}
	public function sPATH($Vgm0d5xxtxtk){
		$this->PATH = $Vgm0d5xxtxtk;
	}
	
	public function gPath(){
		$Vgm0d5xxtxtk = explode('controllers/',$this->PATH);
		if(count($Vgm0d5xxtxtk) > 1){$Vgm0d5xxtxtk = $Vgm0d5xxtxtk[1];}
		if(is_array($Vgm0d5xxtxtk)){$Vgm0d5xxtxtk = strtolower($this->CLASS);
		}else{$Vgm0d5xxtxtk.= '/'.strtolower($this->CLASS);}
		return $Vgm0d5xxtxtk;
	}
	
	
	
	public function gModel_engine($V5dpethpb5ks){
		$Vr34v15b45kj = '';
		if(isset($V5dpethpb5ks['db'])){
				if(isset($V5dpethpb5ks['tables']) && is_array($V5dpethpb5ks['tables'])){
						 if(isset($V5dpethpb5ks['sPath'])){
								$Vle3ldyht4v2 = new Model_engine_db($V5dpethpb5ks['db']);
								if(is_bool($Vle3ldyht4v2->connected) && $Vle3ldyht4v2->connected){
			
									$Vdyvj4aimcpq = new Model_engine();
									$Vdyvj4aimcpq->sDB($Vle3ldyht4v2);
								 	$Vdyvj4aimcpq->sPATH($V5dpethpb5ks['sPath']);
									$Vdyvj4aimcpq->sConfig_DB($V5dpethpb5ks['db']);
									if(isset($V5dpethpb5ks['id_table']))	$Vdyvj4aimcpq->sIdTable($V5dpethpb5ks['id_table']);
									if(isset($V5dpethpb5ks['server_rute']))	$Vdyvj4aimcpq->sSERVERRUTE($V5dpethpb5ks['server_rute']);
									if(isset($V5dpethpb5ks['sTitle']))	$Vdyvj4aimcpq->sTitle($V5dpethpb5ks['sTitle']);
									
									
									$Vdyvj4aimcpq->table($V5dpethpb5ks['tables']);
									return $Vdyvj4aimcpq;
									
								}else{
									$Vr34v15b45kj = $Vle3ldyht4v2->infoDB->message;
								}
								$Vle3ldyht4v2->__destruct();
						}else{
							$Vr34v15b45kj = 'sPath no especificado';
						}
				 }else{
					$Vr34v15b45kj = 'tables no especificado correctamente';
				 }
		}else{
			$Vr34v15b45kj = 'Por favor especifique una base de datos';
		}
		return $Vr34v15b45kj;
	}
			
	
	
	public function gGrid($V5dpethpb5ks){
		$Vdyvj4aimcpq = $this->gModel_engine($V5dpethpb5ks);
		if(!is_string($Vdyvj4aimcpq)){
			if(!$Vdyvj4aimcpq->ERRORSQL){
		
				$Vonr0df11plf = $Vdyvj4aimcpq->ID;
				
				$Vdyvj4aimcpq->setNameForm($Vonr0df11plf.'GridForm');
				
				$Vmicjkamk4ir = $Vdyvj4aimcpq->buildTable($Vonr0df11plf);
				$Vclfcatlf4dx = $Vdyvj4aimcpq->buildFlex($Vonr0df11plf);
			
				$Vdyvj4aimcpq->initFuntions();
				
				$Vitfnx23mygi = '{text:"Cancelar",click: function() { dialog_result.dialog("close"); }}';
				$Vitfnx23mygiDelete = '{text:"Cancelar",click: function() { diago_confirm.dialog("close"); }}';
				
				$Vctagkvy4yny = '<script>function target_popup'.$Vonr0df11plf.'(form) { var jsonData = {}; '.
					   'for (var i=0; i<form.length; i++){'.
					   'if(form.elements[i].value != null){'.
					   'jsonData[form.elements[i].name] = form.elements[i].value;'.
					   '}'.
					   '}'.
					   'var url = form.action;'.
					   'var posting = $.post( url,jsonData);'.
					   'posting.done(function( data ) {'.
					   '$( "#result" ).empty().append( data );'.
					   'var dialog_result = $( "#result" ).dialog({title:"'.$Vdyvj4aimcpq->TITLE.'",width: 600,height: 500,modal:true,close:function(){$(".tipsy").hide();}, buttons: ['.$Vitfnx23mygi.',{text:"Guardar","class":"validador", "rel":"'.$Vdyvj4aimcpq->getNameForm().'",click: function() { var form = $("#'.$Vdyvj4aimcpq->getNameForm().'");  if(validaForm("'.$Vdyvj4aimcpq->getNameForm().'")){ var vUrl = form.attr("action"); var dataString = form.serialize(); $.ajax({type:"POST",dataType: "json",url:vUrl,data:dataString,success: function(data){ if(data.error){ $("#error-modal").empty(); $("#error-modal").text(data.error); $("#error-modal").dialog({ modal: true }); }else if(data.success){ dialog_result.empty(); dialog_result.dialog("close"); $("#'.$Vonr0df11plf.'").flexReload(); }  }}); }}}]   });'.
					   '});}</script>';
				
				
				$Vctagkvy4ynyDelete = '<script>function target_popupDelete'.$Vonr0df11plf.'(form) {'.
						'var diago_confirm = $( "#dialog-confirm" ).dialog({resizable:false,height:180,modal:true,buttons:['.$Vitfnx23mygiDelete.',{text:"Aceptar",click:function(){  var vUrl = form.action; var jsonData = {}; for (var i=0; i<form.length; i++){ if(form.elements[i].value != null){ jsonData[form.elements[i].name] = form.elements[i].value; }} var posting = $.post( vUrl,jsonData, function( data ) {}, "json"); posting.done(function( data ) { if(data.error){ $("#error-modal").empty(); $("#error-modal").text(data.error); $("#error-modal").dialog({ modal: true }); }else if(data.success){ diago_confirm.dialog("close"); $("#'.$Vonr0df11plf.'").flexReload(); } });   }}]});'.
						'}</script>';
		
				
				$Vctagkvy4ynyPDF = '<script>function target_popupPOPUPCONTENT'.$Vonr0df11plf.'(form) { var jsonData = {}; '.
					   'for (var i=0; i<form.length; i++){'.
					   'if(form.elements[i].value != null){'.
					   'jsonData[form.elements[i].name] = form.elements[i].value;'.
					   '}'.
					   '}'.
					   'var url = form.action;'.
					   'var posting = $.post( url,jsonData);'.
					   'posting.done(function( data ) {'.
					   '$( "#result" ).empty().append( data );'.
					   'var dialog_result = $( "#result" ).dialog({title:"'.$Vdyvj4aimcpq->TITLE.'",width: 800,height: 700,modal:true, buttons: ['.$Vitfnx23mygi.']   });'.
					   '});}</script>';
				
				
				
				
				$Vctagkvy4ynyExport = '<script>function target_popupExport'.$Vonr0df11plf.'(form) { var jsonData = {}; '.
					   'for (var i=0; i<form.length; i++){'.
					   'if(form.elements[i].value != null){'.
					   'jsonData[form.elements[i].name] = form.elements[i].value;'.
					   '}'.
					   '}'.
					   'jsonData["showPDF'.$Vonr0df11plf.'"] = $("#showPDF'.$Vonr0df11plf.'").val();'.
					   'var url = form.action;'.
					   'var posting = $.post( url,jsonData);'.
					   'posting.done(function( data ) {'.
					   '$( "#result" ).empty().append( data );'.
					   'var dialog_result = $( "#result" ).dialog({title:"'.$Vdyvj4aimcpq->TITLE.'",width: 600,height: 500,modal:true, buttons: ['.$Vitfnx23mygi.']});'.
					   '});}</script>';
				
				$Vctagkvy4ynyTemplate = '<script>function target_popupTemplate'.$Vonr0df11plf.'(form) { var jsonData = {}; '.
						'for (var i=0; i<form.length; i++){'.
						'if(form.elements[i].value != null){'.
						'jsonData[form.elements[i].name] = form.elements[i].value;'.
						'}'.
						'}'.
						'var url = form.action;'.
						'var posting = $.post( url,jsonData);'.
						'posting.done(function( data ) {'.
						'$( "#result" ).empty().append( data );'.
						'var dialog_result = $( "#result" ).dialog({title:"'.$Vdyvj4aimcpq->TITLE.'",width: 600,height: 500,modal:true, buttons: ['.$Vitfnx23mygi.',{text:"Descargar",click: function(e) { var form = $("#'.$Vdyvj4aimcpq->getNameForm().'");  var vUrl = form.attr("action"); var dataString = form.serialize();   $.fileDownload($("#'.$Vdyvj4aimcpq->getNameForm().'").prop("action"), { preparingMessageHtml: "Estamos preparando su informe , por favor espere...",failMessageHtml: "Hubo un problema al generar el informe, por favor intente de nuevo.",httpMethod: "POST",data: dataString }); e.preventDefault(); }}]   });'.
						'});}</script>';
				
				$Vhrbklxlbsip = '<script>function show_content'.$Vonr0df11plf.'(form){
									 form.submit();
								}</script>';
				
				$Vbvyzk4g1hof = "<div id='dialog-confirm' title='Eliminar' style='display:none;'>".
							   "<p><span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>&iquest;Esta seguro de eliminar el registro?</p>".
							   "</div>";
				
				$Vr34v15b45kjModal = '<div id="error-modal" title="Error" style="display: none;">
								    
							   </div>';
				
				$Vyd4lo23gpo4 = '<div id="result" ></div>';
				
				$V4zskbd3h2s0 = '<input type="hidden" value="" id="showPDF'.$Vonr0df11plf.'" name="showPDF'.$Vonr0df11plf.'"></input>';
				
				if($Vdyvj4aimcpq->getShowBackButton()){
					$Vlym1maymy55 = $Vdyvj4aimcpq->buildBackButton();
				}else{
					$Vlym1maymy55 = '';
				}
				
				return $Vmicjkamk4ir.$Vlym1maymy55.$Vbvyzk4g1hof.$Vr34v15b45kjModal.$Vyd4lo23gpo4.$Vctagkvy4yny.$Vctagkvy4ynyDelete.$Vctagkvy4ynyPDF.$Vctagkvy4ynyExport.$Vctagkvy4ynyTemplate.$Vhrbklxlbsip.$V4zskbd3h2s0.' <script>$(document).ready(function() {'.$Vclfcatlf4dx.'});</script>';
			
			}else{
				$Vr34v15b45kj = '';
				foreach ($Vdyvj4aimcpq->ERROR_CODE as $Vllne4ankrll){
					$Vr34v15b45kj.=$Vllne4ankrll."<br>";
				}
			}
		}else{
			$Vr34v15b45kj = $Vdyvj4aimcpq;
		}
		return $Vr34v15b45kj;
	}
		
	public function create(){
		$Vinxxqxcxoe0 = new Model_engine();
		echo $Vinxxqxcxoe0->create($_POST);
	}
					  
	public function edit(){
		$Vinxxqxcxoe0 = new Model_engine();
		echo $Vinxxqxcxoe0->edit($_POST);
	}
	
	public function save(){
		$Vinxxqxcxoe0 = new Model_engine();
		echo $Vinxxqxcxoe0->save($_POST);
	}
	
	public function update(){
		$Vinxxqxcxoe0 = new Model_engine();
		echo $Vinxxqxcxoe0->update($_POST);
	}
	
	public function delete(){
		$Vinxxqxcxoe0 = new Model_engine();
		echo $Vinxxqxcxoe0->deleteRecord($_POST);
	}
	
	public function export(){
		$Vinxxqxcxoe0 = new Model_engine();
		echo $Vinxxqxcxoe0->export($_POST);
	}
	
	public function csv(){
		$Vinxxqxcxoe0 = new Model_engine();
		return $Vinxxqxcxoe0->csv($_POST);
	}
	
	public function pdf(){
		$Vinxxqxcxoe0 = new Model_engine();
		return $Vinxxqxcxoe0->pdf($_POST);
	}
	
	
		
	
}



?>
