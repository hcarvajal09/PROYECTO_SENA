<?php
if(isset($_GET['id']))
{
  include('../Modelo/Detalle_pedido.php');
  $objeto= new Detalle_Pedido();
  $id=intval($_GET['id']);
  $res= $objeto->EliminarDetallePedido($id);
  if($res=="correcto")

  {
    header('Location: ConsultarDetallePedido.php');
  }else{
    echo "error al  eliminar el registro".$res;
  }


}

?>
