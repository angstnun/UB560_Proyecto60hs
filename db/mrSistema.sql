CREATE TABLE perfil
(
	perfil_id INT UNSIGNED AUTO_INCREMENT,
	nombre VARCHAR(25) NOT NULL,
    PRIMARY KEY(perfil_id)
);

CREATE TABLE usuario
(
	usuario_id INT UNSIGNED AUTO_INCREMENT,
	perfil_id INT UNSIGNED NOT NULL,
	nombrePila VARCHAR(64) NOT NULL,
	usuario VARCHAR(25) NOT NULL,
	contrasena VARCHAR(32) NOT NULL,
    PRIMARY KEY(usuario_id),
	FOREIGN KEY(perfil_id) REFERENCES perfil(perfil_id)
);

CREATE TABLE turno
(
	turno_id INT UNSIGNED AUTO_INCREMENT,
	usuario_id INT UNSIGNED,
	nombrePilaCliente VARCHAR(64) NOT NULL,
	emailCliente VARCHAR(254) NOT NULL,
	horaIngreso DATETIME NOT NULL,
	horaAtencion DATETIME,
    PRIMARY KEY(turno_id),
	FOREIGN KEY(usuario_id) REFERENCES usuario(usuario_id)
);