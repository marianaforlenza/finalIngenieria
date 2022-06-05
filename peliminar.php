
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

//echo "<br> El producto a eliminar es $prodEliminar <br>";

require "conexion.php";
    $con=mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die("no se pudo conectar a la BD");

 $sqlEliminarProd="select detalle from productos where CodProducto='$prodEliminar'";

 $resultProdEliminar =mysqli_query($con, $sqlEliminarProd);

 $registro=mysqli_fetch_assoc($resultProdEliminar);

    if(mysqli_affected_rows($con)>0) 
    {
      $detalle=$registro['detalle'];
    
      echo "Esta por eliminar el producto: $detalle <br>";
      echo "<br>¿Desea continuar?<br>";
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
      echo "El producto seleccionado no existe en la base de datos. <br><br>";
      
    }

?>

</div>
</div>
                                                           
		
</body>
</html>

