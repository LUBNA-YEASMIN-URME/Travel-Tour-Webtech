<?php
require_once('../models/userModel.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $newPassword = $_POST["password"];
    $confirmPassword = $_POST["cpassword"];

    if (empty($email) || empty($newPassword) || empty($confirmPassword)) {
        echo "Please fill in all the fields.";
    } elseif ($newPassword !== $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        $status = forgotPassword($email, $newPassword);

        if ($status) {
            echo "Password reset successful.";
        } else {
            echo "Password reset failed. Please try again.";
        }
    }
}
?>
