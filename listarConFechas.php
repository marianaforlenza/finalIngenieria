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
<?php

require "conexion.php";
$conne=mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die("no se pudo conectar a la BD");

mysqli_set_charset($conne,"utf8");

if(isset($_GET['ordenNombre'])){
    switch($_GET['ordenNombre']){
        case "asc":
            $sqlListar="select * from productos order by detalle asc;";
            break;
        case "desc":
            $sqlListar="select * from productos order by detalle desc;";
            break;
        default:
        break;
    }
}
else{
    if(isset($_GET['codigo'])){
        $sqlListar="select * from productos order by CodProducto;";
    }
    else{
        if(isset($_GET['stock'])){
            $sqlListar="select * from productos order by stock";
        }
        else{
            $sqlListar = "select * from productos";
        }
    }
}

$recordset = mysqli_query($conne, $sqlListar);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Productos</title> 
    <link rel="stylesheet" href="general.css">
</head>
<body>

    <img src="https://naurua.com/img/supermercados-toledo-logo.jpg">
    


<div class="divCol2">
<form action=listarProd.php method=POST>
<input class="inpGr" type=text placeholder="Ingrese el Código del Producto" name=buscarProd>
<input class="buttong" type=submit value="Buscar producto">
</form><br>
</div>
</div>

<div class="divCol">
<div class="centrar3">
<a href="listarProd.php?codigo"><button class="buttong">Ordenar por código</button></a>
<a href="listarProd.php?ordenNombre=asc"><button class="buttong">Ordenar por nombre AZ</button></a>
<a href="listarProd.php?ordenNombre=desc"><button class="buttong">Ordenar por nombre ZA</button></a>
<a href="listarProd.php?stock"><button class="buttong">Ordenar por stock</button></a>  
</div>
</div><br>

<form method=POST>
<table class="tab">
    <tr class="tab">
    <th>Código</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Categoría</th>
    <th>Marca</th>
    <th>Fecha Ingreso</th>
    <th>Fecha Egreso</th>
    </tr><br>

<?php


if(isset($_POST['buscarProd'])){    //BUSCAR POR COINCIDENCIA

    $buscarProd = $_POST['buscarProd'];

    $sql_buscar = "select * from productos where CodProducto LIKE '%".$buscarProd."%' OR
    detalle LIKE '%".$buscarProd."%'";
    
    $sql_query_buscar = mysqli_query($conne, $sql_buscar);

    while($row = mysqli_fetch_row($sql_query_buscar)){
        ?><tr>
        <td><input type=radio name=selec value=<?php echo $row[0]?>>
        <!-- Columna Código -->
        <?php echo $row[0]?></td>
        <!-- Columna Nombre -->
        <td><?php echo $row[1]?></td>
        <!-- Columna Precio -->
        <td><?php echo $row[2]?></td>
        <!-- Columna Stock -->
        <td><?php echo $row[3]?></td>
        <!-- Columna Categoría -->
        <?php
        $sqlBuscar_Cat = "select * from tipo_productos where idTIPO_PRODUCTOS = '$row[4]'";
        $recordset_BCat = mysqli_query($conne, $sqlBuscar_Cat);
        $row_Cat = mysqli_fetch_row($recordset_BCat);
        ?>
        <td><?php echo $row_Cat[1]?></td>
        <!-- Columna Marca -->
        <?php
        $sqlBuscar_Marca = "select * from productos_has_marcas where PRODUCTOS_CodProducto = '$row[0]'";
        $recordset_BMarca = mysqli_query($conne, $sqlBuscar_Marca);
        $row_Marca = mysqli_fetch_row($recordset_BMarca);
        $sqlBuscar_Marca2 = "select * from marcas where nroMarca = '$row_Marca[1]'";
        $recordset_BMarca2 = mysqli_query ($conne, $sqlBuscar_Marca2);
        $row_Marca2 = mysqli_fetch_row($recordset_BMarca2);
        ?>
        <td><?php echo $row_Marca2[1]?></td>

        <!-- Columna Fecha Ingreso -->
        <td><?php echo $row[6]?></td>

        <!-- Columna Fecha Egreso -->
        <td><?php echo $row[7]?></td>
        </tr>
    <?php
    }
    ?>

<?php
}
else{   //LISTAR

while($registro=mysqli_fetch_row($recordset)){
    ?><tr>
    <td><input type=radio name=selec required value=<?php echo $registro[0]?>>
    <!-- Columna Código -->
    <?php echo $registro[0]?></td>
    <!-- Columna Nombre -->
    <td><?php echo $registro[1]?></td>
    <!-- Columna Precio -->
    <td><?php echo $registro[2]?></td>
    <!-- Columna Stock -->
    <td><?php echo $registro[3]?></td>
    <!-- Columna Categoría -->
    <?php
    $sqlListar_Cat = "select * from tipo_productos where idTIPO_PRODUCTOS = '$registro[4]'";
    $recordset_Cat = mysqli_query($conne, $sqlListar_Cat);
    $registro_Cat = mysqli_fetch_row($recordset_Cat);
    ?>
    <td><?php echo $registro_Cat[1]?></td>
    <!-- Columna Marca -->
    <?php
    $sqlListar_Marca = "select * from productos_has_marcas where PRODUCTOS_CodProducto = '$registro[0]'";
    $recordset_Marca = mysqli_query($conne, $sqlListar_Marca);
    $registro_Marca = mysqli_fetch_row($recordset_Marca);
    $sqlListar_Marca2 = "select * from marcas where nroMarca = '$registro_Marca[1]'";
    $recordset_Marca2 = mysqli_query ($conne, $sqlListar_Marca2);
    $registro_Marca2 = mysqli_fetch_row($recordset_Marca2);
    ?>
    <td><?php echo $registro_Marca2[1]?></td>

    <!-- Columna Fecha Ingreso -->
    <?php
    $sqlListar_Entrada = "select * from entradas_has_productos where PRODUCTOS_CodProducto_Entr = '$registro[0]'";
    $recordset_Entrada = mysqli_query($conne, $sqlListar_Entrada);
    $registro_Entrada = mysqli_fetch_row($recordset_Entrada);
    $sqlListar_Entrada2 = "select * from entradas where nroEntrada = '$registro_Entrada[0]'";
    $recordset_Entrada2 = mysqli_query($conne, $sqlListar_Entrada2);
    $registro_Entrada2 = mysqli_fetch_row($recordset_Entrada2);
    ?>
    <td><?php echo $registro_Entrada2[2]?></td>

    <!-- Columna Fecha Egreso -->
    <?php
    $sqlListar_Salida = "select * from productos_has_salidas where PRODUCTOS_CodProducto_Sal = '$registro[0]'";
    $recordset_Salida = mysqli_query($conne, $sqlListar_Salida);
    $registro_Salida = mysqli_fetch_row($recordset_Salida);
    $sqlListar_Salida2 = "select * from salidas where nroSalida = '$registro_Salida[0]'";
    $recordset_Salida2 = mysqli_query($conne, $sqlListar_Salida2);
    $registro_Salida2 = mysqli_fetch_row($recordset_Salida2);
    ?>
    <td><?php echo $registro_Salida2[2]?></td>



    </tr>
<?php
}

}


?>
</table>

<div class=centrar><br><br>
<input class=bott3 type=submit value=Eliminar formaction=peliminar.php>
<input class=bott4 type=submit value=Modificar formaction=modificar.php>

<a href=menu.php><input class=bott type=button value="Volver"></a> <br><br><br> </form> 


</div>

</form>


</body>
</html>