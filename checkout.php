<?php
session_start();

$active = $_GET['tab'] ?? '';

class Payment {

    function upi($account, $pin, $amount) {
        echo "<h3 style='color:green;'>Thank you for your UPI payment!</h3>";
    }

    function phonepay($phone, $amount) {
        echo "<h3 style='color:green;'>PhonePe payment successful!</h3>";
    }

    function debitcard($card, $name, $expiry, $amount) {
        echo "<h3 style='color:green;'>Your Debit Card payment was successful!</h3>";
    }

    function cash($name, $address, $amount) {
        echo "<h3 style='color:green;'>Order placed! Cash on Delivery selected.</h3>";
    }
}

$obj = new Payment();

// PROCESSING FORMS
if (isset($_POST['upi'])) {
    $obj->upi($_POST['account'], $_POST['pin'], $_POST['amount']);
}

if (isset($_POST['phone'])) {
    $obj->phonepay($_POST['phone'], $_POST['amount']);
}

if (isset($_POST['card'])) {
    $obj->debitcard($_POST['card_number'], $_POST['name'], $_POST['expiry'], $_POST['amount']);
}

if (isset($_POST['cash'])) {
    $obj->cash($_POST['name'], $_POST['address'], $_POST['amount']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <style>
        body{
            background-color: #e7eee7;
            font-family: Arial, sans-serif;
            padding: 100px;
            text-align:center;
            width:700px;
            justify-self:center;
            /* border:2px solid black; */

        }
        .tabs a{
            padding: 10px 20px;
            background: #ddd;
            margin-right: 10px;
            text-decoration: none;
            border-radius: 5px;
            color: black;
        }
        .active{
            background: #ec1a1aff;
            color: white !important;
        }
        form{
            justify-self:center;
            margin-top: 30px;
            padding: 20px;
            width: 400px;
            height:500px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #bcdcf7;
        }
        input, button{
            width: 80%;
            padding: 8px;
            margin: 10px 0px;
        }
        button{
            background: #27ae60;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover{
            background: #219150;
        }
    </style>
</head>
<body>

<h1>Select Payment Method</h1>

<div class="tabs">
    <a href="?tab=upi" class="<?= $active=='upi'?'active':'' ?>">UPI</a>
    <a href="?tab=phonepay" class="<?= $active=='phonepay'?'active':'' ?>">PhonePe</a>
    <a href="?tab=debitcard" class="<?= $active=='debitcard'?'active':'' ?>">Debit Card</a>
    <a href="?tab=cash" class="<?= $active=='cash'?'active':'' ?>">Cash on Delivery</a>
</div>


<!-- UPI -->
<?php if ($active=='upi'): ?>
<form method="post">
     <h2>Payment by UPI</h2>
    <input type="number" name="account" placeholder="UPI Number" required>
    <input type="password" name="pin" placeholder="PIN" required>
    <input type="number" name="amount" placeholder="Amount" required>
    <button name="upi">Pay with UPI</button>
</form>
<?php endif; ?>


<!-- PHONEPE -->
<?php if ($active=='phonepay'): ?>
<form method="post">
    <h2>Payment by Phone Pay</h2>
    <input type="number" name="phone" placeholder="PhonePe Number" required>
    <input type="number" name="amount" placeholder="Amount" required>
    <button name="phone">Pay with PhonePe</button>
</form>
<?php endif; ?>


<!-- DEBIT CARD -->
<?php if ($active=='debitcard'): ?>
<form method="post">
     <h2>Payment by Debit Card</h2>
    <input type="text" name="card_number" placeholder="Card Number" required>
    <input type="text" name="name" placeholder="Card Holder Name" required>
    <input type="month" name="expiry" required>
    <input type="number" name="amount" placeholder="Amount" required>
    <button name="card">Pay with Card</button>
</form>
<?php endif; ?>


<!-- CASH ON DELIVERY -->
<?php if ($active=='cash'): ?>
<form method="post">
     <h2>Payment by Cash</h2>
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="text" name="address" placeholder="Delivery Address" required>
    <input type="number" name="amount" placeholder="Amount" required>
    <button name="cash">Place Order (COD)</button>
</form>
<?php endif; ?>

</body>
</html>
