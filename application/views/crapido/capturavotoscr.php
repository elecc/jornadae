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
			<select  id="id_eleccion" name="id_eleccion" class="form-control">
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
		<button id="btn_votoscr" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#pop_je">
			Agregar Votos conteo rápido
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
						<h5 class="modal-title">Captura de votos conteo rápido</h5>
						<hr />
						<div class="col-md-6 col-sm-6 col-xs-6">
						<address>
							<?php echo $je[0]['nombre'] ?>
							<br />
							<?php echo $je[0]['fechacreacion'] ?>
							</address>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
						<address>
							<strong>
	                        	<div id="xlaelecc">
	                        	</div>
							</strong>
						</address>
						</div>						
					</div>
					<!-- EN "MODAL BODY ES DONDE PONDREMOS TODOS LOS DATOS (FORMULARIOS QUE QUEREMOS UTILIZAR)" -->
					<div class="modal-body">
						<!-- INICIO DEL FORM -->
						<form id_="form_capturvotoscr" name="capturvotoscr">
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Sección:</span>
							  <input id="seccion" type="text" class="form-control" placeholder="No. de Sección" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Casilla:</span>
							  <input id="casilla" type="text" class="form-control" placeholder="No. de casilla" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 1:</span>
							  <input id="vpartido1" type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
							</div>
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 2:</span>
							  <input id="vpartido2" type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
							</div>
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 3:</span>
							  <input id="vpartido3" type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
       					    	<input type="hidden" value="0" id="veleccion" name="veleccion" />
							</div>
						</form>
						<center>
							<button style="display: none" id="mensajes" class="btn btn-danger btn-sm btn-block" disabled></button>
						</center>
  					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							Cerrar
						</button>
						<button id="add_vcr" type="button" class="btn btn-primary" data-dismiss="modal">
							Agregar
						</button>
					</div>
				</div>
			</div>

		</div>
	</div>
		<!-- SCRIPT QUE CONTROLA EL POP "AGREGAR NUEVA JORNADA ELECTORAL" [ABRE EL POP Y HACE EL INSERT POR AJAX]-->
		<script type="text/javascript"  src="<?php echo base_url("js/crapido/crapido.js")?>"></script>
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


<div id="datos_votoscr">	
<?php
    if ($num_votoscr != "") {
?>

 <div class="row">
    <p>&nbsp;</p>	
		<div class="table-responsive">	
			<table class="table">
				<tr>
					<th >Sección</th>
					<th>Votos requeridos</th>
					<th>Eliminar</th>
				</tr>			<?php
                for ($x = 0; $x < $num_votoscr; $x++) { ?>
				<tr>
					<td><?php echo $votoscr[$x]['idseccion'] ?></td>
					<td><?php echo $votoscr[$x]['voto'] ?></td> 
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
