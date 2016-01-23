<?php 
include_once("conexion.php");
include_once("CCriterioBusquedaTexto.php");
include_once("CCriterioBusqueda.php");

$orden = "";
$campo = "";
$forma = "";
$nombre = null;
$apellido = null;
$edad = null;
$localidad = null;
$filtro = "";
$arrayCondiciones = array();
$hayFiltro = false;
$hayOrden = false;

if(!empty($_GET)) {//compruebo que $_GET no este vacio y entonces pregunto que variable trae para hacer la consulta

	//Procedimiento para realizar la consulta ordenada de la tabla 'personas'.

	if (isset($_GET['e'])){ // si existe "e" entonces defino las variables "campo" y "orden"
		$hayOrden = true;
		$campo = "edad ";
		$forma = $_GET['e'];
	}
	if (isset($_GET['n'])){
		$hayOrden = true;
		$campo = "nombre ";
		$forma = $_GET['n'];
	}
	if (isset($_GET['a'])){
		$hayOrden = true;
		$campo = "apellido ";
		$forma = $_GET['a'];
	}
	if (isset($_GET['l'])){
		$hayOrden = true;
		$campo = "localidad ";
		$forma = $_GET['l'];
	}
	
	if($hayOrden)
	{
		$orden = "ORDER BY "; // declaro la variable "orden" para generar el orden de la consulta
	}
  
	//Procedimiento para realizar la consulta filtrada de la tabla 'personas'.
	
	if(isset($_GET['nombre']) && $_GET['nombre'] != "")
	{
		$hayFiltro = true;
		$arrayCondiciones[] = CCriterioBusquedaTexto::ConOperacion("nombre", "LIKE", "%" . $_GET['nombre'] . "%");
	}
	
	if(isset($_GET['apellido']) && $_GET['apellido'] != "")
	{
		$hayFiltro = true;
		$arrayCondiciones[] = CCriterioBusquedaTexto::ConOperacion("apellido", "LIKE", "%" . $_GET['apellido'] . "%");
	}
	
	if(isset($_GET['edad']) && $_GET['edad'] != "")
	{
		$hayFiltro = true;
		$arrayCondiciones[] = new CCriterioBusquedaTexto("edad", $_GET['edad']);
	}
	
	if(isset($_GET['localidad']) && $_GET['localidad'] != "")
	{
		$hayFiltro = true;
		$arrayCondiciones[] = CCriterioBusquedaTexto::ConOperacion("localidad", "LIKE", "%" . $_GET['localidad'] . "%");
	}
	
	if($hayFiltro) //Aca se genera la magia de los filtros.
	{
		$condicion = new CCriterioBusqueda($arrayCondiciones);
		$condicion->SetOperacion("OR");
		$filtro = "WHERE " . $condicion->GetTextoCondicion();
	}
	
}

//CONSULTA DE LAS PERSONAS EN LA BASE DE DATOS CON LAS 3 VARIABLES DEFINIDAS
$buscarPersonas = mysql_query("SELECT * FROM personas $filtro $orden $campo $forma ",$GLOBALS['conectar']);


			//generando el cuerpo de la tabla
                while ($row = mysql_fetch_assoc($buscarPersonas))
                {
                  echo "<tr>";
                  echo "<td>".$row['nombre']."</td>";
                  echo "<td>".$row['apellido']."</td>";
                  echo "<td>".$row['edad']."</td>";
                  echo "<td>".$row['localidad']."</td>";

                      $idPersona = $row['id_persona']; //busco el id de la persona para usarlo en las imagenes para editar y borrar. 
                      
                  echo "<td><center>"."<a href=abm/editarpersonas.php?id=$idPersona>Editar</a>"."</center></td>";
                  echo "<td><center>"."<a href=abm/borrarpersonas.php?id=$idPersona>Borrar</a>"."</center></td>";
                  echo "</tr>";
                }
?>
