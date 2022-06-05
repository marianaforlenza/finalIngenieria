<?php
session_start();
if(isset($_SESSION['usu'])){
    $nomyape= $_SESSION['nombre'];
    $nroUsuario = $_SESSION['nroUsuario'];
}
else{
    echo "ACCESO NO AUTORIZADO<br> DEBE INICIAR SESIÓN";
    echo '<meta http-equiv="Refresh" content="3; url=index.php">';
    exit();
}
?>

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
$marca = $_POST['marcaB'];
$sumarStock = $_POST['sumarStock'];
$restarStock = $_POST['restarStock'];

$hoy= date('Y-m-d');


echo "sumar stock es = $sumarStock, y restar stock es = $restarStock";
$total = $sumarStock - $restarStock;
$stockNuevo = $stock + $total;

$conne = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die("no se pudo conectar a la BD");

// update Productos
$sqlGuardarCambios = "update productos set detalle = '$nombre', precio = $precio,
                      stock = $stockNuevo, TIPO_PRODUCTOS_idTIPO_PRODUCTOS = $cat 
                      where CodProducto = $codProd";

$result = mysqli_query($conne, $sqlGuardarCambios);

// guardar datos en Entradas
if($sumarStock != 0){
    $connex = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");
    $sqlGuardarEntr = "insert into entradas (cantidadEntrada, fechaEntrada, USUARIOS_nroUsuario)
                       values ($sumarStock, '$hoy', $nroUsuario);";
    $resulset3 = mysqli_query($connex,$sqlGuardarEntr);

// insert Entradas_has_productos
    $id_autoincr_Entr = mysqli_insert_id($connex);

    $sqlEntr_Prod = "insert into entradas_has_productos (ENTRADAS_nroEntrada, PRODUCTOS_CodProducto_Entr, CantidadEntr)
                     values ($id_autoincr_Entr, $codProd, $sumarStock);";
    $resulset4 = mysqli_query($connex, $sqlEntr_Prod);
}

// insert Salidas
if($restarStock != 0){
    $conexi = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");
    $sqlGuardarSal = "insert into salidas (cantidadSalida, FechaSalida, USUARIOS_nroUsuarioSal)
                      values ($restarStock, '$hoy', $nroUsuario);";
    $resulset5 = mysqli_query ($conexi, $sqlGuardarSal);

// insert Productos_has_salidas
    $id_autoincr_Sal = mysqli_insert_id($conexi);

    $sqlSal_Prod = "insert into productos_has_salidas (SALIDAS_nroSalida, PRODUCTOS_CodProducto_Sal, cantidadSal)
                    values ($id_autoincr_Sal, $codProd, $restarStock);";
    $resulset6 = mysqli_query($conexi, $sqlSal_Prod);
}

// update Productos_has_Marcas
$sqlGuardarMarca = "update productos_has_marcas set MARCAS_nroMarca = $marca
                    where PRODUCTOS_CodProducto = $codProd";
$result7 = mysqli_query($conne, $sqlGuardarMarca);





echo '<meta http-equiv="Refresh" content="0; url=listarProd.php"'


?>





</body>
</html>