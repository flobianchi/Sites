<?php session_start(); ?>
<?php include('templates/header.html');   ?>
<?php include('login.php');   ?>
<?php include('templates/header_botones.html');   ?>
<br>
<h1> 🔎⛺ Consultas tienda elegida </h1>
<br>
<br>
<style>
    fondo{background-color: #63b9e7};
</style>
<?php 
#echo("Click en id tienda ");
#echo($_POST['t']);

$id = $_POST['t'];
if($id != ''){
      $_SESSION['id_tienda'] = $id;
}

?>
<br>
<br>
<h3> Consulta top 3 de los productos mas baratos (cualquiera sea su tipo) </h3>
<form id = 'caja' action="funcionalidad_1.php" method="post">
      <input type="submit" value="Top 3" id = "botonB">
      </form>
  <br>
  <br>
  <h3> Consulta algun producto por su nombre para ver informacion basica y disponibilidad </h3>
<form id = 'caja' action="funcionalidad_2.php" method="post">
<input type="text" class="form-control" placeholder="texto" style="font-size:19px;" size = 15 name = 'f2'>
      <input type="submit" value="Buscar" id = "botonB">
</form>

<br>
<br>
<h3> Realiza una compra de algun producto ingresando su ID y cantidad </h3>
<form id = 'caja' action="funcionalidad_3.php" method="post">
<input type="text" class="form-control" placeholder="id item" style="font-size:19px;" size = 15 name = 'f3_id'>
<input type="text" class="form-control" placeholder="cantidad" style="font-size:19px;" size = 15 name = 'f3_cant'>
      <input type="submit" value="Comprar" id = "botonB">
</form>

<?php
$_SESSION['f3_id'] = $_POST['f3_id']; 
$_SESSION['f3_cant'] = $_POST['f3_cant']; 

$idproducto = $_SESSION['f3_id']
$cantidad = $_SESSION['f3_cant']

if($nombre == ''){
      echo("debe ingresar un nombre");
  }elseif($rut == ''){
      echo("debe ingresar un rut");
  }elseif($clave == ''){
      echo("debe ingresar una clave");
  }

?>

<br>
<br>

<form id = 'caja' action="tienda.php" method="post">
      <input type="submit" value="Volver" id = "botonB">
</form>

<?php include('templates/footer.html');