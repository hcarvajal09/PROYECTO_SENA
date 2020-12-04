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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Empleados</title>
  
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
  <link rel="stylesheet" type="text/css" href="datatable/datatables/datatables.min.css" />
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet" type="text/css" href="datatable/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
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
                  include('../Modelo/Empleados.php');
                  $objeto = new Empleados();
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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                    <i class="fa fa-plus"></i>
                    Nuevo Empleado
                  </button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
                    <i class="fa fa-user-times"></i>
                    Inactivos
                  </button>
                </div>
                <!-- /.card-header -->
                
                <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-dark text-white">
                        <h4 class="modal-title">Nuevo Empleado</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="RegistrarEmpleado.php">
                          
                          <!-- Grupo: Nombre -->
                          <div class="row justify-content-center">
                            <div class="col-5">
                              <label for="nombre">Nombre</label>
                              <input class="formulario__input form-control" type="text" placeholder="Digite el nombre" name="nombre" id="nombre" onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                            
                            <!-- Grupo: Apellido -->
                            <div class="col-5">
                              <label for="apellido">Apellido</label>
                              <input class="formulario__input form-control" type="text" placeholder="Digite el apellido" name="apellido" id="apellido" onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                          </div><br>
                          
                          <!-- Grupo: Documento -->
                          <div class="row justify-content-center">
                            <div class="col-5">
                              <label for="documento">Documento</label>
                              <input class="formulario__input form-control" type="text" placeholder="Digite el documento" name="documento" id="documento" onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                            
                            <!-- Grupo: Teléfono -->
                            <div class="col-5">
                              <label for="telefono">Teléfono</label>
                              <input class="formulario__input form-control" type="text" placeholder="Digite el teléfono" name="telefono" id="telefono" onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                          </div><br>
                          
                          <!-- Grupo: Cargo -->
                          <div class="row justify-content-center">
                            <div class="col-5">
                              <label for="cargo">Cargo</label>
                              <select class="formulario__input form-control" name="cargo" id="cargo" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                <option>ADMINISTRADOR</option>
                                <option>EMPLEADO</option>
                              </select>
                            </div>
                            
                            <!-- Grupo: Correo -->
                            <div class="col-5">
                              <label for="correo">Correo electrónico</label>
                              <input class="formulario__input form-control" type="email" placeholder="Digite el correo electrónico" name="correo" id="correo" >
                            </div>
                          </div><br>
                        </div>
                        
                        <div class="row justify-content-center">
                          <button type="reset" class="btn btn-outline-secondary mx-2">Restablecer</button>
                          <button type="submit" onclick="return validar();" class="btn btn-primary">Guardar Datos</button>
                        </form>
                      </div><br><br>
                      
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                
                <div class="modal fade" id="modal-xl">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header bg-dark text-white">
                        <h4 class="modal-title">Proveedores Inactivos</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body"><br>
                        <div class="card">
                          <div class="card-body">
                            <div class="table-responsive">
                              <table id="" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>NOMBRES</th>
                                    <th>APELLIDOS</th>
                                    <th>CEDULA</th>
                                    <th>TELÉFONO</th>
                                    <th>CARGO</th>
                                    <th>ACCIONES</th>
                                  </tr>
                                </thead>
                                <?php
                                $listado  = $objeto->ConsultarEmpleadosInactivos();
                                
                                ?>
                                <tbody>
                                  
                                  <?php
                                  
                                  while ($fila = mysqli_fetch_object($listado)) {
                                    $codigo = $fila->emp_id;
                                    $nombres = $fila->emp_nombres;
                                    $apellidos = $fila->emp_apellidos;
                                    $documento = $fila->emp_documento;
                                    $telefono = $fila->emp_telefono;
                                    $cargo = $fila->emp_cargo; ?>
                                    <tr>
                                      <td><?php echo $codigo; ?></td>
                                      <td><?php echo $nombres; ?></td>
                                      <td><?php echo $apellidos; ?></td>
                                      <td><?php echo $documento; ?></td>
                                      <td><?php echo $telefono; ?></td>
                                      <td><?php echo $cargo; ?></td>
                                      
                                      <td>
                                        <center><a href="ActivarEmpleado.php?id=<?php echo $codigo; ?>" onclick="return Activar()" class="btn btn-success" type="button">Activar</a></center>
                                      </td>
                                      <?php
                                    }
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div><br>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  
                  <div class="card-body">
                    <div class="table-responsive">                  
                      <table id="example" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>CEDULA</th>
                            <th>TELÉFONO</th>
                            <th>CARGO</th>
                            <th>ACCIONES</th>
                          </tr>
                        </thead>
                        <?php
                        $listado  = $objeto->ConsultarEmpleadosActivos();
                        
                        ?>
                        
                        <tbody>
                          <?php
                          
                          while ($fila = mysqli_fetch_object($listado)) {
                            $codigo = $fila->emp_id;
                            $nombres = $fila->emp_nombres;
                            $apellidos = $fila->emp_apellidos;
                            $documento = $fila->emp_documento;
                            $telefono = $fila->emp_telefono;
                            $cargo = $fila->emp_cargo; ?>
                            <tr>
                              <td><?php echo $codigo; ?></td>
                              <td><?php echo $nombres; ?></td>
                              <td><?php echo $apellidos; ?></td>
                              <td><?php echo $documento; ?></td>
                              <td><?php echo $telefono; ?></td>
                              <td><?php echo $cargo; ?></td>
                              <td><a href="ModificarEmpleado.php?id=<?php echo $codigo; ?>" class="btn btn-warning" type="button"><i class="fa fa-edit"></i></a>
                                <a onclick="return Eliminar()" href="EliminarEmpleado.php?id=<?php echo $codigo; ?>" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></a></td>
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
        <!-- AdminLTE -->
        <script src="dist/js/adminlte.js"></script>
        <!-- DataTables -->
        
        <!-- OPTIONAL SCRIPTS -->
        <script src="dist/js/validacion-empleado.js"></script>
        <script src="plugins/chart.js/Chart.min.js"></script>
        <script src="dist/js/demo.js"></script>
        <script src="dist/js/pages/dashboard3.js"></script>
        <script type="text/javascript" src="datatable/datatables/datatables.min.js"></script>
        
        <script type="text/javascript" src="datatable/main.js"></script>
        
        <!-- page script -->
        <script>
        $(function() {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
          });
        });
        </script>
        
        <script type="text/javascript">
        function Eliminar() {
          var respuesta = confirm("¿Estas seguro que desea eliminar este empleado?");
          
          if (respuesta == true) {
            return true;
          } else {
            return false;
          }
        }
        </script>
        
        <script type="text/javascript">
        function Activar() {
          var respuesta = confirm("¿Estas seguro que desea activar este proveedor?");
          
          if (respuesta == true) {
            return true;
          } else {
            return false;
          }
        }
        </script>
      </body>
      
      </html>