<?php include('templates/header.html');   ?>
<?php include('login.php');   ?>
<?php include('templates/header_botones.html');   ?>

Esta es la pagina de seleccion de tiendas
<br>
Consultar tiendas aqui

<form id = 'caja' action="consultas_tienda.php" method="post">
      <input type="submit" value="Elegir tienda" id = "botonB">
      </form>
  <br>
  <br>
  <form id = 'caja' action="perfil.php" method="post">
  <input type="submit" value="Ir a perfil" id = "botonB">
  </form>



<?php include('templates/footer.html');