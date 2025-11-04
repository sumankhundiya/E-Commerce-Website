<?php
session_start();

// Simple product catalog - server authoritative prices/names
$products = [
  'phone1'=>['name'=>'Samsung Galaxy S23','price'=>799],
  'phone2'=>['name'=>'OnePlus 11','price'=>699],
  'phone3'=>['name'=>'Xiaomi 13 Pro','price'=>649],
  'phone4'=>['name'=>'Google Pixel 8','price'=>699],
  'iphone1'=>['name'=>'iPhone 15 pro','price'=>20000],
  'iphone2'=>['name'=>'iPhone 15','price'=>15099],
  'iphone3'=>['name'=>'iPhone 14 pro','price'=>13000],
  'iphone4'=>['name'=>'iPhone 14','price'=>699],
  '5g1'=>['name'=>'Google Pixel 8 5G','price'=>24000],
  '5g2'=>['name'=>'Samsung Galaxy S23 5G','price'=>15999],
  '5g3'=>['name'=>'OnePlus 11 5G','price'=>16000],
  '5g4'=>['name'=>'Xiaomi 13 Pro 5G','price'=>18099],
];

// incoming params
$product_id = $_POST['product_id'] ?? null;
$qty = max(1, intval($_POST['quantity'] ?? 1));
$return = $_POST['return_url'] ?? '/e-commerce/cart.php';

// detect AJAX callers: X-Requested-With header or Accept: application/json
$isAjax = false;
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') $isAjax = true;
$accept = $_SERVER['HTTP_ACCEPT'] ?? '';
if (strpos($accept, 'application/json') !== false) $isAjax = true;
if (isset($_POST['ajax']) && $_POST['ajax']) $isAjax = true;

// Basic validation
if (!$product_id || !isset($products[$product_id])) {
  header('Location: ' . $return);
  exit;
}

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if (isset($_SESSION['cart'][$product_id])) {
  $_SESSION['cart'][$product_id]['qty'] += $qty;
} else {
  $_SESSION['cart'][$product_id] = [
    'name' => $products[$product_id]['name'],
    'price' => $products[$product_id]['price'],
    'qty' => $qty
  ];
}

// compute subtotal and count for possible JSON response
$subtotal = 0.0;
$count = 0;
foreach ($_SESSION['cart'] as $it) {
  $subtotal += (float)$it['price'] * intval($it['qty']);
  $count += intval($it['qty']);
}

if ($isAjax) {
  header('Content-Type: application/json');
  echo json_encode(['success' => true, 'subtotal' => $subtotal, 'count' => $count]);
  exit;
}

header('Location: ' . $return);
exit; 
