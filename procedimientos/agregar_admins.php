<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header_procedimientos.html');

    #funcion para generar claves aleatoreas
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

    echo("<br>Ejecutando procedimiento agregar filas tabla administradores a usuarios<br>");
    // Primero obtenemos todos los pokemons de la tabla que queremos agregar
    $query = "SELECT a.nombre, a.rut, a.edad, a.sexo, a.calificacion, u.id_direccion FROM administrativos AS a JOIN unidades AS u ON a.id_unidad = u.id_unidad;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $admins = $result -> fetchAll();


    foreach ($admins as $admin){

        #consulta para agregar usuarios admin
        $query = "SELECT agregar_usuario('$admin[0]'::varchar,'$admin[1]'::varchar,$admin[2],'$admin[3]'::varchar,'$admin[4]'::varchar, $admin[5]);";

        $result = $db -> prepare($query);
        $result -> execute();
        $result -> fetchAll();

        #tomar respuesta de la consulta agregar_usuario, si el usuario fue agregado (es decir tiene un id >= 0), entonces le creamos una clave random
        $id_nuevo = $result[0]['agregar_usuario'];
        echo("nuevo_id es $id_nuevo");
        #$clave = generateRandomString(8);
        #$query2 = "SELECT cambiar_clave($p[0],'$clave');";
        #$result2 = $db -> prepare($query2);
        #$result2 -> execute();
    }

    // Mostramos los cambios en una nueva tabla
    $query = "SELECT * FROM usuarios ORDER BY id, calificacion;";
    $result = $db -> prepare($query);
    $result -> execute();
    $usuarios = $result -> fetchAll();

?>

    <body>  
        <table class='table'>
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Rut</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Clave</th>
                <th>Calificacion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    for ($i = 0; $i < 7; $i++) {
                        echo "<td>$usuario[$i]</td> ";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
</html>