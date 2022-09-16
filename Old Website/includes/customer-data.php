<?php

namespace Midtrans;

include '../conn.php';
require_once '../vendor/autoload.php';

// retrieve data
$transactionId = $_POST['transactionId'];
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$country = $_POST['country'];
$productName = $_POST['productName'];
$location = $_POST['location'];
$terms = $_POST['terms'];
$promoCode = $_POST['promoCode'];
$priceGross = $_POST['priceGross'];

// ============> Get Midtrans snap token from here
// \Midtrans\Config::$serverKey = 'SB-Mid-server-VzG6GRFiOv9Hf2CMb8pfsm4J';
\Midtrans\Config::$serverKey = "Mid-server-USWEEtA8opG9bXrzEnrIwRW7";
\Midtrans\Config::$isProduction = true;
\Midtrans\Config::$overrideNotifUrl = 'http://spaze.id/notification/notification-handler.php';

$params = array(
    "transaction_details" => array(
        "order_id" => $transactionId,
        "gross_amount" => $priceGross,
    ),
    "item_details" => array(
        array(
            "id" => $productName,
            "price" => $priceGross,
            "quantity" => 1,
            "name" => $productName,
        )
    ),
    "customer_details" => array(
        "first_name" => $fName,
        "last_name" => $lName,
        "email" => $email,
        "phone" => $phoneNumber,
    ),
);

$snapToken = \Midtrans\Snap::getSnapToken($params);

// =======================> Midtrans done > go insert database

$sql = "INSERT INTO customer_data (snapToken, transactionId, fName, lName, email, phoneNumber, `address`, city, `state`, zip, country,
    productName, `location`, terms, promoCode, priceGross) VALUES ('$snapToken', '$transactionId', '$fName', '$lName', '$email', '$phoneNumber', 
    '$address','$city', '$state', '$zip', '$country', '$productName', '$location', '$terms', '$promoCode', $priceGross)";

if (mysqli_query($conn, $sql)) {
    echo $snapToken;
} else {
    echo json_encode(array("statusCode" => 201));
    echo 'failed';
}

mysqli_close($conn);
