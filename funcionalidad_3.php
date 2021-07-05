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
  session_start(); 
  $post_roducto = $_POST['f3_id']; 
  $post_cantidad = $_POST['f3_cant']; 

  $_SESSION['id_f3'] = $post_roducto;
  $_SESSION['cant_f3'] = $post_cantidad;   
  #$id es id de tienda
  $idproducto = $_SESSION['id_f3'];
  $cantidad = $_SESSION['cant_f3'];
  $id_current_user = $_SESSION['id_user'];
  $id = $_SESSION['id_tienda'];

  # direcciones de usuario

  require("config/conexion.php");


  $consulta_diponibilidad = "SELECT chequear_disponibilidad($id, $idproducto);";
  $result4 = $db -> prepare($consulta_diponibilidad);
  $result4 -> execute();
  $dataCollected = $result4 -> fetchAll();
  $check_diponibilidad = $dataCollected[0]['chequear_disponibilidad'];

  $query1 = "SELECT direcciones.comuna FROM direcciones JOIN direcciones_usuarios ON direcciones.id = direcciones_usuarios.direccion_usuario WHERE direcciones_usuarios.id_usuario = $id_current_user;";
  $result1 = $db -> prepare($query1);
  $result1 -> execute();
  $comuna = $result1 -> fetchAll();

  if ($check_diponibilidad == TRUE) {
    $compras = 0;
    foreach ($comuna as $c){
      if ($compras == 0){
        echo('si entra al if compras');

        $consulta_despacho = "SELECT chequear_despacho2($id, $id_current_user, '$c[0]'::varchar);";
        $result5 = $db -> prepare($consulta_despacho);
        $result5 -> execute();
        $dataCollected = $result5 -> fetchAll();
        $check_despacho = $dataCollected[0]['chequear_despacho2'];
        
        
        $query6 = "SELECT direcciones.id FROM direcciones JOIN direcciones_usuarios ON direcciones.id = direcciones_usuarios.direccion_usuario WHERE direcciones_usuarios.id_usuario = $id_current_user AND direcciones.comuna = $c[0] LIMIT 1;";
        $result6 = $db -> prepare($query6);
        $result6 -> execute();
        $direccion_mala = $result6 -> fetchAll();
      
        if ($check_despacho == TRUE){
          echo('si entra al if despacho');
          $query = "SELECT insertar_compra($id_current_user, $direccion);";
          $result = $db -> prepare($query);
          $result -> execute();
          $retorno = $result -> fetchAll();

          $query2 = "SELECT insertar_carrito_compra($idproducto, $cantidad, $id);";
          $result2 = $db -> prepare($query2);
          $result2-> execute();
          $retorno2 = $result2 -> fetchAll();
          echo("Tu compra se ha realizado con exito!");
          $compras = 1;
        

        }else{
          echo("Si tenemos este producto, pero lamentablemente no hay cobertura para tu zona");
        }    
  
      }
    }
  
  }else{
      echo("No hay stock de este producto en esta tienda");
  }
   
?>

  <br>
  <form id = 'caja' action="consultas_tienda.php" method="post">
  <input type="submit" value="Volver" id = "botonB">
  </form>
  
  <h3>Puedes ver tu historial de compras aquí</h3>
  <form id = 'caja' action="historial_desde_tiendas.php" method="post">
  <input type="submit" value="Historial" id = "botonB">
  </form>

<?php include('templates/footer.html');