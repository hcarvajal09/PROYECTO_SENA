<?php
if(isset($_GET['id']))
{
  include('../Modelo/Pedidos.php');
  $objeto= new Pedidos();
  $id=intval($_GET['id']);
  $res= $objeto->EntregarPedido($id);
  if($res=="correcto")

  {
    header('Location: index.php');
  }else{
    echo "error al entregar el pedido".$res;
  }

}

?>
