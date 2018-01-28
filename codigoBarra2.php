<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>HireMe</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<?php
	include("conexionbd.php");
	session_start();
	$rut=$_POST['rutPersona'];
	$nombre=$_POST['nombrePersona'];
	$apellido=$_POST['apellidoPersona'];
	$nombreCompleto=$nombre." ".$apellido;
	$_SESSION['rut']=$rut;
?>

<body>		
	<header>
		
	</header>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="pJefeProyecto.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Proyectos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jVerProyecto.php">Ver Proyectos</a></li>
          </ul>
        </li>
        <li><a href="#">Reportes</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jefe de Proyecto <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Ver Perfil</a></li>
            <li><a href="logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<div class="col-sm-6 col-sm-offset-3 myform-cont">
		<h1>Crear Código</h1>
			<div class="myform-bottom">
			<form action="generarCodigo.php" method="POST">
				Nombre: <input type="text" name="nombre" value="<?php echo $nombreCompleto ?>" class="form-control" required readonly>
                </br>
                Código: <img src="php-barcode-master/barcode.php?text=<?php echo $rut ?>&size=40&codetype=Code39&print=true" name="fotoCodigo" id="fotoCodigo" />
                </br>
                <input type="hidden" name="rutPersona" value="<?php echo $rut; ?>" />
                <p>
                </p>
				<button type="submit" class="mybtn" value="Crear proyecto"> Generar Credencial
			</div>
            
	</div>
</body>
</html>