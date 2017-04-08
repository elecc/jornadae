<h1>Configuración Básica</h1>

<p>
Cargar la libreria map
</p>

<pre class="prettyprint">
$this->load->library('map');
</pre>

<p>
Definir java script del mapa
</p>

<pre class="prettyprint">
 
 $js = "&lt;script type='text/javascript'> 
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
				 }
			&lt;/script>";
 
</pre>



<p>
Crear nuevo objeto de la libreria map y hacer referencia a la funcion CompleteMap
</p>

<pre class="prettyprint">
$id="initMap"; // id del map
$map = new Map();
$map = $map->CompleteMap($id,$js,'');
</pre>

<p><h2>Codigo Final</h2></p>

<pre class="prettyprint">
<?php

 $file = file(APPPATH.'controllers/map/Complete_map.php');
 unset($file[0]);

 foreach ($file as $key => $value) {
     echo $value;
 }

?>
</pre>
