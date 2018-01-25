	<?php
	

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
			$sql = $mysqli->query("insert into personas (rutPersona, nombrePersona, ApellidoPatPersona, ApellidoMatPersona, CiudadPersona, Sexo, CargoPersona, HabilidadPersona, CorreoPersona, TelefonoPersona, PasswordPersona) values ('$rut', '$nom', '$apep', '$apem', '$ciu', '$sex', '$cargo', '$habilidad', '$correo', '$telefono', '$pass') ");			
			
	?>	

		    <SCRIPT LANGUAGE="javascript"> 
            alert("Especialista Registrado"); 
            </SCRIPT> 
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=eVerEspecialista.php">
