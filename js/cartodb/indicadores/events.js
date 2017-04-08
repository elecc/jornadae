$(function(){
	
	$("#cmbCategoria").on("change",function(){
		//maps._map.spin(true);
		switch($(this).val()){
			case "total":
				maps.tosql(param,"select variable,lower(total) as total from indicadores_science where indicador = 'POBLACION'",lstVariable,[]);
				break;
			case "hombre":
				maps.tosql(param,"select variable,lower(hombre) as total from indicadores_science where indicador = 'POBLACION'",lstVariable,[]);
				break;	
			case "mujer":
				maps.tosql(param,"select variable,lower(mujer) as total from indicadores_science where indicador = 'POBLACION'",lstVariable,[]);
				break;	
		}
	});

	$("#cmbIndicador").on("change",function(){
		//maps._map.spin(true);
		switch($(this).val()){
			case "POBLACION":
				$("<option/>",{value:"total",text:"Total"}).appendTo("#cmbCategoria");    
				$("<option/>",{value:"hombre",text:"Hombre"}).appendTo("#cmbCategoria");    
				$("<option/>",{value:"mujer",text:"Mujer"}).appendTo("#cmbCategoria");
				$("#cmbCategoria option:first").prop("selected",true);
				$("#cmbCategoria").trigger("change");
				break;
			case "MIGRACION":

				maps.tosql(param,"select variable,lower(total) as total from indicadores_science where indicador = '"+ $(this).val() +"'",lstVariable,[]);

				break;
			case "VIVIENDA":

				maps.tosql(param,"select variable,lower(total) as total from indicadores_science where indicador = '"+ $(this).val() +"'",lstVariable,[]);
				break;
		}
		
	});

	$(".dropdown-menu > li > a").on("click",function(){
		//maps._map.spin(true);
		$("#btnSearchType").attr("data-search",$(this).attr("data-value"));
		$("#btnSearchType").html($(this).attr("data-value")+'<span class="caret"></span>');
	});

	$("#search").autocomplete({
		source: function( request, response ) {
			var searchtype = $("#btnSearchType").attr("data-search");
			var respdata = function(data,response){
				response(data.rows);
			}
			switch(searchtype){
				case "municipio":
					maps.tosql(param,"select cartodb_id as id,nombre as label,nombre as value from mich_municipal where nombre ilike '%" + request.term +"%'",respdata,[response]);
					break;
				case "seccion":
					maps.tosql(param,"select cartodb_id as id,seccion as label,seccion as value from mich_seccion where seccion::text ilike '" + request.term +"%'",respdata,[response]);
					break;
			}
				//response( data );
		},
		minLength: 2,
		select: function( event, ui ) {
			var searchtype = $("#btnSearchType").attr("data-search");
			switch(searchtype){
				case "municipio":
					//maps.tosql(param,"select cartodb_id as id,nombre as label,nombre as value from mich_municipal where nombre ilike '%" + request.term +"%'",response,[]);
					break;
				case "seccion":
					//bounry("tjn_coldel","cartodb_id = "+ ui.item.id);
					break;
			}	
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});

	$("#search").bind('keypress', function(e) {
		if(e.keyCode==13){
		}
	});

	$("#btnSearch").on("click",function(){
		//maps._map.spin(true);
		var searchtype = $("#btnSearchType").attr("data-search");
		switch(searchtype){
			case "municipio":
				maps.bounry(param,"mich_municipal","nombre ilike '"+$("#search").val()+"'",maps._layers,maps._map);
				maps.selectFeature("mich_municipal","nombre ilike '"+$("#search").val()+"'",maps);
				break;
			case "seccion":
				maps.bounry(param,"mich_seccion","seccion = "+$("#search").val(),maps._layers,maps._map);
				maps.selectFeature("mich_seccion","seccion = "+$("#search").val(),maps);
				break;
		}
	});

	$("#lstVariable").on("change","input[name=indicador]",function(){
		mapChange();
	});
});