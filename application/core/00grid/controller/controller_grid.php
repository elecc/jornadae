<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*

$Id: controller_grid.php, v 1.0.1 2015/07/16

Copyright (C) 2015 Guillermo Omar Martinez Toledo

This file is part of GRID

GRID is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

If you have any questions or comments, please email:

Guillermo Omar Martinez Toledo
motorokero.om@gmail.com
5526707307
Mexico DF

*/


require_once APPPATH .'libraries/gridLib/lib/class.constants_helper.php';
require_once APPPATH .'libraries/gridLib/lib/class.model_engine_db.php';
require_once APPPATH .'libraries/gridLib/lib/class.model_engine.php';
require_once APPPATH .'libraries/gridLib/lib/class.cripto_helper.php';

class Controller_grid extends CI_Controller{
	
	var $PATH;
	var $CLASS;
	
	
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION))
			session_start();		
	}
	
	public function sClass($class){
		$this->CLASS = $class;
	}
	public function sPATH($path){
		$this->PATH = $path;
	}
	
	//PARA LINUX
	public function gPath(){
		$path = explode('controllers/',$this->PATH);
		if(count($path) > 1){$path = $path[1];}
		if(is_array($path)){$path = strtolower($this->CLASS);
		}else{$path.= '/'.strtolower($this->CLASS);}
		return $path;
	}
	
	//PARA WINDOWS
	/*public function gPath(){
		$path = explode('controllers/',$this->PATH);
		return $path;
	}
	*/
	
	/**
	 * Build Model_engine
	 * */
	
	public function gModel_engine($config){
		$error = '';
		if(isset($config['db'])){
				if(isset($config['table']) && is_array($config['table'])){
						 if(isset($config['sPath'])){
								$db = new Model_engine_db($config['db']);
								if(is_bool($db->connected) && $db->connected){
			
									$eS = new Model_engine();
									$eS->sDB($db);
								 	$eS->sPATH('cgenerales/'.$config['sPath']);
									$eS->sConfig_DB($config['db']);
									if(isset($config['sIdTable']))	$eS->sIdTable($config['sIdTable']);
									if(isset($config['server_rute']))	$eS->sSERVERRUTE($config['server_rute']);
									if(isset($config['sTitle']))	$eS->sTitle($config['sTitle']);
									if(isset($config['sTemplates']))	$eS->sTemplates($config['sTemplates']);
									if(isset($config['properties']))	$eS->properties($config['properties']);
									if(isset($config['showNEW']))	$eS->showNEW($config['showNEW']);
									if(isset($config['showEDIT']))	$eS->showEDIT($config['showEDIT']);
									if(isset($config['showDELETE']))	$eS->showDELETE($config['showDELETE']);
									if(isset($config['showPOPUPCONTENT']['visible']) && isset($config['showPOPUPCONTENT']['url']) && isset($config['showPOPUPCONTENT']['show_popup_content_text'])){
										$eS->showPOPUPCONTENT($config['showPOPUPCONTENT']['visible'],$config['showPOPUPCONTENT']['url'],$config['showPOPUPCONTENT']['show_popup_content_text']);
									}
									if(isset($config['showCONTENT']['visible']) && isset($config['showCONTENT']['url']) && isset($config['showCONTENT']['show_content_text'])){
										$eS->showCONTENT($config['showCONTENT']['visible'],$config['showCONTENT']['url'],$config['showCONTENT']['show_content_text']);
									}
									if(isset($config['sIcons']) && $config['sIcons'])	$eS->sIcons();	
									if(isset($config['sToggleBTN'])) $eS->sToggleBTN($config['sToggleBTN']);	
									if(isset($config['setHeight'])) $eS->setHeight($config['setHeight']);	
									if(isset($config['setShowBackButton'])) $eS->setShowBackButton($config['setShowBackButton']);	
									if(isset($config['showEXPORT'])) $eS->showEXPORT($config['showEXPORT']);	
									
									$eS->table($config['table']);
									return $eS;
									
								}else{
									$error = $db->infoDB->message;
								}
								$db->__destruct();
						}else{
							$error = 'sPath no especificado';
						}
				 }else{
					$error = 'tables no especificado correctamente';
				 }
		}else{
			$error = 'Por favor especifique una base de datos';
		}
		return $error;
	}

	public function gGrid($config){
		$eS = $this->gModel_engine($config);
		if(!is_string($eS)){
			if(!$eS->ERRORSQL){
		
				$name = $eS->ID;
				
				$eS->setNameForm($name.'GridForm');
				
				$html = $eS->buildTable($name);
				$flex = $eS->buildFlex($name);
			
				$eS->initFuntions();
				
				$closeButtonBox = '{text:"Cancelar",click: function() { dialog_result.dialog("close"); }}';
				$closeButtonBoxDelete = '{text:"Cancelar",click: function() { diago_confirm.dialog("close"); }}';
				
				$script_box = '<script>'.
							  'function target_popup'.$name.'(form){'.
							  'var jsonData = {}; '.
							  'for (var i=0; i<form.length; i++){'.
							  'if(form.elements[i].value != null){'.
							  'jsonData[form.elements[i].name] = form.elements[i].value;'.
							  '}'.
							  '}'.
							  'var url = form.action;'.
					   		  'var posting = $.post( url,jsonData);'.
					   		  'posting.done(function( data ) {'.
					  		  'bootbox.dialog({'.
					  		  'title: "'.$eS->TITLE.'",'.
					  		  'message:data,'.
					  		  '
					  		  buttons: {
				                    success: {
				                        label: "Guardar",
				                        className: " btn btn-primary pink",
				                        callback: function () {
				                           var form = $("#'.$eS->getNameForm().'");
										   var vUrl = form.attr("action");
										   var dataString = form.serialize(); 
										   
										   $("#'.$eS->getNameForm().'").validate();
										   var isvalidate = $("#'.$eS->getNameForm().'").valid();
											
										   if(isvalidate){
											   $.ajax({
											   	type:"POST",
											   	dataType: "json",
											   	url:vUrl,
											   	data:dataString,
											   	success: function(data){
											   		 if(data.error){
											   		 	 $("#error-modal").empty(); 
											   		 	 $("#error-modal").text(data.error); 
											   		 	 $("#error-modal").dialog({ modal: true }); 
													 }else if(data.success){
													 	 $("#'.$name.'").flexReload(); 
													}  
											   }});
										   }else{
										   	return false;
										   }
									    }
				                    },
				                    cancel:{
				                    	 label: "Cancelar",
				                         className: "btn btn-primary pink",
				                         callback: function () {
				                     		return true;
									     }
				                    }
				                }
					  		  '.
					  		  '});'.
					  		  '});'.
							  '}'.
							  '</script>';
				
				$script_box_delete = '<script>'.
									  'function target_popupDelete'.$name.'(form){'.
									  'bootbox.dialog({'.
							  		  'title: "Eliminar",'.
							  		  'message:"¿Esta seguro de eliminar el registro?",'.
							  		  '
							  		  buttons: {
						                    success: {
						                        label: "Aceptar",
						                        className: " btn btn-primary pink",
						                        callback: function () {
						                           var vUrl = form.action;
												   var jsonData = {};
												   for (var i=0; i<form.length; i++){
												  	if(form.elements[i].value != null){
												  		jsonData[form.elements[i].name] = form.elements[i].value;
												    }
												   }
												   var posting = $.post( vUrl,jsonData);  
												   posting.done(function( data ) {
												   		$("#'.$name.'").flexReload(); 
												   });
											    }
						                    },
						                    cancel:{
						                    	 label: "Cancelar",
						                         className: "btn btn-primary pink",
						                         callback: function () {
						                     		return true;
											     }
						                    }
						                }
							  		  '.
							  		  '});'.
							  		  '}'.
									  '</script>';
						
				$script_box_content = '<script>'.
									  'function target_popupPOPUPCONTENT'.$name.'(form){'.
									  'var jsonData = {}; '.
									  'for (var i=0; i<form.length; i++){'.
									  'if(form.elements[i].value != null){'.
									  'jsonData[form.elements[i].name] = form.elements[i].value;'.
									  '}'.
									  '}'.
									  'var url = form.action;'.
							   		  'var posting = $.post( url,jsonData);'.
							   		  'posting.done(function( data ) {'.
							  		  'bootbox.dialog({'.
							  		  'title: "'.$eS->TITLE.'",'.
							  		  'message:data,'.
							  		  '
							  		  buttons: {
						                    cancel:{
						                    	 label: "Cancelar",
						                         className: "btn btn-primary pink",
						                         callback: function () {
						                     		return true;
											     }
						                    }
						                }
							  		  '.
							  		  '});'.
							  		  '});'.
									  '}'.
									  '</script>';
				
				$script_box_export = '<script>'.
									  'function target_popupExport'.$name.'(form){'.
									  'var jsonData = {}; '.
									  'for (var i=0; i<form.length; i++){'.
									  'if(form.elements[i].value != null){'.
									  'jsonData[form.elements[i].name] = form.elements[i].value;'.
									  '}'.
									  '}'.
									  'jsonData["showPDF'.$name.'"] = $("#showPDF'.$name.'").val();'.
									  'var url = form.action;'.
							   		  'var posting = $.post( url,jsonData);'.
							   		  'posting.done(function( data ) {'.
							  		  'bootbox.dialog({'.
							  		  'title: "'.$eS->TITLE.'",'.
							  		  'message:data,'.
							  		  '
							  		  buttons: {
						                    cancel:{
						                    	 label: "Cancelar",
						                         className: "btn btn-primary pink",
						                         callback: function () {
						                     		return true;
											     }
						                    }
						                }
							  		  '.
							  		  '});'.
							  		  '});'.
									  '}'.
									  '</script>';
				
				
				
				
				$script_box_template = '<script>'.
									  'function target_popupTemplate'.$name.'(form){'.
									  'var jsonData = {}; '.
									  'for (var i=0; i<form.length; i++){'.
									  'if(form.elements[i].value != null){'.
									  'jsonData[form.elements[i].name] = form.elements[i].value;'.
									  '}'.
									  '}'.
									  'var url = form.action;'.
							   		  'var posting = $.post( url,jsonData);'.
							   		  'posting.done(function( data ) {'.
							  		  'bootbox.dialog({'.
							  		  'title: "'.$eS->TITLE.'",'.
							  		  'message:data,'.
							  		  '
							  		  buttons: {
						                    success: {
						                        label: "Descargar",
						                        className: " btn btn-primary pink",
						                        callback: function () {
						                           var form = $("#'.$eS->getNameForm().'");
												   var vUrl = form.attr("action");
												   var dataString = form.serialize(); 
												   
												    $.fileDownload($("#'.$eS->getNameForm().'").prop("action"), { preparingMessageHtml: "Estamos preparando su informe , por favor espere...",failMessageHtml: "Hubo un problema al generar el informe, por favor intente de nuevo.",httpMethod: "POST",data: dataString }); e.preventDefault();
												   
											    }
						                    },
						                    cancel:{
						                    	 label: "Cancelar",
						                         className: "btn btn-primary pink",
						                         callback: function () {
						                     		return true;
											     }
						                    }
						                }
							  		  '.
							  		  '});'.
							  		  '});'.
									  '}'.
									  '</script>';
				
				$viewContent = '<script>function show_content'.$name.'(form){
									 form.submit();
								}</script>';
				
				$delete_dialog = "<div id='dialog-confirm' title='Eliminar' style='display:none;'>".
							   "<p><span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>&iquest;Esta seguro de eliminar el registro?</p>".
							   "</div>";
				
				$error_modal = '<div id="error-modal" title="Error" style="display: none;">
								    
							   </div>';
				
				$result = '<div id="result" ></div>';
				
				$inputPDF = '<input type="hidden" value="" id="showPDF'.$name.'" name="showPDF'.$name.'"></input>';
				
				if($eS->getShowBackButton()){
					$back_button = $eS->buildBackButton();
				}else{
					$back_button = '';
				}
				
				return $html.$back_button.$delete_dialog.$error_modal.$result.$script_box.$script_box_delete.$script_box_content.$script_box_export.$script_box_template.$viewContent.$inputPDF.' <script>$(document).ready(function() {'.$flex.'});</script>';
			
			}else{
				$error = '';
				foreach ($eS->ERROR_CODE as $value){
					$error.=$value."<br>";
				}
			}
		}else{
			$error = $eS;
		}
		return $error;
	}

	public function gForm($cofig){
		$eS = $this->gModel_engine($cofig);
		$name = $eS->ID;
		
		$eS->setNameForm($name.'GridForm');
		
		$html = $eS->buildTable($name);
		
		$post = array();
		$post['security'] = '';
		$post['name_grid_session'] = $name;
		
		$form = $eS->create($post);
		$form = str_replace('</form>', '', $form);
		$endForm = '</form>';
		
		$inputHiddenForm = '<input type="hidden" name="FORM'.$name.'">';
		
		$html = $form.$eS->getFormButtonSubmit($eS->getNameForm()).$inputHiddenForm.$endForm;
		
		return $html;
	}
	
	public function engine(){
		if(isset($_GET['security'])){
				if(base64_decode($_GET['security']) == true){
					$text = base64_decode($_GET['security']);
					try{
						$text = dCrypt($text);
						if(!is_bool($text)){
							if(trim($text) == 'create'){
								$this->create();
							}else if(trim($text) == 'save'){
								$this->save();
							}else if(trim($text) == 'update'){
								$this->update();
							}else if(trim($text) == 'edit'){
								$this->edit();
							}else if(trim($text) == 'delete'){
								$this->delete();
							}else if(trim($text) == 'export'){
								$this->export();
							}else if(trim($text) == 'template'){
								$this->template();
							}else if(trim($text) == 'csv'){
								$this->csv();
							}else if(trim($text) == 'pdf'){
								$this->pdf();
							}else if(trim($text) == 'toTemplate'){
								$this->toTemplate();
							}
						}
					}catch(Exception $e){
						echo "Acci&oacute;n no permitida";
					}
				}
		}else{
			echo "Acci&oacute;n no permitida";
		}
	}
	
	public function create(){
		$mE = new Model_engine();
		echo $mE->create($_POST);
	}
					  
	public function edit(){
		$mE = new Model_engine();
		echo $mE->edit($_POST);
	}
	
	public function save(){
		$mE = new Model_engine();
		echo $mE->save($_POST);
	}
	
	public function update(){
		$mE = new Model_engine();
		echo $mE->update($_POST);
	}
	
	public function delete(){
		$mE = new Model_engine();
		echo $mE->deleteRecord($_POST);
	}
	
	public function export(){
		$mE = new Model_engine();
		echo $mE->export($_POST);
	}
	
	public function csv(){
		$mE = new Model_engine();
		return $mE->csv($_POST);
	}
	
	public function pdf(){
		$mE = new Model_engine();
		return $mE->pdf($_POST);
	}
	
	public function template(){
		$mE = new Model_engine();
		echo $mE->template($_POST);
	}
	
	public function toTemplate(){
		$mE = new Model_engine();
		$mE->toTemplate($_POST);
	}
	
}
	