<?php

include('../Modelo/Produccion.php');
$objeto= new Produccion();

session_start();
$codigo = $objeto->CodigoProduccion();
$codigoempleado=$objeto->ConsultarCodigoEmpleado($_SESSION['usuarioSesion']);
date_default_timezone_set('America/Mexico_City');
$fecha_actual=date("Y-m-d");

$objeto->setcodigo($codigo);
$objeto->setfecha($fecha_actual);
$objeto->setempleado($codigoempleado);

$resultado=$objeto->RegistrarProduccion();
if($resultado=="correcto"){
  $mesnaje="Insertado Correctamente";
  $class="alert alert-danger";
  $_SESSION['CodigoProduccion']=$codigo;
   header('Location: TablaDetalle.php');
}
else{
  echo "Datos NO insertados".$resultado;

}

?>
