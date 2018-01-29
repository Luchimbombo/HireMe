<?php 
session_start();
$idpro=$_SESSION['idpro'];

	$area=$_POST['areaPerfil'];
	$cargo=$_POST['cargoPerfil'];
	$remuneracion=$_POST['remuneracionPerfil'];
	$habilidad=$_POST['habilidadPerfil'];
	
	include("conexionbd.php");

	$sql_insertar="INSERT INTO perfil SET areaPerfil='$area', cargoPerfil='$cargo', remuneracionPerfil='$remuneracion', habilidadPerfil='$habilidad', idProyecto='$idpro'";
    $conex->query($sql_insertar);
    if($conex->errno) die($conex->error);

    mysqli_close($conex);
?>
<script language = javascript>
	alert("Perfil creado correctamente")
	self.location = "jBuscarEspecialistas.php" 
</script>