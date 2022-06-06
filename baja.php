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
    <title>Eliminar Producto</title>
    <link rel="stylesheet" href="general.css">
</head>
<body>


    <img src="https://naurua.com/img/supermercados-toledo-logo.jpg">


<div class="formular">

<div class="centrar2">


<?php
  require "conexion.php";
  $CodProducto=$_POST['CodProducto'];
  $detalle=$_POST['detalle'];

  $con=mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die("no se pudo conectar a la BD");

  //Valido que la entrada del producto a eliminar exista
  $sqlConsultaEnt="select ENTRADAS_nroentrada from entradas_has_productos where PRODUCTOS_CodProducto_Entr='$CodProducto'";

  $resultConsultaEnt =mysqli_query($con, $sqlConsultaEnt);
 
  $registro=mysqli_fetch_assoc($resultConsultaEnt);
 
  if(mysqli_affected_rows($con)>0) 
     {
       $nroentrada=$registro['ENTRADAS_nroentrada'];
       // ELIMINO LA RELACION ENTRADA - PRODUCTO
       $con1 = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");
       $sqlEliminar2="delete from entradas_has_productos where PRODUCTOS_CodProducto_Entr = $CodProducto";
       $resulset2 = mysqli_query($con1, $sqlEliminar2);
     
       if (mysqli_affected_rows ($con1)>0){
          //echo "La entrada del Producto se ha eliminado correctamente";
          // ELIMINO LA ENTRADA DEL PRODUCTO
          $con2 = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");
          $sqlEliminar3="delete from entradas where nroEntrada = $nroentrada";
          $resulset3 = mysqli_query($con2,$sqlEliminar3);
          
          if (mysqli_affected_rows ($con2)>0){
              echo '<font color="white">La entrada se ha eliminado correctamente.</font><br><br>';
          }
          else{
              echo '<font color="white">No se pudo eliminar la entrada: '.$nroentrada.'.</font><br><br>';
          }
       } 

     }
  else{
       echo '<font color="white">No existe movimiento de entrada para el producto a eliminar.</font><br><br>';
       
  };
  
     // ELIMINO LA RELACION PRODUCTO - MARCA
  $con4 = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");
  $sqlEliminar4="delete from productos_has_marcas where PRODUCTOS_CodProducto = $CodProducto";
  $resulset4 = mysqli_query($con4,$sqlEliminar4);

  // ELIMINO EL PRODUCTO
  $con5 = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");
  $sqlEliminar5="delete from productos where CodProducto = $CodProducto";
  $resulset5 = mysqli_query($con5,$sqlEliminar5);

  if (mysqli_affected_rows ($con5)>0){
      echo '<font color="white">El Producto se ha eliminado correctamente.</font><br><br>';
  }
  else{
      echo '<font color="white">No se pudo eliminar el producto: '.$detalle.'.</font><br><br>';
  }
 
  ?>
  <a href=listarProd.php><input type=button value="Volver"></a> <br><br><br> </form> 
  <?php



?>

</div>
</div>

</body>
</html>
