<?php
if(isset($_GET['id']))
{
  include('../Modelo/Clientes.php');
  $objeto= new Clientes();
  $id=intval($_GET['id']);
  $res= $objeto->EliminarCliente($id);
  if($res=="correcto")

  {
    header('Location: ConsultarClientes.php');
  }else{
    echo "error al  eliminar el registro".$res;
  }


}

?>
