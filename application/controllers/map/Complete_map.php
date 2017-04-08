<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Complete_map extends Template_controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$id="initMap";
		$js = "<script type='text/javascript'> 
				  var map;
				  var infowindow;			  
				  
				  function $id(){
  				  var sefin = {lat: 19.4233254, lng: -99.1508042};

  				  map = new google.maps.Map(document.getElementById('$id'), {
    			  center: sefin,
    			  zoom: 15
  				  });  				  
  				  
  				  var marker = new google.maps.Marker({
		    			position: sefin,
		    			map: map,
		    			title:'Mapa de Ejemplo'
		    		});

  				  infowindow = new google.maps.InfoWindow();

  				  var service = new google.maps.places.PlacesService(map);
  				  service.nearbySearch({
    			  location: sefin,
    			  radius: 1000,
    			  types: ['subway_station']
  				   }, callback);
				  }

				  function callback(results, status) {
				     if (status === google.maps.places.PlacesServiceStatus.OK) {
				        for (var i = 0; i < results.length; i++) {
				      		createMarker(results[i]);
				    	  }
				  		}
					}
				
				  function createMarker(place) {
				  	var placeLoc = place.geometry.location;
				  	var marker = new google.maps.Marker({
				    	map: map,
				    	position: place.geometry.location
				  	});
					
				  google.maps.event.addListener(marker, 'click', function() {
				    infowindow.setContent(place.name);
				    infowindow.open(map, this);
				  });
				 }</script>";
				
		
		$this->load->library('map');
		$map = new Map();
		$map = $map->CompleteMap($id,$js,'');
		$view = $this->load->view('documentation_map_views/complete_map','',TRUE);
		$content = $this->load->view('documentation_map_views/base_view',array('title'=>$title,'view'=>$view,'map'=>$map),TRUE);
		$this->set_menu('sidebar_menu_map');
		$this->set_content($content);
		$this->build();
	}
}
