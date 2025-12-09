<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - ShopZone</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
     * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  body {
    background: #f8f9fa;
    color: #222;
    overflow-x: hidden;
  }

  //

  /* Mega Menu */
  .mega-menu {
    display: none;
    position: absolute;
    left: 0;
    right: 0;
    top: 100%;
    background-color: #fff;
    border-radius: 10px;
    z-index: 999;
  }

  .dropdown:hover .mega-menu {
    display: block;
    animation: fadeIn 0.3s ease-in-out;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .mega-menu h6 {
    color: #000;
    border-bottom: 2px solid #ffc107;
    display: inline-block;
    margin-bottom: 10px;
  }

  .dropdown-item:hover {
    background-color: #f8f9fa;
    color: #000 !important;
    border-radius: 5px;
  }

  /* Search Bar */
  .form-control {
    border-radius: 30px;
    padding-left: 15px;
    border: 2px solid #ffc107;
    transition: box-shadow 0.3s ease;
  }

  .form-control:focus {
    box-shadow: 0 0 10px #ffc107;
    outline: none;
  }

  .btn-warning {
    border-radius: 30px;
    font-weight: bold;
    transition: all 0.3s ease;
  }

  .btn-warning:hover {
    background-color: #ffca2c;
    transform: scale(1.05);
  }

  /* Image Styling */
  .mega-menu img {
    border-radius: 12px;
    transition: transform 0.4s;
  }

  .mega-menu img:hover {
    transform: scale(1.05);
  }

  /* Header / Navbar */
  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 60px;
    background: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 100;
  }

  .logo {
    font-size: 26px;
    font-weight: 700;
    color: #ff6f00;
  }

  nav ul {
    list-style: none;
    display: flex;
    gap: 25px;
  }

  nav ul li a {
    text-decoration: none;
    color: #333;
    font-weight: 500;
    transition: color 0.3s;
  }

  nav ul li a:hover {
    color: #ff6f00;
  }

  .icons i {
    font-size: 20px;
    margin-left: 20px;
    cursor: pointer;
    transition: color 0.3s;
  }

  .icons i:hover {
    color: #ff6f00;
  }
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  body {
    background-color: #f8f9fa;
    color: #333;
    overflow-x: hidden;
  }
  hero {
    display: block; /* make it behave like a block element */
    background: linear-gradient(135deg, #ff3b3b, #ff7b00);
    color: white;
    padding: 80px 20px;
    border-radius: 30px;
    margin: 55px auto;
    max-width: 1200px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
    animation: fadeInDown 1s ease forwards;
  }

  hero h1 {
    font-size: 3rem;
    margin-bottom: 15px;
  }

  hero p {
    font-size: 1.2rem;
  }

  @keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-30px);}
    to { opacity: 1; transform: translateY(0);}
  }

  @media (max-width: 768px) {
    hero h1 {
      font-size: 2.2rem;
    }
    hero p {
      font-size: 1rem;
    }
  }

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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold text-warning" href="#">ShopZone</a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">

            <!-- CENTER MENU -->
            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>

                <!-- Categories -->
                <li class="nav-item dropdown position-static">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Categories</a>

                    <div class="dropdown-menu w-100 p-4 mega-menu shadow-lg">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="fw-bold">Mobiles</h6>
                                <a class="dropdown-item" href="phones/android.php">Android Phones</a>
                                <a class="dropdown-item" href="phones/iphone.php">iPhones</a>
                                <a class="dropdown-item" href="phones/5Gphones.php">5G Phones</a>
                                <a class="dropdown-item" href="phones/accessories.php">Accessories</a>
                            </div>

                            <div class="col-md-3">
                                <img src="/e-commerce/image/hacc1.webp" class="img-fluid rounded">
                            </div>

                            <div class="col-md-3">
                                <img src="/e-commerce/image/gacc2.webp" class="img-fluid rounded">
                            </div>

                            <div class="col-md-3">
                                <img src="/e-commerce/image/5gimg12.jpg" class="img-fluid rounded">
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link active" href="/e-commerce/offer.php">Offers</a></li>
                <li class="nav-item"><a class="nav-link" href="/e-commerce/contact.php">Contact</a></li>

            </ul>

            <!-- SEARCH BAR -->
            <form method="GET" action="search.php" class="d-flex me-4">
                <input type="text" name="query" placeholder="Search products..." 
                       class="form-control form-control-sm me-2">
                <button type="submit" class="btn btn-warning btn-sm">Search</button>
            </form>

            <!-- PROFILE DROPDOWN -->
            <ul class="navbar-nav">

                <?php if(isset($_SESSION['name'])): ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">

                        <img src="uploads/<?php echo $_SESSION['profile_pic']; ?>" 
                             style="
                                width:40px;
                                height:40px;
                                border-radius:50%;
                                object-fit:cover;
                                border:2px solid #ffc107;
                                margin-right:8px;
                             ">

                        <span class="text-success fw-bold">
                            <?php echo $_SESSION['name']; ?>
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">

                        <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                        <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="orders.php">My Orders</a></li>

                        <li><hr class="dropdown-divider"></li>

                        <li><a class="dropdown-item text-danger fw-bold" href="logout.php">Logout</a></li>

                    </ul>
                </li>

                <?php else: ?>

                <li class="nav-item">
                    <a class="btn btn-warning btn-sm" href="sign.php">Sign In</a>
                </li>

                <?php endif; ?>

            </ul>

        </div>

    </div>
</nav>
<hero class="text-center">
  <h1 class="fw-bold">🔥 Special Offers</h1>
  <p style="font-size: 18px;">Grab these amazing deals before they expire!</p>
</hero>

  <section class="py-5">
    <div class="container">
      <div class="row g-4">

        <div class="col-md-3">
          <div class="card text-center">
            <img src="image\oip1.webp" class="card-img-top img-fluid product-img" alt="Offer 1">
            <div class="card-body">
              <h5 class="card-title">IPhones</h5>
              <p class="text-success">50% Off</p>
              <a href="phones\iphone.php" class="btn btn-primary">Shop Now</a>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center">
            <img src="image\o5p.jpg" class="card-img-top img-fluid product-img" alt="Offer 2">
            <div class="card-body">
              <h5 class="card-title">5G Phones</h5>
              <p class="text-success">70% Off</p>
              <a href="phones\5Gphones.php" class="btn btn-primary">Shop Now</a>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center">
            <img src="image\op1.jpeg" class="card-img-top img-fluid product-img" alt="Offer 3">
            <div class="card-body">
              <h5 class="card-title">Android Phones</h5>
              <p class="text-success">60% Off</p>
              <a href="phones\android.php" class="btn btn-primary">Shop Now</a>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center">
            <img src="image\oac.webp" class="card-img-top img-fluid product-img" alt="Offer 4">
            <div class="card-body">
              <h5 class="card-title">Accessories</h5>
              <p class="text-success">45% Off</p>
              <a href="phones/accessories.php" class="btn btn-primary">Shop Now</a>
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