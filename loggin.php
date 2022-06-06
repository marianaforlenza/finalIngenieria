<?php
session_start();

require "conexion.php";

//traer datos desde el formulario del navegador
$usuarioForm=$_POST['usuario'];
$passForm=$_POST['pass'];

//echo "usuario $usuarioForm, pass $passForm";

$con=mysqli_connect($servidorBD, $usuarioBD,$contraBD,$baseDatosBD) or die ("no se puede conectar a la base de datos");


$sqlVerifica="select * from USUARIOS where usu='$usuarioForm';";

$resulset=mysqli_query($con, $sqlVerifica);

$registro=mysqli_fetch_assoc($resulset);



if(mysqli_affected_rows($con)>0){
    //echo "Se encontró el usuario";

    $usu=$registro['usu'];
    $contra= $registro['contra'];
    $nomyape= $registro['nombre']." ".$registro['apellido'];
    $id= $registro['nroUsuario'];
    //verifico pass
    if($registro['contra']==$passForm){
        session_start();
        //echo "<br><br><br><h3> Inicia sesión <h3>";
        //cargar variables de sesion
        $_SESSION['nroUsuario']=$id;
        $_SESSION['usu']=$usu;
        $_SESSION['nombre']=$nomyape;  
        ?>
    <meta http-equiv="Refresh" content="2; url=menu.php">

<?php

    }
    else{
        echo "<br><br><br><h3> La contraseña es incorrecta <h3>";
        echo '<meta http-equiv="Refresh" content="1; url=index.php">';
    }
    
?>


<?php

}
else{
    echo "<br><br><br><h3> No existe el usuario $usuarioForm <h3>";
    echo '<meta http-equiv="Refresh" content="1; url=index.php">';
}

?>
