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
    <h3>Payment Information</h3>
    <form action="../controllers/payment_controller.php" method="post">
        <label for="pay_amount">Pay Amount</label>
        <input type="text" name="pay_amount" id="pay_amount">
        <br>
        <label for="payment_method">Choose Payment Method</label>
        <select name="payment_method" id="payment_method">
            <option value="Bkash">Bkash</option>
            <option value="Nagad">Nagad</option>
            <option value="Rocket">Rocket</option>
        </select>
        <br>
        <label for="transaction_id">Transaction ID</label>
        <input type="text" name="transaction_id" id="transaction_id">
        <br>
        <input type="submit" value="Submit">
    </form>
    </center>
    
</body>
</html>
