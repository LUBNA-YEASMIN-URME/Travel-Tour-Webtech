<?php

session_start();
if (isset($_SESSION["email"])) {
    header("Location: ../views/home_view.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $isValid = true;
    $email = $_POST["email"];
    $password = $_POST["password"];

    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;

    // Email Validation
    if (empty($email)) {
        $_SESSION["email"] = "Please enter your email.";
        $isValid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["email"] = "Please enter a valid email.";
        $isValid = false;
    }

    // Password Validation
    if (empty($password)) {
        $_SESSION["password"] = "Please enter a password.";
        $isValid = false;
    }

    if ($isValid) {
        $conn = mysqli_connect("localhost", "root", "", "travel-tour", 3306);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, "SELECT email FROM users WHERE email = ? and password = ?");
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $em);
        mysqli_stmt_fetch($stmt);

        if (isset($em)) {
            session_unset();
            $_SESSION["email"] = $em;
            setcookie("email", $em, time() + (86400 * 5), "/");
            header("Location: ../views/profile.php");
        } else {

            $_SESSION["email"] = "Incorrect Email or Password.";
            header("Location: ../views/login_view.php");
        }
    } else {
        header("Location: ../views/login_view.php");
    }
} else {
    header("Location: ../views/login_view.php");
}
