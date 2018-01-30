<?php
session_start();

//Proceso de conexión con la base de datos
    $conex = mysql_connect("localhost", "root", "administrador")
    or die("No se pudo realizar la conexion exitosamente");
    mysql_select_db("basedatoshireme", $conex)
    or die("ERROR con la base de datos");

//Iniciar Sesión
    session_start();

//Validar si se está ingresando con sesión correctamente
    if (!$_SESSION) {
        header("location:login.php");
    }
	
if (isset($_SESSION['nombre'])) {
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.dataTables.min.css"/>
<script type="text/javascript" src="js/jquery.dataTables.min.js">
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <a class="navbar-brand" href="pJefeProyecto.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>
    </div>

</nav>

<div id="main2">
              <div >
              <table id="example" class="display" cellspacing="0" width="100%">
                
                 <!--  <table id="example" class="display" width="900" border="2" cellpadding="4" cellspacing="4" >-->
                  <thead>                  
                  <tr >
                   
                    <th width="45" align="center">Rut</th>
                    <th width="45" align="center">Nombre</th>
                    <th width="45" align="center">Número</th>
                    <th width="125" align="center">Cargo</th>
                    <th width="73" align="center">Dirección</th>
                   
                      <th width="73" align="center">Ciudad</th>
                       <th width="73" align="center">Examen Médico</th>
                       <th width="73" align="center">Inducción</th>
                       <th width="73" align="center">Talla</th>
                       <th width="73" align="center">Bloqueo</th>
                       <th width="73" align="center">F.Nacimiento</th>
                       <th width="73" align="center">Nacionalidad</th>
                       <th width="73" align="center">Salud</th>
                       <th width="73" align="center">Afp</th>
                  </tr>
                  </thead>
                  <?php
	   
	    $sql_consulta="select * from trabajador";
		$result_consulta=mysql_query($sql_consulta);
	   ?>
                  <?php
  
  while($Datos_productos=mysql_fetch_array($result_consulta))
		{
  ?>
                  <tr  class="alt">
                   
                    
                    <td align="center"><?php echo $Datos_productos['rut'];?></td>
                    <td align="center"> <?php echo $Datos_productos['nombreCompleto'];?></td>
                    <td align="center"><?php echo $Datos_productos['fono'];?></td>
                    <td align="center"><?php echo $Datos_productos['cargo'];?></td>
                   
                          <td align="center"><?php echo $Datos_productos['direccion'];?></td>
                           <td align="center"><?php echo $Datos_productos['ciudad'];?></td>
                           <td align="center"><?php echo $Datos_productos['venExamenMed'];?></td>
                           <td align="center"><?php echo $Datos_productos['venInduccion'];?></td>
                           <td align="center"><?php echo $Datos_productos['talla'];?></td>
                           <td align="center"><?php echo $Datos_productos['bloqueo'];?></td>
                           <td align="center"><?php echo $Datos_productos['fechaNacimiento'];?></td>
                           <td align="center"><?php echo $Datos_productos['Nacionalidad'];?></td>
                           <td align="center"><?php echo $Datos_productos['Salud'];?></td>
                           <td align="center"><?php echo $Datos_productos['afp'];?></td>
                  </tr>
                  <?php
   
		}
}
  ?>
                </table>
              </div>
            </div>
         


</body>
</html>