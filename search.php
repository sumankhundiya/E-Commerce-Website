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
  </style>
<body>
  <!-- Header Banner -->
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
                    <a class="nav-link " href="home.php">Home</a>
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

                <li class="nav-item"><a class="nav-link" href="/e-commerce/offer.php">Offers</a></li>
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
    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "shopzone", 3307);

$search = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT * FROM products WHERE name LIKE ? ORDER BY category_id";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$searchTerm = "%".$search."%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Group results by category
echo "
<h1 style='
    text-align:center;
    margin-top:80px;
    color:#466784;
    font-size:32px;
    font-weight:600;
    font-family:Poppins, sans-serif;
'>
    Search Results for: ".$_GET['query']."
</h1>
";


$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[$row['category_id']][] = $row;
}

 
  echo "
<div style='
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: center;
    width: 100%;
    padding: 50px 0;
    background: #f4f8ff;
'>
";

foreach ($categories as $category => $products) {
    foreach ($products as $row) {

        echo "
        <div style='
            width: 320px;
            background: white;
            text-align: center;
            padding: 20px;
            border-radius: 18px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        '
        onmouseover=\"this.style.transform='translateY(-10px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.25)';\"
        onmouseout=\"this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.15)';\"
        >
            <h3 style='font-size:20px; font-weight:bold; margin-bottom:15px;'>
                " . htmlspecialchars($row['name']) . "
            </h3>

            <img src='" . htmlspecialchars($row['img']) . "' 
                alt='No Image' 
                style='width:220px; height:160px; object-fit:cover; border-radius:10px; margin-bottom:15px;'
            >

            <p style='font-size:18px; color:#333; margin:5px 0;'>
                <b>Price:</b> $" . htmlspecialchars($row['price']) . "
            </p>

            <p style='color:#555; font-size:15px; width:100%; height:45px; overflow:hidden; margin-bottom:40px;'>
                " . htmlspecialchars($row['description']) . "
            </p>

            <a href='https://www.amazon.in/b/?ie=UTF8&node=1389401031&tag=msndeskstdin-21&ref=pd_sl_4ne8stqc2v_b&adgrpid=1312818490351840&hvadid=82051414323296&hvnetw=o&hvqmt=p&hvbmt=bb&hvdev=c&hvlocint=&hvlocphy=148650&hvtargid=kwd-82052034040651:loc-90&hydadcr=26754_2506464&mcid=6ecb61ab80b731a9a32f5daea3ccfe3f" . $row['id'] . "'
               style='
                    color: white;
                    text-decoration: none;
                    background: #0066ff;
                    padding: 10px 20px;
                    border-radius: 8px;
                    position: absolute;
                    bottom: 15px;
                    left: 50%;
                    transform: translateX(-50%);
                    font-size: 16px;
               '>
               More Info
            </a>

        </div>
        ";
    }
}

echo "</div>";


?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
