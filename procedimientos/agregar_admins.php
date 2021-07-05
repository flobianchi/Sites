<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header_procedimientos.html');

?>

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



tr:nth-child(even) {
    background-color: #f2f2f2;
    padding: 8px;
}

tr:hover {
    background-color: #9bf6ff;
    padding: 8px;
}

.center {
  margin-left: auto;
  margin-right: auto;
}

}
</style>

<?php

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

    echo("<br>Ejecutando procedimiento para agregar informacion de personas de la tabla administradores a tabla usuarios,<br>si es que todavia no estan inscritos en la tabla usuarios<br>");
    // Primero obtenemos todos los pokemons de la tabla que queremos agregar
    $query = "SELECT a.nombre, a.rut, a.edad, a.sexo, a.calificacion, u.id_direccion FROM administrativos AS a JOIN unidades AS u ON a.id_unidad = u.id_unidad;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $admins = $result -> fetchAll();


    foreach ($admins as $admin){

        #consulta para agregar usuarios admin
        $query = "SELECT agregar_usuario('$admin[0]'::varchar,'$admin[1]'::varchar,$admin[2],'$admin[3]'::varchar, $admin[5]);";

        $result = $db -> prepare($query);
        $result -> execute();
        $result = $result -> fetchAll();

        #tomar respuesta de la consulta agregar_usuario, si el usuario fue agregado (es decir tiene un id >= 0), entonces le creamos una clave random
        $id_nuevo = $result[0]['agregar_usuario'];

        if($id >= 0){
            $clave = generateRandomString(8);
            $query2 = "SELECT cambiar_clave($p[0],'$clave');";
            $result2 = $db -> prepare($query2);
            $result2 -> execute();
        }
        
    }

    // Mostramos los cambios en una nueva tabla
    $query = "SELECT * FROM usuarios ORDER BY id";
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
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    for ($i = 0; $i < 6; $i++) {
                        echo "<td>$usuario[$i]</td> ";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </body>

<br>
    <body>  
        <table class='table'>
            <thead>
                <tr>
                <th>Rut</th>
                <th>Clave</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td>$usuario[2]</td> <td>$usuario[5]</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </body>

</html>