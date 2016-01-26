<?php
include_once("CVistaTabla.php");
$vistaTabla = NULL;
$tabla =  new CVistaTabla();
$vistaTabla = $tabla->Show("v_mostrarturnollamado");
echo $vistaTabla;
?>