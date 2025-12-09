<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - ShopZone</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

  /* ------------------------ */
  /* RESET AND GLOBAL STYLES */
  /* ------------------------ */
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

  /* ------------------------ */
  /* HERO SECTION */
  /* ------------------------ */
  .hero {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-around;
    padding: 60px 10%;
    background: linear-gradient(to right, #6c757d, #adb5bd);
    color: white;
  }

  .hero-content {
    flex: 1 1 400px;
    text-align: left;
  }

  .hero-content h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 20px;
  }

  .hero-content p {
    font-size: 1.2rem;
    margin-bottom: 25px;
    color: #f1f1f1;
  }

  .hero-content button {
    padding: 12px 30px;
    border: none;
    border-radius: 30px;
    background-color: #ffc107;
    color: #000;
    font-weight: 600;
    font-size: 1.1rem;
    cursor: pointer;
    transition: 0.3s ease;
  }

  .hero-content button:hover {
    background-color: #ffcd39;
    transform: scale(1.05);
  }

  .hero-img img {
    margin-top:100px;
    max-width: 100%;
    border-radius: 20px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
  }

  /* ------------------------ */
  /* SHOP BY CHOICE SECTION */
  /* ------------------------ */
  .containe {
    background: #728f8f;
    padding: 60px 60px 40px;
    text-align: center;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin: 60px auto;
  }

  .containe h2 {
    font-size: 28px;
    margin-bottom: 40px;
    color: #fff;
    position: relative;
    display: inline-block;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .containe h2::after {
    content: '';
    position: absolute;
    width: 80px;
    height: 4px;
    background: #ffc107;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 2px;
  }

  .containe-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 30px;
  }

  .contain,
  .conatin {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  .contain:hover,
  .conatin:hover {
    transform: translateY(-6px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
  }

  .contain img,
  .conatin img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .contain:hover img,
  .conatin:hover img {
    transform: scale(1.05);
  }

  .contain h3,
  .conatin h3 {
    padding: 15px;
    font-size: 18px;
    background-color: #f8f9fa;
    color: #333;
    font-weight: 600;
    margin: 0;
    transition: color 0.3s ease;
  }

  .contain:hover h3,
  .conatin:hover h3 {
    color: #ffc107;
  }

  /* ------------------------ */
  /* CATEGORIES SECTION */
  /* ------------------------ */
  .categories {
    background: #728f8f;
    padding: 60px 60px 40px;
    text-align: center;
    border-radius: 10px;
    margin: 60px auto;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  .categories h2 {
    font-size: 28px;
    margin-bottom: 40px;
    color: #fff;
    position: relative;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .categories h2::after {
    content: '';
    position: absolute;
    width: 80px;
    height: 4px;
    background: #ffc107;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 2px;
  }

  .category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 30px;
  }

  .category {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  .category:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
  }

  .category img {
    width: 100%;
    height: 180px;
    object-fit: cover;
  }

  .category h3 {
    padding: 15px;
    font-size: 18px;
    color: #333;
    background-color: #f8f9fa;
    font-weight: 600;
    transition: color 0.3s ease;
  }

  .category:hover h3 {
    color: #ffc107;
  }

  /* ------------------------ */
  /* FEATURED PRODUCTS */
  /* ------------------------ */
  .products {
    padding: 60px;
    text-align: center;
  }

  .products h2 {
    font-size: 28px;
    margin-bottom: 40px;
    color: #222;
    position: relative;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .products h2::after {
    content: '';
    position: absolute;
    width: 80px;
    height: 4px;
    background: #ffc107;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 2px;
  }

  .product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 30px;
  }

  .product-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    text-align: center;
  }

  .product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  }

  .product-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
  }

  .product-info {
    padding: 15px;
  }

  .product-info h4 {
    font-size: 18px;
    color: #333;
    margin-bottom: 10px;
  }

  .product-info p {
    color: #777;
    font-size: 14px;
    margin-bottom: 8px;
  }

  .product-info span {
    color: #ffc107;
    font-weight: 600;
    font-size: 18px;
  }

  .add-cart {
    background: #ffc107;
    border: none;
    padding: 10px 20px;
    margin-bottom: 15px;
    font-weight: 600;
    border-radius: 20px;
    cursor: pointer;
    transition: 0.3s ease;
  }

  .add-cart:hover {
    background: #ffcd39;
    transform: scale(1.05);
  }

  /* ------------------------ */
  /* TESTIMONIALS */
  /* ------------------------ */
  .testimonials {
    background: #f1f1f1;
    padding: 60px 40px;
    text-align: center;
  }

  .testimonials h1 {
    font-size: 28px;
    margin-bottom: 40px;
    color: #222;
    position: relative;
  }

  .testimonials h1::after {
    content: '';
    position: absolute;
    width: 80px;
    height: 4px;
    background: #ffc107;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 2px;
  }

  .testimonial-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
  }

  .testimonial {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: 0.3s ease;
  }

  .testimonial:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
  }

  .testimonial h2 {
    color: #333;
    margin-bottom: 10px;
  }

  .testimonial p {
    font-size: 14px;
    color: #555;
    line-height: 1.6;
  }

  /* ------------------------ */
  /* RESPONSIVE DESIGN */
  /* ------------------------ */
  @media (max-width: 768px) {
    .hero {
      flex-direction: column-reverse;
      text-align: center;
    }

    .hero-content {
      text-align: center;
    }

    .hero-content h1 {
      font-size: 2.2rem;
    }

    .hero-content button {
      font-size: 1rem;
    }

    .products,
    .categories,
    .containe {
      padding: 40px 20px;
    }
  }
  </style>
</head>
<body>

<!-- Navbar (copied from home.php canonical navbar) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-warning" href="#">ShopZone</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
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
            
                <li class="nav-item"><a class="nav-link" href="/e-commerce/offer.php">Offers</a></li>
                <li class="nav-item"><a class="nav-link active" href="/e-commerce/contact.php">Contact</a></li>
            </ul>

            <form method="GET" action="search.php" class="d-flex me-4">
                <input type="text" name="query" placeholder="Search products..." class="form-control form-control-sm me-2">
                <button type="submit" class="btn btn-warning btn-sm">Search</button>
            </form>

            <ul class="navbar-nav">
                <?php if(isset($_SESSION['email'])): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                        <img src="uploads/<?php echo isset($_SESSION['profile_pic'])?$_SESSION['profile_pic']:'default.png'; ?>" style="width:40px;height:40px;border-radius:50%;object-fit:cover;border:2px solid #ffc107;margin-right:8px;">
                        <span class="text-success fw-bold"><?php echo isset($_SESSION['name'])?$_SESSION['name']:''; ?></span>
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
                <li class="nav-item"><a class="btn btn-warning btn-sm" href="sign.php">Sign In</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<hero class="bg-primary text-white text-center py-5">
  <h1>Contact Us</h1>
  <p>We'd love to hear from you!</p>
</hero>

<!-- Contact Form -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="card-title mb-4 text-center">Send Us a Message</h4>
            <form action="#" method="post">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary w-100">Send Message</button>
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
    <div style="flex:1; min-width:200px;">
      <h4 style="margin-bottom:15px;">About Us</h4>
      <p>We provide the best quality products at affordable prices. Our goal is to make shopping easy and enjoyable for everyone.</p>
    </div>
    <div style="flex:1; min-width:150px;">
      <h4 style="margin-bottom:15px;">Quick Links</h4>
      <ul style="list-style:none; padding:0;">
        <li><a href="home.php" style="color:#fff; text-decoration:none;">Home</a></li>
        <li><a href="offer.php" style="color:#fff; text-decoration:none;">Offer</a></li>
        <li><a href="contact.php" style="color:#fff; text-decoration:none;">Contact</a></li>
      </ul>
    </div>
    <div style="flex:1; min-width:200px;">
      <h4 style="margin-bottom:15px;">Contact Us</h4>
      <p>Email: info@example.com</p>
      <p>Phone: +1 234 567 890</p>
      <p>Address: 123 Street, City, Country</p>
    </div>
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
