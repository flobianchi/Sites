CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
-- nombre, rut,, edad, sexo, calificación, id_direccion

agregar_usuario (nombre varchar, rut_input varchar, edad int, sexo varchar, id_direccion int)

-- declaramos lo que retorna, en este caso un booleano
RETURNS INT AS $$

DECLARE 
idmax INT;
id_usuario INT;


BEGIN

    -- si es que el rut no esta en la tabla usuarios
    IF rut_input NOT IN (SELECT rut from usuarios) THEN

        -- definimos el maximo id
        SELECT INTO idmax MAX(id) FROM usuarios;

        -- agregamos usuario y su direccion
        INSERT INTO usuarios values(idmax + 1, nombre, rut_input, edad, sexo, 'cambiar_clave');
        INSERT INTO direcciones_usuarios values(idmax + 1, id_direccion);

        -- retornamos true si se agregó el valor
        -- 'agregado como usuario nuevo'
        RETURN idmax + 1;

    ELSE
        -- 'uasuario ya existe'
        RETURN -1;

    END IF;



-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql