<?php
include("CSerializable.php");

class CUsuario extends CSerializable
{
	private $nombreUsuario;
	private $password;
	private $nombrePila = "";
	private $perfilId;

	public function __construct($nombreUsuario, $password)
	{
		parent::__construct("usuario", "usuario_id, perfil_id, nombrePila, usuario, contrasena");
		$this->nombreUsuario = $nombreUsuario;
		$this->password = $password;
	}

	public static function ConNombrePila($nombreUsuario, $password, $nombrePila)
	{
		$temp = new self($nombreUsuario, $password);
		$temp->SetNombrePila($nombrePila);
		return $temp;
	}

	public function GetNombreUsuario()
	{
		return $this->nombreUsuario;
	}

	public function GetPerfilId()
	{
		return $this->perfilId;
	}

	public function GetPassword()
	{
		return $this->password;
	}

	public function GetNombrePila()
	{
		return $this->nombrePila;
	}

	public function GetColumnas()
	{
		return parent::GetColumnas();
	}

	public function GetColUsuario()
	{
		return str_replace(" ", "", explode(",", parent::GetColumnas())[3]);
	}

	public function GetColPassword()
	{
		return str_replace(" ", "", explode(",", parent::GetColumnas())[4]);
	}

	public function GetColNombrePila()
	{
		return str_replace(" ", "", explode(",", parent::GetColumnas())[2]);
	}

	public function GetColPerfil()
	{
		return str_replace(" ", "", explode(",", parent::GetColumnas())[1]);	
	}

	public function SetNombrePila($nombrePila)
	{
		$this->nombrePila = $nombrePila;
	}

	public function SetPerfilId($id)
	{
		$this->perfilId = $id;
	}

	public function GetCriterioAlta()
	{
		$criterioPerfilId = CCriterioBusquedaTexto::ConOperacion("","",$this->GetPerfilId());
		$criterioNombrePila = CCriterioBusquedaTexto::ConOperacion("","",$this->GetNombrePila());
		$criterioNombreUsuario = CCriterioBusquedaTexto::ConOperacion("","",$this->GetNombreUsuario());
		$criterioPassword = CCriterioBusquedaTexto::ConOperacion("","",$this->GetPassword());
		$criterio = new CCriterioBusqueda(array($criterioPerfilId, $criterioNombrePila, $criterioNombreUsuario, $criterioPassword));
		$criterio->SetOperacion(",");
		return $criterio;
	}
}
?>