<?php
include_once("connections/connec.php");

$departamento = $_GET['departamento'];
$estudiante = $_GET['id_estudiante'];

$x = $_GET['x'];

if ( $x == 0 ) {
	$actualizar = "UPDATE daep_alumno
                SET id_departamento='$departamento'
                WHERE cedula_id='$estudiante'";

        mysqli_query($conn, $actualizar) or die($mysqli_error($conn));
        
        echo 'agregado';
}
else if ( $x == 1 ) {
	echo 'hi';
}             
?>