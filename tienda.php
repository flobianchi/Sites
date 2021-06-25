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

<h2>Porfavor elija su tienda haciendo click en su id</h2>

<?php
#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("config/conexion.php");

$query = "SELECT t.id, t.nombre FROM tiendas AS t ORDER BY t.id;";

$result = $db -> prepare($query);
$result -> execute();
$dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo

echo(
"
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

<form id = 'caja' action='consultas_tienda.php' method='post'>
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