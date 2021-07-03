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
echo('<table>
<tr>');
$fila = '<tr>'

$id = $unidades[0]['id'];
if($id != ''){
  echo( '<th>ID</th>');
 $fila = $fila + '<td>' + $id + '</td>';
}

$Precio = $unidades[0]['precio'];
if($Precio != ''){
  echo( '<th>Precio</th>');
 $fila = $fila + '<td>' + $Precio + '</td>';
}

$Descripcion = $unidades[0]['descripcion'];
if($Descripcion != ''){
  echo( '<th>Descripcion</th>');
 $fila = $fila + '<td>' + $Descripcion + '</td>';
}

$Largo = $unidades[0]['largo'];
if($Largo != ''){
  echo( '<th>Largo</th>');
 $fila = $fila + '<td>' + $Largo + '</td>';
}

echo('</tr>');
$fila = $fila + '</tr>';
echo($fila);
  ?>

	</table>

  <form id = 'caja' action="consultas_tienda.php" method="post">
      <input type="submit" value="Volver a las consultas" id = "botonB">
      </form>

<br>
DD de MM del 2021

</body>
</html>