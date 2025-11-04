<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - ShopZone</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
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
<body>

  <!-- Header Banner -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">ShopZone</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainMenu">
        <ul class="navbar-nav ms-auto">

          <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>

          <!-- Mega Menu -->
          <li class="nav-item dropdown position-static">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Categories</a>
            <div class="dropdown-menu w-100 p-4 mega-menu shadow">
              <div class="row">
                <div class="col-md-3">
                  <h6 class="fw-bold">Mobiles</h6>
                  <a class="dropdown-item" href="phones\android.php">Android Phones</a>
                  <a class="dropdown-item" href="phones\iphone.php">iPhones</a>
                  <a class="dropdown-item" href="phones\5Gphones.php">5G Phones</a>
                  <a class="dropdown-item" href="phones\accessories.php">Accessories</a>
                </div>

                <div class="col-md-3">
                  <img src="/e-commerce/acc1.webp" class="img-fluid rounded w-100">

                </div>

                <div class="col-md-3">
                  <img src="/e-commerce/images/ac2.png" class="img-fluid rounded w-100">

                </div>

                <div class="col-md-3">
                  <img src="/e-commerce/ac3.jpg" class="img-fluid rounded w-100">

                </div>
              </div>
            </div>
          </li>

          <li class="nav-item"><a class="nav-link" href="/e-commerce/offer.php">Offers</a></li>
          <li class="nav-item"><a class="nav-link" href="/e-commerce/contact.php">Contact</a></li>
        </ul>

        <form method="GET" action="search2.php" class="d-flex">
          <input type="text" name="query" placeholder="Search products..." class="form-control" />
          <button type="submit" class="btn btn-warning ms-2">Search</button>
        </form>

      </div>
    </div>
  </nav>
  <header class="bg-danger text-white text-center py-4">
    <h1>Special Offers</h1>
    <p>Grab these deals before they expire!</p>
  </header>

  <section class="py-5">
    <div class="container">
      <div class="row g-4">

        <div class="col-md-3">
          <div class="card text-center">
            <img src="images\sm1.webp" class="card-img-top img-fluid product-img" alt="Offer 1">
            <div class="card-body">
              <h5 class="card-title">Smartphone Deal</h5>
              <p class="text-success">50% Off</p>
              <a href="phones\5Gphones.php" class="btn btn-primary">Shop Now</a>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center">
            <img src="images\ip1.jpeg" class="card-img-top img-fluid product-img" alt="Offer 2">
            <div class="card-body">
              <h5 class="card-title">Iphone Sale</h5>
              <p class="text-success">70% Off</p>
              <a href="phones\iphone.php" class="btn btn-primary">Shop Now</a>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center">
            <img src="images\ap1.webp" class="card-img-top img-fluid product-img" alt="Offer 3">
            <div class="card-body">
              <h5 class="card-title">Android phone Discount</h5>
              <p class="text-success">60% Off</p>
              <a href="phones\android.php" class="btn btn-primary">Shop Now</a>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center">
            <img src="images\ap1.jpg" class="card-img-top img-fluid product-img" alt="Offer 4">
            <div class="card-body">
              <h5 class="card-title">All Phone</h5>
              <p class="text-success">45% Off</p>
              <a href="home.php" class="btn btn-primary">Shop Now</a>
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