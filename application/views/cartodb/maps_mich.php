<?php

?>
<script type="text/javascript">
/*(function() {})() */
	var layerbase = 'http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png';
    var viz = 'http://cartodb.cdmx.gob.mx/user/sepe/api/v2/viz/4346c546-63d3-11e6-b522-8ef8e22532d9/viz.json';

	var mapdiv = 'maps';
	var param = {
		user: 'sepe'
	};

	mapHeight = document.getElementsByTagName('body')[0].clientHeight;
    posHeight = $("#maps").position().top;
    document.getElementById("maps").style.height =  (mapHeight-posHeight-25) + "px";

	var  objmap = new cdmxCarto(layerbase,viz,mapdiv,param);
	var fncallback = function(){

    };
	objmap.renderMap(fncallback);
	
</script>