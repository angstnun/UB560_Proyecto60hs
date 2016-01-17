<?php session_start();
include("abm/CUsuario.php");

function NombrePerfil($tipoPerfil)
{
	switch($tipoPerfil)
	{
		case 1:
			return "Administrador";
		case 2:
			return "Asesor";
		case 3:
			return "Jefe";
	}
}

class CVistaSistema
{

	public function __construct()
	{

	}

	public function ComprobarSession()
	{
		if($_SESSION["usuario"] == null)  //Si no hay usuario seteado...
		{
			header("Location: index.html"); //...te vas a la...index.php.
			exit();
		}
		else
		{
			$usuarioActual = unserialize($_SESSION['usuario']);
			$this->Show($usuarioActual->GetPerfilId());
		}
	}

	private function Show($tipoVista)
	{
		$usuario = unserialize($_SESSION['usuario']);
		if($tipoVista == 1)
		{
			include("panelAdminABM.php");
		}
		else
		{
			include("panelGestionTurnos.php");
		}
	}
}

$vistaSistema = new CVistaSistema();
$vistaSistema->ComprobarSession();
?>