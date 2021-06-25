<?php session_start(); ?>
<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>

<br>
Clave cambiada con exito
<br>
Ejecutar funcion que cambia clave aqui

<?php
$id_current_user = $_SESSION['id_user'];
$nombre = $_SESSION['name_user'];
cambiar_clave($id_current_user, $nueva_clave);
echo("Hola $nombre, tu nueva clave es: $nueva_clave");
?>


<br>
<form id = 'caja' action="perfil.php" method="post">
<input type="submit" value="Volver" id = "botonB">
</form>

</body>
</html>