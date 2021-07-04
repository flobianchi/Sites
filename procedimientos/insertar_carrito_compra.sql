CREATE OR REPLACE FUNCTION

insertar_carrito_compra (idcompra int, id_producto int, cantidad int, id_tienda int)

RETURNS void AS $$

BEGIN 

insert into carrito_compras values (id_compra, id_producto, cantidad, id_tienda);

END 

$$ language plpgsql
