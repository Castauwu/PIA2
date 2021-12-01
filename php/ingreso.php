 <?php
session_start();
require_once "conexion.php";
$usuario=$_POST['logemail'];
$contra=$_POST['logpass'];
$_SESSION['nombre']=$usuario;
$consulta= "SELECT * FROM empleados";
$resultado= $conexion ->query ($consulta);
 while ($si = $resultado -> fetch()){
	if($usuario==$si["nombre"] or $usuario==$si["usuario"] && $contra==$si["password"]){
		$so=1;
		$_SESSION['id_usuario']=$si["id"];
		$_SESSION['estado_s']=1;
		$_SESSION['form']="nocas";
		if($si["admin"]==1){
			echo'<script type="text/javascript">
	alert("Credenciales Validas!")
	</script>'; 
		header ("location:../form/templates/perfiladmin.php");
		}
		else{
			echo'<script type="text/javascript">
	alert("Credenciales Validas!")
	</script>'; 
			header ("location:../form/templates/color_perfil.php");
		}
	}
}
if($so!=1){
	echo'<script type="text/javascript">
	alert("Error al iniciar sesion
	No coinciden credenciales")
	</script>'; 
	header ("location:../login.php");
}
?>