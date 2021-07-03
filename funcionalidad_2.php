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

Esta es la pagina de buscar productos con nombre texto (o que contengan texto)
<br>
Consultar productos aqui


  <br>
  <?php session_start(); ?>


  <?php

  $id = $_SESSION['id_tienda'];

  $f2 = $_POST['f2'];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("config/conexion.php");

 $query = "SELECT productos.id, productos.nombre, productos.precio FROM productos JOIN disponibilidad_tienda ON productos.id = disponibilidad_tienda.id_producto WHERE disponibilidad_tienda.id_tienda = $id AND LOWER(productos.nombre) LIKE LOWER ('%$f2%');";
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
      <th>Descripcion</th>
      <th>Tipo</th>
    </tr>
  <?php
	foreach ($unidades as $unidad) {
    #tipo = 'Comestible'
    #if (unidad[8] is NULL){
     # tipo = 'No comestible';
    #}
  	
      echo "<tr><td>  <form id = 'caja' action='show_producto.php' method='post'>
      <input name = 't' type='submit' value='$unidad[0]' id = 'botonID'>
      </form></td><td>$unidad[1]</td> <td>$unidad[2]</td><td>$unidad[3]</td><td> tipo </td></tr>";
	}
  ?>
	</table>

  <form id = 'caja' action="consultas_tienda.php" method="post">
  <input type="submit" value="Volver" id = "botonB">
  </form>


<?php include('templates/footer.html');