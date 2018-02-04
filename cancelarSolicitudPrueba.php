<?php 
include("conexionbd.php");

session_start();
//echo "aca voy a controlarlo ";
$idTrabajador = $_POST['idTrabajador'];

$sql_eliminar="DELETE FROM solicitud WHERE idTrabajador='$idTrabajador'";
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
	alert("Los datos han sido guardados y enviados exitosamente");
</script>
<?php
header ("Location: jBuscarEspecialistasPrueba.php")
?>