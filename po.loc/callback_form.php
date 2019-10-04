<?php
/* print_r($_GET);

exit(); */

require_once 'phpmailer_class.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';

// $theme = $_GET['theme'];
$name = $_GET['name'];
$phone = $_GET['phone'];
// $email = $_GET['email'];

try {
    //Server settings
    /* $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.mail.ru';                         // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 't-compass@mail.ru';                     // SMTP username
    $mail->Password   = 'Cjghbxfcnbt699';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;   */                                  // TCP port to connect to

    //Recipients
    $mail->setFrom('t-compass@mail.ru', 'Site ADR');
    $mail->addAddress('timnick80@mail.ru', 'Admin');     // Add a recipient
    /* $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com'); */

    // Attachments
   /*  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Заявка на обратный звонок с сайта Альянс Деловых Ресурсов';
    $mail->Body    = "Поступила заявка с сайта АДР на обратный звонок " . " Имя:" . $name . " Телефон:" . $phone;
    $mail->AltBody = "Поступила заявка с сайта АДР на обратный звонок " . " Имя:" . $name . " Телефон:" . $phone;

    if($mail->send()){
        header('location: thank-you.html');
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>