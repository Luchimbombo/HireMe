<?php

session_start();

	$mysqli = new mysqli("localhost", "root", "administrador", "basedatoshireme");	
	
	$id = $_POST['id'];
	$rut = $_POST['rut'];
	$nombre =  $_POST['nombre'];
	$pagina =  $_POST['pagina'];
	$correo =  $_POST['correo'];	

	$sql = $mysqli->query("update organizacion set RutOrganizacion='$rut', NombreOrganizacion='$nombre', PaginaWebOrganizacion='$pagina', CorreoOrganizacion='$correo' where idOrganizacion=$id");
?>	

	 <SCRIPT LANGUAGE="javascript"> 
         alert("Organización Actualizado"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=VerOrganizacion.php">


