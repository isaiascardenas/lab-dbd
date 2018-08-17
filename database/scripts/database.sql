-- DROP DATABASE IF EXISTS lab_dbd;
--
-- Crear DB
--

-- CREATE DATABASE lab_dbd;

-- 
-- Seleccionar BD 
--


--
-- DROP relaciones
--
DROP TABLE IF EXISTS actividades CASCADE;
DROP TABLE IF EXISTS aerolineas CASCADE;
DROP TABLE IF EXISTS aeropuertos CASCADE;
DROP TABLE IF EXISTS asiento_avion CASCADE;
DROP TABLE IF EXISTS asientos CASCADE;
DROP TABLE IF EXISTS autos CASCADE;
DROP TABLE IF EXISTS aviones CASCADE;
DROP TABLE IF EXISTS bancos CASCADE;
DROP TABLE IF EXISTS ciudades CASCADE;
DROP TABLE IF EXISTS companias CASCADE;
DROP TABLE IF EXISTS cuentas CASCADE;
DROP TABLE IF EXISTS habitaciones CASCADE;
DROP TABLE IF EXISTS hoteles CASCADE;
DROP TABLE IF EXISTS migrations CASCADE;
DROP TABLE IF EXISTS orden_compras CASCADE;
DROP TABLE IF EXISTS paises CASCADE;
DROP TABLE IF EXISTS paquete_vuelo_autos CASCADE;
DROP TABLE IF EXISTS paquete_vuelo_hoteles CASCADE;
DROP TABLE IF EXISTS pasajeros CASCADE;
DROP TABLE IF EXISTS password_resets CASCADE;
DROP TABLE IF EXISTS permisos CASCADE;
DROP TABLE IF EXISTS reserva_actividades CASCADE;
DROP TABLE IF EXISTS reserva_autos CASCADE;
DROP TABLE IF EXISTS reserva_boletos CASCADE;
DROP TABLE IF EXISTS reserva_habitaciones CASCADE;
DROP TABLE IF EXISTS reserva_paquete_vuelo_autos CASCADE;
DROP TABLE IF EXISTS reserva_paquete_vuelo_hoteles CASCADE;
DROP TABLE IF EXISTS reserva_traslados CASCADE;
DROP TABLE IF EXISTS rol_permiso CASCADE;
DROP TABLE IF EXISTS roles CASCADE;
DROP TABLE IF EXISTS sucursales CASCADE;
DROP TABLE IF EXISTS tipo_asientos CASCADE;
DROP TABLE IF EXISTS tipo_cuentas CASCADE;
DROP TABLE IF EXISTS tramos CASCADE;
DROP TABLE IF EXISTS traslados CASCADE;
DROP TABLE IF EXISTS user_rol CASCADE;
DROP TABLE IF EXISTS users CASCADE;

--
-- Crear relaciones (ordenadas en base al nombre)
--

CREATE TABLE IF NOT EXISTS actividades (
    id serial NOT NULL,
    fecha_inicio timestamp NOT NULL,
    fecha_termino timestamp NOT NULL,
    descripcion character varying(255) NOT NULL,
    max_ninos integer NOT NULL,
    max_adultos integer NOT NULL,
    costo_nino integer NOT NULL,
    costo_adulto integer NOT NULL,
    ciudad_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS aerolineas (
    id serial NOT NULL,
    nombre character varying(255) NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS aeropuertos (
    id serial NOT NULL,
    codigo character varying(255) NOT NULL,
    nombre character varying(255) NOT NULL,
    direccion character varying(255) NOT NULL,
    ciudad_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS asiento_avion (
    id serial NOT NULL,
    asiento_id serial NOT NULL,
    avion_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS asientos (
    id serial NOT NULL,
    codigo character varying(255) NOT NULL,
    tipo_asiento_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS autos (
    id serial NOT NULL,
    patente character varying(255) NOT NULL,
    descripcion character varying(255) NOT NULL,
    precio_hora integer NOT NULL,
    capacidad integer NOT NULL,
    sucursal_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS aviones (
    id serial NOT NULL,
    descripcion character varying(255) NOT NULL,
    aerolinea_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS bancos (
    id serial NOT NULL,
    nombre character varying(255) NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS ciudades (
    id serial NOT NULL,
    nombre character varying(255) NOT NULL,
    pais_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS companias (
    id serial NOT NULL,
    nombre character varying(255) NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS cuentas (
    id serial NOT NULL,
    numero_cuenta character varying(255) NOT NULL,
    saldo integer NOT NULL,
    tipo_cuenta_id serial NOT NULL,
    banco_id serial NOT NULL,
    user_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS habitaciones (
    id serial NOT NULL,
    capacidad_nino integer NOT NULL,
    capacidad_adulto integer NOT NULL,
    precio_por_noche integer NOT NULL,
    descripcion character varying(255) NOT NULL,
    hotel_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS hoteles (
    id serial NOT NULL,
    estrellas integer NOT NULL,
    nombre character varying(255) NOT NULL,
    descripcion character varying(255) NOT NULL,
    ciudad_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS migrations (
    id serial NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);

CREATE TABLE IF NOT EXISTS orden_compras (
    id serial NOT NULL,
    costo_total integer NOT NULL,
    fecha_generado timestamp NOT NULL,
    detalle character varying(255) NOT NULL,
    user_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS paises (
    id serial NOT NULL,
    nombre character varying(255) NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS paquete_vuelo_autos (
    id serial NOT NULL,
    descripcion character varying(255) NOT NULL,
    descuento double precision NOT NULL,
    reserva_auto_id serial NOT NULL,
    orden_compra_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS paquete_vuelo_hoteles (
    id serial NOT NULL,
    descripcion character varying(255) NOT NULL,
    descuento double precision NOT NULL,
    reserva_habitacion_id serial NOT NULL,
    orden_compra_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS pasajeros (
    id serial NOT NULL,
    nombre character varying(255) NOT NULL,
    rut character varying(255) NOT NULL,
    reserva_boleto_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp
);

CREATE TABLE IF NOT EXISTS permisos (
    id serial NOT NULL,
    descripcion character varying(255) NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS reserva_actividades (
    id serial NOT NULL,
    fecha_reserva timestamp NOT NULL,
    capacidad_ninos integer NOT NULL,
    capacidad_adultos integer NOT NULL,
    descuento double precision NOT NULL,
    actividad_id serial NOT NULL,
    orden_compra_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS reserva_autos (
    id serial NOT NULL,
    fecha_inicio timestamp NOT NULL,
    fecha_termino timestamp NOT NULL,
    fecha_reserva timestamp NOT NULL,
    costo integer NOT NULL,
    descuento double precision NOT NULL,
    auto_id serial NOT NULL,
    orden_compra_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS reserva_boletos (
    id serial NOT NULL,
    fecha_reserva timestamp NOT NULL,
    descuento double precision NOT NULL,
    costo integer NOT NULL,
    asiento_avion_id serial NOT NULL,
    tramo_id serial NOT NULL,
    orden_compra_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS reserva_habitaciones (
    id serial NOT NULL,
    fecha_inicio timestamp NOT NULL,
    fecha_termino timestamp NOT NULL,
    fecha_reserva timestamp NOT NULL,
    costo integer NOT NULL,
    descuento double precision NOT NULL,
    habitacion_id serial NOT NULL,
    orden_compra_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS reserva_paquete_vuelo_autos (
    paquete_vuelo_auto_id serial NOT NULL,
    reserva_boleto_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS reserva_paquete_vuelo_hoteles (
    paquete_vuelo_hotel_id serial NOT NULL,
    reserva_boleto_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS reserva_traslados (
    id serial NOT NULL,
    cantidad_pasajeros integer NOT NULL,
    fecha_reserva timestamp NOT NULL,
    costo integer NOT NULL,
    descuento double precision NOT NULL,
    traslado_id serial NOT NULL,
    orden_compra_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS rol_permiso (
    id serial NOT NULL,
    permiso_id serial NOT NULL,
    rol_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS roles (
    id serial NOT NULL,
    nombre character varying(255) NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS sucursales (
    id serial NOT NULL,
    compania_id serial NOT NULL,
    ciudad_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS tipo_asientos (
    id serial NOT NULL,
    factor_costo double precision NOT NULL,
    descripcion character varying(255) NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS tipo_cuentas (
    id serial NOT NULL,
    descripcion character varying(255) NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS tramos (
    id serial NOT NULL,
    codigo character varying(255) NOT NULL,
    fecha_partida timestamp NOT NULL,
    fecha_llegada timestamp NOT NULL,
    avion_id serial NOT NULL,
    origen_id serial NOT NULL,
    destino_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS traslados (
    id serial NOT NULL,
    tipo integer NOT NULL,
    fecha_inicio timestamp NOT NULL,
    fecha_termino timestamp NOT NULL,
    aeropuerto_id serial NOT NULL,
    hotel_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS user_rol (
    id serial NOT NULL,
    user_id serial NOT NULL,
    rol_id serial NOT NULL,
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE IF NOT EXISTS users (
    id serial NOT NULL,
    nombre character varying(255) NOT NULL,
    rut character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp,
    updated_at timestamp
);


--
-- PRIMARY KEYS & UNIQUE
--

ALTER TABLE actividades
    ADD CONSTRAINT actividades_pkey
    PRIMARY KEY (id);

ALTER TABLE aerolineas
    ADD CONSTRAINT aerolineas_pkey
    PRIMARY KEY (id);

ALTER TABLE aeropuertos
    ADD CONSTRAINT aeropuertos_codigo_unique
    UNIQUE (codigo);

ALTER TABLE aeropuertos
    ADD CONSTRAINT aeropuertos_pkey
    PRIMARY KEY (id);

ALTER TABLE asiento_avion
    ADD CONSTRAINT asiento_avion_pkey
    PRIMARY KEY (id);

ALTER TABLE asientos
    ADD CONSTRAINT asientos_pkey
    PRIMARY KEY (id);

ALTER TABLE autos
    ADD CONSTRAINT autos_patente_unique
    UNIQUE (patente);

ALTER TABLE autos
    ADD CONSTRAINT autos_pkey
    PRIMARY KEY (id);

ALTER TABLE aviones
    ADD CONSTRAINT aviones_pkey
    PRIMARY KEY (id);

ALTER TABLE bancos
    ADD CONSTRAINT bancos_nombre_unique
    UNIQUE (nombre);

ALTER TABLE bancos
    ADD CONSTRAINT bancos_pkey
    PRIMARY KEY (id);

ALTER TABLE ciudades
    ADD CONSTRAINT ciudades_pkey
    PRIMARY KEY (id);

ALTER TABLE companias
    ADD CONSTRAINT companias_nombre_unique
    UNIQUE (nombre);

ALTER TABLE companias
    ADD CONSTRAINT companias_pkey
    PRIMARY KEY (id);

ALTER TABLE cuentas
    ADD CONSTRAINT cuentas_numero_cuenta_unique
    UNIQUE (numero_cuenta);

ALTER TABLE cuentas
    ADD CONSTRAINT cuentas_pkey
    PRIMARY KEY (id);

ALTER TABLE habitaciones
    ADD CONSTRAINT habitaciones_pkey
    PRIMARY KEY (id);

ALTER TABLE hoteles
    ADD CONSTRAINT hoteles_pkey
    PRIMARY KEY (id);

ALTER TABLE migrations
    ADD CONSTRAINT migrations_pkey
    PRIMARY KEY (id);

ALTER TABLE orden_compras
    ADD CONSTRAINT orden_compras_pkey
    PRIMARY KEY (id);

ALTER TABLE paises
    ADD CONSTRAINT paises_pkey
    PRIMARY KEY (id);

ALTER TABLE paquete_vuelo_autos
    ADD CONSTRAINT paquete_vuelo_autos_pkey
    PRIMARY KEY (id);

ALTER TABLE paquete_vuelo_hoteles
    ADD CONSTRAINT paquete_vuelo_hoteles_pkey
    PRIMARY KEY (id);

ALTER TABLE pasajeros
    ADD CONSTRAINT pasajeros_pkey
    PRIMARY KEY (id);

ALTER TABLE permisos
    ADD CONSTRAINT permisos_pkey
    PRIMARY KEY (id);

ALTER TABLE reserva_actividades
    ADD CONSTRAINT reserva_actividades_pkey
    PRIMARY KEY (id);

ALTER TABLE reserva_autos
    ADD CONSTRAINT reserva_autos_pkey
    PRIMARY KEY (id);

ALTER TABLE reserva_boletos
    ADD CONSTRAINT reserva_boletos_pkey
    PRIMARY KEY (id);

ALTER TABLE reserva_habitaciones
    ADD CONSTRAINT reserva_habitaciones_pkey
    PRIMARY KEY (id);

ALTER TABLE reserva_traslados
    ADD CONSTRAINT reserva_traslados_pkey
    PRIMARY KEY (id);

ALTER TABLE rol_permiso
    ADD CONSTRAINT rol_permiso_pkey
    PRIMARY KEY (id);

ALTER TABLE roles
    ADD CONSTRAINT roles_pkey
    PRIMARY KEY (id);

ALTER TABLE sucursales
    ADD CONSTRAINT sucursales_pkey
    PRIMARY KEY (id);

ALTER TABLE tipo_asientos
    ADD CONSTRAINT tipo_asientos_pkey
    PRIMARY KEY (id);

ALTER TABLE tipo_cuentas
    ADD CONSTRAINT tipo_cuentas_descripcion_unique
    UNIQUE (descripcion);

ALTER TABLE tipo_cuentas
    ADD CONSTRAINT tipo_cuentas_pkey
    PRIMARY KEY (id);

ALTER TABLE tramos
    ADD CONSTRAINT tramos_codigo_unique
    UNIQUE (codigo);

ALTER TABLE tramos
    ADD CONSTRAINT tramos_pkey
    PRIMARY KEY (id);

ALTER TABLE traslados
    ADD CONSTRAINT traslados_pkey
    PRIMARY KEY (id);

ALTER TABLE user_rol
    ADD CONSTRAINT user_rol_pkey
    PRIMARY KEY (id);

ALTER TABLE users
    ADD CONSTRAINT users_email_unique
    UNIQUE (email);

ALTER TABLE users
    ADD CONSTRAINT users_pkey
    PRIMARY KEY (id);

--
-- CLAVES FORANEAS
--

ALTER TABLE actividades
    ADD CONSTRAINT actividades_ciudad_id_foreign
    FOREIGN KEY (ciudad_id)
    REFERENCES ciudades(id);

ALTER TABLE aeropuertos
    ADD CONSTRAINT aeropuertos_ciudad_id_foreign
    FOREIGN KEY (ciudad_id)
    REFERENCES ciudades(id);

ALTER TABLE asiento_avion
    ADD CONSTRAINT asiento_avion_asiento_id_foreign
    FOREIGN KEY (asiento_id)
    REFERENCES asientos(id);

ALTER TABLE asiento_avion
    ADD CONSTRAINT asiento_avion_avion_id_foreign
    FOREIGN KEY (avion_id)
    REFERENCES aviones(id);

ALTER TABLE asientos
    ADD CONSTRAINT asientos_tipo_asiento_id_foreign
    FOREIGN KEY (tipo_asiento_id)
    REFERENCES tipo_asientos(id);

ALTER TABLE autos
    ADD CONSTRAINT autos_sucursal_id_foreign
    FOREIGN KEY (sucursal_id)
    REFERENCES sucursales(id);

ALTER TABLE aviones
    ADD CONSTRAINT aviones_aerolinea_id_foreign
    FOREIGN KEY (aerolinea_id)
    REFERENCES aerolineas(id);

ALTER TABLE ciudades
    ADD CONSTRAINT ciudades_pais_id_foreign
    FOREIGN KEY (pais_id)
    REFERENCES paises(id);

ALTER TABLE cuentas
    ADD CONSTRAINT cuentas_banco_id_foreign
    FOREIGN KEY (banco_id)
    REFERENCES bancos(id);

ALTER TABLE cuentas
    ADD CONSTRAINT cuentas_tipo_cuenta_id_foreign
    FOREIGN KEY (tipo_cuenta_id)
    REFERENCES tipo_cuentas(id);

ALTER TABLE cuentas
    ADD CONSTRAINT cuentas_user_id_foreign
    FOREIGN KEY (user_id)
    REFERENCES users(id);

ALTER TABLE habitaciones
    ADD CONSTRAINT habitaciones_hotel_id_foreign
    FOREIGN KEY (hotel_id)
    REFERENCES hoteles(id);

ALTER TABLE hoteles
    ADD CONSTRAINT hoteles_ciudad_id_foreign
    FOREIGN KEY (ciudad_id)
    REFERENCES ciudades(id);

ALTER TABLE orden_compras
    ADD CONSTRAINT orden_compras_user_id_foreign
    FOREIGN KEY (user_id)
    REFERENCES users(id);

ALTER TABLE paquete_vuelo_autos
    ADD CONSTRAINT paquete_vuelo_autos_reserva_auto_id_foreign
    FOREIGN KEY (reserva_auto_id)
    REFERENCES reserva_autos(id);

ALTER TABLE paquete_vuelo_hoteles
    ADD CONSTRAINT paquete_vuelo_hoteles_reserva_habitacion_id_foreign
    FOREIGN KEY (reserva_habitacion_id)
    REFERENCES reserva_habitaciones(id);

ALTER TABLE pasajeros
    ADD CONSTRAINT pasajeros_reserva_boleto_id_foreign
    FOREIGN KEY (reserva_boleto_id)
    REFERENCES reserva_boletos(id);

ALTER TABLE reserva_actividades
    ADD CONSTRAINT reserva_actividades_actividad_id_foreign
    FOREIGN KEY (actividad_id)
    REFERENCES actividades(id);

ALTER TABLE reserva_autos
    ADD CONSTRAINT reserva_autos_auto_id_foreign
    FOREIGN KEY (auto_id)
    REFERENCES autos(id);

ALTER TABLE reserva_boletos
    ADD CONSTRAINT reserva_boletos_asiento_avion_id_foreign
    FOREIGN KEY (asiento_avion_id)
    REFERENCES asiento_avion(id);

ALTER TABLE reserva_boletos
    ADD CONSTRAINT reserva_boletos_tramo_id_foreign
    FOREIGN KEY (tramo_id)
    REFERENCES tramos(id);

ALTER TABLE reserva_habitaciones
    ADD CONSTRAINT reserva_habitaciones_habitacion_id_foreign
    FOREIGN KEY (habitacion_id)
    REFERENCES habitaciones(id);
--

ALTER TABLE reserva_paquete_vuelo_autos
    ADD CONSTRAINT reserva_paquete_vuelo_autos_paquete_vuelo_auto_id_foreign
    FOREIGN KEY (paquete_vuelo_auto_id)
    REFERENCES paquete_vuelo_autos(id);
--

ALTER TABLE reserva_paquete_vuelo_autos
    ADD CONSTRAINT reserva_paquete_vuelo_autos_reserva_boleto_id_foreign
    FOREIGN KEY (reserva_boleto_id)
    REFERENCES reserva_boletos(id);
--

ALTER TABLE reserva_paquete_vuelo_hoteles
    ADD CONSTRAINT reserva_paquete_vuelo_hoteles_paquete_vuelo_hotel_id_foreign
    FOREIGN KEY (paquete_vuelo_hotel_id)
    REFERENCES paquete_vuelo_hoteles(id);
--

ALTER TABLE reserva_paquete_vuelo_hoteles
    ADD CONSTRAINT reserva_paquete_vuelo_hoteles_reserva_boleto_id_foreign
    FOREIGN KEY (reserva_boleto_id)
    REFERENCES reserva_boletos(id);

ALTER TABLE reserva_traslados
    ADD CONSTRAINT reserva_traslados_orden_compra_id_foreign
    FOREIGN KEY (orden_compra_id)
    REFERENCES orden_compras(id);

ALTER TABLE reserva_traslados
    ADD CONSTRAINT reserva_traslados_traslado_id_foreign
    FOREIGN KEY (traslado_id)
    REFERENCES traslados(id);

ALTER TABLE rol_permiso
    ADD CONSTRAINT rol_permiso_permiso_id_foreign
    FOREIGN KEY (permiso_id)
    REFERENCES permisos(id);

ALTER TABLE rol_permiso
    ADD CONSTRAINT rol_permiso_rol_id_foreign
    FOREIGN KEY (rol_id)
    REFERENCES roles(id);

ALTER TABLE sucursales
    ADD CONSTRAINT sucursales_ciudad_id_foreign
    FOREIGN KEY (ciudad_id)
    REFERENCES ciudades(id);

ALTER TABLE sucursales
    ADD CONSTRAINT sucursales_compania_id_foreign
    FOREIGN KEY (compania_id)
    REFERENCES companias(id);

ALTER TABLE tramos
    ADD CONSTRAINT tramos_avion_id_foreign
    FOREIGN KEY (avion_id)
    REFERENCES aviones(id);

ALTER TABLE tramos
    ADD CONSTRAINT tramos_destino_id_foreign
    FOREIGN KEY (destino_id)
    REFERENCES aeropuertos(id);

ALTER TABLE tramos
    ADD CONSTRAINT tramos_origen_id_foreign
    FOREIGN KEY (origen_id)
    REFERENCES aeropuertos(id);

ALTER TABLE traslados
    ADD CONSTRAINT traslados_aeropuerto_id_foreign
    FOREIGN KEY (aeropuerto_id)
    REFERENCES aeropuertos(id);

ALTER TABLE traslados
    ADD CONSTRAINT traslados_hotel_id_foreign
    FOREIGN KEY (hotel_id)
    REFERENCES hoteles(id);

ALTER TABLE user_rol
    ADD CONSTRAINT user_rol_rol_id_foreign
    FOREIGN KEY (rol_id)
    REFERENCES roles(id);

ALTER TABLE user_rol
    ADD CONSTRAINT user_rol_user_id_foreign
    FOREIGN KEY (user_id)
    REFERENCES users(id);
