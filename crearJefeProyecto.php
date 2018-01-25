<?php
	$rutjefe=$_POST['rutJefe'];
	$nombrejefe=$_POST['nombreJefe'];
	$apellidojefe=$_POST['apellidoJefe'];
	$especialidadjefe=$_POST['especialidadJefe'];
	
	include("conexionbd.php");

	$sql_insertar="INSERT INTO jefeproyecto SET rutJefeP='$rutjefe',nombreJefeP='$nombrejefe', apellidoJefeP='$apellidojefe', especialidadJefeP='$especialidadjefe'";
    $conex->query($sql_insertar);
    if($conex->errno) die($conex->error);

    mysqli_close($conex);
?>
<script language = javascript>
	alert("Registrado correctamente")
	self.location = "pCrearJefeProyecto.php" 
</script>