<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Sistema UB</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/panelIngresoCliente.css" rel="stylesheet" type="text/css">

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
			
			<a class="brand" href="index.html">
				Sistema UB				
			</a>		
			
			<div class="nav-collapse">
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
	</div> <!-- /navbar -->

	<div id='pantallaPrincipal'>
		<div class='contenedor'>
			<h1>BIENVENIDO AL SISTEMA UB</h1>
		</div>
		<div class='contenedor'>
			<button id='botonIngresoCliente' class="button btn btn-success btn-large">Ingresar</button>
		</div>
	</div>

<div id='panelIngresoCliente' class="account-container">
	
	<div class="content clearfix">
		
		<form id='formularioIngresoCliente' name="ingresar" action="#" method="post" enctype="multipart/form-data">
		
			<h1>INGRESO CLIENTES</h1>		
			
			<div class="login-fields">

				<div class="field">
					<label for="nombrePila">Nombre completo</label>
					<input type="text" id="nombrePila" name="nombrePila" value="" placeholder="Nombre completo" class="login username-field campo" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="username">E-Mail</label>
					<input type="email" id="eMailCliente" name="eMailCliente" value="" placeholder="E-Mail" class="login username-field campo" />
				</div> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
									
				<button id='botonAceptarCliente' class="button btn btn-success btn-large">Aceptar</button>

				<button id='botonCancelarCliente' class="button btn btn-success btn-large">Cancelar</button>
				
			</div> <!-- .actions -->
			
		</form>
	</div> <!-- /content -->

</div> <!-- /account-container -->

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/panelIngresoCliente.js"></script>
<script src="js/signin.js"></script>

</body>

</html>
