<?php
session_start();
include_once"conexion.php";
$id=$_SESSION['id_usuario'];
try{
  $consulta2 = $conexion -> prepare( "UPDATE resultados SET solved ='1' WHERE id_trabajador = '$id'");
  $consulta2 -> execute();
  }
  catch(Exception $e){
  echo 'Error conectando a la base de datos: '. $e->getMessage();  
  }
$_SESSION['form']="su_cucha_igual_gayxde";

$p1=$_POST["p1"];
$p2=$_POST["p2"];
$p3=$_POST["p3"];
$p4=$_POST["p4"];
$p5=$_POST["p5"];
$p6=$_POST["p6"];
$p7=$_POST["p7"];
$sumt=$p1+$p2+$p3+$p4+$p5+$p6+$p7;

$_SESSION['sumt']=$sumt;

header("location:defcolor.php");
?>