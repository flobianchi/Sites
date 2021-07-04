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

        #----------------------------caso administracion-----------------------------------------------

        $query = "SELECT a.id_unidad FROM administrativos AS a JOIN unidades AS u ON a.id_unidad = u.id_unidad WHERE a.rut = '$rut_user';";

        $result = $db2 -> prepare($query);
        $result -> execute();
        $id_unidad_consultada = $result -> fetchAll(); 

        echo("El usuario es del tipo administracion de la unidad $id_unidad_consultada, mostrar datos aqui:");
        //id_personal;id_unidad;nombre;rut;sexo;edad;clasificacion
        $query = "SELECT a.id_unidad, a.nombre, a.rut, a.sexo, a.edad, a.calificacion FROM administrativos AS a JOIN unidades AS u ON a.id_unidad = u.id_unidad WHERE a.id_unidad = '$id_unidad_consultada';";

        $result = $db2 -> prepare($query);
        $result -> execute();
        $info_admins = $result -> fetchAll(); 


        echo("

        <table class='center'>
        <tr>
        <th>ID Unidad</th>
        <th>Nombre Personal</th>
        <th>RUT</th>
        <th>Sexo</th>
        <th>Edad</th>
        <th>Clasificación</th>
        </tr>");
        
        foreach ($info_admins as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> </tr>";
        }
        
        echo("<table>");

      }
      ?>


<br>
<h3>Puedes ver tu historial de compras aquí</h3>
<form id = 'caja' action="historial.php" method="post">
      <input type="submit" value="Historial" id = "botonB">
</form>
<br>
<br>
<h3>Para cambiar tu clave debes ingrear una nueva clave</h3>
<form id = 'caja' action="clave.php" method="post">
<input type="text" class="form-control" placeholder="nueva clave" style="font-size:19px;" size = 15 name = 'nueva_clave'>
      <input type="submit" value="Cambiar" id = "botonB">
</form>
<br>
<br>
<h3>Para volver al menú de elección de tienda, debes hacer click en volver</h3>
<form id = 'caja' action="tienda.php" method="post">
      <input type="submit" value="Volver" id = "botonB">
</form>

<?php include('templates/footer.html');