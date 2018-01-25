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
				<a href="#"  role="button"> Gestión de Solicitudes </a>
				<ul class="dropdown-menu" role="menu">
					
				</ul>
			</li>
			<li><a href="#"></a>Reportes</li>
			<li class="dropdown">
				<a href="logout.php" class="dropdown-toggle" data-toggle="dropdown" role="button"> Salir <scan class="caret"></scan></a>
			</li>
		</ul>
	</div>	
	<div class="col-sm-6 col-sm-offset-3 myform-cont">
	<br>
	
		<h1>Listado de Especialistas</h1>

		<div >
		<div >		
		<br ><br >
			<table class='table table-bordered'>
				<tr>
					<th>Id</th><th>Nombre</th><th>Edad</th><th>Direccion</th><th><span class="glyphicon glyphicon-user"></span></th>
				</tr>			
<?php
			$mysqli = new mysqli("localhost", "root", "administrador", "basedatoshireme");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT * FROM tbcontactos";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td>";	
					echo"<td>";						
				    echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-nombre='" .$fila[1] ."' data-edad='" .$fila[2] ."' data-direccion='" .$fila[3] ."' class='btn btn-warning'></span>Ver Perfil</a> ";	
				    echo "<a class='btn btn-danger'>Pre Seleccionar</a>";			
					
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
                        <h4>Nuevo Especialista</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="InsertarEspecialista.php" method="GET">              		
                       		<div class="form-group">
                       			<label for="nombre">Nombre:</label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Insertar Nombre"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="edad">Edad:</label>
                       			<input class="form-control" id="edad" name="edad" type="text" placeholder="Insertar Edad"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="direccion">Dirección:</label>
                       			<input class="form-control" id="direccion" name="direccion" type="text" placeholder="Insertar Dirección"></input>
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
                        <h4>Editar Especialista</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="ActualizaEspecialista.php" method="POST">                       		
                       		        
                       		        <input  id="id" name="id" type="hidden" ></input>   		
		                       		<div class="form-group">
		                       			<label for="nombre">Nombre</label>
		                       			<input class="form-control" id="nombre" name="nombre" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="edad">Edad</label>
		                       			<input class="form-control" id="edad" name="edad" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="direccion">Direccion</label>
		                       			<input class="form-control" id="direccion" name="direccion" type="text" ></input>
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
		  var recipient2 = button.data('edad')
		  var recipient3 = button.data('direccion')
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #nombre').val(recipient1)
		  modal.find('.modal-body #edad').val(recipient2)
		  modal.find('.modal-body #direccion').val(recipient3)		 
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