CREATE OR REPLACE FUNCTION

chequear_disponibilidad (idtienda int, idproducto int)

RETURNS BOOLEAN AS $$

BEGIN 

    IF idproducto IN (SELECT id_producto FROM disponibilidad_tienda WHERE disponibilidad_tienda.id_tienda = idtienda) THEN

        RETURN TRUE;
    ELSE
        RETURN FALSE;
        
    END IF;

END

$$ language plpgsql
