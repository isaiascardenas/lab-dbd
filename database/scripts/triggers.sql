-- 
-- Trigger 1: Asigna rol a usuario
-- 
CREATE OR REPLACE FUNCTION asignar_rol()
  RETURNS trigger AS
$BODY$
BEGIN
  INSERT INTO user_rol(user_id, rol_id) VALUES(NEW.id, 2);
END;
$BODY$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS asignacion_rol_usuario ON users;

CREATE TRIGGER asignacion_rol_usuario
  AFTER INSERT ON users
  FOR EACH ROW
  EXECUTE PROCEDURE asignar_rol();

-- 
-- Trigger 2: Asigna rol a usuario
-- 
CREATE OR REPLACE FUNCTION comparar_fechas()
  RETURNS trigger AS
$BODY$
BEGIN
  IF (NEW.fecha_inicio < NEW.fecha_reserva) OR (NEW.fecha_termino <= NEW.fecha_inicio) THEN
    SET MESSAGE_TEXT = 'No es posible insertar';
  END IF;
END;
$BODY$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS comparacion_fechas ON reserva_habitaciones;

CREATE TRIGGER comparacion_fechas
  BEFORE INSERT ON reserva_habitaciones
  FOR EACH ROW
  EXECUTE PROCEDURE comparar_fechas();


--
-- Trigger 3: Validar capacidad con cantidad maximo de actividad
--
CREATE OR REPLACE FUNCTION comparar_fechas_2()
  RETURNS trigger AS
$BODY$
BEGIN
  IF (NEW.fecha_inicio < NEW.fecha_termino) OR (NEW.fecha_termino <= NEW.fecha_inicio) THEN
    SET MESSAGE_TEXT = 'No es posible insertar';
  END IF;
END;
$BODY$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS comparacion_fechas ON reserva_autos;

CREATE TRIGGER comparacion_fechas
  BEFORE INSERT ON reserva_autos
  FOR EACH ROW
  EXECUTE PROCEDURE comparar_fechas_2();
