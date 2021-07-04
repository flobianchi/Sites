CREATE OR REPLACE FUNCTION

chequear_despacho (idtienda int, idcomprador int)

RETURNS BOOLEAN AS $$


DECLARE

despacho BOOLEAN; --chequear como poner lista y como hacer un foreach para poder revisar direcciones

BEGIN 

    FOR direccion IN (SELECT direcion FROM direcion_usuarios WHERE id_usuario = idcomprador) LOOP
        IF direccion IN (SELECT comuna_despacho FROM despacho_tiendas WHERE id_tienda = idtienda) THEN
            despacho = TRUE
        END IF;
    END LOOP
    
    IF despacho = TRUE THEN
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;

END

$$ language plpgsql