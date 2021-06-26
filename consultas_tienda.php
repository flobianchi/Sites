<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>

Esta es la pagina con cunsultas de la tienda elegida
<br>
Nombre de la tienda elegida aqui
<?php 
echo("Click en id tienda ");
echo($_POST['t']);
?>
<br>

<form id = 'caja' action="funcionalidad_1.php" method="post">
      <input type="submit" value="Top 3" id = "botonB">
      </form>
  <br>
  <br>

<form id = 'caja' action="funcionalidad_2.php" method="post">
<input type="text" class="form-control" placeholder="texto" style="font-size:19px;" size = 15 name = 'comuna'>
      <input type="submit" value="Buscar" id = "botonB">
</form>

<br>
<br>

<form id = 'caja' action="funcionalidad_3.php" method="post">
<input type="text" class="form-control" placeholder="id item" style="font-size:19px;" size = 15 name = 'comuna'>
<input type="text" class="form-control" placeholder="cantidad" style="font-size:19px;" size = 15 name = 'comuna'>
      <input type="submit" value="Comprar" id = "botonB">
</form>

<br>
DD de MM del 2021

<form id = 'caja' action="tienda.php" method="post">
      <input type="submit" value="Volver" id = "botonB">
</form>

</body>
</html>