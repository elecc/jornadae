<div class="row">
	<button id="new_admon" type="button" class="btn btn-info btn-lg" >
		Agregar Administrador del Sistema
	</button>
</div>

<!-- DIV DONDE SE REFRESCARAN LOS MODALES QUE SE IRAN UTILIZANDO -->
<div id="zona_trabajo" ></div>

<br />
<br />
<br />

<?php
if($num_usuarios != ""){			?>
<!-- TABLA JORNADA ELECTORAL -->
<div class="row">
	<div id="tabla_usr">
		<table class="table table-hover table-bordered">
			<thead>
				<th >&nbsp;Login&nbsp;</th>
				<th >&nbsp;Perfil&nbsp;</th>
				<th>&nbsp;Nombre&nbsp;</th>
				<th><small>Estado</small></th>
				<th><small>Modificar</small></th>
				<th><small>Perfil</small></th>
				<th><small>Pass</small></th>
				<th><small>Eliminar</small></th>
			</thead>			
			<tbody><?php
				for($i=0; $i<$num_usuarios; $i++){			?>
				<tr>
					<td><?php echo $usuarios[$i]['login'] ?></td>
					<td><?php echo $usuarios[$i]['perfil'] ?></td>
					<td ><?php echo $usuarios[$i]['nombre']."  ".$usuarios[$i]['paterno']." ".$usuarios[$i]['materno'] ?></td>
					<td class="activa"><a  href="#"><i class="fa fa-user" style="color: green"></i></a></td>
					<td class="modifica"><a  href="#"><i class="fa fa-pencil"></i></a></td>
					<td class="perfil"><a href="#" data-id_usuario="<?php echo $usuarios[$i]['id_usuario']?>" data-id_persona="<?php echo $usuarios[$i]['id_persona']?>" data-login="<?php echo $usuarios[$i]['login']?>" data-perfil="<?php echo $usuarios[$i]['perfil']?>"><i class="fa fa-users"></i></a></td>
					<td class="pass"><a  href="#"><i class="fa fa-key"></i></a></td>
					<td class="elimina"><a href="#" data-id_usuario="<?php echo $usuarios[$i]['id_usuario']?>" data-id_persona="<?php echo $usuarios[$i]['id_persona']?>" data-login="<?php echo $usuarios[$i]['login']?>"><i class="fa fa-trash"></i></a></td>
				</tr>			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<!-- SCRIPT QUE CONTROLA TODAS LAS OPCIONES QUE TIENE LA TABLA USUARIOS ADMINISTRADORES DEL SISTEMA-->
<script type="text/javascript"  src="<?php echo base_url("js/usuarios/controlaTablaUsuarios.js")?>"></script>			<?php

}else{			?>
<div class="row">
	<div id="tabla_usr">
		<br />
		<br />
		<br />
		<center>
			<button id="mensajes" class="btn btn-warning btn-sm btn-block" disabled>
				No hay registros de Administradores del Sistema
			</button>
		</center>
	</div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<?php
}			?>
<!-- SCRIPT QUE CONTROLA EL BOTON (AGREGAR NUEVO ADMINISTRADOR DEL SISTEMA) TODO EL TIEMPO ESTA ESCUCHANDO -->
<script type="text/javascript"  src="<?php echo base_url("js/usuarios/btnNuevoAdmon.js")?>"></script>