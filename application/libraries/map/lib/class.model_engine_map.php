<?php 

if (!defined('_MAP_PATH')) define('_MAP_PATH', dirname(preg_replace('/\\\\/','/',__FILE__)) . '/');

require_once _MAP_PATH.'/class.model_map.php';

class Model_engine_map {
    var $ID = 'mapa';
    var $WIDTH = '500px';
    var $HEIGHT = '500px';
    function __construct() {
     
    }
    
    public function setWidth($width){
    	$this->WIDTH = $width;
    }
    
    public function setHeight($height){
    	$this->HEIGHT = $height;
    }
    
    public function SimpleMap($id,$lat,$lng,$title='Mapa'){
    	$this->ID = $id;
    	$map = $this->buildJSSimpleMap( $lat, $lng,$title);
    	$map.= $this->map();
    	return $map;
    }
    
    public function buildJSSimpleMap($lat,$lng,$title='Mapa'){
    	
    	$js = "<script type='text/javascript' > function $this->ID() {
		    		var location = {lat: $lat, lng: $lng};
		    		map = new google.maps.Map(document.getElementById('$this->ID'), {
		    			center: location,
		    			zoom: 15
		    		});
		    		var marker = new google.maps.Marker({
		    			position: location,
		    			map: map,
		    			title:'$title'
		    		});
		    	}</script>";
    	
    	return $js;
    }
    
    public function CompleteMap($id,$js,$title='Mapa'){
    	$this->ID = $id;
    	$map = $this->buildJSCompleMap($js);
    	$map.=$this->map();
    	return $map;
    }
    
    public function buildJSCompleMap($js){
    	
    	return $js;
    }
    
    public function map(){
		$map = new Model_map();
		$map->setId($this->ID);
		$map->setStyle("width: $this->WIDTH; height: $this->HEIGHT");
		$map->buildDiv();
		return  $map->getDiv();
	}
	
}
?>