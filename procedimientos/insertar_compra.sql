CREATE OR REPLACE FUNCTION

insertar_compra (idusuario int, comuna varchar)

RETURNS void AS $$

DECLARE 
idmax INT;
direccion int;

BEGIN 

SELECT INTO idmax MAX(id) FROM carrito_compras;

SELECT INTO direccion direcciones.id FROM direcciones JOIN direcciones_usuarios ON direcciones.id = direcciones_usuarios.direccion_usuario WHERE direcciones_usuarios.id_usuario = idusuario AND direcciones.comuna = comuna LIMIT 1;

insert into compras values (idmax + 1, idusuario, direccion);

END

$$ language plpgsql

