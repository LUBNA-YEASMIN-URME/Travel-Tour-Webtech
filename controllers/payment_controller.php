<?php
require_once('../models/userModel.php');

session_start();

$payAmount = $_POST["pay_amount"];
$paymentMethod = $_POST["payment_method"];
$transactionID = $_POST["transaction_id"];

if (empty($payAmount) || empty($paymentMethod) || empty($transactionID)) {
    echo "Please fill in all the fields.";
    header('location: ../views/payment.php');
} else {
    $status = processPayment($payAmount, $paymentMethod, $transactionID);
    
    if ($status) {
        echo "Payment Processed Successfully";
        header('location: ../views/payment.php');
    } else {
        echo "Payment Processing Failed. Please try again.";
        header('location: ../views/payment.php');
    }
}
?>
