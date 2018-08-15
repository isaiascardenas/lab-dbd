DROP DATABASE IF EXISTS labdbd;

CREATE DATABASE labdbd;

--
-- Tablas
--
CREATE TABLE aerolineas(
  id      INT AUTO_INCREMENT NOT NULL,
  nombre  VARCHAR(255) NOT NULL,

  created_at TIMESTAMP,
  updated_at TIMESTAMP,

  PRIMARY KEY(id)
);

--
-- Relaciones - Keys
--


--
-- Triggers
--
