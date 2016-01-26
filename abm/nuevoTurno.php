<?php
include_once("CControladorTurnos.php");

if(isset($_POST['nombrePila']) && isset($_POST['emailCliente']))
{
	$nombrePila = $_POST['nombrePila'];
	$emailCliente = $_POST['emailCliente'];
	$ctrlTurnos = new CControladorTurnos("sistemaub");
	if(!$ctrlTurnos->VerificarEmail($emailCliente))
	{
		echo "El e-mail ingresado no es valido.";
	}
	else
	{
		if($ctrlTurnos->AgregarTurno($nombrePila, $emailCliente))
		{
			echo "Por favor espere a ser llamado.";
		}
	}
}
else
{
	echo "Por favor complete los datos.";
}

?>