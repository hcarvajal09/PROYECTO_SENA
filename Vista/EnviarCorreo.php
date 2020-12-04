<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';



include('../Modelo/Usuario.php');
$objeto = new Usuario(); 
$_POST; 
$correo = $_POST['correo'];
$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
$password="";
for ($i=0;$i<8;$i++){
	$password .= substr($charset, rand(0, 61), 1);
}

if (isset($_POST) && !empty($_POST)) {
    $objeto->setcorreo($correo);
    $objeto->setclave(md5($password));

    $resultado = $objeto->GenerarClave();
    if ($resultado == "correcto") {
        echo "Datos insertados correctamente";
    } else {
        echo "Datos NO Insertados".$resultado;
    }
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
    $mail->addAddress($correo);     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Clave Nueva';
    $mail->Body    = $password;

    $mail->send();
    //echo 'El mensaje se envio correctamente';
    header('Location: login.php');
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}

?>