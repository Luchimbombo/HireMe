	<?php
	

			$mysqli = new mysqli("localhost", "root", "administrador", "basedatoshireme");	
			$nom = $_GET['rut'];
			$edad = $_GET['nombre'];
			$dir = $_GET['pagina'];
			$cor = $_GET['correo'];						
			$sql = $mysqli->query("insert into organizacion (RutOrganizacion, NombreOrganizacion, PaginaWebOrganizacion, CorreoOrganizacion) values ('$nom', '$edad', '$dir', '$cor') ");			
			
	?>	

		    <SCRIPT LANGUAGE="javascript"> 
            alert("Organizacion Registrada"); 
            </SCRIPT> 
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=VerOrganizacion.php">
