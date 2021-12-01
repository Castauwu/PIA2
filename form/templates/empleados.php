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
<!-- partial:index.partial.html -->
<div class="container">
  <div id="logo"><h1 class="logo"></h1></div>
  <div class="leftbox">
    <nav>
      <a id="profile"onclick="location.href='perfiladmin.php'" ><i class="fa fa-user"></i></a>
      <a id="profile"onclick="location.href='trabajos_index.php'"  ><i class="fa fa-tasks"  ></i></a><br>
      <a id="privacy"class="active"><i class="fa fa-address-book"></i></a>
     <a id="subscription" onclick="location.href='../../php/cerrar.php';" data-tooltip="Cerrar sesion" class="iconoss"><i class="fa fa-window-close"></i></a>
    </nav>
  </div>
  <div class="rightbox">
    <div class="privacy noshow">
      <h1>Avanzando contigo</h1>
    </div>   
    <div class="payment noshow">
      <h1>Estamos Enfocados</h1>
    </div> 
    <div class="profile">
      <h1>Empleados:</h1><br>
      <table class="empleadost" cellspacing="10px" width="500px">
      <tr>
        <strong>
      <th width="50px"><center><h2>ID</h2></center></th>
      <th><center><h2>NOMBRE</h2></center></th>
      <th><center><h2>CARGO</h2></center></th>
       <th><center><h2>RESULTADO AVANZANDO CONTIGO</h2></center></th>
    </strong>
      </tr>
      <?php
      include_once "../../php/conexion.php";
      $consulta= "SELECT * FROM empleados";
      $resultado= $conexion ->query ($consulta);
      while ($si = $resultado -> fetch()){
        if($si["admin"]==0){
          $cargo=$si['id_cargo'];
          $empleado_id=$si["id"];
          $nombres=$si["nombre"].' &nbsp '.$si["apellido"];

          $consulta1= "SELECT * FROM cargos WHERE id_cargo ='$cargo'";
          $resultado1= $conexion ->query ($consulta1);
          $va = $resultado1 -> fetch();

          $consulta2= "SELECT * FROM resultados WHERE id_trabajador ='$empleado_id'";
          $resultado2= $conexion ->query ($consulta2);
          $ra = $resultado2 -> fetch();
          $resulta =$ra["resultado"];

        echo'<tr><td><center><p>'.$empleado_id.'</p></center></td><td><center><p>'.ucwords($nombres).'</p></center></td>
        <td><center><p>'.$va["nombre_cargo"].'</p></center></td>
        <td><center><p>'.$resulta.'</p></center></td></tr>';
        }
 }
      ?>
    </table>
    </div>
  </div>
</div>

<!-- partial -->
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
