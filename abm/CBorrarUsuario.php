<?php 
include ("CControladorUsuario.php");

class CBorrarPersonas
{
  public function __constructor()
  {

  }

  public function Borrar($id)
  {
    $ctrlUsr = new CControladorUsuario("usuario");
    if ($ctrlUsr->EliminarUsuario($id))
    {
      ?>
        <script>
        alert("Se borro a la persona correctamente.");
        location.href="../sistema.php";
        </script>
      <?php
    } 
    else 
    {
      ?>
        <script>
        alert("Ocurrio un error al borrar a la persona. Intentelo nuevamente");
        location.href="../sistema.php";
        </script>
      <?php
    }
  }
}

$borrar = new CBorrarPersonas();
$borrar->Borrar($_GET['id']);
?>