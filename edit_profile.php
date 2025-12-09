<?php
session_start();
require "db.php"; // Your database connection file

// Redirect if not logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

// Fetch user from DB
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $profile_pic = $user['profile_pic'];  // old image

    // If new image uploaded
    if (!empty($_FILES['profile_pic']['name'])) {
        $img_name = time() . "_" . $_FILES['profile_pic']['name'];
        $tmp = $_FILES['profile_pic']['tmp_name'];
        $upload_path = "uploads/" . $img_name;

        // Save new image
        if (move_uploaded_file($tmp, $upload_path)) {
            $profile_pic = $img_name;
        }
    }

    // Update DB
    $update = $conn->prepare("UPDATE users SET username=?, email=?, profile_pic=? WHERE id=?");
    $update->execute([$name, $email, $profile_pic, $user_id]);

    // Update session
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['profile_pic'] = $profile_pic;

    header("Location: profile.php?updated=1");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eef1f5;
        }
        .edit-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 50px auto;
        }
        .profile-img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ddd;
        }
    </style>
</head>

<body>
<div class="edit-card">

    <h3 class="mb-4 text-center fw-bold">✏️ Edit Profile</h3>

    <div class="text-center mb-3">
        <img src="uploads/<?= $user['profile_pic'] ?>" class="profile-img">
    </div>

    <form method="POST" enctype="multipart/form-data">

    <label class="fw-bold">Full Name</label>
    <input type="text" name="name" class="form-control mb-3" 
           value="<?= htmlspecialchars($user['name'] ?? '') ?>" required>

    <label class="fw-bold">Email</label>
    <input type="email" name="email" class="form-control mb-3" 
           value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>

    <label class="fw-bold">Profile Photo</label>
    <input type="file" name="profile_pic" class="form-control mb-4">

    <button class="btn btn-primary w-100">Save Changes</button>
    <a href="profile.php" class="btn btn-secondary w-100 mt-2">Cancel</a>

</form>

</div>
</body>
</html>
