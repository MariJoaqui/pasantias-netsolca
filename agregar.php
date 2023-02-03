<?php

include_once("connections/connec.php");

//Variable para validar el ingreso de datos:
//Instituciones (engloba a todo lo que esta dentro de ella tanbién) = 1
//Director = 2
//Coordinador = 3
//Usuarios = 4
//Jefes = 5
//Estudiantes = 6
//Departamentos = 8
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
    <link href="css/animaciones.css" rel="stylesheet">

</head>
<body class="text-center">

    <?php
    
    if ($x == 1){
        //Datos Institución
        $nombre_i = $_POST['nombre_i'];
        $direccion_i = $_POST['direccion_i'];
        $parroquia_i = $_POST['parroquia_i'];
        $telefono_i = $_POST['telefono_i'];
        $correo_i = $_POST['correo_i'];
    
        //Datos Director
        $nombre_d = $_POST['nombre_d'];
        $apellido_d = $_POST['apellido_d'];
        $cedula_d = $_POST['cedula_d'];
        $telefono_d = $_POST['telefono_d'];
        $correo_d = $_POST['correo_d'];
    
        //Datos Coordinador
        $nombre_c = $_POST['nombre_c'];
        $apellido_c = $_POST['apellido_c'];
        $cedula_c = $_POST['cedula_c'];
        $telefono_c = $_POST['telefono_c'];
        $correo_c = $_POST['correo_c'];
        
        if ($nombre_d=="" && $apellido_d=="" && $cedula_d=="" && $telefono_d=="" && $correo_d=="" &&
            $nombre_c=="" && $apellido_c=="" && $cedula_c=="" && $telefono_c=="" && $correo_c==""){
            
            $id_director = 0;
            $id_coordinador = 0;

            //Agregar la institución:
            $agregarI = "INSERT INTO daep_escuela (id_director, id_coordinador, parroquia, direccion, nombre, telefono, correo)
                         VALUES ('$id_director', '$id_coordinador', '$parroquia_i', '$direccion_i', '$nombre_i', '$telefono_i', '$correo_i')";

            mysqli_query($conn, $agregarI) or die($mysqli_error($conn));

            mysqli_close($conn);

            echo "<script>
                    Swal.fire({
                        title: 'Guardado',
                        text: 'Se agregó correctamente',
                        icon: 'success',
                        confirmButtonColor: '#286E86',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href='instituciones.php';
                        }
                    });
                </script>";
        }
        else if ($nombre_d=="" && $apellido_d=="" && $cedula_d=="" && $telefono_d=="" && $correo_d==""){
            $id_director = 0;

            //Agregar el coordinador:
            $agregarC = "INSERT INTO daep_coordinador (nombre, apellido, cedula, correo, telefono)
                         VALUES ('$nombre_c', '$apellido_c', '$cedula_c', '$correo_c', '$telefono_c')";

            mysqli_query($conn, $agregarC) or die($mysqli_error($conn));

            //Se usca el id del coordinador agregado:
            $mostrarC = "SELECT * FROM daep_coordinador WHERE cedula='$cedula_c'"; 
            $consultaC = mysqli_query($conn, $mostrarC) or die($mysqli_error($conn));

            while ($datosC = mysqli_fetch_array($consultaC)) {
                $id_coordinador = $datosC['id'];
            }

            //Agregar la institución:
            $agregarI = "INSERT INTO daep_escuela (id_director, id_coordinador, parroquia, direccion, nombre, telefono, correo)
                         VALUES ('$id_director', '$id_coordinador', '$parroquia_i', '$direccion_i', '$nombre_i', '$telefono_i', '$correo_i')";

            mysqli_query($conn, $agregarI) or die($mysqli_error($conn));

            mysqli_close($conn);

            echo "<script>
                    Swal.fire({
                        title: 'Guardado',
                        text: 'Se agregó correctamente',
                        icon: 'success',
                        confirmButtonColor: '#286E86',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href='instituciones.php';
                        }
                    });
                </script>";
        }
        else if ($nombre_c=="" && $apellido_c=="" && $cedula_c=="" && $telefono_c=="" && $correo_c==""){
            $id_coordinador = 0;

            //Agregar el director:
            $agregarD = "INSERT INTO daep_director (nombre, apellido, cedula, correo, telefono)
                         VALUES ('$nombre_d', '$apellido_d', '$cedula_d', '$correo_d', '$telefono_d')";

            mysqli_query($conn, $agregarD) or die($mysqli_error($conn));

            //Se busca el id del director agregado:
            $mostrarD = "SELECT * FROM daep_director WHERE cedula='$cedula_d'"; 
            $consultaD = mysqli_query($conn, $mostrarD) or die($mysqli_error($conn));

            while ($datosD = mysqli_fetch_array($consultaD)) {
                $id_director = $datosD['id'];
            }

            //Agregar la institución:
            $agregarI = "INSERT INTO daep_escuela (id_director, id_coordinador, parroquia, direccion, nombre, telefono, correo)
                         VALUES ('$id_director', '$id_coordinador', '$parroquia_i', '$direccion_i', '$nombre_i', '$telefono_i', '$correo_i')";

            mysqli_query($conn, $agregarI) or die($mysqli_error($conn));

            mysqli_close($conn);

            echo "<script>
                    Swal.fire({
                        title: 'Guardado',
                        text: 'Se agregó correctamente',
                        icon: 'success',
                        confirmButtonColor: '#286E86',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href='instituciones.php';
                        }
                    });
                </script>";
        }
        else {
            //Agregar el director:
            $agregarD = "INSERT INTO daep_director (nombre, apellido, cedula, correo, telefono)
                         VALUES ('$nombre_d', '$apellido_d', '$cedula_d', '$correo_d', '$telefono_d')";
    
            mysqli_query($conn, $agregarD) or die($mysqli_error($conn));
    
            //Se busca el id del director agregado:
            $mostrarD = "SELECT * FROM daep_director WHERE cedula='$cedula_d'"; 
            $consultaD = mysqli_query($conn, $mostrarD) or die($mysqli_error($conn));
    
            while ($datosD = mysqli_fetch_array($consultaD)) {
                $id_director = $datosD['id'];
            }
    
            //Agregar el coordinador:
            $agregarC = "INSERT INTO daep_coordinador (nombre, apellido, cedula, correo, telefono)
                         VALUES ('$nombre_c', '$apellido_c', '$cedula_c', '$correo_c', '$telefono_c')";
    
            mysqli_query($conn, $agregarC) or die($mysqli_error($conn));
    
            //Se busca el id del coordinador agregado:
            $mostrarC = "SELECT * FROM daep_coordinador WHERE cedula='$cedula_c'"; 
            $consultaC = mysqli_query($conn, $mostrarC) or die($mysqli_error($conn));
    
            while ($datosC = mysqli_fetch_array($consultaC)) {
                $id_coordinador = $datosC['id'];
            }
    
            //Agregar la institución:
            $agregarI = "INSERT INTO daep_escuela (id_director, id_coordinador, parroquia, direccion, nombre, telefono, correo)
                         VALUES ('$id_director', '$id_coordinador', '$parroquia_i', '$direccion_i', '$nombre_i', '$telefono_i', '$correo_i')";
    
            mysqli_query($conn, $agregarI) or die($mysqli_error($conn));

            mysqli_close($conn);

            echo "<script>
                    Swal.fire({
                        title: 'Guardado',
                        text: 'Se agregó correctamente',
                        icon: 'success',
                        confirmButtonColor: '#286E86',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href='instituciones.php';
                        }
                    });
                </script>";
        }
    }
    else if ($x == 2){
        //id de la institucion donde se agregará el director:
        $id = $_GET['id'];
        $y = 1;

        //Datos Director
        $nombre_d = $_POST['nombre_d'];
        $apellido_d = $_POST['apellido_d'];
        $cedula_d = $_POST['cedula_d'];
        $telefono_d = $_POST['telefono_d'];
        $correo_d = $_POST['correo_d'];

        //Agregar el director:
        $agregarD = "INSERT INTO daep_director (nombre, apellido, cedula, correo, telefono)
                     VALUES ('$nombre_d', '$apellido_d', '$cedula_d', '$correo_d', '$telefono_d')";

        mysqli_query($conn, $agregarD) or die($mysqli_error($conn));

        //Se busca el id del director agregado:
        $mostrarD = "SELECT * FROM daep_director WHERE cedula='$cedula_d'"; 
        $consultaD = mysqli_query($conn, $mostrarD) or die($mysqli_error($conn));

        while ($datosD = mysqli_fetch_array($consultaD)) {
            $id_director = $datosD['id'];
        }

        //Se realiza la actualización en la tabla de instituciones:
        $editarI = "UPDATE daep_escuela 
                    SET id_director = '$id_director'
                    WHERE id='$id'";

        mysqli_query($conn, $editarI) or die($mysqli_error($conn));

        mysqli_close($conn);

        echo "<script>
                Swal.fire({
                    title: 'Guardado',
                    text: 'Se agregó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#286E86',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href='detalles.php?id=$id&y=$y';
                    }
                });
            </script>";
    }
    else if ($x == 3){
        //id de la institucion donde se agregará el coordinador:
        $id = $_GET['id'];
        $y = 1;

        //Datos Coordinador
        $nombre_c = $_POST['nombre_c'];
        $apellido_c = $_POST['apellido_c'];
        $cedula_c = $_POST['cedula_c'];
        $telefono_c = $_POST['telefono_c'];
        $correo_c = $_POST['correo_c'];

        //Agregar el coordinador:
        $agregarC = "INSERT INTO daep_coordinador (nombre, apellido, cedula, correo, telefono)
                     VALUES ('$nombre_c', '$apellido_c', '$cedula_c', '$correo_c', '$telefono_c')";

        mysqli_query($conn, $agregarC) or die($mysqli_error($conn));

        //Se busca el id del director agregado:
        $mostrarC = "SELECT * FROM daep_coordinador WHERE cedula='$cedula_c'"; 
        $consultaC = mysqli_query($conn, $mostrarC) or die($mysqli_error($conn));

        while ($datosC = mysqli_fetch_array($consultaC)) {
            $id_coordinador = $datosC['id'];
        }

        //Se realiza la actualización en la tabla de instituciones:
        $editarI = "UPDATE daep_escuela 
                    SET id_coordinador = '$id_coordinador'
                    WHERE id='$id'";

        mysqli_query($conn, $editarI) or die($mysqli_error($conn));

        mysqli_close($conn);

        echo "<script>
                Swal.fire({
                    title: 'Guardado',
                    text: 'Se agregó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#286E86',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href='detalles.php?id=$id&y=$y';
                    }
                });
            </script>";
    }
    else if ($x == 4){
        //Datos usuario
        $nombre_apellido_u = $_POST['nombre_apellido_u'];
        $correo_u = $_POST['correo_u'];
        $password_u = $_POST['password_u'];
        $nivel_u = $_POST['nivel_u'];
        $estado_u = $_POST['estado_u'];

        //Validar el nivel de usuario:
        if ($nivel_u == "Seleccionar"){
            $tipo_u = "-";
        }
        else if ($nivel_u == "Nivel Máximo"){
            $tipo_u = "0";
        }
        else if ($nivel_u == "Director de Institución"){
            $tipo_u = "1";
        }
        else if ($nivel_u == "Coordinador de Pasantías Institucional"){
            $tipo_u = "2";
        }
        else if ($nivel_u == "Director de División o Dependencia"){
            $tipo_u = "3";
        }
        else {
            $tipo_u = "-";
        }

        //Validar el estado del usuario:
        if ($estado_u == "Seleccionar"){
            $status_u = "-";
        }
        else if ($estado_u == "Activo"){
            $status_u = "1";
        }
        else if ($estado_u == "Inactivo"){
            $status_u = "0";
        }
        else {
            $status_u = "-";
        }

        //Agregar el usuario:
        $agregarU = "INSERT INTO daep_usuarios (nombre, correo, clave, tipo_usuario, activo_usuario)
                     VALUES ('$nombre_apellido_u', '$correo_u', '$password_u', '$tipo_u', '$status_u')";

        mysqli_query($conn, $agregarU) or die($mysqli_error($conn));

        mysqli_close($conn);

        echo "<script>
                Swal.fire({
                    title: 'Guardado',
                    text: 'Se agregó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#286E86',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href='usuarios.php';
                    }
                });
            </script>";
    }
    else if ($x == 5){
        //Datos jefe
        $nombre_j = $_POST['nombre_j'];
        $apellido_j = $_POST['apellido_j'];
        $cedula_j = $_POST['cedula_j'];
        $correo_j = $_POST['correo_j'];
        $telefono_j = $_POST['telefono_j'];
        $estado_j = $_POST['estado_j'];

        //Validar el estado del jefe:
        if ($estado_j == "Seleccionar"){
            $status_j = "-";
        }
        else if ($estado_j == "Activo"){
            $status_j = "1";
        }
        else if ($estado_j == "Inactivo"){
            $status_j = "0";
        }
        else {
            $status_j = "-";
        }

        //Agregar el jefe:
        $agregarJ = "INSERT INTO daep_jefe (nombre, apellido, correo, cedula, telefono, status)
                     VALUES ('$nombre_j', '$apellido_j', '$correo_j', '$cedula_j', '$telefono_j', '$status_j')";

        mysqli_query($conn, $agregarJ) or die($mysqli_error($conn));

        mysqli_close($conn);

        echo "<script>
                Swal.fire({
                    title: 'Guardado',
                    text: 'Se agregó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#286E86',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href='jefes.php';
                    }
                });
            </script>";
    }
    else if ($x == 6){
        //Datos estudiante mayores de edad:
        //Datos obtenidos por GET:
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

        //Datos obtenidos por POST:
        $cuenta_e = $_POST['cuenta_e'];
        $tipocuenta_e = $_POST['tipocuenta_e'];
        $banco_e = $_POST['banco_e'];

        /*Validación y obtención del id de la institución:
        if ($institucion_e == "Seleccionar"){
            $id_institucion = 0;
        }
        else {
            //realizar la consulta para obtener los datos de la tabla escuela y sacar el id:
            $mostrar = "SELECT * FROM daep_escuela WHERE nombre='$institucion_e'"; 
            $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));
        
            while ($datos = mysqli_fetch_array($consulta)) {
                $id_institucion = $datos['id'];
            }
        }*/

        //Validar el tipo de cuenta:
        if ($tipocuenta_e == "Seleccionar"){
            $tipo_e = "-";
        }
        else if ($tipocuenta_e == "Corriente"){
            $tipo_e = "0";
        }
        else if ($tipocuenta_e == "Ahorro"){
            $tipo_e = "1";
        }

        //Agregar el Estudiante:
        $agregarE = "INSERT INTO daep_alumno (cedula_id, id_escuela, nombre_apellido, rif, especialidad, parroquia, direccion, correo, telefono, cuenta_bancaria, tipo_cuenta, entidad_financiera, fecha_nacimiento)
                     VALUES ('$cedula_e', '$institucion_e', '$nombre_e', '$rif_e', '$especialidad_e', '$parroquia_e', '$direccion_e', '$correo_e', '$telefono_e', '$cuenta_e', '$tipo_e', '$banco_e', '$nacimiento_e')";

        mysqli_query($conn, $agregarE) or die($mysqli_error($conn));

        mysqli_close($conn);

        echo "<script>
                Swal.fire({
                    title: 'Guardado',
                    text: 'Se agregó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#286E86',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href='estudiantes.php?id=$institucion_e';
                    }
                });
        </script>";
    }
    else if ($x == 7){
        //Datos estudiante menores de edad:
        //Datos obtenidos por GET:
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

        //Datos obtenidos por POST:
        $cuenta_e = $_POST['cuenta_e'];
        $tipocuenta_e = $_POST['tipocuenta_e'];
        $banco_e = $_POST['banco_e'];
        $representante_e = $_POST['representante_e'];
        $trepresentante_e = $_POST['trepresentante_e'];

        /*Validación y obtención del id de la institución:
        if ($institucion_e == "Seleccionar"){
            $id_institucion = 0;
        }
        else {
            //realizar la consulta para obtener los datos de la tabla escuela y sacar el id:
            $mostrar = "SELECT * FROM daep_escuela WHERE nombre='$institucion_e'"; 
            $consulta = mysqli_query($conn, $mostrar) or die($mysqli_error($conn));
        
            while ($datos = mysqli_fetch_array($consulta)) {
                $id_institucion = $datos['id'];
            }
        }
        */

        //Validar el tipo de cuenta:
        if ($tipocuenta_e == "Seleccionar"){
            $tipo_e = "-";
        }
        else if ($tipocuenta_e == "Corriente"){
            $tipo_e = "0";
        }
        else if ($tipocuenta_e == "Ahorro"){
            $tipo_e = "1";
        }

        //Agregar el Estudiante:
        $agregarE = "INSERT INTO daep_alumno (cedula_id, id_escuela, nombre_apellido, rif, especialidad, parroquia, direccion, correo, telefono, cuenta_bancaria, tipo_cuenta, entidad_financiera, fecha_nacimiento, representante, telefono_representante)
                     VALUES ('$cedula_e', '$institucion_e', '$nombre_e', '$rif_e', '$especialidad_e', '$parroquia_e', '$direccion_e', '$correo_e', '$telefono_e', '$cuenta_e', '$tipo_e', '$banco_e', '$nacimiento_e', '$representante_e', '$trepresentante_e')";

        mysqli_query($conn, $agregarE) or die($mysqli_error($conn));

        mysqli_close($conn);

        echo "<script>
                Swal.fire({
                    title: 'Guardado',
                    text: 'Se agregó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#286E86',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href='estudiantes.php?id=$institucion_e';
                    }
                });
        </script>";

    }
    else if ($x == 8){
        //Datos departamento
        $nombre_d = $_POST['nombre_d'];
        $encargado_d = $_POST['encargado_d'];

        //Agregar el departamento:
        $agregarD = "INSERT INTO daep_departamento (nombre, encargado)
        VALUES ('$nombre_d', '$encargado_d')";

        mysqli_query($conn, $agregarD) or die($mysqli_error($conn));

        mysqli_close($conn);

        echo "<script>
                Swal.fire({
                    title: 'Guardado',
                    text: 'Se agregó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#286E86',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href='departamentos.php';
                    }
                });
            </script>";
    }
    ?>

</body>
</html>