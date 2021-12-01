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
      <a id="profile" onclick="location.href='perfiladmin.php'"><i class="fa fa-user"></i></a>
      <a id="profile" data-tooltip="Empleados" class="active"><i class="fa fa-tasks"  ></i></a><br><a id="privacy"onclick="location.href='empleados.php'"><i class="fa fa-address-book"></i></a>
      <a id="profile"  data-tooltip="Trabajos"onclick="location.href='trabajos_index.php'"><i class="fa fa-arrow-left"></i></a>
     <a id="subscription" onclick="location.href='../../php/cerrar.php';" data-tooltip="Cerrar sesion" class="iconoss"><i class="fa fa-window-close"></i></a>
    </nav>
  </div>
  <div class="rightbox">
    <div class="privacy noshow">
    </div> 
    <div class="profile" >
      <h1>Crear Trabajos En Equipo.</h1>
      <form method="post" action="../../php/trabajoingresar.php" >
        <h2>Nombre Del Trabajo: </h2>
        <input type="text" name="trabajo" autocomplete="off"><br><br>
        <h2>Descripcion Breve: </h2>
        <textarea name="descripcion"></textarea>
        <h2>Requisitos Para Participación: </h2>
        <br>
        <h2 class="titulos3">Cargo:</h2><br>
        <select name="cargo_trabajo">
          <?php
          require_once "../../php/conexion.php";
          $consulta= "SELECT * FROM cargos";
          $resultado= $conexion ->query ($consulta);
          while ($si = $resultado -> fetch()){
          echo'<option value="'.$si["id_cargo"].'">'.$si["nombre_cargo"].'</option>';
          }
          ?>
        </select>
        <br><br>
        <table cellpadding="5px">
          <tr>
            <th colspan="5">
              <center><h2 class="titulos3">Rango mínimo de casco:</h2></center>
            </th>
          </tr>
          <tr>
          <td><img src="../../img/cascorojo.png" class="icono"></td>          
          <td><img src="../../img/cascoamarillo.png"class="icono"></td>          
          <td><img src="../../img/cascoazul.png"class="icono"></td>
          <td><img src="../../img/cascoceleste.png"class="icono"></td>
          <td><img src="../../img/cascoverde.png"class="icono"></td>
          </tr>
          <tr>
          <td><center><input type="radio" name="casco" value="7"/></center></td>
          <td><center><input type="radio" name="casco" value="8"></center></td>
          <td><center><input type="radio" name="casco" value="13"/></center></td>
          <td><center><input type="radio" name="casco" value="19"></center></td>
          <td><center><input type="radio" name="casco" value="25"/></center></td>
          </tr>
      </table>
        <h2>Fecha Actual: </h2>
        <input type="date" name="fecha"><br><br>
        <input type="submit" name="Enviar" value="Enviar" class="enviar">
      </form>
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
    $(".icono").css("width","-=7.5px");
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
    $(".icono").css("width","+=7.5px");
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
  $(".icono").css("width","50px");
  size = 12;
  size = parseInt(size, 10);
  $( ".tamaño-actual" ).text(size);
}); 
  </script>

</body>
</html>