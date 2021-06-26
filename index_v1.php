<!DOCTYPE html>
<!-- declaro que se viene html -->

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title> Entrega 2 Grupo 53 BDD </title>
</head>

<body>

<!-- comentario -->
<h1>Grupo 53</h1>
<h2>Sebastián Díaz, Martín Alarcón</h2>

<form>
Texto: <input type = "text" name = "texto ingresado">
</form>

<table>
  <!-- fila de la tabla con tr -->
  <tr>
  <td> Entrega </td> <td> porcentaje <td>
  </tr>

  <tr>
  <td> 1 </td> <td> 100% <td>
  </tr>

  <tr>
  <td> 2 </td> <td> 30% <td>
  </tr>

</table>


<!-- php aqui -->

<?php
# comentarios son asi

# asi se definen las variables
$variable1 = 10; #puenden ser distintos tipos: 10, True, "hola"
$superbool = true;
$string_Es = "hola";

# Mostrar
echo("un entero es: $variable1, un bool es $superbool, $string_Es");

#al hacer echo, html lo interpreta
echo("<br>");

$num = 5;
if($num > 7){
  echo("mayor");
}
else{
  echo("menor");
}


#arreglos

$arreglo_test = array(1,2,3,4,5);
$arreglo_test_2 = array("cosa1" => "es 1", "cosa2" => "es 2");

#los arrays en php son como diccionarios
echo("<br>");
print_r($arreglo_test);

$arreglo_test_2['nueva cosa'] = "es 3";

echo("<br>");
print_r($arreglo_test_2);

foreach($arreglo_test_2 as $llave => $valor){
  echo("<p> $llave ---- $valor </p>");
}

?>

</body>
</html>