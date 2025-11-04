<?php
// session-based cart handling (same as laptop/gaming.php)
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$added_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy'])) {
  $product_name = trim($_POST['product_name'] ?? '');
  $price = isset($_POST['price']) ? floatval($_POST['price']) : 0.0;
  $key = preg_replace('/[^a-z0-9_]/i', '_', strtolower($product_name));
  if (isset($_SESSION['cart'][$key])) {
    $_SESSION['cart'][$key]['qty'] += 1;
  } else {
    $_SESSION['cart'][$key] = ['name'=>$product_name,'price'=>$price,'qty'=>1];
  }
  $added_message = htmlspecialchars($product_name) . ' added to cart.';

  // If AJAX caller expects JSON, return subtotal/count
  $isAjax = false;
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') $isAjax = true;
  $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
  if (strpos($accept, 'application/json') !== false) $isAjax = true;
  if (isset($_POST['ajax']) && $_POST['ajax']) $isAjax = true;
  if ($isAjax) {
    $subtotal = 0.0; $count = 0;
    foreach ($_SESSION['cart'] as $it) { $subtotal += (float)$it['price'] * intval($it['qty']); $count += intval($it['qty']); }
    header('Content-Type: application/json');
    echo json_encode(['success'=>true,'subtotal'=>$subtotal,'count'=>$count]);
    exit;
  }
}

$subtotal = 0.0;
foreach ($_SESSION['cart'] as $it) { $subtotal += (float)$it['price'] * intval($it['qty']); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Android Phones - ShopZone</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Consistent product image sizing */
    .product-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      display: block;
    }

    @media (max-width: 576px) {
      .product-img { height: 150px; }
    }
  </style>
</head>
<body>

<!-- Header -->
<header class="bg-primary text-white text-center py-5">
  <h1>5G Phones</h1>
  <p>Choose your favorite Android 5Gphone</p>
</header>

<?php if (!empty($added_message)): ?>
  <div class="container mt-3">
    <div class="alert alert-success"><?= $added_message ?></div>
  </div>
<?php endif; ?>

<div class="container mb-3">
  <div class="d-flex justify-content-between align-items-center">
    <div id="subtotalDisplay" class="alert alert-info mb-0" style="<?= $subtotal>0 ? '' : 'display:none;' ?>">Cart subtotal: $<?= number_format($subtotal, 2) ?></div>
    <a href="/e-commerce/cart.php" class="btn btn-primary ms-3" id="viewCartBtn" style="<?= $subtotal>0 ? '' : 'display:none;' ?>">View Cart</a>
  </div>
</div>

<!-- Android Phones Products -->
<section class="py-5">
  <div class="container">
    <div class="row g-4">

      <div class="col-md-3">
        <div class="card">
          <img src="../images/5g1.jpg" class="card-img-top img-fluid product-img" alt="Google Pixel 8 5G" loading="lazy">
          <div class="card-body text-center">
            <h5 class="card-title">Google Pixel 8 5G</h5>
            <p class="text-success">$24000</p>
            <form method="post" data-ajax="1">
              <input type="hidden" name="product_name" value="Google Pixel 8 5G">
              <input type="hidden" name="price" value="24000">
              <button type="submit" name="buy" class="btn btn-primary">Buy Now</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="../images/5g2.jpg" class="card-img-top img-fluid product-img" alt="Samsung Galaxy S23 5G" loading="lazy">
          <div class="card-body text-center">
            <h5 class="card-title">Samsung Galaxy S23 5G</h5>
            <p class="text-success">$15999</p>
            <form method="post" data-ajax="1">
              <input type="hidden" name="product_name" value="Samsung Galaxy S23 5G">
              <input type="hidden" name="price" value="15999">
              <button type="submit" name="buy" class="btn btn-primary">Buy Now</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="../images/5g3.jpg" class="card-img-top img-fluid product-img" alt="OnePlus 11 5G" loading="lazy">
          <div class="card-body text-center">
            <h5 class="card-title">OnePlus 11 5G</h5>
            <p class="text-success">$16000</p>
            <form method="post" data-ajax="1">
              <input type="hidden" name="product_name" value="OnePlus 11 5G">
              <input type="hidden" name="price" value="16000">
              <button type="submit" name="buy" class="btn btn-primary">Buy Now</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="../images/5g4.jpg"  class="card-img-top img-fluid product-img" alt="Xiaomi 13 Pro 5G" loading="lazy">
          <div class="card-body text-center">
            <h5 class="card-title">Xiaomi 13 Pro 5G</h5>
            <p class="text-success">$18099</p>
            <form method="post" data-ajax="1">
              <input type="hidden" name="product_name" value="Xiaomi 13 Pro 5G">
              <input type="hidden" name="price" value="18099">
              <button type="submit" name="buy" class="btn btn-primary">Buy Now</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

   <!-- Footer -->
    <footer style="background-color:#222; color:#fff; padding:40px 20px; font-family:Arial, sans-serif;">
  <div style="max-width:1200px; margin:0 auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:20px;">
    
    <!-- About Section -->
    <div style="flex:1; min-width:200px;">
      <h4 style="margin-bottom:15px;">About Us</h4>
      <p>We provide the best quality products at affordable prices. Our goal is to make shopping easy and enjoyable for everyone.</p>
    </div>
    
    <!-- Quick Links -->
    <div style="flex:1; min-width:150px;">
      <h4 style="margin-bottom:15px;">Quick Links</h4>
      <ul style="list-style:none; padding:0;">
        <li><a href="home.php" style="color:#fff; text-decoration:none;">Home</a></li>
        <li><a href="offer.php" style="color:#fff; text-decoration:none;">Offer</a></li>
        <li><a href="contact.php" style="color:#fff; text-decoration:none;">Contact</a></li>
      </ul>
    </div>
    
    <!-- Contact Info -->
    <div style="flex:1; min-width:200px;">
      <h4 style="margin-bottom:15px;">Contact Us</h4>
      <p>Email: info@example.com</p>
      <p>Phone: +1 234 567 890</p>
      <p>Address: 123 Street, City, Country</p>
    </div>
    
    <!-- Social Media -->
    <div style="flex:1; min-width:150px;">
      <h4 style="margin-bottom:15px;">Follow Us</h4>
      <div style="display:flex; gap:10px;">
        <a href="#" style="color:#fff; text-decoration:none;">Facebook</a>
        <a href="#" style="color:#fff; text-decoration:none;">Twitter</a>
        <a href="#" style="color:#fff; text-decoration:none;">Instagram</a>
      </div>
    </div>
  </div>

  <div style="text-align:center; margin-top:30px; border-top:1px solid #444; padding-top:15px; font-size:14px;">
    &copy; 2025 Your Website. All Rights Reserved.
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>