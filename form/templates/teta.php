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
<?php
$a= $_SESSION['fondo'];
echo'<body style="background: linear-gradient(to right, #fff, '.$a.')">';
?>
<img src="../../img\logo-FC.png" class="logo" onclick="location.href='../../php/cerrar.php';" ><div class="plus-button justify-content-center" role="toolbar" aria-label="Botones" >
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
      <a id="profile"data-tooltip="Perfil"onclick="location.href='perfil.php'" ><i class="fa fa-user"></i></a>
      <a id="profile" data-tooltip="Trabajos en equipo"class="active"><i class="fa fa-address-book"  ></i></a>
      <a id="privacy" data-tooltip="Avanzando contigo"onclick="location.href='Avanzando_contigo.php'"><i class="fa fa-tasks"></i></a>
      <a id="payment"data-tooltip="Estamos enfocados" onclick="location.href='Estamos_enfocados.php'"><i class="fa fa-tasks"></i></a>
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
    <div class="profile" >
      <h1>Trabajos En Equipo</h1>
      <?php
      require_once "../../php/conexion.php";
      $a=$_SESSION['id_usuario'];
      $tetano=$_POST['trabajo'];

      $consulta= "SELECT * FROM trabajos_empleados WHERE id_trabajo='$tetano'";
      $resultado= $conexion ->query ($consulta);
      
      $asereje=0;
      while ($si = $resultado -> fetch()){
        $pepa=$si["id_empleado"];
        
        $consul="SELECT * FROM coevaluacion WHERE id_evaluado = :pepa and id_evaluador=:a";
        $resulp= $conexion->prepare($consul);
        $resulp -> execute(array(
          ':pepa' => $pepa,
          ':a' => $a,
        ));
        $cuenta = $resulp ->rowCount(); 

        $consulta1= "SELECT * FROM empleados WHERE id='$pepa'";
        $resultado1= $conexion ->query ($consulta1);
        $si1 = $resultado1 -> fetch();
        
        $c=$si1["nombre"];
        $d=$si1["apellido"];
        
        if($a != $pepa and $cuenta != 1){
        
        $asereje=1;
        
        echo '<h2>Nombre</h2>';
        echo '<form method="post" action="coevaluacion.php"  class="">';

        echo '<input id="5" type="radio" name="persona" value="'.$pepa.'" required/>'.ucwords($c).' '.ucwords($d).'</a><br><br>';
        }
        }
      if($asereje == 0){
      echo'<h1>No Hay Coincidencias Con Su Trabajo</h1>';
      }
      else{
        echo'<input type="submit" class="enviar">';
      }
      ?>
    </div>
  </div>
</div>
<div class="container2">
  <?php 
  $id=$_SESSION["id_usuario"]; 

$cnslt="SELECT * FROM resultados WHERE id_trabajador='$id'";
$rslt=$conexion -> query($cnslt);
$data=$rslt -> fetch();

if($data['resultado'] =="..."){   
  $casco="'../../img/casco.png'";
  }

if ($data['resultado']>6 && $data['resultado'] <= 7 ){
  $casco="'../../img/cascorojo.png'";
  
} 
if ($data['resultado'] >=8 && $data['resultado'] <= 13){
  $casco="'../../img/cascoamarillo.png'";
  
}
if ($data['resultado'] > 13 && $data['resultado'] <= 19){
  $casco="'../../img/cascoazul.png'";
  
}
if ($data['resultado'] > 19 && $data['resultado'] <= 25){
  $casco="'../../img/cascoceleste.png'";
  
} 
if ($data['resultado'] >25){
  $casco="'../../img/cascoverde.png'";
  
}

$_SESSION['casco']=$casco;
echo '<div class="profile"><h1 class="unu">Tu casco actual</h1></div><br>';
echo '<img src='.$_SESSION['casco'].' class="imgsita">';
  
  ?>

  
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