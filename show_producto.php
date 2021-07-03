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

#$id = $unidades[0]['id'];
#if($id != ''){
 # echo( '<th>ID</th>');
 #$fila = $fila + '<td>' + $id + '</td>';
#}

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

$Alto = $unidades[0]['alto'];
if($Alto != ''){
  echo( '<th>Alto</th>');
 $fila = $fila + '<td>' + $Alto + '</td>';
}

$Ancho = $unidades[0]['ancho'];
if($Ancho != ''){
  echo( '<th>Ancho</th>');
 $fila = $fila + '<td>' + $Ancho + '</td>';
}

$Peso = $unidades[0]['peso'];
if($Peso != ''){
  echo( '<th>Peso</th>');
 $fila = $fila + '<td>' + $Peso + '</td>';
}

$Fecha_de_caducidad = $unidades[0]['fecha_de_caducidad'];
if($Fecha_de_caducidad != ''){
  echo( '<th>Fecha de caducidad</th>');
 $fila = $fila + '<td>' + $Fecha_de_caducidad + '</td>';
}

$Duracion_sin_refrigerar = $unidades[0]['duracion_sin_refrigerar'];
if($Duracion_sin_refrigerar != ''){
  echo( '<th>Duracion sin refrigerar</th>');
 $fila = $fila + '<td>' + $Duracion_sin_refrigerar + '</td>';
}

$Tipo_de_conserva = $unidades[0]['tipo_de_conserva'];
if($Tipo_de_conserva != ''){
  echo( '<th>Tipo de conserva</th>');
 $fila = $fila + '<td>' + $Tipo_de_conserva + '</td>';
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