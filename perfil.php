<?php session_start(); ?>
<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>


Esta es la pagina perfil
<br>
Atributos del user aqui

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("config/conexion.php");

      $rut_user = $_SESSION['rut_user'];
      echo("el usuario es $rut_user");
      $query = "SELECT u.id, u.nombre, u.rut, u.edad, u.sexo FROM usuarios AS u 
      WHERE u.rut = $rut_user;";

      $result = $db -> prepare($query);
      $result -> execute();
      $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo

      print_r($result);
  
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