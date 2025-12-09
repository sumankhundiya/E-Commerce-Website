<?php
session_start();
require 'db.php';

if (isset($_POST['login'])) {   // CLICKED LOGIN BUTTON
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['profile_pic'] = $user['profile_pic'] ?? '';

        header("Location: suman.php");
        exit;
    } else {
        header("Location: login.php?error=1");
        exit;
    }
}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
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
p {
    text-align: center;
}
</style>
</head>
<body>

<div class="container">

    <form method="post" enctype="multipart/form-data" class="mx-auto p-4 border rounded" style="max-width: 500px;">
        <h1>Login to Your Account</h1>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password" autocomplete="off">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
        <button type="submit" name="login" class="btn btn-primary">Login</button>

        
 <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
        <p style="color:red;">Invalid email or password</p>
    <?php endif; ?>
    </form>
</div>

</body>
</html>




















