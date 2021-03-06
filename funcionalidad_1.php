<?php session_start(); ?>
<?php include('templates/header.html');   ?>
<?php include('login.php');   ?>
<?php include('templates/header_botones.html');   ?>

<style>
table.center {
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #c29f29;
    width: auto;
    text-align: center;
    font-size: 20px;
}

th {
    background-color: #f3c733;
    padding: 4px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
    padding: 8px;
}

tr:hover {
    background-color: #9bf6ff;
    padding: 8px;
}

#botonID {
  background-color: #f3c733; 
  color: black; 
  height:30px; 
  width:38px;
  text-decoration: none; 
  border-radius: 8px; 
  font-size: 15px; 
  margin: 3px; 
  cursor: pointer;
}

#botonID:hover {
    border: none;
    background:#c29f29;
    color: #444444; 
    box-shadow: 0px 0px 1px #777;
    content: "ir";
}
</style>

<h2>TOP 3 de los productos mas baratos aqui!</h2>

<br>
<br>
<h3>COMESTIBLES</h3>

  <?php

  $id = $_SESSION['id_tienda'];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("config/conexion.php");

  #$query = "SELECT TOP 3 pd.id_producto, pd.nombre, pd.precio FROM productos NATURAL JOIN disponibilidad_tienda AS pd WHERE pd.id = pd.id_producto, pd.id_tienda = 0, pd.fecha_de_caducidad IS NULL ORDER BY pd.precio;";
  $query = "SELECT productos.id, productos.nombre, productos.precio FROM productos JOIN disponibilidad_tienda ON productos.id = disponibilidad_tienda.id_producto WHERE disponibilidad_tienda.id_tienda = $id AND productos.fecha_de_caducidad IS NOT NULL ORDER BY productos.precio LIMIT 3;";
  #$query = "SELECT p.id, p.nombre, p.precio FROM (productos AS p NATURAL JOIN disponibilidad_tienda AS dp ON p.id = dp.id_producto) WHERE dp.id_tienda = 0 AND p.fecha_de_caducidad IS NULL ORDER BY p.precio;";
	$result = $db -> prepare($query);
	$result -> execute();
	$unidades = $result -> fetchAll();

  ?>

	<table class="center">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Precio</th>
    </tr>
  <?php
	foreach ($unidades as $unidad) {
  		echo "<tr><td>
      <form id = 'caja' action='show_producto.php' method='post'>
<input name = 't' type='submit' value='$unidad[0]' id = 'botonID'>
</form>
      </td><td>$unidad[1]</td> <td>$unidad[2]</td></tr>";
	}
  ?>
	</table>

<h3>NO COMESTIBLES</h3>

  <?php

  $id = $_SESSION['id_tienda'];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("config/conexion.php");

  #$query = "SELECT TOP 3 pd.id_producto, pd.nombre, pd.precio FROM productos NATURAL JOIN disponibilidad_tienda AS pd WHERE pd.id = pd.id_producto, pd.id_tienda = 0, pd.fecha_de_caducidad IS NULL ORDER BY pd.precio;";
  $query = "SELECT productos.id, productos.nombre, productos.precio FROM productos JOIN disponibilidad_tienda ON productos.id = disponibilidad_tienda.id_producto WHERE disponibilidad_tienda.id_tienda = $id AND productos.fecha_de_caducidad IS NULL ORDER BY productos.precio LIMIT 3;";
  #$query = "SELECT p.id, p.nombre, p.precio FROM (productos AS p NATURAL JOIN disponibilidad_tienda AS dp ON p.id = dp.id_producto) WHERE dp.id_tienda = 0 AND p.fecha_de_caducidad IS NULL ORDER BY p.precio;";
	$result = $db -> prepare($query);
	$result -> execute();
	$unidades = $result -> fetchAll();

  ?>

	<table class="center">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Precio</th>
    </tr>
  <?php
	foreach ($unidades as $unidad) {
  		echo "<tr><td>  <form id = 'caja' action='show_producto.php' method='post'>
      <input name = 't' type='submit' value='$unidad[0]' id = 'botonID'>
      </form></td><td>$unidad[1]</td> <td>$unidad[2]</td></tr>";
	}
  ?>
	</table>

  <br>
  <form id = 'caja' action="consultas_tienda.php" method="post">
  <input type="submit" value="Volver" id = "botonB">
  </form>


<?php include('templates/footer.html');