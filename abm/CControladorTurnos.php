<?php
include_once("CControladorSerializable.php");
include_once("CCriterioBusquedaTexto.php");
include_once("CTurno.php");

class CControladorTurnos extends CControladorSerializable
{
	public function __construct($db)
	{
		parent::__construct($db);
	}


	public function SiguienteTurno()
	{
		$conexion = new CConexionABM();
		return $conexion->ConsultaPersonalizada($this->db, "UPDATE turno SET horaAtencion = NOW(), usuario_id = " . $usuario->GetId() . " WHERE turno_id = (SELECT turno_id FROM v_primerturno)" . ";");
	}

	public function AgregarTurno($nombreCliente, $emailCliente)
	{
		$conexion = new CConexionABM();
		$turno = CTurno::CrearTurnoCola($nombreCliente, $emailCliente);
		return $conexion->AltaSerializable($this->GetDb(), $turno, $turno->GetCriterioAlta());
	}
}