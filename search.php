<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - ShopZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

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

                <form method="GET" action="search.php" class="d-flex">
                    <input type="text" name="query" placeholder="Search products..." class="form-control" />
                    <button type="submit" class="btn btn-warning ms-2">Search</button>
                </form>

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
$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[$row['category_id']][] = $row;
}

 
     echo "
        <div style='
            display: flex;
            gap:30px;
            flex-wrap: wrap;
            width: 100%;
            margin:30px 30px 30px 30px;
        '>
        ";
    foreach ($categories as $category => $products) {
    

        foreach ($products as $row) {
            echo "
            <div style='
                width:400px;
                height:400px;
                background-color:white;
                text-align: center;
                border-color:white;
                padding: 20px;
                margin-bottom: 20px;
                border-radius: 8px;
                border:30px solid lightblue;
            '>
                <h5>" . htmlspecialchars($row['name']) . "</h5>
                <img src='" . htmlspecialchars($row['image']) . "' alt='no img' width='200' height='150'>
                <p>Price: $" . htmlspecialchars($row['price']) . "</p>
                <p>" . htmlspecialchars($row['description']) . "</p>
                <a href='product.php?id=" . $row['id'] . "' style='color: white; text-decoration: none; background-color:blue;padding:3px'>More Info</a>
            </div>
            ";
        }

        
    }
    
        echo "</div>";



?>
