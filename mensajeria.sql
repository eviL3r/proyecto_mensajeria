CREATE DATABASE mensajeria;

CREATE USER josegon@localhost IDENTIFIED BY '123456789H';
GRANT ALL PRIVILEGES ON mensajeria.* TO josegon@localhost;

USE mensajeria;

create table usuarios(
                       id_usuario INT(3) AUTO_INCREMENT,
                       nombre VARCHAR(20) NOT NULL ,
                       apellido1 VARCHAR(20) NOT NULL ,
                       apellido2 VARCHAR(20),
                       login VARCHAR(20) NOT NULL,
                       password VARCHAR(20) NOT NULL,
                       email VARCHAR(20) NOT NULL ,
                       CONSTRAINT id_usuario_pk PRIMARY KEY (id_usuario),
                       CONSTRAINT login_uk1 UNIQUE (login),
                       CONSTRAINT email_uk2 UNIQUE (email)
);
insert into  mensajeria.usuarios(nombre, apellido1, apellido2, login, password, email) values ('admin','admin','admin','admin','1234','admin@localhost.com');
select * from mensajeria.usuarios;