<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<blockquote>
			<p>
				Jornada Electoral
			</p>
			Descripción:
			<br>
			Fecha:
			<br>
		</blockquote>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-6">
		<div class="form-group">
			<label for="exampleInputEmail1">Elección:</label>
			<select  name="id_eleccion" class="form-control">
				<option>Elección 1</option>
				<option>Elección 2</option>
				<option>Elección 3</option>
				<option>Elección 4</option>
			</select>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-6">

	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">

		<!-- BOTON QUE MUESTRA / OCULTA "POP NUEVA ELECCION -->
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#pop_je">
			Agregar Votos PREP
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
						<h5 class="modal-title">Captura de votos PREP</h5>
						<hr />
						<div class="col-md-6 col-sm-6 col-xs-6">
						<address>
							<strong>Jornada Electoral:</strong>
							</address>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
						<address>
							<strong>Elección: </strong>
						</address>
						</div>						
					</div>
					<!-- EN "MODAL BODY ES DONDE PONDREMOS TODOS LOS DATOS (FORMULARIOS QUE QUEREMOS UTILIZAR)" -->
					<div class="modal-body">
						<!-- INICIO DEL FORM -->
						<form id_="form_independientes" name="form_independientes">
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Sección:</span>
							  <input type="text" class="form-control" placeholder="No. de Sección" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Casilla:</span>
							  <input type="text" class="form-control" placeholder="No. de casilla" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 1:</span>
							  <input type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 2:</span>
							  <input type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 3:</span>
							  <input type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 4:</span>
							  <input type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 5:</span>
							  <input type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 6:</span>
							  <input type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 7:</span>
							  <input type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 8:</span>
							  <input type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 9:</span>
							  <input type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="input-group input-group-sm">
							  <span class="input-group-addon" id="sizing-addon3">Partido 10:</span>
							  <input type="text" class="form-control" placeholder="Votos" aria-describedby="sizing-addon3">
							</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							Cerrar
						</button>
						<button id="add_je" type="button" class="btn btn-primary" data-dismiss="modal">
							Agregar
						</button>
					</div>
				</div>

			</div>
		</div>

		<!-- SCRIPT QUE CONTROLA EL POP "AGREGAR NUEVA JORNADA ELECTORAL" [ABRE EL POP Y HACE EL INSERT POR AJAX]-->
		<script type="text/javascript"  src="<?php echo base_url("js/je/je.js")?>"></script>

	</div>
</div>

