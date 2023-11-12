
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE,edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>

<body class="backGround center">
    <br><br><br><br>
    <center>
    <h1>Good To See you Again</h1>
        <div>
            <form action="../controllers/login_controller.php" method="post" novalidate>
                <!-- Email -->
                <br><label for="email">Email*</label><br>
                <input type="email" name="email" id="email"><br>
                <!-- Password -->
                <br><label for="password">Password*</label><br>
                <input type="password" name="password" id="password"><br>
                <br><input type="submit" value="Login"><br>
            </form>
            <p class="a">
                <span>Need an account?</span> <a href="../views/signup_view.php">Sign Up</a><br>
                <a href="../views/forget_password_view.php">Forget Password</a>
            </p>
        </div>
    </center>
</body>

</html>
