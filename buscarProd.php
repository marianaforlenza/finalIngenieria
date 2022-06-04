


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
    $codigoBuscado=$_GET['buscarProd'];
    //echo "el producto buscado es $apellidoB<br>";
    require "conexion.php";
    $con=mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die("no se pudo conectar a la BD");

    $sqlBuscarCodigo="select * from productos where CodProducto='$codigoBuscado'";

    $resultcodigoBuscado=mysqli_query($con, $sqlBuscarCodigo);

    if(mysqli_affected_rows($con)>0){
        echo "producto encontrado con el codigo $codigoBuscado<br><br>";
    }
    else{
        echo "<h3>No se encontró producto con el código $codigoBuscado<h3><br><br>";
    }
?>

<form action=guardarCambiosProd.php method=post>

<table>
    <tr><th>Código</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Stock actual</th>
    <th>Categoría</th> 
    </tr>
<?php
while($fila=mysqli_fetch_row($resultcodigoBuscado)){
    ?><tr>
    <td><?php echo $fila[0]?></td>
    <!-- <input type=hidden name=codigoB value='<?php echo $fila[0]?>'> -->
    <td><input type=text name=nombreB value='<?php echo $fila[1]?>'></td>
    <td><input type=text name=PrecioB value='<?php echo $fila[2]?>'></td>
    <td><?php echo $fila[3]?></td>
    <td><input type=text name=CategoriaB value='<?php echo $fila[4]?>'></td>
    </tr><br><br>
    <div class=centrar>
    <input type=submit value="Guardar cambios">
    </div><br>

</form>
<?php
}
?>
</table><br>







</body>
</html>