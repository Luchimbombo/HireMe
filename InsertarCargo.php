	<?php
	

			$mysqli = new mysqli("localhost", "root", "administrador", "basedatoshireme");	
			$nom = $_GET['nombre'];
							
			$sql = $mysqli->query("insert into cargo (NombreCargo) values ('$nom') ");			
			
	?>	

		    <SCRIPT LANGUAGE="javascript"> 
            alert("Cargo Registrado"); 
            </SCRIPT> 
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=VerCargo.php">
