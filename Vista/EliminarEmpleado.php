<?php
if(isset($_GET['id']))
{
  include('../Modelo/Empleados.php');
  $objeto= new Empleados();
  $id=intval($_GET['id']);
  $res= $objeto->EliminarEmpleado($id);
  if($res=="correcto")

  {
    header('Location: ConsultarEmpleados.php');
  }else{
    echo "error al  eliminar el registro".$res;
  }


}

?>
