<?php session_start(); ?>
<?php include('templates/header.html');
$_SESSION['ingresado'] = false;
?>


<style>
  .grid-crear {
    display: grid;
    grid-template-columns: auto 70px 1px 320px auto;
    grid-template-rows: 200px;
    text-align: center;
  }
</style>

<h3>Si no quieres crear una cuenta debes volver al incicio</h3>
<form id = 'caja' action="index.php" method="post">
    <input type="submit" value="Ir a Inicio" id = "botonB">
</form>

<?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT nombre_direccion FROM direcciones;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>
<br>
<br>
<h2> Crear cuenta</h2>
<div class = "grid-crear">
<div></div>
<div style = "background-color: #fdf4bf;">

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

<div style = "background-color: #fdf4bf;"></div>

<div style = "background-color: #fdf4bf;">

<form id = 'caja' action="crear_nuevo_usuario.php" method="post">
<p style="font-size:10px;"></p>
<input type="text" class="form-control" placeholder="Nombre y apellido" style="font-size:15px;" size = 33 name = 'nombre'>
    <p style="font-size:8px;"></p>
    <input type="text" class="form-control" placeholder="RUT sin puntos con guion" style="font-size:15px;" size = 33 name = 'rut'>
    <p style="font-size:8px;"></p>
    <input type="number" class="form-control" placeholder="Edad" style="font-size:15px;" size = 20 name = 'edad'>
    <p style="font-size:8px;"></p> 
    <select name="sexo" style="font-size:15px;">
    <option value="n/a">Prefiero no decir</option>
    <option value="mujer">Mujer</option>
    <option value="hombre">Hombre</option>
</select>
<p style="font-size:8px;"></p>
<select name="direccion" style="font-size:15px;">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value='$d[0]'>$d[0]</option>";
      }
      ?>
    </select>
    <p style="font-size:9px;"></p>
    <input type="text" class="form-control" placeholder="Clave" style="font-size:15px;" size = 33 name = 'clave'>
    <p style="font-size:15px;"></p>
    <input type="submit" value="Crear cuenta" id = "botonL">
</form></div>

<div></div>
</div>

<br>
<br>
<br>


<?php include('templates/footer.html');