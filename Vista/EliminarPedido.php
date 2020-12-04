<?php
if(isset($_GET['id']))
{
  include('../Modelo/Pedidos.php');
  $objeto= new Pedidos();
  $id=intval($_GET['id']);
  $res= $objeto->EliminarPedido($id);
  if($res=="correcto")

  {
    header('Location: ConsultarPedidos.php');
  }else{
    echo "error al  eliminar el registro".$res;
  }


}

?>
