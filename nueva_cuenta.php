<?php session_start(); ?>
<?php include('templates/header.html');
$_SESSION['ingresado'] = false;
?>


<style>
  .grid-crear {
    display: grid;
    grid-template-columns: auto 100px 10px 320px auto;
    grid-template-rows: 40px 360px;
    text-align: center;
  }
</style>

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
<div></div>
<div style = "background-color: #fdf4bf;"> <h2> Crear cuenta</h2></div>

<div></div>
<div></div>
<div></div>
<div style = "background-color: #fff4bf;">

<p style="font-size:15px;"> Nombre </p>
<p style="font-size:15px;"></p>
<p style="font-size:15px;"> Rut </p>
<p style="font-size:15px;"></p>
<p style="font-size:15px;"> Edad </p>
<p style="font-size:15px;"></p>
<p style="font-size:15px;"> Sexo </p>
<p style="font-size:15px;"></p>
<p style="font-size:15px;"> Direccion </p>
<p style="font-size:15px;"></p>
<p style="font-size:15px;"> Clave </p>
<p style="font-size:15px;"></p>

</div>

<div></div>

<div>
<form id = 'caja' action="crear_nuevo_usuario.php" method="post">
<input type="text" class="form-control" placeholder="Nombre y apellido" style="font-size:15px;" size = 20 name = 'nombre'>
    <p style="font-size:15px;"></p>
    <input type="text" class="form-control" placeholder="RUT sin puntos con guion" style="font-size:15px;" size = 20 name = 'rut'>
    <p style="font-size:15px;"></p>
    <input type="number" class="form-control" placeholder="Edad" style="font-size:15px;" size = 20 name = 'edad'>
    <p style="font-size:15px;"></p>
    Sexo   
    <select name="sexo" style="font-size:15px;">
    <option value="n/a">Prefiero no decir</option>
    <option value="mujer">Mujer</option>
    <option value="hombre">Hombre</option>
</select>

<br>
Direccion   
<select name="direccion" style="font-size:15px;">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value='$d[0]'>$d[0]</option>";
      }
      ?>
    </select>
    <br>
    <br>
    <input type="text" class="form-control" placeholder="Clave" style="font-size:15px;" size = 20 name = 'clave'>
    <p style="font-size:15px;"></p>
    <input type="submit" value="Crear cuenta" id = "botonL">
</form></div>

<div></div>
</div>

<br>


<?php include('templates/footer.html');