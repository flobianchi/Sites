<?php
  $ingresado = $_SESSION['ingresado'];

  if(!$ingresado){

      echo("
      <br>
  <h1> Debe ingresar para poder ver esta pángina </h1>
  <br>

  <br>
  <form id = 'caja' action='index.php' method='post'>
        <input type='submit' value='Ingresar' id = 'botonB'>
  </form>
  <br>


  5 de Julio del 2021
  </body>

  </html>
  ");

    exit();
  }
?>