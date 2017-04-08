<div class="sidebar-footer hidden-small">
	<a id="id_mapas"  style="width: 100%; " data-toggle="tooltip" data-placement="top" title="Mapas"> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> </a>
</div>

<script>
	$("#id_mapas").click(function(){
		var url_mapas = $("#baseUrl").val()+'cartodb/cartodb';
		$(location).attr('href',url_mapas);
	});
</script>