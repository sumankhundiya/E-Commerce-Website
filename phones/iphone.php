
<?php
// handle clear action (put near the top, before HTML)
if (isset($_GET['clear']) && $_GET['clear'] == '1') {
    if (session_status() === PHP_SESSION_NONE) session_start();
    unset($_SESSION['cart']);
    header('Location: /e-commerce/phones/iphone.php'); // reload clean page
    exit;
}

// session: start and compute subtotal only (AJAX adds handled by cart_add.php)
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$added_message = '';
$subtotal = 0.0;
foreach ($_SESSION['cart'] as $it) { $subtotal += (float)$it['price'] * intval($it['qty']);

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IPhones Phones - ShopZone</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Consistent product image sizing (same as android.php) */
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
  <h1>Android Phones</h1>
  <p>Choose your favorite Android smartphone</p>
</header>
<?php if (!empty($added_message)): ?>
  <div class="container mt-3">
    <div class="alert alert-success"><?= $added_message ?></div>
  </div>
<?php endif; ?>

<div class="container mb-3">
  <div class="d-flex justify-content-between align-items-center">
    <div id="subtotalDisplay" class="alert alert-info mb-0" style="<?= $subtotal>0 ? '' : 'display:none;' ?>">Cart subtotal: $<?= number_format($subtotal, 2) ?></div>
    <div class="d-flex gap-2">
      <a href="/e-commerce/cart.php" class="btn btn-primary" id="viewCartBtn" style="<?= $subtotal>0 ? '' : 'display:none;' ?>">View Cart</a>
    </div>
  </div>
</div>

<!-- =================== EXCLUSIVE IPHONES (IP1-IP4) =================== -->
<section class="py-5">
  <div class="container">
    <h2 class="mb-4 fw-bold">🎨 Exclusive iPhone Collections (IP1-IP4)</h2>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip1.jpeg" class="product-img" alt="iPhone 15 pro">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 15 pro</h5>
            <p class="text-success fw-bold">$18000</p>
            <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip2.webp" class="product-img" alt="iPhone 15">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 15</h5>
            <p class="text-success fw-bold">$16500</p>
             <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip3.webp" class="product-img" alt="iPhone 14 pro">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 14 pro</h5>
            <p class="text-success fw-bold">$14500</p>
             <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip4.webp" class="product-img" alt="iPhone 14">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 14</h5>
            <p class="text-success fw-bold">$12000</p>
              <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<hr class="my-5">

<!-- =================== PREMIUM COLLECTIONS (IP5-IP8) =================== -->
<section class="py-5">
  <div class="container">
    <h2 class="mb-4 fw-bold">💎 Premium Collections (IP5-IP8)</h2>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip5.jpg" class="product-img" alt="iPhone 15 pro">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 15 pro</h5>
            <p class="text-success fw-bold">$19000</p>
             <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip6.jpeg" class="product-img" alt="iPhone 15">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 15</h5>
            <p class="text-success fw-bold">$17500</p>
            <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip7.webp" class="product-img" alt="iPhone 14 pro">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 14 pro</h5>
            <p class="text-success fw-bold">$15500</p>
             <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip8.jpg" class="product-img" alt="iPhone 14">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 14</h5>
            <p class="text-success fw-bold">$13500</p>
             <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<hr class="my-5">

<!-- =================== TRENDY MODELS (IP9-IP12) =================== -->
<section class="py-5">
  <div class="container">
    <h2 class="mb-4 fw-bold">🌟 Trendy Models (IP9-IP12)</h2>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip9.webp" class="product-img" alt="iPhone 15 pro">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 15 pro</h5>
            <p class="text-success fw-bold">$18500</p>
              <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip10.jpeg" class="product-img" alt="iPhone 15">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 15</h5>
            <p class="text-success fw-bold">$16000</p>
            <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip11.jpeg" class="product-img" alt="iPhone 14 pro">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 14 pro</h5>
            <p class="text-success fw-bold">$14000</p>
             <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip12.jpeg" class="product-img" alt="iPhone 14">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 14</h5>
            <p class="text-success fw-bold">$11500</p>
              <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<hr class="my-5">

<!-- =================== SPECIAL EDITION (IP13-IP16) =================== -->
<section class="py-5">
  <div class="container">
    <h2 class="mb-4 fw-bold">✨ Special Edition (IP13-IP16)</h2>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip13.png" class="product-img" alt="iPhone 15 pro">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 15 pro</h5>
            <p class="text-success fw-bold">$19500</p>
              <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip14.avif" class="product-img" alt="iPhone 15">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 15</h5>
            <p class="text-success fw-bold">$17000</p>
            <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip15.webp" class="product-img" alt="iPhone 14 pro">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 14 pro</h5>
            <p class="text-success fw-bold">$15000</p>
             <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="../image/ip16.webp" class="product-img" alt="iPhone 14">
          <div class="card-body text-center">
            <h5 class="card-title">iPhone 14</h5>
            <p class="text-success fw-bold">$12500</p>
             <?php if (isset($_SESSION['name'])): ?>
              <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
                <input type="hidden" name="product_id" value="5g3">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="return_url" value="/e-commerce/phones/5gphones.php">
                <button type="submit" class="btn btn-primary w-100">Buy Now</button>
              </form>
              <?php else: ?>
              <a href="/e-commerce/sign.php" class="btn btn-danger w-100">Login to Buy</a>
              <?php endif; ?>
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