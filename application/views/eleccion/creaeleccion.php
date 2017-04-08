<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<blockquote>
		  <p>Jornada Electoral</p>
		  Descripción:<br>
		  Fecha:<br>
		</blockquote>
		<!-- BOTON QUE MUESTRA / OCULTA "POP NUEVA ELECCION -->
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#pop_je">
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
							  Descripción:<br>
							  Fecha:<br>
							</address>
					</div>
					
					<!-- EN "MODAL BODY ES DONDE PONDREMOS TODOS LOS DATOS (FORMULARIOS QUE QUEREMOS UTILIZAR)" -->
					<div class="modal-body">
						
						<!-- INICIO DEL FORM -->
						<form id_="form_creaeleccion" name="form_creaeleccion">
							<div class="form-group">
								<label for="descripeleccion">Descripción Elección</label>
								<input type="text" name="descripcion_eleccion" class="form-control" id="descripcioneleccion" placeholder="Eleccion">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Fecha</label>
								<input type="date" name="descripcion_creaeleccion" class="form-control" id="fechajornadae" placeholder="Fecha Jornada Electora">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Puesto de elección:</label>
								<select  name="id_puestoe" class="form-control">
									<option>Presidente</option>
									<option>Gobernador</option>
									<option>Diputado Federal</option>
									<option>Senador</option>
									<option>Etc.</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Estado:</label>
								<select  name="id_estado_je" class="form-control">
									<option>Baja California</option>
									<option>Chihuahua</option>
									<option>Estado de México</option>
									<option>Distrito Federal</option>
									<option>Zacatecas</option>
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

