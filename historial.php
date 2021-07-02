<?php session_start(); ?>
<?php include('templates/header.html');   ?>
<?php include('templates/header_botones.html');   ?>

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

#botonID {
  background-color: #f3c733; 
  color: black; 
  height:30px; 
  width:38px;
  text-decoration: none; 
  border-radius: 8px; 
  font-size: 15px; 
  margin: 3px; 
  cursor: pointer;
}

#botonID:hover {
    border: none;
    background:#c29f29;
    color: #444444; 
    box-shadow: 0px 0px 1px #777;
    content: "ir";
}
</style>

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

    #id_compra | id_producto | cantidad | id_tienda | id  | id_usuario | direccion
    echo("<table class='center'>
    <tr>
    <th>fecha</th>
    <th>id_compra</th>
    <th>cantidad</th>
    <th>id_tienda</th>
    <th>id_producto</th>
    </tr>");

    foreach ($fechas as $fecha_compra){

        // Super JOIN
        //$query = "SELECT fecha, nombre, cantidad, id_tienda FROM (fechas JOIN carrito_compras ON id_compra = id_compra) JOIN productos AS p ON id_producto = p.id WHERE fecha = $fecha_compra;";
        $query = "SELECT * FROM carrito_compras AS cc JOIN compras AS c ON cc.id_compra = c.id WHERE c.id = $fecha_compra[1] AND c.id_usuario = $id_current_user;";

        // Ejecutamos las querys 
        $result = $db -> prepare($query);
        $result -> execute();
        $historial = $result -> fetchAll();

        foreach ($historial as $historia){
            echo("<tr> <td> $fecha_compra[0] </td> <td> $historia[0] </td> <td> $historia[2] </td> <td> $historia[3] </td> <td> $historia[1] </td></tr>");
        }
    }

    echo("<table>");


?>


<form id = 'caja' action="perfil.php" method="post">
      <input type="submit" value="Volver" id = "botonB">
      </form>
  <br>

<br>
DD de MM del 2021

</body>
</html>