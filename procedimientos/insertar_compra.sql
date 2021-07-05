CREATE OR REPLACE FUNCTION

insertar_compra (id_usuario int, direccion varchar)

RETURNS void AS $$

DECLARE 
idmax INT;

BEGIN 

SELECT INTO idmax MAX(id) FROM carrito_compras;

insert into compras values (idmax + 1, id_usuario, direccion);

END

$$ language plpgsql
