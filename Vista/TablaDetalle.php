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
  <title>Tabla Detalle</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>

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
                  include('../Modelo/Detalle_Produccion.php');
                  $objeto= new Detalle_Produccion();
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
                  <h5>MATERIA PRIMA DISPONIBLE</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <?php
                  $codigo=$objeto->CodigoDetalle();
                  if (isset($_POST) && !empty($_POST)) {
                    if (($_POST['CantidadStock']) < ($_POST['CantidadAgregar'])) {

                      $mensaje = "Algo salio mal";
                      $mensaje1= "Coloco una cantidad de la materia prima mayor a la que hay en el almacen.
                      Por Favor verifique";

                   
                      ?>
                   
													<div class="alert alert-danger alert-dismissible" style="border-radius: 10px;">
														<h5><i class="icon fas fa-exclamation-triangle"></i> <?php echo $mensaje; ?></h5>
														<?php echo $mensaje1; ?>
													</div>
                   
                   
                     <?php
                   
                   }
                   
                   elseif (($_POST['CantidadAgregar']) <1) {
                   
                     $mensaje = "Algo salio mal";
                     $mensaje1= "No puede colocar una cantidad menor a 1. Por Favor verifique";
                   
                     ?>
                   
													<div class="alert alert-danger alert-dismissible" style="border-radius: 10px;">
														<h5><i class="icon fas fa-exclamation-triangle"></i> <?php echo $mensaje; ?></h5>
														<?php echo $mensaje1; ?>
													</div>
                   
                   
                    <?php
                   
                   }
                   else{
                   
                      $objeto->setcodigo($codigo);
                      $objeto->setcantidad_mp(($_POST['CantidadAgregar']));
                      $objeto->setmateria_prima(($_POST['CodigoMateria']));
                      $objeto->setproduccion($_SESSION['CodigoProduccion']);
                   
                      $resultado = $objeto->RegistrarDetalle_Produccion();
                   
                   
                    }
                  }
                   
                    ?>
                    <table  class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>NOMBRE</th>
                          <th>CANTIDAD STOCK</th>
                          <th>CANTIDAD A AGREGAR</th>
                          <th>ACCIONES</th>
                        </tr>
                      </thead>
                      <?php
                      $listado  = $objeto->ConsultarMateriaPrima();
                      ?>

                      <tbody>
                        <?php
                        $unidad;

                        while ($fila = mysqli_fetch_object($listado)) {
                          $codigo=$fila->mp_id;
                          $nombre=$fila->mp_nombre;
                          $cantidad=$fila->mp_cantidad;

                          if($nombre == "HUEVO")
                          {
                            $unidad = "Unidades";
                          }
                          elseif($nombre == "ACEITE")
                          {
                            $unidad = "Litros";
                          }

                          elseif($nombre == "MANTEQUILLA")
                          {
                            $unidad = "Kg";
                          }

                          elseif($nombre == "JAMON")
                          {
                            $unidad = "Libras";
                          }

                          elseif($nombre == "HARINA")
                          {
                            $unidad = "Kg";
                          }

                          elseif($nombre == "QUESO")
                          {
                            $unidad = "Libras";
                          }

                          elseif($nombre == "MASA FACIL")
                          {
                            $unidad = "Kg";
                          }?>

                          <tr>
                            <form method="POST">
                              <td style="display: none;"><input value="<?php echo $codigo; ?>" name="CodigoMateria" class="form-control"></td>
                              <td><?php echo $nombre; ?></td>
                              <td><input value="<?php echo  $cantidad." ".$unidad; ?>" name="CantidadStock"  class="form-control" readonly="true"></td>
                              <td><input type="number" class="form-control" name="CantidadAgregar" value="1"> </td>
                              <td><button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i></button></td>
                            </form>

                            <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->


            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h5>MATERIA PRIMA AGREGADA</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table  class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>CODIGO</th>
                            <th>CANTIDAD</th>
                            <th>MATERIA PRIMA</th>
                            <th>PRODUCCION</th>
                            <th>ACCIONES</th>
                          </tr>
                        </thead>
                        <?php
                        $objeto->setproduccion($_SESSION['CodigoProduccion']);
                        $listado  = $objeto->ConsultarDetalle_Produccion();
                        ?>

                        <tbody>
                          <?php
                          $unidad2;

                          while ($fila = mysqli_fetch_object($listado)) {
                            $codigo=$fila->deta_id;
                            $cantidad=$fila->deta_cantidad_materia_prima;
                            $materia_prima=$fila->mp_nombre;
                            $produccion=$fila->prod_id;

                            if ($materia_prima == "HUEVO") {
                              $unidad2 = "Unidades";
                            } elseif ($materia_prima == "ACEITE") {
                              $unidad2 = "Litros";
                            } elseif ($materia_prima == "MANTEQUILLA") {
                              $unidad2 = "Kg";
                            } elseif ($materia_prima == "JAMON") {
                              $unidad2 = "Libras";
                            } elseif ($materia_prima == "HARINA") {
                              $unidad2 = "Kg";
                            } elseif ($materia_prima == "QUESO") {
                              $unidad2 = "Libras";
                            } elseif ($materia_prima == "MASA FACIL") {
                              $unidad2 = "Kg";
                            } ?>
                            <tr>
                              <td><?php echo $codigo; ?></td>
                              <td><?php echo $cantidad." ".$unidad2; ?></td>
                              <td><?php echo $materia_prima; ?></td>
                              <td><?php echo $produccion; ?></td>
                              <td><a onclick="return Eliminar()" href="EliminarDetalle.php?id=<?php echo $codigo; ?>" class="btn btn-danger" type="button"><i class="fa fa-minus"></i></a></td>
                              <?php
                            }
                            ?>
                          </tbody>
                        </table>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-lg">
                          Finalizar Produccion
                        </button>

                        <div class="modal fade" id="modal-lg">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header bg-dark text-white">
                                <h4 class="modal-title">PRODUCTO ELABORADO</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="Respuesta.php">

                                  <!-- Grupo: Hora -->
                                  <div class="row justify-content-center">
                                    <div class="col-5">
                                      <label for="cantidad" >Cantidad Producida</label>
                                      <input class="formulario__input form-control" type="text" placeholder="Digite la cantidad producida"  name="cantidad" id="cantidad" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                    </div>

                                    <!-- Grupo: Producto -->
                                    <div class="col-5">
                                      <label for="producto" class="formulario__label">Producto Elaborado</label>
                                      <select name="producto" id="producto" class="form-control">
                                        <?php
                                        $listado=$objeto->ConsultarProductos();
                                        while ($fila=mysqli_fetch_object($listado)) {
                                          $producto=$fila->pro_descripcion;?>
                                          <option><?php echo $producto; ?></option>
                                          <?php
                                        }
                                        ?>
                                      </select>
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

      <!-- OPTIONAL SCRIPTS -->

      <script src="dist/js/datatable.js"></script>
      <script src="plugins/chart.js/Chart.min.js"></script>
      <script src="dist/js/demo.js"></script>
      <script src="dist/js/pages/dashboard3.js"></script>


      <script type="text/javascript">
      function Eliminar() {
        var respuesta = confirm("¿Estas seguro que desea eliminar esta materia prima?");

        if (respuesta == true) {
          return true;
        } else {
          return false;
        }
      }
      </script>
    </body>
    </html>
