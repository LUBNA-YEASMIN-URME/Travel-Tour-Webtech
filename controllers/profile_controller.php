<?php

session_start();
if (!isset($_SESSION["email"])) {
    header("Location:../views/login_view.php");
}

$customer_email = $_SESSION["email"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact =  $_POST["contact"];
    $nid = $_POST["nid"];
    $age = $_POST["age"];
    $image = "";

    // Name Validation
    if (empty($name)) {
        $_SESSION["name"] = "Please enter your first name.";
        $isValid = false;
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $_SESSION["name"] = "Only alphabets are allowed.";
        $isValid = false;
    }

    
    if (empty($email)) {
        $_SESSION["email"] = "Please enter your email.";
        $isValid = false;
    }
    
    if (empty($contact)) {
        $_SESSION["contact"] = "Please enter your contact.";
        $isValid = false;
    }
    
    if (empty($nid)) {
        $_SESSION["nid"] = "Please enter your nid.";
        $isValid = false;
    }
   
    if (empty($age)) {
        $_SESSION["age"] = "Please enter your age.";
        $isValid = false;
    }


    // Image Validation
    if (isset($_FILES["image"])) {
        $source = $_FILES['image']['tmp_name'];
        $ext = explode(".", $_FILES['image']['name']);
        $ext = $ext[count($ext) - 1];
        $destination = '../images/' . $name . $age . '.' . $ext;
        move_uploaded_file($source, $destination);
        $image = $destination;
    }


    if ($isValid) {
        $conn = mysqli_connect("localhost", "root", "", "travel-tour", 3306);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, "UPDATE users SET contact = ?, email = ?, nid = ?, age = ?, name = ?, image = ? WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "sssssss", $contact, $email, $nid, $age, $name, $image, $_SESSION["email"]);
        mysqli_stmt_execute($stmt);

        header("Location:../views/profile.php");
    } else {
        header("Location: ../views/profile.php");
    }
} else {
    // Handle cases where the form was not submitted
    header("Location: ../views/profile_view.php");
}
