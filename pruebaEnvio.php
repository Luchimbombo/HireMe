<?php
session_start();
$idpro=$_SESSION['idpro'];

//Conexion BD

$conex = mysql_connect("localhost", "root", "administrador") 
or die("No se pudo realizar la conexion exitosamente");
mysql_select_db("basedatoshireme", $conex) 
or die("ERROR con la bd");

	
//Crear fecha actual

date_default_timezone_set('Chile/Continental');
$hoy=date_default_timezone_get();
$fecha=getdate();
$conv=array_merge((array)$fecha['year'],(array)$fecha['mon'], (array)$fecha['mday']);
$fechaHoy = implode("-", $conv);

//Bucle para recorrer lo enviado
foreach($_POST['datos'] as $valor)
{	

$sql2="INSERT INTO solicitud SET fechaSolicitud='$fechaHoy',
estadoSolicitud='1',
IdProyecto='$idpro',
idTrabajador='$valor'";
mysql_query($sql2);

}
?>
<script language = javascript>
	alert("Los datos han sido guardados y enviados exitosamente");
</script>
<?php 
header("location:eVerEspecialistaPrueba.php");
?>
header("location:login.php");
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>