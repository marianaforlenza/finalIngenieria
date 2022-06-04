

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

require "conexion.php";

$codProd = $_POST['codProd'];
$nombre = $_POST['nombreB'];
$precio = $_POST['precioB'];
$stock = $_POST['stockB'];
$cat = $_POST['categoriaB'];
if(isset($_POST['sumarStock'])){
    $sumarStock = $_POST['sumarStock'];
}else{
    $sumarStock = 0;
}
if(isset($_POST['restarStock'])){
    $restarStock = $_POST['restarStock'];
}else{
    $restarStock = 0;
}
echo "sumar stock es = $sumarStock, y restar stock es = $restarStock";
$total = $sumarStock - $restarStock;
$stockNuevo = $stock + $total;

$conne = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die("no se pudo conectar a la BD");

$sqlGuardarCambios = "update productos set detalle = '$nombre', precio = $precio,
stock = $stockNuevo, TIPO_PRODUCTOS_idTIPO_PRODUCTOS = $cat 
where CodProducto = $codProd";

$result = mysqli_query($conne, $sqlGuardarCambios);

// $sqlGuardarCambiosEntradas

echo '<meta http-equiv="Refresh" content="0; url=listarProd.php"'


?>





</body>
</html>