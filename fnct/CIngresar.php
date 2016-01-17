<?php
include "../abm/CControladorUsuario.php";

class CIngresar
{
	public function __construct()
	{

	}

	public function Ingresar($user, $pass)
	{
		$usrCTRL = new CControladorUsuario("sistemaub");
		if (!$usrCTRL->Login($user, $pass)) //Revisa si se devolvio el usuario indicado por el usuario.
		{
			header("Location: ../error.php");
		}
		else
		{
			include "session.php";
			FSession(serialize($usrCTRL->GetUsuario($user)));
			header("Location: ../sistema.php");
		}
	}
}

$ingresar = new CIngresar();
$ingresar->Ingresar($_POST['username'], $_POST['password']);
?>