var lstVariable = function(data){
	_.templateSettings.variable = "rc";
    var template = _.template($("#tplVariable").html());
    $("#lstVariable").html(template(data.rows));
    $("input[name=indicador]:first").prop("checked",true);
    mapChange();
    
}

var mapChange = function(){
	//maps._map.spin(true);
	var table = "";
    switch($("#cmbIndicador").val()){
			case "POBLACION":
				table = "mich_manzanas"
				break;
			case "MIGRACION":
				table = "mich_cpv2010_manzanas_migracion";
				break;
			case "VIVIENDA":
				table = "mich_cpv2010_manzanas_viviendas"
				break;
		}

   	var field = "";
   	field = $("input[name=indicador]:checked").val();
   	var txtsql = mapSql(table,field);
   	var txtcss = mapCartocss(field);
   	maps.toLyrSET(4,{sql: txtsql,cartocss: txtcss});
}

var mapSql = function(table,field){
	_.templateSettings.variable = "rc";
	var template = _.template($("#tplSql").html());
	var sql = (template({table:table,field:field}));
	return sql;
}

var mapCartocss = function(variable){
	_.templateSettings.variable = "rc";
	var template = _.template($("#tplCartoCSS").text());
	var cartocss = template({variable:variable});
	return cartocss;
}