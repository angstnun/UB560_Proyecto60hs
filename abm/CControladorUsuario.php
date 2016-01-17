<?php
include("CControladorSerializable.php");
include_once("CUsuarioFactory.php");

class CControladorUsuario extends CControladorSerializable
{

	public function __construct($db)
	{
		parent::__construct($db);
	}

	public function NuevoUsuario($perfilId, $nombreUsuario, $password, $nombrePila = NULL)
	{
		$conexion = new CConexionABM();
		$usuario = new CUsuario($nombreUsuario, md5($password));
		$usuario->SetPerfilId($perfilId);
		if(!is_null($nombrePila))
		{
			$usuario->SetNombrePila($nombrePila);
		}
		return $conexion->AltaSerializable($this->GetDb(), $usuario, $usuario->GetCriterioAlta());
	}

	public function EliminarUsuario($id)
	{
		return $conexion->BajaSerializable($this->GetDb(), $usuario, $criterio);
	}

	public function Login($nombreUsuario, $password)
	{
		$usuarioFactory = new CUsuarioFactory();
		$usuario = $this->SeleccionarUsuario($this->GetDb(), $nombreUsuario);
		if(count($usuario) > 0)
		{
			$usuario = $usuarioFactory->ConstruirUsuario($usuario);
			return $this->VerificarPassword($usuario->GetPassword(), md5($password));
		}
		return false;
	}

	private function VerificarPassword($pass1, $pass2)
	{
		return ($pass1 == $pass2 ? true : false);
	}

	public function GetUsuario($nombreUsuario)
	{
		if(count($nombreUsuario) > 0)
		{
			$usuarioFactory = new CUsuarioFactory();
			$usuario = $this->SeleccionarUsuario($this->GetDb(), $nombreUsuario);
			if(count($usuario) > 0)
			{
				return $usuarioFactory->ConstruirUsuario($usuario);
			}
		}
		return false;
	}

	private function SeleccionarUsuario($db, $nombreUsuario)
	{
		if(count($nombreUsuario) > 0)
		{
			$conexion = new CConexionABM();
			$temp = new CUsuario($nombreUsuario, "");
			$criterio = new CCriterioBusquedaTexto($temp->GetColUsuario(), $nombreUsuario);
			return $conexion->SeleccionarSerializables($db, $temp->GetTabla(), $temp->GetColumnas(), $criterio);
		}
		return false;
	}
}
?>