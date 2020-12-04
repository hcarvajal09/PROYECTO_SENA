
<?php
if(isset($_GET['id']))
{
  include('../Modelo/Produccion.php');
  $objeto= new Produccion();
  $id=intval($_GET['id']);
  $res= $objeto->EliminarProduccion($id);
  if($res=="correcto")

  {
    header('Location: ConsultarProduccion.php');
  }else{
    echo "error al  eliminar el registro".$res;
  }


}

?>
