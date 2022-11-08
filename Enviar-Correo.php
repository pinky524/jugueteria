<?php

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "NOMBRE: " . $nombre . "<br>CORREO: " . $correo . "<br>TELEFONO: " . $telefono .
     "<br>MENSAJE: "  . $mensaje;
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.outlook.office365.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'epinky40@hotmail.com';                     //SMTP username
    $mail->Password   = 'Megatrong1';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('epinky40@hotmail.com', $nombre);
    $mail->addAddress('epinky40@hotmail.com');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'prueva de correo desde formulario';
    $mail->Body    = $body;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->CharSet = 'UTF-8';
    $mail->send();
    echo '<script>
    alert("el mensaje se envio correctamente");
    window.history.go(-1);
    </script>';
} catch (Exception $e) {
    echo "error al enviar el mensaje: {$mail->ErrorInfo}";
}