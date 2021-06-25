<?php session_start(); ?>
<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>

<?php

$clave_final = $_POST["nueva_clave"];
$id_current_user = $_SESSION['id_user'];
echo($id_current_user);
$query = "SELECT cambiar_clave($id_current_user, '$clave_final');";

$result = $db -> prepare($query);
$result -> execute();
$respuesta = $result -> fetchAll();

$nombre = $_SESSION['name_user'];

echo("Hola $nombre, tu nueva clave es: $clave_final");

?>


<br>
<form id = 'caja' action="perfil.php" method="post">
<input type="submit" value="Volver" id = "botonB">
</form>

</body>
</html>