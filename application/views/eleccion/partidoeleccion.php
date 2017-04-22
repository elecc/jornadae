<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<address>
		  <strong>Jornada Electoral</strong><br>
		  <strong>Descripción: </strong><?php echo $je[0]['nombre'] ?><br />
		  <strong>Fecha: </strong><?php echo $je[0]['fechacreacion'] ?><br />
		</address>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-6">
		<div class="form-group">
			<label for="exampleInputEmail1">Elección:</label>
			<select id="id_eleccion" name="id_eleccion" class="form-control">
				<option value="0" >Elija la elección</option>
				<?php
                for ($e = 0; $e < $num_elecc; $e++) { ?>
			    <option value="<?php echo $elecc[$e]['ide'] ?>"><?php echo $elecc[$e]['descrip'] ?></option>
				<?php
				}
				 ?>
			</select>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-6">

	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">

		<!-- BOTON QUE MUESTRA / OCULTA "POP NUEVA ELECCION -->
		<button id="btn_creape" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#pop_je">
			Agregar Partido a Elección
		</button>

		<!-- Modal -->
		<div id="pop_je" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header   bg-primary">
						<button type="button" class="close btn-success" data-dismiss="modal">
							&times;
						</button>
						<h4 class="modal-title">Agregar Partido - Elección</h4>
							<hr />
						<address>
							<strong>Jornada Electoral</strong>
							<br>
							Descripción: <?php echo $je[0]['nombre'] ?>
							<br>
							Fecha: <?php echo $je[0]['fechacreacion'] ?>
							<br>
                        	<div id="xlaelecc">
                        	</div>
						</address>
					</div>
					<!-- EN "MODAL BODY ES DONDE PONDREMOS TODOS LOS DATOS (FORMULARIOS QUE QUEREMOS UTILIZAR)" -->
					<div class="modal-body">
						<!-- INICIO DEL FORM -->
						<form id="form_partidoeleccion" name="form_partidoeleccion">
							<div class="form-group">
								<label for="exampleInputEmail1">Partido:</label>
								<select id="id_partido" name="id_partido" class="form-control">
									<option value="0" >Elija el partido de la elección</option>
                					<?php
                                    for ($p = 0; $p < $num_ptdo; $p++) { ?>
                				    <option value="<?php echo $partido[$p]['id_partido'] ?>"><?php echo $partido[$p]['nombre'] ?></option>
                					<?php
									}
 ?>
								</select>
								<input type="hidden" value="0" id="veleccion" name="veleccion" />
							</div>
							<div class="form-group">
								<label>
									<input id="chkpe" type="checkbox" name="chkpe" />
									Conteo rápido </label>
							</div>
    						<center>
    							<button style="display: none" id="mensajes" class="btn btn-danger btn-sm btn-block" disabled></button>
    						</center>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							Cerrar
						</button>
						<button id="add_pe" type="button" class="btn btn-primary" data-dismiss="modal">
							Agregar
						</button>
					</div>
				</div>

			</div>
		</div>

		<!-- SCRIPT QUE CONTROLA EL POP "AGREGAR NUEVA JORNADA ELECTORAL" [ABRE EL POP Y HACE EL INSERT POR AJAX]-->
		<script type="text/javascript"  src="<?php echo base_url("js/eleccion/partidoeleccion.js")?>"></script>

	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div id="mensprin">
		<br />
		<center>
			<button style="display: none" id="mensajes0" class="btn btn-warning btn-sm btn-block" disabled>Elija la elección</button>
		</center>
	</div>
    </div>
</div>



<div id="datos_elecc">	
<?php
    if ($num_delecc != "") {
?>

 <div class="row">
    <p>&nbsp;</p>	
		<div class="table-responsive">	
			<table class="table">
				<tr>
					<th >Id. Partido</th>
					<th >Nombre</th>
					<th >Nombre corto</th>
					<th>Conteo rápido</th>
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
				}
 ?>
			</table>
		</div>			
 </div>
<?php
}
?>
</div>
