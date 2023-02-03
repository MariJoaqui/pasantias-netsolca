<?php
include_once("connections/connec.php");

$id = $_GET['id'];
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

    <meta name="theme-color" content="#7952b3">

    <!-- CDN jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <style>@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Libre+Baskerville:ital@1&family=Ms+Madi&family=Oswald&family=Source+Sans+Pro&family=Source+Serif+Pro&family=Stint+Ultra+Condensed&display=swap');</style>
    <link href="css/animaciones.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main>

        <div class="container-lg position-absolute top-0 start-50 translate-middle-x font-family-oswald" style="margin-top: 15px">

            <h3>Estudiantes</h3>
            
            <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
            
            	<?php
    
                $mostrar = "SELECT * FROM daep_alumno WHERE id_escuela='$id' ORDER BY cedula_id"; 
                $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));

                while ($datos = mysqli_fetch_array($consulta)) {

                ?>

                <!--CARTA EN GENERAL-->
                <div class="col-sm-4">
                    <div class="card text-start border-gray plus color" style="border-radius: 10px; box-shadow: 0 0 6px black; margin-top: 10px;">
                        <div class="card-body h-100">
                            <h5 class="card-title"><?php echo $datos['nombre_apellido']; ?></h5>
                            <p class="card-text">Cédula de identidad: <?php echo $datos['cedula_id']; ?>

                            <?php
                        
                            $y = 4;
                            
                            ?>

                            </p>
                            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                <a class="btn zoom" style="box-shadow: 0 0 6px #095370; border-radius: 20px;" href="detalles.php?y=<?php echo $y; ?>&id=<?php echo $id; ?>&id_cedula=<?php echo $datos['cedula_id'];?>" role="button">Información</a>
                            </div>
                        </div>
                    </div>
                </div>
                

                <?php
                }
                ?>
                
            </div>
            
            <?php
            /*
            <table class="table table-bordered border-dark">
                <thead style="background-color:#fff;">
                    <tr>
                        <th scope="col">Cédula</th>
                        <th scope="col">Nombre y Apellido</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <?php
    
                $mostrar = "SELECT * FROM daep_alumno WHERE id_escuela='$id' ORDER BY cedula_id"; 
                $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));

                while ($datos = mysqli_fetch_array($consulta)) {

                ?>

                <tbody>
                    <tr>
                        <td class="text-start"><?php echo $datos['cedula_id']; ?></td>
                        <td class="text-start"><?php echo $datos['nombre_apellido']; ?></td>
                        <td class="text-start">
                            <?php 

                                if ($datos['telefono']==""){
                                    echo 'Desconocido';
                                }
                                else {
                                    echo $datos['telefono'];
                                }
                
                             ?>
                        </td>
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

                        <?php
                        
                        $id = $datos['cedula_id'];
                        $x = 4;
                        $y = 4;

                        ?>

                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                <a class="btn btn-info" href="detalles.php?y=<?php echo $y; ?>&id=<?php echo $id; ?>" role="button">Información</a>
                                <a class="btn btn-primary" href="datos-editar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" role="button">Editar</a>

                                <?php

                                $x = 6;

                                ?>

                                <a class="btn btn-danger" href="validacion.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" role="button">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                </tbody>

                <?php
        
                }

                mysqli_close($conn);
            
                ?>

            </table>
            */
            $x=6;
            ?>

            <a class="btn btn-1 zoom boton-modelo font-family-oswald" style="margin-top: 25px;" href="IngDatos.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" role="button">Nuevo Estudiante</a>
            <a class="btn zoom boton-modelo font-family-oswald" style="margin-top: 25px;" href="instituciones.php" role="button">Volver</a>

            
    
        </div>
    </main>

</body>
</html>