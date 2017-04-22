<?php 
if($num_usuarios != ""){			?>
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
				<td class="activa"><a id="1" href="#"><i class="fa fa-user" style="color: green"></i></a></td>
				<td class="modifica"><a id="2" href="#"><i class="fa fa-pencil"></i></a></td>
				<td class="perfil"><a href="#" data-id_usuario="<?php echo $usuarios[$i]['id_usuario']?>" data-id_persona="<?php echo $usuarios[$i]['id_persona']?>" data-login="<?php echo $usuarios[$i]['login']?>" data-perfil="<?php echo $usuarios[$i]['perfil']?>"><i class="fa fa-users"></i></a></td>
				<td class="pass"><a id="4" href="#"><i class="fa fa-key"></i></a></td>
				<td class="elimina"><a href="#" data-id_usuario="<?php echo $usuarios[$i]['id_usuario']?>" data-id_persona="<?php echo $usuarios[$i]['id_persona']?>" data-login="<?php echo $usuarios[$i]['login']?>"><i class="fa fa-trash"></i></a></td>
			</tr>			<?php			}			?>			
		</tbody>			
	</table>
	<!-- SCRIPT QUE CONTROLA TODAS LAS OPCIONES QUE TIENE LA TABLA USUARIOS ADMINISTRADORES DEL SISTEMA-->
	<script type="text/javascript"  src="<?php echo base_url("js/usuarios/controlaTablaUsuarios.js")?>"></script>			<?php
}else{			?>
	<br />
	<br />
	<br />
	<center>
		<button id="mensajes" class="btn btn-warning btn-sm btn-block" disabled>
			No hay registros de Administradores del Sistema
		</button>
	</center>			<?php
}			?>