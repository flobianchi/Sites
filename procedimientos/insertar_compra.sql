CREATE OR REPLACE FUNCTION

insertar_compra (idusuario int, comuna int)

RETURNS void AS $$

DECLARE 
idmax INT;


BEGIN 

SELECT INTO idmax MAX(id) FROM carrito_compras;

insert into compras values (idmax + 1, idusuario, direccion);

END

$$ language plpgsql

