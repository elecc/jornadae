<?php 
	if(!isset($_SESSION))
		session_start();
	$data_user = $_SESSION['data_user'.md5(base_url())];
	$nombre = $data_user->usuario->nombre;	
	//valores temporales
?>

<div class="container body">
 	<div class="main_container">
 		<div class="col-md-3 left_col">
 			 <div class="left_col scroll-view">
 			 	 <div class="navbar nav_title" style="border: 0;">
	             	 <a href="<?php echo base_url('')?>" class="site_title"><i class="fa fa-mail-reply" aria-hidden="true"></i> <span><small>Jornada Electoral</small> </span></a>
	           	 </div>
	           	 
	           	 <div class="clearfix"></div>

	            <div class="profile">
	              <div class="profile_pic">
	                <img src="<?php echo base_url('images/user.png')?>" alt="..." class="img-circle profile_img">
	              </div>
	              <div class="profile_info">
	                <span>Usuario:</span>
	                <h2><?php echo $this->session->userdata['ss_login']?></h2>
	                <span>Perfil:</span>
	                <h2><?php echo $this->session->userdata['ss_perfil']?></h2>
	              </div>
	            </div>

	            <br />
	            
	            <?php echo $sidebar_menu?>
	           	
	           	<?php echo $sidebar_footer?>
	           	 
 			 </div>
 		</div>
 		
 		<?php echo $top_nav?>
 		
 		<?php echo $page_content?>
 		
 		<footer>
          <div class="pull-right">
            ADMINISTRADOR DE JORNADA ELECTORAL
          </div>
          <div class="clearfix"></div>
        </footer>
 		
 	</div>
</div>