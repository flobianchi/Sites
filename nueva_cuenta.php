<?php session_start(); ?>
<?php include('templates/header.html');
$_SESSION['ingresado'] = false;
?>

<h3>Si no quieres crear una cuenta debes volver al incicio</h3>
<form id = 'caja' action="index.php" method="post">
    <input type="submit" value="Ir al Inicio" id = "botonB">
</form>
<br>

<br>
<h2>Esta pagina es para crear la cuenta nueva</h2>

Aqui muchos datos y todo lo que se necesita para crear un nuveo usuario:

<br>
se necesita: nombre, rut, edad, sexo y direccion (un id entre los que ya existen) 
(calificacion es 'usuario')
(para agregar esto ejecutar la funcion agragar_usuario)
<br>
tambien debe crear una clave, para esto debe complir las condiciones.
(para agregar esto ejecutar la funcion cambiar_clave)

<br>
<form id = 'caja' action="crear_nuevo_usuario.php" method="post">
    <input type="submit" value="Crear cuenta" id = "botonB">
</form>
<br>


<?php include('templates/footer.html');