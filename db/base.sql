create database if not exists blog;
use blog;

create table if not exists usuarios(
    id integer primary key auto_increment,
    nombre varchar(50), email varchar(50),
    password varchar(250)
);

create table if not exists posts(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(50),
    contenido TEXT,
    idUsuario INTEGER,
    FOREIGN KEY(idUsuario) 
        REFERENCES usuarios(id) ON UPDATE CASCADE
        ON DELETE RESTRICT
);
