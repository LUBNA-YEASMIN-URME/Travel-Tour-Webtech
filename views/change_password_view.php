<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: ../views/login_view.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Change Password</title>
</head>

<body>
    <?php require "nav_view.php" ?>
    <h2 class="HeadingTag">Change Password</h2>

    <?php
    if (isset($_SESSION["global_msg"])) {
        echo "<strong><em>" . $_SESSION["global_msg"] . "</em></strong><br>";
        $_SESSION["global_msg"] = "";
    }
    ?>


<div class="container">
<form action="../controllers/change_password_controller.php" method="post" novalidate>

<!-- Current Password -->
<label for="curr_password">Current Password*</label><br>
<input type="password" name="curr_password" id="curr_password" value="<?php echo isset($_SESSION["curr_password"]) ? $_SESSION["curr_password"] : "" ?>"><br>
<?php
if (isset($_SESSION["curr_password_err"])) {
    echo "<em>" . $_SESSION["curr_password_err"] . "</em><br>";
    $_SESSION["curr_password_err"] = "";
}
?>

<!-- New Password -->
<br><label for="new_password">New Password*</label><br>
<input type="password" name="new_password" id="new_password" value="<?php echo isset($_SESSION["new_password"]) ? $_SESSION["new_password"] : "" ?>"><br>
<?php
if (isset($_SESSION["new_password_err"])) {
    echo "<em>" . $_SESSION["new_password_err"] . "</em><br>";
    $_SESSION["new_password_err"] = "";
}
?>

<!-- Confrim New Password -->
<br><label for="cnew_password">Confirm New Password*</label><br>
<input type="password" name="cnew_password" id="cnew_password" value="<?php echo isset($_SESSION["cnew_password"]) ? $_SESSION["cnew_password"] : "" ?>"><br>
<?php
if (isset($_SESSION["cnew_password_err"])) {
    echo "<em>" . $_SESSION["cnew_password_err"] . "</em><br>";
    $_SESSION["cnew_password_err"] = "";
}
?>

<br><input type="submit" value="Change Password"><br>
</form>
</div>
    <?php include "../views/footer_view.php" ?>
</body>

</html>