<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>

<body class="backGround center">
    <br><br><br><br>
    

    <center>
    <h1>Sign Up</h1>
        <div>
            <form action="../controllers/signup_controller.php" method="post" novalidate>
                <!-- Name -->
                <br><label for="name">Name*</label><br>
                <input type="text" name="name" id="name"><br>

                <!-- Email -->
                <br><label for="email">Email*</label><br>
                <input type="email" name="email" id="email"><br>
                
                <!-- NID -->
                <br><label for="nid">NID</label><br>
                <input type="text" name="nid" id="nid"><br>

                <!-- Age -->
                <br><label for="age">Age</label><br>
                <input type="text" name="age" id="age"><br>

                <!-- Contact -->
                <br><label for="contact">Contact*</label><br>
                <input type="text" name="contact" id="contact"><br>

                <!-- Password -->
                <br><label for="password">Password*</label><br>
                <input type="password" name="password" id="password"><br>

                <!-- Confirm Password -->
                <br><label for="cpassword">Confirm Password*</label><br>
                <input type="password" name="cpassword" id="cpassword"><br>

                <br><input type="submit" value="Sign Up"><br>

                <p class="a">
                    <a href="../views/login_view.php">Login</a><br>
                    <a href="../views/forget_password_view.php">Forget Password</a>
                </p>
            </form>
        </div>
    </center>
</body>

</html>
