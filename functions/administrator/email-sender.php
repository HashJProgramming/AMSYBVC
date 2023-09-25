<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
function send_mail($email, $start, $end, $title, $description){
    try {
        $json = file_get_contents('email.json');
        $username = json_decode($json, true)['email'];
        $password = json_decode($json, true)['password'];        
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;                      
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = $username;                     
        $mail->Password   = $password;                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
        $mail->Port       = 465;         
        $mail->setFrom($username, 'YBVC ALUMNI ASSOCIATION');
        $mail->addAddress($email);       
        $mail->isHTML(true);                                  
        $mail->Subject = 'YBVC ALUMNI ASSOCIATION';
        $mail->Body    = "
        <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>YBVC ALUMNI ASSOCIATION</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #ffffff;
                    }
                    .card {
                        border: 1px solid #e6e6e6;
                        border-radius: 5px;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    }
                    .card-title {
                        font-size: 24px;
                        font-weight: bold;
                        text-align: center;
                    }
                    .card-img-top {
                        width: 100%;
                    }
                    .card-body {
                        padding: 20px;
                    }
                    .text-center {
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <section>
                    <div class='container'>
                        <div class='card'>
                            <div class='card-body'>
                                <h5 class='card-title'>YBVC ALUMNI ASSOCIATION</h5>
                                <h4>$title</h4>
                                <div>
                                    <p>$description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </body>
            </html>
        ";
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}