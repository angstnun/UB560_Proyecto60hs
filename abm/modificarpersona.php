<?php 
include_once("conexion.php");

$idPersona =$_POST['idPersona'];
$nombre  =$_POST['nombre'];
$apellido  =$_POST['apellido'];
$edad  =$_POST['edad'];
$localidad  =$_POST['localidad'];


        //Modificar la persona seleccionada segun el id
        $modificar = mysql_query("UPDATE personas SET nombre='$nombre', apellido='$apellido', edad='$edad', localidad='$localidad' WHERE id_persona=$idPersona",$GLOBALS['conectar']);
        if ($modificar)
                {
                ?>
                  <script>
                  alert("Se modifico correctamente a la persona.");
                  location.href="../sistema.php";
                  </script>
                <?php
                } else {
                  ?>
                    <script>
                    alert("Ocurrio un error al modificar a la persona. Intentelo nuevamente");
                    location.href="../sistema.php";
                    </script>
                  <?php
                }
?>



