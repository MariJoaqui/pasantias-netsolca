<?php
include_once("connections/connec.php");
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

    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Libre+Baskerville:ital@1&family=Ms+Madi&family=Oswald&family=Source+Sans+Pro&family=Source+Serif+Pro&family=Stint+Ultra+Condensed&display=swap');</style>

    <meta name="theme-color" content="#7952b3">

    <!-- CDN jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/animaciones.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

</head>

<body class="text-center">

    <main>
        <!--<div class="container-lg position-absolute top-0 start-50 translate-middle-x" style="font-family: Oswald; margin-top: 15px;">
            <h3>Usuarios</h3>
            <table class="table table-bordered border-dark" style="margin-top: 20px">
                <thead style="background-color: #ffffff;">
                <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Correo</th>
                    <th scope="col" style="width: 200px !important;">Nivel de usuario</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
        </div>-->
        


        <div class="container-lg position-absolute top-0 start-50 translate-middle-x font-family-oswald" style="margin-top: 15px">

            <h3>Usuarios</h3>

            <table class="table table-bordered border-dark color" style="box-shadow: 0 0 6px black; margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Correo</th>
                        <th scope="col" style="width: 200px !important;">Nivel de usuario</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <?php
    
                $mostrar = "SELECT * FROM daep_usuarios"; 
                $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));

                while ($datos = mysqli_fetch_array($consulta)) {

                ?>

                <tbody>
                    <tr>
                        <td class="text-start"><?php echo $datos['nombre']; ?></td>

                        <td class="text-start">
                            <?php 
                    
                                if ($datos['correo']==""){
                                    echo 'Desconocido';
                                }
                                else {
                                    echo $datos['correo'];
                                }
                         
                            ?>
                        </td>

                        <td class="text-start">
                            <?php 
                                if ($datos['tipo_usuario']=="0"){
                                    echo 'Nivel Máximo';
                                }
                                else if ($datos['tipo_usuario']=="1"){
                                    echo 'Director de Institución';
                                }
                                else if ($datos['tipo_usuario']=="2"){
                                    echo 'Coordinador de Pasantías Institucional';
                                }
                                else if ($datos['tipo_usuario']=="3"){
                                    echo 'Director de División o Dependencia';
                                }
                            ?>
                        </td>

                        <td>
                            <?php
                                if ($datos['activo_usuario']=="1"){
                                    echo 'Activo';
                                }
                                else if ($datos['activo_usuario']=="0"){
                                    echo 'Inactivo';                
                                }
                                else {
                                    echo '--';
                                }
                            ?>
                        </td>

                        <?php

                        $id = $datos['id'];
                        $x = 2;

                        ?>

                        <td> <!--BOTONES-->
                            <div class="btn-group-sm" role="group" aria-label="...">
                                <a class="btn zoom" style="box-shadow: 0 0 8px #095370; border-radius: 20px; margin-right: 6px" href="datos-editar.php?x=<?php echo $x;?>&id=<?php echo $id; ?>" role="button">Editar</a>
                                
                                <?php

                                $x = 4;

                                ?>
                                
                                <a class="btn zoom" style="box-shadow: 0 0 8px red; border-radius: 20px; margin-right: 6px" href="validacion.php?x=<?php echo $x;?>&id=<?php echo $id; ?>" role="button">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                </tbody>

                <?php
        
                }

                mysqli_close($conn);
            
                ?>

            </table>

            <a class="btn btn-lg rounded-square zoom boton-model font-family-oswald" href="IngDatos.php?x=<?php echo $x; ?>" role="button">Nuevo Usuario</a>
    
        </div>
    </main>

</body>
</html>