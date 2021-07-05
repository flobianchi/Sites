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
      $query = "SELECT usuarios.id, usuarios.nombre, usuarios.rut, usuarios.edad, usuarios.sexo, usuarios.calificacion FROM usuarios WHERE usuarios.rut = '$rut_user';";

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

      $query = "SELECT direcciones.nombre_direccion, direcciones.comuna FROM usuarios, direcciones_usuarios, direcciones WHERE usuarios.id =direcciones_usuarios.id_usuario AND direcciones_usuarios.direccion_usuario = direcciones.id AND usuarios.rut = '$rut_user';";

      $result = $db -> prepare($query);
      $result -> execute();
      $dataCollected2 = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
      

      echo("<h3>Estas son tus direcciones</h3>");

      echo("

      <table class='center'>
      <tr>
      <th>Direccion</th>
      <th>Comuna</th>
      </tr>");
      
      foreach ($dataCollected2 as $p) {
      echo "<tr>  <td>$p[0]</td><td>$p[1]</td></tr>";
      }
      
      echo("<table>");

      $id_current_user = $dataCollected[0]['id'];
      $_SESSION['id_user'] = $id_current_user;


      echo("<br>");

      $es_admin = false;
      #---------------------------revisar si es administrador---------------------------------------
                    $query = "SELECT rut FROM administrativos WHERE CALIFICACION = 'administracion';";
                    $result = $db2 -> prepare($query);
                    $result -> execute();
                    $admins = $result -> fetchAll();

                    foreach ($admins as $rut_consulta_administrativos){
                        if($rut_user == $rut_consulta_administrativos[0]){
                            $es_admin = true;
                        }
                    }
                    
      if($es_admin){

        #----------------------------caso administracion-----------------------------------------------

        $query = "SELECT a.id_unidad FROM administrativos AS a JOIN unidades AS u ON a.id_unidad = u.id_unidad WHERE a.rut = '$rut_user';";

        $result = $db2 -> prepare($query);
        $result -> execute();
        $dataCollected= $result -> fetchAll(); 
        $id_unidad_consultada = $dataCollected[0]['id_unidad'];

        echo("<h3>Eres jefe de la unidad $id_unidad_consultada a continuación se mostrarán los trabajadores pertenecientes a tu unidad </h3>");
        //id_personal;id_unidad;nombre;rut;sexo;edad;clasificacion
        $query = "SELECT a.id_unidad, a.nombre, a.rut, a.sexo, a.edad, a.calificacion 
        FROM administrativos AS a JOIN unidades AS u ON a.id_unidad = u.id_unidad 
        WHERE a.id_unidad = '$id_unidad_consultada' ORDER BY a.calificacion;";

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
<h3>Para cambiar tu clave o contraseña debes ingrear una nueva clave</h3>
<form id = 'caja' action="clave.php" method="post">
<input type="text" class="form-control" placeholder="clave anterior" style="font-size:19px;" size = 15 name = 'clave_vieja'>
<input type="text" class="form-control" placeholder="nueva clave" style="font-size:19px;" size = 15 name = 'nueva_clave'>
      <input type="submit" value="Cambiar" id = "botonB">
</form>
<br>
<br>
<h3>Para volver al menú de elección de tienda, debes hacer click aqui</h3>
<form id = 'caja' action="tienda.php" method="post">
      <input type="submit" value="Volver a tiendas" id = "botonL">
</form>

<?php include('templates/footer.html');