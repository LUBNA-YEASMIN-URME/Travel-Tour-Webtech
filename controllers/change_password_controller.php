<?php

session_start();
if (!isset($_SESSION["email"])) {
    header("Location: ../views/login_view.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $customer_email = $_SESSION["email"];

    $isValid = true;
    $curr_password = $_POST["curr_password"];
    $new_password = $_POST["new_password"];
    $cnew_password = $_POST["cnew_password"];

    $_SESSION["curr_password"] = $_POST["curr_password"];
    $_SESSION["new_password"] = $_POST["new_password"];
    $_SESSION["cnew_password"] = $_POST["cnew_password"];

    if (empty($curr_password)) {
        $_SESSION["curr_password_err"] = "Please enter your current password.";
        $isValid = false;
        //
    } else {
        $conn = mysqli_connect("localhost", "root", "", "travel-tour", 3306);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, "SELECT email FROM users WHERE email = ? and password = ?");
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION["email"], $curr_password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $em);
        mysqli_stmt_fetch($stmt);

        if (!isset($em)) {
            $_SESSION["curr_password_err"] = "Incorrect Password";
            $isValid = false;
        }
    }

    // New Password Validation
    if (empty($new_password)) {

        $_SESSION["new_password_err"] = "Please enter a new password.";
        $isValid = false;
    }

    // Confirm New Password Validation
    if (empty($cnew_password)) {

        $_SESSION["cnew_password_err"] = "Please re-enter your password.";
        $isValid = false;
    } else if ($new_password != $cnew_password) {

        $_SESSION["cnew_password_err"] = "Password doesn't match.";
        $isValid = false;
    }

    if ($isValid) {
        $conn = mysqli_connect("localhost", "root", "", "travel-tour", 3306);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, "UPDATE users SET password = ? WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "ss", $new_password, $_SESSION["email"]);
        mysqli_stmt_execute($stmt);

        session_unset();
        $_SESSION["email"] = $customer_email;
        $_SESSION["global_msg"] = "Password Changed Succesfully.";
        header("Location: ../views/change_password_view.php");
    } else {
        header("Location:../views/change_password_view.php");
    }
} else {

    header("Location:../views/change_password_view.php");
}
