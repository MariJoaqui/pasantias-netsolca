<?php

include_once("connections/connec.php");

//Variable para validar la eliminación:
//Instituciones (engloba a todo lo que esta dentro de ella también) = 1
//Director = 2
//Coordinador = 3
//Estudiantes = 4
$y = $_GET['y'];   //REVISAAAR

//Id del elemento a eliminar:
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

    <!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta name="theme-color" content="#7952b3">

    <!-- CDN jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Libre+Baskerville:ital@1&family=Ms+Madi&family=Oswald&family=Source+Sans+Pro&family=Source+Serif+Pro&family=Stint+Ultra+Condensed&display=swap');
    </style>
    <link href="css/animaciones.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

</head>

<style>
	@media only screen and (max-width: 650px){
		.tabla-1 {
			
		}
	}
</style>

<body class="text-center">

    <main>

        <?php

        if ($y == 1) {

        ?>

            <div class="container-lg position-absolute top-0 start-50 translate-middle-x font-family-oswald" style="text-align:center;  margin-top: 15px">
                <div class="col-12 col-4 font-family-oswald">
                    <h3>Instituciones</h3>
                </div>

                <!--CARTA EN GENERAL-->
                <table class="table table-bordered border-dark color tabla-1" style="width: 70%; margin:0px auto; box-shadow: 0 0 5px black; margin-top:20px;">
                    <thead style="background-color:#ffffff;">
                        <tr>
                            <!--TITULO DE LA CARTA-->
                            <th class="text-center color" colspan="3" style="width: 100%;">Datos de la Institución</h4>
                            </th>
                        </tr>
                    </thead>

                    <?php

                    $mostrarN = "SELECT * FROM daep_escuela WHERE id='$id'";
                    $consultaN = mysqli_query($conn, $mostrarN) or die($mysqli_error($conn));

                    while ($datosN = mysqli_fetch_array($consultaN)) {
                        $id_director = $datosN['id_director'];
                        $id_coordinador = $datosN['id_coordinador'];
                    ?>

                        <tbody>
                            <tr>
                                <!-- Nombre de la Institución -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Nombre de la Institución
                                </td>

                                <td class="text-start"><?php echo $datosN['nombre']; ?></td>
                            </tr>

                            <tr>
                                <!-- Director de la Institución -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Director
                                </td>

                                <td class="text-start">

                                    <?php

                                    $x = 2;
                                    $y = 2;

                                    if ($id_director == 0) {
                                        echo 'No asignado';

                                    ?>
                                        <!--BOTON PARA AGREGAR AL DIRECTO-->
                                        <div class="btn-group btn-group-sm float-end" role="group" aria-label="...">
                                            <a class="btn zoom font-family-oswald" style="box-shadow: 0 0 6px #095370; border-radius: 20px;" href="IngDatos.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" role="button">Agregar Director</a>
                                        </div>

                                    <?php
                                    } else {
                                        //Obtener el nombre  del director de la Institución:
                                        $mostrarD = "SELECT * FROM daep_director WHERE id='$id_director'";
                                        $consultaD = mysqli_query($conn, $mostrarD) or die($mysqli_error($conn));

                                        while ($datosD = mysqli_fetch_array($consultaD)) {
                                            echo $datosD['nombre'] . " " . $datosD['apellido'];

                                            $d = $datosD['id'];
                                        }

                                    ?>
                                        <!--BOTONES DEL DIRECTOR-->
                                        <div class="btn-group-sm float-end" role="group" aria-label="...">
                                            <a class="btn zoom font-family-oswald" style="box-shadow: 0 0 8px #095370; border-radius: 20px; margin-right: 6px" href="detalles.php?id=<?php echo $id; ?>&y=<?php echo $y ?>&id_director=<?php echo $id_director; ?>" role="button">Información</a>
                                            <button class="btn zoom font-family-oswald" style="box-shadow: 0 0 8px red; border-radius: 20px;" type="submit" onclick="eliminar1()">Eliminar</button>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                </td>
                            </tr>

                            <script type="text/javascript">
                                function eliminar1() {
                                    const swalWithBootstrapButtons = Swal.mixin({
                                        customClass: {
                                            confirmButton: 'btn btn-success',
                                            cancelButton: 'btn btn-danger'
                                        },
                                        buttonsStyling: false
                                    })

                                    swalWithBootstrapButtons.fire({
                                        title: '¿Seguro que desea eliminar?',
                                        text: 'Los datos eliminados no se podrán recuperar',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Si, eliminar',
                                        cancelButtonText: 'No, cancelar',
                                        reverseButtons: true
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            swalWithBootstrapButtons.fire(
                                                '¡Eliminado!',
                                                'Se ha eliminado la institución correctamente.',
                                                'success'
                                            ).then((si) => {
                                                if (si) {
                                                    location.href = 'eliminar.php?id_d=<?php echo $d; ?>&x=<?php echo $x; ?>&id=<?php echo $id; ?>';
                                                }
                                            })
                                        } else if (
                                            /* Read more about handling dismissals below */
                                            result.dismiss === Swal.DismissReason.cancel
                                        ) {
                                            swalWithBootstrapButtons.fire(
                                                '¡Cancelado!',
                                                'Se ha cancelado la operación.',
                                                'error'
                                            )
                                        }
                                    });
                                }
                            </script>

                            <tr>
                                <!-- Coordinador de la Institución -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Coordinador
                                </td>

                                <td class="text-start">

                                    <?php

                                    $x = 3;
                                    $y = 3;

                                    if ($id_coordinador == 0) {
                                        echo 'No asignado';

                                    ?>

                                        <div class="btn-group btn-group-sm float-end" role="group" aria-label="...">
                                            <a class="btn zoom" style="box-shadow: 0 0 6px #095370; border-radius: 20px;" href="IngDatos.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" role="button">Agregar Coordinador</a>
                                        </div>

                                    <?php
                                    } else {
                                        //Obtener el nombre del coordinador de la Institución:
                                        $mostrarC = "SELECT * FROM daep_coordinador WHERE id='$id_coordinador'";
                                        $consultaC = mysqli_query($conn, $mostrarC) or die($mysqli_error($conn));

                                        while ($datosC = mysqli_fetch_array($consultaC)) {
                                            echo $datosC['nombre'] . " " . $datosC['apellido'];

                                            $c = $datosC['id'];
                                        }

                                    ?>
                                        <!--BOTONES DEL COORDINADOR-->
                                        <div class="btn-group-sm float-end" role="group" aria-label="...">
                                            <a class="btn zoom font-family-oswald" style="box-shadow: 0 0 6px #095370; border-radius: 20px; margin-right: 6px" href="detalles.php?id=<?php echo $id; ?>&y=<?php echo $y ?>&id_coordinador=<?php echo $id_coordinador; ?>" role="button">Información</a>
                                            <button class="btn zoom font-family-oswald" style="box-shadow: 0 0 8px red; border-radius: 20px;" type="submit" onclick="eliminar2()">Eliminar</button>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                </td>
                            </tr>

                            <script type="text/javascript">
                                function eliminar2() {
                                    const swalWithBootstrapButtons = Swal.mixin({
                                        customClass: {
                                            confirmButton: 'btn btn-success',
                                            cancelButton: 'btn btn-danger'
                                        },
                                        buttonsStyling: false
                                    })

                                    swalWithBootstrapButtons.fire({
                                        title: '¿Seguro que desea eliminar?',
                                        text: 'Los datos eliminados no se podrán recuperar',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Si, eliminar',
                                        cancelButtonText: 'No, cancelar',
                                        reverseButtons: true
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            swalWithBootstrapButtons.fire(
                                                '¡Eliminado!',
                                                'Se ha eliminado la institución correctamente.',
                                                'success'
                                            ).then((si) => {
                                                if (si) {
                                                    location.href = 'eliminar.php?id_c=<?php echo $c; ?>&x=<?php echo $x; ?>&id=<?php echo $id; ?>';
                                                }
                                            })
                                        } else if (
                                            /* Read more about handling dismissals below */
                                            result.dismiss === Swal.DismissReason.cancel
                                        ) {
                                            swalWithBootstrapButtons.fire(
                                                '¡Cancelado!',
                                                'Se ha cancelado la operación.',
                                                'error'
                                            )
                                        }
                                    });
                                }
                            </script>

                            <tr>
                                <!-- Parroquia -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Parroquia
                                </td>

                                <td class="text-start"><?php echo $datosN['parroquia']; ?></td>
                            </tr>

                            <tr>
                                <!-- Dirección -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Dirección
                                </td>

                                <td class="text-start"><?php echo $datosN['direccion']; ?></td>
                            </tr>

                            <tr>
                                <!-- Teléfono -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Teléfono
                                </td>

                                <td class="text-start"><?php echo $datosN['telefono']; ?></td>
                            </tr>

                            <tr>
                                <!-- Correo -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Correo
                                </td>

                                <td class="text-start"><?php echo $datosN['correo']; ?></td>
                            </tr>
                        </tbody>

                    <?php

                    }

                    mysqli_close($conn);

                    ?>

                </table>

                <?php
                $x = 1;
                ?>

                <!--BOTONES FINALES-->
                <div style="padding-top: 20px;">
                    <a class="btn btn-1 zoom boton-modelo font-family-oswald" href="datos-editar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" role="button">Editar Institución</a>
                    <a class="btn btn-1 zoom boton-modelo font-family-oswald" href="instituciones.php" role="button">Volver</a>
                    <a class="btn zoom boton-eliminar font-family-oswald" type="submit" onclick="eliminar3()" role="button">Eliminar</a>
                </div>

                <script type="text/javascript">
                    function eliminar3() {
                        const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                                confirmButton: 'btn btn-success',
                                cancelButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                        })

                        swalWithBootstrapButtons.fire({
                            title: '¿Seguro que desea eliminar?',
                            text: 'Los datos eliminados no se podrán recuperar',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Si, eliminar',
                            cancelButtonText: 'No, cancelar',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                swalWithBootstrapButtons.fire(
                                    '¡Eliminado!',
                                    'Se ha eliminado la institución correctamente.',
                                    'success'
                                ).then((si) => {
                                    if (si) {
                                        location.href = 'eliminar.php?id=<?php echo $id; ?>&x=<?php echo $x; ?>';
                                    }
                                })
                            } else if (
                                /* Read more about handling dismissals below */
                                result.dismiss === Swal.DismissReason.cancel
                            ) {
                                swalWithBootstrapButtons.fire(
                                    '¡Cancelado!',
                                    'Se ha cancelado la operación.',
                                    'error'
                                )
                            }
                        });
                    }
                </script>


            </div>
        <?php
        } else if ($y == 2) {
            $id_director = $_GET['id_director'];
        ?>

            <div class="container-lg position-absolute top-0 start-50 translate-middle-x font-family-oswald" style="margin-top: 15px; text-align:center;">
                <div class="col-12 col-4">
                    <h3>Director</h3>
                </div>

                <table class="table table-bordered border-dark color" style="width: 52%; margin:0px auto; box-shadow: 0 0 6px black; margin-top: 20px;">
                    <thead style="background-color:#fff;">
                        <tr>
                            <th class="text-center color" colspan="3" style="width: 100%; ">Datos del Director</h4>
                            </th>
                        </tr>
                    </thead>

                    <?php

                    $mostrarD = "SELECT * FROM daep_director WHERE id='$id_director'";
                    $consultaD = mysqli_query($conn, $mostrarD) or die($mysqli_error($conn));

                    while ($datosD = mysqli_fetch_array($consultaD)) {

                    ?>

                        <tbody>
                            <tr>
                                <!-- Nombre y apellido del Director -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Nombre y Apellido
                                </td>

                                <td class="text-start"><?php echo $datosD['nombre'] . " " . $datosD['apellido']; ?></td>
                            </tr>

                            <tr>
                                <!-- Cédula -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Cédula
                                </td>

                                <td class="text-start"><?php echo $datosD['cedula']; ?></td>
                            </tr>

                            <tr>
                                <!-- Correo -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Correo
                                </td>

                                <td class="text-start"><?php echo $datosD['correo']; ?></td>
                            </tr>

                            <tr>
                                <!-- Teléfono -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Teléfono
                                </td>

                                <td class="text-start"><?php echo $datosD['telefono']; ?></td>
                            </tr>
                        </tbody>

                    <?php

                    }

                    mysqli_close($conn);

                    $y = 1;

                    ?>

                </table>

                <div>
                    <!--BOTON DE VOLVER-->
                    <a class="btn btn-lg zoom boton-model font-family-oswald" href="detalles.php?y=<?php echo $y; ?>&id=<?php echo $id; ?>" role="button">Volver</a>
                </div>
            </div>

        <?php
        } else if ($y == 3) {
            $id_coordinador = $_GET['id_coordinador'];
        ?>

            <div class="container-lg position-absolute top-0 start-50 translate-middle-x font-family-oswald" style="margin-top: 15px; text-align:center;">
                <div class="col-12 col-4">
                    <h3>Coordinador</h3>
                </div>

                <table class="table table-bordered border-dark color" style="width: 52%; margin:0px auto; box-shadow: 0 0 8px black; margin-top: 20px;">
                    <thead style="background-color:#fff;">
                        <tr>
                            <th class="text-center color" colspan="3" style="width: 100%;">Datos del Coordinador</h4>
                            </th>
                        </tr>
                    </thead>

                    <?php

                    $mostrarC = "SELECT * FROM daep_coordinador WHERE id='$id_coordinador'";
                    $consultaC = mysqli_query($conn, $mostrarC) or die($mysqli_error($conn));

                    while ($datosC = mysqli_fetch_array($consultaC)) {

                    ?>

                        <tbody>
                            <tr>
                                <!-- Nombre y apellido del Coordinador -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Nombre y Apellido
                                </td>

                                <td class="text-start"><?php echo $datosC['nombre'] . " " . $datosC['apellido']; ?></td>
                            </tr>

                            <tr>
                                <!-- Cédula -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Cédula
                                </td>

                                <td class="text-start"><?php echo $datosC['cedula']; ?></td>
                            </tr>

                            <tr>
                                <!-- Correo -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Correo
                                </td>

                                <td class="text-start"><?php echo $datosC['correo']; ?></td>
                            </tr>

                            <tr>
                                <!-- Teléfono -->
                                <td class="text-start" style="font-weight: bold; width: 80px;">
                                    Teléfono
                                </td>

                                <td class="text-start"><?php echo $datosC['telefono']; ?></td>
                            </tr>
                        </tbody>

                    <?php

                    }

                    mysqli_close($conn);

                    $y = 1;

                    ?>

                </table>

                <div style="padding-top: 15px;">
                    <!--BOTON DE VOLVER-->
                    <a class="btn btn-lg zoom boton-modelo font-family-oswald" href="detalles.php?y=<?php echo $y; ?>&id=<?php echo $id; ?>" role="button">Volver</a>
                </div>
            </div>

            <?php
        } else if ($y == 4) {
            //Detalles de los estudiantes:

            //Fecha actual:
            $F_actual = date('Y-m-d');
            $id_cedula = $_GET['id_cedula'];

            $mostrar = "SELECT * FROM daep_alumno WHERE id_escuela='$id' and cedula_id='$id_cedula'";
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

            if ($edad >= 18) {
            ?>

                <div class="container-lg position-absolute top-0 start-50 translate-middle-x" style="margin-top: 25px; text-align:center;">

                    <table class="table table-bordered border-dark color font-family-oswald" style="box-shadow: 0 0 6px; width: 80%; margin:0px auto;">
                        <thead>
                            <tr>
                                <th class="text-center color" colspan="2" style="width: 100%;">Datos del Estudiante</h4>
                                </th>
                            </tr>
                        </thead>

                        <?php

                        $mostrar = "SELECT * FROM daep_alumno WHERE cedula_id='$id_cedula'";
                        $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));

                        while ($datos = mysqli_fetch_array($consulta)) {

                        ?>

                            <tbody>
                                <tr>
                                    <!-- Cédula del estudiante -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Cedula de Identidad
                                    </td>

                                    <td class="text-start"><?php echo $datos['cedula_id']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Nombre del estudiante -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Nombre del Estudiante
                                    </td>

                                    <td class="text-start"><?php echo $datos['nombre_apellido']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Fecha de Nacimiento -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Fecha de Nacimiento
                                    </td>

                                    <td class="text-start"><?php echo date("d-m-Y", strtotime($datos['fecha_nacimiento'])); ?></td>
                                </tr>

                                <tr>
                                    <!-- Edad -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Edad
                                    </td>

                                    <td class="text-start"><?php echo $edad; ?></td>
                                </tr>

                                <tr>
                                    <!-- Rif del estudiante -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Rif
                                    </td>

                                    <td class="text-start"><?php echo $datos['rif']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Institución -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Institución
                                    </td>

                                    <td class="text-start">

                                        <?php

                                        if ($datos['id_escuela'] == 0) {
                                            echo 'No asignada';
                                        } else {
                                            $id_escuela = $datos['id_escuela'];

                                            //Obtener el nombre de la Institución:
                                            $mostrarE = "SELECT * FROM daep_escuela WHERE id='$id_escuela'";
                                            $consultaE = mysqli_query($conn, $mostrarE) or die($mysqli_error($conn));

                                            while ($datosE = mysqli_fetch_array($consultaE)) {
                                                echo $datosE['nombre'];
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <!-- Especialidad -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Especialidad
                                    </td>

                                    <td class="text-start"><?php echo $datos['especialidad']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Parroquia -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Parroquia
                                    </td>

                                    <td class="text-start"><?php echo $datos['parroquia']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Dirección -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Dirección
                                    </td>

                                    <td class="text-start"><?php echo $datos['direccion']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Teléfono -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Número de Teléfono
                                    </td>

                                    <td class="text-start"><?php echo $datos['telefono']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Correo -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Correo
                                    </td>

                                    <td class="text-start"><?php echo $datos['correo']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Número de cuenta -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Cuenta Bancaria
                                    </td>

                                    <td class="text-start"><?php echo $datos['cuenta_bancaria']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Tipo de cuenta -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Tipo de cuenta
                                    </td>

                                    <td class="text-start">

                                        <?php

                                        if ($datos['tipo_cuenta'] == "0") {
                                            echo 'Cuenta Corriente';
                                        } else if ($datos['tipo_cuenta'] == "1") {
                                            echo 'Cuenta de Ahorros';
                                        } else {
                                            echo "--";
                                        }

                                        ?>

                                    </td>
                                </tr>

                                <tr>
                                    <!-- Banco -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Entidad Financiera
                                    </td>

                                    <td class="text-start"><?php echo $datos['entidad_financiera']; ?></td>
                                </tr>

                            </tbody>

                        <?php

                            //$id = $datos['id_escuela'];

                        }

                        mysqli_close($conn);

                        $x = 4;

                        ?>

                    </table>

                    <div class="font-family-oswald" style="padding-top: 15px;">
                        <!--BOTONES FINALES-->
                        <a class="btn btn-1 zoom boton-modelo" href="datos-editar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>&id_cedula=<?php echo $id_cedula; ?>" role="button">Editar Estudiante</a>
                        <a class="btn btn-1 boton-modelo zoom" href="estudiantes.php?id=<?php echo $id; ?>" role="button">Volver</a>
                        <a class="btn zoom boton-eliminar" href="validacion.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" role="button">Eliminar</a>
                    </div>
                </div>
            <?php
            } else {
            ?>

                <div class="container-lg position-absolute top-0 start-50 translate-middle-x" style="margin-top: 25px; text-align:center;">

                    <table class="table table-bordered border-dark font-family-oswald color" style="width: 80%; margin:0px auto;">
                        <thead>
                            <tr>
                                <th class="text-center color" colspan="2" style="width: 100%;">Datos del Estudiante</h4>
                                </th>
                            </tr>
                        </thead>

                        <?php

                        $mostrar = "SELECT * FROM daep_alumno WHERE cedula_id='$id_cedula'";
                        $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));

                        while ($datos = mysqli_fetch_array($consulta)) {

                        ?>

                            <tbody>
                                <tr>
                                    <!-- Cédula del estudiante -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Cedula de Identidad
                                    </td>

                                    <td class="text-start"><?php echo $datos['cedula_id']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Nombre del estudiante -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Nombre del Estudiante
                                    </td>

                                    <td class="text-start"><?php echo $datos['nombre_apellido']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Fecha de Nacimiento -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Fecha de Nacimiento
                                    </td>

                                    <td class="text-start"><?php echo date("d-m-Y", strtotime($datos['fecha_nacimiento'])); ?></td>
                                </tr>

                                <tr>
                                    <!-- Edad -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Edad
                                    </td>

                                    <td class="text-start"><?php echo $edad; ?></td>
                                </tr>

                                <tr>
                                    <!-- Rif del estudiante -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Rif
                                    </td>

                                    <td class="text-start"><?php echo $datos['rif']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Institución -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Institución
                                    </td>

                                    <td class="text-start">

                                        <?php

                                        if ($datos['id_escuela'] == 0) {
                                            echo 'No asignada';
                                        } else {
                                            $id_escuela = $datos['id_escuela'];

                                            //Obtener el nombre de la Institución:
                                            $mostrarE = "SELECT * FROM daep_escuela WHERE id='$id_escuela'";
                                            $consultaE = mysqli_query($conn, $mostrarE) or die($mysqli_error($conn));

                                            while ($datosE = mysqli_fetch_array($consultaE)) {
                                                echo $datosE['nombre'];
                                            }
                                        }

                                        $id_escuela = $datos['id_escuela'];
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <!-- Especialidad -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Especialidad
                                    </td>

                                    <td class="text-start"><?php echo $datos['especialidad']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Parroquia -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Parroquia
                                    </td>

                                    <td class="text-start"><?php echo $datos['parroquia']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Dirección -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Dirección
                                    </td>

                                    <td class="text-start"><?php echo $datos['direccion']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Teléfono -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Número de Teléfono
                                    </td>

                                    <td class="text-start"><?php echo $datos['telefono']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Correo -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Correo
                                    </td>

                                    <td class="text-start"><?php echo $datos['correo']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Número de cuenta -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Cuenta Bancaria
                                    </td>

                                    <td class="text-start"><?php echo $datos['cuenta_bancaria']; ?></td>
                                </tr>

                                <tr>
                                    <!-- Tipo de cuenta -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Tipo de cuenta
                                    </td>

                                    <td class="text-start">

                                        <?php

                                        if ($datos['tipo_cuenta'] == "0") {
                                            echo 'Cuenta Corriente';
                                        } else if ($datos['tipo_cuenta'] == "1") {
                                            echo 'Cuenta de Ahorros';
                                        } else {
                                            echo "--";
                                        }

                                        ?>

                                    </td>
                                </tr>

                                <tr>
                                    <!-- Banco -->
                                    <td class="text-start" style="font-weight: bold; width: 80px;">
                                        Entidad Financiera
                                    </td>

                                    <td class="text-start"><?php echo $datos['entidad_financiera']; ?></td>
                                </tr>

                                <tr>
                                    <th class="text-center color" colspan="2" style="width: 100%;">Datos del Representante</h4>
                                    </th>
                                </tr>

                                <tr>
                                    <!--Representante-->
                                    <td class="text-start color" style="font-weight: bold; width: 80px;">
                                        Nombre del representante
                                    </td>

                                    <td class="text-start"><?php echo $datos['representante']; ?></td>
                                </tr>

                                <tr>
                                    <!--Teléfono-->
                                    <td class="text-start color" style="font-weight: bold; width: 80px;">
                                        Número de Teléfono
                                    </td>

                                    <td class="text-start"><?php echo $datos['telefono_representante']; ?></td>
                                </tr>

                            </tbody>

                        <?php

                            $id = $datos['cedula_id'];
                        }

                        mysqli_close($conn);

                        $x = 4;

                        ?>

                    </table>

                    <?php

                    if ($edad < 18) {

                        echo '<div style="padding-top: 15px; padding-bottom: 20px !important">';

                    } else {

                        echo '<div style="padding-top: 15px; padding-bottom: 0px !important">';
                    }

                    ?>
                    <a class="btn zoom btn-1 boton-modelo font-family-oswald" href="datos-editar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>&id_cedula=<?php echo $id_cedula; ?>" role="button">Editar Estudiante</a>
                    <a class="btn zoom btn-1 boton-modelo font-family-oswald" href="estudiantes.php?id=<?php echo $id_escuela; ?>" role="button">Volver</a>
                    <?php
                    $x = 6;
                    ?>
                    <a class="btn zoom boton-eliminar font-family-oswald" href="validacion.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>" role="button">Eliminar</a>
                </div>
                </div>

        <?php
            }
        }
        else if ( $y == 5 ) {
        ?>
        	<div class="container-lg position-absolute top-0 start-50 translate-middle-x">
			<h3 style="margin-top: 20px;margin-bottom:15px; font-size:calc(1.3rem + .6vw); font-family: Oswald !important;">Datos del estudiante</h3>
		
			<?php
    
        		$mostrar = "SELECT * FROM daep_alumno WHERE cedula_id='$id'"; 
        		$consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));
	
        		while ($datos = mysqli_fetch_array($consulta)) {
        	
        		$id_departamento = $datos['id_departamento'];
        		
        		?>
        	
			<div class="card" style="width: 100%; background: #D6ECFF; margin-bottom: 30px; font-family: Oswald !important;">
				<div class="card-header">
		    			<b><?php echo $datos['nombre_apellido'];?></b>
		  		</div>
		  		<ul class="list-group list-group-flush">
		    			<li class="list-group-item text-start"><b>Cédula de identidad: </b><?php echo $datos['cedula_id'];?></li>
		    			<li class="list-group-item text-start"><b>Especialidad o carrera: </b><?php echo $datos['especialidad'];?></li>
		    			
		    			<?php
        				
        				$mostrar = "SELECT * FROM daep_departamento WHERE id='$id_departamento'"; 
        				$consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));
	
        				while ($datosDEP = mysqli_fetch_array($consulta)) {
        					?>
        					<li class="list-group-item text-start"><b>Pasantías asignadas: </b><?php echo $datosDEP['nombre'];?></li>
        					<?php
        				}
        				?>
		  		</ul>
			</div>
			
			<a href="proceso-asignacion.php?x=1&id_estudiante=<?php echo $datos['cedula_id']; ?>&departamento=<?php echo $id_departamento; ?>" style="font-family: Oswald !important;" class="btn btn-primary">Reasignar Pasantías</a>
			<?php
			}
		 mysqli_close($conn);
		?>
	</div>
	<?php
        }
        ?>

    </main>

</body>

</html>