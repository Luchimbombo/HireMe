<?php
//Recibimos los datos enviados desde el formulario
$user= $_POST['form_user'];
$password= $_POST['form_password'];

if(isset($user)){
 
  //Proceso de conexión con la base de datos
  $conex= mysql_connect("localhost","root","administrador")
    or die("No se pudo realizar la conexion");
  mysql_select_db("basedatoshireme",$conex)
    or die("ERROR con la base de datos");
  
  //Inicio de variables de sesión
    session_start();
  
  //Consultar si los datos son están guardados en la base de datos
  $consulta= "SELECT * FROM personas WHERE rutPersona='$user' AND PasswordPersona='$password'"; 
  $resultado= mysql_query($consulta,$conex) or die (mysql_error());
  $fila=mysql_fetch_array($resultado);

  $consulta2= "SELECT * FROM jefeproyecto WHERE rutJefeP='$user' AND passwordJefe='$password'"; 
  $resultado2= mysql_query($consulta2,$conex) or die (mysql_error());
  $fila2=mysql_fetch_array($resultado2);

  $consulta3= "SELECT * FROM representante WHERE rutRepresentante='$user' AND passwordRepresentante='$password'"; 
  $resultado3= mysql_query($consulta3,$conex) or die (mysql_error());
  $fila3=mysql_fetch_array($resultado3);

  $consulta4= "SELECT * FROM administrador WHERE rutAdmin='$user' AND passAdmin='$password'"; 
  $resultado4= mysql_query($consulta4,$conex) or die (mysql_error());
  $fila4=mysql_fetch_array($resultado4);
  
  //OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
  if (!empty($fila[rutPersona])){ 
    header("location:index.php"); 
    $_SESSION['id'] = $fila['rutPersona'];
    $_SESSION['nombre'] = $fila['nombrePersona'];
    } 

  if (!empty($fila2[rutJefeP])) {
    header("location:pJefeProyecto.php");
    $_SESSION['id'] = $fila2['rutJefeP'];
    $_SESSION['nombre'] = $fila2['nombreJefeP'];
    }

  if (!empty($fila3[rutRepresentante])) {
    header("location:pRepresentante.php");
    $_SESSION['id'] = $fila3['rutRepresentante'];
    $_SESSION['nombre'] = $fila3['nombreRepresentante'];
    }

  if (!empty($fila4[rutAdmin])) {
    header("location:pAdministrador.php");
    $_SESSION['id'] = $fila4['rutAdmin'];
    $_SESSION['nombre'] = $fila4['nombreAdmin'];
    }


  if ((empty($fila[rutPersona]))&&(empty($fila2[rutJefeP]))&&(empty($fila3[rutRepresentante]))&&(empty($fila4[rutAdmin]))){
    header("location:login.php");
    } 
  }
?>