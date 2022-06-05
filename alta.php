<?php

session_start();
//fijar si existe una variable de sesión que tenga alguno de los datos cargados
if(isset($_SESSION['usu'])){
    $nomyape= $_SESSION['nombre'];
}
else{
    echo "ACCESO NO AUTORIZADO<br> DEBE INICIAR SESIÓN";
    echo '<meta http-equiv="Refresh" content="3; url=index.php">';
    exit();
}

?>

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
<label >Nombre del Producto: </label><input type="text" maxlength="45" minlength="2" name="nomPro" required><br><br>


<label >Tipo de Producto: </label>
 <select name="tiProd" required>
<?php
  $getTipoProd1 = "select * from tipo_productos order by descripcion asc";
  $getTipoProd2 = mysqli_query($conn, $getTipoProd1);

  echo '<meta http-equiv="Refresh" content="0; url=alta.php">';
  
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


 <label >Precio del Producto: </label> <input type="text" pattern="^\d*(\.\d{0,2})?$"  title="Solo números y punto (para 2 decimales). Tamaño mínimo: 1, máximo: 9" name="preProd" min= 1 maxlength="9" required><br><br>
 
 <label >Stock del Producto: </label> <input type="text" pattern="[0-9]{1,4}"  title="Solo números. Tamaño mínimo: 1, máximo: 4" maxlength="4" name="stoProd" min= 1 required><br><br>

  
<!-- select de marcas trayendolas desde la BD -->
<label >Marca del Producto: </label>
 <select name="marProd" required>
    <?php

    $getMarcas1 = "select * from marcas order by descripcion asc";
    $getMarcas2 = mysqli_query($conn, $getMarcas1);
    echo '<meta http-equiv="Refresh" content="0; url=alta.php">';

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
 <label >Fecha de Ingreso: </label> <input type="date"  name="fechaIngre" required><br><br>
	<input class="bott2" type="submit" value="Añadir Producto"><br><br>
                                
  </form>   <!-- Agregar tipo de producto -->
    <form action="agregarTP.php" method="POST">
    <input class="bott3" type="submit" value="Agregar Tipo de Producto"><br><br>
  </form>
<!-- Agregar marca -->
 <form action="agregarM.php" method="POST">
    <input class="bott3" type="submit" value="Agregar Marca"><br><br>
 </form>
<!-- Ir a menú principal -->
 <a href=menu.php><input class="bott3" type=button value="Volver"></a> <br><br><br> </form> 

  </div>
</div>


</body>
</html>

