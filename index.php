<?php
//Proceso de conexión con la base de datos
$conex = mysql_connect("localhost", "root", "administrador")
		or die("No se pudo realizar la conexion con la bd");
	mysql_select_db("basedatoshireme",$conex)
		or die("ERROR con la base de datos");

//Iniciar Sesión
session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
	header("location:login.php");	
}


echo '<h1 align=center>Bienvenido usuario:'.$_SESSION["nombre"].'</h1>';
echo '<p align=center><a href="logout.php">Logout</a></p>';
echo '<p align=center><a href="pRepresentante.php">Pantalla Representante</a></p>';
echo '<p align=center><a href="pJefeProyecto.php">Pantalla Jefe de proyecto</a></p>';
echo '<p align=center><a href="PantallaEspecialistas.php">Pantalla Especialista</a></p>';
echo '<p align=center><a href="SolicitudJefe.php">Pantalla Solicitud Jefe</a></p>';
echo '<p align=center><a href="formulario.php">Pantalla Gestion</a></p>';

?>
