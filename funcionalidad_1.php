<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>

TOP 3 aqui

<br>
consultar top 3 de la tienda aqui!!!
<br>

<form id = 'caja' action="show_producto.php" method="post">
      <input type="submit" value="Click ID producto" id = "botonB">
      </form>

  <br>
  <form id = 'caja' action="consultas_tienda.php" method="post">
  <input type="submit" value="Volver" id = "botonB">
  </form>

  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  
 	$query = "SELECT TOP 3 pd.id_producto, pd.nombre, pd.precio 
   FROM productos NATURAL JOIN disponibilidad_tienda AS pd WHERE pd.id = pd.id_producto, pd.id_tienda = $_SESSION["tienda_id"], pd.fecha_de_caducidad IS NULL ORDER BY pd.precio;";
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

<?php include('../templates/footer.html'); ?>


<br>
DD de MM del 2021

</body>
</html>