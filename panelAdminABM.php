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
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

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
				<?php echo("Sistema UB - Bienvenido: " . $usuario->GetNombrePila()); ?>	
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
		          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
		                            class="icon-user"></i>Cuenta<b class="caret"></b></a>
		            <ul class="dropdown-menu">
		              <li><a href="fnct/logout.php">Logout</a></li>
		            </ul>
		          </li>
		        </ul>
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
		<form name="ingresar" action="abm/CAltaUsuario.php" method="post" enctype="multipart/form-data">
		
			<h1>Nuevo usuario</h1>		
			
			<div class="login-fields">
				
				<p>Formulario alta de usuarios</p>

				<div class="field">
					<label for="nombrePila">Nombre completo</label>
					<input type="text" id="nombrePila" name="nombrePila" value="" placeholder="Nombre completo" class="login username-field" />
				</div> <!-- /field -->

				<div class="field">
           			<label for="perfil">Perfil</label>
					<select id="perfil" name='perfil' class="lista">
						<option value="1">Admin</option>
						<option value="2">Asesor</option>
						<option value="3">Jefe</option>
						<option value="4">Cliente</option>
					</select>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="username">Usuario</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Contrase&ntilde;a:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
									
				<button class="button btn btn-success btn-large">Aceptar</button>
				
			</div> <!-- .actions -->
			
		</form>
	</div> <!-- /content -->

</div> <!-- /account-container -->


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script> 
<script src="js/signin.js"></script>

</body>

</html>