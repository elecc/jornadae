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
		<button id="btn_votosr" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#pop_je">
			Agregar Votos requeridos de elección
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
                		  <strong>Jornada Electoral</strong><br>
                		  <strong>Descripción: </strong><?php echo $je[0]['nombre'] ?><br />
                		  <strong>Fecha: </strong><?php echo $je[0]['fechacreacion'] ?><br />
                  		</address>
                        	<div id="xlaelecc">
                        	</div>
   					</div>
					<!-- EN "MODAL BODY ES DONDE PONDREMOS TODOS LOS DATOS (FORMULARIOS QUE QUEREMOS UTILIZAR)" -->
					<div class="modal-body">
						<!-- INICIO DEL FORM -->
						<form id="form_votosreq" name="form_votosreq">
							<div class="form-group">
								<label for="seccion">Sección:</label>
								<input type="number" name="seccion" class="form-control" id="seccion" placeholder="Sección">
							</div>
							<div class="form-group">
								<label for="votos">No. de votos:</label>
								<input type="number" name="votos" class="form-control" id="votos" placeholder="Número de votos">
       					    	<input type="hidden" value="0" id="veleccion" name="veleccion" />    							
       					    </div>
						</form>
						<center>
							<button style="display: none" id="mensajes" class="btn btn-danger btn-sm btn-block" disabled></button>
						</center>  					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							Cerrar
						</button>
						<button id="add_votosr" type="button" class="btn btn-primary" data-dismiss="modal">
							Agregar
						</button>
					</div>
				</div>

			</div>
		</div>

		<!-- SCRIPT QUE CONTROLA EL POP "AGREGAR NUEVA JORNADA ELECTORAL" [ABRE EL POP Y HACE EL INSERT POR AJAX]-->
		<script type="text/javascript"  src="<?php echo base_url("js/eleccion/votosreq.js")?>"></script>

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


<div id="datos_votosr">	
<?php
    if ($num_votosr != "") {
?>

 <div class="row">
    <p>&nbsp;</p>	
		<div class="table-responsive">	
			<table class="table">
				<tr>
					<th >Sección</th>
					<th>Votos requeridos</th>
					<th>Eliminar</th>
				</tr>			<?php
                for ($x = 0; $x < $num_votosr; $x++) { ?>
				<tr>
					<td><?php echo $votosr[$x]['idseccion'] ?></td>
					<td><?php echo $votosr[$x]['voto'] ?></td> 
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

