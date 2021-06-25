<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

    echo("<br>Ejecutando procedimiento agregar_columna_clave()<br>");

    $query = "SELECT agregar_columna_clave(1);";

    $result = $db -> prepare($query);
    $result -> execute();
    $respuesta = $result -> fetchAll();

    print_r($respuesta);

?>

    <body>  
        
    </body>
</html>