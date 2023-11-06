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
<h1 class="HeadingTag">Forget Password</h1>
<div class="container">


<form action="../controllers/forget_password_controller.php" method="post" novalidate>

    <!-- Email -->
    <br><label for="email">Email*</label><br>
    <input type="email" name="email" id="email" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "" ?>"><br>
    <?php
    if (isset($_SESSION["email_err"])) {
        echo "<em>" . $_SESSION["email_err"] . "</em><br>";
        $_SESSION["email_err"] = "";
    }
    ?>

    <!-- Security qus -->
    <br><label for="sq">Favorite Color*</label><br>
    <input type="text" name="sq" id="sq" value="<?php echo isset($_SESSION["sq"]) ? $_SESSION["sq"] : "" ?>"><br>
    <?php
    if (isset($_SESSION["sq_err"])) {
        echo "<em>" . $_SESSION["sq_err"] . "</em><br>";
        $_SESSION["sq_err"] = "";
    }
    ?>

    <!-- Password -->
    <br><label for="password">New Password*</label><br>
    <input type="password" name="password" id="password" value="<?php echo isset($_SESSION["password"]) ? $_SESSION["password"] : "" ?>"><br>
    <?php
    if (isset($_SESSION["password_err"])) {
        echo "<em>" . $_SESSION["password_err"] . "</em><br>";
        $_SESSION["password_err"] = "";
    }
    ?>

    <!-- Confirm Password -->
    <br><label for="cpassword">Confirm Password*</label><br>
    <input type="password" name="cpassword" id="cpassword" value="<?php echo isset($_SESSION["cpassword"]) ? $_SESSION["cpassword"] : "" ?>"><br>
    <?php
    if (isset($_SESSION["cpassword_err"])) {
        echo "<em>" . $_SESSION["cpassword_err"] . "</em><br>";
        $_SESSION["cpassword_err"] = "";
    }
    ?>

    <br><input type="submit" value="Change Password"><br>
</form>
<p class="a">
    <a href="../views/login_view.php">Login</a><br>
    <a href="../views/signup_view.php">Sign Up</a>
</p>
</div>
</body>

</html>