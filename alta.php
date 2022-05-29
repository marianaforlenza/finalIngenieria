

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
<label >Tipo de Producto: 
 <select name="tiProd">
  <option value="Lacteo">Lacteo</option>
  <option value="Limpieza" >Limpieza</option>
  <option value="Perfumeria">Perfumeria</option>
</select><br><br>
 <label >Precio del Producto: </label> <input type="text"  name="preProd"><br><br>
 
 <label >Stock del Producto: </label> <input type="text"  name="stoProd"><br><br>
 <label >Marca del Producto: </label> 
 <select name="marProd">
  <option value="Sancor">Sancor</option>
  <option value="La Serenisima" >La Serenisima</option>
  <option value="La Pasquina">La Pasquina</option>
</select><br><br>
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

