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
      	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Especialistas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="eVerEspecialistaPrueba.php">Selección de Especialistas</a></li>
            <li><a href="#">#</a></li>
          </ul>
        </li>
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
			<?php
include "conexionbd.php";
//$codigo        = $_POST['idboton'];
$sql_consultar = "SELECT t.idTrabajador,t.rut, t.nombreCompleto, t.ciudad, t.cargo, t.fono FROM trabajador t LEFT JOIN solicitud s ON t.idTrabajador = s.idTrabajador WHERE s.IdProyecto = '" . $codigo . "' AND s.estadoSolicitud = '1'";
$resultados    = $conex->query($sql_consultar);
?>
			<h1>Cancelar solicitudes enviadas</h1>
                <br>

                <div class="myform-bottom">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Cargo</th>
                            <th>Fono</th>

                        </tr>
                        </thead>
                        <?php
if (is_array($resultados) || is_object($resultados)) {
    foreach ($resultados as $fila) {
        ?>
                                <form method="post" action="cancelarSolicitudPrueba.php" name="formCancelar" onSubmit="return pregunta()">
					<tbody>
						<tr>
							<td><?php echo $fila['rut']; ?></td>
							<input type="hidden" name="idTrabajador" value="<?php echo $fila['idTrabajador']; ?>" />
							<td><?php echo $fila['nombreCompleto']; ?></td>
							<td><?php echo $fila['ciudad']; ?></td>
							<td><?php echo $fila['cargo']; ?></td>
							<td><?php echo $fila['fono']; ?></td>
							<td><button type="submit" name="idboton1" id="<?php echo $idpro; ?>" value="<?php echo $idpro; ?>" class="btn btn-danger" >Cancelar seleccion</button></td>
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
			<div class="col-md-8 col-md-offset-2 myform-cont">
			<?php
include "conexionbd.php";
//$codigo        = $_POST['idboton'];
$sql_consultar = "SELECT t.rut, t.nombreCompleto, t.ciudad, t.cargo, t.fono FROM trabajador t LEFT JOIN solicitud s ON t.idTrabajador = s.idTrabajador WHERE s.IdProyecto = '" . $codigo . "' AND s.estadoSolicitud = '2'";
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
                            <th>Ciudad</th>
                            <th>Cargo</th>
                            <th>Fono</th>

                        </tr>
                        </thead>
                        <?php
if (is_array($resultados) || is_object($resultados)) {
    foreach ($resultados as $fila) {
        ?>
                                <form method="post" action="codigoBarra2.php" name="form-perfiles">
                                <tbody>
                                    <tr>
                                        <td><?php echo $fila['rut']; ?></td>
                                        <input type="hidden" name="rutPersona" value="<?php echo $fila['rut']; ?>" />
                                        <input type="hidden" name="nombrePersona" value="<?php echo $fila['nombreCompleto']; ?>" />
                                        
                                        <td><?php echo $fila['nombreCompleto']; ?></td>
                                        <td><?php echo $fila['ciudad']; ?></td>
                                        <td><?php echo $fila['cargo']; ?></td>
                                        <td><?php echo $fila['fono']; ?></td>
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
    </br>
    </br>
</body>
</html>
<script>
function pregunta(){  
    if(confirm("¿Realmente desea cancelar la solicitud?"))
    {
        alert('La cancelación de la solicitud se ha realizado con éxito')
		return true;
    }
	alert('Operación abortada')
    return false;
}
</script>