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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOLEDO S.A</title>
    
        <link rel="stylesheet" href="general.css">    
</head>
<body>
     
          <?php

echo "¡Bienvenido $nomyape!";

?>
            <div>
        <a href="index.php?logout" ><button >Cerrar sesion</button></a>
    </div>
          
 <img src="https://naurua.com/img/supermercados-toledo-logo.jpg">
 
 <div class="centrar">
        <form action="alta.php" method="POST">
                
				<input class="bott" type="submit" value="Cargar Nuevos Productos">
            </form>
        <br>
                 
        <form action="listarProd.php" method="POST">
		<input class="bott" type="submit" value="Buscar Productos">                     
        </form>                   
                                
		</div>

</body>
</html>
