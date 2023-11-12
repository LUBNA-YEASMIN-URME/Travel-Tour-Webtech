<?php
session_start();
if (isset($_SESSION["customer_email"])) {
    header("Location: ../views/home_view.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Forget Password</title>
</head>

<body class="backGround center">

<br><br><br><br>


<center>
<h1>Forget Password</h1>
    <div>
        <form action="../controllers/forget_password_controller.php" method="post" novalidate>
            <!-- Email -->
            <br><label for="email">Email*</label><br>
            <input type="email" name="email" id="email"><br>
            <!-- Password -->
            <br><label for="password">New Password*</label><br>
            <input type="password" name="password" id="password" ><br>
            <!-- Confirm Password -->
            <br><label for="cpassword">Confirm Password*</label><br>
            <input type="password" name="cpassword" id="cpassword"><br>
            <br><input type="submit" value="Change Password"><br>
        </form>

        <p class="a">
            <a href="../views/login_view.php">Login</a><br>
            <a href="../views/signup_view.php">Sign Up</a>
        </p>
    </div>
</center>

</body>

</html>
