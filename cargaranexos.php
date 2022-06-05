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


// cargar tipo de producto
if(isset($_POST["tiPr"])){
    $tiPr=$_POST["tiPr"];

    if($tiPr!=null){

        $con = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");
        $sql="insert into tipo_productos (descripcion) VALUES ('$tiPr');";
        $resulset= mysqli_query($con,$sql);

        if (mysqli_affected_rows ($con)>0){
            echo "Tipo de Producto Cargado correctamente";
            echo '<meta http-equiv="Refresh" content="0; url=alta.php">';
        }
        else{
        echo "No se pudo cargar el Tipo de Producto";
        echo '<meta http-equiv="Refresh" content="0; url=alta.php">';
        }
  
    }
}

// cargar marca

if(isset($_POST['mar'])){
    $mar = $_POST["mar"];

    if($mar!=null){
        $con = mysqli_connect($servidorBD, $usuarioBD, $contraBD, $baseDatosBD) or die ("no se pudo conectar a la Base de datos");
        $sql="insert into marcas (descripcion) VALUES ('$mar');";
        $resulset= mysqli_query($con,$sql);

        if (mysqli_affected_rows ($con)>0){
            echo "Marca Ingresada Correctamente";
            echo '<meta http-equiv="Refresh" content="0; url=alta.php">';   
        }
        else{
            echo "No se pudo cargar la Marca ingresada";
            echo '<meta http-equiv="Refresh" content="0; url=alta.php">';
        }
    }
}

?>