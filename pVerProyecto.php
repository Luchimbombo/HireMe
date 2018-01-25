<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>HireMe</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>		
	<header>
		
	</header>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="pRepresentante.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Proyectos<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="pCrearProyecto.php">Crear Proyecto</a></li>
            <li><a href="pVerProyecto.php">Ver Proyectos</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Jefes de Proyecto<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="pCrearJefeProyecto.php">Registrar Jefe de Proyecto</a></li>
            <li><a href="pVerJefeProyecto.php">Ver Jefes de Proyectos</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Cargos<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="VerCargo.php">Gestionar de Cargos</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Habilidades<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="pCrearEspecialidad.php">Registrar Habilidad</a></li>
          	<li><a href="pVerEspecialidad.php">Ver Habilidades</a></li>
          </ul>
        </li>
        <li><a href="#">Reportes</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Representante <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Ver Perfil</a></li>
            <li><a href="logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>		
	<div class="col-md-8 col-md-offset-2 myform-cont">
	<br>

	<?php
		include("conexionbd.php");
		$sql_consultar= "SELECT p.NombreProyecto, p.DescripcionProyecto, p.rutJefeP, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP FROM proyectos p LEFT JOIN jefeproyecto j ON p.rutJefeP = j.rutJefeP ORDER BY p.nombreProyecto ASC;";
		$resultados=$conex->query($sql_consultar);
	?>
		<h1>Ver Proyectos</h1>
			<div class="myform-bottom">
			<table class="table">
			<thead>
				<tr>
						<th>Nombre de proyecto</th>
						<th>Descripcion proyecto</th>
						<th>Jefe de proyecto</th>
						<th>Cantidad de especialistas</th>
					</tr>
			<thead>
			<tbody>
				<?php
					foreach ($resultados as $fila){
				?>
					<tr>
						<td><?php echo $fila['NombreProyecto'];?></td>
						<td><?php echo $fila['DescripcionProyecto'];?></td>
						<td><?php echo $fila['nombreJefeP']." ".$fila['apellidoJefeP'];?></td>
						<td><?php echo $fila['CantNecesaria'];?></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</div>	
	</div>

</body>
</html>