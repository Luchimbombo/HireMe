<?php
	include("conexionbd.php");
	$sql_listar= "SELECT * FROM jefeproyecto";
		$resultados=$conex->query($sql_listar);

?>