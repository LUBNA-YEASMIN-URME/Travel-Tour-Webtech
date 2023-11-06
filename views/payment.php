<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="payment.css">
    <title>Payment Page</title>
</head>
<body>
    <div class="payment-form">
        <h1>Payment Information</h1>
        <form>
            <div class="form-group">
                <label for="generated_pay_amount">Pay Amount</label>
                <input type="text" id="generated_pay_amount" name="generated_pay_amount" required>
            </div>
            <div class="form-group">
                <label for="payment_method">Choose Payment Method</label>
                <select id="payment_method" name="payment_method">
                    <option value="Bkash">Bkash</option>
                    <option value="Nagad">Nagad</option>
                    <option value="Rocket">Rocket</option>
                </select>
            </div>
            <div class="form-group">
                <label for="selected_payment_method">Selected Payment Method</label>
                <input type="text" id="selected_payment_method" name="selected_payment_method" readonly>
            </div>
            <div class="form-group">
                <label for="transaction_id">Transaction ID</label>
                <input type="text" id="transaction_id" name="transaction_id" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit Payment</button>
            </div>
        </form>
    </div>
</body>
</html>
