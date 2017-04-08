
  <?php $ci = get_instance(); ?>
  <?php $result = $ci->db->query("SELECT * FROM DESARROLLO.REGISTRO_FRAMEWORK"); ?>
  <?php 	if($result!=NULL){
				if($result->result_array()!=NULL){
					$result = $result->result_array();
					if(empty($result)){
						$result = array();
					}
				}else{
					$result = array();
				}
			} else{
				$result = array();
			}
  ?>
  
  <?php $ci = get_instance(); ?>
  <?php $result_usuarios = $ci->db->query("SELECT DISTINCT(CORREO) FROM DESARROLLO.REGISTRO_FRAMEWORK"); ?>
  <?php 	if($result_usuarios!=NULL){
				if($result_usuarios->result_array()!=NULL){
					$result_usuarios = $result_usuarios->result_array();
					if(empty($result_usuarios)){
						$result_usuarios = array();
					}
				}else{
					$result_usuarios = array();
				}
			} else{
				$result_usuarios = array();
			}
  ?>

 <!-- top tiles -->
  <div class="row tile_count">
    <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
      <!-- <span class="count_top"><i class="fa fa-user"></i> Total Usuarios</span> -->
      <span class="count_top"><i class="fa fa-user"></i> Total de Simpatizantes</span>
      <!-- <div class="count"><?php echo count($result_usuarios)?></div> -->
      <div class="count">932</div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total de Visitas</span>
      <!-- <div class="count green"><?php echo count($result)?></div> -->
      <div class="count green">235</div>
    </div>
  </div>
  <!-- /top tiles -->
  
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel tile fixed_height_320">
        <div class="x_title">
          <h2>Estadisticas</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="dashboard-widget-content">
            <ul class="quick-list">
              <li><i class="fa fa-code"></i><a href="#">Conteo Rapido</a></li>
              <li><i class="fa fa-code"></i><a href="#">PREP</a></li>
              <li><i class="fa fa-code"></i><a href="#">Registro de Casilla</a></li>
              <li><i class="fa fa-code"></i><a href="#">Captura de Votos</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

</div>