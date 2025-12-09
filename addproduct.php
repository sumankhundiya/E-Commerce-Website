<?php

if(session_start() === FALSE){
    session_start('role')=='admin';
}
$conn = new mysqli("localhost", "root", "", "shopzone", 3307);

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // IMAGE
    $product_img = $_FILES['product_img']['name'];
    $tmp_name = $_FILES['product_img']['tmp_name'];

    $errors = [];

    // Validation
    if (empty($name)) $errors[] = "Please fill out the name.";
    if (empty($product_img)) $errors[] = "Please upload image.";
    if (empty($price)) $errors[] = "Please fill out the price.";
    if (empty($description)) $errors[] = "Description must be entered.";

    if (empty($errors)) {

        // Image move to folder
        $upload_path = "uploads/" . $product_img;
        move_uploaded_file($tmp_name, $upload_path);

        // CORRECT prepared statement
        $stmt = $conn->prepare("INSERT INTO products (name, img, price, description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $upload_path, $price, $description);

        if ($stmt->execute()) {
            echo "<p style='color:green; text-align:center;'>Product Added Successfully ✔️</p>";
        } else {
            echo "<p style='color:red; text-align:center;'>Database Error: ".$stmt->error."</p>";
        }
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red; text-align:center;'>$error</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
body {
   background-image: url('image/back1.avif');
  background-size: cover;
  background-position: center;
}
form {
    background-color: #032f5d;
    color: white;
    margin-top: 150px;
}
</style>
</head>
<body>
<div class="container">
    <form method="post" enctype="multipart/form-data" class="mx-auto p-4 border rounded" style="max-width: 500px;">
        <h1>Add Products Detail</h1>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name" autocomplete="off">
        </div>
         <div class="form-group">
            <label>Product Image</label>
            <input type="file" class="form-control" name="product_img">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" placeholder="Enter Product Price" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="description" placeholder="Enter Product Discription" autocomplete="off">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add</button>
    </form>
</div>
</body>
</html>