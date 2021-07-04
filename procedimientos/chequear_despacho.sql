CREATE OR REPLACE FUNCTION

chequear_despacho (idtienda int, comuna_comprador int)

RETURNS BOOLEAN AS $$

BEGIN 

    IF comuna_comprador IN (SELECT comuna_despacho FROM despacho_tiendas WHERE id_tienda = idtienda) THEN

        RETURN TRUE;
    ELSE
        RETURN FALSE;

    END IF;

END

$$ language plpgsql