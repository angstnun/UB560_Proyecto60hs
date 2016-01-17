<?php
include("CUsuario.php");

$usr = new CUsuario("farofa", "fafafa");
$usr2 = CUsuario::ConNombrePila("Tifo", "idea", "Juan Carlos Zaraza");
echo $usr->GetColId();
echo $usr2->GetNombrePila();
?>