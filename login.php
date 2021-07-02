<?php
  $ingresado = $_SESSION['ingresado'];

  if(!$ingresado){
    echo("<meta http-equiv='refresh' content='0; url = http://codd.ing.puc.cl/~grupo53/error.php? />");
  }
?>