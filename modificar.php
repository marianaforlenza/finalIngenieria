

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<table>
    <tr><th>Código</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Stock actual</th>
    <th>Categoría</th> 
    </tr>
<?php
while($fila=mysqli_fetch_row($resultProdModificar)){
    ?><tr>
    <td><input type=text readonly name=codProd value='<?php echo $fila[0]?>'></td>
    <!-- <input type=hidden name=codigoB value='<?php echo $fila[0]?>'> -->
    <td><input type=text name=nombreB value='<?php echo $fila[1]?>'></td>
    <td><input type=number name=precioB value='<?php echo $fila[2]?>'></td>
    <td><input type=number readonly name=stockB value='<?php echo $fila[3]?>'></td>
    <td><input type=text name=categoriaB value='<?php echo $fila[4]?>'></td>
    </tr><br><br>
</table><br>

    Sumar stock<input type=number name=sumarStock value=0 >
    Restar stock<input type=number name=restarStock value=0><br>

    <div class=centrar><br>
    <input type=submit value="Guardar cambios">
    </div><br>

</form>
<?php
}
?>







</body>
</html>