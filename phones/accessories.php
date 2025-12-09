<?php
// Start session for cart handling
session_start();

// Create cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle "Add to Cart" action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy'])) {
    $product_name = $_POST['product_name'] ?? '';
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0.0;

    // Use product name as a key
    $key = strtolower(str_replace(' ', '_', $product_name));

    if (isset($_SESSION['cart'][$key])) {
        $_SESSION['cart'][$key]['qty'] += 1; // increase quantity
    } else {
        $_SESSION['cart'][$key] = [
            'name' => $product_name,
            'price' => $price,
            'qty' => 1
        ];
    }
      $products_name[] = $product_name;
}

// Calculate subtotal

// echo "<p><strong>Subtotal:</strong> $" . number_format($subtotal, 2) . "</p>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Android Phones - ShopZone</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  /* Consistent product image sizing (same as android.php) */
  .product-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    display: block;
  }

  @media (max-width: 576px) {
    .product-img {
      height: 150px;
    }
  }
</style>

<body>

  <!-- Header -->
  <header class="bg-primary text-white text-center py-5">
    <h1>Accessories</h1>
    <p>Choose your favorite Android smartphone</p>
  </header>

  <?php if (!empty($added_message)): ?>
  <div class="container mt-3">
    <div class="alert alert-success">
      <?= $added_message ?>
    </div>
  </div>
  <?php endif; ?>

  <div class="container mb-3">
    <?php
  $subtotal = 0;
foreach ($_SESSION['cart'] as $item) {
    echo "<p style='color:green;'>".$item['name']."  added to cart </p>";
    $subtotal += $item['price'] * $item['qty'];
}
      ?>
    <div class="d-flex justify-content-between align-items-center">
      <div id="subtotalDisplay" class="alert alert-info mb-0" style="<?= $subtotal>0 ? '' : 'display:none;' ?>">Cart
        subtotal: $
        <?= number_format($subtotal, 2) ?>
      </div>
      <a href="/e-commerce/cart.php" class="btn btn-primary ms-3" id="viewCartBtn"
        style="<?= $subtotal>0 ? '' : 'display:none;' ?>">View Cart</a>
    </div>
  </div>


  <!-- =================== BUDGET ACCESSORIES =================== -->
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4 fw-bold">💰 Budget Accessories</h2>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card">
            <img src="../image/wacc1.webp" class="product-img" alt="Women Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Women Accessories</h5>
              <p class="text-success fw-bold">$20000</p>
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
            <img src="../image/hacc1.webp" class="product-img" alt="Hand Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Hand Accessories</h5>
              <p class="text-success fw-bold">$699</p>
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
            <img src="../image/gacc1.avif" class="product-img" alt="Girl Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Girl Accessories</h5>
              <p class="text-success fw-bold">$15099</p>
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
            <img src="../image/gacc2.webp" class="product-img" alt="Girl Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Girl Accessories</h5>
              <p class="text-success fw-bold">$13000</p>
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

  <!-- =================== PREMIUM ACCESSORIES =================== -->
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4 fw-bold">✨ Premium Accessories</h2>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card">
            <img src="../image/gacc3.webp" class="product-img" alt="Girl Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Girl Accessories</h5>
              <p class="text-success fw-bold">$15099</p>
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
            <img src="../image/wacc2.webp" class="product-img" alt="Women Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Women Accessories</h5>
              <p class="text-success fw-bold">$20000</p>
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
            <img src="../image/gacc4.jpg" class="product-img" alt="Girl Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Girl Accessories</h5>
              <p class="text-success fw-bold">$13000</p>
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
            <img src="../image/hacc2.jpg" class="product-img" alt="Hand Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Hand Accessories</h5>
              <p class="text-success fw-bold">$699</p>
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

  <!-- =================== LIFESTYLE ACCESSORIES =================== -->
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4 fw-bold">👜 Lifestyle Accessories</h2>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card">
            <img src="../image/gacc5.webp" class="product-img" alt="Girl Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Girl Accessories</h5>
              <p class="text-success fw-bold">$13000</p>
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
            <img src="../image/hacc3.webp" class="product-img" alt="Hand Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Hand Accessories</h5>
              <p class="text-success fw-bold">$699</p>
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
            <img src="../image/wacc3.png" class="product-img" alt="Women Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Women Accessories</h5>
              <p class="text-success fw-bold">$20000</p>
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
            <img src="../image/gacc6.jpg" class="product-img" alt="Girl Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Girl Accessories</h5>
              <p class="text-success fw-bold">$15099</p>
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

  <!-- =================== TRENDING ACCESSORIES =================== -->
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4 fw-bold">🔥 Trending Accessories</h2>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card">
            <img src="../image/hacc4.jpg" class="product-img" alt="Hand Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Hand Accessories</h5>
              <p class="text-success fw-bold">$699</p>
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
            <img src="../image/gacc7.jpg" class="product-img" alt="Girl Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Girl Accessories</h5>
              <p class="text-success fw-bold">$14299</p>
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
            <img src="../image/gacc8.jpg" class="product-img" alt="Girl Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Girl Accessories</h5>
              <p class="text-success fw-bold">$13000</p>
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
            <img src="../image/wacc4.avif" class="product-img" alt="Women Accessories">
            <div class="card-body text-center">
              <h5 class="card-title">Women Accessories</h5>
              <p class="text-success fw-bold">$20000</p>
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


    <hr class="my-5">




    <!-- Footer -->
    <footer style="background-color:#222; color:#fff; padding:40px 20px; font-family:Arial, sans-serif;">
      <div
        style="max-width:1200px; margin:0 auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:20px;">

        <!-- About Section -->
        <div style="flex:1; min-width:200px;">
          <h4 style="margin-bottom:15px;">About Us</h4>
          <p>We provide the best quality products at affordable prices. Our goal is to make shopping easy and enjoyable
            for everyone.</p>
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