<?php


session_start();
if(isset($_SESSION['usuarioSesion'])){

  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inicio de Sesión</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/bootstrap/styles.css">
  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

</head>
<body class="color-login">

  <div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
      <div class="modal-content">
        <div class="col-12 user-img">
          <img src="dist/img/logo-login.png">
        </div>

        <form method="POST" class="col-12">

          <?php

          include('../Modelo/Usuario.php');
          $objeto= new Usuario();
          if(isset($_POST)&& !empty($_POST))
          {
            $objeto->setcorreo(($_POST['txtcorreo']));
            $usuario=($_POST['txtcorreo']);
            $objeto->setclave(MD5($_POST['txtCLAVE']));

            $claveRecibida=$objeto->validarclave();

            if($claveRecibida==$objeto->getclave())
            {
              $CargoRecibido=$objeto->ConsultarCargo($objeto->getcorreo(($_POST['txtcorreo'])));
              $NombreRecibido=$objeto->ConsultarNombreEmpleado($objeto->getcorreo(($_POST['txtcorreo'])));
              $ApellidoRecibido=$objeto->ConsultarApellidoEmpleado($objeto->getcorreo(($_POST['txtcorreo'])));
              session_start();
              $_SESSION['usuarioSesion']=$usuario;
              $_SESSION['Nombre']=$NombreRecibido;
              $_SESSION['Apellido']=$ApellidoRecibido;
              $_SESSION['Cargo']=$CargoRecibido;
              header("Location: index.php");
              
              

            }
            else
            {
              $mensaje="El nombre de usuario o la contraseña son incorrectos, verifique";
              $class="alert alert-danger";
            }

            ?>
						<div class="alert alert-danger alert-dismissible" style="border-radius: 10px;">
						<h5><i class="icon fas fa-exclamation-triangle"></i> Ha ocurrido un error</h5>
						<?php echo $mensaje; ?>
						</div>

            <?php 

          }
          ?>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Digite su correo electronico" name="txtcorreo"/>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Digite su contraseña" name="txtCLAVE"/>
          </div>
          <button type="submit" class="boton-login btn btn-warning">Iniciar sesión</button><br>
          <a href="RecuperarClave.php">¿Olvido su Contraseña?</a>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="plugins/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script src="plugins/fontawesome.min.js"></script>
</body>
</html>
