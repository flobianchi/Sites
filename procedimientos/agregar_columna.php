<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header_procedimientos.html');

    echo("<br>Ejecutando procedimiento agregar_columna_clave()<br>Este procedimiento agrega el atributo clave en la realacion usuarios <br> solo si es que el atributo se encuentra en la relacion <br>");
    echo("<br><br>");
    $query = "SELECT agregar_columna_clave();";

    $result = $db -> prepare($query);
    $result -> execute();
    $respuesta = $result -> fetchAll();

    $se_agrego = $respuesta[0]['agregar_columna_clave'];
    if($se_agrego){
        echo("se agrego la columna clave y se generaron claves random para en cada usuario");

        $query = "SELECT id FROM usuarios;";

        $result = $db -> prepare($query);
        $result -> execute();
        $respuesta = $result -> fetchAll();

        foreach ($respuesta as $p) {
            $clave = generateRandomString(8);
            $query2 = "SELECT cambiar_clave($p[0],'$clave');";
            $result2 = $db -> prepare($query2);
            $result2 -> execute();
      }

    }else{
        echo("la columna clave ya existe, por lo tanto no fue necesario agregarla");
    }


?>

    <body>  
        
    </body>
</html>