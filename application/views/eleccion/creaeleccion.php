<?php
if ($num_je != "") {
?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<address>
		  <strong>Jornada Electoral</strong><br>
		  <strong>Descripción: </strong><?php echo $je[0]['nombre'] ?><br />
		  <strong>Fecha: </strong><?php echo $je[0]['fechacreacion'] ?><br />
		</address>
        		<!-- BOTON QUE MUESTRA / OCULTA "POP NUEVA ELECCION -->
		<button id="btn_creae" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#pop_je">
			Agregar Nueva Elección
		</button>
		
		<!-- Modal -->
		<div id="pop_je" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header  bg-primary">
						<button type="button" class="close btn-success" data-dismiss="modal">
							&times;
						</button>
						<h4 class="modal-title">Agregar Nueva Elección</h4>
							<hr />
							<address>
							  <strong>Jornada Electoral</strong><br>
                    		  <strong>Descripción: </strong><?php echo $je[0]['nombre'] ?><br />
                    		  <strong>Fecha: </strong><?php echo $je[0]['fechacreacion'] ?><br />
							</address>
					</div>
					
					<!-- EN "MODAL BODY ES DONDE PONDREMOS TODOS LOS DATOS (FORMULARIOS QUE QUEREMOS UTILIZAR)" -->
					<div class="modal-body">
						
						<!-- INICIO DEL FORM -->
						<form id="form_creaeleccion" name="form_creaeleccion">
							<div class="form-group">
								<label for="descripeleccion">Descripción Elección</label>
								<input type="text" name="descripcioneleccion" class="form-control" id="descripcioneleccion" placeholder="Descripción de la Eleccion">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Fecha</label>
								<input type="date" name="fecha_creaeleccion" class="form-control" id="fecha_creaeleccion" placeholder="Fecha de la elección">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Puesto de elección:</label>
								<select  id="id_puestoe" name="id_puestoe" class="form-control">
								<option value="0">Elija el Puesto de Elección</option>
								<?php
    for ($e = 0; $e < $num_cate; $e++) { ?>
								<option value="<?php echo $celecc[$e]['id_cateleccion'] ?>"><?php echo $celecc[$e]['descripcion'] ?></option>
								<?php
    } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Estado elección:</label>
								<select  id="id_estado_eleccion" name="id_estado_eleccion" class="form-control">
								<option value="0">Elija el Estado de la Eleción</option>
								<?php
    for ($f = 0; $f < $num_jedos; $f++) { ?>
								<option value="<?php echo $jedos[$f]['id_estado'] ?>"><?php echo $jedos[$f]['descripcion'] ?></option>
								<?php
    } ?>
								</select>
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
						<button id="add_creae" type="button" class="btn btn-primary" data-dismiss="modal">
							Agregar
						</button>
					</div>
				</div>

			</div>
		</div>
		
		<!-- SCRIPT QUE CONTROLA EL POP "AGREGAR NUEVA JORNADA ELECTORAL" [ABRE EL POP Y HACE EL INSERT POR AJAX]-->
		<script type="text/javascript"  src="<?php echo base_url("js/eleccion/eleccion.js") ?>"></script>

	</div>
</div>

<?php
    if ($num_elecc != "") {
?>

<div id="tabla_Elecc">	
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
</div>			

<?php
    } else {

?>

	<div id="tabla_Elecc">
		<br /><br /><br />
		<center>
			<button id="mensajes0" class="btn btn-warning btn-sm btn-block" disabled>No hay registros de Elecciones</button>
		</center>
		<!-- SCRIPT QUE CONTROLA EL POP "AGREGAR NUEVA JORNADA ELECTORAL" [ABRE EL POP Y HACE EL INSERT POR AJAX]-->
		<script type="text/javascript"  src="<?php echo base_url("eleccion/creaeleccion/eleccion.js") ?>"></script>
	</div>

<?php
    }
?>

<?php
} else {

?>


	<div id="tabla_elecc">
		<br /><br /><br />
		<center>
			<button id="mensajes2" class="btn btn-warning btn-sm btn-block" disabled>Error en la Jornada Electoral</button>
		</center>
		<!-- SCRIPT QUE CONTROLA EL POP "AGREGAR NUEVA JORNADA ELECTORAL" [ABRE EL POP Y HACE EL INSERT POR AJAX]-->
		<script type="text/javascript"  src="<?php echo base_url("js/eleccion/eleccion.js") ?>"></script>
	</div>

<?php
}
?>
