<?php




require "conexion.php";


$tiPr=$_POST["tiPr"];
$mar=$_POST["mar"];


if($tiPr!=null){

$con = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");
mysqli_select_db($con,$baseDatosBD) or die("no encontre la base de datos");
$sql="insert into TIPO_PRODUCTOS(descripcion) VALUES ('$tiPr');";

$resulset= mysqli_query($con,$sql);



if (mysqli_affected_rows ($con)>0){
     echo '<script>alert("Tipo de Producto Cargado correctamente");</script>';
        echo '<script>window.history.go(-2)</script>';
    
  
}
else{
   
   echo '<script>alert("No se pudo cargar el Tipo de Producto");</script>';
        echo '<script>window.history.go(-2)</script>';  
}


  
}
if($mar!=null){

$con = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");
mysqli_select_db($con,$baseDatosBD) or die("no encontre la base de datos");
$sql="insert into MARCAS(descripcion) VALUES ('$mar');";

$resulset= mysqli_query($con,$sql);



if (mysqli_affected_rows ($con)>0){
   
    echo '<script>alert("Marca Ingresada Correctamente");</script>';
    echo '<script>window.history.go(-2)</script>';
  
    
   
}
else{
      echo '<script>alert("No se pudo cargar la Marca ingresada");</script>';
        echo '<script>window.history.go(-2)</script>';
}

  
}








?>