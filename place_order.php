<?php
session_start();

// CART DATA
$cart = $_SESSION['cart'] ?? [];

// GET LOGGED-IN USER ID
$user_id = $_SESSION['id'] ?? null;   // ✅ Important

if (!$user_id) {
    die("User not logged in. Please <a href='login.php'>login</a> first.");
}

if (empty($cart)) {
    die("Your cart is empty. <a href='cart.php'>Go back</a>");
}

$conn = new mysqli("localhost", "root", "", "shopzone", 3307);

// Calculate total
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['qty'];
}

// Insert order
$sql = "INSERT INTO orders (user_name, total_amount, user_id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sdi", $_SESSION['name'], $total, $user_id);
$stmt->execute();

$order_id = $stmt->insert_id;

// Insert order items
foreach ($cart as $id => $item) {

    $sql_item = "INSERT INTO order_items (user_id, order_id, product_id, product_name, qty, price)
                 VALUES (?, ?, ?, ?, ?, ?)";

    $stmt_item = $conn->prepare($sql_item);
    $stmt_item->bind_param(
        "iiisid",
        $user_id,
        $order_id,
        $id,
        $item['name'],
        $item['qty'],
        $item['price']
    );

    $stmt_item->execute();
}

// Clear cart
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

<div class="container text-center">
    <div class="alert alert-success">
        <h2>Your Order Has Been Placed Successfully!</h2>
        <p>Order ID: <strong><?= $order_id ?></strong></p>
        <a href="home.php" class="btn btn-primary mt-3">Continue Shopping</a>
    </div>
</div>

</body>
</html>
