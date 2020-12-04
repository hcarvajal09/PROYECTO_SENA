<?php
session_start();
include('../Modelo/Pedidos.php');
$objeto = new Pedidos();
date_default_timezone_set('America/Bogota');
$fecha_actual = date("Y-m-d");
$codigoempleado=$objeto->ConsultarCodigoEmpleado($_SESSION['usuarioSesion']);
if (isset($_POST) && !empty($_POST)) {
                        
    $objeto->setrep_problema(($_POST['problema']));
    $objeto->setrep_estado(($_POST['estado']));
    $objeto->setrep_fecha($fecha_actual);
    $objeto->setcodigo(($_POST['codigo']));
    $objeto->setempleado($codigoempleado);

    $resultado = $objeto->RegistrarReporte();

    if ($resultado == "correcto") {
        header("Location: index.php");
    } else {
      $mensaje = "El cliente no fue registrado. " .$resultado;
      ?>

      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i>Ha ocurrido un error</h5>
        <?php echo $mensaje; ?>
      </div>

      
      <?php
    }
  }
  
  ?>
