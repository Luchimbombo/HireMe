<?php

session_start();
if(isset($_SESSION['nombre']))
{
	$id = $_GET['id'];
	$mysqli = new mysqli("localhost", "root", "administrador", "basedatoshireme");		
	$sql = $mysqli->query("delete from personas where rutPersona='$id'");	
	echo "eliminado";
	echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=eVerEspecialista.php'>";
}
else
	{
			echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
	}		 

?>