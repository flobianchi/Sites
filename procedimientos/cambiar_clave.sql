CREATE OR REPLACE FUNCTION

cambiar_clave (id_usuario INT, nueva_clave VARCHAR)

-- declaramos lo que retorna, en este caso un booleano
RETURNS VOID AS $$

-- definimos nuestra función
BEGIN

    UPDATE usuarios SET clave = nueva_clave WHERE id = id_usuario;

END
$$ language plpgsql