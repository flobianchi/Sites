CREATE OR REPLACE FUNCTION

chequear_clave (rut_usuario INT, clave_usuario VARCHAR)

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- definimos nuestra función
BEGIN
    IF clave_usuario = (SELECT clave FROM usuarios WHERE rut = rut_usuario) THEN
        RETURN TRUE;
    ELSE
    RETURN FALSE;

    END IF;

END
$$ language plpgsql