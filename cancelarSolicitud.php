<?php 
include("conexionbd.php");

session_start();
//echo "aca voy a controlarlo ";
$rut = $_POST['rutPersona'];
//echo " area ".$rut;
$idpro = $_SESSION['idpro'];
//echo " codigopro ".$idpro;

	$sql_eliminar="DELETE FROM solicitud WHERE rutPersona='$rut'";
    $conex->query($sql_eliminar);
    if($conex->errno) die($conex->error);

    mysqli_close($conex);

//if (isset($_SESSION['idpro'])) {
//    session_write_close();
//    header('Location: jFiltrarEspecialista.php');
//    exit();
//}
?>
<script language = javascript>
	alert("Solicitud cancelada")
	self.location = "jFiltrarEspecialista.php"
</script>