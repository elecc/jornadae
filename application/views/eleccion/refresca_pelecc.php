 <div class="row">
    <p>&nbsp;</p>	
		<div class="table-responsive">	
			<table class="table">
				<tr>
					<th >Id. Partido</th>
					<th >Nombre</th>
					<th >Nombre corto</th>
					<th>Eliminar</th>
				</tr>			<?php
                for ($x = 0; $x < $num_delecc; $x++) { ?>
				<tr>
					<td><?php echo $delecc[$x]['ID_PARTIDO'] ?></td>
					<td><?php echo $delecc[$x]['NOMBRECORTO'] ?></td>
					<td><?php echo $delecc[$x]['NOMBRE'] ?></td>
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
