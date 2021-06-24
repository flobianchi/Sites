<?php include('templates/header.html');   ?>


Esta es la pagina Login

<form id = 'caja' action="tienda.php" method="post">
      
      <input type="text" class="form-control" placeholder="Usuario" style="font-size:19px;" size = 15 name = 'comuna'>
      <br>
      <input type="text" class="form-control" placeholder="Clave" style="font-size:19px;" size = 15 name = 'comuna'>
      <p style="font-size:6px;"></p>
      <input type="submit" value="Ingresar" id = "botonB">
      </form>

<!--
<div class="grid-consultas">
  <div></div>
  
  <div style = "background-color: #fdf4bf;">

      <form id = 'caja' action="consultas/consulta1.php" method="post">
      Mostrar todas las tiendas con las comunas a las que despachan
      <p style="font-size:6px;"></p>
      <input type="submit" value="Mostrar" id = "botonB">
      </form>
    </div>

    <div></div>

  <div style = "background-color: #fdf4bf;">
      <form id = 'caja' action="consultas/consulta2.php" method="post">  
      Buscar todos los jefes de la comuna
      <input type="text" class="form-control" placeholder="Nombre Comuna" style="font-size:19px;" size = 15 name = 'comuna'>
      <p style="font-size:6px;"></p>
      <input type="submit" value="Buscar" id = "botonB">
      </form>
    </div>

    <div></div>
  <div></div><div></div>
  <div></div><div></div>
  <div></div>
  <div></div>

  <div style = "background-color: #fdf4bf;">
      <form id = 'caja' action="consultas/consulta3.php" method="post">
      Buscar tiendas que venden al menos un producto de la categoría

  
      <select name="tipo" id='lista-drop'>
        <option value="No comestible">No comestible</option>
        <option value="Comestible">Comestible</option>
      </select>
      <p style="font-size:6px;"></p>
      <input type="submit" value="Buscar" id = "botonB">
      </form>
      </div>
      <div></div>
  <div style = "background-color: #fdf4bf;">
    <form id = 'caja' action="consultas/consulta4.php" method="post">
    Buscar todos los usuarios que compraron productos con la descripción
    <input type="text" class="form-control" placeholder="descripción" style="font-size:19px;" size = 15 name = 'descripcion'>
      <p style="font-size:6px;"></p>
      <input type="submit" value="Buscar" id = "botonB">
    </div>
    </form>


  <div></div>
  <div></div>
  <div></div><div></div>
  <div></div><div></div>
  <div></div>


  <div style = "background-color: #fdf4bf;">
  <form id = 'caja' action="consultas/consulta5.php" method="post">
    Calcular edad promedio de los trabajdores de tiendas ubicadas en la comuna
    <input type="text" class="form-control" placeholder="Nombre Comuna" style="font-size:19px;" size = 17 name = 'comuna'>
      <p style="font-size:6px;"></p>
      <input type="submit" value="Calcular" id = "botonB">
    </form>
  </div>

  <div></div> 

  <div style = "background-color: #fdf4bf;">
  <form id = 'caja' action="consultas/consulta6.php" method="post">
      Buscar las tiendas que han registrado la mayor cantidad de ventas de productos de la categoria
  
      <select name="tipo" id='lista-drop'>
        <option value="No comestible">No comestible</option>
        <option value="Comestible">Comestible</option>
      </select>
      <p style="font-size:6px;"></p>
      <input type="submit" value="Buscar" id = "botonB">
      </form>


  </div>
  <div></div> 
</div>
--->
<br>
DD de MM del 2021

</body>
</html>