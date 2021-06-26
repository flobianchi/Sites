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

  $tipo = strtolower($_POST['tipo']);

  $va_not = "";
  if($tipo == 'comestible'){
        $va_not = "NOT";}

    $query = "SELECT DISTINCT(t.id), t.nombre FROM (tiendas AS t JOIN disponibilidad_tienda AS d ON t.id = d.id_tienda) JOIN productos AS p ON p.id = d.id_producto WHERE p.fecha_de_caducidad IS $va_not NULL ORDER BY t.id;";

      $result = $db -> prepare($query);
      $result -> execute();
      $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo

      echo(
      "Consulta 3: Buscar tiendas que venden al menos un producto de la categoría $tipo
      
      <form action='../index.php' method='get'>
      <p style='font-size:10px;'></p>
      <input type='submit' value='Volver' id = 'botonB'>
      </form>
      
      </div>
      <div></div>
      <div></div> 
      </div>
      
      <p style='font-size:50px;'></p>
      <table class='center'>
      <tr>
      <th>id tienda</th>
      <th>Nombre tienda</th>
      </tr>");
      

      foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td> </tr>";
      }

      echo("<table>");

  ?>


<?php include('../templates/footer.html'); ?>