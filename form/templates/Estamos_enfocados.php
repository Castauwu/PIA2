<?php
session_start();
include_once "../../php/validation.php";
include_once "../../php/conexion.php";
$id=$_SESSION["id_usuario"];
$consulta="SELECT * FROM resultados WHERE id_trabajador = '$id'";
$resultado=$conexion ->query($consulta);
$data=$resultado -> fetch();
$_SESSION['if']=1;
$_SESSION['sumt']="toquelomifai";
if($data['solved_enfocados']==1){
  header("location:estamos_enfocados1.php");
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Form</title>
  <link rel="icon" type="image/gng" href="../../img/favicon.ico">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'><link rel="stylesheet" href="../static/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<?php
$a= $_SESSION['fondo'];
echo'<body style="background: linear-gradient(to right, #fff, '.$a.')">';
?><img src="../../img\logo-FC.png" class="logo" onclick="location.href='../../php/cerrar.php';" >
<div class="plus-button justify-content-center" role="toolbar" aria-label="Botones" >
    <a type="button" class="disminuir" ><i class="fa fa-minus" aria-hidden="true"></i></a><br> 
    <a type="button" class="aumentar"><i class="fa fa-plus" aria-hidden="true"></i></a><br>
    <a type="button" class="restablecer"><i class="fa fa-pause" aria-hidden="true"></i></a><br>
    <p class="tamaño-actual"></p>
</div><!-- partial:index.partial.html -->
<div class="container">
  <div id="logo"><h1 class="logo"></h1></div>
  <div class="leftbox">
    <nav>
      <a id="profile" data-tooltip="Perfil"onclick="location.href='perfil.php'"><i class="fa fa-user"></i></a>
      <a id="profile"data-tooltip="Trabajos en equipo"onclick="location.href='trabajos_usuario.php'"  ><i class="fa fa-address-book"  ></i></a>
      <a id="privacy" data-tooltip="Avanzando contigo" onclick="location.href='Avanzando_contigo.php'"><i class="fa fa-tasks"></i></a>
      <a id="payment"data-tooltip="Estamos enfocados" class="active"><i class="fa fa-tasks"></i></a>
     <a id="subscription" onclick="location.href='../../php/cerrar.php';" data-tooltip="Cerrar sesion" class="iconoss"><i class="fa fa-window-close"></i></a>
    </nav>
  </div>
  <div class="rightbox"> 
    <div class="profile noshow">
      <h1>Perfil</h1>
      <h2>Full Name</h2>
      <p>Julie Park <button class="btn">update</button></p>
      <h2>Birthday</h2>
      <p>July 21</p>
      <h2>Gender</h2>
      <p>Female</p>
      <h2>Email</h2>
      <p>example@example.com <button class="btn">update</button></p>
      <h2>Password </h2>
      <p>••••••• <button class="btn">Change</button></p>
    </div>
    <div class="privacy noshow">
      <h1>Avanzando contigo</h1>
    </div>   
    <?php
    $_SESSION['form']="enfocados";
    $b=$_SESSION['id_cargo'];

    switch ($b){
        case '1':
          include_once "formularios/1.php";
          break;
        case '2':
          include_once "formularios/2.php";;
          break;
        case'3':
          include_once "formularios/3.php";;
          break;
        case'4':
         include_once "formularios/4.php";;
          break;
      }
    ?>  
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
    $(".redirigir").css("font-size","-=2");
    $("form").css("font-size", "-=1.3px");
    $(".is-vertically-scrollable").css("height","-=50%");
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
    $(".redirigir").css("font-size","+=2");
    $("form").css("font-size", "+=1.3px");
    $(".is-vertically-scrollable").css("height","+=50%");
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
  $("form").css("font-size", "17px");
  $("a").css("font-size", "20px");
  $(".redirigir").css("font-size","10px");
  $(".is-vertically-scrollable").css("height","250%");
  $(".imgsita").css("width","44%");

  size = 12;
  size = parseInt(size, 10);
  $( ".tamaño-actual" ).text(size);
}); 
  </script>

</body>
</html>
