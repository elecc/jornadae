<div class="row">
	<div id="pop_admon" class="modal fade" role="dialog" aria-labelledby="pop_admon">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header modal-header">
					<button type="button" class="close" data-dismiss="modal">
						&times;
					</button>
					<h4 class="modal-title">Agregar Administrador del Sistema</h4>
				</div>
				
				<div class="modal-body" >
					<!-- INICIO DEL FORM -->
					<form id="form_admon" name="form_admon" action="#">

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="nombre">Nombre:</label>
									<input type="text" name="nombre" class="form-control text-uppercase" id="nombre" placeholder="Nombre">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="paterno">Paterno:</label>
									<input type="text" name="paterno" class="form-control text-uppercase" id="paterno" placeholder="Paterno">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="materno">Materno:</label>
									<input type="text" class="form-control text-uppercase" id="materno" placeholder="Materno">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="rfc">RFC:</label>
									<input type="text" name="rfc" class="form-control text-uppercase" id="rfc" placeholder="RFC">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="correo">Correo:</label>
									<input type="email" name="correo" class="form-control" id="correo" placeholder="Correo">
								</div>
							</div>
						</div>						

						<center>
							<button style="display: none" id="mensajes" class="btn btn-danger btn-sm btn-block" disabled></button>
						</center>

					</form>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Cerrar
					</button>
					<button id="add_admon" type="button" class="btn btn-primary" data-dismiss="modal">
						Agregar
					</button>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- script que controla los botones del modal "Agregar Administrador del Sistema" --> 
<script type="text/javascript"  src="<?php echo base_url("js/usuarios/popAdmon.js")?>"></script>