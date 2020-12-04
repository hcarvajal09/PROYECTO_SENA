<?php

session_start();
if($_SESSION['usuarioSesion']== null || $_SESSION['usuarioSesion']=='')
{
  session_destroy();
  header('Location: login.php');
}

$Ocultar="";
if($_SESSION['Cargo']=="EMPLEADO")
{
  $Ocultar="none";
}

$Ocultar2 = "";
if ($_SESSION['Cargo'] == "DOMICILIARIO") {
  $Ocultar2 = "none";
}

$Ocultar3 = "";
if ($_SESSION['Cargo'] == "ADMINISTRADOR") {
  $Ocultar3 = "none";
}

if(isset($_GET['id']))
{
  $codigo=intval($_GET['id']);
}else
{
  echo "error, el codigo enviado es incorrecto";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detalle Pedido</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<!--
`body` tag options:

Apply one or more of the following classes to to the body tag
to get the desired effect

* sidebar-collapse
* sidebar-mini
-->
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
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
    <div class="content-wrapper"><br>


      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a href="ConsultarPedidos.php" type="button" class="btn btn-primary">
                    <i class="fa fa-arrow-left"></i>
                    Regresar
                  </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">

                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>CODIGO PRODUCTO</th>
                          <th>PRODUCTO</th>
                          <th>PRECIO</th>
                          <th>CANTIDAD</th>
                          <th>SUBTOTAL</th>
                        </tr>
                      </thead>
                      <?php
                      $listado  = $objeto->ConsultarDetallePedidos($codigo  );

                      ?>

                      <tbody>
                        <?php

                        while ($fila = mysqli_fetch_object($listado)) {
                          $codigoproducto = $fila->pro_id;
                          $producto = $fila->pro_descripcion;
                          $precio = $fila->pro_precio;
                          $cantidad = $fila->dep_cantidad;
                          $subtotal = $fila->dep_subtotal
                          ?>
                          <tr>
                            <td><?php echo $codigoproducto; ?></td>
                            <td><?php echo $producto; ?></td>
                            <td><?php echo $precio; ?></td>
                            <td><?php echo $cantidad; ?></td>
                            <td><?php echo $subtotal; ?></td>
                            <?php
                          }
                          ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>

                </div>
                <!-- /.col-12-->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </div>
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
          <center><h5>Todos los derechos reservados</h5></center>
        </footer>
      </div>
      <!-- ./wrapper -->

      <!-- REQUIRED SCRIPTS -->

      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE -->
      <script src="dist/js/adminlte.js"></script>
      <!-- DataTables -->
      <script src="plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
      <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

      <!-- OPTIONAL SCRIPTS -->
      <script src="dist/js/validacion.js"></script>
      <script src="dist/js/datatable.js"></script>
      <script src="plugins/chart.js/Chart.min.js"></script>
      <script src="dist/js/demo.js"></script>
      <script src="dist/js/pages/dashboard3.js"></script>

      <!-- page script -->
      <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
      });
      </script>

      <script type="text/javascript">
      function Eliminar() {
        var respuesta = confirm("¿Estas seguro que desea eliminar este pedido?");

        if (respuesta == true) {
          return true;
        } else {
          return false;
        }
      }
      </script>
    </body>
    </html>
