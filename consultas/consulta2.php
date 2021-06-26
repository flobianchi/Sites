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

      $query = "SELECT trab.nombre, d.comuna FROM (tiendas AS t JOIN direcciones AS d ON t.direccion = d.id) JOIN trabajadores as trab on t.id_jefe = trab.id WHERE d.comuna LIKE '%$comuna%' ORDER BY d.comuna;";

      $result = $db -> prepare($query);
      $result -> execute();
      $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
      
      

      if(count($dataCollected) > 0)
      {
      if($comuna == $dataCollected[0][1]){
        echo(
          "Consulta 2: Buscar todos los jefes de la comuna $comuna
          
          <form action='../index.php' method='get'>
          <p style='font-size:10px;'></p>
          <input type='submit' value='Volver' id = 'botonB'>
          </form>
          
          </div>
          <div></div>
          <div></div> 
          </div>
          
          <p style='font-size:20px;'></p>
          <table class='center'>
          <tr>
          <th>Nombre jefe</th>
          </tr>");
          
    
          foreach ($dataCollected as $p) {
            echo "<tr> <td>$p[0]</td> </tr>";
          }
    
          echo("<table>");
      }
      else
      {

      
      echo(
      "Consulta 2: Buscar todos los jefes de comunas cuyos nombres contienen $comuna
      
      <form action='../index.php' method='get'>
      <p style='font-size:10px;'></p>
      <input type='submit' value='Volver' id = 'botonB'>
      </form>
      
      </div>
      <div></div>
      <div></div> 
      </div>
      
      <p style='font-size:45px;'></p>
      <table class='center'>
      <tr>
      <th>Nombre jefe</th>
      <th>Comuna</th>
      </tr>");
      

      foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td> </tr>";
      }

      echo("<table>");
    }
    
    
    
    
    }
      else{
        echo("Consulta 2: Buscar todos los jefes de la comuna $comuna o de comunas que contengan $comuna</div>
        <div></div>
        <div></div> 
        </div>
        No hay tiendas en la comuna $comuna, ni comunas que contengan $comuna en su nombre, según la base de datos.
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