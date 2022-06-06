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


<head>

<link href=general.css rel=stylesheet>

<img src="https://naurua.com/img/supermercados-toledo-logo.jpg">

</head>

<?php

require "conexion.php";
$nomPro=$_POST['nomPro'];
$tiProd=$_POST['tiProd'];
$preProd=$_POST['preProd'];
$marProd=$_POST['marProd'];
$stoProd=$_POST['stoProd'];
$fechaIngre=$_POST['fechaIngre'];


//echo "El producto es $nomPro, el precio es $preProd, la categoria es $tiProd, y la marca es $marProd<br>";
//echo "<br> La fecha es $fechaIngre <br>";


$con = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");

$sqlProd="insert into productos (detalle, precio, stock, TIPO_PRODUCTOS_idTIPO_PRODUCTOS)
values ('$nomPro', $preProd, $stoProd, $tiProd);";
$resulset= mysqli_query($con,$sqlProd);

$id_autoincr = mysqli_insert_id($con);

echo "<br> El id del producto es = $id_autoincr <br>";

$sqlProd_Marca = "insert into productos_has_marcas (PRODUCTOS_CodProducto, MARCAS_nroMarca)
values ($id_autoincr, $marProd);";
$resulset2 = mysqli_query($con, $sqlProd_Marca);

$connex = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");

$sqlEntr = "insert into entradas (cantidadEntrada, fechaEntrada, USUARIOS_nroUsuario)
values ($stoProd, '$fechaIngre', $nroUsuario);";
$resulset3 = mysqli_query($connex,$sqlEntr);

$id_autoincr_Entr = mysqli_insert_id($connex);

$sqlEntr_Prod = "insert into entradas_has_productos (ENTRADAS_nroEntrada, PRODUCTOS_CodProducto_Entr, CantidadEntr)
values ($id_autoincr_Entr, $id_autoincr, $stoProd);";
$resulset4 = mysqli_query($connex, $sqlEntr_Prod);



if (mysqli_affected_rows ($con)>0){
   echo '<font color="white">El Producto se cargó Correctamente.</font><br><br>';
}
else{
   echo '<font color="white">No se puedo cargar el producto.</font><br><br>';
}

?>
<!DOCTYPE html>
<html>

<head>
<title>Confirmacion de alta</title>
<link href=estilos.css rel=stylesheet>
</head>


<body>





<form action="menu.php" method="get">
<input class= "boton"type=submit value="Volver" > 
</form>





</body>

</html>