/*Crear la base de datos*/
DROP DATABASE IF EXISTS restaurante;
CREATE DATABASE restaurante;

/*Usar bbdd*/
USE restaurante;

/*Creación de tablas*/
CREATE TABLE restaurante(
    cod_restaurante INT PRIMARY KEY,
    email VARCHAR(30) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL,
    pais VARCHAR(20) NOT NULL,
    direccion VARCHAR(30)NOT NULL,
    codigo_postal VARCHAR(5) NOT NULL
);

CREATE TABLE pedido(
    cod_pedido INT PRIMARY KEY AUTO_INCREMENT,
    enviado BOOLEAN DEFAULT false,
    fecha DATE NOT NULL,
    cod_restaurante INT NOT NULL,
    FOREIGN KEY(cod_restaurante) REFERENCES restaurante(cod_restaurante)
);

CREATE TABLE categoria(
    cod_categoria INT PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL,
    descripcion VARCHAR(40) NOT NULL
);

CREATE TABLE producto(
    cod_producto INT PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
    peso FLOAT NOT NULL,
    stock INT NOT NULL,
    cod_categoria INT NOT NULL,
    FOREIGN KEY(cod_categoria) REFERENCES categoria(cod_categoria)
);

CREATE TABLE producto_pedido(
    cod_pedido INT NOT NULL,
    cod_producto INT NOT NULL,
    cantidad INT NOT NULL,
    PRIMARY KEY(cod_pedido, cod_producto),
    FOREIGN KEY(cod_pedido) REFERENCES pedido(cod_pedido),
    FOREIGN KEY(cod_producto) REFERENCES producto(cod_producto)
);