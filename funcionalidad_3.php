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

<?php
  #$id es id de tienda
  $idproducto = $_SESSION['f3_id'];
  $cantidad = $_SESSION['f3_cant'];
  $id_current_user = $_SESSION['id_user'];
  # direcciones de usuario

  require("config/conexion.php");

  // $direccion_despacho =  "SELECT chequear_despacho($id, $id_current_user)"
  $consulta_diponibilidad = "SELECT chequear_disponibilidad($id, $idproducto);";
  $result4 = $db -> prepare($consulta_diponibilidad);
  $result4 -> execute();
  $dataCollected = $result4 -> fetchAll();
  $check_diponibilidad = $dataCollected[0]['chequear_disponibilidad'];


  $query1 = "SELECT direcciones.nombre FROM direcciones, direcciones_usuarios WHERE direcciones.id = direcciones_usuarios.direccion_usuario AND direcciones_usuarios.direccion_usuario = $id_current_user;";
  $result1 = $db -> prepare($query1);
  $result1 -> execute();
  $direccion = $result1 -> fetchAll();

  if ($check_diponibilidad == TRUE){
    echo("SI HAY DE ESTE PRODUCTO");
    foreach ($direccion as $d){
      $consulta_despacho =  "SELECT chequear_despacho2($id, $id_current_user, $d);";
      $result5 = $db -> prepare($consulta_despacho);
      $result5 -> execute();
      $dataCollected2 = $result5 -> fetchAll();
      $check_despacho = $dataCollected2[0]['chequear_despacho2'];
    }
        if ($check_despacho == TRUE){
        $query = "SELECT insertar_compra($id_current_user, $$direccion_despacho);";
        $result = $db -> prepare($query);
        $result -> execute();
        $retorno = $result -> fetchAll();;

        $query2 = "SELECT insertar_carrito_compra($idproducto, $cantidad, $id);";
        $result2 = $db -> prepare($query2);
        $result2-> execute();
        $retorno2 = $result2 -> fetchAll();;
      }else{
        echo("No hay cobertura para tu zona");
  }
  }
  else{
      echo("No hay stock de este producto en esta tienda");
  }
  $query6 = "SELECT carrito_compras.id_compra, carrito_compras.id_producto, carrito_compras.cantidad, carrito_compras.id_tienda FROM carrito_compras, compras WHERE carrito_compras.id_compra = compras.id AND compras.id_usuario = $id_current_user;";
  $result6 = $db -> prepare($query6);
  $result6 -> execute();
  $ultimas_compras = $result6 -> fetchAll();
 
?>

<table class="center">
    <tr>
      <th>ID Compra</th>
      <th>ID Producto</th>
      <th>Cantidad</th>
      <th>ID Tienda</th>
    </tr>
    <?php
	foreach ($ultimas_compras as $compra) {
	
    echo "<tr><td>  <form id = 'caja' action='show_producto.php' method='post'>
    <input name = 't' type='submit' value='$compra[1]' id = 'botonID'>
    </form></td><td>$compra[0]</td> <td>$compra[2]</td><td>$compra[3]</td><td>";
	}
  ?>
	</table>

  <br>
  <form id = 'caja' action="consultas_tienda.php" method="post">
  <input type="submit" value="Volver" id = "botonB">
  </form>


<?php include('templates/footer.html');