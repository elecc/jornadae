<div class="row">
	<div id="pop_perfil" class="modal fade" role="dialog" aria-labelledby="pop_perfil">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						&times;
					</button>
					<h4 class="modal-title">Agregar / Modificar Perfil</h4>
				</div>
				<div class="modal-body" >
					<form id="form_perfil" name="form_perfil">
						
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-md-1 control-label" >Login: </label>
								<div class="col-md-11">
									<p class="form-control-static"><strong><?php echo $login?></strong></p>
								</div>
								
								<label class="col-md-1 control-label" >Perfil: </label>
								<div class="col-md-11">
									<p class="form-control-static"><strong><?php echo $perfil?></strong></p>
								</div>
							</div>
						</div>
						<br />
						<div class="form-horizontal">
							<div class="form-group">
								<label for="id_perfil" class="col-md-2 control-label" >Perfil:</label>
								<div class="col-md-8">
									<select class="form-control" id="id_perfil" name="id_perfil">
										<option value="" selected>Seleccionar</option>			<?php 
										foreach($perfiles as $perfil){			?>
										<option value="<?php echo $perfil['id_perfil']?>"><?php echo $perfil['nombre']?></option>			<?php			}			?>
									</select>
								</div>
							</div>
						</div>
						<br />
						
						<input type="hidden" name="id_persona" value="<?php echo $id_persona?>"/>
						<input type="hidden" name="id_usuario" value="<?php echo $id_usuario?>"/>
						<input type="hidden" name="login" value="<?php echo $login?>"/>
						
						<div class="form-group">
							<center>
								<button style="display: none" id="mensajes" class="btn btn-danger btn-sm btn-block" disabled></button>
							</center>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Cerrar
					</button>
					<button id="modificar_perfil" type="button" class="btn btn-primary" data-dismiss="modal">
						Modificar Perfil
					</button>
				</div>
			</div>

		</div>
	</div>
</div>
<script type="text/javascript"  src="<?php echo base_url("js/usuarios/popPerfil.js")?>"></script>