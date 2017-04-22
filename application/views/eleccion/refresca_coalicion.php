 <div class="row">
    <p>&nbsp;</p>	
		<div class="table-responsive">	
			<table class="table">
				<tr>
					<th >Id. Coalicion</th>
					<th >Nombre</th>
					<th >Estados</th>
					<th>Conteo rápido</th>
					<th>Eliminar</th>
				</tr>			<?php
                for ($x = 0; $x < $num_dcoa; $x++) { ?>
				<tr>
					<td><?php echo $dcoa[$x]['id_coalicion'] ?></td>
					<td><?php echo $dcoa[$x]['nombre'] ?></td>
					<td>Partidos....</td>
					<td><?php if($dcoa[$x]['conteorapido']==1) echo "Si"; else echo "No"; ?></td>    
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
