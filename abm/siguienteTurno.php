<?php
include_once("CControladorTurnos.php");

$cTurnos = new CControladorTurnos("u220754411_sisub");
$cTurnos->SiguienteTurno();
header("Location: ../sistema.php");