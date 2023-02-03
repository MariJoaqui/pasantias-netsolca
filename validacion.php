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

    <meta name="theme-color" content="#7952b3">

    <!-- CDN jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

<?php
//Variable para validar la eliminación:
//Instituciones (engloba a todo lo que esta dentro de ella tanbién) = 1
//Director = 2
//Coordinador = 3
//Usuarios = 4
//Jefes = 5
//Estudiantes = 6
$x = $_GET['x'];

if ($x == 1){
    //Id del elemento a eliminar:
    $id = $_GET['id'];
    ?>
    
    <script type ="text/javascript">
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
                    'Se ha eliminado correctamente.',
                    'success'
                ).then((si) => {
            if (si) {
                location.href='eliminar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>';
            } 
            })
            }
            else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    '¡Cancelado!',
                    'Se ha cancelado la operación.',
                    'error'
                ).then((no) => {
            if (no) {
                location.href='instituciones.php';
            } 
            })
            }
        });
    </script>

    <?php
}
else if ($x == 4){
    //Id del elemento a eliminar:
    $id = $_GET['id'];
    ?>
    
    <script type ="text/javascript">
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
                    'Se ha eliminado correctamente.',
                    'success'
                ).then((si) => {
            if (si) {
                location.href='eliminar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>';
            } 
            })
            }
            else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    '¡Cancelado!',
                    'Se ha cancelado la operación.',
                    'error'
                ).then((no) => {
            if (no) {
                location.href='usuarios.php';
            } 
            })
            }
        });
    </script>

    <?php
}
else if ($x == 5){
    //Id del elemento a eliminar:
    $id = $_GET['id'];
    ?>
    
    <script type ="text/javascript">
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
                    'Se ha eliminado correctamente.',
                    'success'
                ).then((si) => {
            if (si) {
                location.href='eliminar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>';
            } 
            })
            }
            else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    '¡Cancelado!',
                    'Se ha cancelado la operación.',
                    'error'
                ).then((no) => {
            if (no) {
                location.href='jefes.php';
            } 
            })
            }
        });
    </script>

    <?php
}
else if ($x == 6){
    //Id del elemento a eliminar:
    $id = $_GET['id'];
    $x=6;
    ?>
    
    <script type ="text/javascript">
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
                    'Se ha eliminado correctamente.',
                    'success'
                ).then((si) => {
            if (si) {
                location.href='eliminar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>';
            } 
            })
            }
            else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    '¡Cancelado!',
                    'Se ha cancelado la operación.',
                    'error'
                ).then((no) => {
            if (no) {
                location.href='estudiantes.php';
            } 
            })
            }
        });
    </script>

    <?php
}
else if ($x == 7){
    //Fecha actual:
    $F_actual = date('Y-m-d');

    //Datos estudiante:
    $nombre_e = $_POST['nombre_e'];
    $cedula_e = $_POST['cedula_e'];
    $rif_e = $_POST['rif_e'];
    $nacimiento_e = $_POST['nacimiento_e'];
    $especialidad_e = $_POST['especialidad_e'];
    $parroquia_e = $_POST['parroquia_e'];
    $direccion_e = $_POST['direccion_e'];
    $correo_e = $_POST['correo_e'];
    $telefono_e = $_POST['telefono_e'];
    $institucion_e = $_GET['id'];

    //Sacar el año de la fecha actual:
    $xAno = substr($F_actual, 0, 4);
    $xMes = substr($F_actual, 5, 2);
    $xDia = substr($F_actual, 8, 2);

    //Sacar el año de la fecha de nacimiento:
    $yAno = substr($nacimiento_e, 0, 4);
    $yMes = substr($nacimiento_e, 5, 2);
    $yDia = substr($nacimiento_e, 8, 2);

    //Cálculo de edad para realizar la validación:
    $edad = $xAno - $yAno;

    if ($edad >= 18){
        ?>
        <script>
            location.href='IngDatos.php?x=<?php echo $x; ?>&cedula_e=<?php echo $cedula_e; ?>&nombre_e=<?php echo $nombre_e; ?>&rif_e=<?php echo $rif_e; ?>&nacimiento_e=<?php echo $nacimiento_e; ?>&especialidad_e=<?php echo $especialidad_e; ?>&parroquia_e=<?php echo $parroquia_e; ?>&direccion_e=<?php echo $direccion_e; ?>&correo_e=<?php echo $correo_e; ?>&telefono_e=<?php echo $telefono_e; ?>&institucion_e=<?php echo $institucion_e; ?>';
        </script>
        <?php
    }
    else {
        $x = 8;
        ?>
        <script>
            location.href='IngDatos.php?x=<?php echo $x; ?>&cedula_e=<?php echo $cedula_e; ?>&nombre_e=<?php echo $nombre_e; ?>&rif_e=<?php echo $rif_e; ?>&nacimiento_e=<?php echo $nacimiento_e; ?>&especialidad_e=<?php echo $especialidad_e; ?>&parroquia_e=<?php echo $parroquia_e; ?>&direccion_e=<?php echo $direccion_e; ?>&correo_e=<?php echo $correo_e; ?>&telefono_e=<?php echo $telefono_e; ?>&institucion_e=<?php echo $institucion_e; ?>';
        </script>
        <?php
    }
}
else if ($x == 8){
    //Id del elemento a eliminar:
    $id = $_GET['id'];
    $x = 7;
    ?>
    
    <script type ="text/javascript">
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
                    'Se ha eliminado correctamente.',
                    'success'
                ).then((si) => {
            if (si) {
                location.href='eliminar.php?x=<?php echo $x; ?>&id=<?php echo $id; ?>';
            } 
            })
            }
            else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    '¡Cancelado!',
                    'Se ha cancelado la operación.',
                    'error'
                ).then((no) => {
            if (no) {
                location.href='departamentos.php';
            } 
            })
            }
        });
    </script>

    <?php
}
?>

</body>
</html>