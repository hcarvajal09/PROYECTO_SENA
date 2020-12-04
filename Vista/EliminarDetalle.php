
<?php
if(isset($_GET['id']))
{
  include('../Modelo/Detalle_Produccion.php');
  $objeto= new Detalle_Produccion();
  $id=intval($_GET['id']);
  $res= $objeto->EliminarDetalle_Produccion($id);
  if($res=="correcto")

  {
    header('Location: TablaDetalle.php');
  }else{
    echo "error al  eliminar el registro".$res;
  }


}

?>
