<?php
session_start();
include_once("conexion.php");
if($_SESSION["id_usuario"] == null){
header("Location: index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<link rel="StyleSheet" href="../css/estilo.css" type="text/css">
<link rel="StyleSheet" href="../css/tabla.css" type="text/css">

<title>Programación en entorno de redes</title>

</head>

<body>

<div id="pagewrap">

	<div id="header">
		<h1>Programación en entorno de Redes</h1>
	</div>

	<div id="content">
	<a href="javascript:window.history.back();">&laquo; Volver</a>
		<h2>Editar Persona</h2>

		<?php
			$idPersona = $_GET['id']; //obtengo el id de la persona pasado por URL

			// Genero la busqueda en la base de datos tabla personas con el id.
			$buscarPersona = mysql_query("SELECT * FROM personas WHERE id_persona LIKE '$idPersona'",$GLOBALS['conectar']);
			$datos = mysql_fetch_assoc($buscarPersona);
		?>


		<form name="agregarPersona" action="modificarpersona.php" method="post" enctype="multipart/form-data">
		<table>
		<thead>
			<tr>
				<th></th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>Nombre:</td>
				<td><input type="text" id="nombre" name="nombre" value="<?php echo $datos['nombre']; ?>" required/></td>
			</tr>
			<tr>
				<td>Apellido:</td>
				<td><input type="text" id="apellido" name="apellido" value="<?php echo $datos['apellido']; ?>" required/></td>
			</tr>
			<tr>
				<td>Edad:</td>
				<td><input type="number" id="edad" name="edad" value="<?php echo $datos['edad']; ?>" required/></td>
			</tr>
			<tr>
				<td>Localidad:</td>
				<td><input type="text" id="localidad" name="localidad" value="<?php echo $datos['localidad']; ?>" required/></td>
			</tr>
		</tbody>
		</table>
			<input type="text" id="idPersona" name="idPersona" value="<?php echo $idPersona; ?>" hydden>
			<br><button>GUARDAR CAMBIOS</button>
		</form>


	</div>
	
	<div id="footer">
		<h4>Universidade Belgrano - 2015</h4>
	</div>

</div>
<script type="text/javascript">
	document.getElementById('idPersona').style.display='none';
</script>
</body>
</html>