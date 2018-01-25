<?php
	$especialidad=$_POST['nombreEspecialidad'];
	
	include("conexionbd.php");

	$sql_insertar="INSERT INTO especialidad SET NombreEspecialidad='$especialidad'";
    $conex->query($sql_insertar);
    if($conex->errno) die($conex->error);

    mysqli_close($conex);
?>
<script language = javascript>
	alert("Registrado correctamente")
	self.location = "VerEspecialidad.php" 
</script>