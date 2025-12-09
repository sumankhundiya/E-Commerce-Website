<?php
session_start();
require 'db.php';

if (isset($_POST['login'])) {   // CLICKED LOGIN BUTTON
    $role = trim($_POST['role']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM admin WHERE role = :role");
    $stmt->execute(['role' => $role]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['adminname'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        header("Location: home.php");
        exit;
    } else {
        header("Location: admin.php?error=1");
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
            <label>Role</label>
            <input type="text" class="form-control" name="role" placeholder="Enter your role" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password" autocomplete="off">
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>

        
 <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
        <p style="color:red;">Invalid email or password</p>
    <?php endif; ?>
    </form>
</div>

</body>
</html>




















