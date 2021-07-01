<?php session_start(); ?>
<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>

Esta es la pagina de buscar productos con nombre texto ( o que contengan texto)
<br>
Consultar productos aqui

<form id = 'caja' action="show_producto.php" method="post">
      <input type="submit" value="Click ID producto" id = "botonB">
      </form>

      #BORRAR ESTE BOTON DESPUES

  <br>
  <?php session_start(); ?>


  <?php

  $id = $_SESSION['id_tienda'];

  $f2 = $_POST['f2'];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("config/conexion.php");

 $query = "SELECT productos.id, productos.nombre, productos.precio FROM productos JOIN disponibilidad_tienda ON productos.id = disponibilidad_tienda.id_producto WHERE disponibilidad_tienda.id_tienda = $id AND productos.nombre LIKE ('%$$f2$%');";
 $result = $db -> prepare($query);
	$result -> execute();
	$unidades = $result -> fetchAll();

  # FALTA AGREGAR EL TIPO!!!!!!!!!!!!!!!!!!!!!!!!!! preguntar martin

  ?>

	<table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Precio</th>
    </tr>
  <?php
	foreach ($unidades as $unidad) {
  		echo "<tr><td>$unidad[0]</td><td>$unidad[1]</td> <td>$unidad[2]</td></tr>";
	}
  ?>
	</table>

  <form id = 'caja' action="consultas_tienda.php" method="post">
  <input type="submit" value="Volver" id = "botonB">
  </form>

<br>
DD de MM del 2021

</body>
</html>