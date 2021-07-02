<?php session_start(); ?>
<?php include('templates/header.html');
$_SESSION['ingresado'] = false;
?>

<br>
<div class = "grid-ingresar">
<div></div>

<div style = "background-color: #fdf4bf;">
<h1>Iniciar sesión</h1>
<form id = 'caja' action="tienda.php" method="post">
    <input type="text" class="form-control" placeholder="Usuario" style="font-size:24px;" size = 15 name = 'usuario'>
    <p style="font-size:6px;"></p>
    <input type="text" class="form-control" placeholder="Clave" style="font-size:24px;" size = 15 name = 'clave'>
    <p style="font-size:15px;"></p>
    <input type="submit" value="Ingresar" id = "botonB">
</form></div>

<div></div>
</div>
<br>


5 de Julio del 2021
</body>

</html>