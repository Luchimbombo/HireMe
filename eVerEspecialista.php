<?php
session_start();
if (isset($_SESSION['nombre'])) {
    ?>

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
<?php
//Proceso de conexión con la base de datos
    $conex = mysql_connect("localhost", "root", "administrador")
    or die("No se pudo realizar la conexion");
    mysql_select_db("basedatoshireme", $conex)
    or die("ERROR con la base de datos");

//Iniciar Sesión
    session_start();

//Validar si se está ingresando con sesión correctamente
    if (!$_SESSION) {
        header("location:login.php");
    }
    ?>

<body>
  <header>

  </header>
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <a class="navbar-brand" href="pJefeProyecto.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="eVerEspecialista.php">Gestión de Especialistas</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Proyectos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jVerProyecto.php">Ver Proyectos</a></li>
          </ul>
        </li>
        <li><a href="#">Reportes</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jefe de Proyecto <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jVerMiCuenta.php">Ver Perfil</a></li>
            <li><a href="logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <div>
  <br><br>

    <h1>Listado de Especialistas</h1>

    <div >
    <div >
    <br >
      <a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Nuevo Especialista</a><br><br>
      <div class="myform-bottom">
      <table class='table ' align="center">
      <thead>
        <tr>
          <td>Rut</td><td>Nombre</td><td>Apellido</td><td>Correo</td><td><span class="glyphicon glyphicon-wrench"></span></td>
        </tr>
      </thead>
      <tbody>
<?php
$mysqli = new mysqli("localhost", "root", "administrador", "basedatoshireme");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        exit();
    }
    $consulta = "SELECT * FROM personas";
    if ($resultado = $mysqli->query($consulta)) {
        while ($fila = $resultado->fetch_row()) {
            echo "<tr>";
            echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td>";
            echo "<td>";
            echo "<a class='btn btn-info' href='#'><span class='glyphicon glyphicon-eye-open'></span>Ver</a>";
            echo "<a data-toggle='modal' data-target='#editUsu' data-rut='" . $fila[0] . "' data-nombre='" . $fila[1] . "' data-apellidop='" . $fila[2] . "' data-apellidom='" . $fila[3] . "' data-ciudad='" . $fila[4] . "' data-sexo='" . $fila[5] . "' data-cargo='" . $fila[7] . "' data-habilidad='" . $fila[8] . "' data-correo='" . $fila[9] . "' data-telefono='" . $fila[10] . "' data-password='" . $fila[11] . "' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";

            echo "<a class='btn btn-danger' href='EliminaEspecialista.php?id=" . $fila[0] . "'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";

            echo "</tr>";
        }
        $resultado->close();

    }
    $mysqli->close();

    ?>
      </tbody>
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
                       <form action="InsertarEspecialista.php" method="POST">
                          <div class="form-group">
                            <div class="form-group">
                            <label for="nombre">Rut:</label>
                            <input class="form-control" id="nombre" name="rut" type="text" placeholder="Insertar Rut" required="required"></input>
                          </div>
                            <label for="nombre">Nombre:</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Insertar Nombre" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="edad">Apellido paterno:</label>
                            <input class="form-control" id="edad" name="apellidop" type="text" placeholder="Insertar Apellido Paterno" required="required"></input>
                          </div>
                          <div class="form-group ">
                            <label for="edad">Correo:</label>
                            <input class="form-control" id="edad" name="apellidom" type="text" placeholder="Insertar Correo" required="required">
                          </div>
                          <div class="form-group">
                            <label for="direccion">Apellido Materno:</label>
                            <input class="form-control" id="direccion" name="ciudad" type="text" placeholder="Insertar Apellido Materno" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Ciudad:</label>
                            <input class="form-control" id="direccion" name="sexo" type="text" placeholder="Insertar Ciudad" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Fecha de Registro:</label>
                            <input class="form-control" id="direccion" name="cargo" type="text" placeholder="Insertar Fecha de Registro" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Cargo:</label>
                            <input class="form-control" id="direccion" name="habilidad" type="text" placeholder="Insertar Cargo" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Habilidad:</label>
                            <input class="form-control" id="direccion" name="correo" type="text" placeholder="Insertar Habilidad" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Telefono:</label>
                            <input class="form-control" id="direccion" name="telefono" type="text" placeholder="Insertar Telefono" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Password:</label>
                            <input class="form-control" id="direccion" name="password" type="text" placeholder="Insertar password" required="required"></input>
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
                            <div class="form-group">
                            <label for="nombre">Rut:</label>
                            <input class="form-control" id="rut" name="rut" type="text" placeholder="Insertar Nombre" required="required"></input>
                          </div>
                            <label for="nombre">Nombre:</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Insertar Nombre" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="edad">Apellido paterno:</label>
                            <input class="form-control" id="apellidop" name="apellidop" type="text" placeholder="Insertar Apellido" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="edad">Apellido materno:</label>
                            <input class="form-control" id="apellidom" name="apellidom" type="text" placeholder="Insertar Apellido Materno" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Ciudad:</label>
                            <input class="form-control" id="ciudad" name="ciudad" type="text" placeholder="Insertar Ciudad" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Sexo:</label>
                            <input class="form-control" id="sexo" name="sexo" type="text" placeholder="Insertar Sexo" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Cargo:</label>
                            <input class="form-control" id="cargo" name="cargo" type="text" placeholder="Insertar Cargo" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Habilidad:</label>
                            <input class="form-control" id="habilidad" name="habilidad" type="text" placeholder="Insertar Habilidad"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Correo:</label>
                            <input class="form-control" id="correo" name="correo" type="text" placeholder="Insertar Correo" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Telefono:</label>
                            <input class="form-control" id="telefono" name="telefono" type="text" placeholder="Insertar Telefono" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Password:</label>
                            <input class="form-control" id="password" name="password" type="text" placeholder="Insertar password" required="required"></input>
                          </div>

                  <input type="submit" class="btn btn-success" value="Actualizar Especialista">
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
      var recipient0 = button.data('rut')
      var recipient1 = button.data('nombre')
      var recipient2 = button.data('apellidop')
      var recipient3 = button.data('apellidom')
      var recipient4 = button.data('ciudad')
      var recipient5 = button.data('sexo')
      var recipient6 = button.data('cargo')
      var recipient7 = button.data('habilidad')
      var recipient8 = button.data('correo')
      var recipient9 = button.data('telefono')
      var recipient10 = button.data('password')
      var modal = $(this)
      modal.find('.modal-body #rut').val(recipient0)
      modal.find('.modal-body #nombre').val(recipient1)
      modal.find('.modal-body #apellidop').val(recipient2)
      modal.find('.modal-body #apellidom').val(recipient3)
      modal.find('.modal-body #ciudad').val(recipient4)
      modal.find('.modal-body #sexo').val(recipient5)
      modal.find('.modal-body #cargo').val(recipient6)
      modal.find('.modal-body #habilidad').val(recipient7)
      modal.find('.modal-body #correo').val(recipient8)
      modal.find('.modal-body #telefono').val(recipient9)
      modal.find('.modal-body #password').val(recipient10)
    });

  </script>

</body>
</html>
<?php
} else {
    ?>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
     <?php
}
?>