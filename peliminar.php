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
    <title>Confirmar Eliminacion</title>
    <link rel="stylesheet" href="general.css">
</head>
<body>


    <img src="https://naurua.com/img/supermercados-toledo-logo.jpg">


<div class="formular">

<div class="centrar2">

<?php

$prodEliminar = $_POST['selec'];

require "conexion.php";
    $con=mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die("no se pudo conectar a la BD");

 $sqlEliminarProd="select detalle from productos where CodProducto='$prodEliminar'";

 $resultProdEliminar =mysqli_query($con, $sqlEliminarProd);

 $registro=mysqli_fetch_assoc($resultProdEliminar);

    if(mysqli_affected_rows($con)>0) 
    {
      $detalle=$registro['detalle'];
      echo '<font color="white">Esta por eliminar el producto: '.$detalle.'.</font><br>';    
      echo '<font color="white"><br>¿Desea continuar?</font><br>';  
    
      ?>
      <form method=post>
      <input type=hidden name="CodProducto" value=<?php echo($prodEliminar)?> >
      <input type=hidden name="detalle" value=<?php echo($detalle)?> >
      <br>
      <input class="bott2" type=submit value="Si" formaction=baja.php>
      <input class="bott2"type=submit value="No" formaction=listarProd.php>
      </form>
      <?php
    }
    else{    
      echo '<font color="white">El producto no existe en la base de datos.</font><br><br>';
      ?>
       
      <?php
    }
?>

<br>
<a href=listarprod.php><input type=button value="Volver"></a> <br><br><br> </form>

</div>
</div>
                                                           
		
</body>
</html>

