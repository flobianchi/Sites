<?php session_start(); ?>
<?php include('templates/header.html');
$_SESSION['ingresado'] = false;
?>

<h2>Aqui se crea un uevo usuario con los datos ingresados</h2>

<br>

<?php

$nombre = $_POST['nombre'];
$rut = $_POST['rut'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$direccion = $_POST['direccion'];
$clave = $_POST['clave'];

if($nombre == ''){
    echo("debe ingresar un nombre");
}elseif($rut == ''){
    echo("debe ingresar un rut");
}elseif('' $edad == ''){
    echo("debe ingresar un nombre");
}elseif($clave == ''){
    echo("debe ingresar una clave");
}

echo("$nombre 
$rut 
$edad 
$sexo 
$direccion 
$clave");

?>

1) chequear que la direccion exista y las reglas de la clave. Ademas de que los inputs no esten vacios.
<br>
2) si cumple lo anterior ejecutar la funcion agragar_usuario
<br>
3) si el usuario no existe (ver retorno funcion agragar_usuario),
entonces se llama a la funcion cambiar_clave para crearle una clave
<br>
* si (1) no se cumple, entonces (2) y (3) no se ejecutan. (mostrar mensaje 'datos mal ingresados')
<br>
** si (2) no se cumple, entonces no se ejecuta (3). (mostrar mensaje 'usuario ya existe')
<br>
En los casos * y ** se muestran los dos botones ("crear" e "ir al inicio"), en cualqueir otro caso solo el boton "ir al inicio"
<br>
<form id = 'caja' action="nueva_cuenta.php" method="post">
    <input type="submit" value="Crear" id = "botonB">
</form>
<br>
<form id = 'caja' action="index.php" method="post">
    <input type="submit" value="Ir al Inicio" id = "botonB">
</form>
<br>



<?php include('templates/footer.html');