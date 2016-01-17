<?php
//ACA SE SETEAN LOS VALORES DE LA SESSION CORRESPONDIENTE A LOS FILTROS

if(!empty($_GET)) //compruebo que $_GET no este vacio y entonces pregunto que variable trae para hacer la consulta
{
	if(isset($_GET['nombre']))
	{
		AgregarValoresFiltroSession("nombre", $_GET['nombre']);
	}
	
	if(isset($_GET['apellido']))
	{
		AgregarValoresFiltroSession("apellido", $_GET['apellido']);
	}
	
	if(isset($_GET['edad']))
	{
		AgregarValoresFiltroSession("edad", $_GET['edad']);
	}
	
	if(isset($_GET['localidad']))
	{
		AgregarValoresFiltroSession("localidad", $_GET['localidad']);
	}
}

function AgregarValoresFiltroSession($campo, $valor)
{
	$_SESSION['valoresFiltro'][$campo] = $valor;
}

function GetValoresFiltro() //Amego imprimime la url GET.
{
	return "&nombre=" . $_SESSION['valoresFiltro']['nombre'] . "&apellido=" . $_SESSION['valoresFiltro']['apellido'] . "&edad=" . $_SESSION['valoresFiltro']['edad'] . "&localidad=" . $_SESSION['valoresFiltro']['localidad'];
}

function LimpiarValoresFiltroSession()
{
	$_SESSION['valoresFiltro'] = array();
}
?>
