<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'c2191146.ferozo.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'test@c2191146.ferozo.com';                     //SMTP username
    $mail->Password   = 'Camada@22570';                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('test@c2191146.ferozo.com', 'LV Aluminios'); // Hacer coincidir con el username. (preferentemente)
    $mail->addAddress('madem313@gmail.com', 'Contacto Web');
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Consulta de: '.$_POST['name'];
    $mail->Body    = 
        'Nombre: '.$_POST['name'].
        '<br>Email: '.$_POST['email'].
        '<br>Telefono: '.$_POST['phone'].
        '<br>Razon contacto: '.$_POST['subject'].
        '<br>Mensaje: '.$_POST['message'];
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("location: gracias.html");
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("location: error.html");
}

?>