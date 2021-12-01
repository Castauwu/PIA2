<?php
session_start();
if($_SESSION['if']==1){
$p1=$_POST["p1"];
$p2=$_POST["p2"];
$p3=$_POST["p3"];
$p4=$_POST["p4"];
$p5=$_POST["p5"];
$p6=$_POST["p6"];
$p7=$_POST["p7"];
$sum=$p1+$p2+$p3+$p4+$p5+$p6+$p7;
if ($sum <=7){
  $casco="'img/cascorojo.jpg'";
	$col="#FF0000";
} 
if ($sum >=8 && $sum <= 13){
  $casco="'img/cascoamarillo.jpg'";
	$col="#FFF000";
}
if ($sum > 13 && $sum <= 19){
  $casco="'img/cascoazul.jpg'";
	$col="#0000FF";
}
if ($sum > 19 && $sum <= 25){
  $casco="'img/cascoceleste.jpg'";
	$col="#00E4FF";
} 
if ($sum >25){
  $casco="'img/cascoverde.jpg'";
	$col="#3AFF00";
}
$id=$_SESSION["id_coevaluacion"];
$a=$_SESSION["id_usuario"];
try {
  require_once "conexion.php";
  $sql="INSERT INTO coevaluacion(id, id_evaluado, id_evaluador, resultado_co) VALUES(NULL,:id,:a,:sum)";
  $consulta = $conexion->prepare($sql);
  $consulta -> execute(array(
    ':id' => $id,
    ':a'=>$a,
    ':sum' => $sum
    ));
}
catch(Exception $e){
echo 'Error conectando a la base de datos: '. $e->getMessage();
}
header("location:../form/templates/coevaluacionfin.php");
}
$_SESSION["coevaluacion_resultado"]=$col;
?>