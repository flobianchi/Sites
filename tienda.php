<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>


<h2>Porfavor elija su tienda</h2>

<form id = 'caja' action="consultas_tienda.php" method="post">
      <input type="submit" value="Elegir tienda" id = "botonB">
      </form>


<?php
#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");

$query = "SELECT t.id, t.nombre FROM tiendas AS t ORDER BY t.id;";

$result = $db -> prepare($query);
$result -> execute();
$dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo

echo(
"Test tabla clickeable.
<br>
<br>
Muestra todas las tiendas y tiene ID clickeable

</div>
<div></div>
<div></div> 
</div>

<p style='font-size:50px;'></p>
<table class='center'>
<tr>
<th>id tienda</th>
<th>Tienda</th>
</tr>");


foreach ($dataCollected as $p) {
echo "<tr> <td> 

<form id = 'caja' action='resultado.php' method='post'>
<input name = 't' type='submit' value='$p[0]' id = 'botonID'>
</form>


</td> <td>$p[1]</td> </tr>";
}

echo("<table>");
?>
<br>

<br>
DD de MM del 2021

</body>
</html>