 <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>HMV-EMPLEADOS</title>
  <link rel="icon" type="image/gng" href="img/favicon.ico">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="css/style.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'>
<script type="text/javascript" src="js/main.js"></script>

</head>
<body>
	<img src="img\logo-FC.png" class="logo" onclick="location.href='php/cerrar.php';" >
<center>
<div class="tm-page-header">
          
        </div>	
      </center>
<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>INICIO DE SESIÓN</span><span>REGISTRO</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">INICIO</h4>
											<div class="form-group">
												<form method="post"action="php/ingreso.php">
												<input type="text" name="logemail" class="form-style" placeholder="*E-mail" id="email" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="logpass" class="form-style" placeholder="*Contraseña" id="contrasena" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
												<input type="submit" class="btn mt-4" id="regis" value="ingresar"/>
												</form>
                            				<p class="mb-0 mt-4 text-center"><a href="#0" class="link">¡Gracias por estás con nosotros!</a></p>
                            				 <a id="profile" onclick="location.href='index.html'"><i class="fa fa-arrow-left"></i></a>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">REGISTRO</h4>
											<div class="form-group">
												<form method="post"action="php/registro.php">
												<input type="text" name="logname" class="form-style" placeholder="*Nombre Admin" id="usuario" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="logcor" class="form-style" placeholder="*Contraseña Admin" id="emailRegistro" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="text" name="logpass" class="form-style" placeholder="*Nombre empleado" id="contraRegistro" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>
											<div class="form-group mt-2">
												<input type="text" name="apellido" class="form-style" placeholder="*Apellido empleado" id="confirmarRegistro" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div> 	
											<div class="form-group mt-2">
												<input type="password" name="logpass2" class="form-style" placeholder="*Contraseña empleado" id="confirmarRegistro" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>

											<div class="form-group mt-2">
												  <p>
												    Cargo:
												    <select name="cargo" method="post"action="php/registro.php">
												    	<?php
												    	require_once "php/conexion.php";
												    	$consulta = "SELECT * from cargos";
															$resultado1 = $conexion -> query ($consulta);
															while ($cont = $resultado1 -> fetch()){
															echo'<option>'.$cont["id_cargo"].'<p> '.$cont["nombre_cargo"].'</p></option>';
															}
												      ?>
												    </select>
												  </p>
											<input type="submit" class="btn mt-4" id="regis" value="registrar"/>
											</div>
											</form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
  <script  src="./script.js"></script>

</body>
</html>