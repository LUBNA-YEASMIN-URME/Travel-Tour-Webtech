<?php
session_start();
if (isset($_SESSION["email"])) {
    header("Location: ../views/home_view.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $nid = $_POST["nid"];
    $age = $_POST["age"];

    $_SESSION["name"] = $name;
    $_SESSION["contact"] = $contact;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    $_SESSION["cpassword"] = $cpassword;
    $_SESSION["nid"] = $nid;
    $_SESSION["age"] = $age;

    // Add validation for the new fields
    if (empty($name)) {
        $_SESSION["name_err"] = "Please enter your name.";
        $isValid = false;
    }

    if (empty($contact)) {
        $_SESSION["contact_err"] = "Please enter your contact.";
        $isValid = false;
    }

    if (empty($nid)) {
        $_SESSION["nid_err"] = "Please enter your NID.";
        $isValid = false;
    }

    if (empty($age)) {
        $_SESSION["age_err"] = "Please enter your age.";
        $isValid = false;
    }

    // Rest of the validation checks remain the same

    if ($isValid) {
        $conn = mysqli_connect("localhost", "root", "", "travel-tour", 3306);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, "INSERT INTO users(name, contact, email, password, nid, age) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssssi", $name, $contact, $email, $password, $nid, $age);
        mysqli_stmt_execute($stmt);

        session_unset();
        $_SESSION["email"] = $email;
        header("Location: ../views/home_view.php");
    } else {
        header("Location: ../views/signup_view.php");
    }
} else {
    header("Location: ../views/signup_view.php");
}
