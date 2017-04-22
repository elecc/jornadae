<div class="row">
<p>&nbsp;</p>	
</div>
<div class="row">	
	<div class="table-responsive">	
		<table class="table">
			<tr>
				<th >Descripcion</th>
				<th >Fecha</th>
				<th>Puesto</th>
				<th>Estado</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>			<?php
    for ($x = 0; $x < $num_elecc; $x++) { ?>
				<tr>
			        <td><?php echo $elecc[$x]['descrip'] ?></td>
					<td><?php echo $elecc[$x]['fecha'] ?></td>
					<td><?php echo $elecc[$x]['puesto'] ?></td>
					<td><?php echo $elecc[$x]['estado'] ?></td>
						<td> 
                            <button type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </button>						</td>
						<td>
                           <button type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>						</td>
						</td>
				</tr>
				<?php
    } ?>
		</table>
	</div>
</div>			

<!-- SCRIPT QUE CONTROLA EL POP "AGREGAR NUEVA JORNADA ELECTORAL" [ABRE EL POP Y HACE EL INSERT POR AJAX]-->
<script type="text/javascript"  src="<?php echo base_url("js/eleccion/eleccion.js")?>"></script>