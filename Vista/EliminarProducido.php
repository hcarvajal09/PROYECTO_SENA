
<?php
if(isset($_GET['id']))
{
  include('../Modelo/Producido.php');
  $objeto= new Producido();
  $id=intval($_GET['id']);
  $res= $objeto->EliminarProducido($id);
  if($res=="correcto")

  {
    header('Location: ConsultarProducido.php');
  }else{
    echo "error al  eliminar el registro".$res;
  }


}

?>