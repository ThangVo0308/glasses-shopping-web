<?php
session_start();
header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/PHPMailer/PHPMailer-master/src/Exception.php';
require '../../vendor/PHPMailer/PHPMailer-master/src/PHPMailer.php';
require '../../vendor/PHPMailer/PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer(true);

//email shop
//glassesshopweb2@gmail.com
//pass saophaisoweb2

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('', 'Glasses Shop');
        $mail->addAddress('', 'Shop');     //Add a recipient
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Phan hoi tu khach hang';
        $mail->Body    = 'Đến từ khách hàng: '. $_POST['nameUser']. '<br/>' . 'Email: '. $_POST['emailUser']. '<br/>' . 'Nội dung: '. $_POST['noteValue']  ;
        // $mail->AltBody = '' ;

        $mail->send();
        echo json_encode(["success" => true]);
    } catch (Exception $e) {
        echo json_encode(["success" => false]);
    }
}
