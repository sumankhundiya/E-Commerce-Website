<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Android Phones - ShopZone</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f5f7fa;
      font-family: "Poppins", sans-serif;
    }

    /* Header */
    header {
      background: linear-gradient(135deg, #005bea, #00c6fb);
      padding: 70px 0;
      color: white;
      text-align: center;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    header h1 {
      font-size: 3rem;
      font-weight: 700;
    }

    header p {
      font-size: 1.2rem;
      opacity: 0.9;
    }

    /* Product Cards */
    .card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      background: rgba(255,255,255,0.85);
      backdrop-filter: blur(10px);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    .product-img {
      width: 100%;
      height: 230px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .card:hover .product-img {
      transform: scale(1.1);
    }

    .card-title {
      font-weight: 700;
      font-size: 1.2rem;
    }

    .btn-primary {
      background: linear-gradient(135deg, #005bea, #00c6fb);
      border: none;
      font-weight: 600;
      border-radius: 10px;
      padding: 10px 20px;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, #0046ae, #0094b6);
    }

    /* Footer */
    footer {
      background-color: #111;
      color: #ddd;
      padding: 50px 20px;
      margin-top: 40px;
    }

    footer h4 {
      color: #fff;
      margin-bottom: 20px;
      font-weight: 600;
    }

    footer a {
      color: #ddd;
      text-decoration: none;
    }

    footer a:hover {
      color: #fff;
      text-decoration: underline;
    }

    .footer-bottom {
      text-align: center;
      margin-top: 30px;
      padding-top: 15px;
      border-top: 1px solid #333;
      color: #aaa;
      font-size: 14px;
    }
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

<header>
  <h1>Android Phones</h1>
  <p>Choose Your Favorite Android Smartphone</p>
</header>

<div class="container mt-4 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    
    <div id="subtotalDisplay" class="alert alert-info mb-0 shadow-sm" style="<?= $subtotal>0 ? '' : 'display:none;' ?>">
      <strong>Cart subtotal:</strong> $<?= number_format($subtotal, 2) ?>
    </div>

    <a href="/e-commerce/cart.php" class="btn btn-primary ms-3" id="viewCartBtn"
       style="<?= $subtotal>0 ? '' : 'display:none;' ?>">
       View Cart
    </a>
  </div>
</div>

<section class="py-5">
  <div class="container">

    <!-- ================== Category: Budget Phones ================== -->
    <h2 class="mb-4 fw-bold">💰 Budget Android Phones</h2>
    <div class="row g-4">

      <div class="col-md-3">
        <div class="card">
          <img src="../image/img17.webp" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Samsung Galaxy M07</h5>
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
          <img src="../image/img18.jpg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Redmi A4 5G</h5>
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
          <img src="../image/img19.jpg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Oppo K13x 5G</h5>
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
          <img src="../image/img20.jpg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Vivo T4 Lite 5G</h5>
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
    <h2 class="mb-4 fw-bold">📱 Mid-Range Android Phones</h2>
    <div class="row g-4">

      <div class="col-md-3">
        <div class="card">
          <img src="../image/img24.jpg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">OnePlus Nord CE5 5G:</h5>
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
          <img src="../image/img21.jpeg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Google Pixel 8a 5G</h5>
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
          <img src="../image/img22.jpeg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Samsung Galaxy A26 5G</h5>
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
          <img src="../image/img23.jpeg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Realme 14x 5G</h5>
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
    <h2 class="mb-4 fw-bold">🚀 Flagship Android Phones</h2>
    <div class="row g-4">

      <div class="col-md-3">
        <div class="card">
          <img src="../image/img28.jpeg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Samsung Galaxy S25 Ultra</h5>
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
          <img src="../image/img25.jpg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Samsung Galaxy S25</h5>
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
          <img src="../image/img26.jpg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">OnePlus 13s</h5>
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
          <img src="../image/img27.jpg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Vivo X200</h5>
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
    <h2 class="mb-4 fw-bold">🎮 Gaming Android Phones</h2>
    <div class="row g-4">

      <div class="col-md-3">
        <div class="card">
          <img src="../image/img32.jpeg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Asus ROG Phone 8 Pro</h5>
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
          <img src="../image/img34.jpeg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">iQOO Neo 10R</h5>
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
          <img src="../image/img30.jpeg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Realme 15T 5G</h5>
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
          <img src="../image/img31.jpg" class="product-img" alt="">
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
    <h2 class="mb-4 fw-bold">📖 Foldable Android Phones</h2>
    <div class="row g-4">

      <div class="col-md-3">
        <div class="card">
          <img src="../image/img37.jpeg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Samsung Galaxy Z Fold 7</h5>
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
          <img src="../image/img38.jpg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Samsung Z Fold 5</h5>
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
          <img src="../image/img35.jpg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Samsung Galaxy Z Flip 7 FE</h5>
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
          <img src="../image/img36.jpg" class="product-img" alt="">
          <div class="card-body text-center">
            <h5 class="card-title">Huawei Pura X</h5>
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
<footer>
  <div class="container">
    <div class="row">

      <div class="col-md-3">
        <h4>About Us</h4>
        <p>We provide the best quality products at affordable prices. Making online shopping easy for everyone.</p>
      </div>

      <div class="col-md-3">
        <h4>Quick Links</h4>
        <ul class="list-unstyled">
          <li><a href="home.php">Home</a></li>
          <li><a href="offer.php">Offer</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>

      <div class="col-md-3">
        <h4>Contact</h4>
        <p>Email: info@example.com</p>
        <p>Phone: +1 234 567 890</p>
        <p>Address: 123 Street, City, Country</p>
      </div>

      <div class="col-md-3">
        <h4>Follow Us</h4>
        <p>
          <a href="#">Facebook</a><br>
          <a href="#">Instagram</a><br>
          <a href="#">Twitter</a>
        </p>
      </div>

    </div>

    <div class="footer-bottom">
      © 2025 Your Website. All Rights Reserved.
    </div>
  </div>
</footer>

</body>
</html>
