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
			Agregar Coalición
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
						<h4 class="modal-title">Agregar Coalición</h4>
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
						<form id_="form_coaliciones" name="form_coaliciones">
							<div class="form-group">
								<label for="descripeleccion">Descripción Coalición</label>
								<input type="text" name="descripcion_coalicion" class="form-control" id="descripciocoalicion" placeholder="Coalicion">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Partidos:</label>
								<select multiple class="form-control">
								  <option>Partido 1</option>
								  <option>Partido 2</option>
								  <option>Partido 3</option>
								  <option>Partido 4</option>
								  <option>Partido 5</option>
								</select>
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

