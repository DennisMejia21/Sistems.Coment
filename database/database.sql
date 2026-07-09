CREATE TABLE usuarios (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nombre VARCHAR(50) NOT NULL,

    apellido VARCHAR(50) NOT NULL,

    password VARCHAR(255) NOT NULL

);


CREATE TABLE comentarios (

    id INT AUTO_INCREMENT PRIMARY KEY,

    usuario_id INT NOT NULL,

    comentario TEXT NOT NULL,

    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,


    FOREIGN KEY (usuario_id)
    REFERENCES usuarios(id)

);