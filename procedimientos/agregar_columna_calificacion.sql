CREATE OR REPLACE FUNCTION

agregar_columna_calificacion (entrada int)

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- definimos nuestra función
BEGIN

    -- verificar si existe la columna clave, si no existe la agregamos y seteamos todos los valores de esa columna en 1
    IF 'calificacion' NOT IN (SELECT column_name FROM information_schema.columns WHERE table_name='usuarios') THEN
        ALTER TABLE usuarios ADD calificacion VARCHAR(30);
        UPDATE usuarios SET calificacion = 'usuario';
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;

END
$$ language plpgsql