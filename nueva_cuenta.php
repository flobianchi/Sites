<?php session_start(); ?>
<?php include('templates/header.html');
$_SESSION['ingresado'] = false;
?>

<br>
<h2>Esta pagina es para crear la cuenta nueva</h2>
<br>
<form id = 'caja' action="index.php" method="post">
    <input type="submit" value="Ir al Inicio" id = "botonB">
</form>
<br>


<?php include('templates/footer.html');