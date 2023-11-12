<?php
require_once('../models/userModel.php');

session_start();
$full_name = $_POST["full_name"];
$address = $_POST["address"];
$city = $_POST["city"];
$zip_code = $_POST["zip_code"];


if (empty($full_name) || empty($address) || empty($city) || empty($zip_code)) {
    echo "Please fill in all the fields.";
} 
else {
    $status = billing($full_name, $address, $city, $zip_code);
    
    if ($status) {
        echo "Proceeding For Payment Info. Submitted Successfully";
        header('location: ../views/payment.php');
    } else {
        echo "failed. Please try again.";
    }
}
?>
