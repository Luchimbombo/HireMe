<?php
	$nombreproyecto=$_POST['nombreproyecto'];
	$descproyecto=$_POST['descproyecto'];
	$jefeproyecto=$_POST['rutJefe'];
	$cantidad=$_POST['cantproyecto'];
	
	include("conexionbd.php");

	$sql_insertar="INSERT INTO proyectos SET NombreProyecto='$nombreproyecto',DescripcionProyecto='$descproyecto', rutJefeP='$jefeproyecto', CantNecesaria='$cantidad'";
    $conex->query($sql_insertar);
    if($conex->errno) die($conex->error);

    mysqli_close($conex);
?>
<script language = javascript>
	alert("Proyecto registrado correctamente")
	self.location = "pCrearProyecto.php" 
</script>
