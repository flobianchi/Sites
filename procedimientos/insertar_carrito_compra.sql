CREATE OR REPLACE FUNCTION

insertar_carrito_compra (id_producto int, cantidad int, id_tienda int)

RETURNS void AS $$

DECLARE 
idmax INT;

BEGIN 

SELECT INTO idmax MAX(id) FROM compras;

insert into carrito_compras values (idmax + 1, id_producto, cantidad, id_tienda);

END 

$$ language plpgsql
