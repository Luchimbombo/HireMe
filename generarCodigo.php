<?php

session_start();

if(!empty($_SESSION['rutPersonaElegida'])){
	$codigo=$_SESSION['rutPersonaElegida'];
	
}
if (!empty($_POST['rutPersona'])) {
    $codigo = $_POST['rutPersona'];
	$_SESSION['rutPersonaElegida']=$codigo;
	unset($_POST['rutPersona']);
}


$conex = mysql_connect("localhost", "root", "administrador")
or die("No se pudo realizar la conexion");
mysql_select_db("basedatoshireme",$conex)
or die("ERROR con la base de datos");

include("conexionbd.php");

$sql_consultar= "SELECT * FROM trabajador where rut='$codigo'";?>
</br>
</br>
<?php 
$resultados=$conex->query($sql_consultar);
if (is_array($resultados) || is_object($resultados)){
	foreach ($resultados as $fila){
		echo "<font size=5>RUT: ".$fila['rut']?> </font></br>
        <img src="<?php echo "imagenes/".$fila['foto'] ; ?>" class="img-responsive" alt="" style="max-width: 200px; max-height: 200px" > </br>
        <?php echo "Nombre: ".$fila['nombreCompleto'] ?> </br>
        <?php echo "Ciudad: ".$fila['ciudad'] ?> </br>
        <?php echo "Cargo: ".$fila['cargo'] ?> </br>
        <?php echo "fono: ".$fila['fono'] ?> </br>
        </br>
        </br>
        </br>
        
        <?php 
		}
		}
echo '<img src="php-barcode-master/barcode.php?text=';
echo $codigo;
echo '&size=40&codetype=Code39&print=true" name="fotoCodigo" id="fotoCodigo" />'; 
		?>
		</br>
        </br>
        </br>
        <a href=jVerProyecto.php>Volver</a>