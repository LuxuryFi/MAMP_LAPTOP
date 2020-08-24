<?php
/**
 * chức năng gửi mail được ứng dụng rất nhiều trong thực tế: đăng ký, quên mk, đặt hàng, gửi thông tin...
 * về code: php có 1 hàm dùng để gửi mail: mail()
 *
 */
//mail('mguyenminh99@gmail.com','123123','gửi thử');
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';
// Load Composer's autoloader
//require 'vendor/autoload.php';
// Instantiation and passing true enables exceptions
// public function sendMail($mail,$title)
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->CharSet ='UTF-8';
    //Send mail use SMTP
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
    //
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;   
    //SMTP username                                // Enable SMTP authentication
    $mail->Username   = 'gaconbibenh@gmail.com';                     // SMTP username
    
    //DDeer lay mat khau ung dung, truy cap link sau
    //My account google
    // Menu bao mat -> Xac minh 2 buoc 
    $mail->Password   = 'qdvqfybizvmwouly';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS above
    //Recipients
    //setting nguoi gui va nguoi nhan
    $mail->setFrom('gaconbibenh@gmail.com', 'Nguyen Quoc Anh');
    //nguoi nhan
    $mail->addAddress('gaconbibenh@gmail.com', 'Joe User');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');
    // Attachments
    $mail->addAttachment('test.jpg');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Anh đứng ở đây từ chiều'; // Tieeu de
    $mail->Body    = 'Hello mah friend';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>