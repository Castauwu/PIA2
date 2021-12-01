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
      <a id="profile" onclick="location.href='trabajos_index.php'"><i class="fa fa-arrow-left"></i></a>
     <a id="subscription" onclick="location.href='../../php/cerrar.php';" data-tooltip="Cerrar sesion" class="iconoss"><i class="fa fa-window-close"></i></a>
    </nav>
  </div>
  <div class="rightbox">
    <div class="profile" >
      <br>
      <h1>Trabajos En Equipo.</h1>
       </select>
      <table class="empleados" width="500px">
        <tr>
        <th><h2>Trabajo</h2></th>
        <th><h2>Fecha De Inicio</h2></th>
        <th><h2>Estado</h2></th>
        </tr>
            <?php
      include_once "../../php/conexion.php";
      $consulta= "SELECT * FROM trabajos_equipo";
      $resultado= $conexion ->query ($consulta);
      while ($si = $resultado -> fetch()){
        if($si["estado"]==0){
          $estado="v";
        }
        else{
          $estado="r";
        }
        echo '<tr><td><p>'.$si["trabajo"].'</p></td><td><p>'.$si["fecha"].'</p></td><td><center><div class="'.$estado.'"></div></center></td></tr>';
        }
        ?>
        </table>
        <br>
        <h2>Consultas Especificas:</h2>
        <form method="post" action="trabajoconsulta.php">
        <select name="trabajos_elect">
          <?php
          include_once "../../php/conexion.php";
      $consulta12= "SELECT * FROM trabajos_equipo";
      $resultado12= $conexion ->query ($consulta12);
      while ($si12 = $resultado12 -> fetch()){
         echo '<option value="'.$si12["id"].'">'.$si12["trabajo"].'</option>';
       }
         ?>
         <input type="submit" class="redirigir" id="regis" value="Consultar"/>
       </select>
     </form>
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