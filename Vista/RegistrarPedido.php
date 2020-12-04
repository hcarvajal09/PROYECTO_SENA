<?php
session_start();
?>
<html lang="es">
<head>
<!-- Required meta tags -->
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #212529;">

  <?php
include('../Modelo/Pedidos.php');
$objeto= new Pedidos();
$codigo = $objeto->CodigoPedido();
$codigoempleado=$objeto->ConsultarCodigoEmpleado($_SESSION['usuarioSesion']);
date_default_timezone_set('America/Mexico_City');
$fecha_actual=date("Y-m-d");
if(isset($_POST) && !empty($_POST)){
  if(($_POST['fecha']) < $fecha_actual){

    $mensaje = "Algo salio mal";
    $mensaje1= "Coloco una fecha anterior a la actual. Por favor verifique";
    $class = "alert alert-danger";

    ?>

    <center><div class="<?php echo "sufee-alert alert with-close" .$class."  alert-dismissible fade show";?>">
      <span class="badge badge-pill badge-danger"><i class="fa fa-times-circle"></i>  <?php echo $mensaje; ?></span>

      <?php echo $mensaje1; ?>
    </div></center>

    <?php

    header('refresh:3;url=ConsultarPedidos.php');
  }
  else{

    $objeto->setcodigo($codigo);
    $objeto->setfechaentrega(($_POST['fecha']));
    $objeto->sethoraentrega(($_POST['hora']));
    $objeto->setdireccion(($_POST['direccion']));
    $objeto->settotal(0);
    $objeto->setestado("PENDIENTE");
    $objeto->setempleado($codigoempleado);
    $objeto->setcliente(($_POST['cliente']));

    $resultado = $objeto->RegistrarPedido();

    if($resultado == "correcto")
    {
      $_SESSION['CodigoPedido']=$codigo;
      header('Location: ConsultarDetallePedido.php');
    }
    else
    {
      $mensaje =  "Datos NO Insertados".$resultado;
      $class = "alert alert-danger";
    }

    ?>

    <div class="<?php echo "sufee-alert alert with-close " . $class." alert-dismissible fade show";?>" >
      <?php echo $mensaje; ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>



    <?php
  }
}
?>

</body>
</html>
