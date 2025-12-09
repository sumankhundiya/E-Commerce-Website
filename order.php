<?php
session_start();
// CHECK if user is logged in
if (!isset($_SESSION['id'])) {
    die("You must log in to view your orders.");
}

$pdo = new PDO("mysql:host=localhost;dbname=shopzone;port=3307", "root", "");

// Logged-in user ID
$user_id = $_SESSION['id'];

// Fetch only this user's orders
$stmt = $pdo->prepare("SELECT * FROM order_items WHERE user_id = ?");
$stmt->execute([$user_id]);

$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eef1f5;
        }
        .order-card {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }
        .order-title {
            font-weight: 700;
            font-size: 28px;
        }
        .table thead th {
            background: #343a40;
            color: white;
        }
        img.product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body class="p-4">

<div class="container mt-4">

    <div class="order-card mx-auto">
        <div class="text-center mb-4">
            <h2 class="order-title">📦 Your Orders</h2>
            <p class="text-muted">All products you have ordered till now</p>
        </div>

        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Price (₹)</th>
                    <th>Qty</th>
                </tr>
            </thead>
            <tbody>

                <?php if (!empty($orders)) { ?>
                    <?php foreach ($orders as $order) { ?>
                        <tr>
                            <td><?= $order['id'] ?></td>

                            <td><?= $order['product_name'] ?></td>
                            <td><strong>₹<?= number_format($order['price'], 2) ?></strong></td>
                            <td><?= $order['qty'] ?></td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5" class="text-muted py-3">
                            ❌ No Orders Found
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

        <div class="text-center mt-3">
            <a href="home.php" class="btn btn-primary px-4">⬅ Back to Home</a>
        </div>

    </div>

</div>

</body>
</html>

