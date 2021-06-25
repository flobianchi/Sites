<?php

    require("../config/conexion.php");
    include('../templates/header_procedimientos.html');

    echo("
    <br>
    <h1>Creador de claves random</h1>
    <br>");

    $query = "SELECT id FROM usuarios;";

    $result = $db -> prepare($query);
    $result -> execute();
    $respuesta = $result -> fetchAll();

    print_r($respuesta);

    foreach ($respuesta as $p) {
        $query2 = "SELECT cambiar_clave($p[0],'2');";
        $result2 = $db -> prepare($query2);
        $result2 -> execute();
      }
    
    echo("
    <br>
    <h2>Claves creadas con exito</h2>
    <br>");
    

?>

    
        
    </body>
</html>