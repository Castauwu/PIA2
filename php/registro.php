 <?php
session_start();
require_once "conexion.php";
$nombre=$_POST['logname'];
$contrasena=$_POST['logcor'];
$nombre2=$_POST['logpass'];
$apellido2=$_POST['apellido'];
$contrasena2=$_POST['logpass2'];
$cargo=$_POST['cargo'];
$admin=1;
$_SESSION['nombre']=$nombre;
$_SESSION['password']=$contrasena;
$_SESSION['admin']=$admin;
$consulta= "SELECT * FROM empleados";
$resultado1= $conexion ->query ($consulta);
 while ($si = $resultado1 -> fetch()){
	if($nombre==$si["nombre"] && $contrasena==$si["password"] && $admin==$si["admin"]){
		$so=1;
		try {
			
			$sql="INSERT INTO empleados (id, nombre, apellido, password, usuario , id_cargo, admin) VALUES(NULL,:nombre2,:apellido2,:contrasena2,NULL,:cargo,0)";
			$consulta = $conexion->prepare($sql);
			$consulta -> execute(array(
		    ':nombre2' => $nombre2,
		    ':apellido2' =>$apellido2,
		    ':contrasena2'=>$contrasena2,
		    ':cargo' => $cargo
		    ));
		}
		catch(Exception $e){
			echo 'Error conectando a la base de datos: '. $e->getMessage();
		}
		try {
		$consulta= "SELECT * FROM empleados WHERE nombre= '$nombre2' ";
		$resultado1= $conexion ->query ($consulta);
		while ($si = $resultado1 -> fetch()){
		$usuario=$nombre2.$si["id"];
		$sql= "UPDATE empleados SET usuario = :usuario WHERE nombre = '$nombre2'" ;
		$consulta = $conexion->prepare($sql);
		$consulta -> execute(array(
		':usuario'=>$usuario,
		));
		}
	}
		catch(Exception $e){
			echo 'Error conectando a la base de datos: '. $e->getMessage();
		}
		}
		try {
			$consulta= "SELECT * FROM empleados WHERE nombre='$nombre2' and password='$contrasena2'";
      		$resultado= $conexion ->query ($consulta);
      		$datos= $resultado -> fetch();
			$sql1="INSERT INTO resultados(id_respuestas, id_trabajador, resultado) VALUES(NULL, :id, :resultado)";
			$consulta = $conexion->prepare($sql1);
			$consulta -> execute(array(
		    ':id' => $datos["id"],
		    ':resultado' => "..."
		    ));
		}
		catch(Exception $e){
			echo 'Error conectando a la base de datos: '. $e->getMessage();
		}
	}

if($so!=1){
	echo "<h1>unu</h1>";
}
else{
	echo'<script type="text/javascript">         alert("Tu registro fue realizado con exito, inicia sesion!!");         window.location.href="../login.php";         </script>';
}

?>