
 <div class="row">
    <p>&nbsp;</p>	
		<div class="table-responsive">	
			<table class="table">
				<tr>
					<th >Id. independiente</th>
					<th >Nombre</th>
					<th>Conteo rápido</th>
					<th>Eliminar</th>
				</tr>			<?php
                for ($x = 0; $x < $num_ind; $x++) { ?>
				<tr>
					<td><?php echo $ind[$x]['id_independiente'] ?></td>
					<td><?php echo $ind[$x]['nombre']." ".$ind[$x]['apellidopaterno']." ".$ind[$x]['apellidomaterno'] ?></td>
					<td>No</td>    
					<td>
                       <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>						</td>
					</td>
				</tr>
				<?php
				}
 ?>
			</table>
		</div>			
 </div>
