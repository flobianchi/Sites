<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header_procedimientos.html');

    echo("<br>Ejecutando procedimiento agregar filas tabla administradores a usuarios<br>");
    echo("HOLA HOLA HOLA")

    // Primero obtenemos todos los pokemons de la tabla que queremos agregar
    $query = "SELECT a.nombre, a.rut, a.edad, a.sexo, a.calificacion, u.id_direccion FROM administrativos AS a JOIN unidades AS u ON a.id_unidad = u.id_unidad;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $admins = $result -> fetchAll();


    foreach ($admins as $admin){

        $query = "SELECT agregar_usuario('$admin[0]'::varchar,'$admin[1]'::varchar,$admin[2],'$admin[3]'::varchar,'$admin[4]'::varchar, $admin[5]);";

        // Ejecutamos las querys para efectivamente insertar los datos
        $result = $db -> prepare($query);
        $result -> execute();
        $result -> fetchAll();
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