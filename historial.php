<?php session_start(); ?>
<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>

<body>  
Mostar historial de compras aqui (carrito)

<?php

    $id_current_user = $_SESSION['id_user'];

    // Nos conectamos a las bdds
    require("config/conexion.php");

    // Primero obtenemos las fechas de las compras de la tabla DESPACHOS de bd2
    $query = "SELECT fecha, id_compra FROM Despachos ORDER BY fecha;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $fechas = $result -> fetchAll();

    echo("<br> $id_current_user </br>");

    foreach ($fechas as $fecha_compra){

        // Super JOIN
        //$query = "SELECT fecha, nombre, cantidad, id_tienda FROM (fechas JOIN carrito_compras ON id_compra = id_compra) JOIN productos AS p ON id_producto = p.id WHERE fecha = $fecha_compra;";
        echo("<br> $fecha_compra[1] </br>");
        $query = "SELECT * FROM carrito_compras AS cc JOIN compras AS c ON cc.id_compra = c.id WHERE c.id = $fecha_compra[1] AND cc.id_usuario = $id_current_user;";

        // Ejecutamos las querys 
        $result = $db -> prepare($query);
        $result -> execute();
        $historial = $result -> fetchAll();

        foreach ($historial as $historia){
            echo("<br>$fecha_compra[0]  $fecha_compra[1] $historia[0] </br>");
        }
    }


?>


<form id = 'caja' action="perfil.php" method="post">
      <input type="submit" value="Volver" id = "botonB">
      </form>
  <br>

<br>
DD de MM del 2021

</body>
</html>