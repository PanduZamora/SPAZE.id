<?php
require_once 'config-phpmailer.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$source = $_POST['source'];
$sourceUrl = $_POST['sourceUrl'];
$message = $_POST['message'];

$bodyMail = "<p>please contact the customer below (from contact us form on spaze.id)</p>";
$bodyMail .= "<table style='border-collapse:collapse';><tbody>
                <tr><td>Name: </td><td>" . $name . "</td></tr>
                <tr><td>Email: </td><td>" . $email . "</td></tr>
                <tr><td>Phone: </td><td>" . $phone . "</td></tr>
                <tr><td>Message: </td><td>" . $message . "</td></tr> <br>
                <tr><td>Source: </td><td>" . $source . "</td></tr>
                <tr><td>Source Url: </td><td>" . $sourceUrl . "</td></tr>";
$bodyMail .= "</tbody></table>";

$mail->From = "notification@voffice.co.id";
$mail->FromName = "spaze.id";
$mail->addAddress("sales@spaze.id", "Spaze Sales");
$mail->addBCC("hadiyusuf.voffice@gmail.com", "Hadi Yusuf Alghifari");
$mail->addBCC("kevin.voffice@gmail.com", "Kevin Maulana");
$mail->addBCC("debora@izin.co.id", "Debora");

$mail->isHTML(true);

$mail->Subject = "[Virtual Office] Inquiry spaze.id (from website)";
$mail->Body = $bodyMail;

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
};
