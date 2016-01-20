<?php
include ("CConexionSQL.php");

class CConexionABM extends CConexionSQL
{

  public function __construct()
  {

  }

  public static function CConexionABM($host, $user, $pass)
  {
    $temp = new self();
    $temp->SetHost($host);
    $temp->SetUser($user);
    $temp->SetPass($pass);
    return $temp;
  }

  public function AltaSerializable($db, $serializable, $criterio)
  {
    $this->Conectar($db);
    $retorno =  mysqli_query(parent::GetConexion(), "INSERT INTO " . $serializable->GetTabla() . "(" . $serializable->GetColumnasAlta() . ") VALUES (" . $criterio->GetTextoCondicion() .");");
    $this->Desconectar();
    // return $retorno;
    return $retorno;
  }

  public function BajaSerializable($db, $serializable, $criterio)
  {
    $this->Conectar($db);
    $retorno = mysqli_query("DELETE FROM " . $serializable->GetTabla() . " WHERE " . $criterio->GetTextoCondicion() . ";");
    $this->Desconectar();
    return $retorno;
  }

  public function ModificarSerializable($db, $serializable, $valores, $criterio)
  {
    $this->Conectar($db);
    $retorno = mysqli_query("UPDATE " . $serializable->GetTabla() . " SET " . $valores->GetTextoCondicion() . " WHERE " . $criterioModificacion->GetTextoCondicion() . ";");
    $this->Desconectar();
    return $retorno;
  }

  public function SeleccionarSerializables($db, $tabla, $columnas, $criterio, $criterioOrden = NULL)
  {
    $where = "";
    $orderBy = "";
    $this->Conectar($db);
    if(isset($criterio))
    {
      $where = " WHERE " . $criterio->GetTextoCondicion();
    }
    if(isset($criterioOrden))
    {
      $orderBy = " ORDER BY " . $criterioOrden->GetTextoCondicion();
    }
    $retorno = mysqli_fetch_array(mysqli_query(parent::GetConexion(), "SELECT " . $columnas . " FROM " . $tabla . $where . $orderBy . ";"));
    $this->Desconectar();
    return $retorno;
  }

  public function ConsultaPersonalizada($db, $consulta)
  {
    $this->Conectar($db);
    $retorno =  mysqli_query(parent::GetConexion(), $consulta);
    $this->Desconectar();
    return $retorno;
  }

}

?>