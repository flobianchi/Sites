<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$tipo = $_POST["tipo_elegido"];
	$nombre = $_POST["nombre_pokemon"];

 	$query = "SELECT * FROM productos;";
	$result = $db -> prepare($query);
	$result -> execute();
	$productos = $result -> fetchAll();
  ?>

	<h1>Consulta test</h1>
	<h3>Pide todos los productos y algunos de sus atributos</h3>

	<form action="../index.php" method="get">
	<button class="button">Volver</button>
    <!--
	<input type="submit" value="Volver">
	-->
	</form>

	<table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Precio</th>
	  <th>Descripcion</th>
    </tr>
  <?php
	foreach ($productos as $prod) {
  		echo "<tr> <td>$prod[0]</td> <td>$prod[1]</td> <td>$prod[2]</td> <td>$prod[3]</td> </tr>";
	}
  ?>
	</table>


<?php include('../templates/footer.html'); ?>
