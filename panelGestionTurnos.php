<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Panel <?php echo NombrePerfil($usuario->GetPerfilId()); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/panelAdministrador.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">
                    <?php echo "Panel ". NombrePerfil($usuario->GetPerfilId()) . " - Bienvenido: " . $usuario->GetNombrePila(); ?>
                </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Cuenta <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Opciones</a></li>
              <li><a href="javascript:;">Ayuda</a></li>
			  <li><a href="fnct/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="main">
  <div class="main-inner">
	<div class="widget widget-table action-table">
		<div class="widget-header"> <i class="icon-th-list"></i>
		  <h3>Turnos</h3>
      <?php
      if($usuario->GetPerfilId() == 3)
      {
        echo "<input value='Descargar a CSV' type='button' id='botonExcel'>";
      }
      ?>
		</div>
		<!-- /widget-header -->
		<div class="widget-content">
      <?php
      $botonSiguienteTurno = NULL;
      $vistaTabla = NULL;
      include("abm/CVistaTabla.php");
      $tabla =  new CVistaTabla();
      switch($usuario->GetPerfilId())
      {
        case 2:
          $vistaTabla .= $tabla->Show("turno", "WHERE horaAtencion IS NULL");
        break;
        case 3:
          $vistaTabla .= $tabla->Show("v_mostrarturnos");
        break;
      }
      if($usuario->GetPerfilId() == 3)
      {
        $_SESSION['tablaOperaciones'] = $vistaTabla;
      }
      echo $vistaTabla;
      ?>
		</div>
    <?php 
    if($usuario->GetPerfilId() == 2)
    {
      echo "<div id='botonera'>";
      echo "<input value='Siguiente turno' type='button' id='botonSiguienteTurno'>";
      echo "</div>";
    }
    ?>
		<!-- /widget-content --> 
	  </div>
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2013 <a href="http://www.egrappler.com/">Bootstrap Responsive Admin Template</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
<script src="js/panelJefe.js"></script>
<script src="js/panelAsesor.js"></script>
</body>
</html>
