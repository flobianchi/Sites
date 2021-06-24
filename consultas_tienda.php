<?php include('templates/header.html');   ?>

<div class="grid-titulo">
  <div></div>
  <div><img src="styles/banana.gif" width="170" height="170"></div>
  <div> <h1> Bases de datos </h1> </div>
  <div><img src="styles/banana.gif" width="170" height="170"></div>
  <div></div>
  <div></div>
  <div></div>
  <div> <h3> Grupo 53 y 56 Entrega 3 </h3> 
        <h2> Sebastián Díaz, Martín Alarcón</h2> </div>
  <div></div>
  <div></div> 
</div>

Esta es la pagina con cunsultas de la tienda elegida
<br>
Nombre de la tienda elegida aqui
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