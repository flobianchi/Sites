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

  $comuna = strtolower($_POST['comuna']);
  if($comuna != ''){

      $query = "SELECT AVG(trab.edad)::NUMERIC(10,2), d.comuna FROM (tiendas AS t JOIN direcciones AS d ON t.direccion = d.id) JOIN trabajadores as trab on t.id = trab.id_tienda WHERE d.comuna LIKE '%$comuna%' GROUP BY d.comuna;";

      $result = $db -> prepare($query);
      $result -> execute();
      $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
      

      if($dataCollected[0][0] > 0)
      {

      echo(
      "Consulta 5: Calcular edad promedio de los trabajdores de tiendas");
      if(count($dataCollected) > 1){
        echo "cuya comuna contiene '$comuna' en su nombre";
      }
      else{
        echo "ubicadas en la comuna $comuna";
      }
      
      echo("
      </div>
      <div></div>
      <div></div> 
      </div>

      <p style='font-size:30px;'></p>
      <table class='center'>
      <tr> <th>Promedio</th>");
      
      $mas_de_una = false;
      if(count($dataCollected) > 1){
        echo("<th>Comuna</th>");
        $mas_de_una = true;
      }
      
      echo("</tr>");
      

      foreach ($dataCollected as $p) {
        if($mas_de_una){
          echo "<tr> <td>$p[0]</td> <td>$p[1]</td> </tr>";
        }else{
          echo "<tr> <td>$p[0]</td> </tr>";
        }
        
      }

      echo("<table>");}
      else{
        echo("Consulta 5: Calcular edad promedio de los trabajdores en tiendas ubicadas en la comuna $comuna</div>
        <div></div>
        <div></div> 
        </div>
        <p style='font-size:30px;'></p>
        No hay tiendas en la comuna $comuna según la base de datos.
        <br>
        <br>
        <img src='../styles/coyote.gif' width='576' height='384'>");
      }
  }
  else{
    echo("Porfavor ingrese una comuna
    </div>
    <div></div>
    <div></div> 
    </div>
    <img src='../styles/coyote.gif' width='576' height='384'>");
  }
  
  ?>


<?php include('../templates/footer.html'); ?>