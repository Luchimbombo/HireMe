<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Formulario Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">
	<link rel="stylesheet" href="css/custom.css">
</head>
<body>
		<br><br>
		<div class="container">
		<a><img alt="" src="imagenes/hiremelogin.png"></a>
					<h1>Formulario de Login</h1>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 myform-cont">
					<div class="myform-top">
						<div class="myform-top-left">
							<h3>Ingresa a HireMe</h3>
								<p>Ingrese usuario y contraseña:</p>
						</div>
						<div class="myform-top-right">
							<i class="fa fa-key"></i>
						</div>
					</div>
					<div class="myform-bottom">
						<form method="post" action="logueame.php" name="form-ingreso">
							<div class="form-group">
								<input  type="text" maxlength="10" autofocus="autofocus" name="form_user" placeholder="Rut usuario..." class="form-control" id="form_user"  required oninput="checkRut(this)" >
							</div>
							<div class="form-group">
								<input type="password" name="form_password" maxlength="10" minlength="3" placeholder="Contraseña..." class="form-control" id="form_password" required="required">
							</div>

							<td style="margin: 0 auto;"> <button type="submit" class="mybtn">Entrar</button></td>
							<script src="js\validarRUT.js"></script>
							 <script>
								function justNumbers(e)
        						{
							       var keynum = window.event ? window.event.keyCode : e.which;
							       if ((keynum == 8) || (keynum == 46))
							       return true;

							       return /\d/.test(String.fromCharCode(keynum));
							    }
							</script>
							<br>
							<td><a href="#">¿Olvidó su Clave?</a></td>
						</form>
					</div>
				</div>
			</div>
		</div>



</body>
</html>
