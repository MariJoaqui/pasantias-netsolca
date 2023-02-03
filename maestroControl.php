<?php
include_once('connections/connec.php');
session_start();
header("Content-Type: text/html;charset=utf-8");

//include_once('validadSession.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="images/favicon.ico">
  	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title id="titulo"></title>

	<script src="title.js"></script>  
  	<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome 
	<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">-->
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
   

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
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
  
</head>

<!-- Aquí esta el color azul -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<header class="main-header">
		<!-- Logo -->
		<a href="maestroControl.php" class="logo">
			<img src="img/LOGO2.png" width="193" height="50">
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<div class="sidebar-toggle" data-toggle="offcanvas" style="font-size:26px; height:50px; line-height:25px; background-color:#400000;">
				<?php  include_once('titulo.php'); ?>
			</div>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="fotos/<?php echo $_SESSION['foto']; ?>" class="user-image" alt="User Image">
							<span class="hidden-xs"><?php echo $_SESSION["FullName"];  ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="fotos/<?php echo $_SESSION['foto']; ?>" class="img-circle" alt="User Image">
								<p>
								  <?php echo $_SESSION["FullName"];  ?>
								</p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="userProfile.php" class="btn btn-default btn-flat">Perfil</a>
								</div>
								<div class="pull-right">
									<a href="proceLogout.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
  <!-- Left side column. contains the logo and sidebar -->

<?php
	include_once('menu.php');
?>

<style>
	iframe{
		border: 1px solid black;
		width: 100%;
		height: 550px; 
  		display: block;
		bottom: 0px; 
	}
</style>
	<!-- Content Wrapper. Contains page content -->


		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">

			<iframe src="" scrolling="1" frameborder="0" allowtransparency="50" id="web" name="web"></iframe>

				
			</section>
			<!-- /.content -->
		</div>


	<!-- /.content-wrapper -->
 
	<footer class="main-footer">
		<div class="pull-right hidden-xs"><b>Version</b> 1.0</div>
		<strong>Copyright &copy; 2022 <a href="http://www.netsolca.com.ve">Netsolca</a>.</strong> Todos los derechos reservados.
	</footer>
</div>

<!-- ./wrapper -->

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
