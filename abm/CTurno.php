<?php
include_once("CSerializable.php");

class CTurno extends CSerializable
{
	private $turnoId = NULL;
	private $usuarioId = NULL;
	private $nombrePilaCliente = NULL;
	private $emailCliente = NULL;
	private $horaIngreso = NULL;
	private $horaAtencion = NULL;

	function __construct()
	{
		parent::__construct("turno", "turno_id, usuario_id, nombrePilaCliente, emailCliente, horaIngreso, horaAtencion");
	}

	public static function CrearTurno($turnoId, $usuarioId, $nombrePila, $emailCliente, $horaIngreso, $horaAtencion)
	{
		$temp = new self();
		$temp->SetTurnoId($turnoId);
		$temp->SetUsuarioId($usuarioId);
		$temp->SetNombrePilaCliente($nombrePila);
		$temp->SetEmailCliente($emailCliente);
		$temp->SetHoraIngreso($horaIngreso);
		$temp->SetHoraAtencion($horaAtencion);
		return $temp;
	}

	public static function CrearTurnoCola($nombrePila, $emailCliente)
	{
		$temp = new self();
		$temp->SetNombrePilaCliente($nombrePila);
		$temp->SetEmailCliente($emailCliente);
		return $temp;
	}

	public function SetTurnoId($id)
	{
		$this->turnoId = $id;
	}

	public function SetUsuarioId($id)
	{
		$this->usuarioId = $id;
	}

	public function SetNombrePilaCliente($nombrePila)
	{
		$this->nombrePilaCliente = $nombrePila;
	}

	public function SetEmailCliente($emailCliente)
	{
		$this->emailCliente = $emailCliente;
	}

	public function SetHoraIngreso($horaIngreso)
	{
		$this->horaIngreso = $horaIngreso;
	}

	public function SetHoraAtencion($horaAtencion)
	{
		$this->horaAtencion = $horaAtencion;
	}

	public function GetTurnoId()
	{
		return $this->turnoId;
	}

	public function GetUsuarioId()
	{
		return $this->usuarioId;
	}

	public function GetNombrePilaCliente()
	{
		return $this->nombrePilaCliente;
	}

	public function GetEmailCliente()
	{
		return $this->emailCliente;
	}

	public function GetHoraIngreso()
	{
		return $this->horaIngreso;
	}

	public function GetHoraAtencion()
	{
		return $this->horaAtencion;
	}

	public function GetCriterioAlta()
	{
		$criterioNombrePila = CCriterioBusquedaTexto::ConOperacion("","",$this->GetNombrePilaCliente());
		$criterioEmailCliente = CCriterioBusquedaTexto::ConOperacion("","",$this->GetEmailCliente());
		$criterioHoraIngreso = CCriterioBusquedaTexto::ConOperacion("","","NOW()");
		$criterio = new CCriterioBusqueda(array($criterioNombrePila, $criterioEmailCliente, $criterioHoraIngreso));
		$criterio->SetOperacion(",");
		return $criterio;
	}

	public function GetColumnasAlta()
	{
		$temp = explode(",", $this->columnas);
		unset($temp[0]);
		unset($temp[1]);
		unset($temp[5]);
		return implode(",", $temp);
	}

}

?>