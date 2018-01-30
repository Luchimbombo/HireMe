<?php
//Iniciar Sesión

session_start();
if(isset($_SESSION['idpro'])){
	$codigo=$_SESSION['idpro'];
	
}
if (isset($_POST['idboton'])) {
    $codigo = $_POST['idboton'];
	$_SESSION['idpro']=$codigo;

}
//Proceso de conexión con la base de datos
$conex = mysql_connect("localhost", "root", "administrador")
or die("No se pudo realizar la conexion");
mysql_select_db("basedatoshireme", $conex)
or die("ERROR con la base de datos");

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION) {
    header("location:login.php");
}
?>
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
	<div class="col-md-8 col-md-offset-2 myform-cont">

	<?php
include "conexionbd.php";
//$dato = $_SESSION['id'];

//echo $dato;
//echo $_POST['idboton'];
//echo "asa ".$codigo." ess";
$sql_consultar = "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.rutJefeP, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP FROM proyectos p LEFT JOIN jefeproyecto j ON p.rutJefeP = j.rutJefeP WHERE p.IdProyecto = '" . $codigo . "'";
$resultados    = $conex->query($sql_consultar);
?>
		<br>
		<h1>Descripcion de Proyecto</h1>
		<br>

			<div class="myform-bottom">
			<table class="table">
			<thead>
				<tr>
						<th>Nombre de proyecto</th>
						<th>Descripcion proyecto</th>
						<th>Jefe de proyecto</th>
						<th>Cantidad necesaria</th>
					</tr>
			</thead>
				<?php
if (is_array($resultados) || is_object($resultados)) {
    foreach ($resultados as $fila) {
        ?>
					
					<tbody>
					<tr>
						<td><?php echo $fila['NombreProyecto']; ?></td>
						<td><?php echo $fila['DescripcionProyecto']; ?></td>
						<td><?php echo $fila['nombreJefeP'] . " " . $fila['apellidoJefeP']; ?></td>
						<td><?php echo $fila['CantNecesaria']; ?></td>
						<input type="hidden" name="idpro" id="idpro" value="<?php $fila['IdProyecto'];?>" />

					</tr>
					</tbody>
				<?php
$_SESSION['idpro'] = $fila['IdProyecto'];
    }
}

?>
			</table>
			</div></div>
<div class="col-md-8 col-md-offset-2 myform-cont">
		<h1>Perfiles</h1>
		<?php
include "conexionbd.php";

$sql_consultar2 = "SELECT * FROM perfil WHERE IdProyecto = '" . $codigo . "'";
$resultados2    = $conex->query($sql_consultar2);
?>

		<form method="post" action="jCrearPerfil.php" name="form-perfiles">
		<button type="submit" name="idboton" id="<?php echo $fila['IdProyecto']; ?>" value="<?php echo $fila['IdProyecto']; ?>" class="btn btn-success">Crear perfil</button>
		</form>
		<br>
		<div class="myform-bottom">

			<table class="table">
			<thead>
				<tr>
						<th>Area</th>
						<th>Cargo</th>
						<th>Remuneracion</th>
						<th>Habilidad</th>
					</tr>
			</thead>
				<?php
if (is_array($resultados2) || is_object($resultados2)) {
    foreach ($resultados2 as $fila2) {
        ?>
					<form method="post" action="jFiltrarEspecialista.php" name="form-perfiles">
					<tbody>
					<tr>
						<td><?php echo $fila2['areaPerfil']; ?></td>
						<td><?php echo $fila2['cargoPerfil']; ?></td>
						<input type="hidden" name="cargoPerfil" value="<?php echo $fila2['cargoPerfil']; ?>" />
						<td><?php echo $fila2['remuneracionPerfil']; ?></td>
						<td><?php echo $fila2['habilidadPerfil']; ?></td>
						<input type="hidden" name="habilidadPerfil" value="<?php echo $fila2['habilidadPerfil']; ?>" />
						<td><button type="submit" name="idboton2" id="<?php echo $fila['IdProyecto']; ?>" value="<?php echo $fila['IdProyecto']; ?>" class="btn btn-success">Buscar personal</button></td>

					</tr>
					</tbody>
					</form>
				<?php

    }
}

?>
			</table>
			</div>	</div>
			<div class="col-md-8 col-md-offset-2 myform-cont">
			<?php
include "conexionbd.php";
//$codigo        = $_POST['idboton'];
$sql_consultar = "SELECT p.rutPersona, p.nombrePersona, p.ApellidoPatPersona, p.CiudadPersona, p.CargoPersona, p.HabilidadPersona FROM personas p LEFT JOIN solicitud s ON p.rutPersona = s.rutPersona WHERE s.idProyecto = '" . $codigo . "' AND s.estadoSolicitud = '2'";
$resultados    = $conex->query($sql_consultar);
?>
			<h1>Personal Confirmado</h1>
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

                        </tr>
                        </thead>
                        <?php
if (is_array($resultados) || is_object($resultados)) {
    foreach ($resultados as $fila) {
        ?>
                                <form method="post" action="codigoBarra2.php" name="form-perfiles">
                                <tbody>
                                    <tr>
                                        <td><?php echo $fila['rutPersona']; ?></td>
                                        <input type="hidden" name="rutPersona" value="<?php echo $fila['rutPersona']; ?>" />
                                        <input type="hidden" name="nombrePersona" value="<?php echo $fila['nombrePersona']; ?>" />
                                        <input type="hidden" name="apellidoPersona" value="<?php echo $fila['ApellidoPatPersona']; ?>" />
                                        <td><?php echo $fila['nombrePersona']; ?></td>
                                        <td><?php echo $fila['ApellidoPatPersona']; ?></td>
                                        <td><?php echo $fila['CiudadPersona']; ?></td>
                                        <td><?php echo $fila['CargoPersona']; ?></td>
                                        <td><?php echo $fila['HabilidadPersona']; ?></td>
                                        <td><button type="submit" name="idboton3" id="<?php echo $fila['IdProyecto'];?>" value="<?php echo $fila['IdProyecto'];?>" class="btn btn-success">Generar Código </button></td>

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
</body>
</html>