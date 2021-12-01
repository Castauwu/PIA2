<?php
session_start();
require_once "../../php/conexion.php";
$usuario=$_SESSION['id_usuario'];
$consulta="SELECT * FROM resultados WHERE id_trabajador ='$usuario'";
$resultado= $conexion ->query ($consulta);
$si=$resultado -> fetch();
$sum=$si["resultado"];
if($sum == "..."){
	$_SESSION['fondo']="#3C7CAE";
	header("location:perfil.php");
}
if ($sum == 7){
	$_SESSION['fondo']="#FF0000";
	header("location:perfil.php");
} 
if ($sum > 7 && $sum < 14){
	$_SESSION['fondo']="#FFF000";
	header("location:perfil.php");
}
if ($sum >= 14 && $sum <= 19){
	$_SESSION['fondo']="#0000FF";
	header("location:perfil.php");
}
if ($sum > 19 && $sum <= 25){
	$_SESSION['fondo']="#00E4FF";
	header("location:perfil.php");
} 
if ($sum >25){
	$_SESSION['fondo']="#3AFF00";
	header("location:perfil.php");
}

?>