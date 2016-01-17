<?php session_start();

function FSession($var)
{
	$_SESSION['usuario'] = $var;
}

?>