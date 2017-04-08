 		
 		<?php 
 			/*if(!isset($_SESSION))
				session_start();
			$data_user = $_SESSION['data_user'.md5(base_url())];
			$nombre = $data_user->usuario->nombre;*/
			$nombre = "Jornada Electoral";	
 		?>
 		
 		<div class="top_nav">
          <div class="nav_menu_cp">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars white"></i></a>
              </div>
			  <a class="navbar-brand" rel="home" href="#">
		        <img style="max-width:300px; margin-top: -7px;"
		             src="<?php echo base_url('images/logo_secretaria2.png')?>">
		      </a>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url('images/user.png')?>" alt=""><?php echo $nombre?>
                    <span class=" fa fa-angle-down white"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li><a href="<?php echo base_url('framework/inicio/session_kill')?>"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesi&oacute;n</a></li>
                  </ul>
                </li>

				  <?php //$ci = get_instance(); ?>
                  <?php //$result = $ci->db->query("SELECT * FROM DESARROLLO.NOTIFICACIONES_FRAMEWORK"); ?>
                  <?php 	/*if($result!=NULL){
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
							}*/
				  ?>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o white"></i>
                    <!-- <span class="badge bg-green"><?php echo count($result)?></span> -->
                    <span class="badge bg-green">2</span>
                  </a>
                  
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  	
                  	<?php //foreach ($result as $key => $value) {?>
					
					<li>
                      <a>
                        
                        <span class="image"><img src="<?php echo base_url('images/user.png')?>" alt="Profile Image" /></span>
                        <span>
                        <!--   <span><?php echo $value['IDNOTIFICACION']?></span> -->
                          <span>32</span>
                        </span>
                        <span class="message">
                          <?php //echo $value['NOTIFICACION']?>
                          Ejemplo de notificacion 
                        </span>
                        <!-- <span class="time"><?php echo $value['FECHA_ALTA']?></span> -->
                        <span class="time">30 de Marzo de 2017</span>
                      </a>
                    </li>
					
					
					<?php //}?>
                  
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>