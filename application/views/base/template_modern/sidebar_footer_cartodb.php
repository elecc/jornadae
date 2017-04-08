<div class="sidebar-footer hidden-small">
	<a id="id_mapas"  style="width: 100%; " data-toggle="tooltip" data-placement="top" title="Salir de Mapas"> <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> </a>
</div>

<script>
	$("#id_mapas").click(function(){
		var url_mapas = $("#baseUrl").val()+'inicio/estadisticas';
		$(location).attr('href',url_mapas);
	});
</script>