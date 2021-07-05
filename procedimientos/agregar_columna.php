<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header_procedimientos.html');

    echo("<br>Ejecutando procedimiento agregar_columna_clave()<br>Este procedimiento agrega el atributo clave en la realacion usuarios solo si no existe <br>");

    $query = "SELECT agregar_columna_clave();";

    $result = $db -> prepare($query);
    $result -> execute();
    $respuesta = $result -> fetchAll();

    $se_agrego = $respuesta[0]['agregar_columna_clave'];
    echo("se agrego una columna? -> $se_agrego");

    #echo("<br>Ejecutando procedimiento agregar_columna_calificacion()<br>");

    #$query = "SELECT agregar_columna_calificacion(1);";

    #$result = $db -> prepare($query);
    #$result -> execute();
    #$respuesta = $result -> fetchAll();

    #print_r($respuesta);

?>

    <body>  
        
    </body>
</html>