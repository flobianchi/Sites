<?php
  $ingresado = $_SESSION['ingresado'];

  if(!$ingresado){
    header("Location: http://codd.ing.puc.cl/~grupo53/error.php/>");
    exit();
  }
?>