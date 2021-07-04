<?php session_start(); ?>
<?php include('templates/header.html');
$_SESSION['ingresado'] = false;

require("config/conexion.php");

?>

<h2>Aqui se crea un uevo usuario con los datos ingresados</h2>

<br>

<?php

$nombre = $_POST['nombre'];
$rut = $_POST['rut'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$direccion = $_POST['direccion'];
$clave = $_POST['clave'];

$no_entro = true;


if($nombre == ''){
    echo("debe ingresar un nombre");
}elseif($rut == ''){
    echo("debe ingresar un rut");
}elseif($rut == ''){
    echo("debe ingresar un rut");
}elseif($clave == ''){
    echo("debe ingresar una clave valida");
}elseif($edad <= 0){
    echo("debe ingresar una edad valida");
}else{

    #buscar direccion

    $query = "SELECT id FROM direcciones WHERE nombre_direccion = '$direccion';";

    $result = $db -> prepare($query);
    $result -> execute();
    $retorno = $result -> fetchAll();

    $id_direccion = $retorno[0]['id'];

    #agregar usuario
    $query = "SELECT agregar_usuario('$nombre'::varchar,'$rut'::varchar,$edad,'$sexo'::varchar,'usuario'::varchar, $id_direccion);";

    $result = $db -> prepare($query);
    $result -> execute();
    $retorno = $result -> fetchAll();

    $se_pudo_agregar = $retorno[0]['agregar_usuario'];

    if($se_pudo_agregar >= 0){
        $no_entro = false;

        #agregar la clave
        $query = "SELECT cambiar_clave($se_pudo_agregar,'$clave');";

        $result = $db -> prepare($query);
        $result -> execute();
        $retorno = $result -> fetchAll();
        
        echo("Bienvenido $nombre, debes hacer click en ir al incio para poder iniciar sesión con tu nueva cuenta.
        <br>
        <br>
        <form id = 'caja' action='index.php' method='post'>
        <input type='submit' value='Ir al Inicio' id = 'botonB'>
        </form>
        
        
        
        ");

    }else{
        echo("ya existe un usuario con este rut");
    }

    #LUEGO LOS BOTONES!
}

if($no_entro){
    echo("
        <br>
        <br>
        Para volver a intentarlo haga click en crear una cuenta
        <br>
        <form id = 'caja' action='nueva_cuenta.php' method='post'>
        <input type='submit' value='Crear una cuenta' id = 'botonL'>
        </form>
        <br>
        <br>
        Si quiere volver al inicio debe hacer click en Ir al inicio
        <form id = 'caja' action='index.php' method='post'>
        <input type='submit' value='Ir al Inicio' id = 'botonB'>
        </form>
        
        ");
}

?>

<br>
<br>

<?php include('templates/footer.html');