<?php
include_once("CConexionABM.php");

class CControladorSerializable
{

	private $db = NULL;

	function __construct($db)
	{
		$this->db = $db;
	}

	public function ConsultaPersonalizada($consulta)
	{
		$conexion = new CConexionABM();
		return $conexion->ConsultaPersonalizada($this->db, $consulta);
	}

	public function GetDb()
	{
		return $this->db;
	}

	public function SetDb($db)
	{
		$this->db = $db;
	}
}
?>