<?php
session_start();
require_once "conexion.php";

if($_SESSION['form'] ="enfocados"){
$p1=$_POST["p1"];
$p2=$_POST["p2"];
$p3=$_POST["p3"];
$p4=$_POST["p4"];
$p5=$_POST["p5"];
$p6=$_POST["p6"];
$p7=$_POST["p7"];
$sumt=$p1+$p2+$p3+$p4+$p5+$p6+$p7;
$_SESSION['sumt']=$sumt;
}
$id=$_SESSION["id_usuario"]; 

$cnslt="SELECT * FROM resultados WHERE id_trabajador='$id'";
$rslt=$conexion -> query($cnslt);
$data=$rslt -> fetch();

$sumt=$_SESSION['sumt'];

if($data['resultado']!="..."){   
  $sumt=($sumt+$data['resultado'])/2;
  if($sumt < 7){
    $sumt=7;
  }
  }

if ($sumt <=7){
  $casco="'img/cascorojo.png'";
	$col="#FF0000";
} 
if ($sumt >=8 && $sumt <= 13){
  $casco="'img/cascoamarillo.png'";
	$col="#FFF000";
}
if ($sumt > 13 && $sumt <= 19){
  $casco="'img/cascoazul.png'";
	$col="#0000FF";
}
if ($sumt > 19 && $sumt <= 25){
  $casco="'img/cascoceleste.png'";
	$col="#00E4FF";
} 
if ($sumt >25){
  $casco="'img/cascoverde.png'";
	$col="#3AFF00";
}

$_SESSION['sum']=$sumt;
$_SESSION['col']=$col;
$_SESSION['casco']=$casco;


if($_SESSION['form'] ="enfocados"){
  try{
  $consulta1 = $conexion -> prepare( "UPDATE resultados SET solved_enfocados ='1' WHERE id_trabajador = '$id'");
  $consulta1 -> execute();
  }
  catch(Exception $e){
  echo 'Error conectando a la base de datos: '. $e->getMessage();  
  }
}
try {

  $consulta = $conexion -> prepare( "UPDATE resultados SET resultado ='$sumt' WHERE id_trabajador = '$id'");
  $consulta -> execute();
  }

catch(Exception $e){
echo 'Error conectando a la base de datos: '. $e->getMessage();
  }
header("location:../color.php");
?>