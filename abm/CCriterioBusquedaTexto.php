<?php
class CCriterioBusquedaTexto
{
	private $campo = "";
	private $valor = "";
	private $operacion = "=";
	
	function __construct($stringCampo, $stringValor)
	{
		$this->campo = $stringCampo;
		$this->valor = $stringValor;
	}
	
	public static function ConOperacion($stringCampo, $operacion, $stringValor) 
	{
    	$temp = new self($stringCampo, $stringValor);
    	$temp->SetOperacion($operacion);
    	return $temp;
    }
	
	public function SetOperacion($operacion)
	{
		$this->operacion = $operacion;
	}
	
	public function GetTextoCondicion()
	{
		if (strpos($this->valor,'()')) {
		    return $this->campo . " " . $this->operacion . " " . $this->valor;
		}
		return $this->campo . " " . $this->operacion . " " . "'" . $this->valor . "'";
	}
}
?>