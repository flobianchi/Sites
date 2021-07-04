<?php session_start(); ?>
<?php include('templates/header.html');   ?>
<?php include('login.php');   ?>
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

<?php   

    
$nombre = $_SESSION['name_user'];

echo("<h2>Hola $nombre, este es tu historial de compras</h2>");

$id_current_user = $_SESSION['id_user'];

    #id_compra | id_producto | cantidad | id_tienda | id  | id_usuario | direccion
    echo("<table class='center'>
    <tr>
    <th>ID Compra</th>
    <th>ID Producto</th>
    <th>Nombre Producto</th>
    <th>Cantidad</th>
    <th>Precio</th>
    <th>ID Tienda</th>
    <th>Nombre Tienda</th>
    </tr>");


    // Nos conectamos a las bdds
    require("config/conexion.php");

        // Super JOIN
        // fecha_despacho[1] = id_compra
        //$query = "SELECT fecha, nombre, cantidad, id_tienda FROM (fechas JOIN carrito_compras ON id_compra = id_compra) JOIN productos AS p ON id_producto = p.id WHERE fecha = $fecha_compra;";
        // cc.id_compra, cc.id_producto, p.nombre, cc.cantidad, p.precio, cc.id_tienda, t.nombre
        $query = "SELECT cc.id_compra, cc.id_producto, p.nombre, cc.cantidad, p.precio, cc.id_tienda, t.nombre 
        FROM ((carrito_compras AS cc JOIN compras AS c ON cc.id_compra = c.id) JOIN productos AS p ON p.id = cc.id_producto)
        JOIN tiendas AS t ON cc.id_tienda = t.id WHERE c.id_usuario = $id_current_user ORDER BY cc.id_compra DESC;";

        // Ejecutamos las querys 
        $result = $db -> prepare($query);
        $result -> execute();
        $historial = $result -> fetchAll();

        foreach ($historial as $h) {
           echo "<tr>";
           for ($i = 0; $i < 7; $i++) {
                echo "<td>$h[$i]</td> ";
            }
            echo "</tr>";
         }



    echo("<table>");


?>
<br>
<br>
<form id = 'caja' action="perfil.php" method="post">
      <input type="submit" value="Volver" id = "botonB">
      </form>


<?php include('templates/footer.html');