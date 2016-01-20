<?php
include_once("CControladorTurnos.php");

$cTurnos = new CControladorTurnos("sistemaub");
$cTurnos->SiguienteTurno();
header("Location: ../sistema.php");