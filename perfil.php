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
</style>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("config/conexion.php");

      $rut_user = $_SESSION['rut_user'];
      $query = "SELECT u.id, u.nombre, u.rut, u.edad, u.sexo, u.calificacion FROM usuarios AS u WHERE u.rut = '$rut_user';";

      $result = $db -> prepare($query);
      $result -> execute();
      $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo

      $nombre = $dataCollected[0]['nombre'];
      $_SESSION['name_user'] = $nombre;
      
      echo("<h2>Hola $nombre este es tu perfil</h2>");

      echo("

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

      $id_current_user = $dataCollected[0]['id'];
      $_SESSION['id_user'] = $id_current_user;


      echo("<br>");

      $calificacion = $dataCollected[0]['calificacion'];
      if($calificacion == 'administracion'){
        echo("El usuario es del tipo administracion, mostrar datos aqui");
      }else{
        echo("El usuario no es del tipo administracion, no es necesario mostrar datos aqui");
      }

      ?>


<br>

<form id = 'caja' action="historial.php" method="post">
      <input type="submit" value="Historial" id = "botonB">
</form>
<br>

<form id = 'caja' action="clave.php" method="post">
<input type="text" class="form-control" placeholder="nueva clave" style="font-size:19px;" size = 15 name = 'nueva_clave'>
      <input type="submit" value="Cambiar clave" id = "botonB">
</form>
<br>
<form id = 'caja' action="tienda.php" method="post">
      <input type="submit" value="Volver" id = "botonB">
</form>

<?php include('templates/footer.html');