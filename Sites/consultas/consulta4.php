<?php include('../templates/header.html');   ?>


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

tr:hover {
    background-color: #f5f5f5;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
    padding: 8px;
}
</style>

<div class="grid-titulo">
  <div></div>
  <div><img src="../styles/banana.gif" width="170" height="170"></div>
  <div> <h1> Bases de datos </h1> </div>
  <div><img src="../styles/banana.gif" width="170" height="170"></div>
  <div></div>
  <div></div>
  <div></div>
  <div> <h3> Grupo 53, Entrega 2 </h3> 
        

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $descripcion = strtolower($_POST['descripcion']);
  if($descripcion != ''){

      $query = "SELECT DISTINCT(u.id), u.nombre, p.descripcion FROM ((usuarios AS u JOIN compras AS comp ON u.id = comp.id_usuario) JOIN carrito_compras AS cc ON comp.id = cc.id_compra) JOIN productos AS p ON cc.id_producto = p.id WHERE p.descripcion LIKE '%$descripcion%' ORDER BY u.id;";

      $result = $db -> prepare($query);
      $result -> execute();
      $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo

      if(count($dataCollected) > 0)
      {

      echo(
      "Consulta 4: Buscar todos los usuarios que compraron productos cuya descripción o parte de ella es '$descripcion'
      
      <form action='../index.php' method='get'>
      <p style='font-size:10px;'></p>
      <input type='submit' value='Volver' id = 'botonB'>
      </form>
      
      </div>
      <div></div>
      <div></div> 
      </div>
      
      <p style='font-size:80px;'></p>
      <table class='center'>
      <tr>
      <th>id usuario</th>
      <th>Nombre usuario</th>
      <th>Descripción</th>
      </tr>");
      

      foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> </tr>";
      }

      echo("<table>");

    }




      else{
        echo("Consulta 4: Buscar todos los usuarios que compraron productos cuya descripción o parte de ella es '$descripcion'</div>
        <div></div>
        <div></div> 
        </div>
        <p style='font-size:25px;'></p>
        No existen compras por parte de usuarios con productos cuya descripcion o parte de ella sea '$descripcion'.
        <br>
        <br>
        <img src='../styles/coyote.gif' width='576' height='384'>");
      }
  }
  else{
    echo("Porfavor ingrese una descripción
    </div>
    <div></div>
    <div></div> 
    </div>
    <img src='../styles/coyote.gif' width='576' height='384'>");
  }
  
  ?>


<?php include('../templates/footer.html'); ?>