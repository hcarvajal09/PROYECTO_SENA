<?php
if(isset($_GET['id']))
{
  include('../Modelo/Productos.php');
  $objeto= new Productos();
  $id=intval($_GET['id']);
  $res= $objeto->EliminarProducto($id);
  if($res=="correcto")

  {
    header('Location: ConsultarProductos.php');
  }else{
    echo "error al  eliminar el registro".$res;
  }


}

?>
