<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../vendor/autoload.php";

$mail = new PHPMailer(true);

// config
$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->Host = "mail.voffice.co.id";
$mail->SMTPAuth = true;
$mail->Username = "notification@voffice.co.id";
$mail->Password = "qehwah-5sujZo-xowwic";
$mail->Port = 2525;
