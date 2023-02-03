<?php

include_once("connections/connec.php");

$id_usuario = $_GET['id_usuario'];

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title id="titulo"></title>
    <script src="title.js"></script> 

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
 
    <!-- Font Awesome 
	<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">-->
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
	
    <meta name="theme-color" content="#7952b3">

    <!-- CDN jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <style>@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Libre+Baskerville:ital@1&family=Ms+Madi&family=Oswald&family=Source+Sans+Pro&family=Source+Serif+Pro&family=Stint+Ultra+Condensed&display=swap');</style>
    <link href="css/animaciones.css" rel="stylesheet">
    
</head>

<body>

    <main>

    <?php

        $mostrar = "SELECT * FROM daep_usuarios WHERE id='$id_usuario'"; 
        $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));

        while ($datos = mysqli_fetch_array($consulta)) {

        ?>
        
         <!--perfil-->      
        <div class="position-absolute top-0" style=" width:100%;">
            <div class="card border-dark font-family-oswald" style="margin: 0px auto; width: 24rem; box-shadow: 0 0 5px black; margin-top: 30px;">
            
            	<?php
            	if ($datos['foto']==""){
            	?>
            	<img src="fotos/predeterminada.jpeg" class="card-img-top" alt="...">
            	<?php
            	}
            	else {
            	?>
            	<img src="data:image/jpg;base64,<?php echo base64_encode($datos['foto']); ?>" class="card-img-top" alt="...">
            	<?php
            	}
                ?>

                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $datos['nombre']; ?></h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item border-dark">Correo: <?php echo $datos['correo']; ?></li>

                    <?php

                    //Mostrar el tipo de usuario: 
                    if ($datos['tipo_usuario']=="0"){
                        echo '<li class="list-group-item text-start border-dark">Nivel de usuario: Nivel Máximo</li>';
                    }
                    else if ($datos['tipo_usuario']=="1"){
                        echo '<li class="list-group-item text-start">Nivel de usuario: Director de Institución</li>';
                    }
                    else if ($datos['tipo_usuario']=="2"){
                        echo '<li class="list-group-item text-start">Nivel de usuario: Coordinador de Pasantías Institucional</li>';
                    }
                    else if ($datos['tipo_usuario']=="3"){
                        echo '<li class="list-group-item text-start">Nivel de usuario: Director de División o Dependencia</li>';
                    }
                     
                    //Mostrar si está activo o no:
                    if ($datos['activo_usuario']=="1"){
                        echo '<li class="list-group-item text-start">Estado: Activo</li>';
                    }
                    else if ($datos['activo_usuario']=="0") {
                        echo '<li class="list-group-item text-start">Estado: Inactivo</li>';
                    }
                    else {
                        echo '<li class="list-group-item text-start">Estado: -- </li>';
                    }

                    ?>

                </ul>

                <div class="card-body text-center datos" style= "font-family: Oswald;">
                    <?php
                        echo '<a href="datos-editar.php?id=' . $id_usuario . '&x=6" class="btn zoom boton-modelo font-family-oswald" style="border-radius: 10px; background-color: #286E86; color: #ffffff; box-shadow: 0 0 8px black;">Editar datos</a>';
                    ?>
                </div>
            </div>
        </div>

        <?php
        }
        ?>

    </main>

</body>
</html>