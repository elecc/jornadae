<div class="row">
	<div id="pop_elimina" class="modal fade" role="dialog" aria-labelledby="pop_elimina">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						&times;
					</button>
					<h4 class="modal-title">Esta apunto de eliminar al usuario <?php echo $login?></h4>
				</div>
				<div class="modal-body" >
					<form id="form_elimina" name="form_elimina">
						<div class="row">
							<div class="form-group">
								<label for="" class="col-md-12 control-label" >¿Confirma eliminar este usuario?</label>
							</div>
						</div>
						
						<input type="hidden" name="id_usuario" value="<?php echo $id_usuario?>"/>
						<input type="hidden" name="id_persona" value="<?php echo $id_persona?>"/>
						<input type="hidden" name="login" value="<?php echo $login?>"/>
						
						<br />
						<div class="form-group">
							<center>
								<button style="display: none" id="mensajes" class="btn btn-danger btn-sm btn-block" disabled></button>
							</center>
						</div>						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Cancelar
					</button>
					<button id="eliminar_usuario" type="button" class="btn btn-primary" data-dismiss="modal">
						Eliminar Usuario
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript"  src="<?php echo base_url("js/usuarios/popElimina.js")?>"></script>