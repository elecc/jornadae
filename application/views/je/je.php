<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<!-- BOTON QUE MUESTRA / OCULTA "POP NUEVA JORNADA ELECTORAL -->
		<button id="btn_je"  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#pop_je">
			Agregar Nueva Jornada Electoral
		</button>
	</div>
</div>

<div class="row">
	<!-- Modal -->
	<div id="pop_je" class="modal fade" role="dialog" >
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
				<div class="modal-body" >
					
					<!-- INICIO DEL FORM -->
					<form id="form_je" name="form_je">
						<div class="form-group">
							<label for="">Descripción Jornada Electoral</label>
							<input type="text" name="descripcion_je" class="form-control requerido" id="descripcion_je" placeholder="Jornada Electoral">
						</div>
						<div class="form-group">
							<label for="">Fecha</label>
							<input type="text" name="fecha_je" class="form-control requerido" id="fecha_je" placeholder="Fecha Jornada ElectoraL">
						</div>
						<div class="form-group">
							<label for="">Estados:</label>
							<select multiple size=10 id="id_estado_je[]" name="id_estado_je[]" class="form-control requerido">
								<?php
								for($e=0; $e<$num_edos; $e++){			?>
								<option value="<?php echo $edos[$e]['id_estado']?>"><?php echo $edos[$e]['descripcion']?></option>
								<?php
								}	?>
							</select>
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
					<button id="add_je" type="button" class="btn btn-primary" data-dismiss="modal">
						Agregar
					</button>
				</div>
			</div>

		</div>
	</div>
</div>

<br /><br /><br />


<?php
if($num_je != ""){			?>			
	<!-- TABLA JORNADA ELECTORAL -->
	<div id="tabla_je">	
		<div class="row">	
			<div class="table-responsive">	
				<table class="table">
					<tr>
						<th >Descripcion</th>
						<th >Fecha</th>
						<th>Estados</th>
						<th>Modificar</th>
						<th>Eliminar</th>
					</tr>			<?php
					for($i=0; $i<$num_je; $i++){			?>
						<tr>
							<td><?php echo $je[$i]['nombre']?></td>
							<td><?php echo $je[$i]['fechacreacion']?></td>
							<td>Estados....</td>
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
					}			?>
				</table>
			</div>
		</div>			
	</div>			
<!-- SCRIPT QUE CONTROLA EL POP "AGREGAR NUEVA JORNADA ELECTORAL" [ABRE EL POP Y HACE EL INSERT POR AJAX]-->
<script type="text/javascript"  src="<?php echo base_url("js/je/je.js")?>"></script>			<?php
	
}else{			?>
	
	<div id="tabla_je">
		<br /><br /><br />
		<center>
			<button id="mensajes" class="btn btn-warning btn-sm btn-block" disabled>No hay registros de Jornadas Electorales</button>
		</center>
		<!-- SCRIPT QUE CONTROLA EL POP "AGREGAR NUEVA JORNADA ELECTORAL" [ABRE EL POP Y HACE EL INSERT POR AJAX]-->
		<script type="text/javascript"  src="<?php echo base_url("js/je/je.js")?>"></script>
	</div>
			
	
	
	<br /><br /><br /><br /><br /><br />			<?php	
}			
?>
 	