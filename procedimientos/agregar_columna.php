<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

    echo("<br>Ejecutando procedimiento agregar_columna_clave()<br>");

    $query = "SELECT agregar_columna_clave();";

    $result = $db -> prepare($query);
    $result -> execute();
    $result -> fetchAll();


    print_r($result);

?>

    <body>  
        
    </body>
</html>