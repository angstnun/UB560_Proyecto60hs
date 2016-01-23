<?php
include_once("CControladorTurnos.php");

if(isset($_POST['nombrePila']) && isset($_POST['emailCliente']))
{
	$ctrlTurnos = new CControladorTurnos("sistemaub");
	echo $ctrlTurnos->AgregarTurno($_POST['nombrePila'], $_POST['emailCliente']);
}
else
{
	echo "Por favor complete los datos.";
}

?>