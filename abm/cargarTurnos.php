<?php
include_once("CVistaTabla.php");
$vistaTabla = NULL;
$tabla =  new CVistaTabla();
$vistaTabla .= $tabla->Show("v_mostrarcolaturnos","","LIMIT 3");
echo $vistaTabla;
?>