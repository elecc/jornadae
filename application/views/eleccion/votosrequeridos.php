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
			Agregar Votos de elección
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
						<h4 class="modal-title">Votos requeridos</h4>
							<hr />
						<address>
							<strong>Jornada Electoral</strong>
							<br>
							Descripción:
							<br>
							Fecha:
							<br>
							<strong>Elección: </strong>
						</address>
					</div>
					<!-- EN "MODAL BODY ES DONDE PONDREMOS TODOS LOS DATOS (FORMULARIOS QUE QUEREMOS UTILIZAR)" -->
					<div class="modal-body">
						<!-- INICIO DEL FORM -->
						<form id_="form_independientes" name="form_independientes">
							<div class="form-group">
								<label for="seccion">Sección:</label>
								<input type="text" name="seccion" class="form-control" id="seccion" placeholder="Sección">
							</div>
							<div class="form-group">
								<label for="votos">No. de votos:</label>
								<input type="text" name="votos" class="form-control" id="votos" placeholder="Número de votos">
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

