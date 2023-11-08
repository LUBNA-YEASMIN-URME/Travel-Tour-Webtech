<?php
require_once('../models/userModel.php');

session_start();
$name = $_POST["name"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$nid = $_POST["nid"];
$age = $_POST["age"];

if (empty($name) || empty($contact) || empty($email) || empty($password) || empty($cpassword) || empty($nid) || empty($age)) {
    echo "Please fill in all the fields.";
} elseif ($password !== $cpassword) {
    echo "Passwords do not match.";
} else {
    $status = signup($name, $contact, $email, $password, $nid, $age);
    
    if ($status) {
        $_SESSION['email'] = $email;
        header('location: ../views/home_view.php');
    } else {
        echo "Registration failed. Please try again.";
    }
}
?>
