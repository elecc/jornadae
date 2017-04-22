<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador de Jornada Electoral</title>
    
    <!--BASE URL -->
    <input type="hidden" name="baseUrl" id="baseUrl" value="<?php echo base_url();?>">

	<link href="<?php echo base_url('css/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('css/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
	<link media="all" type="text/css" href="<?php echo base_url('css/inicio_full_page/animate.min.css')?>" rel="stylesheet">
	<link media="all" type="text/css" href="<?php echo base_url('css/inicio_full_page//creative.css')?>" rel="stylesheet">
	
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/grid/prettify.css')?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/grid/tomorrow-night-blue.css')?>" />
	<!-- CSS NOTIFICACIONES ANIMATE -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/animate/animate.css')?>" />
	
</head>

<body id="page-top">
	
<!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                	<!-- <img src="<?php echo base_url('images/logo_secretaria.png')?>" width="70%" heigth="100%"> -->
                	<!-- <img src="<?php echo base_url('images/logo_partido.png')?>" width="150" heigth="100%"> -->
                	<img src="<?php echo base_url('images/logo_secretaria2.png')?>" width="70%" heigth="100%">
            	</a>
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#portfolio">Ingresar</a>
                    </li>
                    
                    
                    <!-- 	
                    <li>
                        <a class="page-scroll" href="#howto">Crea</a>
                    </li>
                    -->
                    
                    
                    <li>
                        <a class="page-scroll" href="#help">Más</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
   
   	<!--Header-->
  	 <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>ADMINISTRADOR DE JORNADA ELECTORAL</h1>
                <hr>
                <!--<p><h3>¿Quieres saber mas?</h3></p> -->
                <a href="#portfolio" class="btn btn-primary btn-xl page-scroll">Presiona Aquí para Ingresar</a>
            </div>
        </div>
    </header>
    
	<!--Portfolio-->
	<section id="portfolio">
		<div class="container">
            	<div class="row">
            		  <div class="col-lg-2" >
            		  </div>
            		  
            		
            		 <div class="col-lg-8" >
            		 	<!--
                    		<form action="<?php echo ACCESO_PRINCIPAL_APLICACION?>" method="post">
	                        <div class="table-responsive centerBlock bord">
	                        <table class="table centerBlock" style="width:90%;">
	                          
	                             <td colspan="2">
	                                <h4>Ingresa tu Usuario y Contraseña</h4>
	                            </td>
	                          </tr>
	                          
	                          <tr>
	                            <td><label for="usr">Usuario:</label></td>
	                            <td><input type="text" name="usr" class="form-control" id="usr"></td> 
	                          </tr>
	                           <tr>	                            
	                            <td colspan="2"> <?php echo form_error('usr'); ?></td>
	                           </tr>
	                          <tr>
	                            <td><label for="pwd">Contrase&ntilde;a:</label></td>
	                            <td> <input type="password" name="pwd" class="form-control" id="pwd"></td> 
	                          </tr>
	                           <tr>	                            
	                            <td colspan="2"> <?php echo form_error('pwd'); ?></td>
	                           </tr>
	                          <tr>
	                          <tr>
	                            <td><label for="pwd">Correo:</label></td>
	                            <td> <input type="email" name="correo" class="form-control" id="correo"></td> 
	                          </tr>
	                           <tr>	                            
	                            <td colspan="2"> <?php echo form_error('correo'); ?></td>
	                           </tr>
	                          <tr>
	                          	<td colspan="2">
	                                <div class="pinkText"><?php if(isset($error)){echo $mensaje;}?></div>
	                               
	                            </td>
	                          </tr>
	                          <tr>
	                            <td colspan="2">
	                                <button type="submit" class="btn btn-primary ">ENTRAR</button>
	                            </td>
	                          </tr>
	                        </table>
	                        </div>
	                    </form>
	                   -->
	                    <!--------------------------------------------------------------------------------------------->
	                    <form id="login" name="login">
	                        <div class="table-responsive centerBlock bord">
	                        <table class="table centerBlock" style="width:90%;">
	                          
	                             <td colspan="2">
	                                <h4>Ingresa tu Usuario y Contraseña</h4>
	                            </td>
	                          </tr>
	                          
	                          <tr>
	                            <td><label for="usr">Usuario:</label></td>
	                            <td><input type="text" name="usr" class="form-control" id="usr"></td> 
	                          </tr>
	                           <tr>	                            
	                            <td colspan="2"> <?php echo form_error('usr'); ?></td>
	                           </tr>
	                          <tr>
	                            <td><label for="pwd">Contrase&ntilde;a:</label></td>
	                            <td> <input type="password" name="pass" class="form-control" id="pass"></td> 
	                          </tr>
	                           <tr>	                            
	                            <td colspan="2"> <?php echo form_error('pwd'); ?></td>
	                           </tr>
	                          <tr>
	                          <tr>
	                            <td><label for="pwd">Correo:</label></td>
	                            <td> <input type="email" name="correo" class="form-control" id="correo" disabled=""></td> 
	                          </tr>
	                           <tr>	                            
	                            <td colspan="2"> <?php echo form_error('correo'); ?></td>
	                           </tr>
	                          <tr>
	                          	<td colspan="2">
	                                <div class="pinkText"><?php if(isset($error)){echo $mensaje;}?></div>
	                               
	                            </td>
	                          </tr>
	                          <tr>
	                            <td colspan="2">
	                                <!-- <button type="submit" class="btn btn-primary pink">ENTRAR</button> -->
	                                <button type="text" role="button" id="botonLogin" class="btn btn-primary ">ENTRAR</button>
	                            </td>
	                          </tr>
	                        </table>
	                        </div>
	                    </form>
	                    <!--------------------------------------------------------------------------------------------->
				    </div>

					<div class="col-lg-2" >
            		 </div>
                    
                </div>
           </div>		
    </section>
    
     
    <!--Crea-->
    
      
     <section  class="bg-primary" id="howto"  >
       	    
     </section>
    
     
     
     
     
<!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container ">

    			ADMINISTRADOR DE JORNADA ELECTORAL
               
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                       
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
   <!-- jQuery -->
	<script src="<?php echo base_url('js/jquery/dist/jquery.js')?>"></script>
	
	<!-- Bootstrap -->
    <script src="<?php echo base_url('js/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    
    <script src="<?php echo base_url('js/inicio_full_page/jquery.easing.min.js')?>"></script>
    <script src="<?php echo base_url('js/inicio_full_page/classie.js')?>"></script>
    <script src="<?php echo base_url('js/inicio_full_page/jquery.fittext.js')?>"></script>
    <script src="<?php echo base_url('js/inicio_full_page/wow.min.js')?>"></script>
    <script src="<?php echo base_url('js/inicio_full_page/creative.js')?>"></script>
    <script src="<?php echo base_url('js/inicio_full_page/cbpAnimatedHeader.min.js')?>"></script>
    
    <!-- JS NOTIFICACIONES ANIMATE -->
	<script type="text/javascript" src="<?php echo base_url('js/notify/bootstrap-notify.min.js')?>"></script>
    
    <!-- FUINCIONES GENERALES -->
	<script type="text/javascript" src="<?php echo base_url('js/funciones/funciones.js')?>"></script>
    
    <!-- CONTROLA LOGIN -->
    <script src="<?php echo base_url("js/login/login.js") ?>"></script>
    <!-- FIN DE CXONTROLA LOGIN -->
   <!--
   <script type="text/javascript" src="<?php echo base_url('js/grid/run_prettify.js')?>"></script>
   -->
	 <script>
	$('#mainTabsContri  a').click(function (e) {
		localStorage.setItem('lastTabContri', $(this).attr('href'));
		});
	
	var lastTabContri = localStorage.getItem('lastTabContri');
	
	if (lastTabContri){
		$('ul.nav-tabs').children().removeClass('active');
		$('a[href='+ lastTabContri +']').parents('li:first').addClass('active');
		$('div.tab-content').children().removeClass('active');
		$(lastTabContri).addClass('active in');
		}
		
		$("#load").hide();
		$("#container").show();
		$("#bajaUser").hide();
	</script>

	
</body>

</html>     