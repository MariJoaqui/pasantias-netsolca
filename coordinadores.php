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

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta name="theme-color" content="#7952b3">

    <!-- CDN jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main>

        <div class="container-lg position-absolute top-0 start-50 translate-middle-x">

            <h3>Cordinadores</h3>

            <table class="table table-bordered border-dark">
                <thead style="background-color:#fff;">
                    <tr>
                        <th scope="col">Nombre y Apellido</th>
                        <th scope="col">Cédula</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <?php
    
                $mostrar = "SELECT * FROM daep_alumno"; 
                $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));

                while ($datos = mysqli_fetch_array($consulta)) {

                ?>

                <tbody>
                    <tr>
                        <td class="text-start"><?php echo $datos['nombre'] . " " . $datos['apellido']; ?></td>
                        <td class="text-start"><?php echo $datos['cedula_id']; ?></td>
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
                        <td>
                            <?php

                                if ($datos['status']=="1"){
                                    echo 'Activa';
                                }
                                else if ($datos['status']=="0"){
                                    echo 'Inactiva';                
                                }
                                else {
                                    echo '--';
                                }
            
                            ?>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                <?php
                                    echo '<a class="btn btn-primary" href="#" role="button">Editar</a>';
                                    echo '<a class="btn btn-primary" href="#" role="button">Eliminar</a>';
                                ?>
                            </div>
                        </td>
                    </tr>
                </tbody>

                <?php
        
                }

                mysqli_close($conn);
            
                ?>

            </table>

            <a class="btn btn-primary" href="#" role="button">Agregar Nuevo</a>
    
        </div>
    </main>

</body>
</html>