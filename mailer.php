<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require '/home/u1256938/public_html/PHPMailer-master/src/Exception.php';
require '/home/u1256938/public_html/PHPMailer-master/src/PHPMailer.php';
require '/home/u1256938/public_html/PHPMailer-master/src/SMTP.php';


$name = $_POST['name'];
$email = $_POST['email'];
$message_from_page = $_POST['message'];
$phone_number = $_POST['phone_number'];
$message_and_number = "<b>Phone number: $phone_number</b><br>" . "\r\n" . $message_from_page;

// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);
 
try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'mail.kurumsaleposta.com.';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@azsagroup.com';                     // SMTP username
    $mail->Password   = 'QB7U02zEsNVCF';                               // SMTP password
    $mail->SMTPSecure = 'none';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('info@azsagroup.com');     // Add a recipient
    //$mail->addAddress('recipient2@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
 
    // Attachments
    //$mail->addAttachment('/home/cpanelusername/attachment.txt');         // Add attachments
    //$mail->addAttachment('/home/cpanelusername/image.jpg', 'new.jpg');    // Optional name
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Message from website!' ;
    $mail->Body    = $message_and_number;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    $mail->send();
    echo '<span style="display: flex;justify-content: center;">Message has been sent. You can leave this page.</span>';
 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}