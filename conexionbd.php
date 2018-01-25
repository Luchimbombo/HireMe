<?php 
	$servidor="localhost";
	$dbusuario="root";
	$dbpass="administrador";
	$dbnombre="basedatoshireme";

	$conex= new mysqli($servidor,$dbusuario,$dbpass,$dbnombre);
	if ($conex->connect_errno>0){
		die("imposible conectarse con la base de datos".$conex->connect_error);
	}
?>