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

Esta es la pagina que intenta realizar la compra
<br>
No esta disponible, o (consulta)
<br>
No tiene cobertura, o (consulta)
<br>
se agrego exitosamente (funcion para grabar en BDD)
<br>

<?php
  #$id es id de tienda
  $idproducto = $_SESSION['f3_id'];
  $cantidad = $_SESSION['f3_cant'];
  $idcompra = ("SELECT MAX id FROM compras;") + 1;
  $id_current_user = $_SESSION['id_user'];
  # direcciones de usuario

  // $direccion_despacho =  "SELECT chequear_despacho($id, $id_current_user)"
  $check_diponibilidad = "SELECT chequear_disponibilidad($id, $idproducto)"

  $query = "SELECT direcciones.nombre FROM direcciones, direcciones_usuarios WHERE direcciones.id = direcciones_usuarios.direccion_usuario AND direcciones_usuarios.direccion_usuario = $id_current_user;";
  $result = $db -> prepare($query);
  $result -> execute();
  $respuesta = $result -> fetchAll();

  if ($check_diponibilidad == TRUE){
    foreach ($respuesta as $d) {
      $check_despacho =  "SELECT chequear_despacho2($id, $id_current_user, $d)"
        if $check_despacho == TRUE
        $query = "SELECT insertar_compra($idcompra, $id_current_user, $$direccion_despacho);";
        $result = $db -> prepare($query);
        $result -> execute();
        $retorno = $result -> fetchAll();;

        $query2 = "SELECT insertar_carrito_compra($idcompra, $idproducto, $cantidad, $id);";
        $result2 = $db -> prepare($query);
        $result2-> execute();
        $retorno2 = $result2 -> fetchAll();;
      }else{
        echo("No hay cobertura para tu zona");
  }
  }else{
      echo("No hay stock de este producto en esta tienda");
  }
?>

En caso de ser exitoso mostramos las ultimas 10 compras

  <br>
  <form id = 'caja' action="consultas_tienda.php" method="post">
  <input type="submit" value="Volver" id = "botonB">
  </form>



<?php include('templates/footer.html');