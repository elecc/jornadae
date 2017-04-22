<div class="row">
<p>&nbsp;</p>	
</div>
<div class="row">	
	<div class="table-responsive">	
		<table class="table">
			<tr>
				<th >Id Partido</th>
				<th >NC</th>
				<th>Nombre</th>
				<th>Conteo Rapido</th>
				<th>Eliminar</th>
			</tr>			<?php
    for ($x = 0; $x < $num_delecc; $x++) { ?>
				<tr>
					<td><?php echo $delecc[$x]['id_partido'] ?></td>
					<td><?php echo $delecc[$x]['nombrecorto'] ?></td>
					<td><?php echo $delecc[$x]['nombre'] ?></td>                    
					<td><?php if($delecc[$x]['crapido']==1) echo "Si"; else echo "No"; ?></td>                    
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