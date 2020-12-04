<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
include('../Modelo/Empleados.php');
$objeto = new Empleados();
$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
$password="";
for ($i=0;$i<6;$i++) {
  $password .= substr($charset, rand(0, 61), 1);
}
$codigoempleado = $objeto->ConsultarCodigoMaximoEmpleado();
$codigousuario = $objeto->ConsultarCodigoMaximoUsuario();
if (isset($_POST) && !empty($_POST)) {
  $objeto->setcodigo($codigoempleado);
  $objeto->setnombres(($_POST['nombre']));
  $objeto->setapellidos(($_POST['apellido']));
  $objeto->setdocumento(($_POST['documento']));
  $objeto->settelefono(($_POST['telefono']));
  $objeto->setcargo(($_POST['cargo']));
  $objeto->setestado(('ACTIVO'));
  $objeto->setusu_id($codigousuario);
  $objeto->setusu_correo(($_POST['correo']));
  $objeto->setusu_clave(md5($password));

  $insertarUsuario = $objeto->RegistrarUsuario();
  if ($insertarUsuario == "correcto") {
    $mensaje = "Datos registrados correctamente";
    $class = "alert alert-success";

    $insertarEmpleado = $objeto->RegistrarEmpleado();
    if ($insertarEmpleado == "correcto") {
      $mensaje = "Datos registrados correctamente";
      $class = "alert alert-success";
    } else {
      $mensaje = "Datos NO registrados" . $insertarEmpleado;
      $class = "alert alert-danger";
    }
  } else {
    $mensaje = "Datos NO registrados" . $insertarUsuario;
    $class = "alert alert-danger";
  } ?>

  <div class="<?php echo "sufee-alert alert with-close " . $class . " alert-dismissible fade show"; ?>">
    <?php echo $mensaje; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>

  <?php
}


$mail = new PHPMailer(true);

try {
  $mail->SMTPOptions = array(
    'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
    )
  );
//Server settings
$mail->SMTPDebug = 0;                      // Enable verbose debug output
$mail->isSMTP();                                            // Send using SMTP
$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'aquitoy1973@gmail.com';                     // SMTP username
$mail->Password   = 'mivieja79';                               // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

//Recipients
$mail->setFrom('aquitoy1973@gmail.com', 'AquiToy');
$mail->addAddress($_POST['correo']);     // Add a recipient

// Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Contraseña Nueva';
$mail->Body    = $password;

$mail->send();
//echo 'El mensaje se envio correctamente';
header('Location: ConsultarEmpleados.php');
} catch (Exception $e) {
  echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}

?>