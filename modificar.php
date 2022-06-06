<?php
session_start();
if(isset($_SESSION['usu'])){

$usu=$_SESSION['usu'];
 $nomyape=$_SESSION['nombre'];  
}
else{
echo "Acceso No Autorizado. Debe iniciar Sesion";
echo '<meta http-equiv-"Refresh" content="2; url=index.php>';
exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="general.css">

    <title>Document</title>
</head>
<body>

<?php
$prodModificar = $_POST['selec'];

require "conexion.php";
    $con=mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die("no se pudo conectar a la BD");
    $sqlModificarProd="select * from productos where CodProducto='$prodModificar'";
    $resultProdModificar =mysqli_query($con, $sqlModificarProd);



?>

<form action=guardarCambios.php method=post>

<table class="tab">
    <tr><th>Código</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Stock actual</th>
    <th>Categoría</th>
    <th>Marca</th> 
    </tr>
<?php
while($fila=mysqli_fetch_row($resultProdModificar)){
    ?><tr>
    <td><input type=text readonly name=codProd value='<?php echo $fila[0]?>'></td>  <!-- Columna Código Producto -->
    <td><input type=text name=nombreB maxlength="45" minlength="2" value='<?php echo $fila[1]?>'></td>   <!-- Columna Nombre -->
    <td><input type=text name=precioB pattern="^\d*(\.\d{0,2})?$" min= 1 maxlength="9" value='<?php echo $fila[2]?>'></td> <!-- Columna Precio -->
    <td><input type=text readonly name=stockB value='<?php echo $fila[3]?>'></td> <!-- Columna Stock -->
    <!-- Columna Categoría -->
    <?php
    $sqlBuscar_Cat = "select * from tipo_productos where idTIPO_PRODUCTOS = '$fila[4]'";
    $recordset_Cat = mysqli_query($con, $sqlBuscar_Cat);
    $registro_Cat = mysqli_fetch_row($recordset_Cat);
    $id_Cat = $registro_Cat[0];
    $detalle_Cat = $registro_Cat[1];
    ?>

    <td><select name="categoriaB">
    <?php
    $getTipoProd1 = "select * from tipo_productos";
    $getTipoProd2 = mysqli_query($con, $getTipoProd1);
    while($row1 = mysqli_fetch_array($getTipoProd2))
    {
        $idTIPO_PRODUCTOS = $row1['idTIPO_PRODUCTOS'];
        $descripcion1 = $row1['descripcion'];
        if($idTIPO_PRODUCTOS == $id_Cat){
            $selected = "selected";
        }else{
            $selected = "";
        }
    ?>
    <option value="<?php echo $idTIPO_PRODUCTOS;?>" <?php echo $selected ?>> <?php echo $descripcion1 ?> </option>
    <?php
    }
    ?>
</select>
</td>

<!-- Columna Marca -->
    <?php
    $sqlBuscar_Marca = "select * from productos_has_marcas where PRODUCTOS_CodProducto = '$fila[0]'";
    $recordset_Marca = mysqli_query($con, $sqlBuscar_Marca);
    $registro_Marca = mysqli_fetch_row($recordset_Marca);
    $sqlBuscar_Marca2 = "select * from marcas where nroMarca = '$registro_Marca[1]'";
    $recordset_Marca2 = mysqli_query ($con, $sqlBuscar_Marca2);
    $registro_Marca2 = mysqli_fetch_row($recordset_Marca2);
    $idMarca = $registro_Marca2[0];
    $detalle_Marca = $registro_Marca2[1];
    ?>

    <td><select name="marcaB">
    <?php
    $getMarcas1 = "select * from marcas";
    $getMarcas2 = mysqli_query($con, $getMarcas1);
    while($row = mysqli_fetch_array($getMarcas2))
    {
      $nroMarca = $row['nroMarca'];
      $descripcion = $row['descripcion'];
      if($nroMarca == $idMarca){
        $selected = "selected";
    }else{
        $selected = "";
    }
    ?>
    <option value="<?php echo $nroMarca; ?>" <?php echo $selected ?>> <?php echo $descripcion ?> </option>
    <?php
    }
    ?>
    </select>
    </td>



</tr><br><br>
</table><br>

<br>
<br>
<div class="divCol2">
    <label class="ne">Sumar Stock: </label><input type=text pattern="[0-9]{1,4}" min= 0 maxlength="4" name=sumarStock value=0 required>
    <label class="ne">Restar Stock: </label><input type=text pattern="[0-9]{1,4}" min= 0 maxlength="4" name=restarStock value=0 required><br>

    <div class=centrar><br>
    <input class="bott2" type=submit value="Guardar cambios">
    </div><br>
</div>


</form>
 
 
 
<?php
}
?>

<a href=menu.php><input class=bott type=button value="Volver"></a> <br><br><br> </form>
</body>
</html>
