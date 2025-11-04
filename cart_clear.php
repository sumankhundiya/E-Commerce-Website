<?php
// Clears the entire session cart and redirects back to cart viewer
session_start();
if (isset($_SESSION['cart'])) unset($_SESSION['cart']);
header('Location: /e-commerce/cart.php');
exit;
