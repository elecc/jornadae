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
		<button  id="btn_creaind" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#pop_je">
			Agregar Candidato Independiente
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
						<h4 class="modal-title">Agregar Candidato Independiente</h4>
							<hr />
                    		<address>
                    		  <strong>Jornada Electoral</strong><br>
                    		  <strong>Descripción: </strong><?php echo $je[0]['nombre'] ?><br />
                    		  <strong>Fecha: </strong><?php echo $je[0]['fechacreacion'] ?><br />
                            	<div id="xlaelecc">
                            	</div> 
                            </address>
                           
					</div>
					<!-- EN "MODAL BODY ES DONDE PONDREMOS TODOS LOS DATOS (FORMULARIOS QUE QUEREMOS UTILIZAR)" -->
					<div class="modal-body">
						<!-- INICIO DEL FORM -->
						<form id="form_independientes" name="form_independientes">
							<div class="form-group">
								<label for="nombre">Nombre:</label>
								<input type="text" name="nombreind" class="form-control" id="nombreind" placeholder="Nombre">
							</div>
							<div class="form-group">
								<label for="paterno">Paterno:</label>
								<input type="text" name="paternoind" class="form-control" id="paternoind" placeholder="Apellido Paterno">
							</div>
							<div class="form-group">
								<label for="materno">Materno:</label>
								<input type="text" name="maternoind" class="form-control" id="maternoind" placeholder="Apellido Materno">
							</div>

   							<div class="form-group">
       					    	<input type="hidden" value="0" id="veleccion" name="veleccion" />                            
								<label>
									<input id="chkind" type="checkbox" name="chkind" />
									Conteo rápido </label>
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
						<button id="add_ind" type="button" class="btn btn-primary" data-dismiss="modal">
							Agregar
						</button>
					</div>
				</div>

			</div>
		</div>

		<!-- SCRIPT QUE CONTROLA EL POP "AGREGAR NUEVA JORNADA ELECTORAL" [ABRE EL POP Y HACE EL INSERT POR AJAX]-->
		<script type="text/javascript"  src="<?php echo base_url("js/eleccion/independientes.js")?>"></script>

	</div>
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


<div id="datos_ind">	
<?php
    if ($num_ind != "") {
?>

 <div class="row">
    <p>&nbsp;</p>	
		<div class="table-responsive">	
			<table class="table">
				<tr>
					<th >Id. independiente</th>
					<th >Nombre</th>
					<th>Conteo rápido</th>
					<th>Eliminar</th>
				</tr>			<?php
                for ($x = 0; $x < $num_ind; $x++) { ?>
				<tr>
					<td><?php echo $ind[$x]['id_independiente'] ?></td>
					<td><?php echo $ind[$x]['nombre']." ".$ind[$x]['apellidopaterno']." ".$ind[$x]['apellidomaterno'] ?></td>
					<td>No</td>    
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

