CREATE OR REPLACE FUNCTION

agregar_columna_clave ()

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- definimos nuestra función
BEGIN

    -- verificar si existe la columna clave, si no existe la agregamos y seteamos todos los valores de esa columna en 1
    IF 'clave' NOT IN (SELECT column_name FROM information_schema.columns WHERE table_name='usuarios') THEN
        ALTER TABLE usuarios ADD clave VARCHAR(30);
        UPDATE usuarios SET clave = 'cambiar_clave';
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;

END
$$ language plpgsql