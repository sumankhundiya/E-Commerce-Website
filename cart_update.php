<?php
// Updates quantities in the session cart. Expects POSTed `qty` array: qty[product_key] => number
session_start();

if (!isset($_SESSION['cart'])) {
    // nothing to do
    header('Location: /e-commerce/cart.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['qty']) && is_array($_POST['qty'])) {
    foreach ($_POST['qty'] as $key => $value) {
        // normalize key and quantity
        $key = (string)$key;
        $qty = intval($value);
        if ($qty <= 0) {
            // remove item
            if (isset($_SESSION['cart'][$key])) unset($_SESSION['cart'][$key]);
        } else {
            // update quantity if exists
            if (isset($_SESSION['cart'][$key])) {
                $_SESSION['cart'][$key]['qty'] = $qty;
            }
        }
    }
}

// optional: support removing single item via GET remove=key
if (isset($_GET['remove'])) {
    $k = (string)$_GET['remove'];
    if (isset($_SESSION['cart'][$k])) unset($_SESSION['cart'][$k]);
}

header('Location: /e-commerce/cart.php');
exit;
