<div class="row">	
	<div class="table-responsive">	
		<table class="table">
			<tr>
				<th >Descripcion</th>
				<th >Fecha</th>
				<th>Estados</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>			<?php
			for($i=0; $i<$num_je; $i++){			?>
				<tr>
					<td><?php echo $je[$i]['nombre']?></td>
					<td><?php echo $je[$i]['fechacreacion']?></td>
					<td>Estados....</td>
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
			}			?>
		</table>
	</div>
</div>			

<!-- SCRIPT QUE CONTROLA EL POP "AGREGAR NUEVA JORNADA ELECTORAL" [ABRE EL POP Y HACE EL INSERT POR AJAX]-->
<script type="text/javascript"  src="<?php echo base_url("js/je/je.js")?>"></script>