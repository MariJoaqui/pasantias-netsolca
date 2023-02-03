<?php
include_once("connections/connec.php");
//Variable para validar el ingreso de datos:
//Instituciones (engloba a todo lo que esta dentro de ella tanbién) = 1
//Director = 2
//Coordinador = 3
//Usuarios = 4
//Jefes = 5
//Estudiantes = 6
//Departamentos = 9
$x = $_GET['x'];

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
    <link href="css/signin.css" rel="stylesheet">
    <style>@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Libre+Baskerville:ital@1&family=Ms+Madi&family=Oswald&family=Source+Sans+Pro&family=Source+Serif+Pro&family=Stint+Ultra+Condensed&display=swap');</style>
    <link rel="stylesheet" href="css/main.css">
    <link href="css/animaciones.css" rel="stylesheet">
    
</head>

<style>
	@media only screen and (max-width: 995px){
		.btn-agregar-margin {
			margin-right: 0;
		}
		.card-margin {
			margin-left: 1rem !important;
		}
	}
</style>

<body class="text-center">

    <main>

    <?php

    if ($x == 1){

        ?>

        <form action="agregar.php?x=<?php echo $x; ?>" method="post">
        
            <div class="card position-absolute top-0 card-margin" style="width:90%; margin-top: 15px; margin-left: 40px; box-shadow: 0 0 6px black;">
                <div class="card-header fw-bold" style="background-color: #F6F2E0; font-family: Oswald;">
                    Institución
                </div>

                <div class="card-body" style="background-color: #F6F2E0; font-family: Oswald">
                    <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3">
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Nombre de la Institución</label>
                            <input type="text" class="form-control" name="nombre_i" required>
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Dirección</label>
                            <input type="text" class="form-control" name="direccion_i" required>
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Parroquia</label>
                            <input type="text" class="form-control" name="parroquia_i" required>
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                            <input type="text" class="form-control" name="telefono_i">
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="correo_i">
                        </div> 
                    </div> 
                </div>

                <div class="card-header fw-bold" style="background-color: #F6F2E0; font-family: Oswald;">
                    Dirección de la Institución
                </div>

                <div class="card-body" style="background-color:#F6F2E0; font-family: Oswald">
                    <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3">
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Nombre del Director</label>
                            <input type="text" class="form-control" name="nombre_d">
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Apellido del Director</label>
                            <input type="text" class="form-control" name="apellido_d">
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Cédula de Identidad</label>
                            <input type="text" class="form-control" name="cedula_d">
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                            <input type="text" class="form-control" name="telefono_d">
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="correo_d">
                        </div> 
                    </div> 
                </div>

                <div class="card-header fw-bold" style="background-color: #F6F2E0; font-family: Oswald;">
                    Coordinación de la Institución
                </div>

                <div class="card-body" style="background-color: #F6F2E0; font-family: Oswald">
                    <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3">
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Nombre del Coordinador</label>
                            <input type="text" class="form-control" name="nombre_c">
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Apellido del Coordinador</label>
                            <input type="text" class="form-control" name="apellido_c">
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Cédula de Identidad</label>
                            <input type="text" class="form-control" name="cedula_c">
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                            <input type="text" class="form-control" name="telefono_c">
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="correo_c">
                        </div> 
                    </div> 
                
                    <div class="d-grid gap-2 d-md-block" style="padding-top:20px; font-family:Oswald">
                        <button class="btn btn-1 zoom boton-modelo font-family-oswald btn-agregar-margin" type="submit" name="action">Agregar</button>
                        <a class="btn zoom boton-modelo font-family-oswald" href="instituciones.php" role="button">Volver</a>
                    </div> 
                </div>
            </div>
        </form>

        <?php
    }
    else if ($x == 2){
        //Id de la institución:
        $id = $_GET['id'];

        ?>

        <form action="agregar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" method="post">
            <div class="card position-absolute top-0" style="box-shadow: 0 0 6px black; width:60%; margin-top:25px; margin-left: 170px;">
                <div class="card-header fw-bold" style="background-color: #F6F2E0; font-family: Oswald;">
                    Dirección de la Institución
                </div>

                <div class="card-body" style="background-color: #F6F2E0; font-family: Oswald;">
                    <div class="container d-flex flex-column justify-content-center align-iten-center w-100 p-1">
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Nombre del Director</label>
                            <input type="text" class="form-control" name="nombre_d" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Apellido del Director</label>
                            <input type="text" class="form-control" name="apellido_d" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Cédula de Identidad</label>
                            <input type="text" class="form-control" name="cedula_d" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                            <input type="text" class="form-control" name="telefono_d" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="correo_d" required>
                        </div> 

                        <div class="d-grid gap-2 d-md-block" style="width: 100%;">
                            <button class="btn btn-1 boton-modelo zoom" type="submit" name="action">Agregar</button>
                            <a class="btn boton-modelo zoom" href="detalles.php?id=<?php echo $id; ?>" role="button">Volver</a>
                        </div>
                    </div> 
                </div>
            </div>
        </form>

        <?php
    }
    else if ($x == 3){
        //Id de la institución:
        $id = $_GET['id'];
        
        ?>

        <form action="agregar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" method="post">
            <div class="card position-absolute top-0 border-gray" style="box-shadow: 0 0 6px black; width:60%; margin-top:25px; margin-left: 170px;">
                
                <div class="card-header fw-bold" style="background-color:#F6F2E0; font-family: Oswald;">
                    Coordinación de la Institución
                </div>

                <div class="card-body" style="background-color: #F6F2E0; font-family: Oswald; ">
                    <div class="container d-flex flex-column justify-content-center align-iten-center w-100 p-1">
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Nombre del Coordinador</label>
                            <input type="text" class="form-control" name="nombre_c" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Apellido del Coordinador</label>
                            <input type="text" class="form-control" name="apellido_c" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Cédula de Identidad</label>
                            <input type="text" class="form-control" name="cedula_c" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Número de Teléfono</label>
                            <input type="text" class="form-control" name="telefono_c" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="correo_c" required>
                        </div> 
                    </div> 
        
                    <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                        <button class="btn btn-1 border-gray zoom" style="box-shadow: 0 0 5px black; border-radius: 10px; background-color:#286E86; color:#ffffff;" type="submit" name="action">Agregar</button>
                        <a class="btn border-gray zoom" style="box-shadow: 0 0 5px black; border-radius: 10px; background-color:#286E86; color:#ffffff;" href="detalles.php?id=<?php echo $id; ?>" role="button">Volver</a>
                    </div> 
                </div>
            </div>
        </form>

        <?php
    }
    else if ($x == 4){
        ?>

        <form action="agregar.php?x=<?php echo $x; ?>" method="post">
            <div class="card position-absolute top-0 border-gray" style="box-shadow: 0 0 5px black; margin-top: 25px; font-family: Oswald; background-color: #F6F2E0; width:60%; margin-left: 160px;">
                
                <div class="card-header fw-bold">
                    Nuevo Usuario
                </div>

                <div class="card-body" style="background-color: #F6F2E0;">
                    <div class="container d-flex flex-column justify-content-center align-iten-center w-100 p-1">
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Nombre y Apellido</label>
                            <input type="text" autocomplete="off" class="form-control" name="nombre_apellido_u" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                            <input type="text" autocomplete="off" class="form-control" name="correo_u" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Contraseña</label>
                            <input type="password" autocomplete="off" class="form-control" name="password_u" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="inputState" class="form-label">Nivel de usuario</label>
                            <select id="inputState" class="form-select" name="nivel_u" required>
                                <option selected>Seleccionar</option>
                                <option>Nivel Máximo</option>
                                <option>Director de Institución</option>
                                <option>Coordinador de Pasantías Institucional</option>
                                <option>Director de División o Dependencia</option>
                            </select>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="inputState" class="form-label">Estado</label>
                            <select id="inputState" class="form-select" name="estado_u" required>
                                <option selected>Seleccionar</option>
                                <option>Activo</option>
                                <option>Inactivo</option>
                            </select>
                        </div>
                    </div> 
        
                    <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                        <button class="btn btn-1 zoom boton-modelo" type="submit" name="action">Agregar</button>
                        <a class="btn zoom boton-modelo" href="usuarios.php" role="button">Volver</a>
                    </div> 
                </div>
            </div>
        </form>

        <?php
    }
    else if ($x == 5){
        ?>

        <form action="agregar.php?x=<?php echo $x; ?>" method="post">
            <div class="card position-absolute top-0 border-gray" style="box-shadow: 0 0 5px black; margin-top: 25px; font-family: Oswald; background-color: #F6F2E0; width:60%; margin-left: 160px;">
                
                <div class="card-header fw-bold font-family-oswald" style="background-color: #F6F2E0;">
                    Nuevo Jefe
                </div>

                <div class="card-body" style="background-color:#F6F2E0">
                    <div class="container d-flex flex-column justify-content-center align-iten-center w-100 p-1">
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Nombre</label>
                            <input type="text" autocomplete="off" class="form-control" name="nombre_j" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Apellido</label>
                            <input type="text" autocomplete="off" class="form-control" name="apellido_j" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Cédula</label>
                            <input type="text" autocomplete="off" class="form-control" name="cedula_j" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                            <input type="text" autocomplete="off" class="form-control" name="correo_j" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Teléfono</label>
                            <input type="text" autocomplete="off" class="form-control" name="telefono_j" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="inputState" class="form-label">Estado</label>
                            <select id="inputState" class="form-select" name="estado_j" required>
                                <option selected>Seleccionar</option>
                                <option>Activo</option>
                                <option>Inactivo</option>
                            </select>
                        </div>
                    </div> 
        
                    <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                        <button class="btn btn-1 zoom boton-modelo" type="submit" name="action">Agregar</button>
                        <a class="btn zoom boton-modelo" href="jefes.php" role="button">Volver</a>
                    </div> 
                </div>
            </div>
        </form>

        <?php
    }
    else if ($x == 6){
        $x = 7; 

        //Id institución
        $id = $_GET['id'];
        ?>

        <form action="validacion.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" method="post">
            <div class="card position-absolute top-0 border-gray" style="box-shadow: 0 0 5px black; margin-top: 25px; width:60%; margin-left: 160px;">
                
                <div class="card-header fw-bold color font-family-oswald">
                    Nuevo Estudiante
                </div>

                <div class="card-body d-flex justify-content-center aling-items-center color font-family-oswald">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">Cédula</label>
                                <input type="text" autocomplete="off" class="form-control" name="cedula_e" required> <!-- Id estudiante -->
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">Nombre y Apellido</label>
                                <input type="text" autocomplete="off" class="form-control" name="nombre_e" required>
                            </div>
                       
                            <?php
                            /*              
                            $mostrar = "SELECT * FROM daep_escuela where id='$id'"; 
                            $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));

                            while ($datos = mysqli_fetch_array($consulta)) {

                            ?>

                        
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Institución</label>
                                <select id="inputState" class="form-select" name="institucion_e" required>
                                    <option selected>Seleccionar</option>
                                    <option><?php echo $datos['nombre']; ?></option>
                                </select>
                            </div>

                            <?php
                            }*/
                            ?>

                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">Rif</label>
                                <input type="text" autocomplete="off" class="form-control" name="rif_e">
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" autocomplete="off" class="form-control" name="nacimiento_e" required>
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">Especialidad</label>
                                <input type="text" autocomplete="off" class="form-control" name="especialidad_e" required>
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">Parroquia</label>
                                <input type="text" autocomplete="off" class="form-control" name="parroquia_e" required>
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">Dirección</label>
                                <input type="text" autocomplete="off" class="form-control" name="direccion_e" required>
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">Correo electrónico</label>
                                <input type="email" autocomplete="off" class="form-control" name="correo_e" required>
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">Teléfono</label>
                                <input type="text" autocomplete="off" class="form-control" name="telefono_e" required>
                            </div>
                        </div> 
        
                        <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                            <button class="btn btn-1 zoom boton-modelo" type="submit" name="action">Siguiente</button>
                            <a class="btn zoom boton-modelo" href="estudiantes.php?id=<?php echo $id; ?>" role="button">Volver</a>
                        </div>
                    </div> 
                </div>
            </div>
        </form>

        <?php
    }
    else if ($x == 7){
        $x = 6;

        //Datos estudiante:
        $nombre_e = $_GET['nombre_e'];
        $cedula_e = $_GET['cedula_e'];
        $rif_e = $_GET['rif_e'];
        $nacimiento_e = $_GET['nacimiento_e'];
        $especialidad_e = $_GET['especialidad_e'];
        $parroquia_e = $_GET['parroquia_e'];
        $direccion_e = $_GET['direccion_e'];
        $correo_e = $_GET['correo_e'];
        $telefono_e = $_GET['telefono_e'];
        $institucion_e = $_GET['institucion_e'];
        
        ?>

        <form action="agregar.php?x=<?php echo $x; ?>&cedula_e=<?php echo $cedula_e; ?>&nombre_e=<?php echo $nombre_e; ?>&rif_e=<?php echo $rif_e; ?>&nacimiento_e=<?php echo $nacimiento_e; ?>&especialidad_e=<?php echo $especialidad_e; ?>&parroquia_e=<?php echo $parroquia_e; ?>&direccion_e=<?php echo $direccion_e; ?>&correo_e=<?php echo $correo_e; ?>&telefono_e=<?php echo $telefono_e; ?>&institucion_e=<?php echo $institucion_e; ?>" method="post">
            <div class="card position-absolute top-0" style="box-shadow: 0 0 5px black; margin-top: 25px; width:60%; margin-left: 160px;">
                
                <div class="card-header fw-bold color font-family-oswald">
                    Datos adicionales
                </div>

                <div class="card-body color font-family-oswald">
                    <div class="container d-flex flex-column justify-content-center align-iten-center w-100 p-1">
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Cuenta Bancaria</label>
                            <input type="text" autocomplete="off" class="form-control" name="cuenta_e">
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="inputState" class="form-label">Tipo de Cuenta</label>
                            <select id="inputState" class="form-select" name="tipocuenta_e">
                                <option selected>Seleccionar</option>
                                <option>Ahorro</option>
                                <option>Corriente</option>
                            </select>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Entidad Financiera</label>
                            <input type="text" autocomplete="off" class="form-control" name="banco_e">
                        </div>
                    </div> 
        
                    <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                        <button class="btn btn-1 zoom boton-modelo" type="submit" name="action">Agregar Estudiante</button>
                        <a class="btn zoom boton-modelo" href="IngDatos.php?x=<?php echo $x; ?>" role="button">Volver</a>
                    </div> 
                </div>
            </div>
        </form>

        <?php
    }
    else if ($x == 8){
        $x = 7;

        //Datos estudiante:
        $nombre_e = $_GET['nombre_e'];
        $cedula_e = $_GET['cedula_e'];
        $rif_e = $_GET['rif_e'];
        $nacimiento_e = $_GET['nacimiento_e'];
        $especialidad_e = $_GET['especialidad_e'];
        $parroquia_e = $_GET['parroquia_e'];
        $direccion_e = $_GET['direccion_e'];
        $correo_e = $_GET['correo_e'];
        $telefono_e = $_GET['telefono_e'];
        $institucion_e = $_GET['institucion_e'];

        ?>

        <form action="agregar.php?x=<?php echo $x; ?>&cedula_e=<?php echo $cedula_e; ?>&nombre_e=<?php echo $nombre_e; ?>&rif_e=<?php echo $rif_e; ?>&nacimiento_e=<?php echo $nacimiento_e; ?>&especialidad_e=<?php echo $especialidad_e; ?>&parroquia_e=<?php echo $parroquia_e; ?>&direccion_e=<?php echo $direccion_e; ?>&correo_e=<?php echo $correo_e; ?>&telefono_e=<?php echo $telefono_e; ?>&institucion_e=<?php echo $institucion_e; ?>" method="post">
            <div class="card position-absolute top-0" style="box-shadow: 0 0 5px black; margin-top: 25px; width:60%; margin-left: 160px;">
                
                <div class="card-header fw-bold color font-family-oswald">
                    Datos adicionales
                </div>

                <div class="card-body color font-family-oswald">
                    <div class="container d-flex flex-column justify-content-center align-iten-center w-100 p-1">
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Representante</label>
                            <input type="text" autocomplete="off" class="form-control" name="representante_e" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Teléfono Representante</label>
                            <input type="text" autocomplete="off" class="form-control" name="trepresentante_e" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Cuenta Bancaria</label>
                            <input type="text" autocomplete="off" class="form-control" name="cuenta_e" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="inputState" class="form-label">Tipo de Cuenta</label>
                            <select id="inputState" class="form-select" name="tipocuenta_e" required>
                                <option selected>Seleccionar</option>
                                <option>Ahorro</option>
                                <option>Corriente</option>
                            </select>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Entidad Financiera</label>
                            <input type="text" autocomplete="off" class="form-control" name="banco_e" required>
                        </div>
                    </div> 

                    <?php

                    $x = 7;
                    
                    ?>
        
                    <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                        <button class="btn btn-1 zoom boton-modelo" type="submit" name="action">Agregar Estudiante</button>
                        <a class="btn btn-1 zoom boton-modelo" href="IngDatos.php?x=<?php echo $x; ?>" role="button">Volver</a>
                    </div> 
                </div>
            </div>
        </form>

        <?php
    }
    else if ($x == 9){
        $x = 8;
        ?>

        <form action="agregar.php?x=<?php echo $x; ?>" method="post">
            <div class="card position-absolute top-0" style="box-shadow: 0 0 5px black; margin-top: 40px; font-family: Oswald; background-color: #F6F2E0; width:60%; margin-left: 160px;">
                
                <div class="card-header fw-bold" style="background-color: #F6F2E0;">
                    Nuevo Departamento
                </div>

                <div class="card-body" style="background-color: #F6F2E0;">
                    <div class="container d-flex flex-column justify-content-center align-iten-center w-100 p-1">
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Nombre del Departamento</label>
                            <input type="text" autocomplete="off" class="form-control" name="nombre_d" required>
                        </div>
                        <div class="container w-75 px-4 py-2">
                            <label for="formGroupExampleInput" class="form-label">Encargado</label>
                            <input type="text" autocomplete="off" class="form-control" name="encargado_d" required>
                        </div>
                    </div>

		    <!--
                    <div class="container w-75 px-4 py-2" style="padding-top: 15px;">
                    <label for="formGroupExampleInput" class="form-label">Áreas del Departamento</label>
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingTextarea" name="areas_d"></textarea>
                            <label for="formGroupExampleInput" autocomplete="off" class="form-label">Áreas que se manejan en el departamento</label>
                        </div>
                    </div> 
                    -->
        
                    <div class="d-grid gap-2 d-md-block" style="padding-top:20px;">
                        <button class="btn btn-1 zoom boton-modelo" type="submit" name="action">Agregar</button>
                        <a class="btn zoom boton-modelo" href="departamentos.php" role="button">Volver</a>
                    </div> 
                </div>
            </div>
        </form>

        <?php
    }
    ?>
    
    </main>
</body>
</html>