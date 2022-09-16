<?php

require_once dirname(__FILE__) . '../../vendor/midtrans/midtrans-php/Midtrans.php';
\Midtrans\Config::$isProduction = true;
\Midtrans\Config::$serverKey = 'Mid-server-USWEEtA8opG9bXrzEnrIwRW7';
$notif = new \Midtrans\Notification();

$order_id = $notif->order_id;
$transaction_status = $notif->transaction_status;
$fraud = $notif->fraud_status;
$payment_type = $notif->payment_type;
$transaction_time = $notif->transaction_time;
$gross_amount = $notif->gross_amount;

include '../conn.php';

$query = mysqli_query($conn, "SELECT * FROM `customer_data` WHERE transactionId = '$order_id'");
$row = $query->fetch_assoc();
$dataName = $row['fName'] . " " . $row['lName'];
$dataEmail = $row['email'];
$dataPhone = $row['phoneNumber'];
$dataProduct = $row['productName'];
$dataPrice = $row['priceGross'];
$location = $row['location'];
$terms = $row['terms'];

if (substr($dataPhone, 0, 1) == "0") {
    $waLink = "62" . substr($dataPhone, 1);
} elseif (substr($dataPhone, 0, 1) !== "0") {
    $waLink = $dataPhone;
}

if ($transaction_status == "capture") {
    // for cc, check if fraud accepted

    include 'config-phpmailer.php';

    $message = "<p>Berikut adalah data klien yang telah melakukan pembayaran melalui Buy-Now.</p>";
    $message .= "<table style='border-collapse:collapse';><tbody>";
    $message .= "   <tr><td style='font-weight: bold;'>transaction id </td><td>: " . $order_id . "</td></tr>
                    <tr><td style='font-weight: bold;'>Name </td><td>: " . $dataName . "</td></tr>
                    <tr><td style='font-weight: bold;'>Email </td><td>: " . $dataEmail . "</td></tr>
                    <tr><td style='font-weight: bold;'>WA Number </td><td>: <a href='http://wa.me/" . $waLink . "' target = '_blank'>" . $dataPhone . "</a></td></tr>
                    <tr><td style='font-weight: bold;'>Plan </td><td>: " . $dataProduct . "</td></tr>
                    <tr><td style='font-weight: bold;'>Price Gross </td><td>: " . $dataPrice . "</td></tr>
                    <tr><td style='font-weight: bold;'>Location </td><td>: " . $location . "</td></tr>
                    <tr><td style='font-weight: bold;'>Terms </td><td>: " . $terms . "</td></tr>
                    <tr><td style='font-weight: bold;'>Payment type </td><td>: " . $payment_type . "</td></tr>
                    <tr><td style='font-weight: bold;'>Payment status </td><td>: " . $transaction_status . "</td></tr>
                    <tr><td style='font-weight: bold;'>Payment time </td><td>: " . $transaction_time . "</td></tr>
                    ";
    $message .= "</tbody>";
    $message .= "</table>";
    $message .= "<span>Klik tombol reply untuk langsung membalas email kepada customer</span>";

    // tujuan EMAIL

    $mail->From = "notification@voffice.co.id";
    $mail->FromName = "Buy Now System";
    $mail->addReplyTo($dataEmail, $dataName);

    $mail->addAddress("cs@spaze.id", "Spaze Customer Service");
    $mail->addBCC("hadiyusuf.voffice@gmail.com", "Hadi Yusuf Alghifari");

    $mail->isHTML(true);

    $mail->Subject = "New Customer from BUY-NOW";
    $mail->Body = $message;
    $mail->AltBody = "Please, check manually on midtrans or open this mail using gmail";

    try {
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

    if ($payment_type == "credit_card") {
        if ($fraud == "challange") {
            echo "Transaction order_id: " . $order_id  . " is challanged by FDS";
        } else {
            echo "Transaction order_id: " . $order_id . " successfully";
        }
    }
} elseif ($transaction_status  == "settlement") {
    include "config-phpmailer.php";

    $message = "<p>Berikut adalah data klien yang telah melakukan pembayaran melalui Buy-Now.</p>";
    $message .= "<table style='border-collapse:collapse';><tbody>";
    $message .= "   <tr><td style='font-weight: bold;'>transaction id </td><td>: " . $order_id . "</td></tr>
                    <tr><td style='font-weight: bold;'>Name </td><td>: " . $dataName . "</td></tr>
                    <tr><td style='font-weight: bold;'>Email </td><td>: " . $dataEmail . "</td></tr>
                    <tr><td style='font-weight: bold;'>WA Number </td><td>: <a href='http://wa.me/" . $waLink . "' target = '_blank'>" . $dataPhone . "</a></td></tr>
                    <tr><td style='font-weight: bold;'>Plan </td><td>: " . $dataProduct . "</td></tr>
                    <tr><td style='font-weight: bold;'>Price Gross </td><td>: " . $dataPrice . "</td></tr>
                    <tr><td style='font-weight: bold;'>Location </td><td>: " . $location . "</td></tr>
                    <tr><td style='font-weight: bold;'>Terms </td><td>: " . $terms . "</td></tr>
                    <tr><td style='font-weight: bold;'>Payment type </td><td>: " . $payment_type . "</td></tr>
                    <tr><td style='font-weight: bold;'>Payment status </td><td>: " . $transaction_status . "</td></tr>
                    <tr><td style='font-weight: bold;'>Payment time </td><td>: " . $transaction_time . "</td></tr>
                    ";
    $message .= "</tbody>";
    $message .= "</table>";
    $message .= "<span>Klik tombol reply untuk langsung membalas email kepada customer</span>";

    // tujuan EMAIL

    $mail->From = "notification@voffice.co.id";
    $mail->FromName = "Buy Now System";
    $mail->addReplyTo($dataEmail, $dataName);

    $mail->addAddress("cs@spaze.id", "Spaze Customer Service");
    $mail->addBCC("hadiyusuf.voffice@gmail.com", "Hadi Yusuf Alghifari");

    $mail->isHTML(true);

    $mail->Subject = "New Customer from BUY-NOW";
    $mail->Body = $message;
    $mail->AltBody = "Please, check manually on midtrans or open this mail using gmail";

    try {
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
