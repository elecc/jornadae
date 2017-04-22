<?php
/*											PERFILES
0;"S / PERFIL"
1;"SUPERUSUARIO"
2;"ADMINISTRADOR DEL SISTEMA"
3;"ADMINISTRADOR DE JORNADA ELECTORAL"
4;"REPRESENTANTE DE CASILLA"
5;"REPRESENTANTE GENERAL DE ZONA"
6;"CAPTURISTA"
7;"REVISOR"
8;"SUPERVISOR"			*/
 
//EXTRAEMOS EL PERFIL DEL USUARIO Q SE LOGUEO 
$id_perfil = $this->session->userdata['ss_id_perfil'];
?>
		
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<h3>Menu Principal</h3>
		<ul class="nav side-menu">
			
			<li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="<?php echo base_url('inicio/estadisticas')?>">Datos de inicio</a></li>
				</ul>
			</li>
			
			<?php if($id_perfil == 1 or $id_perfil == 2 or $id_perfil == 3){			?>
			<li><a><i class="fa fa-group"></i> Configuración <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">			<?php
					if($id_perfil == 1){			?>
					<li><a href="#">Datos del Partido Politico</a></li>			<?php			
					}			?>
					<li><a href="<?php echo base_url('usuarios/usuarios')?>">Usuarios</a></li>			<?php
					if($id_perfil == 2){			?>
					<li><a href="<?php echo base_url('je/je')?>">Crear Jornada Electoral</a></li>
					<li><a href="#">Parametrización</a></li>			<?php
					}			?>
				</ul>
			</li>			<?php
			}			?>
			
			<?php if($id_perfil == 3){			?>
			<li><a><i class="fa fa-legal"></i> Jornada Electoral <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="<?php echo base_url('eleccion/creaeleccion')?>">Elecciones ABC</a></li>
					<li><a href="<?php echo base_url('eleccion/partidoeleccion')?>">Partidos - Eleccion ABC</a></li>
					<li><a href="<?php echo base_url('eleccion/coaliciones')?>">Coaliciones ABC</a></li>
					<li><a href="<?php echo base_url('eleccion/independientes')?>">Independientes ABC</a></li>
					<li><a href="<?php echo base_url('eleccion/votosrequeridos')?>">Votos Requeridos ABC</a></li>
				</ul>
			</li>			<?php
			}			?>
			
			<?php if($id_perfil == 3 or $id_perfil == 4 or $id_perfil == 5 or $id_perfil == 6 or $id_perfil == 7){			?>
			<li><a><i class="fa fa-calculator"></i> Conteo Rapido <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">			<?php
					if($id_perfil == 4 or $id_perfil == 5 or $id_perfil == 6){			?>
					<li><a href="<?php echo base_url('crapido/capturavotoscr')?>">Captura conteo rápido</a></li>			<?php
					}			
					if($id_perfil == 3 or $id_perfil ==7 ){			?>
					<li><a href="#">Gráfica de avance</a></li>
					<li><a href="#">Reportes</a></li>
					<li><a href="#">Visor de avance</a></li>			<?php
					}			?>					
				</ul>
			</li>			<?php
			}			
			
			if($id_perfil == 3 or $id_perfil == 6 or $id_perfil == 7 or $id_perfil == 8){			?>
			<li><a><i class="fa fa-calculator"></i> PREP <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">			<?php
					if($id_perfil == 8){			?>
					<li><a href="#">Activar Casillas</a></li>			<?php	
					}			
					if($id_perfil == 6 or $id_perfil == 7 or $id_perfil == 8){			?>
					<li><a href="<?php echo base_url('prep/capturavotosprep')?>">Capturar / Modificar votos PREP</a></li>			<?php
					}
					if($id_perfil == 7 or $id_perfil == 8){			?>
					<li><a href="#">Revisión votos PREP</a></li>			<?php
					}			
					if($id_perfil == 3 or $id_perfil == 7 or $id_perfil == 8){			?>
					<li><a href="#">Gráfica de avance PREP</a></li>					
					<li><a href="#">Reportes PREP</a></li>
					<li><a href="#">Visor de avance PREP</a></li>			<?php
					}			?>
				</ul>
			</li>			<?php
			}			
			
			if($id_perfil == 2 or $id_perfil == 3){			?>
			<li><a><i class="fa fa-book"></i>Catalogos Generales<span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="<?php echo base_url('cgenerales/simpatizantes')?>">Simpatizantes</a></li>
					<li><a href="<?php echo base_url('cgenerales/estados')?>">Estados</a></li>
					<li><a href="<?php echo base_url('cgenerales/formEstados')?>">Formulario Estados</a></li>
					<li><a href="<?php echo base_url('cgenerales/municipios')?>">Municipios</a></li>
					<li><a href="<?php echo base_url('cgenerales/distritos')?>">Distritos</a></li>
					<li><a href="<?php echo base_url('cgenerales/secciones')?>">Secciones</a></li>
					<li><a href="<?php echo base_url('cgenerales/casillas')?>">Casillas</a></li>
					<li><a href="<?php echo base_url('cgenerales/partidos')?>">Partidos</a></li>
					<li><a href="<?php echo base_url('cgenerales/peleccion')?>">Puestos de Elección</a></li>
				</ul>
			</li>			
			
			<li><a><i class="fa fa-book"></i>Catalogos de Elección<span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="<?php echo base_url('cgenerales/coaliciones')?>">Coaliciones</a></li>
					<li><a href="<?php echo base_url('cgenerales/cindependientes')?>">Candidatos Independientes</a></li>
					<li><a href="<?php echo base_url('cgenerales/cindependientes')?>">Partido Elección</a></li>
				</ul>
			</li>			<?php
			}			?>
		</ul>
	</div>
</div>