<?php session_start(); ?>
<?php include('templates/header.html');   ?>


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

$usuario_ingresado = $_POST['usuario'];
$clave_ingresada = $_POST['clave'];

#Llama a conexión de la bdd
require("config/conexion.php");

#chequeamos clave
$query = "SELECT chequear_clave('$usuario_ingresado','$clave_ingresada');";

$result = $db -> prepare($query);
$result -> execute();
$dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
$resultado = $dataCollected[0]['chequear_clave'];

$ingresado = $_SESSION['ingresado'];

#si el resultado es correcto implimimospagina de siempre ok, sino no
if($resultado or $ingresado){

include('templates/header_botones.html');

#-------------------caso clave correcta------------------------
if($usuario_ingresado != ''){
$_SESSION['rut_user'] = $usuario_ingresado;
$_SESSION['pass_user'] = $clave_ingresada;
}

$_SESSION['ingresado'] = true;

echo("<h2>Porfavor elija una tienda haciendo click en su id</h2>");

$query = "SELECT tiendas.id, tiendas.nombre, direcciones.nombre_direccion, direcciones.comuna FROM tiendas JOIN direcciones ON tiendas.direccion = direcciones.id ORDER BY tiendas.id;";

$result = $db -> prepare($query);
$result -> execute();
$dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo

echo(
    "
    </div>
    <div></div>
    <div></div> 
    </div>
    
    <p style='font-size:50px;'></p>
    <table class='center'>
    <tr>
    <th>ID Tienda</th>
    <th>Tienda</th>
    <th>Direccion</th>
    <th>Comuna</th>
    </tr>");
    
    
    foreach ($dataCollected as $p) {
    echo "<tr> <td> 
    
    <form id = 'caja' action='consultas_tienda.php' method='post'>
    <input name = 't' type='submit' value='$p[0]' id = 'botonID'>
    </form>
    
    
    </td> <td>$p[1]</td> <td>$p[2]</td><td>$p[3]</td></tr>";
    }
    
    echo("<table>");

}
else{
#---------caso clave incorrecta--------------
echo("

<h3>clave y/o usuario incorrecto</h3>

Para volver a intentarlo debes ir al inicio
<br>
<form id = 'caja' action='index.php' method='post'>
    <input type='submit' value='Ir al Inicio' id = 'botonB'>
</form>


<br>
<br>
<h2>¿No tienes cuenta?</h2>
<h3>Crea una cuenta</h3>
<form id = 'caja' action='nueva_cuenta.php' method='post'>
    <input type='submit' value='Crear' id = 'botonB'>
</form>
<br>

");
}
?>

<?php include('templates/footer.html');