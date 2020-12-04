<?php
if(isset($_GET['id']))
{
  include('../Modelo/Materia_Prima.php');
  $objeto= new Materia_Prima();
  $id=intval($_GET['id']);
  $res= $objeto->EliminarMateriaPrima($id);
  if($res=="correcto")

  {
    header('Location: ConsultarMateriaPrima.php');
  }else{
    echo "error al  eliminar el registro".$res;
  }


}

?>
