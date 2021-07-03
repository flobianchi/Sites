CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
-- nombre, rut,, edad, sexo, calificación, id_direccion

agregar_usuario (nombre varchar, rut_input varchar, edad int, sexo varchar, calificacion_input varchar, id_direccion int)

-- declaramos lo que retorna, en este caso un booleano
RETURNS VARCHAR AS $$

DECLARE 
idmax INT;
id_usuario INT;


BEGIN

    -- si es que el rut no esta en la tabla usuarios
    IF rut_input NOT IN (SELECT rut from usuarios) THEN

        -- definimos el maximo id
        SELECT INTO idmax MAX(id) FROM usuarios;

        -- agregamos usuario y su direccion
        INSERT INTO usuarios values(idmax + 1, nombre, rut, edad, sexo, 'cambiar_clave', calificacion_input);
        INSERT INTO direcciones_usuarios values(idmax + 1, id_direccion);

        -- retornamos true si se agregó el valor
        RETURN 'agregado como usuario nuevo';

    -- si es que el rut esta, hacemos update en calificacion
    ELSIF calificacion_input <> 'usuario' THEN

        -- buscamos su id
        SELECT INTO id_usuario id FROM usuarios WHERE rut = rut_input;

        -- update en su calificacion (por si estaba)
        UPDATE usuarios SET calificacion = calificacion_input WHERE id = id_usuario;

        RETURN 'uasuario ya existe, update en califiacion';

    ELSE
        RETURN 'uasuario ya existe';
        -- y false si no se agrego

    END IF;



-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql