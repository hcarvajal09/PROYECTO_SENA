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

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Producción</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Estilos para la tabla -->
  <link rel="stylesheet" href="datatable/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="datatable/main.css">  
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatable/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatable/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
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
                  include('../Modelo/Produccion.php');
                  $objeto = new Produccion();
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
                  <a type="button" class="btn btn-primary" href="NuevaProduccion.php">
                    <i class="fa fa-plus"></i>
                    Nueva Producción
                  </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">

                    <table id="example" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>FECHA PRODUCCIÓN</th>
                          <th>EMPLEADO ENCARGADO</th>
                          <th>ACCIONES</th>
                        </tr>
                      </thead>
                        <?php
                        $listado = $objeto->ConsultarProduccion();
                        ?>

                        <tbody>
                          <?php

                          while ($fila = mysqli_fetch_object($listado)) {
                            $codigo=$fila->prod_id;
                            $fecha=$fila->prod_fecha;
                            $nombreempleado=$fila->emp_nombres;
                            $apellidoempleado=$fila->emp_apellidos; ?>
                            <tr>
                              <td><?php echo $codigo; ?></td>
                              <td><?php echo $fecha; ?></td>
                              <td><?php echo $nombreempleado." ". $apellidoempleado; ?></td>
                              <td><a href="DetalleProduccion.php?id=<?php echo $codigo;?>" title="Ver Detalles" type="button" class="btn btn-primary"><i class="fa fa-search"></i></a>
                              <a onclick="return Eliminar()" style="display: <?php echo $Ocultar; ?>;" title="Eliminar" href="EliminarProduccion.php?id=<?php echo $codigo;?>" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></a></td>
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

      <!-- OPTIONAL SCRIPTS -->
      <script src="dist/js/validacion-clientes.js"></script>
      <script src="plugins/chart.js/Chart.min.js"></script>
      <script src="dist/js/demo.js"></script>
      <script src="dist/js/pages/dashboard3.js"></script>
    <script type="text/javascript" src="datatable/datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="datatable/main.js"></script>  


        <script type="text/javascript">
        function Eliminar() {
          var respuesta = confirm("¿Estas seguro que desea eliminar esta produccion?");

          if (respuesta == true) {
            return true;
          } else {
            return false;
          }
        }
        </script>
      </body>
      </html>
