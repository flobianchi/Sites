CREATE OR REPLACE FUNCTION

insertar_compra (idusuario int, comuna varchar, idproducto int, cantidad int, idtienda int)

RETURNS void AS $$

DECLARE 
idmax INT;
direccion int;

BEGIN 

SELECT INTO direccion direcciones.id FROM direcciones JOIN direcciones_usuarios ON direcciones.id = direcciones_usuarios.direccion_usuario WHERE direcciones_usuarios.id_usuario = idusuario AND direcciones.comuna = comuna LIMIT 1;

SELECT INTO idmax MAX(id) FROM carrito_compras;

insert into compras values (idmax + 1, idusuario, direccion);
insert into carrito_compras values (idmax + 1, idproducto, cantidad, idtienda);

END

$$ language plpgsql

