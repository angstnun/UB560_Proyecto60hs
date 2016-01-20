<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Panel Espera</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/panelEspera.css" rel="stylesheet">
</head>
<body>
<div class="navbar navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
<a class="brand" href="index.html">Panel Espera</a>		
<div class="nav-collapse">
</div><!--/.nav-collapse -->	
</div> <!-- /container -->
</div> <!-- /navbar-inner -->
</div> <!-- /navbar -->
<div class="contenedor">
<div class="panelpropaganda">
<div class="panelinterno1">
<img src="css/pages/imagenesPropaganda/Bienvenido_Universidad_de_Belgrano.jpg"></img>
</div>
<div class="panelinterno1">
<img src="css/pages/imagenesPropaganda/servicios_empresariales.jpg"></img>
</div>
<div class="panelinterno1">
<img src="css/pages/imagenesPropaganda/featured4.jpg"></img>
</div>
<div class="panelfin">
</div>
</div>
<div class="panelhora">
<div id="TT_tCNkkE1EEnncMBIKNfzDYiJCcUaKT4SlbdEdEZCIakD5G535G">El tiempo por Tutiempo.net</div>
</div> 
<div class="panelfin">
</div>
<div class="panelprincipal">
	<?php
      $botonSiguienteTurno = NULL;
      $vistaTabla = NULL;
      include("abm/CVistaTabla.php");
      $tabla =  new CVistaTabla();
      $vistaTabla .= $tabla->Show("v_mostrarcolaturnos");
      $vistaTabla .= "</tbody>" . "</table>";
      echo $vistaTabla;
      ?>
</div>
</div> <!-- /account-container -->
<script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_tCNkkE1EEnncMBIKNfzDYiJCcUaKT4SlbdEdEZCIakD5G535G"></script>
</body>
</html>