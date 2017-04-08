<div class="row">
	<div class="col-sm-12 col-md-12">
		<div id="dvhead">
			<h1 style="float: left;">Simpatizantes / Votos requeridos</h1>
		</div>
	</div>
	<p>&nbsp;</p>
	<div id="dvmaps" class="col-sm-12 col-md-12">
			<div id="maps"></div>
			<div id="dvLeyend" class="cartodb-legend category" style="display: none;"></div>
	</div>
	<div class="col-sm-12 col-md-12">
		<div id="graphmax" style="width: 100%;height: 175px;"></div>
	</div>

</div>
    <script type="text/javascript" src="<?php echo base_url('js/cartodb/simpatizantes/events.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/cartodb/simpatizantes/controls.js');?>"></script>

<script type="text/javascript">
	var layerbase = 'http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png';
	var viz = 'https://finanzasdf.carto.com/u/sepe/api/v2/viz/c5530f40-e5c9-11e6-a975-0e9c441fa3f5/viz.json';
	var mapdiv =  'maps';
	var param = {
	        user:"sepe",
	        api_key:"cfa2452ab0524c27f3550b99f2dc82066da90a04"
	};

	var mapseccion = '';
	var mapdel = ''

 	mapHeight = document.getElementsByTagName('body')[0].clientHeight;
    posHeight = $("#maps").position().top;
    $("#maps").css("height",(mapHeight-posHeight-25) + "px");
    $("#maps").css("min-height","400px");

    maps = new cdmxCarto(layerbase,viz,mapdiv,param);
    var fncallback = function(layer){
        layer.getSubLayer(0).setInteraction(true);
        layer.getSubLayer(0).on('featureClick', function(e, latlng, pos, data, layer) {
         hideMsg();   
        	var tipo = $("#tipoEleccion").val().toLowerCase();
    		var anio = $("#anioEleccion").val();
            mapseccion = data.seccion;
            mapdel = data.del;

            $("#txtSearch").val(mapseccion);
            $("#btnSearch").trigger('click');

            maps.selectFeature("mx_secciones","seccion = " + mapseccion,maps);
    		graph(tipo,anio,mapseccion,mapdel);
        });

        btnGrp.addTo(maps._map);
        
        maps._layers = layer;

    };

    maps.renderMap(fncallback);
	
</script>