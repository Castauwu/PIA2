<?php 
session_start();
include_once "../../php/validation.php";

?>
<!DOCTYPE html>
<html lang="en" >
<head>

  <meta charset="UTF-8">
  <title>Form</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'><link rel="stylesheet" href="../static/style.css" >
<link rel="icon" type="image/gng" href="../../img/favicon.ico">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <img src="../../img\logo-FC.png" class="logo" onclick="location.href='../../php/cerrar.php';" >
<div class="plus-button justify-content-center" role="toolbar" aria-label="Botones" >
    <a type="button" class="disminuir" ><i class="fa fa-minus" aria-hidden="true"></i></a><br> 
    <a type="button" class="aumentar"><i class="fa fa-plus" aria-hidden="true"></i></a><br>
    <a type="button" class="restablecer"><i class="fa fa-pause" aria-hidden="true"></i></a><br>
    <p class="tamaño-actual"></p>
</div>
<div class="container">
  <div id="logo"><h1 class="logo"></h1></div>
  <div class="leftbox">
    <nav>
      <a id="profile" data-tooltip="Perfil"onclick="location.href='perfiladmin.php'"><i class="fa fa-user"></i></a>
      <a id="profile" class="active"><i class="fa fa-tasks"  ></i></a><a id="privacy"onclick="location.href='empleados.php'"><i class="fa fa-address-book"></i></a>
      <a id="profile" onclick="location.href='ver_trabajos.php'"><i class="fa fa-arrow-left"></i></a>
   <a id="subscription" onclick="location.href='../../php/cerrar.php';" data-tooltip="Cerrar sesion" class="iconoss"><i class="fa fa-window-close"></i></a>
    </nav>
  </div>
  <div class="rightbox">
    <div class="profile" >
      <?php
     include_once "../../php/conexion.php";
      $trabajo_id =$_POST["trabajos_elect"];
      $consulta = "SELECT * FROM trabajos_equipo WHERE id='$trabajo_id'";
      $resultado = $conexion ->query ($consulta);
      $si = $resultado -> fetch();
      echo '<h1>'.$si["trabajo"].' .</h1>';
      echo'<h2> Descripción: </h2>
      <p>'.$si["descripcion"].'</p>';
      $consulta2 = "SELECT * FROM trabajos_empleados WHERE id_trabajo='$trabajo_id'";
      $resultado2 = $conexion ->query ($consulta2);
      $_SESSION['id_trabajo_fin']=$trabajo_id;
      if($si["estado"]==0){
          $estado="v";
        }
        else{
          $estado="r";
        }
      echo'<h2>Estado:</h2><br>
      <div class="'.$estado.'"></div><br>';
      if($estado=="v"){
      echo'<form method="post" action="finalizacion.php">
      <input type="submit" value="Finalizar" class="boton">
      </form>';
      }
      echo'<table width="250px">
      <br><h2>PARTICIPANTES:</h2><br><br>
      <tr>
      <th><h2>Id</h2></th>
      <th><center><h2>Nombre Participante</h2></center></th>
      </tr>';
      while($si2 = $resultado2 -> fetch()){
        $id_empleado =$si2["id_empleado"];
        $consulta3 = "SELECT * FROM empleados WHERE id='$id_empleado'";
        $resultado3 = $conexion ->query ($consulta3);
        $si3 = $resultado3 -> fetch();
      echo'
      <td><p>'.$si3["id"].'</p></td>
      <td><center><p>'.
        $si3["nombre"]
      .' '.
        $si3["apellido"]
      .'</p></center></td>
      </tr>';
    }
      ?>
    </div>
  </div>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script  src="{{ url_for('static',filename='script.js')}}"></script>
<script type="text/javascript">
function tamanoLetra() {
  size = 12;
  size = parseInt(size, 10);
  $( ".tamaño-actual" ).text(size);
}

tamanoLetra();

$(".disminuir").on("click", function() {
  if ((size) >= 10) {
    $(".plus-button").css("left","-=2%");
    $(".container").css("width","-=2%");
    $(".container").css("height","-=5%");
    $(".container2").css("width","-=2%");
    $(".container2").css("height","-=5%");
    $("p").css("font-size", "-=2");
    $("h1").css("font-size", "-=2");
    $("h2").css("font-size", "-=2");
    $("a").css("font-size", "-=3");
    $(".imgsita").css("width","-=3%");
    $(".redirigir").css("font-size","-=2")
    $( ".tamaño-actual" ).text(size -=1);
  }
});

// Función para aumentar el tamaño del texto (fuente) 
$(".aumentar").on("click", function() { 
  if ((size + 2) <= 18) {
    $(".plus-button").css("left","+=2%");
    $(".container").css("width","+=2%");
    $(".container").css("height","+=5%");
    $(".container2").css("width","+=2%");
    $(".container2").css("height","+=5%");
    $("p").css("font-size", "+=2");
    $("h1").css("font-size", "+=2");
    $("h2").css("font-size", "+=2");
    $("a").css("font-size", "+=3");
    $(".imgsita").css("width","+=3%");
    $(".redirigir").css("font-size","+=2")
    $( ".tamaño-actual" ).text(size +=1);
  }
}); 

$(".restablecer").on("click", function() {
  $(".plus-button").css("left","55%");
  $(".container").css("width","50%");
  $(".container").css("height","50%");
  $(".container2").css("width","20%");
  $(".container2").css("height","25%");
  $("p").css("font-size", "15px");
  $("h1").css("font-size", "initial");
  $("h2").css("font-size", "9px");
  $("a").css("font-size", "20px");
  $(".redirigir").css("font-size","10px")
  $(".imgsita").css("width","44%");
  size = 12;
  size = parseInt(size, 10);
  $( ".tamaño-actual" ).text(size);
}); 
  </script>

</body>
</html>