<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		
		<!-- BOTON QUE MUESTRA / OCULTA "POP NUEVA JORNADA ELECTORAL -->
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#pop_je">
			Agregar Nueva Jornada Electoral
		</button>
		
		<!-- Modal -->
		<div id="pop_je" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							&times;
						</button>
						<h4 class="modal-title">Agregar Nueva Jornada Electoral</h4>
					</div>
					
					
					<!-- EN "MODAL BODY ES DONDE PONDREMOS TODOS LOS DATOS (FORMULARIOS QUE QUEREMOS UTILIZAR)" -->
					<div class="modal-body">
						
						<!-- INICIO DEL FORM -->
						<form id_="form_je" name="form_je">
							<div class="form-group">
								<label for="exampleInputEmail1">Descripción Jornada Electoral</label>
								<input type="text" name="descripcion_je" class="form-control" id="descripcionjornadae" placeholder="Jornada Electoral">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Fecha</label>
								<input type="date" name="descripcion_je" class="form-control" id="fechajornadae" placeholder="Fecha Jornada Electora">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Estados:</label>
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
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Cerrar
						</button>
						<button id="add_je" type="button" class="btn btn-default" data-dismiss="modal">
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

