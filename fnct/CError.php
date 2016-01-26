<?php

class CError
{
	private $m_codigo = NULL;
	private $m_descripcion = NULL;

	function __construct()
	{

	}

	public static function CrearError($codigoError)
	{
		$temp = new self();
		$temp->GetError($codigoError);
		return $temp;
	}

	public function SetCodigo($codigo)
	{
		$this->m_codigo = $codigo;
	}

	public function SetDescripcion($descripcion)
	{
		$this->m_descripcion = $descripcion;
	}

	public function GetCodigo()
	{
		return $this->m_codigo;
	}

	public function GetDescripcion()
	{
		return $this->m_descripcion;
	}

	private function GetError($codigoError)
	{
		if($codigoError = "passErr")
		{
			$this->m_codigo = 1;
			$this->m_descripcion = "La contrasena ingresada es incorrecta.";
		}
	}
}

?>