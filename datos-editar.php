<?php

include_once("connections/connec.php");

//Variable para validar la edición:
//Instituciones (engloba a todo lo que esta dentro de ella tanbién) = 1
//Usuarios = 2
//Jefes = 3
//Estudiantes = 4
//Departamentos = 5
$x = $_GET['x'];

//Id del elemento a editar:
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

    <?php

    if ($x == 1){
        $mostrarI = "SELECT * FROM daep_escuela WHERE id='$id'"; 
        $consultaI = mysqli_query($conn, $mostrarI) or die($mysqli_error($conn));
            
        while ($datosI = mysqli_fetch_array($consultaI)) {
            $id_director = $datosI['id_director'];
            $id_coordinador = $datosI['id_coordinador'];
        }

        if ($id_director == 0 && $id_coordinador == 0){
            $mostrarI = "SELECT * FROM daep_escuela WHERE id='$id'"; 
            $consultaI = mysqli_query($conn, $mostrarI) or die($mysqli_error($conn));
                
            while ($datosI = mysqli_fetch_array($consultaI)) {
                ?>

                <form action="editar.php?id=<?php echo $id; ?>&x=<?php echo $x; ?>" method="post">
                    <div class="card position-absolute top-0" style="width:10%; ">
                        <div class="card-header fw-bold color font-family-oswald">
                            Institución
                        </div>
    
                        <div class="card-body color font-family-oswald">
                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Nombre de la Institución</label>
                                    <input type="text" class="form-control" name="nombre_i" placeholder="<?php echo $datosI['nombre']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" name="direccion_i" placeholder="<?php echo $datosI['direccion']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Parroquia</label>
                                    <input type="text" class="form-control" name="parroquia_i" placeholder="<?php echo $datosI['parroquia']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                                    <input type="text" class="form-control" name="telefono_i" placeholder="<?php echo $datosI['telefono']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" name="correo_i" placeholder="<?php echo $datosI['correo']; ?>">
                                </div> 
                            </div> 

                            <?php

                            $y = 1;

                            ?>
                        
                            <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                                <button class="btn btn-1 boton-modelo zoom" type="submit" name="action">Guardar cambios</button>
                                <a class="btn boton-modelo zoom" href="detalles.php?id=<?php echo $id; ?>&y=<?php echo $y?>" role="button">Volver</a>
                            </div> 
                        </div>
                    </div>
                </form>

            <?php
            }
        }
        else if ($id_director == 0){

            ?>

            <form action="editar.php?id=<?php echo $id; ?>&x=<?php echo $x; ?>" method="post">
                <div class="card position-absolute top-0 border-gray" style="width:90%; margin-top: 20px; margin-left: 45px; box-shadow: 0 0 6px black;">

                <?php

                $mostrarI = "SELECT * FROM daep_escuela WHERE id='$id'"; 
                $consultaI = mysqli_query($conn, $mostrarI) or die($mysqli_error($conn));
                
                while ($datosI = mysqli_fetch_array($consultaI)) {

                ?>

                    <div class="card-header fw-bold color font-family-oswald">
                        Institución
                    </div>
    
                    <div class="card-body color font-family-oswald">
                        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                            <div class="col-md-3">
                                <label for="formGroupExampleInput" class="form-label">Nombre de la Institución</label>
                                <input type="text" class="form-control" name="nombre_i" placeholder="<?php echo $datosI['nombre']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="formGroupExampleInput" class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="direccion_i" placeholder="<?php echo $datosI['direccion']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="formGroupExampleInput" class="form-label">Parroquia</label>
                                <input type="text" class="form-control" name="parroquia_i" placeholder="<?php echo $datosI['parroquia']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                                <input type="text" class="form-control" name="telefono_i" placeholder="<?php echo $datosI['telefono']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" name="correo_i" placeholder="<?php echo $datosI['correo']; ?>">
                            </div> 
                        </div> 
                    </div>

                <?php
                }

                $mostrarC = "SELECT * FROM daep_coordinador WHERE id='$id_coordinador'"; 
                $consultaC = mysqli_query($conn, $mostrarC) or die($mysqli_error($conn));
                
                while ($datosC = mysqli_fetch_array($consultaC)) {

                ?>

                    <div class="card-header fw-bold color font-family-oswald">
                        Coordinación de la Institución
                    </div>

                    <div class="card-body color font-family-oswald">
                        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                            <div class="col-md-3">
                                <label for="formGroupExampleInput" class="form-label">Nombre del Coordinador</label>
                                <input type="text" class="form-control" name="nombre_c" placeholder="<?php echo $datosC['nombre']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="formGroupExampleInput" class="form-label">Apellido del Coordinador</label>
                                <input type="text" class="form-control" name="apellido_c" placeholder="<?php echo $datosC['apellido']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="formGroupExampleInput" class="form-label">Cédula de Identidad</label>
                                <input type="text" class="form-control" name="cedula_c" placeholder="<?php echo $datosC['cedula']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                                <input type="text" class="form-control" name="telefono_c" placeholder="<?php echo $datosC['telefono']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" name="correo_c" placeholder="<?php echo $datosC['correo']; ?>">
                            </div> 

                            <?php

                            $y = 1;

                            ?>
                    
                            <div class="d-grid gap-2 d-md-block" style="width: 100%;">
                                <button class="btn btn-1 boton-modelo zoom" type="submit" name="action">Agregar</button>
                                <a class="btn boton-modelo zoom" href="detalles.php?id=<?php echo $id; ?>&y=<?php echo $y?>" role="button">Volver</a>
                            </div>
                        </div> 
                    </div>
                <?php
                }
                ?> 
                
            </form>

        <?php

        }
        else if ($id_coordinador == 0) {

            ?>
            
            <form action="editar.php?id=<?php echo $id; ?>&x=<?php echo $x; ?>" method="post">
                <div class="card position-absolute top-0" style="width:100%;">
            
                    <?php
            
                    $mostrarI = "SELECT * FROM daep_escuela WHERE id='$id'"; 
                    $consultaI = mysqli_query($conn, $mostrarI) or die($mysqli_error($conn));
                            
                    while ($datosI = mysqli_fetch_array($consultaI)) {
            
                    ?>
            
                        <div class="card-header fw-bold color font-family-oswald">
                            Institución
                        </div>
                
                        <div class="card-body color font-family-oswald">
                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Nombre de la Institución</label>
                                    <input type="text" class="form-control" name="nombre_i" placeholder="<?php echo $datosI['nombre']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" name="direccion_i" placeholder="<?php echo $datosI['direccion']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Parroquia</label>
                                    <input type="text" class="form-control" name="parroquia_i" placeholder="<?php echo $datosI['parroquia']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                                    <input type="text" class="form-control" name="telefono_i" placeholder="<?php echo $datosI['telefono']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" name="correo_i" placeholder="<?php echo $datosI['correo']; ?>">
                                </div> 
                            </div> 
                        </div>
            
                    <?php
                    }
            
                    $mostrarD = "SELECT * FROM daep_director WHERE id='$id_director'"; 
                    $consultaD = mysqli_query($conn, $mostrarD) or die($mysqli_error($conn));
                        
                    while ($datosD = mysqli_fetch_array($consultaD)) {
            
                    ?>
            
                        <div class="card-header fw-bold color font-family-oswald">
                            Director de la Institución
                        </div>

                        <div class="card-body color font-family-oswald">
                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Nombre del Director</label>
                                    <input type="text" class="form-control" name="nombre_d" placeholder="<?php echo $datosD['nombre']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Apellido del Director</label>
                                    <input type="text" class="form-control" name="apellido_d" placeholder="<?php echo $datosD['apellido']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Cédula de Identidad</label>
                                    <input type="text" class="form-control" name="cedula_d" placeholder="<?php echo $datosD['cedula']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                                    <input type="text" class="form-control" name="telefono_d" placeholder="<?php echo $datosD['telefono']; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" name="correo_d" placeholder="<?php echo $datosD['correo']; ?>">
                                </div> 

                                <div class="d-grid gap-2 d-md-block" style="width: 100%;">
                                    <button class="btn btn-1 boton-modelo zoom" type="submit" name="action">Agregar</button>
                                    <a class="btn boton-modelo zoom" href="detalles.php?id=<?php echo $id; ?>" role="button">Volver</a>
                                </div>
                            </div> 
                        </div>

                    <?php
                    }
                    ?> 

            </form>

            <?php
        }
        else {

            ?>

            <form action="editar.php?id=<?php echo $id; ?>&x=<?php echo $x; ?>" method="post">
                <div class="card position-absolute top-0" style="width:90%; margin-top: 15px; margin-left: 40px; box-shadow: 0 0 6px black;">
        
                <?php
        
                $mostrarI = "SELECT * FROM daep_escuela WHERE id='$id'"; 
                $consultaI = mysqli_query($conn, $mostrarI) or die($mysqli_error($conn));
                        
                while ($datosI = mysqli_fetch_array($consultaI)) {
        
                ?>
        
                    <div class="card-header fw-bold color font-family-oswald">
                        Institución
                    </div>
            
                    <div class="card-body color font-family-oswald" >
                        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Nombre de la Institución</label>
                                <input type="text" class="form-control" name="nombre_i" placeholder="<?php echo $datosI['nombre']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="direccion_i" placeholder="<?php echo $datosI['direccion']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Parroquia</label>
                                <input type="text" class="form-control" name="parroquia_i" placeholder="<?php echo $datosI['parroquia']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                                <input type="text" class="form-control" name="telefono_i" placeholder="<?php echo $datosI['telefono']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" name="correo_i" placeholder="<?php echo $datosI['correo']; ?>">
                            </div> 
                        </div> 
                    </div>
        
                <?php
                }
        
                $mostrarD = "SELECT * FROM daep_director WHERE id='$id_director'"; 
                $consultaD = mysqli_query($conn, $mostrarD) or die($mysqli_error($conn));
                    
                while ($datosD = mysqli_fetch_array($consultaD)) {
        
                ?>
        
                    <div class="card-header fw-bold color font-family-oswald">
                        Dirección de la Institución
                    </div>

                    <div class="card-body color font-family-oswald">
                        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Nombre del Director</label>
                                <input type="text" class="form-control" name="nombre_d" placeholder="<?php echo $datosD['nombre']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Apellido del Director</label>
                                <input type="text" class="form-control" name="apellido_d" placeholder="<?php echo $datosD['apellido']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Cédula de Identidad</label>
                                <input type="text" class="form-control" name="cedula_d" placeholder="<?php echo $datosD['cedula']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                                <input type="text" class="form-control" name="telefono_d" placeholder="<?php echo $datosD['telefono']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" name="correo_d" placeholder="<?php echo $datosD['correo']; ?>">
                            </div> 
                        </div> 
                    </div>

                <?php
                }

                $mostrarC = "SELECT * FROM daep_coordinador WHERE id='$id_coordinador'"; 
                $consultaC = mysqli_query($conn, $mostrarC) or die($mysqli_error($conn));
                
                while ($datosC = mysqli_fetch_array($consultaC)) {

                ?>

                    <div class="card-header fw-bold color font-family-oswald">
                        Coordinación de la Institución
                    </div>

                    <div class="card-body color font-family-oswald">
                        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Nombre del Coordinador</label>
                                <input type="text" class="form-control" name="nombre_c" placeholder="<?php echo $datosC['nombre']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Apellido del Coordinador</label>
                                <input type="text" class="form-control" name="apellido_c" placeholder="<?php echo $datosC['apellido']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Cédula de Identidad</label>
                                <input type="text" class="form-control" name="cedula_c" placeholder="<?php echo $datosC['cedula']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                                <input type="text" class="form-control" name="telefono_c" placeholder="<?php echo $datosC['telefono']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" name="correo_c" placeholder="<?php echo $datosC['correo']; ?>">
                            </div> 

                            <?php

                            $y = 1;

                            ?>

                            <div class="d-grid gap-2 d-md-block" style="width: 100%;">
                                <button class="btn btn-1 boton-modelo zoom" type="submit" name="action">Agregar</button>
                                <a class="btn boton-modelo zoom" href="detalles.php?id=<?php echo $id; ?>&y=<?php echo $y; ?>" role="button">Volver</a>
                            </div>
                        </div> 
                    </div>

                <?php
                }
                ?>

            </form>
        <?php
        }
    }
    else if ($x == 2){
        ?>
        
        <form action="editar.php?id=<?php echo $id; ?>&x=<?php echo $x; ?>" method="post">
            <div class="card position-absolute top-0 font-family-oswald" style="margin-left: 170px; box-shadow: 0 0 6px black; margin-top: 25px; width: 60%;;">

            <?php

            $mostrarU = "SELECT * FROM daep_usuarios WHERE id='$id'"; 
            $consultaU = mysqli_query($conn, $mostrarU) or die($mysqli_error($conn));
        
            while ($datosU = mysqli_fetch_array($consultaU)) {

            ?>

                <div class="card-header fw-bold color" style="margin-top: 0;">
                    <?php echo $datosU['nombre']; ?>
                </div>

                <div class="card-body text-center color">
                    <div class="container d-flex flex-column justify-content-center align-iten-center w-100 p-1">
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Nombre y Apellido</label>
                            <input type="text" autocomplete="off" class="form-control" name="nombre_apellido_u" placeholder="<?php echo $datosU['nombre']; ?>">
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                            <input type="text" autocomplete="off" class="form-control" name="correo_u" placeholder="<?php echo $datosU['correo']; ?>">
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Contraseña</label>
                            <input type="password" autocomplete="off" class="form-control" name="password_u" placeholder="<?php echo $datosU['clave']; ?>">
                        </div>

                        <div class="container w-75 px-4 py-2">
                            <label for="inputState" class="form-label">Nivel de usuario</label>
                            <select id="inputState" class="form-select" name="nivel_u">
                                <option selected>Seleccionar</option>
                                <option>Nivel Máximo</option>
                                <option>Director de Institución</option>
                                <option>Coordinador de Pasantías Institucional</option>
                                <option>Director de División o Dependencia</option>
                            </select>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="inputState" class="form-label">Estado</label>
                            <select id="inputState" class="form-select" name="estado_u">
                                <option selected>Seleccionar</option>
                                <option>Activo</option>
                                <option>Inactivo</option>
                            </select>
                        </div>
                    </div> 
                </div>

                <div class="" style="margin-bottom:20px;">
                    <button class="btn btn-1 zoom boton-modelo font-family-oswald" type="submit" name="action">Guardar Cambios</button>
                    <a class="btn zoom boton-modelo font-family-oswald" href="usuarios.php" role="button">Volver</a>
                </div>
            <?php
            }
            ?> 
            </div>
        </form>
        
    <?php
    }
    else if ($x == 3){
        ?>

        <form action="editar.php?id=<?php echo $id; ?>&x=<?php echo $x; ?>" method="post">
            <div class="card position-absolute top-0 font-family-oswald" style="margin-left: 170px; box-shadow: 0 0 6px black; margin-top: 25px; width: 60%; background-color: #F6F3E0;">

            <?php

            $mostrarJ = "SELECT * FROM daep_jefe WHERE id='$id'"; 
            $consultaJ = mysqli_query($conn, $mostrarJ) or die($mysqli_error($conn));
        
            while ($datosJ = mysqli_fetch_array($consultaJ)) {

            ?>

                <div class="card-header fw-bold color">
                    <?php echo $datosJ['nombre'] . " " . $datosJ['apellido']; ?>
                </div>

                <div class="card-body" style="background-color: #F6F2E0;">
                    <div class="container d-flex flex-column justify-content-center align-iten-center w-100 p-1">
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Nombre</label>
                            <input type="text" autocomplete="off" class="form-control" name="nombre_j" placeholder="<?php echo $datosJ['nombre']; ?>">
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Apellido</label>
                            <input type="text" autocomplete="off" class="form-control" name="apellido_j" placeholder="<?php echo $datosJ['apellido']; ?>">
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Cédula</label>
                            <input type="text" autocomplete="off" class="form-control" name="cedula_j" placeholder="<?php echo $datosJ['cedula']; ?>">
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                            <input type="text" autocomplete="off" class="form-control" name="correo_j" placeholder="<?php echo $datosJ['correo']; ?>">
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Teléfono</label>
                            <input type="text" autocomplete="off" class="form-control" name="telefono_j" placeholder="<?php echo $datosJ['telefono']; ?>">
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="inputState" class="form-label">Estado</label>
                            <select id="inputState" class="form-select" name="estado_j">
                                <option selected>Seleccionar</option>
                                <option>Activo</option>
                                <option>Inactivo</option>
                            </select>
                        </div>
                    </div> 
    
                    <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                        <button class="btn btn-1 zoom boton-modelo" type="submit" name="action">Guardar Cambios</button>
                        <a class="btn zoom boton-modelo" href="jefes.php" role="button">Volver</a>
                    </div> 
                </div>
            <?php
            }
            ?> 
            </div>
        </form>

        <?php
    }
    else if ($x == 4){
        //Fecha actual:
        $F_actual = date('Y-m-d');
        $id_cedula= $_GET['id_cedula'];

        //Buscar la fecha de nacimiento para validar los datos a ingresar:
        $mostrar = "SELECT * FROM daep_alumno WHERE cedula_id='$id_cedula'"; 
        $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));
    
        while ($datos = mysqli_fetch_array($consulta)) {
            $fecha_nacimiento = $datos['fecha_nacimiento'];
        }
        
        //Sacar el año de la fecha actual:
        $xAno = substr($F_actual, 0, 4);
        $xMes = substr($F_actual, 5, 2);
        $xDia = substr($F_actual, 8, 2);

        //Sacar el año de la fecha de nacimiento:
        $yAno = substr($fecha_nacimiento, 0, 4);
        $yMes = substr($fecha_nacimiento, 5, 2);
        $yDia = substr($fecha_nacimiento, 8, 2);

        //Cálculo de edad para realizar la validación:
        $edad = $xAno - $yAno;

        if ($edad >= 18){
            //Mostrar opciones para mayores de edad:

            
            ?>
            
            <form action="editar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" method="post">
                <div class="card position-absolute top-0" style="width:85%;">
                
                    <?php

                    $mostrar = "SELECT * FROM daep_alumno WHERE cedula_id='$id'"; 
                    $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));
    
                    while ($datos = mysqli_fetch_array($consulta)) {

                    ?>

                    <div class="card-header fw-bold color font-family-oswald">
                        Editar datos de <?php echo $datos['nombre_apellido']; ?>
                    </div>

                    <div class="card-body color font-family-oswald">
                        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Cédula</label>
                                <input type="text" autocomplete="off" class="form-control" name="cedula_e" placeholder="<?php echo $datos['cedula_id']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Nombre y Apellido</label>
                                <input type="text" autocomplete="off" class="form-control" name="nombre_e" placeholder="<?php echo $datos['nombre_apellido']; ?>">
                            </div>
                       
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Institución</label>
                                <select id="inputState" class="form-select" name="institucion_e">
                                    <option selected>Seleccionar</option>
                                    <option><?php echo $datos['nombre']; ?></option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Rif</label>
                                <input type="text" autocomplete="off" class="form-control" name="rif_e" placeholder="<?php echo $datos['rif']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" autocomplete="off" class="form-control" name="nacimiento_e" placeholder="<?php echo $datos['fecha_nacimiento']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Especialidad</label>
                                <input type="text" autocomplete="off" class="form-control" name="especialidad_e" placeholder="<?php echo $datos['especialidad']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Parroquia</label>
                                <input type="text" autocomplete="off" class="form-control" name="parroquia_e" placeholder="<?php echo $datos['parroquia']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Dirección</label>
                                <input type="text" autocomplete="off" class="form-control" name="direccion_e" placeholder="<?php echo $datos['direccion']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                                <input type="text" autocomplete="off" class="form-control" name="correo_e" placeholder="<?php echo $datos['correo']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Teléfono</label>
                                <input type="text" autocomplete="off" class="form-control" name="telefono_e" placeholder="<?php echo $datos['telefono']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Cuenta Bancaria</label>
                                <input type="text" autocomplete="off" class="form-control" name="cuenta_e" placeholder="<?php echo $datos['cuenta_bancaria']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Tipo de Cuenta</label>
                                <select id="inputState" class="form-select" name="tipocuenta_e">
                                    <option selected>Seleccionar</option>
                                    <option>Ahorro</option>
                                    <option>Corriente</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">Entidad Financiera</label>
                                <input type="text" autocomplete="off" class="form-control" name="banco_e" placeholder="<?php echo $datos['entidad_financiera']; ?>">
                            </div>
                        </div> 
        
                        <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                            <button class="btn btn-1 zoom boton-modelo font-family-oswald" type="submit" name="action">Guardar Cambios</button>
                            <a class="btn zoom boton-modelo " href="estudiantes.php" role="button">Volver</a>
                        </div> 
                    </div>

                    <?php
                    }
                    ?>
                </div>
            </form>

            <?php
        }
        else {
            $x = 5;
            //Mostrar opciones para menores de edad:
            ?>

            <form action="editar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" method="post">
                <div class="card position-absolute top-0" style="box-shadow: 0 0 4px black; width:90%; margin-top: 25px; margin-left:45px;">
                
                    <?php

                    $mostrar = "SELECT * FROM daep_alumno WHERE cedula_id='$id'"; 
                    $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));
    
                    while ($datos = mysqli_fetch_array($consulta)) {
                    $id_escuela=$datos['id_escuela'];
                    ?>
                

                    <div class="card-header fw-bold color font-family-oswald">
                        Editar datos de <?php echo $datos['nombre_apellido']; ?>
                    </div>

                    <div class="card-body color font-family-oswald">
                        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                            <div class="col-md-4 px-2">
                                <label for="formGroupExampleInput" class="form-label">Cédula</label>
                                <input type="text" autocomplete="off" class="form-control" name="cedula_e" placeholder="<?php echo $datos['cedula_id']; ?>">
                            </div>
                            <div class="col-md-4 px-2">
                                <label for="formGroupExampleInput" class="form-label">Nombre y Apellido</label>
                                <input type="text" autocomplete="off" class="form-control" name="nombre_e" placeholder="<?php echo $datos['nombre_apellido']; ?>">
                            </div>
                       
                            <div class="col-md-4 px-2">
                                <label for="inputState" class="form-label">Institución</label>
                                <select id="inputState" class="form-select" name="institucion_e">
                                    <option selected>Seleccionar</option>
                                    <option><?php echo $datos['nombre']; ?></option>
                                </select>
                            </div>

                            <div class="col-md-4 px-2 pt-4">
                                <label for="formGroupExampleInput" class="form-label">Rif</label>
                                <input type="text" autocomplete="off" class="form-control" name="rif_e" placeholder="<?php echo $datos['rif']; ?>">
                            </div>
                            <div class="col-md-4 px-2 pt-4">
                                <label for="formGroupExampleInput" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" autocomplete="off" class="form-control" name="nacimiento_e" placeholder="<?php echo $datos['fecha_nacimiento']; ?>">
                            </div>
                            <div class="col-md-4 px-2 pt-4">
                                <label for="formGroupExampleInput" class="form-label">Especialidad</label>
                                <input type="text" autocomplete="off" class="form-control" name="especialidad_e" placeholder="<?php echo $datos['especialidad']; ?>">
                            </div>
                            <div class="col-md-4 px-2 pt-4">
                                <label for="formGroupExampleInput" class="form-label">Parroquia</label>
                                <input type="text" autocomplete="off" class="form-control" name="parroquia_e" placeholder="<?php echo $datos['parroquia']; ?>">
                            </div>
                            <div class="col-md-4 px-2 pt-4">
                                <label for="formGroupExampleInput" class="form-label">Dirección</label>
                                <input type="text" autocomplete="off" class="form-control" name="direccion_e" placeholder="<?php echo $datos['direccion']; ?>">
                            </div>
                            <div class="col-md-4 px-2 pt-4">
                                <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                                <input type="text" autocomplete="off" class="form-control" name="correo_e" placeholder="<?php echo $datos['correo']; ?>">
                            </div>
                            <div class="col-md-4 px-2 pt-4">
                                <label for="formGroupExampleInput" class="form-label">Teléfono</label>
                                <input type="text" autocomplete="off" class="form-control" name="telefono_e" placeholder="<?php echo $datos['telefono']; ?>">
                            </div>
                            <div class="col-md-4 px-2 pt-4">
                                <label for="formGroupExampleInput" class="form-label">Representante</label>
                                <input type="text" autocomplete="off" class="form-control" name="representante_e" placeholder="<?php echo $datos['representante']; ?>">
                            </div>
                            <div class="col-md-4 px-2 pt-4">
                                <label for="formGroupExampleInput" class="form-label">Teléfono Representante</label>
                                <input type="text" autocomplete="off" class="form-control" name="trepresentante_e" placeholder="<?php echo $datos['telefono_representante']; ?>">
                            </div>
                            <div class="col-md-4 px-2 pt-4">
                                <label for="formGroupExampleInput" class="form-label">Cuenta Bancaria</label>
                                <input type="text" autocomplete="off" class="form-control" name="cuenta_e" placeholder="<?php echo $datos['cuenta_bancaria']; ?>">
                            </div>
                            <div class="col-md-4 px-2 pt-4">
                                <label for="inputState" class="form-label">Tipo de Cuenta</label>
                                <select id="inputState" class="form-select" name="tipocuenta_e">
                                    <option selected>Seleccionar</option>
                                    <option>Ahorro</option>
                                    <option>Corriente</option>
                                </select>
                            </div>
                            <div class="col-md-4 px-2 pt-4">
                                <label for="formGroupExampleInput" class="form-label">Entidad Financiera</label>
                                <input type="text" autocomplete="off" class="form-control" name="banco_e" placeholder="<?php echo $datos['entidad_financiera']; ?>">
                            </div>
                        </div> 
        
                        <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                            <button class="btn btn-1 zoom boton-modelo" type="submit" name="action">Guardar Cambios</button>
                            <a class="btn zoom boton-modelo" href="estudiantes.php?id=<?php echo $id_escuela; ?>" role="button">Volver</a>
                        </div> 
                    </div>

                    <?php
                    }
                    ?>
                </div>
            </form>

            <?php
        }
    }
    else if ($x == 5){
        $x = 6;

        ?>
        
        <form action="editar.php?id=<?php echo $id; ?>&x=<?php echo $x; ?>" method="post">
            <div class="card position-absolute top-0 color font-family-oswald" style="margin-top: 15px; width: 65%; box-shadow: 0 0 5px black; margin-top: 40px; font-family: Oswald; background-color: #F6F2E0; width:60%; margin-left: 160px;">

            <?php

            $mostrar = "SELECT * FROM daep_departamento WHERE id='$id'"; 
            $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));
        
            while ($datos = mysqli_fetch_array($consulta)) {

            ?>

                <div class="card-header fw-bold" >
                    Departamento de <?php echo $datos['nombre']; ?>
                </div>

                <div class="card-body">
                    <div class="container d-flex flex-column justify-content-center align-iten-center w-100 p-1">
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Nombre del Departamento</label>
                            <input type="text" autocomplete="off" class="form-control" name="nombre_d" placeholder="<?php echo $datos['nombre']; ?>"> 
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Encargado</label>
                            <input type="text" autocomplete="off" class="form-control" name="encargado_d" placeholder="<?php echo $datos['encargado']; ?>">
                        </div>
                    </div> 

                    <div class="container w-75 px-4 py-2" style="padding-top: 15px;">
                    <label for="formGroupExampleInput" class="form-label">Áreas del Departamento</label>
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingTextarea" name="areas_d"></textarea>
                            <label for="formGroupExampleInput" autocomplete="off" class="form-label">Áreas que se manejan en el departamento</label>
                        </div>
                    </div>
        
                    <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                        <button class="btn btn-1 zoom boton-modelo" type="submit" name="action">Guardar Cambios</button>
                        <a class="btn zoom boton-modelo" href="departamentos.php" role="button">Volver</a>
                    </div> 
                </div>
            <?php
            }
            ?> 
            </div>
        </form>
    <?php
    }

    else if ($x == 6){

        ?>
        <!--Editar datos del perfil-->
        <form>
            <div class="card position-absolute top-0 border-gray" style="box-shadow: 0 0 8px black; margin-top: 40px; margin-left: 170px; width:60%;">
            <?php

            $mostrar = "SELECT * FROM daep_usuarios WHERE id='$id'"; 
            $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));

            while ($datos = mysqli_fetch_array($consulta)) {

            ?>
            
                <div class="card-header fw-bold color font-family-oswald">
                    Editar datos
                </div>

                <div class="card-body color font-family-oswald">
                    <div class="container d-flex flex-column justify-content-center align-iten-center w-100 p-1">
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Nombre y Apellido</label>
                            <input type="text" autocomplete="off" class="form-control" name="nombre_d" placeholder="<?php echo $datos['nombre']; ?>"> 
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                            <input type="text" autocomplete="off" class="form-control" name="encargado_d" placeholder="<?php echo $datos['correo']; ?>">
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Contraseña</label>
                            <input type="password" autocomplete="off" class="form-control" name="nombre_d" placeholder="<?php echo $datos['clave']; ?>"> 
                        </div>
                    </div> 

                    <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                        <button class="btn btn-1 boton-modelo zoom" type="submit" name="action">Guardar Cambios</button>
                        <a class="btn boton-modelo zoom" href="departamentos.php" role="button">Volver</a>
                    </div> 
                </div>
            <?php
            }
            ?> 
            </div>
        </form>
    <?php
        }
    
    ?>

    </main>
</body>
</html>