CREATE OR REPLACE FUNCTION

insertar_carrito_compra(id_compra int, id_producto int, cantidad int, id_tienda int)

RETURNS void AS $$

BEGIN 

insert into carrito_compras values(id_compra, id_producto, cantidad, id_tienda)

END

CREATE OR REPLACE FUNCTION

insertar_compra(id int, id_usuario int, direccion varchar)

RETURNS void AS $$

BEGIN 

insert into compras values()

END

CREATE OR REPLACE FUNCTION

chequear_disponibilidad(id_tienda int, id_producto int)

RETURNS void AS $$

BEGIN 

productos = (SELECT productos.nombre FROM productos, disponibilidad_tienda WHERE productos.id = disponibilidad_tienda.id_producto)
PRINT(productos)
END

$$ language plpgsql

