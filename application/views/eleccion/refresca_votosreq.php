

 <div class="row">
    <p>&nbsp;</p>	
		<div class="table-responsive">	
			<table class="table">
				<tr>
					<th >Sección</th>
					<th>Votos requeridos</th>
					<th>Eliminar</th>
				</tr>			<?php
                for ($x = 0; $x < $num_votosr; $x++) { ?>
				<tr>
					<td><?php echo $votosr[$x]['idseccion'] ?></td>
					<td><?php echo $votosr[$x]['voto'] ?></td>  
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
