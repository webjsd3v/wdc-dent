<?php

require_once('PHPMailer/PHPMailerAutoload.php');

function mail_utf8($to, $fromname, $fromemail, $subject, $message)
 {
    $SMTPSecure = 'ssl';
    $SMTPHost = 'premium66.web-hosting.com';
    $SMTPPort = '465';
    $SMTPUsername = 'mail@wdc-dent.ru';
    $SMTPPassword = 'sPu7Eg6yuVe&';

    $subject = '=?utf-8?B?' . base64_encode($subject) . '?=';
    $fromname = '=?utf-8?B?' . base64_encode($fromname) . '?=';

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = false;
    $mail->CharSet = 'UTF-8';
    $mail->SMTPSecure = $SMTPSecure;
    $mail->SMTPAuth = true;
    $mail->Host = $SMTPHost;
    $mail->Port = $SMTPPort;
    $mail->Username = $SMTPUsername;
    $mail->Password = $SMTPPassword;
    $mail->addReplyTo($fromemail);
    $mail->SetFrom($SMTPUsername);
    $mail->Subject = $subject;
    $mail->AddAddress($to);
    $mail->Body = $message;
    return $mail->Send();
 }


function mail_utf8_no_smtp($to, $fromname, $fromemail, $subject, $message)
 {
    $subject = '=?utf-8?B?' . base64_encode($subject) . '?=';
    $fromname = '=?utf-8?B?' . base64_encode($fromname) . '?=';

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=\"utf-8\"\r\n";
    $headers .= "From: \"$fromname\" <$fromemail>\r\n";
    $headers .= "Reply-To: $fromemail\r\n";

    return mail($to, $subject, $message, $headers);
 }

?>
