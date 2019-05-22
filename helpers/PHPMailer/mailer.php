<?php
require_once 'src/PHPMailer.php';
function sendMail($emailReceiver, $nameReceiver, $content, $subject){
    try {
        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'huongngoc.developer@gmail.com';
        $mail->Password   = 'xxxxx';
        $mail->SMTPSecure = 'tls'; 
        $mail->Port       = 587; 

        //Recipients
        $mail->setFrom('huongngoc.developer@gmail.com', 'Shop 1802');
        $mail->addAddress($emailReceiver, $nameReceiver);
        $mail->addReplyTo('huongngoc.developer@gmail.com', 'Shop 1802');

        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

/**
 * ko co xac minh 2 buoc
 * https://myaccount.google.com/lesssecureapps?utm_source=google-account&utm_medium=web 
 * off -> on
 * on: gui duoc
 * off: ko gui duoc
 * 
 * 
 */