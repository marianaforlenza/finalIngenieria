
<?php
session_start();
if(isset($_SESSION['usu'])){

$usu=$_SESSION['usu'];
 $nomyape=$_SESSION['nombre'];  



}

else{

echo "Acceso No Autorizado. Debe iniciar Sesion";
echo '<meta http-equiv-"Refresh" content="2; url=index.php>';
//echo $usu;
//echo "el nombre es" .$nombre;
exit();
}


?>


  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar nuevas marcas</title>
    <link rel="stylesheet" href="general.css">
</head>
<body>


    <img src="https://naurua.com/img/supermercados-toledo-logo.jpg">


<div class="formular">


<div class="centrar2">
        <form action="cargaranexos.php" method="POST">
<label >Marca: </label><input type="text"  name="mar" required><br><br>

 
 <input class="bott2" type="submit" value="Añadir Marca">
 
	<br><br>
                                
  </form>
  <form action="alta.php" method="get">
<input class="bott2"type=submit value="Volver a la carga de Productos" > 
</form>
  
</div>
</div>
                                
 
                               
		
</body>
</html>


  
