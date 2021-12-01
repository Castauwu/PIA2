<?php
session_start();
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$repitacontr = $_POST['contrasena2'];
$id = $_SESSION['id'];

try {
	include "../../php/conexion.php";

	if ($contrasena == $repitacontr){
		
		
	$sql= "UPDATE empleados SET password = :contrasena  WHERE id = '$id'" ;

	$consulta = $conexion->prepare($sql);
	$consulta -> execute(array(
	
	':contrasena' => $contrasena
			
	
	));
header("location:perfil.php");
}
else{
    if ($contrasena != $repitacontr) {
       echo'<script type="text/javascript">
        alert("Valida tu contraseña!!");
        window.location.href="change.php";
        </script>';  
}
    }

}
catch(Exception $e){
	echo 'Error conectando a la base de datos: '. $e->getMessage();
}
?>