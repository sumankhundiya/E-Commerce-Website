<?php
session_start();
include('db.php');

// Total Orders
$totalOrders = $conn->query("SELECT COUNT(*) FROM orders")->fetchColumn();

// Total Users
$totalUsers = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn();

// Total Products
$totalProducts = $conn->query("SELECT COUNT(*) FROM products")->fetchColumn();

// Total Sales
$totalSales = $conn->query("SELECT SUM(total_amount) FROM orders")->fetchColumn();
$totalSales = $totalSales ?? 0;

// Recent Orders
$recentOrders = $conn->query("SELECT * FROM orders ORDER BY id DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);

// Popular Products
$popularProducts = $conn->query("
    SELECT product_name,price, SUM(qty) AS total_sold
    FROM order_items
    GROUP BY product_name
    ORDER BY total_sold DESC
    LIMIT 5
")->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    body {
        background: #eef1f6;
        font-family: 'Segoe UI', sans-serif;
    }

    /* Fixed Header */
    .header-title {
        width: 100%;
        height: 70px;
        background: linear-gradient(90deg, #007bff, #00c6ff);
        color: white;
        font-size: 30px;
        font-weight: 600;
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    /* Fix space below header */
    .content-wrapper {
        margin-top: 100px;
    }

    /* Card hover effect */
    .stat-card {
        border-radius: 12px;
        transition: all 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

    .card-header {
        font-weight: bold;
        font-size: 18px;
    }

</style>

<body>

<!-- HEADER -->
<div class="header-title">
    Overview
</div>

<div class="content-wrapper container">

    <!-- Back Button -->
    <div class="d-flex justify-content-start mb-3">
        <a href="suman.php" class="btn btn-dark px-4">⬅ Back</a>
    </div>

    <!-- TOP CARDS -->
    <div class="row g-4">

        <div class="col-md-3">
            <div class="card shadow-sm stat-card">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Total Orders</h6>
                    <h2 class="text-primary"><?= $totalOrders ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm stat-card">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Total Users</h6>
                    <h2 class="text-success"><?= $totalUsers ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm stat-card">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Total Products</h6>
                    <h2 class="text-warning"><?= $totalProducts ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm stat-card">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Total Sales</h6>
                    <h2 class="text-danger">₹<?= number_format($totalSales) ?></h2>
                </div>
            </div>
        </div>

    </div>

    <!-- RECENT ORDERS -->
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-primary text-white">
            Recent Orders
        </div>
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <?php foreach ($recentOrders as $r): ?>
                <tr>
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['user_id'] ?></td>
                    <td>₹<?= $r['total_amount'] ?></td>
                    <td><?= ucfirst($r['status']) ?></td>
                    <td><?= $r['created_at'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- BEST SELLING PRODUCTS -->
    <div class="card shadow-sm mt-4 mb-5">
        <div class="card-header bg-success text-white">
            Best Selling Products
        </div>
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
            </thead>

            <?php foreach ($popularProducts as $p): ?>
                <tr>
                    <td><?= $p['product_name'] ?></td>
                    <td>₹<?= $p['price'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>

</body>
</html>

