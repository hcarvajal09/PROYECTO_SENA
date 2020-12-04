<?php

include('../Modelo/Producido.php');
$objeto= new Producido();


session_start();

$objeto->setcantidad_producida(($_POST['cantidad']));
$objeto->setproducto(($_POST['producto']));
$objeto->setproduccion($_SESSION['CodigoProduccion']);

$resultado=$objeto->RegistrarProducido();
if($resultado=="correcto"){
  $mesnaje="Insertado Correctamente";
  $class="alert alert-danger";
   header('Location: ConsultarProduccion.php');
}
else{
  echo "Datos NO insertados".$resultado;

}

?>
