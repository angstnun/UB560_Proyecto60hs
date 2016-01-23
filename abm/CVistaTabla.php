	<?php
include_once("CControladorSerializable.php");

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
          $str .= "<th>" . $key . "&nbsp;&nbsp;<a href='sistema.php?" . $key . "=asc'><img src='img/arriba.png'></a>&nbsp;&nbsp;<a href='sistema.php?" . $key . "=desc'><img src='img/abajo.png'></a></th>";
		}
		$str .= "</tr>" . "</thead>";
		$str .= "<tbody>" . "<tr>";
		foreach($cabecera as $val)
		{
			$str .= "<td>" . $val . "</td>";
		}
		$str .= "</tr>";
        return $str;
	}

	public function Show($tabla, $args = "", $select = "")
	{
		$stringRetorno = null;
		$ctrlSer = new CControladorSerializable("sistemaub");
		$this->ComprobarFiltros();
		$resultado = $ctrlSer->ConsultaPersonalizada("SELECT * FROM " . $tabla . " " . $args . $this->filtro . " " . $this->orden . " " . $this->campo . " " . $this->forma . " " . $select . ";");
		$stringRetorno = $this->GenerarCabeceraTabla($resultado->fetch_array(MYSQLI_ASSOC));
        while ($row = $resultado->fetch_array(MYSQLI_ASSOC))
        {
			$stringRetorno .= "<tr>";
			foreach($row as $val)
			{
				$stringRetorno .= "<td>" . $val . "</td>";
			}
			$stringRetorno .= "</tr>";
        }
        $stringRetorno .= "</tbody>" . "</table>";
        return $stringRetorno;
    }

	private function ComprobarFiltros()
	{
		if(!empty($_GET)) 
		{
			foreach($_GET as $key => $value)
			{
				$this->hayOrden = true;
				$this->campo = $key . " ";
				$this->forma = $value;
			}
			
			if($this->hayOrden)
			{
				$this->orden = "ORDER BY "; // declaro la variable "orden" para generar el orden de la consulta
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
			
			if($this->hayFiltro) //Aca se genera la magia de los filtros.
			{
				$condicion = new CCriterioBusqueda($arrayCondiciones);
				$condicion->SetOperacion("OR");
				$this->filtro = "WHERE " . $condicion->GetTextoCondicion();
			}
		}
	}
}