CREATE OR REPLACE FUNCTION

chequear_despacho2 (idtienda int, idcomprador int, direccion VARCHAR)

RETURNS VARCHAR AS $$

BEGIN 

IF direccion IN (SELECT comuna_despacho FROM despacho_tiendas WHERE id_tienda = idtienda) THEN

    RETURN TRUE
ELSE

    RETURN FALSE
END

$$ language plpgsql