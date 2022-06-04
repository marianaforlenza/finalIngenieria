<?php

require "conexion.php";
$conn = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("No se conectó");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Productos</title>
    <link rel="stylesheet" href="general.css">
</head>
<body>


    <img src="https://naurua.com/img/supermercados-toledo-logo.jpg">


<div class="formular">

<div class="centrar2">
        <form action="cargar.php" method="POST">
<label >Nombre del Producto: </label><input type="text"  name="nomPro"><br><br>


<label >Tipo de Producto: </label>
 <select name="tiProd">
<?php
  $getTipoProd1 = "select * from tipo_productos order by descripcion asc";
  $getTipoProd2 = mysqli_query($conn, $getTipoProd1);

  while($row1 = mysqli_fetch_array($getTipoProd2))
  {
    $idTIPO_PRODUCTOS = $row1['idTIPO_PRODUCTOS'];
    $descripcion1 = $row1['descripcion'];
  ?>

  <option value = "<?php echo $idTIPO_PRODUCTOS; ?>"> <?php echo $descripcion1 ?> </option>
  <?php
  }
?>

</select><br><br>


 <label >Precio del Producto: </label> <input type="text"  name="preProd"><br><br>
 
 <label >Stock del Producto: </label> <input type="text"  name="stoProd"><br><br>

  
<!-- select de marcas trayendolas desde la BD -->
<label >Marca del Producto: </label>
 <select name="marProd">
    <?php

    $getMarcas1 = "select * from marcas order by descripcion asc";
    $getMarcas2 = mysqli_query($conn, $getMarcas1);

    while($row = mysqli_fetch_array($getMarcas2))
    {
      $nroMarca = $row['nroMarca'];
      $descripcion = $row['descripcion'];
    ?>

<option value = "<?php echo $nroMarca; ?>"> <?php echo $descripcion ?> </option>
    <?php
    }
    ?>
</select><br><br>

<!-- Fecha de ingreso -->
 <label >Fecha de Ingreso: </label> <input type="date"  name="fechaIngre"><br><br>
	<input class="bott2" type="submit" value="Añadir Producto"><br><br>
                                
  </form>
  <form action="menu.php" method="get">
<input class="bott2"type=submit value="Volver al Menú principal" > 
</form>

  </div>
</div>
                                                           
		
</body>
</html>

