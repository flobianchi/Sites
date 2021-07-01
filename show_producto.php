<?php session_start(); ?>
<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>

Mostrar aqui atributos del producto

<form id = 'caja' action="consultas_tienda.php" method="post">
      <input type="submit" value="Volver" id = "botonB">
      </form>
  <br>

  <?php

  $id_producto = $_SESSION['id_producto'];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("config/conexion.php");

  
  $query = "SELECT * FROM productos WHERE id = $id_producto;";
  #FALTA CREAR EL DICCIONARIO

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

<?php include('templates/footer.html'); ?>

<br>
DD de MM del 2021

</body>
</html>