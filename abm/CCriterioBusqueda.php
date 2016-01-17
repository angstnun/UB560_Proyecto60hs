<?php
class CCriterioBusqueda
{
	private $operacion = "AND";
	private $criterios = array();
	
	function __construct($arrayCriterioBusquedaTexto)
	{
		$this->criterios = $arrayCriterioBusquedaTexto;
	}
	
	public function SetOperacion($operacion)
	{
		$this->operacion = $operacion;
	}
	
	public function GetTextoCondicion()
	{
		$textoCriterio = "";
		
		if(count($this->criterios) > 0)
		{
			foreach($this->criterios as $criterioBusquedaTexto)
			{
				if(strlen($textoCriterio) > 0)
				{
					$textoCriterio .= " " . $this->operacion . " " . $criterioBusquedaTexto->GetTextoCondicion();
				}
				else
				{
					$textoCriterio = $criterioBusquedaTexto->GetTextoCondicion();
				}
			}
			return $textoCriterio;
		}
		return "";
	}
}
?>