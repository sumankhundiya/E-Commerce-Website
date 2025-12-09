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
        <h1>Sign Up Your Account</h1>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" autocomplete="off">
        </div>
        <div class="form-group">
            <label>User phone</label>
            <input type="number" class="form-control" name="phone" placeholder="Enter your phone number" autocomplete="off">
        </div>
        <div class="form-group">
            <label>User Address</label>
            <input type="text" class="form-control" name="address" placeholder="Enter your address" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Profile Image</label>
            <input type="file" class="form-control" name="profile_pic">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
</div>
</body>
</html>

<?php
session_start();
include("db.php");

if (isset($_POST["submit"])) {
    $name       = trim($_POST["name"]);
    $email      = trim($_POST["email"]);
    $phone      = trim($_POST["phone"]);
    $address    = trim($_POST["address"]);
    $password   = $_POST["password"];
    $profile_pic = $_FILES['profile_pic']['name'];

    $tmp = $_FILES['profile_pic']['tmp_name'];
    $upload_path = "uploads/" . $profile_pic;

    // MOVE FILE TO uploads folder
    move_uploaded_file($tmp, $upload_path);

    $errors = [];

    if (empty($name)) $errors[] = "Please fill out the name.";
    if (empty($email)) $errors[] = "Please fill out the email.";
    if (empty($password)) $errors[] = "Please fill out the password.";
    if (strlen($password) < 8) $errors[] = "Password must be at least 8 characters.";

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);

    if ($stmt->rowCount() > 0) {
        $errors[] = "Email already exists. Try another one.";
    }

    if (empty($errors)) {

        $insert = $conn->prepare("INSERT INTO users (username,user_phone, user_address, email, password, profile_pic) 
                                  VALUES (:name, :phone, :address, :email, :password, :profile_pic)");
        $insert->execute([
            ':name' => $name,
            ':phone' => $phone,
            ':address' => $address,
            ':email' => $email,
            ':password' => $password,
            ':profile_pic' => $profile_pic
        ]);

        if ($insert) {
            // store in session
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['address'] = $address;
            $_SESSION['profile_pic'] = $profile_pic;

            header("Location: home.php");
            exit;
        }
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red; text-align:center;'>$error</p>";
        }
    }
}

if(isset($_POST['login'])){
    header('Location:login.php');
}

?>


