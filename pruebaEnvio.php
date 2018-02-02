<?php
session_start();
$idpro = $_SESSION['idpro'];

//Conexion BD

$conex = mysql_connect("localhost", "root", "administrador")
or die("No se pudo realizar la conexion exitosamente");
mysql_select_db("basedatoshireme", $conex)
or die("ERROR con la bd");

//Crear fecha actual

date_default_timezone_set('Chile/Continental');
$hoy      = date_default_timezone_get();
$fecha    = getdate();
$conv     = array_merge((array) $fecha['year'], (array) $fecha['mon'], (array) $fecha['mday']);
$fechaHoy = implode("-", $conv);

//Bucle para recorrer lo enviado
foreach ($_POST['datos'] as $valor) {

    $sql2 = "INSERT INTO solicitud SET fechaSolicitud='$fechaHoy',
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
</body>
</html>