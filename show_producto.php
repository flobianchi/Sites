<?php session_start(); ?>
<?php include('templates/header.html');   ?>
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
      <th>Descripcion</th>
      <th>Largo</th>
      <th>Alto</th>
      <th>Ancho</th>
      <th>Peso</th>
      <th>Fecha de caducidad</th>
      <th>Duracion sin refrigerar</th>
      <th>Tipo de conserva</th>
    </tr>
  <?php
	foreach ($unidades as $unidad) {
  		echo "<tr><td>$unidad[0]</td><td>$unidad[1]</td> <td>$unidad[2]</td><td>$unidad[3]</td><td>$unidad[4]</td><td>$unidad[5]</td><td>$unidad[6]</td><td>$unidad[7]</td><td>$unidad[8]</td><td>$unidad[9]</td><td>$unidad[10]</td></tr>";
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