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
//Proceso de conexión con la base de datos
$conex = mysql_connect("localhost", "root", "administrador")
or die("No se pudo realizar la conexion");
mysql_select_db("basedatoshireme", $conex)
or die("ERROR con la base de datos");

//Iniciar Sesión
session_start();
$codigo=$_SESSION['id'];

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION) {
    header("location:login.php");
}
?>
<body>
	<header>

	</header>
	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <a class="navbar-brand" href="pJefeProyecto.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      	<li><a href="eVerEspecialista.php">Gestión de Especialistas</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Proyectos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jVerProyecto.php">Ver Proyectos</a></li>
            <li><a href="#">Proyectos en Marcha</a></li>
          </ul>
        </li>
        <li><a href="#">Reportes</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jefe de Proyecto <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jVerMiCuenta.php">Ver Perfil</a></li>
            <li><a href="logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<div class="col-md-8 col-md-offset-2">
	<br>

	<?php
include "conexionbd.php";
$dato = $_SESSION['id'];
// echo $dato;
$sql_consultar = "SELECT * FROM jefeproyecto WHERE rutJefeP='$codigo'";
$resultados    = $conex->query($sql_consultar);

?>
		<br><br>
		<h1>Mi Cuenta</h1>
			<div class="myform-bottom">
			<table class="table" align="center">
				<thead>
				</thead>
				<?php

foreach ($resultados as $fila) {
    ?>
					<form method="post" action="#" name="form-lista">
					<tbody>
					<tr>
                    <td align="left">Foto</td>
                    <td></td>
                    <tr>
						<td align="left">Rut</td>
                        <td> <?php echo $fila['rutJefeP']; ?></td>
                        </tr><tr>
						<td align="left">Nombre</td>
                        <td><?php echo $fila['nombreJefeP']." ".$fila['apellidoJefeP']; ?></td></tr>
						<tr>
                        <td align="left">Especialidad</td>
                        <td><?php echo $fila['especialidadJefeP']; ?></td></tr>
						<?php // echo $fila['IdProyecto']?>
						<tr>
                        <td align="left"></td><td><button type="submit" name="idboton" id="<?php echo $fila['IdProyecto']; ?>" value="<?php echo $fila['IdProyecto']; ?>" class="btn btn-success">Editar Datos</button></td>
					</tr>
                    </tr>
					</tbody>
					</form>
				<?php
}

?>
			</table>
			</div>
	</div>

</body>
</html>