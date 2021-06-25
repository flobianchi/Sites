<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>


<h2>Porfavor elija su tienda</h2>

<form id = 'caja' action="consultas_tienda.php" method="post">
      <input type="submit" value="Elegir tienda" id = "botonB">
      </form>
Mostrar aqui tabla con botones que mande al wp
<br>

<?php
$_SESSION["tienda_id"]= "$p[0]"
?>

<br>
DD de MM del 2021

</body>
</html>