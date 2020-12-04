<?php
if(isset($_GET['id']))
{
  include('../Modelo/Proveedores.php');
  $objeto= new Proveedor();
  $id=intval($_GET['id']);
  $res= $objeto->ActivarProveedor($id);
  if($res=="correcto")

  {
    header('Location: ConsultarProveedores.php');
  }else{
    echo "error al  eliminar el registro".$res;
  }

}

?>
