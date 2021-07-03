CREATE OR REPLACE FUNCTION

insertar_compra (id int, id_usuario int, direccion varchar)

RETURNS void AS $$

BEGIN 

insert into compras values (id, id_usuario, direccion);

END

$$ language plpgsql
