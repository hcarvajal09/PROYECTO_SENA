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
</head>
<body class="color-login">

  <div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
      <div class="modal-content">
        <div class="col-12 user-img">
          <img src="dist/img/logo-login.png">
        </div>
        <form method="POST" class="col-12" action="EnviarCorreo.php">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Digite su correo electronico" name="correo"/>
          </div>
          <button type="submit" class="boton-login btn btn-warning">Restablecer Clave</button>
          <a href="login.php" type="button" class="boton-login btn btn-outline-secondary"><i class="fa fa-arrow-left"></i> Regresar</a>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="plugins/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="plugins/fontawesome.min.js"></script>
</body>
</html>
