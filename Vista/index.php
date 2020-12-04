<?php

session_start();
if ($_SESSION['usuarioSesion'] == null || $_SESSION['usuarioSesion'] == '') {
  session_destroy();
  header('Location: login.php');
}

$Ocultar = "";
if ($_SESSION['Cargo'] == "EMPLEADO") {
  $Ocultar = "none";
}

$Ocultar2 = "";
if ($_SESSION['Cargo'] == "DOMICILIARIO") {
  $Ocultar2 = "none";
}

$Ocultar3 = "";
if ($_SESSION['Cargo'] == "ADMINISTRADOR") {
  $Ocultar3 = "none";
}


date_default_timezone_set('America/Bogota');
$fecha_actual = date("d/m/Y");
$hora_actual = date("H:i:s")

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>


      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i></a>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="CambiarClave.php" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/candado.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h4 class="dropdown-item-title">
                    CAMBIAR CONTRASEÑA
                  </h4>
                  <p class="text-sm">Cambie su clave aqui</p>
                </div>
              </div>
              <!-- Message End -->
            </a>

            <a href="../Controlador/CerrarSesion.php" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/salir.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h4 class="dropdown-item-title">
                    CERRAR SESION
                  </h4>
                  <p class="text-sm">Cierre su sesion aqui</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">EMPADANAS AQUI-TOY</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['Cargo']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Inicio
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview" style="display: <?php echo $Ocultar2; ?>;">
              <a href="ConsultarClientes.php" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Clientes
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview" style="display: <?php echo $Ocultar.$Ocultar2; ?>;">
              <a href="ConsultarProveedores.php" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Proveedores
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview" style="display: <?php echo $Ocultar.$Ocultar2; ?>;">
              <a href="ConsultarEmpleados.php" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Empleados
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview" style="display: <?php echo $Ocultar2; ?>;">
              <a href="ConsultarPedidos.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Pedidos
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview" style="display: <?php echo $Ocultar2; ?>;">
              <a href="ConsultarProductos.php" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Productos
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview" style="display: <?php echo $Ocultar2; ?>;">
              <a href="ConsultarProduccion.php" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Producción
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview" style="display: <?php echo $Ocultar2; ?>;">
              <a href="ConsultarProducido.php" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                  Producido
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview" style="display: <?php echo $Ocultar.$Ocultar2; ?>;">
              <a href="ConsultarCompras.php" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Compras
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview" style="display: <?php echo $Ocultar2; ?>;">
              <a href="ConsultarMateriaPrima.php" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Materia Prima
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview" style="display: <?php echo $Ocultar2.$Ocultar; ?>;">
              <a href="ConsultarReportes.php" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                <?php
                  include('../Modelo/Pedidos.php');
                  $objeto = new Pedidos();
                  $listado  = $objeto->ReportesHoy();
                  while ($fila = mysqli_fetch_object($listado)) {
                  $reporte = $fila->Reportes;
                  }
                  ?>
                  Reportes
                  <span class="badge badge-danger mx-2"><?php echo $reporte; ?></span>
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h4 class="m-0 text-dark">Bienvenido,<strong> <?php echo $_SESSION['Nombre'] . " " . $_SESSION['Apellido']; ?></strong></h4>
              <h4 class="m-0 text-dark">Fecha: <?php echo $fecha_actual ?></h4>
              <h4 class="m-0 text-dark">Hora: <?php echo $hora_actual ?></h4>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <hr>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->


          <div class="row">
            <div class="col-12">
              <div class="card" style="display: <?php echo $Ocultar3.$Ocultar ?>">
                <div class="card-header bg-danger">
                  <h3 class="card-title">PEDIDOS DEL DIA</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">

                  <div class="row" >
                    <?php
                    $listado  = $objeto->PedidosDelDia();
                    while ($fila = mysqli_fetch_object($listado)) {
                      $cliente = $fila->clie_nombres;
                      $pedido = $fila->ped_id;
                      $cliente2 = $fila->clie_apellidos;
                      $hora = $fila->ped_hora_entrega;
                      $direccion = $fila->ped_direccion;
                      $estado = $fila->ped_estado;
                      
                      
                      if($hora_actual > $hora){
                        $bloquear2 = "none";
                        $estado = "RETRASADO";
                        $class = "bg-danger";
                        $quitar = "block";
                      } else {
                        $bloquear = "none";
                        $class = "bg-warning";
                        $quitar = "none";
                        $bloquear2 = "block";
                      }  
                      ?>
                      <div class="col-sm-4">
                        <div class="position-relative p-3 bg-gray" style="height: 400px; border-radius: 20px;">
                          <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon text-xl <?php echo $class ?>">
                              <?php echo $estado; ?>
                            </div>
                          </div>
                          <strong>Pedido:</strong>
                          <p>#<?php echo $pedido; ?></p>
                          <strong>Cliente:</strong>
                          <p><?php echo $cliente . " " . $cliente2; ?></p>
                          <strong>Hora:</strong>
                          <p><?php echo $hora; ?></p>
                          <strong>Dirección:</strong>
                          <p><?php echo $direccion; ?></p>
                          <div class="alert alert-danger alert-dismissible" style="border-radius: 10px; display:<?php echo $quitar; ?>">
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Pedido con Retraso</h5>
                            Para generar una justificacion de su retraso por favor de click <a data-toggle="modal" data-target="#modal-lg">¡Aqui!</a>
                          </div>
                          <br>

                          <center>
                            <div class="justify-content-center form-inline">
                              <a href="EntregarPedido.php?id=<?php echo $pedido;?>" type="button" onclick="return Entregar();" style="display: <?php echo $bloquear2 ;?>" class="btn btn-success mx-2" ><i class="fa fa-check"></i> Entregar</a>
                              <a  href="ProductosEncargados.php?id=<?php echo $pedido;?>" type="button" style="display: <?php echo $bloquear2 ;?>" class="btn btn-primary" ><i class="fa fa-search"></i> Productos Encargados</a>
                            </div>
                          </center>
                        </div><br><br>
                      </div>
                      <?php
                    }
                    ?>
                    <div class="modal fade" id="modal-lg">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header bg-dark text-white">
                            <h4 class="modal-title">Reporte del Retraso</h4>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="RegistrarReporte.php">

                              <!-- Grupo: Hora -->
                              <div class="row justify-content-center">
                                <div class="col-6">
                                  <label for="codigo">Numero del Pedido</label>
                                  <input class="form-control" placeholder="Digite el numero del pedido" type="text"  name="codigo" id="codigo">
                                </div>
                              </div><br>
                              
                              <!-- Grupo: Hora -->
                              <div class="row justify-content-center">
                                <div class="col-6">
                                  <label for="problema">Problema o Inconveniente</label>
                                  <textarea class="form-control" rows="5" id="problema" name="problema" placeholder="Digite el problema o inconveniente presentado.."></textarea>
                                </div>
                              </div><br>
                              
                              <!-- Grupo: Hora -->
                              <div class="row justify-content-center">
                                <div class="col-6">
                                  <label for="estado">Estado del Pedido</label>
                                  <select class="form-control"  name="estado" id="estado">
                                    <option>ENTREGADO</option>
                                    <option>NO ENTREGADO</option>
                                  </select>
                                </div>
                              </div><br>

                              <div class="row justify-content-center">
                                <button type="reset" class="btn btn-outline-secondary mx-2">Restablecer</button>
                                <button type="submit" onclick="return validar();" class="btn btn-primary">Enviar Reporte</button>
                              </form>
                            </div><br><br>

                          </div>
                          <!-- /.modal-content -->
                        </div>
                        
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


              <!-- Main row -->
              <div class="row" style="display: <?php echo $Ocultar2.$Ocultar ?>">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header bg-dark">
                      <h3 class="card-title">PEDIDOS DEL DIA</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">

                      <div class="row">
                        <?php
                        $listado  = $objeto->PedidosDelDia2();
                        while ($fila = mysqli_fetch_object($listado)) {
                          $cliente = $fila->clie_nombres;
                          $pedido = $fila->ped_id;
                          $cliente2 = $fila->clie_apellidos;
                          $hora = $fila->ped_hora_entrega;
                          $direccion = $fila->ped_direccion;
                          $estado = $fila->ped_estado;

                          if($estado == "ENTREGADO") {
                            $titulo = "Pedido Entregado";
                            $mensaje = "Este pedido fue entregado exitosamente.";
                            $icono = "icon fas fa-check";
                            $color = "alert alert-success";
                            $color2 = "bg-success";
                          } elseif($estado == "PENDIENTE") {
                            $titulo = "Pedido por Entregar";
                            $mensaje = "Este pedido no ha sido entregado aun.";
                            $icono = "icon fas fa-exclamation-triangle";
                            $color = "alert alert-warning";
                            $color2 = "bg-warning";
                          } elseif($estado == "NO ENTREGADO"){
                            $titulo = "Pedido NO Entregado";
                            $mensaje = "Este pedido no fue entregado.";
                            $icono = "icon fas fa-ban";
                            $color = "alert alert-danger";
                            $color2 = "bg-danger";
                          } 
                          
                          ?>
                          <div class="col-sm-4">
                            <div class="position-relative p-3 bg-gray" style="height: 350px; border-radius: 20px;">
                              <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon text-xl <?php echo $color2; ?>">
                                  <?php echo $estado; ?>
                                </div>
                              </div>
                              <strong>Cliente:</strong>
                              <p><?php echo $cliente . " " . $cliente2; ?></p>
                              <strong>Hora:</strong>
                              <p><?php echo $hora; ?></p>
                              <strong>Direccion:</strong>
                              <p><?php echo $direccion; ?></p><br>

                              <div class="<?php echo $color; ?> alert-dismissible" style="border-radius: 10px;">
                                <h5><i class="<?php echo $icono ?>"></i><?php echo $titulo; ?></h5>
                                <?php echo $mensaje; ?>
                              </div>
                            </div><br><br>
                          </div>
                          <?php
                        }
                        ?>
                      </div>

                    </div>
                    <!-- /.card-body -->

                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div><br><br>
              <!-- /.row -->

            <div class="row justify-content-center" style="display: <?php echo $Ocultar2.$Ocultar3 ?>">
              <div class="col-8">
            <div class="card ">
              <div class="card-header bg-dark text-white">
                <h3 class="card-title">Recetas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body ">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner justify-content-center">
                    <div class="carousel-item active">
                      <img class="d-block w-80" src="img/receta_1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-80" src="img/receta_2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-80" src="img/receta_3.jpg" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
              </div>
            </div>
            <!--/. container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer bg-dark">
          <center>
            <h5>Todos los derechos reservados</h5>
          </center>
        </footer>
      </div>
      <!-- ./wrapper -->

      <!-- REQUIRED SCRIPTS -->
      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.js"></script>

      <!-- OPTIONAL SCRIPTS -->
      <script src="dist/js/demo.js"></script>

      <!-- PAGE PLUGINS -->
      <!-- jQuery Mapael -->
      <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
      <script src="plugins/raphael/raphael.min.js"></script>
      <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
      <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
      <!-- ChartJS -->
      <script src="plugins/chart.js/Chart.min.js"></script>
      <!-- PAGE SCRIPTS -->
      <script src="dist/js/pages/dashboard2.js"></script>

      <script type="text/javascript">
        function Entregar() {
          var respuesta = confirm("¿Desea entregar este pedido ya?");

          if (respuesta == true) {
            return true;
          } else {
            return false;
          }
        }
      </script>
    </body>
    </html>