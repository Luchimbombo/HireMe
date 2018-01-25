<?php

session_start();

	$mysqli = new mysqli("localhost", "root", "administrador", "basedatoshireme");	
	
	$id = $_POST['id'];
	$nombre =  $_POST['nombre'];
	

	$sql = $mysqli->query("update cargo set NombreCargo='$nombre' where IdCargo=$id");
?>	

	 <SCRIPT LANGUAGE="javascript"> 
         alert("Cargo Actualizado"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=VerCargo.php">


