<?php
class CConexionSQL
{
	private $host = "localhost";
	private $user = "u220754411_clt";
	private $pass = "s4p0k4n1k4n";
	private $conexion;
	
	public function __construct()
	{
		
	}

	public static function CConexionSQL($host, $user, $pass)
	{
		$temp = new self();
		$temp->SetHost($host);
		$temp->SetUser($user);
		$temp->SetPass($pass);
		return $temp;
	}
	
	protected function SetHost($host)
	{
		$this->host = $host;
	}
	
	protected function SetUser($user)
	{
		$this->user = $user;
	}
	
	protected function SetPass($pass)
	{
		$this->pass = $pass;
	}

	protected function GetConexion()
	{
		return $this->conexion;
	}
	
	protected function Conectar($db)
	{
		$this->conexion = mysqli_connect($this->host, $this->user, $this->pass);
		mysqli_select_db($this->conexion, $db) or die (mysqli_connect_error());
		@mysqli_query("SET NAMES 'utf8'");
		if(!$this->conexion)
		{
			die("Error al conectarse con SQL: " . mysqli_error());
		}
	}

	protected function Desconectar()
	{
		return mysqli_close($this->conexion);
	}
}
?>
