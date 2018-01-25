<?php 
echo "aca voy a controlarlo ";
$carguito = $_POST['areaPerfil'];
echo " area ".$carguito;
$idpro = $_POST['idboton'];
echo " codigopro ".$idpro;
?>

<?php
	$area=$_POST['areaPerfil'];
	$cargo=$_POST['cargoPerfil'];
	$remuneracion=$_POST['remuneracionPerfil'];
	$habilidad=$_POST['habilidadPerfil'];
	$idpro = $_POST['idboton'];
	
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