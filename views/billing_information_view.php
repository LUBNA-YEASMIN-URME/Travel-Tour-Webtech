<?php 
    require('../controllers/sessionCheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
</head>
<body>
    <center>
    <h3>Billing Information</h3>
    <form action="../controllers/process_billing_controller.php" method="post">
        <label for="full_name">Full Name</label>
        <input type="text" name="full_name" id="full_name">
        <br>
        <label for="address">Address</label>
        <input type="text" name="address" id="address">
        <br>
        <label for="city">City</label>
        <input type="text" name="city" id="city">
        <br>
        <label for="zip_code">Zip Code</label>
        <input type="text" name="zip_code" id="zip_code">
        <br>
        <input type="submit" value="Make Payment">
    </form>
</center>
    
</body>
</html>
