<?php
if(isset($_GET['id']))
{
  include('../Modelo/Compras.php');
  $objeto= new Compras();
  $id=intval($_GET['id']);
  $res= $objeto->Eliminarcompra($id);
  if($res=="correcto")

  {
    header('Location: ConsultarCompras.php');
  }else{
    echo "error al  eliminar el registro".$res;
  }


}

?>
