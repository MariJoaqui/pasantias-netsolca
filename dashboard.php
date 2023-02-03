<?php  
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="images/favicon.ico">
  	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title id="titulo">Coordinación de Pasantías</title> 
	<!--<link rel="icon" href="img/LOGO3.jpg">-->

	<link rel="stylesheet" href="css/estilos-menu.css">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
	<!-- Font Awesome 
	<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">-->
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">

  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  
  	<!-- Font Awesome 
	<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">-->
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons 
	<link rel="stylesheet" href="cdnjs.cloudflare/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
	<!-- DataTables 
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/plugins/datatables/dataTables.bootstrap.css">-->
	<!-- Theme style -->
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/skins/_all-skins.min.css">
	<style>@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Libre+Baskerville:ital@1&family=Ms+Madi&family=Oswald&family=Source+Sans+Pro&family=Source+Serif+Pro&family=Stint+Ultra+Condensed&display=swap');</style>
	<link href="css/animaciones.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/newStyles.css" rel="stylesheet">
</head>

<!-- Estilos -->
<style>
	li {
		list-style-type: none;
	}
	.boton-menu-responsive {
		display: none;
	}
	a { 
		text-decoration: none !important; 
	}
	.dropdown-toggle::after {
		display: none;
	}
	#responsive-menu {
		height: 50px;
	}
    @media (max-width: 940px) {
		.titulo {
			font-size: 1.5rem !important;
		}
    }
	@media (max-width: 765px) {
		.navbar {
			display: flex;
			height: 2rem;
		}
		.navbar-custom-menu {
			margin-left: auto;
		}
		.titulo {
			display: none;
		}
		.boton-menu-responsive {
			display: block;
		}
		.salir-boton {
			margin-bottom: 0.8rem;
			margin-right: 0.7rem !important;
		}
	}
</style>

<!-- Parte superior de la segunda pantalla (Línea de arriba) -->
<body class="hold-transition sidebar-mini" 
      style="background: rgb(161,213,231); background: linear-gradient(90deg, rgba(161,213,231,1) 19%, rgba(142,190,210,1) 42%, rgba(117,159,182,1) 77%, rgba(105,148,163,1) 98%);">

	<div class="wrapper">
		<header class="main-header">

			<!-- Logo -->
			<a href="#" class="logo">
				<img src="img/logo-sin-fondo.png" width="200" height="40">
			</a>

		    <nav class="navbar navbar-static-top">

				<!-- Botón de usuario y opciones del mismo 
				<button type="button" class="navbar-toggle collapsed visible" data-toggle="collapse" data-target="#menu" style="padding:0;">
					<div class="sidebar-toggle" data-toggle="offcanvas" id="responsive-menu">
						<div class="visible position-absolute top-0 end-0" id="menu" style="width: 250px;">
							<ul class="sidebar-menu" data-widget="tree">

							<?php

							$nivel = $_SESSION["tipo"];

							//Nivel máximo del menú responsive
							if ( $nivel == 0 ) {

							?>

							<li class="color-fondo font-family-oswald espacio">
								<a href="instituciones.php" target="web" style="color:#000000; font-size: 16px;">
									<i class="fa-thin fa fa-list"></i><span>Instituciones y Pasantes</span>
								</a>
							</li>
							<li class="color-fondo font-family-oswald  espacio">
								<a href="departamentos.php" target="web" style="color:#000000; font-size: 16px;">
									<i class="fa-thin fa fa-building"></i><span>Departamentos</span>
								</a>
							</li>
							<li class="color-fondo font-family-oswald espacio">
								<a href="asignacion.php" target="web" style="color:#000000; font-size: 16px;">
									<i class="fa-thin fa fa-clipboard"></i><span>Asignación de pasantes</span>
								</a>
							</li>
							<li class="treeview color-fondo font-family-oswald espacio">
								<a href="#" style="color:#000000; font-size: 16px;">
									<i class="fa-thin fa fa-gears"></i><span>Opciones</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li class="color-fondo-1 espacio"><a href="usuarios.php"  target="web" style="color:#000000; font-size: 15px;"><i class="fa-thin fa fa-user"></i>Usuarios</a></li>
									<li class="color-fondo-1 espacio"><a href="jefes.php"     target="web" style="color:#000000; font-size: 15px;"><i class="fa-thin fa fa-lock"></i>Jefes</a></li>
									<li class="color-fondo-1 espacio"><a href="userProfile.php?id_usuario=<?php echo $_SESSION["id"]; ?>" target="web" style="color:#000000; font-size: 15px;"><i class="fa-sharp fa-solid fa fa-address-card"></i>Mi perfil</a></li>
								</ul>
							</li>

							<?php } 

							//Director de la institución del menú responsive
							if ( $nivel == 1 ) {

							?>

							<li class="color-fondo font-family-oswaldespacio">
								<a href="instituciones.php" target="web" style="color:#000000; font-size: 16px;">
									<i class="fa fa-list"></i><span>Instituciones</span>
								</a>
							</li>

							<?php } 

							//Coordinador de pasantías institucional del menú responsive
							if ( $nivel == 2 ) {

							?>

							<li class="color-fondo font-family-oswald espacio">
								<a href="instituciones.php" target="web" style="color:#000000; font-size: 16px;">
									<i class="fa fa-list"></i><span>Instituciones</span>
								</a>
							</li>

							<?php } 
							
							//Director de División o dependencia:
							if ( $nivel == 3 ) {
								
							?>

							<li class="color-fondo font-family-oswald espacio">
								<a href="departamentos.php" target="web" style="color:#000000; font-size: 16px;">
									<i class="fa-thin fa fa-building"></i><span>Departamentos</span>
								</a>
							</li>
							<li class="color-fondo font-family-oswald espacio">
								<a href="asignacion.php" target="web" style="color:#000000; font-size: 16px;">
									<i class="fa-thin fa fa-clipboard"></i><span>Asignación de pasantes</span>
								</a>
							</li>

							<?php } ?>

							</ul>
  						</div>
				    </div>
				</button> -->
				
				<button class="btn boton-menu-responsive" style="margin-bottom: 0.6rem; color: #004aad;" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
 <i class="fa-solid fa fa-bars"></i>
				</button>

				<?php 
				$nivel = $_SESSION["tipo"];
				?>
				
				<div class="offcanvas offcanvas-start" style="width: 15rem !important; background: rgb(105,148,163); background: linear-gradient(0deg, rgba(105,148,163,1) 28%, rgba(117,159,182,1) 44%, rgba(161,213,231,1) 98%); font-family: Oswald;" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
				  <div class="offcanvas-header">
				    <h5 class="offcanvas-title fw-bolder" id="staticBackdropLabel">Menú principal</h5>
				    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				  </div>
				  <div class="offcanvas-body">
				  <?php 
				
				  //nivel máximo:
					if($nivel==0){
					
					?>
					
					<li class="color-fondo font-family-oswald">
					    <a href="instituciones.php" target="web" style="color:#000000; font-size: 16px;">
					        <i class="fa-thin fa fa-list"></i><span>Instituciones y Pasantes</span>
					    </a>
					</li>
					
					<li class="color-fondo font-family-oswald">
					    <a href="departamentos.php" target="web" style="color:#000000; font-size: 16px;">
					        <i class="fa-thin fa fa-building"></i><span>Departamentos</span>
					    </a>
					</li>
					
					<li class="color-fondo font-family-oswald">
					    <a href="asignacion.php" target="web" style="color:#000000; font-size: 16px;">
					        <i class="fa-thin fa fa-clipboard"></i><span>Asignación de pasantes</span>
					    </a>
					</li>
					
					<li class="treeview color-fondo font-family-oswald">
					    <a href="#" style="color:#000000; font-size: 16px;">
					        <i class="fa-thin fa fa-gears"></i><span>Opciones</span>
					        <span class="pull-right-container">
					            <i class="fa fa-angle-left pull-right"></i>
					        </span>
					    </a>
					    <ul class="treeview-menu">
					        <li class="color-fondo-1"><a href="usuarios.php"  target="web" style="color:#000000; font-size: 15px;"><i class="fa-thin fa fa-user"></i>Usuarios</a></li>
					        <li class="color-fondo-1"><a href="jefes.php"     target="web" style="color:#000000; font-size: 15px;"><i class="fa-thin fa fa-lock"></i>Jefes</a></li>
					        <li class="color-fondo-1"><a href="userProfile.php?id_usuario=<?php echo $_SESSION["id"]; ?>" target="web" style="color:#000000; font-size: 15px;"><i class="fa-sharp fa-solid fa fa-address-card"></i>Mi perfil</a></li>
					    </ul>
					</li>
					
					<?php } ?>
					
					<?php
					
					//Director de la institución:
					if($nivel==1){
					
					?>
					
					<li class="color-fondo font-family-oswald">
					    <a href="instituciones.php" target="web" style="color:#000000; font-size: 16px;">
					        <i class="fa fa-list"></i><span>Instituciones</span>
					    </a>
					</li>
					
					<?php } 
					
					//Coordinador de pasantías institucional:
					if($nivel==2){
					
					?>
					
					<li class="color-fondo font-family-oswald">
					    <a href="instituciones.php" target="web" style="color:#000000; font-size: 16px;">
					        <i class="fa fa-list"></i><span>Instituciones</span>
					    </a>
					</li>
					
					<?php }
					
					//Director de División o dependencia:
					else if ($nivel==3){
					    ?>
					
					    <li class="color-fondo font-family-oswald">
					        <a href="departamentos.php" target="web" style="color:#000000; font-size: 16px;">
					            <i class="fa-thin fa fa-building"></i><span>Departamentos</span>
					        </a>
					    </li>
					
					    <li class="color-fondo font-family-oswald">
					        <a href="asignacion.php" target="web" style="color:#000000; font-size: 16px;">
					            <i class="fa-thin fa fa-clipboard"></i><span>Asignación de pasantes</span>
					        </a>
					    </li>
					
					    <?php
					}
					?>
				  </div>
				</div>
			  
				<!-- Título o nombre de la aplicación -->
				<div class="" style="float:left; height:54px !important">
			    	<h3 class="titulo" style="padding-left: 15px; padding-top: 1px; margin-top:9px; color: #000000; font-family: Oswald; font-size: 30px;">Dirección de Educación y Asuntos Universitarios</h3>
				</div>

				<!-- Perfil del usuario 
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">

						 Datos del usuario 
						<li class="dropdown user user-menu">
						
							<a href="#" id="user-name" class="dropdown-toggle" data-toggle="dropdown" style="padding: 2rem;">
								<span class="hidden-xs user-name" style="color: #fff;"><?php echo $_SESSION["FullName"];  ?></span>
							</a>
							<ul class="dropdown-menu" style="background-color:#F1F1DF;">
								<li class="user-header">
									<img src="img/logo-perfil-circulo.png" class="img-circle" alt="User Image">
									<p style="color: black; margin-bottom:2px;">

									<?php echo $_SESSION["FullName"]; ?> <br>

									<?php 
									
									if ( $_SESSION["tipo"] == "0" ) {
										echo '<h5 style="color: #000; margin-top:2px;">Administrador del sistema</h5>';
									}  
									else if ( $_SESSION["tipo"] == "1" ) {
										echo '<h5 style="color: #000; margin-top:2px;">Director de Institución</h5>';
									}
									else if ( $_SESSION["tipo"] == "2" ) {
										echo '<h5 style="color: #000; margin-top:2px;">Coordinador de Pasantías Institucional</h5>';
									}
									else if ( $_SESSION["tipo"] == "3" ) {
										echo '<h5 style="color: #000; margin-top:2px;">Director de División o Dependencia</h5>';	
									}

									?>

									</p>
								</li>
									
								 Menu Footer 
								<li class="user-footer" style="background-color:  #286E86;">
									<div class="pull-left" style="background-color: white;">
									<?php echo '<a href="userProfile.php?id_usuario=' . $_SESSION["id"] . '" target="web" class="btn btn-default btn-flat zoom" style="color: black; font-family: Oswald; font-size:14px; box-shadow: 0 0 6px black;">Perfil</a>'; ?>
									</div>
									<div class="pull-right" style="background-color: white;">
										<a href="php/proceLogout.php" class="btn btn-default btn-flat zoom" style="color: black; font-family: Oswald; font-size: 14px; box-shadow: 0 0 6px black;">Cerrar Sesión</a>
									</div>
								</li>
							</ul>
						
						</li>
					</ul>
				</div> -->
				
				<!-- Boton Salir -->
				<a href="php/proceLogout.php">
					<div class="salir-boton" style="display: flex; margin-right: 2rem; color: #fff; font-size: 1rem; font-family: Oswald;">
						Salir
					</div>
				</a>
			</nav>
		</header>

  		<!-- Menú de la parte izquierda -->
  		<aside class="main-sidebar" 
			   style="background: rgb(105,148,163); background: linear-gradient(0deg, rgba(105,148,163,1) 28%, rgba(117,159,182,1) 44%, rgba(161,213,231,1) 98%);">

    		<section class="sidebar">
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header font-family-oswald" style="text-align:center;color:#000000;  font-size: 19px;">MENÚ PRINCIPAL</li>
					
					<!-- Contenido del menú --> 
					<?php include_once('menu.php'); ?>  
				</ul>
    		</section>
  		</aside>

		<!-- Contenido de la página --> 		
  		<div class="content-wrapper">

			<!-- Creación del panel central --> 
			<style>
				iframe{
					width: 100%;
					height: 750px; 
					display: block;
					bottom: 0px;
				}
			</style>
 
 			<!-- Centro donde va toda la información --> 
			<section style="background-color: rgb(255, 255, 250);">
				<iframe src="" scrolling="1" frameborder="0" allowtransparency="50" id="web" name="web"></iframe>
			</section>
  		</div>

		<!-- Footer --> 
  		<footer class="main-footer" style= "font-family: Oswald;";>
			<div class="pull-right hidden-xs"><b>Version</b> 1.0</div>
			<strong>Copyright &copy; 2022 <a href="http://www.netsolca.com.ve">Netsolca</a>.</strong> Todos los derechos reservados.
		</footer>

  		<div class="control-sidebar-bg"></div>
	</div>

	<!-- jQuery 2.2.3 -->
	<script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.6 -->
	<script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Morris.js charts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.0/raphael-min.js"></script>
	<script src="https://adminlte.io/themes/AdminLTE/bower_components/morris.js/morris.min.js"></script>
	<!-- Sparkline 
	<script src="https://adminlte.io/themes/AdminLTE/plugins/sparkline/jquery.sparkline.min.js"></script>-->
	<!-- jvectormap 
	<script src="https://adminlte.io/themes/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="https://adminlte.io/themes/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
	<!-- jQuery Knob Chart
	<script src="https://adminlte.io/themes/AdminLTE/plugins/knob/jquery.knob.js"></script> -->
	<!-- daterangepicker
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
	<script src="https://adminlte.io/themes/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script> -->
	<!-- datepicker
	<script src="https://adminlte.io/themes/AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script> -->
	<!-- Bootstrap WYSIHTML5 
	<script src="https://adminlte.io/themes/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
	<!-- Slimscroll 
	<script src="https://adminlte.io/themes/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>-->
	<!-- FastClick 
	<script src="https://adminlte.io/themes/AdminLTE/plugins/fastclick/fastclick.min.js"></script>-->
	<!-- AdminLTE App -->
	<script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>