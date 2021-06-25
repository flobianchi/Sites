<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>

<?php session_start();
echo $_SESSION["rut_user"];
/*session was getting*/
?>

Esta es la pagina perfil
<br>
Atributos del user aqui

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("config/conexion.php");

$query = "SELECT u.id, u.nombre, u.rut, u.edad, u.sexo FROM usuarios AS u 
WHERE u.rut = $rut_user

$result = $db -> prepare($query);
$result -> execute();
$dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo

echo("
<form action='../index.php' method='get'>
<p style='font-size:10px;'></p>
</form>

<p style='font-size:50px;'></p>
<table class='center'>
<tr>
<th>ID Usuario</th>
<th>Nombre</th>
<th>RUT</th>
<th>Edad</th>
<th>Sexo</th>
</tr>");


foreach ($dataCollected as $p) {
echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> </tr>";
}

echo("<table>");
  
  ?>


<br>
Si es admin mostrar mas info aqui

<form id = 'caja' action="historial.php" method="post">
      <input type="submit" value="Historial" id = "botonB">
</form>
<br>

<form id = 'caja' action="clave.php" method="post">
<input type="text" class="form-control" placeholder="nueva clave" style="font-size:19px;" size = 15 name = 'comuna'>
      <input type="submit" value="Cambiar clave" id = "botonB">
</form>
<br>
<form id = 'caja' action="tienda.php" method="post">
      <input type="submit" value="Volver" id = "botonB">
</form>
<br>
DD de MM del 2021

</body>
</html>