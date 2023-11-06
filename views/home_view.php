<?php

session_start();
if (!isset($_SESSION["customer_email"])) {
    header("Location: ../views/login_view.php");
}

// Load Food Items
$conn = mysqli_connect("localhost", "root", "", "travel-tour", 3306);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 


$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, "SELECT id, foodname, price, img, rname FROM fooditem");
// mysqli_stmt_bind_param($stmt, "s", $_SESSION["customer_email"]);
mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $id, $foodname, $price, $img, $rname);
mysqli_stmt_fetch($stmt);
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Home - Customer</title>
</head>

<body>
    <?php require "nav_view.php" ?>

    <h2 class="HeadingTag">Foods</h2>


    

<div  class="container">
<form action="home_view.php" method="get">
        <label for="search">Food Name:</label>
        <input type="text" name="search" id="search">
        <input type="submit" value="Search">
    </form><br><br>
</div>

    <table>
        <?php

        if (!empty($_GET["search"])) {
            while (mysqli_stmt_fetch($stmt)) {
                if (strpos(strtolower($foodname), $_GET["search"]) !== false) {
                    echo "<td>";
                    echo "<fieldset>";
                    echo "<img src='" . $img . "' width='150px'> <br>";
                    echo "<span><strong>" . $foodname . "</strong></span><br>";
                    echo "<span>Price: " . $price . " Bdt</span><br>";
                    echo "<span>Restaurant: " . $rname . "</span><br>";
                    echo "<a href='../controllers/add_to_wishlist_controller.php?id=" . $id . "'>Add to Wishlist</a> <br> <a href='../controllers/add_to_cart_controller.php?id=" . $id . "'>Add to Cart</a>";
                    echo "</fieldset>";
                    echo "</td>";
                    echo "<td><pre>   </pre></td>";
                }
            }
        } else {
            while (mysqli_stmt_fetch($stmt)) {
                echo "<td>";
                echo "<fieldset>";
                echo "<img src='" . $img . "' width='150px'> <br>";
                echo "<span><strong>" . $foodname . "</strong></span><br>";
                echo "<span>Price: " . $price . " Bdt</span><br>";
                echo "<span>Restaurant: " . $rname . "</span><br>";
                echo "<a href='../controllers/add_to_wishlist_controller.php?id=" . $id . "'>Add to Wishlist</a> <br> <a href='../controllers/add_to_cart_controller.php?id=" . $id . "'>Add to Cart</a>";
                echo "</fieldset>";
                echo "</td>";
                echo "<td><pre>   </pre></td>";
            }
        }
        ?>
    </table>
    <?php include "footer_view.php" ?>
</body>

</html>