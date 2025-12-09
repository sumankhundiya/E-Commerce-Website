<?php
session_start();

// Simple product catalog - server authoritative prices/names
$products = [
   // Android.php catalog entries
  'phone1'=>['name'=>'Samsung Galaxy S23','price'=>799],
  'phone2'=>['name'=>'OnePlus 11','price'=>699],
  'phone3'=>['name'=>'Xiaomi 13 Pro','price'=>649],
  'phone4'=>['name'=>'Google Pixel 8','price'=>699],
  'phone5'=>['name'=>'Samsung Galaxy M07','price'=>7999],
  'iphone1'=>['name'=>'iPhone 15 pro','price'=>20000],
  'iphone2'=>['name'=>'iPhone 15','price'=>15099],
  'iphone3'=>['name'=>'iPhone 14 pro','price'=>13000],
  'iphone4'=>['name'=>'iPhone 14','price'=>699],
  'phone5'=>['name'=>'Samsung Galaxy M07','price'=>7999],
  'phone6'=>['name'=>'Redmi A4 5G','price'=>5899],
  'phone7'=>['name'=>'Oppo K13x 5G','price'=>4499],
  'phone8'=>['name'=>'Vivo T4 Lite 5G','price'=>10879],
  'phone9'=>['name'=>'OnePlus Nord CE5 5G','price'=>2329],
  'phone10'=>['name'=>'Google Pixel 8a 5G','price'=>4329],
  'phone11'=>['name'=>'Samsung Galaxy A26 5G','price'=>3229],
  'phone12'=>['name'=>'Realme 14x 5G','price'=>3549],
  'phone13'=>['name'=>'Samsung Galaxy S25 Ultra','price'=>9999],
  'phone14'=>['name'=>'Samsung Galaxy S25','price'=>10999],
  'phone15'=>['name'=>'OnePlus 13s','price'=>8299],
  'phone16'=>['name'=>'Vivo X200','price'=>8399],
  'phone17'=>['name'=>'Asus ROG Phone 8 Pro','price'=>8789],
  'phone18'=>['name'=>'iQOO Neo 10R','price'=>10399],
  'phone19'=>['name'=>'Realme 15T 5G','price'=>12899],
  'phone20'=>['name'=>'Redmi Note 14 Pro 5G','price'=>7999],
  'phone21'=>['name'=>'Samsung Galaxy Z Fold 7','price'=>11499],
  'phone22'=>['name'=>'Samsung Z Fold 5','price'=>11299],
  'phone23'=>['name'=>'Samsung Galaxy Z Flip 7 FE','price'=>14099],
  'phone24'=>['name'=>'Huawei Pura X','price'=>9999],

  // 5G Phones (from phones/5Gphones.php)
  '5g1'=>['name'=>'Samsung Galaxy M06 5G','price'=>7999],
  '5g2'=>['name'=>'Poco C75 5G','price'=>5899],
  '5g3'=>['name'=>'Redmi Note 14 SE 5G','price'=>4499],
  '5g4'=>['name'=>'Poco M7 Pro 5G','price'=>10879],
  '5g5'=>['name'=>'OnePlus Nord CE5 5G','price'=>2329],
  '5g6'=>['name'=>'Redmi Note 14 5G','price'=>4329],
  '5g7'=>['name'=>'Realme 14x 5G','price'=>3229],
  '5g8'=>['name'=>'Oppo K13x 5G','price'=>3549],
  '5g9'=>['name'=>'Samsung Galaxy S25 Ultra 5G','price'=>9999],
  '5g10'=>['name'=>'OnePlus 13s 5G','price'=>10999],
  '5g11'=>['name'=>'Google Pixel 10','price'=>8299],
  '5g12'=>['name'=>'OnePlus Nord 5 5G','price'=>8399],
  '5g13'=>['name'=>'Realme 14x 5G','price'=>8789],
  '5g14'=>['name'=>'Infinix Note 50s 5G+','price'=>10399],
  '5g15'=>['name'=>'Vivo T4x 5G','price'=>12899],
  '5g16'=>['name'=>'Redmi Note 14 Pro 5G','price'=>7999],
  '5g17'=>['name'=>'Samsung Galaxy Z Fold 5','price'=>11499],
  '5g18'=>['name'=>'Samsung Galaxy Z Flip 5','price'=>11299],
  '5g19'=>['name'=>'Samsung Galaxy Z Flip 7 FE','price'=>14099],
  '5g20'=>['name'=>'Google Pixel Fold','price'=>9999],

  // Accessories (from phones/accessories.php)
  'acc1'=>['name'=>'Women Accessories','price'=>20000],
  'acc2'=>['name'=>'Girl Accessories','price'=>15099],
  'acc3'=>['name'=>'Girl Accessories','price'=>13000],
  'acc4'=>['name'=>'Hand Accessories','price'=>699],
  'acc5'=>['name'=>'Women Accessories Set 2','price'=>18000],
  'acc6'=>['name'=>'Girl Accessories Set 3','price'=>14000],
  'acc7'=>['name'=>'Hand Accessory Premium','price'=>999],
  'acc8'=>['name'=>'Lifestyle Accessories','price'=>16000],
  'acc9'=>['name'=>'Trending Accessories Pack','price'=>12999],
  'acc10'=>['name'=>'Premium Hand Accessories','price'=>799],
  'acc11'=>['name'=>'Women Accessories Deluxe','price'=>21000],
  'acc12'=>['name'=>'Girl Accessories Trend','price'=>13500],

  // iPhone Collections (from phones/iphone.php)
  'ip1'=>['name'=>'iPhone 15 pro','price'=>18000],
  'ip2'=>['name'=>'iPhone 15','price'=>16500],
  'ip3'=>['name'=>'iPhone 14 pro','price'=>14500],
  'ip4'=>['name'=>'iPhone 14','price'=>12000],
  'ip5'=>['name'=>'iPhone 15 pro','price'=>19000],
  'ip6'=>['name'=>'iPhone 15','price'=>17500],
  'ip7'=>['name'=>'iPhone 14 pro','price'=>15500],
  'ip8'=>['name'=>'iPhone 14','price'=>13500],
  'ip9'=>['name'=>'iPhone 15 pro','price'=>18500],
  'ip10'=>['name'=>'iPhone 15','price'=>16000],
  'ip11'=>['name'=>'iPhone 14 pro','price'=>14000],
  'ip12'=>['name'=>'iPhone 14','price'=>11500],
  'ip13'=>['name'=>'iPhone 15 pro','price'=>19500],
  'ip14'=>['name'=>'iPhone 15','price'=>17000],
  'ip15'=>['name'=>'iPhone 14 pro','price'=>15000],
  'ip16'=>['name'=>'iPhone 14','price'=>12500],
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
