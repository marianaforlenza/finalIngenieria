


<head>

<link href=general.css rel=stylesheet>
</head>

<?php

require "conexion.php";
$nomPro=$_POST['nomPro'];
$tiProd=$_POST['tiProd'];
$preProd=$_POST['preProd'];
$marProd=$_POST['marProd'];
$stoProd=$_POST['stoProd'];
$fechaIngre=$_POST['fechaIngre'];



$con = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");
mysqli_select_db($con,$baseDatosBD) or die("no encontre la base de datos");
$sql="insert into PRODUCTOS (detalle,precio,stock) values ($nomPro,$preProd,$stoProd);";
$resulset= mysqli_query($con,$sql);

if (mysqli_affected_rows ($con)>0){
    echo "El Producto se cargó Correctamente";
}
else{
    echo"No se puedo cargar el producto";
}

?>
<!DOCTYPE html>
<html>

<head>
<title>PAGINA WEB</title>
<link href=estilos.css rel=stylesheet>
</head>


<body>





<form action="menu.php" method="get">
<input class= "boton"type=submit value="Volver" > 
</form>





</body>

</html>