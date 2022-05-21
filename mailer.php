<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;

  require "packages/PHPMailer/src/PHPMailer.php";
  require "packages/PHPMailer/src/SMTP.php";

  function send_mail(string $email_address, string $name, string $body, string $subject) {
    $mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "dronteh.confirm@gmail.com";                     //SMTP username
    $mail->Password   = "Dronteh1";                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("bizkod@gmail.com", "BizKod");
    $mail->addAddress($email_address, $name);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    return $mail->send() ? true : false;
  }
?>
