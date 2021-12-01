<?php
try {
  $trabajo=$_POST['trabajo'];
  $descrip=$_POST['descripcion'];
  $fecha=$_POST['fecha'];
  $cargo=$_POST['cargo_trabajo'];
  $cascomin=$_POST['casco'];
  require_once "conexion.php";
  $sql="INSERT INTO trabajos_equipo(id, trabajo, descripcion, id_cargo_necesario, casco_minimo, fecha) VALUES(NULL,:trabajo, :descripcion, :cargo, :casco, :fecha)";
  $consulta = $conexion->prepare($sql);
  $consulta -> execute(array(
    ':trabajo' => $trabajo,
    ':descripcion' => $descrip,
    ':cargo' =>$cargo,
    ':casco'=>$cascomin,
    ':fecha'=>$fecha
    ));
}
catch(Exception $e){
echo 'Error conectando a la base de datos: '. $e->getMessage();
}
header("location:../form/templates/trabajosfin.php");

?>