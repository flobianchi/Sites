<?php
  $ingresado = $_SESSION['ingresado'];

  if(!$ingresado){
    echo("<meta http-equiv='refresh' content='0; url = https://google.com' />");
  }
?>