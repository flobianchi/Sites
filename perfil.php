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

Esta es la pagina perfil
<br>
Consultar atributos del user aqui
<br>
Si es admin mostrar mas info aqui

<form id = 'caja' action="historial.php" method="post">
      <input type="submit" value="Historial" id = "botonB">
</form>
<br>

<form id = 'caja' action="calve.php" method="post">
<input type="text" class="form-control" placeholder="nueva clave" style="font-size:19px;" size = 15 name = 'comuna'>
      <input type="submit" value="Cambiar clave" id = "botonB">
</form>
<br>
<form id = 'caja' action="tienda.php" method="post">
      <input type="submit" value="Volver" id = "botonB">
</form>
<br>
DD de MM del 2021

</body>
</html>