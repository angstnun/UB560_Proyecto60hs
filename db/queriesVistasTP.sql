CREATE VIEW AS v_mostrarturnos AS
SELECT turno_id, nombrePilaCliente, emailCliente, horaIngreso, horaAtencion, usuario
FROM turno, usuario
WHERE turno.usuario_id = usuario.usuario_id AND turno.usuario_id IS NOT NULL AND horaAtencion IS NOT NULL;

CREATE VIEW AS v_mostrarturnollamado AS
SELECT turno_id as Turno, usuario as Asesor
FROM turno AS T, usuario AS U
WHERE turno.usuario_id = usuario.usuario_id AND turno.usuario_id IS NOT NULL AND horaAtencion IS NOT NULL;
ORDER BY Turno DESC
LIMIT 1;

CREATE VIEW AS v_mostrarcolaturnos AS
SELECT turno_id as Turno, nombrePilaCliente as Cliente
FROM turno AS T, usuario AS U
WHERE turno.usuario_id = usuario.usuario_id AND turno.usuario_id IS NULL AND horaAtencion IS NULL;
ORDER BY Turno DESC;

CREATE VIEW AS v_colaturnoespera AS
SELECT *
FROM turno AS T
WHERE T.usuario_id IS NULL AND T.horaAtencion IS NULL;
ORDER BY turno_id ASC;

CREATE VIEW AS v_primerturno AS
SELECT * 
FROM turno AS T
WHERE T.usuario_id IS NULL AND T.horaAtencion IS NULL;
ORDER BY turno_id ASC
LIMIT 1;


