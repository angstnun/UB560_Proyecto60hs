<?php
include_once("CControladorSerializable.php");
include_once("CCriterioBusquedaTexto.php");

class CControladorTurnos extends CControladorSerializable
{
	public function __construct($db)
	{
		parent::__construct($db);
	}


	public function SiguienteTurno()
	{
		$valores = new CCriterioBusquedaTexto("horaAtencion","GETDATE()");
		$criterio = new CCriterioBusquedaTexto("")
		return $conexion->ConsultaPersonalizada($this->db, "UPDATE turno SET horaAtencion = NOW(), usuario_id = " . $usuario->GetId() . " WHERE turno_id = (SELECT turno_id FROM v_primerturno)" . ";");
	}
}