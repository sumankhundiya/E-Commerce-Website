<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
body {
  background-image: url('img2.jpg');
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
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" autocomplete="off">
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
    $password   = $_POST["password"]; // plain text password
    $profile_pic = $_FILES['profile_pic']['name'] ?? '';

    $errors = [];

    // Validation
    if (empty($name)) $errors[] = "Please fill out the name.";
    if (empty($email)) $errors[] = "Please fill out the email.";
    if (empty($password)) $errors[] = "Please fill out the password.";
    if (strlen($password) < 8) $errors[] = "Password must be at least 8 characters.";

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);

    if ($stmt->rowCount() > 0) {
        $errors[] = "Email already exists. Try another one.";
    }

    // If no errors, insert into database
    if (empty($errors)) {

        // Save plain-text password
        $insert = $conn->prepare("INSERT INTO users (username, email, password, profile_pic) 
                                  VALUES (:name, :email, :password, :profile_pic)");
        $insert->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $password, // plain text password saved here
            ':profile_pic' => $profile_pic
        ]);

        if ($insert) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['profile_pic'] = $profile_pic;
            header("Location:home.php");
            exit;
        }
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red; text-align:center;'>$error</p>";
        }
    }
}

if (isset($_POST["login"])) {
    header("Location: login.php");
    exit;
}
?>


