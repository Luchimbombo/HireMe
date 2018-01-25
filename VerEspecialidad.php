<?php
	session_start();
	if(isset($_SESSION['nombre']))
	{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>HireMe</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/estilos.css">
	<script src="js/metodos.js"></script>
</head>
<body>		
	<header>
		
	</header>
	<div class="sidebar">
		<h2><a href="pRepresentante.php">HireMe</a></h2>
		<ul>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"> Gestión de proyectos <scan class="caret"></scan></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="pCrearProyecto.php"> Crear proyecto</a></li>
					<li><a href="pVerProyecto.php"> Ver proyectos </a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"> Gestión de jefe de proyectos <scan class="caret"></scan></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="pCrearJefeProyecto.php"> Registrar jefe de proyecto</a></li>
					<li><a href="pVerJefeProyecto.php"> Ver jefe de proyectos </a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"> Gestión de cargos <scan class="caret"></scan></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="VerCargo.php"> Gestionar cargos</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"> Gestión de especialidad <scan class="caret"></scan></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="VerEspecialidad.php"> Ver Especialidades</a></li>
					<li><a href="pCrearEspecialidad.php"> Crear Especialidades</a></li>
				</ul>
			</li>
			<li><a href="#"></a>Reportes</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"> Cuenta <scan class="caret"></scan></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#"> Editar datos</a></li>
					<li><a href="logout.php"> Salir </a></li>
				</ul>
			</li>
		</ul>
	</div>	
	<div class="col-sm-6 col-sm-offset-3 myform-cont">
	<br>
	
		<h1>Listado de Especialidades</h1>

		<div >
		<div >		
		<br ><br >
			<a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Nueva Especialidad</a><br><br>
			<table class='table table-bordered'>
				<tr>
					<th>Nombre de Especialidad</th><th><span class="glyphicon glyphicon-wrench"></span></th>
				</tr>			
<?php
			$mysqli = new mysqli("localhost", "root", "administrador","basedatoshireme");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT * FROM especialidad";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[1]</td>";	
					echo"<td>";						
				    echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-nombre='" .$fila[1] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";	
				    echo "<td>";		
					echo "<a class='btn btn-danger' href='EliminaEspecialidad.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";
							
					echo "</td>";
					echo "</tr>";
				}
				$resultado->close();
			}
			$mysqli->close();			
			
	

?>
	        </table>
		</div> 



		<div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nueva Especialidad</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="InsertaEspecialidad.php" method="GET">              		
                       		<div class="form-group">
                       			<label for="nombre">Nombre de Especialidad:</label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Insertar Especialidad"></input>
                       		</div>

							<input type="submit" class="btn btn-success" value="Ingresar">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 

        <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Cargo</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="ActualizaEspecialidad.php" method="POST">                       		
                       		        
                       		        <input  id="id" name="id" type="hidden" ></input>   		
		                       		<div class="form-group">
		                       			<label for="nombre">Mombre de la Especialidad</label>
		                       			<input class="form-control" id="nombre" name="nombre" type="text" ></input>
		                       		</div>
		                       		

									<input type="submit" class="btn btn-success">							
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 



	</div>
	
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget)
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('nombre')
		  
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #nombre').val(recipient1)
		   
		});
		
	</script>
	
</body>
</html>
<?php
	}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
		 <?php
	}
?>