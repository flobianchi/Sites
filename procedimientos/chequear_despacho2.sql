CREATE OR REPLACE FUNCTION

chequear_despacho2 (idtienda int, comuna VARCHAR)

RETURNS VARCHAR AS $$

BEGIN 

    IF comuna IN (SELECT comuna_despacho FROM despachos_tiendas WHERE id_tienda = idtienda) THEN

        RETURN TRUE;
    ELSE

        RETURN FALSE;
    END IF;

END

$$ language plpgsql