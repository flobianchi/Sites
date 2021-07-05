<?php

    require("../config/conexion.php");
    include('../templates/header_procedimientos.html');

    #https://stackoverflow.com/questions/4356289/php-random-string-generator
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    echo("
    <br>
    <h1>Creador de claves random</h1>
    <br>");

    $query = "SELECT id FROM usuarios;";

    $result = $db -> prepare($query);
    $result -> execute();
    $respuesta = $result -> fetchAll();

    foreach ($respuesta as $p) {
        $clave = generateRandomString(8);
        echo("<br> $p[0] -> $clave");
        $query2 = "SELECT cambiar_clave($p[0],'$clave');";
        $result2 = $db -> prepare($query2);
        $result2 -> execute();
      }
    
    echo("
    <h2>Claves creadas con exito</h2>
    <br>");
    

?>

    
        
    </body>
</html>

