<?php
include('db.php');

// Total Users
$totalUsers = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn();

// Fetch ALL users
$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    body {
        background: #eef1f6;
        font-family: 'Segoe UI', sans-serif;
    }

    /* Fixed Header */
    .header-title {
        width: 100%;
        height: 70px;
        background: linear-gradient(90deg, #007bff, #00c6ff);
        color: white;
        font-size: 30px;
        font-weight: 600;
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    /* Fix space below header */
    .content-wrapper {
        margin-top: 100px;
    }

    /* Card hover effect */
    .stat-card {
        border-radius: 12px;
        transition: all 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

    .card-header {
        font-weight: bold;
        font-size: 18px;
    }

</style>

<body>

<!-- HEADER -->
<div class="header-title">
   Users
</div>

<div class="content-wrapper container">

    <!-- Back Button -->
    <div class="d-flex justify-content-start mb-3" >
        <a href="suman.php" class="btn btn-dark px-4">⬅ Back</a>
    </div>

    <!-- TOP CARDS -->
    <div class="row g-4">

        <div class="col-md-3 mx-10" >
            <div class="card shadow-sm stat-card">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Total Users</h6>
                    <h2 class="text-primary"><?php echo $totalUsers?></h2>
                </div>
            </div>
        </div>

    </div>

    <!-- RECENT ORDERS -->
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-primary text-white">
            User Data
        </div>
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Profile Pic</th>
                </tr>
            </thead>

            <?php foreach ($users as $r): ?>
<tr>
    <td><?= $r['id'] ?></td>
    <td><?= $r['username'] ?></td>
    <td><?= $r['email'] ?></td>
    <td><img src="uploads/<?= $r['profile_pic'] ?>" 
     onerror="this.onerror=null; this.src='uploads/default.jpg';"
     width="40" height="40"
     style="border-radius:50%; object-fit:cover;"></td>
</tr>
<?php endforeach; ?>

        </table>
    </div>

</div>

</body>
</html>