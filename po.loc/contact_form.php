<?php
require_once 'phpmailer_class.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.mail.ru';                         // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'kfp-krym@mail.ru';                     // SMTP username
    $mail->Password   = 'secret';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('kfp-krym@mail.ru', 'Mailer');
    $mail->addAddress('timnick80@mail.ru', 'Joe User');     // Add a recipient
    /* $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com'); */

    // Attachments
   /*  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Заявка с сайта Альянс Деловых Ресурсов';
    $mail->Body    = '';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
        header('location: thank-you.html');
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>