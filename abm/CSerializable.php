<?php
include("CCriterioBusqueda.php");
include("CCriterioBusquedaTexto.php");

class CSerializable
{
	private $tabla = "";
	private $columnas = "";
	private $id = -1;

	public function __construct($tabla, $columnas)
	{
		$this->tabla = $tabla;
		$this->columnas = $columnas;
	}

	public static function ConId($tabla, $columnas, $id)
	{
		$temp = new self($tabla, $columnas);
		$temp->SetId($id);
		return $temp;
	}

	public function SetId($id)
	{
		$this->id = $id;
	}

	public function GetId()
	{
		return $this->id;
	}

	public function SetTabla($tabla)
	{
		$this->tabla = $tabla;
	}

	public function GetTabla()
	{
		return $this->tabla;
	}

	public function SetColumnas($columnas)
	{
		$this->columnas = $columnas;
	}

	public function GetColumnas()
	{
		return $this->columnas;
	}

	public function GetColumnasAlta()
	{
		$temp = explode(",", $this->columnas);
		unset($temp[0]);
		$temp[1] = str_replace(" ", "", $temp[1]);
		return implode(",", $temp);
	}

	public function GetColId()
	{
		return explode(",", $this->columnas)[0];
	}

}
?>