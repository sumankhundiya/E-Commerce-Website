<?php
session_start();

// CHECK if user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Session Values
$user_id = $_SESSION['id'];
$user_name = $_SESSION['name'];
$user_email = $_SESSION['email'] ?? "No email available";
$user_img = $_SESSION['profile_pic'] ?? "default.png";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #c3d9ff, #f7faff);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .profile-card {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            max-width: 420px;
            width: 100%;
            margin: auto;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(0,0,0,0.12);
        }

        .profile-img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #eaeaea;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform .3s;
        }
        .profile-img:hover {
            transform: scale(1.07);
        }

        .title {
            font-weight: 700;
            font-size: 26px;
        }

        .btn-custom {
            padding: 12px;
            font-size: 17px;
            border-radius: 12px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="profile-card text-center">
        <h1>Your Profile</h1>
        <img src="uploads/<?php echo $user_img; ?>" 
             class="profile-img mb-3"
             alt="Profile Photo">

        <h3 class="title"><?= $user_name ?></h3>
        <p class="text-muted mb-2"><?= $user_email ?></p>

        <hr class="my-4">

        <div class="d-grid gap-3">
            <a href="edit_profile.php" class="btn btn-primary btn-custom">✏️ Edit Profile</a>
            <a href="logout.php" class="btn btn-danger btn-custom">Logout</a>
            <a href="home.php" class="btn btn-secondary btn-custom">🏠 Back to Home</a>
        </div>

    </div>
</div>

</body>
</html>

