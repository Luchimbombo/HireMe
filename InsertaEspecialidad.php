	<?php
	

			$mysqli = new mysqli("localhost", "root", "administrador", "basedatoshireme");	
			$nom = $_GET['nombre'];
							
			$sql = $mysqli->query("insert into especialidad (NombreEspecialidad) values ('$nom') ");			
			
	?>	

		    <SCRIPT LANGUAGE="javascript"> 
            alert("Especialidad Registrada"); 
            </SCRIPT> 
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=VerEspecialidad.php">
