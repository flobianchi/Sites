<?php session_start(); ?>
<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>

Mostrar aqui atributos del producto

  <br>

  <?php

  $id_producto = $_POST['t'];
#echo($id_producto);
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("config/conexion.php");

  
  $query = "SELECT * FROM productos WHERE id = $id_producto;";

	$result = $db -> prepare($query);
	$result -> execute();
	$unidades = $result -> fetchAll();

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
      <input type="submit" value="Volver a las consultas" id = "botonB">
      </form>

<br>
DD de MM del 2021

</body>
</html>