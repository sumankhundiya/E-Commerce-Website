<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "shopzone", 3307);

// Check if delete request sent
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // 1️⃣ Fetch product image first
    $img_query = $conn->query("SELECT img FROM products WHERE id = $product_id");
    $img_row = $img_query->fetch_assoc();

    if ($img_row) {
        $image = $img_row['img'];
        // 2️⃣ Delete from database
        $delete_query = $conn->query("DELETE FROM products WHERE id = $product_id");

        if ($delete_query) {
            // 3️⃣ Delete image from folder
            if (!empty($image) && file_exists("uploads/" . $image)) {
                unlink("uploads/" . $image); // delete photo
            }

            echo "<script>alert('Product deleted successfully!'); 
                  window.location='products.php';
                  </script>";
        } else {
            echo "Error deleting product!";
        }
    } else {
        echo "Product not found!";
    }
} else {
    echo "Invalid request!";
}
?>
