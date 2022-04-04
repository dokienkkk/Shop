<?php 
    //xử lý gửi mail 
    //code lấy từ github.com/PHPMailer

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/OAuth.php';
    require '../PHPMailer/src/OAuthTokenProvider.php';
    require '../PHPMailer/src/POP3.php';
    require '../PHPMailer/src/SMTP.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//dựng hàm để tí gửi mail theo ý mình
function send_mail($to_email_address,$name_customer,$title,$content){
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'doduynam692002@gmail.com';                     //SMTP username
        $mail->Password   = 'kien036099004905';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet      = "UTF-8" ;
    
        //Recipients
        $mail->setFrom('doduynam692002@gmail.com', 'shop X');
        $mail->addAddress($to_email_address, $name_customer);     //Add a recipient


        //gửi thêm cho ai
        // $mail->addAddress('ellen@example.com');               //Name is optional

        //trả lời email của ai
        // $mail->addReplyTo('info@example.com', 'Information');

        //cc và bcc mail
        //tạm thời bỏ qua
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        //file đính kièm
        //tạm thời bỏ đi
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body    = $content;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}