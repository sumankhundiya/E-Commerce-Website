<?php
// session-based cart handling (same as laptop/gaming.php)
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$added_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy'])) {
 if($_SESSION ['name'])
{
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
      .product-img {
        height: 150px;
      }
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
    <div class="alert alert-success">
      <?= $added_message ?>
    </div>
  </div>
  <?php endif; ?>

  <div class="container mb-3">
    <div class="d-flex justify-content-between align-items-center">
      <div id="subtotalDisplay" class="alert alert-info mb-0" style="<?= $subtotal>0 ? '' : 'display:none;' ?>">Cart
        subtotal: $
        <?= number_format($subtotal, 2) ?>
      </div>
      <a href="/e-commerce/cart.php" class="btn btn-primary ms-3" id="viewCartBtn"
        style="<?= $subtotal>0 ? '' : 'display:none;' ?>">View Cart</a>
    </div>
  </div>

  <!-- =================== ANDROID PHONE CATEGORIES =================== -->

  <section class="py-5">
    <div class="container">

      <!-- ================== Category: Budget Phones ================== -->
      <h2 class="mb-4 fw-bold">💰 Budget 5G Phones</h2>
      <div class="row g-4">

        <div class="col-md-3">
          <div class="card">
            <img src="../image/5gimg1.jpeg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Samsung Galaxy M06 5G</h5>
              <p class="text-success fw-bold">$7999</p>
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
            <img src="../image/5gimg2.jpg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Poco C75 5G</h5>
              <p class="text-success fw-bold">$5899</p>
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
            <img src="../image/5gimg3.jpg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Redmi Note 14 SE 5G</h5>
              <p class="text-success fw-bold">$4499</p>
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
            <img src="../image/5gimg4.jpg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Poco M7 Pro 5G</h5>
              <p class="text-success fw-bold">$10879</p>
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

      <hr class="my-5">

      <!-- ================== Category: Mid Range Phones ================== -->
      <h2 class="mb-4 fw-bold">📱 Mid-Range 5G Phones</h2>
      <div class="row g-4">

        <div class="col-md-3">
          <div class="card">
            <img src="../image/5gimg5.png" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">OnePlus Nord CE5 5G</h5>
              <p class="text-success fw-bold">$2329</p>
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
            <img src="../image/5gimg6.jpg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Redmi Note 14 5G</h5>
              <p class="text-success fw-bold">$4329</p>
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
            <img src="../image/5gimg7.jpg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Realme 14x 5G</h5>
              <p class="text-success fw-bold">$3229</p>
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
            <img src="../image/5gimg8.jpg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Oppo K13x 5G</h5>
              <p class="text-success fw-bold">$3549</p>
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

      <hr class="my-5">

      <!-- ================== Category: Flagship Phones ================== -->
      <h2 class="mb-4 fw-bold">🚀 Flagship 5G Phones</h2>
      <div class="row g-4">

        <div class="col-md-3">
          <div class="card">
            <img src="../image/5gimg9.jpeg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Samsung Galaxy S25 Ultra 5G</h5>
              <p class="text-success fw-bold">$9999</p>
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
            <img src="../image/5gimg10.jpeg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">OnePlus 13s 5G</h5>
              <p class="text-success fw-bold">$10999</p>
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
            <img src="../image/5gimg11.webp" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Google Pixel 10</h5>
              <p class="text-success fw-bold">$8299</p>
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
            <img src="../image/5gimg12.jpg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">OnePlus Nord 5 5G</h5>
              <p class="text-success fw-bold">$8399</p>
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

      <hr class="my-5">

      <!-- ================== Category: Gaming Phones ================== -->
      <h2 class="mb-4 fw-bold">🎮 Gaming 5G Phones</h2>
      <div class="row g-4">

        <div class="col-md-3">
          <div class="card">
            <img src="../image/5gimg13.jpg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Redmi 14x 5G</h5>
              <p class="text-success fw-bold">$8789</p>
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
            <img src="../image/5gimg14.jpeg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Infinix Note 50s 5G+</h5>
              <p class="text-success fw-bold">$10399</p>
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
            <img src="../image/5gimg15.jpeg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Vivo T4x 5G</h5>
              <p class="text-success fw-bold">$12899</p>
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
            <img src="../image/5gimg16.jpeg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Redmi Note 14 Pro 5G</h5>
              <p class="text-success fw-bold">$7999</p>
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

      <hr class="my-5">

      <!-- ================== Category: Foldable Phones ================== -->
      <h2 class="mb-4 fw-bold">📖 Foldable 5G Phones</h2>
      <div class="row g-4">

        <div class="col-md-3">
          <div class="card">
            <img src="../image/5gimg17.jpeg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Samsung Galaxy Z Fold 5</h5>
              <p class="text-success fw-bold">$11499</p>
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
            <img src="../image/5gimg18.jpg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Samsung Galaxy Z Flip 5</h5>
              <p class="text-success fw-bold">$11299</p>
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
            <img src="../image/5gimg19.jpeg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Redmi Z Flip 7 FE</h5>
              <p class="text-success fw-bold">$14099</p>
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
            <img src="../image/5gimg20.jpeg" class="product-img" alt="">
            <div class="card-body text-center">
              <h5 class="card-title">Google Pixel Fold</h5>
              <p class="text-success fw-bold">$9999</p>
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