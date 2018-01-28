<?php

session_start();
$rut=$_POST['rutPersona'];

$conex = mysql_connect("localhost", "root", "administrador")
or die("No se pudo realizar la conexion");
mysql_select_db("basedatoshireme",$conex)
or die("ERROR con la base de datos");

include("conexionbd.php");

$sql_consultar= "SELECT * FROM personas where rutPersona='$rut'";?>
</br>
</br>
<?php 
$resultados=$conex->query($sql_consultar);
if (is_array($resultados) || is_object($resultados)){
	foreach ($resultados as $fila){
		echo "<font size=5>RUT: ".$fila['rutPersona']?> </font></br>
        <img src="<?php echo "imagenes/".$fila['foto'] ; ?>" class="img-responsive" alt="" style="max-width: 200px; max-height: 200px" > </br>
        <?php echo "Nombre: ".$fila['nombrePersona']." ".$fila['ApellidoPatPersona']." ".$fila['ApellidoMatPersona'] ?> </br>
        <?php echo "Ciudad: ".$fila['CiudadPersona'] ?> </br>
        <?php echo "Cargo: ".$fila['CargoPersona'] ?> </br>
        <?php echo "Habilidad: ".$fila['HabilidadPersona'] ?> </br>
        </br>
        </br>
        </br>
        
        <?php 
		}
		}
echo '<img src="php-barcode-master/barcode.php?text=';
echo $rut;
echo '&size=40&codetype=Code39&print=true" name="fotoCodigo" id="fotoCodigo" />'; 
		?>