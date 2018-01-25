<?php 
include("conexionbd.php");

session_start();
//echo "aca voy a controlarlo ";
$rut = $_POST['rutPersona'];
//echo " area ".$rut;
$idpro = $_SESSION['idpro'];
//echo " codigopro ".$idpro;
$cargo = $_POST['cargoPerfil'];
$habilidad = $_POST['habilidadPerfil'];
//echo " cargo ".$cargo;
//echo " habilidad ".$habilidad;
$_SESSION['cargoPerfil'] = $cargo;
$_SESSION['habilidadPerfil'] = $habilidad;

	$sql_insertar="INSERT INTO solicitud SET estadoSolicitud='1', idProyecto='$idpro', rutPersona='$rut'";
    $conex->query($sql_insertar);
    if($conex->errno) die($conex->error);

    mysqli_close($conex);

//if (isset($_SESSION['idpro'])) {
//    session_write_close();
//    header('Location: jFiltrarEspecialista.php');
//    exit();
//}
?>

<script language = javascript>
	alert("Solicitud enviada")
	self.location = "jFiltrarEspecialista.php"
</script>