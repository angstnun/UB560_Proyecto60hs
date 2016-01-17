<?php
include("CControladorSerializable.php");

class CVistaTabla
{

	private $orden = "";
	private $campo = "";
	private $forma = "";
	private $nombre = null;
	private $apellido = null;
	private $edad = null;
	private $localidad = null;
	private $filtro = "";
	private $arrayCondiciones = array();
	private $hayFiltro = false;
	private $hayOrden = false;

	function __construct()
	{

	}

	private function GenerarCabeceraTabla($cabecera)
	{
		$str = null;
		$str .= "<table id='tablaTurnos' class='table table-striped table-bordered'>" . "<thead>" . "<tr>";
		foreach($cabecera as $key => $value)
		{
          $str .= "<th>" . $key . "&nbsp;&nbsp;<a href='sistema.php?i=asc'><img src='img/arriba.png'></a>&nbsp;&nbsp;<a href='sistema.php?i=desc'><img src='img/abajo.png'></a></th>";
		}
		$str .= "</tr>" . "</thead>" . "<tbody>";
        $str .= "<tr>";
        return $str;
	}

	public function Show($tabla, $args = "")
	{
		$stringRetorno = null;
		$ctrlSer = new CControladorSerializable("sistemaub");
		$this->ComprobarFiltros();
		$resultado = $ctrlSer->ConsultaPersonalizada("SELECT * FROM " . $tabla  . "$this->filtro $this->orden $this->campo $this->forma" . $args . ";");
		$stringRetorno = $this->GenerarCabeceraTabla($resultado->fetch_array(MYSQLI_ASSOC));
        while ($row = $resultado->fetch_array(MYSQLI_ASSOC))
        {
          foreach($row as $val)
          {
          	$stringRetorno .= "<td>" . $val . "</td>";
          }
          $stringRetorno .= "</tr>";
        }
        return $stringRetorno;
    }

	private function ComprobarFiltros()
	{
		if(!empty($_GET)) 
		{

			if (isset($_GET['e']))
			{ // si existe "e" entonces defino las variables "campo" y "orden"
				$this->hayOrden = true;
				$this->campo = "edad ";
				$this->forma = $_GET['e'];
			}
			if (isset($_GET['n']))
			{
				$this->hayOrden = true;
				$this->campo = "nombre ";
				$this->forma = $_GET['n'];
			}
			if (isset($_GET['a']))
			{
				$this->hayOrden = true;
				$this->campo = "apellido ";
				$this->forma = $_GET['a'];
			}
			if (isset($_GET['l']))
			{
				$this->hayOrden = true;
				$this->campo = "localidad ";
				$this->forma = $_GET['l'];
			}
			
			if($hayOrden)
			{
				$orden = "ORDER BY "; // declaro la variable "orden" para generar el orden de la consulta
			}
		  
			//Procedimiento para realizar la consulta filtrada de la tabla 'personas'.
			
			if(isset($_GET['nombre']) && $_GET['nombre'] != "")
			{
				$this->hayFiltro = true;
				$this->arrayCondiciones[] = CCriterioBusquedaTexto::ConOperacion("nombre", "LIKE", "%" . $_GET['nombre'] . "%");
			}
			
			if(isset($_GET['apellido']) && $_GET['apellido'] != "")
			{
				$this->hayFiltro = true;
				$this->arrayCondiciones[] = CCriterioBusquedaTexto::ConOperacion("apellido", "LIKE", "%" . $_GET['apellido'] . "%");
			}
			
			if(isset($_GET['edad']) && $_GET['edad'] != "")
			{
				$this->hayFiltro = true;
				$this->arrayCondiciones[] = new CCriterioBusquedaTexto("edad", $_GET['edad']);
			}
			
			if(isset($_GET['localidad']) && $_GET['localidad'] != "")
			{
				$this->hayFiltro = true;
				$this->arrayCondiciones[] = CCriterioBusquedaTexto::ConOperacion("localidad", "LIKE", "%" . $_GET['localidad'] . "%");
			}
			
			if($hayFiltro) //Aca se genera la magia de los filtros.
			{
				$condicion = new CCriterioBusqueda($arrayCondiciones);
				$condicion->SetOperacion("OR");
				$this->filtro = "WHERE " . $condicion->GetTextoCondicion();
			}
		}
	}
}