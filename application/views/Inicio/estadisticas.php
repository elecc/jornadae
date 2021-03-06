<?php
$id_perfil = $this->session->userdata['ss_id_perfil'];
?>

<div class="row tile_count">
	<div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> Total de Simpatizantes</span>
		<div class="count">932</div>
	</div>
	
	<div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
		<span class="count_top"><i class="fa fa-user"></i> Total de Visitas</span>
		<div class="count green">235</div>
	</div>
</div>
  
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel tile fixed_height_320">
			<div class="x_title">
				<h2>Estadisticas</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li>
						<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li>
						<a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="dashboard-widget-content">
					<ul class="quick-list">
						<?php
						if($id_perfil == 1){			?>
							<li><i class="fa fa-code"></i><a href="#">Datos del Partido Politico</a></li>			
							<li><i class="fa fa-code"></i><a href="#">Usuarios</a></li>
							<?php			}
						
						if($id_perfil == 2){			?>
							<li><i class="fa fa-code"></i><a href="#">Crear jornada Electoral</a></li>			
							<li><i class="fa fa-code"></i><a href="#">Usuarios</a></li>
							<li><i class="fa fa-code"></i><a href="#">Parametrizacion</a></li>
							<?php			}
						
						if($id_perfil == 3){			?>
							<li><i class="fa fa-code"></i><a href="#">Usuarios</a></li>
							<li><i class="fa fa-code"></i><a href="#">Elecciones ABC</a></li>
							<li><i class="fa fa-code"></i><a href="#">Grafica de Avance Conteo Rapido</a></li>
							<li><i class="fa fa-code"></i><a href="#">Grafica de Avance PREP</a></li>
							<?php			}
						
						if($id_perfil == 4){			?>
							<li><i class="fa fa-code"></i><a href="#">Captura Conteo Rapido</a></li>
							<?php			}
						
						if($id_perfil == 5){			?>
							<li><i class="fa fa-code"></i><a href="#">Captura Conteo Rapido</a></li>
							<?php			}
						
						if($id_perfil == 6){			?>
							<li><i class="fa fa-code"></i><a href="#">Captura Conteo Rapido</a></li>
							<li><i class="fa fa-code"></i><a href="#">Capturar / Modificar votos PREP</a></li>
							<?php			}
						
						if($id_perfil == 7){			?>
							<li><i class="fa fa-code"></i><a href="#">Grafica de Avance Conteo Rapido</a></li>
							<li><i class="fa fa-code"></i><a href="#">Grafica de Avance PREP</a></li>
							<?php			}
						
						if($id_perfil == 8){			?>
							<li><i class="fa fa-code"></i><a href="#">Activar Casillas</a></li>
							<li><i class="fa fa-code"></i><a href="#">Grafica de Avance PREP</a></li>
							<?php			}			?>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>