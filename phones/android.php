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
      width: 100%;        /* fill the card width */
      height: 200px;     /* desired fixed height (adjust as needed) */
      object-fit: cover;  /* crop/scale to fill while preserving aspect ratio */
      display: block;
    }

    /* Smaller height on very small screens */
    @media (max-width: 576px) {
      .product-img { height: 150px; }
    }
  </style>
  </style>
</head>
<body>

<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$subtotal = 0.0;
foreach ($_SESSION['cart'] ?? [] as $it) {
  $subtotal += (float)$it['price'] * intval($it['qty']);
}
?>

<!-- Header -->
<header class="bg-primary text-white text-center py-5">
  <h1>Android Phones</h1>
  <p>Choose your favorite Android smartphone</p>
</header>
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
          <img src="../images/phone1.jpg" class="card-img-top img-fluid product-img" alt="Samsung Galaxy" loading="lazy">
          <div class="card-body text-center">
            <h5 class="card-title">Samsung Galaxy S23</h5>
            <p class="text-success">$799</p>
            <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
              <input type="hidden" name="product_id" value="phone1">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="return_url" value="/e-commerce/phones/android.php">
              <button type="submit" class="btn btn-primary">Buy Now</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="../images/phone2.jpg" class="card-img-top img-fluid product-img" alt="OnePlus" loading="lazy">
          <div class="card-body text-center">
            <h5 class="card-title">OnePlus 11</h5>
            <p class="text-success">$699</p>
            <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
              <input type="hidden" name="product_id" value="phone2">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="return_url" value="/e-commerce/phones/android.php">
              <button type="submit" class="btn btn-primary">Buy Now</button>
            </form>
          </div>
        </div>  
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="../images/phone3.jpg" class="card-img-top img-fluid product-img" alt="Xiaomi" loading="lazy">
          <div class="card-body text-center">
            <h5 class="card-title">Xiaomi 13 Pro</h5>
            <p class="text-success">$649</p>  
            <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
              <input type="hidden" name="product_id" value="phone3">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="return_url" value="/e-commerce/phones/android.php">
              <button type="submit" class="btn btn-primary">Buy Now</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="../images/phone4.jpg" class="card-img-top img-fluid product-img" alt="Google Pixel" loading="lazy">
          <div class="card-body text-center">
            <h5 class="card-title">Google Pixel 8</h5>
            <p class="text-success">$699</p>
            <form method="post" action="/e-commerce/cart_add.php" data-ajax="1">
              <input type="hidden" name="product_id" value="phone4">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="return_url" value="/e-commerce/phones/android.php">
              <button type="submit" class="btn btn-primary">Buy Now</button>
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