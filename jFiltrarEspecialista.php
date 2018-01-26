
	<!DOCTYPE html>
	<html lang="en">

		<meta charset="UTF-8">
		<script src="js/jquery-1.12.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/alertify.js"></script>
		<script language="JavaScript" src="../js/Filtrar.js"></script>

		<title>HireMe</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="js/css/alertify.css">
		<link rel="stylesheet" href="js/css/themes/default.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">
		<link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="css/estilos.css">


	<?php
//Proceso de conexión con la base de datos
$conex = mysql_connect("localhost", "root", "administrador")
or die("No se pudo realizar la conexion");
mysql_select_db("basedatoshireme", $conex)
or die("ERROR con la base de datos");

//Iniciar Sesión
session_start();
//    $_SESSION['idpro'] = $_POST['idboton'];

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION) {
    header("location:login.php");
}
?>

	<tbody >
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
	<?php
$idpro = $_SESSION['idpro'];

$cargo;
$habilidad;
if (!empty($_POST['cargoPerfil'])) {
    $cargo = $_POST['cargoPerfil'];

}
if (empty($_POST['cargoPerfil'])) {
    $cargo = $_SESSION['cargoPerfil'];

}
if (!empty($_POST['habilidadPerfil'])) {
    $habilidad = $_POST['habilidadPerfil'];

}
if (empty($_POST['habilidadPerfil'])) {
    $habilidad = $_SESSION['habilidadPerfil'];

}

include "conexionbd.php";
$codigo        = $_POST['idboton'];
$sql_consultar = "SELECT p.rutPersona, p.nombrePersona, p.ApellidoPatPersona, p.CiudadPersona, p.CargoPersona, p.HabilidadPersona FROM personas p LEFT JOIN solicitud s ON p.rutPersona = s.rutPersona WHERE s.idProyecto = '" . $idpro . "' AND s.estadoSolicitud = '1'";
$resultados    = $conex->query($sql_consultar);
?>
<div class="col-md-8 col-md-offset-2 myform-cont">
		<br><br>
		<h1>Pendientes</h1>
		<br>

			<div class="myform-bottom">
			<table class="table">
			<thead>
				<tr>
					<th>Rut</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Ciudad</th>
					<th>Cargo</th>
					<th>Habilidad</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<?php
if (is_array($resultados) || is_object($resultados)) {
    foreach ($resultados as $fila) {
        ?>
					<form method="post" action="cancelarSolicitud.php" name="form-perfiles">
					<tbody>
						<tr>
							<td><?php echo $fila['rutPersona']; ?></td>
							<input type="hidden" name="rutPersona" value="<?php echo $fila['rutPersona']; ?>" />
							<td><?php echo $fila['nombrePersona']; ?></td>
							<td><?php echo $fila['ApellidoPatPersona']; ?></td>
							<td><?php echo $fila['CiudadPersona']; ?></td>
							<td><?php echo $fila['CargoPersona']; ?></td>
							<td><?php echo $fila['HabilidadPersona']; ?></td>
							<td><button type="submit" name="idboton" id="<?php echo $idpro; ?>" value="<?php echo $idpro; ?>" class="btn btn-danger">Cancelar seleccion</button></td>
						</tr>
						</tbody>
						</form>
				<?php
}
}

?>
			</table>
			</div></div>
<div class="col-md-8 col-md-offset-2 myform-cont">
		<h1>Personal Encontrado</h1>
		<?php
include "conexionbd.php";
$codigo         = $_POST['idboton'];
$sql_consultar2 = "SELECT p.rutPersona, p.nombrePersona, p.ApellidoPatPersona, p.CiudadPersona, p.CargoPersona, p.HabilidadPersona FROM personas p LEFT OUTER JOIN solicitud s ON p.rutPersona = s.rutPersona WHERE s.rutPersona IS NULL AND  CargoPersona = '" . $cargo . "' AND HabilidadPersona = '" . $habilidad . "'";
$resultados2    = $conex->query($sql_consultar2);
?>

		<br>
		<div class="myform-bottom">
			<table class="table">
			<thead>
				<tr>
					<th>Rut</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Ciudad</th>
					<th>Cargo</th>
					<th>Habilidad</th>
					<th>Acciones</th>
				</tr>
			</thead>

				<?php
if (is_array($resultados2) || is_object($resultados2)) {
    foreach ($resultados2 as $fila2) {
        ?>
					<form method="post" action="enviarSolicitud.php" name="form-perfiles">
					<tbody>
						<tr>
							<td><?php echo $fila2['rutPersona']; ?></td>
							<input type="hidden" name="rutPersona" value="<?php echo $fila2['rutPersona']; ?>" />
							<td><?php echo $fila2['nombrePersona']; ?></td>
							<td><?php echo $fila2['ApellidoPatPersona']; ?></td>
							<td><?php echo $fila2['CiudadPersona']; ?></td>
							<td><?php echo $fila2['CargoPersona']; ?></td>
							<input type="hidden" name="cargoPerfil" value="<?php echo $cargo; ?>" />
							<td><?php echo $fila2['HabilidadPersona']; ?></td>
							<input type="hidden" name="habilidadPerfil" value="<?php echo $habilidad; ?>" />
							<td><button type="submit" name="idboton" id="<?php echo $idpro; ?>" value="<?php echo $idpro; ?>" class="btn btn-success">Seleccionar especialista</button></td>
						</tr>
					</tbody>
						</form>
				<?php
}
}

?>
			</table>
			</div>
	</div>
<br><br>
	</body>
</html>