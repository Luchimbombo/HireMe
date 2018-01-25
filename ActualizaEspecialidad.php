<?php

session_start();

	$mysqli = new mysqli("localhost", "root", "administrador", "basedatoshireme");	
	
	$id = $_POST['id'];
	$nombre =  $_POST['nombre'];
	

	$sql = $mysqli->query("update Especialidad set NombreEspecialidad='$nombre' where IdEspecialidad=$id");
?>	

	 <SCRIPT LANGUAGE="javascript"> 
         alert("Especialidad Actualizada"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=VerEspecialidad.php">


