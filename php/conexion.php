<?php 
try{ 
	$conexion = new PDO('mysql:host=localhost;dbname=hmv',"root","");
}
catch(PDOException $e){
	echo "ERROR".$e->getMessage();
}
?>