CREATE OR REPLACE FUNCTION

chequear_despacho (idtienda int, idcomprador int)

RETURNS VARCHAR AS $$


DECLARE

direccion_despacho VARCHAR; --chequear como poner lista y como hacer un foreach para poder revisar direcciones
direccion record; -- despacho tiendas es con id tienda y nombre de la comuna

BEGIN 
    direccion_despacho = ''

    IF direccion IN (SELECT comuna_despacho FROM despacho_tiendas WHERE id_tienda = idtienda) THEN

        direccion_despacho = direccion

    END IF;
    
    IF despacho != '' THEN
        RETURN direccion_despacho;
    ELSE
        RETURN direccion_despacho;
    END IF;

END

$$ language plpgsql