<?php

session_start();

	$mysqli = new mysqli("localhost", "root", "administrador", "basedatoshireme");	
	
	$rut = $_POST['rut'];
			$nom = $_POST['nombre'];
			$apep = $_POST['apellidop'];
			$apem = $_POST['apellidom'];
			$ciu = $_POST['ciudad'];
			$sex = $_POST['sexo'];
			$cargo = $_POST['cargo'];
			$habilidad = $_POST['habilidad'];
			$correo = $_POST['correo'];
			$telefono = $_POST['telefono'];
			$pass = $_POST['password'];	

	$sql = $mysqli->query("update personas set rutPersona='$rut', nombrePersona='$nom', ApellidoPatPersona='$apep', ApellidoMatPersona='$apem', CiudadPersona='$ciu', Sexo='$sex', CargoPersona='$cargo', HabilidadPersona='$habilidad', CorreoPersona='$correo', TelefonoPersona='$telefono', PasswordPersona='$pass' where rutPersona=$rut");
?>	

	 <SCRIPT LANGUAGE="javascript"> 
         alert("Contacto Actualizado"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=eVerEspecialista.php">


