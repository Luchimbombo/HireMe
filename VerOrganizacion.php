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
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="pAdministrador.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="eVerEspecialista.php">Gestión de Especialistas</a></li>
        <li><a href="VerOrganizacion.php">Gestión de Organizaciones</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Ver Perfil</a></li>
            <li><a href="logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>		
	<div>
	<div class="col-sm-6 col-sm-offset-3 myform-cont">
	<br>
	
		<h1>Listado de Organizaciones</h1>

		<div >
		<div >		
		<br ><br >
			<a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Nueva Organización</a><br><br>
			<table class='table'>
			<thead>	
				<tr>
					<th>Id</th><th>Rut Organización</th><th>Nombre Organización</th><th>Página Web</th><th>Correo</th><th><span class="glyphicon glyphicon-wrench"></span></th>

				</tr>			
			<thead>	
<?php
			$mysqli = new mysqli("localhost", "root", "administrador","basedatoshireme");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT * FROM organizacion";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td>";	
					echo"<td>";						
				    echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-rut='" .$fila[1] ."' data-nombre='" .$fila[2] ."' data-pagina='" .$fila[3] ."' data-correo='" .$fila[4] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";	
				    echo "<td>";		
					echo "<a class='btn btn-danger' href='EliminaOrganizacion.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
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
                        <h4>Nueva Organización</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="InsertarOrganizacion.php" method="GET">              		
                       		<div class="form-group">
                       			<label for="rut">Rut de la Organizacion:</label>
                       			<input class="form-control" id="rut" name="rut" type="text" placeholder="Insertar Rut"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">Nombre de la Organización:</label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Insertar Nombre"> </input>
                       		</div>
                       		<div class="form-group">
                       			<label for="pagina">Pagina Web:</label>
                       			<input class="form-control" id="pagina" name="pagina" type="text" placeholder="Insertar pagina web"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="correo">Correo:</label>
                       			<input class="form-control" id="correo" name="correo" type="text" placeholder="Insertar Correo"></input>
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
                        <h4>Editar Organización</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="ActualizaOrganizacion.php" method="POST">                       		
                       		        
                       		        <input  id="id" name="id" type="hidden" ></input>   		
		                       		<div class="form-group">
		                       			<label for="rut">Rut de la Organizacion</label>
		                       			<input class="form-control" id="rut" name="rut" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="nombre">nombre</label>
		                       			<input class="form-control" id="nombre" name="nombre" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="pagina">Pagina Web</label>
		                       			<input class="form-control" id="pagina" name="pagina" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="correo">Correo</label>
		                       			<input class="form-control" id="correo" name="correo" type="text" ></input>
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
		  var recipient1 = button.data('rut')
		  var recipient2 = button.data('nombre')
		  var recipient3 = button.data('pagina')
		  var recipient4 = button.data('correo')
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #rut').val(recipient1)
		  modal.find('.modal-body #nombre').val(recipient2)
		  modal.find('.modal-body #pagina').val(recipient3)	
		  modal.find('.modal-body #correo').val(recipient4)	 
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