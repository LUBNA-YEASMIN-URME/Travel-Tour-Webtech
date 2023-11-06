<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: ../views/login_view.php");
}

$conn = mysqli_connect("localhost", "root", "", "travel-tour", 3306);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$stmt = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($stmt, "SELECT  contact, email, nid, age,name,image FROM users WHERE email = ?")) {
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["email"]);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt,$contact, $email, $nid, $age,$name,$image);
    mysqli_stmt_fetch($stmt);
} else {
    // Handle the case where the statement preparation failed
    echo "Failed to prepare the statement.";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Profile</title>
</head>

<body>
   

    <h2 class="HeadingTag">Profile</h2>

    <div class="container">
        <form action="../controllers/profile_controller.php" method="post" enctype="multipart/form-data" novalidate>
            
            <!-- Name -->
            <br><label for="name">Name*</label><br>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>"><br>

            <!-- Contact -->
            <br><label for="contact">Contact*</label><br>
            <input type="text" name="contact" id="contact" value="<?php echo $contact; ?>"><br>

            <!-- Email -->
            <br><label for="email">Email*</label><br>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>" readonly><br>

           

            <!-- NID -->
            <br><label for="nid">NID*</label><br>
            <input type="text" name="nid" id="nid" value="<?php echo $nid; ?>"><br>

            <!-- Age -->
            <br><label for="age">Age*</label><br>
            <input type="text" name="age" id="age" value="<?php echo $age; ?>"><br>

            <br><input type="submit" value="Update Info"><br><br>
        </form>
    </div>

    
</body>

</html>
