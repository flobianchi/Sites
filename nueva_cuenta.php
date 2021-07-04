<?php session_start(); ?>
<?php include('templates/header.html');
$_SESSION['ingresado'] = false;
?>

<h3>Si no quieres crear una cuenta debes volver al incicio</h3>
<form id = 'caja' action="index.php" method="post">
    <input type="submit" value="Ir a Inicio" id = "botonB">
</form>
<br>

Aqui muchos datos y todo lo que se necesita para crear un nuveo usuario:

<br>

se necesita: nombre, rut, edad, sexo y direccion (un id entre los que ya existen) 
(calificacion es 'usuario')
(para agregar esto ejecutar la funcion agragar_usuario)
<br>
tambien debe crear una clave, para esto debe complir las condiciones.
(para agregar esto ejecutar la funcion cambiar_clave)

<?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT nombre_direccion FROM direcciones;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

<div class = "grid-crear">
<div></div>

<div style = "background-color: #fdf4bf;">
<h1>Crear cuenta</h1>
<form id = 'caja' action="crear_nuevo_usuario.php" method="post">
<input type="text" class="form-control" placeholder="Nombre y apellido" style="font-size:12px;" size = 20 name = 'nombre'>
    <p style="font-size:12px;"></p>
    <input type="text" class="form-control" placeholder="RUT sin puntos con guion" style="font-size:12px;" size = 20 name = 'rut'>
    <p style="font-size:12px;"></p>
    <input type="number" class="form-control" placeholder="Edad" style="font-size:12px;" size = 20 name = 'edad'>
    <p style="font-size:12px;"></p>
    <h6> Selecciona tu sexo </h6>
    <select name="sexo">
    <option value="n/a">Prefiero no decir</option>
    <option value="mujer">Mujer</option>
    <option value="hombre">Hombre</option>
</select>

<br>
<h6> Selecciona tu direccion </h6>
<select name="direccion">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value='$d[0]'>$d[0]</option>";
      }
      ?>
    </select>
    <br>
    <br>
    <input type="text" class="form-control" placeholder="Clave" style="font-size:12px;" size = 20 name = 'clave'>
    <p style="font-size:12px;"></p>
    <input type="submit" value="Crear cuenta" id = "botonL">
</form></div>

<div></div>
</div>

<br>


<?php include('templates/footer.html');