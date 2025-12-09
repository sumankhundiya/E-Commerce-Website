<?php
$conn = new mysqli("localhost", "root", "", "shopzone", 3307);

// Get product ID
if (!isset($_GET['id'])) {
    die("Product ID missing!");
}

$id = $_GET['id'];

// Fetch existing product
$result = $conn->query("SELECT * FROM products WHERE id = $id");
$product = $result->fetch_assoc();

if (!$product) {
    die("Product not found!");
}

// Update logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name        = $_POST['name'];
    $price       = $_POST['price'];
    $description = $_POST['description'];
    $old_img     = $product['img'];

    // New image upload
    $new_img = $_FILES['img']['name'];
    $new_img_tmp = $_FILES['img']['tmp_name'];
    if (!empty($new_img)) {
        $image_name = time() . "_" . $new_img;

        // Save new image
        move_uploaded_file($new_img_tmp, "uploads/" . $image_name);

        // Delete old image
        if (!empty($old_img) && file_exists("uploads/" . $old_img)) {
            unlink("uploads/" . $old_img);
        }
    } else {
        $image_name = $old_img; // keep old
    }

    // Update database
    $stmt = $conn->prepare("UPDATE products SET name=?, price=?, description=?, img=? WHERE id=?");
    $stmt->bind_param("sdssi", $name, $price, $description, $image_name, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Product Updated Successfully!'); 
              window.location='view_products.php';</script>";
    } else {
        echo "Update error!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('image/back2.jpg');
            /* background: #f4f6f9; */
        }
        .card {
            border-radius: 15px;
            background-color: #e6e5e5;
        }
        .product-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #ddd;
        }
        .btn-update {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            border: none;
        }
        .btn-update:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="col-md-6 mx-auto">

        <div class="card shadow p-4">
            <h3 class="text-center fw-bold mb-4">✏️ Update Product</h3>

            <form method="POST" enctype="multipart/form-data">

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name" value="<?php echo $product['name']; ?>" 
                           class="form-control form-control-lg" required>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" 
                           class="form-control form-control-lg" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control form-control-lg" rows="4" required>
                        <?php echo $product['description']; ?>
                    </textarea>
                </div>

                <!-- Current Image -->
                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                    <img src="<?php echo $product['img']; ?>" class="product-img mb-2">
                </div>

                <!-- New Image -->
                <div class="mb-3">
                    <label class="form-label">Upload New Image (optional)</label>
                    <input type="file" name="img" class="form-control">
                </div>

                <!-- Update Button -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn-update">Update Product</button>
                </div>

            </form>
        </div>

    </div>
</div>

</body>
</html>
