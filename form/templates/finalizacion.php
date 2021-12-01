<?php
session_start();
try {
	$id_trabajo=$_SESSION['id_trabajo_fin'];
  require_once "../../php/conexion.php";
    $consulta = $conexion -> prepare( "UPDATE trabajos_equipo SET estado ='1' WHERE id = '$id_trabajo'");
    $consulta -> execute();
    header("location:ver_trabajos.php");
  }
catch(Exception $e){
echo 'Error conectando a la base de datos: '. $e->getMessage();
}
?>