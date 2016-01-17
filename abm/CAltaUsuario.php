<?php 
include ("CControladorUsuario.php");

class CAltaUsuario
{
  public function __constructor()
  {

  }

  public function Alta($perfilId, $usuario, $pass, $nombrePila)
  {
    $ctrlUsr = new CControladorUsuario("sistemaub");
    if(!$ctrlUsr->GetUsuario($usuario))
    {
      if(!is_null($ctrlUsr->NuevoUsuario($perfilId, $usuario, $pass, $nombrePila)))
      {
        ?>  
          <script>
          alert("El usuario ha sido agregado exitosamente.");
          location.href="../sistema.php";
          </script>
        <?php
      } 
      else 
      {
        ?>
          <script>
          alert("Ocurrio un error al agregar al usuario. Intentelo nuevamente");
          location.href="../sistema.php";
          </script>
        <?php
      }
    }
    else
    {
      ?>
      <script>
      alert("El usuario indicado ya existe.");
      location.href = "../sistema.php";
      </script>
      <?php
    }
  }
}
$alta = new CAltaUsuario();
$alta->Alta($_POST['perfil'], $_POST['username'], $_POST['password'], $_POST['nombrePila']);
?>