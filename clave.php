<?php session_start(); ?>
<?php include('templates/header.html');   ?>
<?php include('login.php');   ?>
<?php include('templates/header_botones.html');   
 require("config/conexion.php");?>
<br>
<?php

$clave_final = $_POST["nueva_clave"];
$clave_vieja = $_POST["clave_vieja"];
$id_current_user = $_SESSION['id_user'];
$clave_chequear = $_SESSION['pass_user'];
$nombre = $_SESSION['name_user'];


if($clave_chequear == $clave_vieja){
    if($clave_final == ''){
        echo("Hola $nombre, debes ingresar una nueva clave para cambiar tu clave");
    }
    else{

        $query = "SELECT cambiar_clave($id_current_user, '$clave_final');";

        $result = $db -> prepare($query);
        $result -> execute();
        $respuesta = $result -> fetchAll();

        echo("Hola $nombre, tu nueva clave es: $clave_final");
        $_SESSION['pass_user'] = $clave_final;

    }

}else{
    echo("Hola $nombre, la clave anterior que ingresaste es incorrecta, vuelve a intentarlo");
}



?>

<br>
<br>
<form id = 'caja' action="perfil.php" method="post">
<input type="submit" value="Volver" id = "botonB">
</form>

<?php include('templates/footer.html');